
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
    <style>
        .custom-error {
            color: red;
        }
    </style>

</head>

<body class="login-body">


<div class="main-wrapper">

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand logo">
                        <img src="frontend/images/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                    <a href="/" class="navbar-brand logo-small">
                        <img src="frontend/images/logo-small.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="link" href="faq.html">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="/">Đăng nhập</a>
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
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-header">
                            <h3>Đăng nhập</h3>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>

                        <!-- Login Form -->
                        <form action="{{route('user.login-post')}}" method="post" class="form-login">
                            {{csrf_field()}}
                            <div class="log-form">
                                <div class="form-group">
                                    <label class="col-form-label">Tên đăng nhập</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="username">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label">Mật khẩu</label>
                                        </div>
                                        <div class="col-auto">
                                            <a class="forgot-link" href="{{route('user.forgot-password')}}">
                                                Quên mật khẩu?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" placeholder="*************" name="password">
                                        <span class="toggle-password feather-eye-off"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="custom_check">
                                            <input type="checkbox" name="rememberme"  class="rememberme">
                                            <span class="checkmark"></span>Nhớ tài khoản
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <button class="btn btn-primary w-100 login-btn" type="submit">Đăng nhập</button>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">Hoặc</span>
                            </div>
                            <div class="social-login">
                                <a href="{{route('login-facebook')}}" class="btn btn-google w-100"><img src="frontend/images/fb.svg" class="me-2" alt="img">Đăng nhập với Facebook</a>
                            </div>
                            <p class="no-acc">Bạn chưa có tài khoản ?  <a href="{{route('user.get-signup')}}">Đăng ký</a></p>
                        </form>
                        <!-- /Login Form -->

                    </div>
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
<script data-cfasync="false" src="{{ asset('/frontend/js/jquery-3.7.0.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

<!-- Fearther JS -->
<script src="{{ asset('/frontend/js/feather.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.validate.min.js') }}"></script>
<script >
    $(document).ready(function () {
        $(".form-login").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                }
            },
            messages: {
                username: {
                    required: 'Vui lòng nhập tên',
                },
                password: {
                    required: 'Vui lòng nhập password',
                    minlength: 'Vui lòng 8 kí tự trở lên',
                }
            },
            errorClass: 'custom-error', // Set the custom class for error messages
            submitHandler:  function(form, event) {
                form.submit()
            }
        })
    })
</script>

</body>
</html>
