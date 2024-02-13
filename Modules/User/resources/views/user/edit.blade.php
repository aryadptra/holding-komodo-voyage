@extends('user::layouts.master')

{{-- Menyimpan nilai current_page ke dalam variabel --}}
@php
    $currentPage = config('user.pages.manage'); // Diambil dari config/config.php
@endphp

{{-- Set section title dengan nilai dari current_page --}}
@section('title', $currentPage)

{{-- Contents here --}}
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="user-info-tab w-100 bg-white global-shadow radius-xl mb-50">
                <div class="ap-tab-wrapper border-bottom">
                    <ul class="nav px-30 ap-tab-main text-capitalize" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <li class="nav-item">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                                role="tab" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="svg replaced-svg">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>user info</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-4 col-10">
                                <div class="mt-sm-40 mb-sm-50 mt-20 mb-20">
                                    <div class="user-tab-info-title mb-sm-40 mb-20 text-capitalize">
                                        <h5 class="fw-500">User Information</h5>
                                    </div>

                                    {{-- Jika ada error validasi --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="alert-content">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="btn-close text-capitalize"
                                                    data-bs-dismiss="alert" aria-label="Close">
                                                    <img src="{{ asset('admin/img/svg/x.svg') }}" alt="x"
                                                        class="svg" aria-hidden="true">
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="edit-profile__body">
                                        <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-25">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Joko Widodo" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group mb-25">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="joko@gmail.com" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group mb-25">
                                                <div class="role">
                                                    <label for="role">
                                                        Role
                                                    </label>
                                                    <div class="dm-select-list d-flex">
                                                        <div class="dm-select">
                                                            <select name="role" id="role" class="form-control">
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->name }}"
                                                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                                        {{ $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-25">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="**********" name="password">
                                            </div>
                                            <div
                                                class="button-group d-flex pt-sm-25 justify-content-md-end justify-content-start ">
                                                <a href="{{ route('admin.user.index') }}"
                                                    class="btn btn-light btn-default btn-squared fw-400 text-capitalize radius-md btn-sm">Cancel
                                                </a>
                                                <button type="submit"
                                                    class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2 btn-sm">Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
