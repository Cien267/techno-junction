<?php
$user = auth()->guard('web')->user();
?>
<div class="settings-widget">
    <div class="settings-header">
        <div class="settings-img">
            <img src="/frontend/images/avatar-02.jpg" alt="user">
        </div>
        <h6>{{$user->username}}</h6>
        <p>Member Since Sep 2021</p>
    </div>
    <div class="settings-menu">
        <ul>
            <li>
                <a href="{{ route('customer.dashboard') }}" class="active">
                    <i class="feather-grid"></i> <span>Dashboard</span>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="customer-booking.html">--}}
{{--                    <i class="feather-smartphone"></i> <span>Bookings</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="customer-favourite.html">--}}
{{--                    <i class="feather-heart"></i> <span>Favorites</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="customer-wallet.html">--}}
{{--                    <i class="feather-credit-card"></i>  <span>Wallet</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="customer-reviews.html">--}}
{{--                    <i class="feather-star"></i> <span>Reviews</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="customer-chat.html">--}}
{{--                    <i class="feather-message-circle"></i> <span>Chat</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="customer-profile.html">--}}
{{--                    <i class="feather-settings"></i> <span>Settings</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
                <a href="index.html">
                    <i class="feather-log-out"></i> <span>Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</div>
