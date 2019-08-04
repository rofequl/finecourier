<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fine Courier | Admin Login</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route('DriverLoginCheck') }}" method="post">
                    {{csrf_field()}}
                    <h1>Driver Login Form</h1>
                    @if ($errors->any())
                        <ul class="text-left">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(session()->has('message'))
                        <ul class="text-left">
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    @endif
                    <div>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email Id">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1>Fine Courier!</h1>
                            <p>©2016 All Rights Reserved. Fine Courier!</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>
</html>
