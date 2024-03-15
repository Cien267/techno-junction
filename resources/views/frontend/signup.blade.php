
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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">

</head>

<body class="login-body">


<div class="main-wrapper">

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand logo">
                        <img src="frontend/images/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                    <a href="index.html" class="navbar-brand logo-small">
                        <img src="frontend/images/logo-small.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="link" href="faq.html">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="user-login">Login</a>
                    </li>
                    <li class="nav-item dropdown flag-nav">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <img src="frontend/images/flag.png" alt="Flag"> En
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="frontend/images/flags/us.png" alt="Flag" height="16"> En
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="frontend/images/flags/fr.png" alt="Flag" height="16"> French
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="frontend/images/flags/de.png" alt="Flag" height="16"> German
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /Header -->

    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Choose Signup -->
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-header">
                            <h3>Đăng ký</h3>
                        </div>
                        <div class="row">

                            <!-- Provider Signup -->
                            <div class="col-md-6 d-flex">
                                <div class="choose-signup flex-fill">
                                    <h6>Studio</h6>
                                    <div class="choose-img">
                                        <img src="frontend/images/provider.png" alt="image">
                                    </div>
                                    <a href="{{route('provider.get-signup')}}" class="btn btn-secondary w-100">Đăng ký<i class="feather-arrow-right-circle ms-1"></i></a>
                                </div>
                            </div>
                            <!-- /Provider Signup -->

                            <!-- User Signup -->
                            <div class="col-md-6 d-flex">
                                <div class="choose-signup flex-fill mb-0">
                                    <h6>Khách hàng</h6>
                                    <div class="choose-img">
                                        <img src="frontend/images/user.png" alt="image">
                                    </div>
                                    <a href="{{route('user.get-signup')}}" class="btn btn-secondary w-100">Đăng ký<i class="feather-arrow-right-circle ms-1"></i></a>
                                </div>
                            </div>
                            <!-- /User Signup -->

                        </div>

                    </div>
                </div>
                <!-- /Choose Signup -->

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

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>

</body>
</html>
