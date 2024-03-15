
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
                        <li class="active col-md-4">
                            <div class="multi-step-icon">
                                <span><img src="/frontend/images/wallet-icon.svg" alt="img"></span>
                            </div>
                            <div class="multi-step-info">
                                <h6>Payment</h6>
                                <p>Select Payment Gateway</p>
                            </div>
                        </li>
                        <li class="col-md-4">
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

                    <!-- Booking Payment -->
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="pay-title">Payment Methods</h5>
                            <div class="payment-card payment-bg">
                                <div class="payment-head">
                                    <div class="payment-title">
                                        <label class="custom_radio">
                                            <input type="radio" name="payment"  class="card-payment" checked="">
                                            <span class="checkmark"></span>
                                        </label>
                                        <h6>Wallet</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-card">
                                <div class="payment-head">
                                    <div class="payment-title">
                                        <label class="custom_radio">
                                            <input type="radio" name="payment" class="card-payment">
                                            <span class="checkmark"></span>
                                        </label>
                                        <h6>Cash On Delivery</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-card">
                                <div class="payment-head">
                                    <div class="payment-title">
                                        <label class="custom_radio credit-card-option" >
                                            <input type="radio" name="payment" class="card-payment">
                                            <span class="checkmark"></span>
                                        </label>
                                        <h6>Credit / Debit Card</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-list" style="display:none">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Name on Card</label>
                                            <input class="form-control" type="text" placeholder="Enter Name on Card">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="col-form-label">Card Number</label>
                                            <input class="form-control" placeholder="**** **** **** ****" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <div class="form-group">
                                            <label class="col-form-label">&nbsp;</label>
                                            <img src="/frontend/images/payment-card.png" class="img-fluid" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Expiration date</label>
                                            <input class="form-control" placeholder="MM/YY" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Security code</label>
                                            <input class="form-control" placeholder="CVV" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="pay-title">Booking Summary</h5>
                            <div class="summary-box">
                                <div class="booking-info">
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
                                                </li>
                                                <li class="serv-review"><i class="fa-solid fa-star"></i> <span>4.9 </span>(255 reviews)</li>
                                                <li class="service-map"><i class="feather-map-pin"></i> Alabama, USA</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-summary">
                                    <ul class="booking-date">
                                        <li>Date <span>07/09/2023</span></li>
                                        <li>Time <span>12.30 Pm - 01. 00 PM</span></li>
                                        <li>Service Provider <span>Thomas Herzberg</span></li>
                                    </ul>
                                    <ul class="booking-date">
                                        <li>Subtotal <span>$150.00</span></li>
                                        <li>Coupoun Discount <span>$5.00</span></li>
                                        <li>Services Charges <span>$3.00</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">$148.00</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-coupon">
                                <div class="form-group w-100">
                                    <div class="coupon-icon">
                                        <input type="text" class="form-control" placeholder="Coupon Code">
                                        <span><img src="/frontend/images/coupon-icon.svg" alt="image"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button  class="btn btn-primary apply-btn">Apply</button>
                                </div>
                            </div>
                            <div class="save-offer">
                                <p><i class="fa-solid fa-circle-check"></i> Your total saving on this order $5.00</p>
                            </div>
                            <div class="booking-pay">
                                <a href="booking-done.html" class="btn btn-primary btn-pay w-100">Proceed to Pay $148</a>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-skip">Skip</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Payment -->

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
