
@extends('layout.app')
@section('content')

    @include('inc.slide_area')


    <!--================================
        START QUOTE AREA
    =================================-->
    <section class="regi_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-3 starts -->
                <div class="col-md-8 col-sm-10 col-sm-offset-1  col-md-offset-2">
                    <div class="regi_form_wrapper">
                        <div class="section_title title_center">
                            <div class="title"><h2>create an new account</h2></div>
                        </div>

                        <div class="quote_form">
                            <form action="#">
                                <div class="form_half left">
                                    <input type="text" placeholder="First Name">
                                </div>
                                <div class="form_half right">
                                    <input type="text" placeholder="Last Name">
                                </div>

                                <div class="form_half left">
                                    <input type="email" placeholder="Email">
                                </div>
                                <div class="form_half right">
                                    <input type="tel" placeholder="Phone">
                                </div>

                                <div class="form_half left">
                                    <input type="text" placeholder="Password">
                                </div>
                                <div class="form_half right">
                                    <input type="text" placeholder="Confirm Password">
                                </div>
                                <div class="form_half left">
                                    <input type="text" placeholder="Post Code">
                                </div>
                                <div class="form_half right">
                                    <div class="select_wrapper">
                                        <select name="Parcel_type">
                                            <option value="">Country</option>
                                            <option value="bangladesh">Bangladesh</option>
                                            <option value="thailand">Thailand</option>
                                            <option value="uae">UAE</option>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                </div>

                                <div class="regi_btn_wrapper">
                                    <button class="trust_btn regi_btn" type="submit" name="button">register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        END QUOTE AREA
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