<?php
    $user = auth()->guard('web')->user();
?>
<div class="header-left">
    <div class="sidebar-logo">
        <a href="{{route('home.index')}}">
            <img src="/provider/img/logo.svg" class="img-fluid logo" alt="Logo">
        </a>
        <a href="{{route('home.index')}}">
            <img src="/provider/img/logo-small.png" class="img-fluid logo-small" alt="Logo">
        </a>
    </div>
    <div class="siderbar-toggle">
        <label class="switch" id="toggle_btn">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
    </div>
</div>
<a class="mobile_btns" id="mobile_btns" href="javascript:void(0);">
    <i class="fas fa-align-left"></i>
</a>
<div class="header-split">
    <div class="page-headers">
        <div class="search-bar">
            <span><i class="feather-search"></i></span>
            <input type="text" placeholder="Search" class="form-control">
        </div>
    </div>
    <ul class="nav user-menu noti-pop-detail">
        <!-- Notifications -->

        <li class="nav-item has-arrow dropdown-heads">
            <a href="#">
                <i class="feather-moon"></i>
            </a>
        </li>
        <!-- Notifications -->
        <li class="nav-item  has-arrow dropdown-heads dropdown logged-item noti-nav noti-wrapper">
            <a href="#" class="dropdown-toggled nav-link notify-link" data-bs-toggle="dropdown">
                <span class="noti-message">1</span>
                <img src="/provider/img/bell-icon.svg" alt="Bell">
            </a>
            <div class="dropdown-menu notify-blk notifications">
                <div class="topnav-dropdown-header">
                    <div>
                        <p class="notification-title">Notifications <span> 3 </span></p>
                    </div>
                    <a href="javascript:void(0)" class="clear-noti"><i class="fa-regular fa-circle-check"></i> Mark all as read </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="notification.html">
                                <div class="media noti-img d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle img-fluid" alt="User Image" src="/provider/img/notifications/avatar-01.jpg">
												</span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details">Lex Murphy left 6 comments on Isla Nublar SOC2 compliance report</p>
                                        <p class="noti-time"><span class="notification-time">1m ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="notification.html">View All Notifications <img src="/provider/img/arrow-right-01.svg" alt="Arrow"></a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->
        <li class="nav-item  has-arrow dropdown-heads ">
            <a href="#" class="win-maximize">
                <i class="feather-maximize" ></i>
            </a>
        </li>

        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow account-item">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <div class="user-infos">
								<span class="user-img">
									<img src="/provider/img/avatar-02.jpg" class="rounded-circle" alt="User Image">
								</span>
                    <div class="user-info">
                        <h6>{{$user->username}}</h6>
                        <p>{{$user->email}}</p>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end emp">
                <a class="dropdown-item" href="{{route('provider.profile')}}">
                    <i class="feather-user me-2"></i> Profile
                </a>
                <a class="dropdown-item" href="{{route('user.logout')}}">
                    <i class="feather-log-out me-2"></i> Đăng xuất
                </a>
            </div>
        </li>
        <!-- /User Menu -->
    </ul>
</div>
