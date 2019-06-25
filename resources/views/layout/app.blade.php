<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fine - {{$title}}</title>

    <!-- owl carousel css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>


    <!-- font icofont -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:300,400,400i,700,900" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

    <!-- animte css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}"/>

    <!-- camera css goes here -->
    <link rel="stylesheet" href="{{asset('css/camera.css')}}">

    <!-- venobox css goes here -->
    <link rel="stylesheet" href="{{asset('css/venobox.css')}}">

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('style.css')}}"/>

    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
</head>
<body class="home1">

<!-- preloader -->
<div class="preloader-bg">
    <div class="preloader-container">
        <div class="my-preloader"><img src="{{asset('images/favicon.png')}}" alt="preloader"></div>
    </div>
</div>

@include('inc.header')
@yield('content')
@include('inc.footer')

<!--//////////////////// JS GOES HERE ////////////////-->

<!-- jquery latest version -->
<script src="{{asset('js/jquery-1.12.3.js')}}"></script>

<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- jquery easing 1.3 -->
<script src="{{asset('js/jquery.easing1.3.js')}}"></script>

<!-- Owl carousel js-->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<!-- venobox js -->
<script src="{{asset('js/venobox.min.js')}}"></script>

<!-- Isotope js-->
<script src="{{asset('js/isotope.js')}}"></script>

<!-- Pakcery layout js-->
<script src="{{asset('js/packery.js')}}"></script>

<!-- waypoint js -->
<script src="{{asset('js/waypoints.min.js')}}"></script>

<!-- google map js -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<!-- smoothscroll js -->
<script src="{{asset('js/jqury.smooth-scroll.min.js')}}"></script>

<!-- jquery camera slider js -->
<script src="{{asset('js/jquery.camera.min.js')}}"></script>
<!-- Counter up -->
<script src="{{asset('js/jquery.counterup.js')}}"></script>

<!-- Waypoint -->
<script src="{{asset('js/waypoints.min.js')}}"></script>

<!-- Main js -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
