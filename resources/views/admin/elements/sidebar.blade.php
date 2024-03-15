<div class="left-sidenav" style="min-width: 230px !important;max-width: 230px !important">
    <div class="main-menu-inner active" style="left: 0 !important;">
        <div class="menu-body slimscroll">
            <div id="docters" class="main-icon-menu-pane active">
                <div class="title-box">
                    <h6 class="menu-title">Mom Choice</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.setting.setting-info') }}"><i class="dripicons-gear"></i>Cài đặt chung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.setting.list-menu') }}"><i class="dripicons-document-remove"></i>Quản lý menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false"><i class="dripicons-document-new"></i><span class="w-100">Quản lý tin tức</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level mm-collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.notice.list-cat-notice') }}">Chuyên mục tin tức</a></li>
                            <li><a href="{{ route('admin.notice.list-notice') }}">Danh sách bài viết</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.notice.list-news') }}"><i class="dripicons-document-remove"></i>Trang tĩnh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.album.list-album') }}"><i class="dripicons-document-remove"></i>Quản lý Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.feedback.list-feedback') }}"><i class="dripicons-document-remove"></i>Feedbacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.subscribe.list-subscribe') }}"><i class="dripicons-mail"></i>Subscribes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false"><i class="dripicons-document-new"></i><span class="w-100">Cài đặt dữ liệu</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level mm-collapse" aria-expanded="false">
                            <li><a href="/ThemeSettings/list_setting">Theme settings</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false"><i class="dripicons-user"></i><span class="w-100">Quản lý tài khoản</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level mm-collapse" aria-expanded="false">
                            <li>
                                <a href="/admin/Accounts/">Tài khoản admin</a>
                            </li>
                        </ul>
                    </li>
                    <!--end nav-item-->
                </ul>
                <!--end nav-->
            </div>
        </div>
        <!--end menu-body-->
    </div>
    <!-- end main-menu-inner-->
</div>