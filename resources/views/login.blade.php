@extends('layout.app')
@section('content')

    @include('inc.slide_area')


<!--================================
    START LOGIN AREA
=================================-->
<section class="login_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <!-- row starts -->
        <div class="row">
            <!-- col-md-3 starts -->
            <div class="col-md-5 col-sm-8 col-sm-offset-2 col-md-offset-3">
                <div class="regi_form_wrapper">
                    <div class="login_text">
                        <p>If you have an account with Fine Courier , please log in.</p>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    @if(session()->has('login_error'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('login_error') }}
                        </div>
                    @endif
                    <div class="login_form">
                        <form action="{{route('LoginCheck')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Email" name="email">
                            <input type="password" placeholder="Password" name="password">
                            <div class="rem_for">
                                <input id="remeber" type="checkbox" name="remember_me" value=""><label for="remeber"><span></span>Remember Me</label>
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="login_content">
                                <button type="submit" class="trust_btn">Log in</button>
                                <p>don't have an account? <a href="{{route('register')}}">register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- col-md-3 ends -->
        </div><!-- /.row ends -->
    </div><!-- container ends -->
</section>
<!--================================
    END LOGIN AREA
=================================-->



<script>

    var markers = [
        ['Afghanistan', 36.779030, 69.949081],
        ['Egypt', 	30.028706, 31.249592],
        ['Thailand', 13.736717, 100.523186],
        ['Bangladesh', 23.728783, 	90.393791]
    ];
    var myCenter=new google.maps.LatLng(32.294445, 72.349724);
    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:4,
            scrollwheel: false,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#edf0f5"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
        };

        var map = new google.maps.Map(document.getElementById("google_map"),mapProp);

        for( var i=0; i < markers.length; i++){
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[i][1], markers[i][2]),
                map: map,
                icon:'images/map-marker'+i+'.png'
            });
        }


        var infowindow = new google.maps.InfoWindow({
            content:"united-states"
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

@endsection
