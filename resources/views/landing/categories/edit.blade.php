@extends('layouts.admin')

@section('title', 'Edit Categories')

@section('content')

    {{-- Menyimpan nilai current_page ke dalam variabel --}}
    @php
        $currentPage = 'Edit Categories'; // Diambil dari config/config.php
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <x-breadcrumb :title="'Categories'" :items="[['url' => route('admin.categories.index'), 'label' => 'Categories']]" :current_page="$currentPage" />
            {{-- Don't forget to define $currentPage on views --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center">Edit Category</h3>
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
                                <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <img src="{{ asset('admin/img/svg/x.svg') }}" alt="x" class="svg"
                                        aria-hidden="true">
                                </button>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="category" class="font-weight-bold">Category Name</label>
                                <input type="text" name="name" placeholder="Category name..."
                                    class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    value="{{ old('name', $category->name) }}" required>
                                <div class="invalid-feedback"> {{ $errors->first('name') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="font-weight-bold">Category Description</label>
                                <textarea type="text" name="description" placeholder="Category Description..."
                                    class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}" required>{{ old('description', $category->description) }}</textarea>
                                <div class="invalid-feedback"> {{ $errors->first('description') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="font-weight-bold">Image</label>
                                <input type="file" name="image"
                                    class="form-control {{ $errors->first('image') ? 'is-invalid' : '' }}">
                                <div class="invalid-feedback"> {{ $errors->first('image') }}</div>
                            </div>
                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
