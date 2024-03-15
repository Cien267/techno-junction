<?php
    $user = auth()->guard('web')->user();
?>
<div class="container">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
            </a>
            <a href="{{route('home.index')}}" class="navbar-brand logo">
                <img src="/frontend/images/logo.svg" class="img-fluid" alt="Logo">
            </a>
            <a href="{{route('home.index')}}" class="navbar-brand logo-small">
                <img src="/frontend/images/logo-small.png" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index.html" class="menu-logo">
                    <img src="/frontend/images//logo.svg" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
            </div>
            <ul class="main-nav">
{{--                <li class="has-submenu active">--}}
{{--                    <a href="javascript:void(0);">Services <i class="fas fa-chevron-down"></i></a>--}}
{{--                    <ul class="submenu">--}}
{{--                        <li><a href="services/service-grid.html">Service Grid</a></li>--}}
{{--                        <li><a href="services/service-list.html">Service List</a></li>--}}
{{--                        <li class="has-submenu">--}}
{{--                            <a href="javascript:void(0);">Service Details</a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li><a href="services/service-details.html">Service Details 1</a></li>--}}
{{--                                <li><a href="service-details2.html">Service Details 2</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="search.html">Search</a></li>--}}
{{--                        <li class="has-submenu">--}}
{{--                            <a href="javascript:void(0);">Providers</a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li><a href="provider/providers.html">Providers List</a></li>--}}
{{--                                <li><a href="provider/provider-details.html">Providers Details</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="services/create-service.html">Create Service</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <li class="has-submenu">
                    <a href="#">News <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/category/tin-tuc">Chuyên mục tin tức</a></li>
                        <li><a href="/view/ABC">Chi tiết tin tức</a></li>
                        <li><a href="/news/ABC">Trang tĩnh</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Provider <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('frontend.providers') }}">Provider</a></li>
                        <li><a href="{{ route('frontend.detail-provider','ABCD') }}">Detail Provider</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">photographer <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('frontend.photographers') }}">Photographer</a></li>
                        <li><a href="{{ route('frontend.detail-photographer','ABCD') }}">Detail photographer</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Booking <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('frontend.booking') }}">Booking</a></li>
                        <li><a href="{{ route('frontend.booking-payment') }}">Payment Booking</a></li>
                        <li><a href="{{ route('frontend.booking-done') }}">Payment done</a></li>
                    </ul>
                </li>

                @if(!$user)
                    <li><a href="{{ route('provider.dashboard') }}">Provider site</a></li>
                    <li><a href="{{ route('customer.dashboard') }}">Customers site</a></li>
                @else
                    @if($user->isProvider())
                        <li><a href="{{ route('provider.dashboard') }}">Provider site</a></li>
                    @endif

                    @if($user->isUser())
                        <li><a href="{{ route('customer.dashboard') }}">Customers site</a></li>
                    @endif
                @endif

            </ul>
        </div>

        @if(auth()->guard('web')->user())

            <ul class="nav header-navbar-rht noti-pop-detail">

                <!-- Chat -->
                <li class="nav-item logged-item msg-nav">
                    <a href="customer-chat.html" class="nav-link">
                        <img src="{{asset('frontend/images/message-icon.svg')}}" alt="Message Icon">
                    </a>
                </li>
                <!-- /Chat -->

                <!-- Notifications -->
                <li class="nav-item dropdown logged-item noti-nav noti-wrapper">
                    <a href="#" class="dropdown-toggle nav-link notify-link" data-bs-toggle="dropdown">
                        <span class="noti-message">1</span>
                        <img src="{{asset('frontend/images/bell-icon.svg')}}" alt="Bell">
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
														<img class="avatar-img rounded-circle img-fluid" alt="User Image" src="{{asset('frontend/images/avatar-01.jpg')}}">
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
                            <a href="notification.html">View All Notifications <img src="{{asset('frontend/images/arrow-right-01.svg')}}" alt="Arrow"></a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow account-item">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <div class="user-infos">
									<span class="user-img">
										<img src="{{asset('frontend/images/avatar-02.jpg')}}" class="rounded-circle" alt="User Image">
									</span>
                            <div class="user-info">
                                <h6>{{$user->username}}</h6>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end emp">
                        <a class="dropdown-item" href="{{route('user.profile')}}">
                            <i class="feather-user me-2"></i> Profile
                        </a>
                        <a class="dropdown-item" href="{{route('user.logout')}}">
                            <i class="feather-log-out me-2"></i> Đăng xuất
                        </a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
        @else
            <ul class="nav header-navbar-rht">
                <li class="nav-item">
                    <a class="nav-link header-reg" href="/user-signup">Đăng ký</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{route('user.get-login')}}"><i class="fa-regular fa-circle-user me-2"></i>Đăng nhập</a>
                </li>
            </ul>

        @endif
    </nav>
</div>
