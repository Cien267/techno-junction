<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Danh sách bài viết</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="ck" name="description" />
    <meta content="ck" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/admin/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/plugins/dropify/css/dropify.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" />
    <!-- Responsive datatable examples -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" />
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/metisMenu.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/albery.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/select2-custom.css') }}" />
    <script type="text/javascript" src="{{ asset('/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
</head>
<body>
<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="/" class="logo">
            <span><img src="{{ asset('/admin/images/logo-sm.png') }}" alt="logo-small" class="logo-sm"></span>
            <span class="topbar-description"> Manager System</span>
        </a>
    </div>
    <!--end logo-->
    <!-- Navbar -->
    @include('admin.elements.header')
</div>
<!-- Top Bar End -->
<div class="page-wrapper">
    <!-- Left Sidenav -->
    @include('admin.elements.sidebar')
    <!-- end left-sidenav-->
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ $titleLayout ?? "" }}</h4>
                    </div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            @include('admin.elements.flash-message')
            @yield('content')
            <!--end row-->
        </div>
        <!-- container -->
        <footer class="footer text-center text-sm-left">
            &copy; 2023 MomChoice.vn <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by coders.any@gmai.com</span>
        </footer>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<script type="text/javascript" src="{{ asset('/admin/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/metisMenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/waves.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/pages/jquery.hospital_dashboard.init.js') }}"></script>
<!-- Parsley js -->
<script type="text/javascript" src="{{ asset('/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/pages/jquery.validation.init.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/plugins/dropify/js/dropify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/pages/jquery.form-upload.init.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/jquery.placepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/albery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/select2.full.min.js') }}"></script>
<script>
    // $('#datatable').DataTable();
    $('.dropify').dropify();
    $(document).ready(function() {
        setTimeout( function (){$('.alert').hide()},3000);
    });
    $(".albery-container").albery({
        speed: 500,
        imgWidth: 600,
    });
</script>
</body>
</html>