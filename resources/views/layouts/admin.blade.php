<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name', 'Campus Connect') }}</title>
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->
    @include('includes.admin.css')
    <!-- endinject -->
    @stack('styles')

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/img/favicon.png') }}">

    <!-- Fonts -->
    @include('includes.admin.fonts')

</head>

<body class="layout-light side-menu">
    @stack('scripts-before')
    <div class="mobile-author-actions"></div>
    @include('includes.admin.header')
    <main class="main-content">
        @include('includes.admin.sidebar')
        <div class="contents">
            <div class="container-fluid">
                <div class="social-dash-wrap">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('includes.admin.footer')
    </main>
    @include('includes.admin.overlayer')
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>
    <!-- inject:js-->
    @include('includes.admin.scripts')
    <!-- endinject-->
    @stack('scripts')
</body>

</html>
