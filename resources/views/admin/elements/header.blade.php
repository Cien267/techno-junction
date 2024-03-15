<nav class="navbar-custom">
    <ul class="list-unstyled topbar-nav float-right mb-0">
        <li class="hidden-sm">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript: void(0);" role="button"
               aria-haspopup="false" aria-expanded="false">
                Viet Nam <img src="/images/vn.png" class="ml-2" height="16" alt=""/> <i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="javascript: void(0);"><span> Viet Nam </span>
                    <img src="/images/vn.png" alt="" class="ml-2 float-right" height="14"/>
                </a>
            </div>
        </li>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <img src="/images/user-icon.png" alt="profile-user" class="rounded-circle" />
                <span class="ml-1 nav-user-name hidden-sm">admin<i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/info_account"><i class="dripicons-user text-muted mr-2"></i> Tài khoản</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
            </div>
        </li>
    </ul>
    <!--end topbar-nav-->
    <ul class="list-unstyled topbar-nav mb-0">
        <li>
            <button class="button-menu-mobile nav-link waves-effect waves-light">
                <i class="dripicons-menu nav-icon"></i>
            </button>
        </li>
        <li class="hide-phone app-search">
        </li>
    </ul>
</nav>