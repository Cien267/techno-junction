
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
        .toggle-password {
            top: 20px !important;
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
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <!-- <div class="login-back">
                            <a href="index.html"><img src="assets/img/icons/undo-icon.svg" class="me-2" alt="icon">Back To Home</a>
                        </div> -->
                        <div class="login-header">
                            <h3>Đặt lại mật khẩu</h3>
                        </div>

                        <!-- Reset Password Form -->
                        <form action="{{route('user.reset-password-post')}}" method="post" class="reset-pw">
                            {{csrf_field()}}
                            <input type="hidden" name="email" value="{{$dataReq['email']}}">
                            <input type="hidden" name="token" value="{{$dataReq['_token']}}">
                            <div class="log-form">
                                <div class="form-group">
                                    <label class="col-form-label">Mật khẩu mới</label>
                                    <div class="pass-group" id="passwordInput">
                                        <input type="password" class="form-control pass-input" placeholder="*************" name="password" id="password">
                                        <span class="toggle-password feather-eye-off"></span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <span id="poor"></span>
                                        <span id="weak"></span>
                                        <span id="strong"></span>
                                        <span id="heavy"></span>
                                    </div>
                                    <div id="passwordInfo">
                                        Sử dụng 8 ký tự trở lên kết hợp chữ cái, số và ký hiệu.</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Xác nhận mật khẩu</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" placeholder="*************" name="confirmPassword">
                                        <span class="toggle-password feather-eye-off"></span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 login-btn" type="submit">Lưu thay đổi</button>
                        </form>
                        <!-- /Reset Password Form -->

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
<script src="{{ asset('/frontend/js/validation.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/frontend/js/script.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.validate.min.js') }}"></script>
<script >
    $(document).ready(function () {
        $(".reset-pw").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password" // Add this line to specify the field to compare with
                },
            },
            messages: {
                password: {
                    required: 'Vui lòng nhập mật khẩu',
                    minlength: 'Vui lòng 8 kí tự trở lên',
                },
                confirmPassword: {
                    required: 'Vui lòng nhập lại mật khẩu',
                    minlength: 'Vui lòng 8 kí tự trở lên',
                    equalTo: 'Mật khẩu xác nhận phải giống mật khẩu đã nhập'
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
