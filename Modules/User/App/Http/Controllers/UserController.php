<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user::user.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::with('permissions')->get();
        return view('user::user.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|exists:roles,name', // Pastikan role yang dipilih ada dalam tabel roles
            'password' => 'required|string|min:8', // Sesuaikan dengan kebutuhan keamanan aplikasi Anda
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($validatedData['role']);
        return redirect()->route('admin.user.index')->with('success', 'User has been created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        // return view('user::show');
    }

    public function edit($id)
    {
        $roles = Role::with('permissions')->get();

        $user = User::findOrFail($id); // Mengambil data pengguna berdasarkan ID
        return view('user::user.edit', [
            'user' => $user,
            'roles' => $roles
        ]); // Menampilkan view edit dengan data pengguna yang dipilih
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Memastikan email unik, kecuali untuk pengguna dengan ID yang sedang diedit
            'role' => 'required|exists:roles,name', // Pastikan role yang dipilih ada dalam tabel roles
            'password' => 'nullable|string|min:8', // Mengizinkan password kosong atau minimal 8 karakter
        ]);

        // Mengambil data pengguna yang akan diperbarui
        $user = User::findOrFail($id);

        // Memperbarui data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password, // Menggunakan password yang ada jika tidak ada perubahan
        ]);

        // Mengupdate peran pengguna
        $user->syncRoles([$validatedData['role']]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mengambil data pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Menghapus pengguna dari database
        $user->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'User has been deleted successfully.');
    }
}
