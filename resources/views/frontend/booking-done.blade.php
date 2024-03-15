
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Truelysell | Template</title>

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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">
</head>

<body class="mt-0">

<div class="main-wrapper">
    <div class="bg-img">
        <img src="/frontend/images/work-bg-03.png" alt="img" class="bgimg1">
        <img src="/frontend/images/work-bg-03.png" alt="img" class="bgimg2">
        <img src="/frontend/images/feature-bg-03.png" alt="img" class="bgimg3">
    </div>

    <div class="content book-content">
        <div class="container">
            <div class="row">

                <!-- Booking -->
                <div class="col-lg-10 mx-auto">

                    <!-- Booking Step -->
                    <ul class="step-register row">
                        <li class="activate col-md-4">
                            <div class="multi-step-icon">
                                <span><img src="/frontend/images/calendar-icon.svg" alt="img"></span>
                            </div>
                            <div class="multi-step-info">
                                <h6>Appointment</h6>
                                <p>Choose time & date for the service</p>
                            </div>
                        </li>
                        <li class="activate col-md-4">
                            <div class="multi-step-icon">
                                <span><img src="/frontend/images/wallet-icon.svg" alt="img"></span>
                            </div>
                            <div class="multi-step-info">
                                <h6>Payment</h6>
                                <p>Select Payment Gateway</p>
                            </div>
                        </li>
                        <li class="active col-md-4">
                            <div class="multi-step-icon">
                                <span><img src="/frontend/images/book-done.svg" alt="img"></span>
                            </div>
                            <div class="multi-step-info">
                                <h6>Done </h6>
                                <p>Completion of Booking</p>
                            </div>
                        </li>
                    </ul>
                    <!-- /Booking Step -->

                    <!-- Booking Done -->
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="booking-done">
                                <h6>Successfully Completed Payment</h6>
                                <p>Your Booking has been Successfully Competed</p>
                                <div class="book-submit">
                                    <a href="index.html" class="btn btn-primary"><i class="feather-arrow-left-circle"></i> Go to Home</a>
                                    <a href="#" class="btn btn-secondary"><i class="fa-solid fa-calendar-days me-2"></i>Add to Calender</a>
                                    <a href="customer-booking.html" class="btn btn-secondary">Booking History</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="booking-done">
                                <img src="/frontend/images/booking-done.png" class="img-fluid" alt="image">
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Done -->

                </div>
                <!-- /Booking -->

            </div>
        </div>
    </div>

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /Cursor -->

</div>

<script data-cfasync="false" src="{{ asset('/frontend/js/jquery-3.7.0.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

<!-- Fearther JS -->
<script src="{{ asset('/frontend/js/feather.min.js') }}"></script>

<!-- select JS -->
<script src="{{ asset('/frontend/js/select2.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>

</body>
</html>
