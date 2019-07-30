<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('pageTitle') - Fine Courier</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    @stack('style')
<!-- bootstrap-progressbar -->
    <link href="{{asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('assets/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="{{asset('assets/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{asset('assets/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
    <!-- Switchery -->
    <link href="{{asset('assets/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{asset('assets/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="//cdn.materialdesignicons.com/3.8.95/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/build/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/build/css/util.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('admin.inc.sidebar')
        @include('admin.inc.header')
        @yield('content')
        @include('admin.inc.footer')

    </div>
</div>

<!-- jQuery -->
<script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('assets/vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('assets/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/iCheck/icheck.min.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('assets/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{asset('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{asset('assets/vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- jQuery Tags Input -->
<script src="{{asset('assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
<!-- Switchery -->
<script src="{{asset('assets/vendors/switchery/dist/switchery.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Parsley -->
<script src="{{asset('assets/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
<!-- Autosize -->
<script src="{{asset('assets/vendors/autosize/dist/autosize.min.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- jQuery autocomplete -->
<script src="{{asset('assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
<!-- starrr -->
<script src="{{asset('assets/vendors/starrr/dist/starrr.js')}}"></script>
@stack('scripts')
<!-- Custom Theme Scripts -->
<script src="{{asset('assets/build/js/custom.js')}}"></script>

</body>
</html>
