<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li>
                    <a href="{{ route('dashboard') }}" class="@if (Request::segment(1) == 'dashboard') active @endif">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title mt-2">
                    <span>Users</span>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}" class="@if (Request::segment(1) == 'dashboard') active @endif">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Users</span>
                    </a>
                </li>
                {{-- <li class="">
                    <a href="sign-up.html">
                        <span class="nav-icon uil uil-sign-out-alt"></span>
                        <span class="menu-text">Sign Up</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
