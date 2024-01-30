@extends('layouts.auth-admin')

@section('title', 'Login')

@section('content')
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="index.html">
                                <img class="dark" src="{{ asset('backend/img/logo-dark.png') }}" alt="">
                                <img class="light" src="{{ asset('backend/img/logo-white.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Komodo Voyage Indonesia</h6>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="edit-profile__body">
                                        <div class="form-group mb-25">
                                            <label for="username">Username or Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="name@example.com">
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-field">password</label>
                                            <div class="position-relative">
                                                <input id="password" type="password" required
                                                    autocomplete="current-password" class="form-control" name="password"
                                                    placeholder="Password">
                                                <div
                                                    class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="admin-condition">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                                <input class="checkbox" type="checkbox" id="check-1">
                                                <label for="check-1">
                                                    <span class="checkbox-text">Keep me logged in</span>
                                                </label>
                                            </div>
                                            <a href="forget-password.html">forget password?</a>
                                        </div>
                                        <div
                                            class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                            <button type="submit"
                                                class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                sign in
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- End: .card-body -->
                            </form>
                            <div class="admin-topbar">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="color-primary">
                                        Sign up
                                    </a>
                                </p>
                            </div><!-- End: .admin-topbar  -->
                        </div><!-- End: .card -->
                    </div><!-- End: .edit-profile -->
                </div><!-- End: .col-xl-5 -->
            </div>
        </div>
    </div>

@endsection
