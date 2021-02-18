<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $logoImage = App\logo::latest()->take(1)->first();
    @endphp

    <link rel="icon" href="{{asset('upload/logo')}}/{{ $logoImage->image }}" type="image/png" sizes="16x16">

    <title>{{ config('app.name') }} @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    {{-- <link rel="stylesheet" href="{{asset('/')}}dasshbord/dashbord/bower_conponents/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/dist/css/skins/_all-skins.min.css">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{asset('/')}}dashbord/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/css/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{asset('/')}}dashbord/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/')}}dashbord/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!--toastr-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@stack('css')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

@include('dashbord.incl.das_hader')
<!-- Left side column. contains the logo and sidebar -->
@include('dashbord.incl.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header ">
            <h1>
                @yield('das_title')
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <main class="py-3">
            @yield('content')
        </main>

        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2019- @php echo date("Y"); @endphp <a href="http://onlineshop.com.bd/">{{ config('app.name') }}</a>.</strong>
        All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- wrapper -->


<!-- jQuery 3 -->
<script src="{{asset('/')}}dashbord/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}dashbord/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/')}}dashbord/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('/')}}dashbord/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('/')}}dashbord/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}dashbord/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('/')}}dashbord/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}dashbord/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}dashbord/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}dashbord/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('/')}}dashbord/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('/')}}dashbord/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/')}}dashbord/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('/')}}dashbord/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('/')}}dashbord/bower_components/fastclick/lib/fastclick.js"></script>

<script src="{{asset('/')}}dashbord/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dashbord/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}dashbord/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dashbord/dist/js/demo.js"></script>
<script src="{{asset('/')}}dashbord/dist/js/pages/dashboard2.js"></script>

<!--toastr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>
<script type="text/javascript">
    @if (Session::has('success'))
    toastr.success('{{ Session::get('success') }}')
    @endif
    @if (Session::has('info'))
    toastr.info("{{ Session::get('info') }}")
    @endif
    @if (Session::has('warning'))
    toastr.warning('{{ Session::get('warning') }}')
    @endif
    @if (Session::has('error'))
    toastr.error("{{ Session::get('error') }}")
    @endif
</script>

@stack('js')


</body>
</html>


