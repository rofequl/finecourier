<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('assets/scripts/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    @stack('style')
</head>
<body style="font-family: 'Lato', serif;">


<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('dashboard.inc.header')
    <div class="app-main">
        @include('dashboard.inc.sidebar')

        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')

            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 2
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 3
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <div class="badge badge-success mr-1 ml-0">
                                            <small>NEW</small>
                                        </div>
                                        Footer Link 4
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/user_custom.js')}}"></script>
@stack('scripts')
</body>
</html>
