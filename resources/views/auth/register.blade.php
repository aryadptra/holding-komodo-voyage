@extends('layouts.auth-admin')

@section('title', 'Sign Up')

@section('content')
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="index.html">
                            </a>
                        </div>
                        {{-- Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            {{-- Foreach --}}
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Whoops!</strong> {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Komodo Voyage Indonesia</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="edit-profile__body">
                                        <div class="edit-profile__body">
                                            <div class="form-group mb-20">
                                                <label for="name">name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Full Name">
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="email">Email Adress</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="name@example.com">
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" autocomplete="new-password"
                                                        class="form-control" name="password" placeholder="Password">
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-15">
                                                <label for="password-field">password confirmation</label>
                                                <div class="position-relative">
                                                    <input id="password_confirmation" type="password"
                                                        autocomplete="new-password" class="form-control"
                                                        name="password_confirmation" placeholder="Password Confirmation">
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="admin-condition">
                                                <div class="checkbox-theme-default custom-checkbox ">
                                                    <input class="checkbox" type="checkbox" id="admin-1">
                                                    <label for="admin-1">
                                                        <span class="checkbox-text">Creating an account means you’re okay
                                                            with our <a href="#" class="color-primary">Terms of
                                                                Service</a> and <a href="#"
                                                                class="color-primary">Privacy
                                                                Policy</a>
                                                            my preference</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button
                                                    class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                    Create Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End: .card-body -->
                                <div class="admin-topbar">
                                    <p class="mb-0">
                                        Sudah memiliki akun?
                                        <a href="{{ route('login') }}" class="color-primary">
                                            Sign In
                                        </a>
                                    </p>
                                </div><!-- End: .admin-topbar  -->
                            </div><!-- End: .card -->
                        </form>
                    </div><!-- End: .edit-profile -->
                </div><!-- End: .col-xl-5 -->
            </div>
        </div>
    </div><!-- End: .admin-element  -->
@endsection
