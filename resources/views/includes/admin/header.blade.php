<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <div class="logo-area">
                <a class="navbar-brand" href="{{ asset('admin/img/logo-dark.png') }}">
                    <img class="dark" src="{{ asset('admin/img/logo-dark.png') }}" alt="logo">
                    <img class="light" src="{{ asset('admin/img/logo-white.png') }}" alt="logo">
                </a>
                <a href="#" class="sidebar-toggle">
                    <img class="svg" src="{{ asset('admin/img/svg/align-center-alt.svg') }}" alt="img">
                </a>
            </div>
        </div>
        <!-- ends: navbar-left -->
        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img
                                src="{{ asset('admin/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                            <span class="nav-item__title">{{ Auth::user()->name }}<i
                                    class="las la-angle-down nav-item__arrow"></i></span>
                        </a>
                        <div class="dropdown-parent-wrapper">
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="{{ asset('admin/img/author-nav.jpg') }}" alt=""
                                            class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>{{ Auth::user()->name }}</h6>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="">
                                                <i class="uil uil-user"></i> Profile</a>
                                        </li>
                                    </ul>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="nav-author__signout btn btn-md btn-block">Sign
                                            Out</button>
                                    </form>
                                </div>
                            </div>
                            <!-- ends: .dropdown-wrapper -->
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-author-action">
                    <img class="svg" src="{{ asset('admin/img/svg/more-vertical.svg') }}" alt="more-vertical">
                </a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
