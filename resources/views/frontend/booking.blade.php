
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
    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap-datetimepicker.min.css') }}">
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

    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Booking -->
                <div class="col-lg-10 mx-auto">

                    <!-- Booking Step -->
                    <ul class="step-register row">
                        <li class="active col-md-4">
                            <div class="multi-step-icon">
                                <img src="/frontend/images/calendar-icon.svg" alt="img">
                            </div>
                            <div class="multi-step-info">
                                <h6>Appointment</h6>
                                <p>Choose time & date for the service</p>
                            </div>
                        </li>
                        <li class="col-md-4">
                            <div class="multi-step-icon">
                                <img src="/frontend/images/wallet-icon.svg" alt="img">
                            </div>
                            <div class="multi-step-info">
                                <h6>Payment</h6>
                                <p>Select Payment Gateway</p>
                            </div>
                        </li>
                        <li class="col-md-4">
                            <div class="multi-step-icon">
                                <img src="/frontend/images/book-done.svg" alt="img">
                            </div>
                            <div class="multi-step-info">
                                <h6>Done </h6>
                                <p>Completion of Booking</p>
                            </div>
                        </li>
                    </ul>

                    <!-- /Booking Step -->

                    <!-- Appointment -->
                    <div class="booking-service">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="service-book">
                                    <div class="service-book-img">
                                        <img src="/frontend/images/booking.jpg" alt="img">
                                    </div>
                                    <div class="serv-profile">
                                        <span class="badge">Car Wash</span>
                                        <h2>Car Repair Services</h2>
                                        <ul>
                                            <li class="serv-pro">
                                                <img src="/frontend/images/avatar-01.jpg" alt="img">
                                                <div class="serv-pro-info">
                                                    <h6>Thomas Herzberg</h6>
                                                    <p class="serv-review"><i class="fa-solid fa-star"></i> <span>4.9 </span>(255 reviews)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center">
                                    <div class="col-md-7 col-sm-6">
                                        <div class="provide-box">
                                            <span><i class="feather-phone"></i></span>
                                            <div class="provide-info">
                                                <h6>Phone</h6>
                                                <p>+1 888 888 8888</p>
                                            </div>
                                        </div>
                                        <div class="provide-box">
                                            <span><i class="feather-mail"></i></span>
                                            <div class="provide-info">
                                                <h6>Email</h6>
                                                <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2e5a4641434f5d464b5c544c4b5c496e4b564f435e424b004d4143">[email&#160;protected]</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <div class="provide-box">
                                            <span><i class="feather-map-pin"></i></span>
                                            <div class="provide-info">
                                                <h6>Address</h6>
                                                <p>Hanover, Maryland</p>
                                            </div>
                                        </div>
                                        <div class="provide-box">
                                            <span><img src="/frontend/images/service-icon.svg" alt="img"></span>
                                            <div class="provide-info">
                                                <h6>Service Amount</h6>
                                                <h5>$150.00 </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="book-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">City</label>
                                    <select class="select">
                                        <option>Select City</option>
                                        <option>Tornoto</option>
                                        <option>Texas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">State</label>
                                    <select class="select">
                                        <option>Select State</option>
                                        <option>Tornoto</option>
                                        <option>Texas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Country</label>
                                    <select class="select">
                                        <option>Select Country</option>
                                        <option>US</option>
                                        <option>UK</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Appointment -->


                    <!-- Appointment Date & Time -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="book-title">
                                <h5>Appointment Date</h5>
                            </div>
                            <div id="datetimepickershow"></div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="book-title">
                                        <h5>Appointment Time</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="token-slot mt-2">
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">09.00 AM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">09.30 AM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">10.00 AM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">10.30 AM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">11.00 AM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">11.30 AM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">12.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">12.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">01.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">01.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">02.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">02.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">03.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">03.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">04.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">04.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">05.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">05.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">06.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">06.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">07.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">07.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">08.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">08.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">09.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">09.30 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">10.00 PM</span>
                                    </label>
                                </div>
                                <div class="form-check-inline visits me-0">
                                    <label class="visit-btns">
                                        <input type="radio" class="form-check-input" name="appintment">
                                        <span class="visit-rsn">10.30 PM</span>
                                    </label>
                                </div>
                            </div>
                            <div class="book-submit text-end">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <a href="booking-payment.html" class="btn btn-primary">Book Appointment</a>
                            </div>


                        </div>
                    </div>
                    <!-- /Appointment Date & Time -->

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

<!-- jQuery -->
<script data-cfasync="false" src="{{ asset('/frontend/js/email-decode.min.js') }}"></script>

<script data-cfasync="false" src="{{ asset('/frontend/js/jquery-3.7.0.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

<!-- Fearther JS -->
<script src="{{ asset('/frontend/js/feather.min.js') }}"></script>

<!-- select JS -->
<script src="{{ asset('/frontend/js/select2.min.js') }}"></script>

<script src="{{ asset('/frontend/js/moment.min.js') }}"></script>

<script src="{{ asset('/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>

</body>
</html>
