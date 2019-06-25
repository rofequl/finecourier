@extends('layout.app')
@section('content')

    @include('inc.slide_area')

<!--================================
    START TRACK & TRACE AREA
=================================-->
<section class="tc_section section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="tc_title"><h4>Please Enter Your Product Code And You Will See Your Product</h4></div>
                <div class="tc_form">
                    <form action="#" method="GET">
                        <div class="tc_input_wrapper">
                            <input name="code" type="text" placeholder="Enter Your Tracking Code">
                            <span class="fa fa-truck"></span>
                            <button class="tc_btn" type="submit">enter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
    END TRACK & TRACE AREA
=================================-->

<!--================================
    START MAP AREA
=================================-->
<div id="google_map"></div>
<!--================================
    END MAP AREA
=================================-->

<!--================================
    START PARTNER
=================================-->
<section class="partner_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="partner_wrapper">
                    <div class="partner_slider">
                        <div class="partner">
                            <img src="images/partner1.png" alt="">
                        </div>
                        <div class="partner">
                            <img src="images/partner2.png" alt="">
                        </div>
                        <div class="partner">
                            <img src="images/partner1.png" alt="">
                        </div>
                        <div class="partner">
                            <img src="images/partner2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
    END PARTNER
=================================-->



<script>
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
        var marker = new google.maps.Marker({
            position: myCenter,
            map: map,
            icon:'images/map-marker1.png'
        });


        var infowindow = new google.maps.InfoWindow({
            content:"united-states"
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

@endsection