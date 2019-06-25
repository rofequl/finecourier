@extends('layout.app')
@section('content')

    @include('inc.slide_area')

<!--================================
    START SLIDER AREA
=================================-->
<section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <!-- row starts -->
        <div class="row">
            <!-- col-md-3 starts -->
            <div class="col-md-3 col-sm-4">
                <div class="office_schedule">
                    <div class="section_title">
                        <div class="title"><h2>OPENING HOURS</h2></div>
                    </div>

                    <ul>
                        <li><span class="day">Sunday</span><span class="time">09:30 am-8:30 pm</span></li>
                        <li><span class="day">Monday</span><span class="time">09:30 am-8:30 pm</span></li>
                        <li><span class="day">Tuesday</span><span class="time">09:30 am-8:30 pm</span></li>
                        <li><span class="day">Wednesday</span><span class="time">09:30 am-8:30 pm</span></li>
                        <li><span class="day">Thursday</span><span class="time">09:30 am-8:30 pm</span></li>
                        <li><span class="day">Friday</span><span class="time">09:30 am-8:30 pm</span></li>
                        <li><span class="day">saturday</span><span class="time">09:30 am-8:30 pm</span></li>
                    </ul>
                </div>
            </div><!-- /.col-md-3 ends -->

            <!-- col-md-3 starts -->
            <div class="col-md-8 col-sm-7 col-sm-offset-1 col-md-offset-1">
                <div class="quote_requ_wrapper">
                    <div class="section_title">
                        <div class="title"><h2>GET A FREE QUOTE</h2></div>
                    </div>

                    <div class="sub_content">
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam
                            littera gothica quanunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula quarta decima
                            et quinta.</p>
                    </div>

                    <div class="quote_form">
                        <form action="#">
                            <div class="form_half left">
                                <input type="text" placeholder="Name">
                            </div>
                            <div class="form_half right">
                                <input type="tel" placeholder="Phone">
                            </div>

                            <input type="email" placeholder="Email">

                            <div class="form_half left">
                                <input type="text" placeholder="From">
                            </div>
                            <div class="form_half right">
                                <input type="tel" placeholder="To">
                            </div>
                            <div class="form_half left">
                                <div class="select_wrapper">
                                    <select name="Parcel_type">
                                        <option value="">Parcel type</option>
                                        <option value="documents">Documents</option>
                                        <option value="goods">Goods</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                </div>
                            </div>
                            <div class="form_half right">
                                <div class="select_wrapper">
                                    <select name="service_type">
                                        <option value="">Service type</option>
                                        <option value="documents">Express</option>
                                        <option value="goods">Regular</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                </div>
                            </div>
                            <div class="form_half left">
                                <input type="text" placeholder="Height">
                            </div>
                            <div class="form_half right">
                                <input type="tel" placeholder="Weight">
                            </div>

                            <div class="form_half left">
                                <input type="text" placeholder="ZIP">
                            </div>
                            <div class="form_half right">
                                <input class="datepicker" type="tel" placeholder="Shipping On">
                            </div>

                            <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>

                            <div class="quote_btn_wrapper">
                                <button class="trust_btn qute_sbmt" type="submit" name="button">send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- col-md-3 ends -->
        </div><!-- /.row ends -->
    </div><!-- container ends -->
</section>
<!--================================
    START SLIDER AREA
=================================-->

<!--================================
    START SLIDER AREA
=================================-->
<div id="google_map"></div>
<!--================================
    START SLIDER AREA
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