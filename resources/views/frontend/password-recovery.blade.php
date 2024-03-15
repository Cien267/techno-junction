
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
                @if(!empty(session('success')))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                    @if(!empty(session('error')))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                <!-- Password Recovery -->
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-header">
                            <h3>Khôi phục mật khẩu</h3>
                            <p>
                                Nhập email của bạn và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn.</p>
                        </div>

                        <form action="{{route('user.sendmail-reset-password')}}" method="post" class="form-request-pw">
                            {{csrf_field()}}
                            <div class="log-form">
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="youremail@gmail.com" name="email">
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 login-btn" type="submit">Gửi</button>
                            <p class="no-acc mt-0"> Nhớ mật khẩu ?  <a href="{{route('user.get-login')}}">Đăng nhập</a></p>
                        </form>
                    </div>
                </div>
                <!-- /Password Recovery -->

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
        $(".form-request-pw").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },

            },
            messages: {
                email: {
                    required: 'Vui lòng nhập email',
                    email: "Email không hợp lệ",
                },

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
