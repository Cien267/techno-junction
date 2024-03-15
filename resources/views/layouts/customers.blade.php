
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Truelysell | Template</title>

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

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/frontend/css/aos.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">

</head>

<body>

<div class="main-wrapper">

    <!-- Header -->
    <header class="header">
        @include('frontend.elements.header')
    </header>
    <!-- /Header -->

    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Customer Menu -->
                <div class="col-lg-3 theiaStickySidebar">
                    @include('customer.elements.sidebar')
                </div>
                <!-- /Customer Menu -->

                <div class="col-lg-9">
                    @yield('content')
                </div>

            </div>

        </div>
    </div>

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /Cursor -->

</div>

<!-- jQuery -->
<script data-cfasync="false" src="{{ asset('/frontend/js/email-decode.min.js') }}"></script>

<script data-cfasync="false" src="{{ asset('/frontend/js/jquery-3.7.0.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

<!-- Fearther JS -->
<script src="{{ asset('/frontend/js/feather.min.js') }}"></script>

<!-- select JS -->
<script src="{{ asset('/frontend/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('/frontend/js/moment.min.js') }}"></script>

<script src="{{ asset('/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Sticky Sidebar JS -->
<script src="{{ asset('/frontend/js/ResizeSensor.js') }}"></script>

<script src="{{ asset('/frontend/js/theia-sticky-sidebar.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>

</body>
</html>
