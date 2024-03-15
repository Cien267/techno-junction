<!DOCTYPE html><html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>snappic.vn | Nền tảng kết nối hàng nghìn studio và nhiếp ảnh gia</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/frontend/images/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/all.min.css') }}">

    <!-- Fearther CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/feather.css') }}">

    <!-- select CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/select2.min.css') }}">

    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">

    <!-- Aos CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('/frontend/css/jquery.fancybox.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="body-one">

<div class="main-wrapper">

    <!-- Header -->
    @include('frontend.elements.header-panel')
    <header class="header header-one">
        @include('frontend.elements.header')
    </header>
    <!-- /Header -->
    @yield('content')
    <!-- Footer -->
    <footer class="footer">

        @include('frontend.elements.footer')

    </footer>
    <!-- /Footer -->

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /Cursor -->

</div>


<!-- scrollToTop start -->
<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
    </svg>
</div>
<!-- scrollToTop end -->

<!-- jQuery -->

<script data-cfasync="false" src="{{ asset('/frontend/js/jquery-3.7.0.min.js') }}"></script>

<script src="{{ asset('/frontend/js/email-decode.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

<!-- Fearther JS -->
<script src="{{ asset('/frontend/js/feather.min.js') }}"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('/frontend/js/jquery.fancybox.min.js') }}"></script>

<!-- select JS -->
<script src="{{ asset('/frontend/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('/frontend/js/moment.min.js') }}"></script>

<script src="{{ asset('/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Sticky Sidebar JS -->
<script src="{{ asset('/frontend/js/ResizeSensor.js') }}"></script>

<script src="{{ asset('/frontend/js/theia-sticky-sidebar.js') }}"></script>
<!-- Datetimepicker JS -->
<script src="{{ asset('/frontend/js/moment.min.js') }}"></script>

<script src="{{ asset('/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Sticky Sidebar JS -->
<script src="{{ asset('/frontend/js/ResizeSensor.js') }}"></script>

<script src="{{ asset('/frontend/js/theia-sticky-sidebar.js') }}"></script>

<!-- Aos -->
<script src="{{ asset('/frontend/js/aos.js') }}"></script>

<!-- Top JS -->
<script src="{{ asset('/frontend/js/backToTop.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>


</body></html>
