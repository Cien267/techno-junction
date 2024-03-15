<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Đăng Nhập hệ thống MomChoice.vn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="ck" name="description" />
    <meta content="ck" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/admin/images/favicon.ico') }}">
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/metisMenu.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/style.css') }}" />
</head>
<body class="account-body accountbg">
<!-- Log In page -->
<div class="row vh-100 ">
    <div class="col-12 align-self-center">
        <div class="auth-page">
            <div class="card auth-card shadow-lg">
                <div class="card-body">
                    <div class="px-3">
                        <div class="auth-logo-box">
                            <a href="/" class="logo logo-admin"><img src="{{ asset('/admin/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo"></a>
                        </div>
                        <!--end auth-logo-box-->
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5">Hệ thống quản lý MomChoice.vn</h4>
                            <p class="text-muted mb-0">Đăng nhập hệ thống.</p>
                        </div>
                        <!--end auth-logo-text-->
                        <form class="form-horizontal auth-form my-4 needs-validation" action="" novalidate method="post">
                            @csrf
                            <!-- Login basic -->
                            @if(\Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ \Session::get('success') }}
                                    </div>
                                </div>
                            @endif
                            {{ \Session::forget('success') }}
                            @if(\Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ \Session::get('error') }}
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="username">Tên Đăng Nhập</label>
                                <div class="input-group mb-3">
                                 <span class="auth-form-icon">
                                 <i class="dripicons-user"></i>
                                 </span>
                                    <input name="username" value="" type="text" class="form-control" id="username" placeholder="Điền tên đăng nhập" required>
                                    <div class="invalid-feedback">
                                        Điền thông tin tài khoản.
                                    </div>
                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="userpassword">Mật khẩu</label>
                                <div class="input-group mb-3">
                                 <span class="auth-form-icon">
                                 <i class="dripicons-lock"></i>
                                 </span>
                                    <input name="password" value="" type="password" class="form-control" id="userpassword" placeholder="Điền mật khẩu" required>
                                    <div class="invalid-feedback">
                                        Điền thông tin  mật khẩu.
                                    </div>
                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-switch switch-success">
                                        <input name="remember" type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                        <label class="custom-control-label text-muted" for="customSwitchSuccess">Lưu thông tin</label>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-sm-6 text-right">
                                    <a href="#" class="text-muted font-13"><i class="dripicons-lock"></i> Quên mật khẩu?</a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->
                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Đăng Nhập <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->
                        </form>
                        <!--end form-->
                    </div>
                    <!--end /div-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end auth-page-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<!-- End Log In page -->
<script type="text/javascript" src="{{ asset('/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/metisMenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/waves.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/jquery.slimscroll.min.js') }}"></script>
<!-- Parsley js -->
<script type="text/javascript" src="{{ asset('/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/pages/jquery.validation.init.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/jquery.core.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/app.js') }}"></script>
</body>
</html>