
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Truelysell | Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/provider/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('/provider/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/provider/css/all.min.css') }}">

    <!-- Fearther CSS -->
    <link rel="stylesheet" href="{{ asset('/provider/css/feather.css') }}">

    <!-- select CSS -->
    <link rel="stylesheet" href="{{ asset('/provider/css/select2.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('/provider/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/provider/css/style.css') }}">


</head>

<body class="provider-body">


<div class="main-wrapper">

    <!-- Header -->
    <div class="header">
        @include('provider.elements.header')
    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        @include('provider.elements.sidebar')
    </div>
    <!-- /Sidebar -->

    <div class="page-wrapper">
        <div class="content container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Delete Account -->
    <div class="modal fade custom-modal" id="del-account">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 justify-content-between">
                    <h5 class="modal-title">Delete Account</h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button>
                </div>
                <div class="modal-body pt-0">
                    <div class="write-review">
                        <form action="login.html">
                            <p>Are you sure you want to delete this account? To delete your account, Type your password.</p>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" class="form-control pass-input" placeholder="*************">
                                    <span class="toggle-password feather-eye-off"></span>
                                </div>
                            </div>
                            <div class="modal-submit text-end">
                                <a href="#" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Account -->

    <!-- Add Review -->
    <div class="modal fade custom-modal" id="add-review">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header border-bottom-0 justify-content-between">
                    <h5 class="modal-title">Write A Review</h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button>
                </div>
                <div class="modal-body pt-0">
                    <form action="provider-dashboard.html">
                        <div class="write-review">
                            <div class="review-add">
                                <div class="rev-img">
                                    <img src="img/services/service-19.jpg" alt="image">
                                </div>
                                <div class="rev-info">
                                    <h6>Computer Services</h6>
                                    <p>Newyork, USA</p>
                                </div>
                            </div>
                            <div class="form-group form-info">
                                <label class="col-form-label">Rate The Service</label>
                                <div class="rating rating-select mb-0">
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-star"></i></a>
                                </div>
                            </div>
                            <div class="form-group form-info">
                                <label class="col-form-label">Write your Review</label>
                                <textarea class="form-control" rows="4" placeholder="Please write your review"></textarea>
                            </div>
                            <div class="modal-submit text-end">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Review -->

    <!-- Cursor -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /Cursor -->

</div>

<!-- jQuery -->
<script data-cfasync="false" src="{{ asset('/provider/js/email-decode.min.js') }}"></script>
<script src="{{ asset('/provider/js/jquery-3.7.0.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/provider/js/bootstrap.bundle.min.js') }}"></script>

<!-- Fearther JS -->
<script src="{{ asset('/provider/js/feather.min.js') }}"></script>

<!-- select JS -->
<script src="{{ asset('/provider/js/select2.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('/provider/js/moment.min.js') }}"></script>
<script src="{{ asset('/provider/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('/provider/js/jquery.slimscroll.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/provider/js/script.js') }}"></script>

</body>
</html>
