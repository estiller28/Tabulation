<nav class="navbar sticky-top navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
{{--    @role('Admin')--}}
{{--    <b>Municipal Agriculture Office - Bulan</b>--}}

{{--    @else--}}
{{--        <b>{{ Auth::user()->barangay->barangay_name }}</b>--}}
{{--        @endrole--}}

    Tabulation System

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <span>Hi, </span>
                        <span class="text-dark">{{ auth()->user()->name }}!</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">

                        @role('Admin')
{{--                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="align-middle me-1" data-feather="user"></i> Account Settings</a>--}}
                        @else
{{--                            <a class="dropdown-item" href="{{ route('co-admin-user.profile') }}"><i class="align-middle me-1" data-feather="user"></i>Account Information</a>--}}
                            @endrole

{{--                            <div class="dropdown-divider"></div>--}}
                            <form action="{{ route('logout') }} " method="post">
                                @csrf
                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"  onclick="event.preventDefault();
                           this.closest('form').submit();"> Log out</a>
                            </form>
                    </div>
                </li>
            </ul>
        </div>
</nav>
