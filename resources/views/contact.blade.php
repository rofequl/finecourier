@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <!--================================
        START BRANCHES AREA
    =================================-->
    <section class="branches section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-12 starts -->
                <div class="col-md-12">
                    <!-- single address -->
                    @foreach($contact as $contacts)
                        <div class="single_branch">
                            <div class="branch_title"><h4>{{$contacts->contact_title}}</h4></div>
                            {!!$contacts->contact_information!!}
                        </div>
                    @endforeach

                </div><!-- col-md-12 ends -->
            </div><!-- row ends -->
        </div>
    </section>
    <!--================================
        END BRANCHES AREA
    =================================-->

    <!--================================
        START QUOTE AREA
    =================================-->
    <section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">

                <!-- col-md-3 starts -->
                <div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1">
                    <div class="quote_requ_wrapper">
                        <div class="section_title title_center">
                            <div class="title"><h2>SEND US A MESSAGE</h2></div>
                        </div>

                        <div class="contact_form">
                            <form action="#">
                                <div class="form_half left">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="form_half right">
                                    <input type="text" placeholder="Phone">
                                </div>

                                <input type="email" placeholder="Email">

                                <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>

                                <div class="contact_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit" name="button">send message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!--  -->
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        END QUOTE AREA
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
                            @foreach($sponsor as $sponsors)
                                <div class="partner">
                                    <a href="{{$sponsors->url}}"><img
                                                src="{{asset('storage/sponsor/'.$sponsors->image)}}" alt="" height="100%"></a>
                                </div>
                            @endforeach
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

        var markers = [
            ['Afghanistan', 36.779030, 69.949081],
            ['Egypt', 30.028706, 31.249592],
            ['Thailand', 13.736717, 100.523186],
            ['Bangladesh', 23.728783, 90.393791]
        ];
        var myCenter = new google.maps.LatLng(32.294445, 72.349724);

        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 4,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"color": "#edf0f5"}, {"lightness": 17}]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 20}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 17}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 18}]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 16}]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{"color": "#dedede"}, {"lightness": 21}]
                }, {
                    "elementType": "labels.text.stroke",
                    "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
                }, {
                    "elementType": "labels.text.fill",
                    "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]
                }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#fefefe"}, {"lightness": 20}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]
                }]
            };

            var map = new google.maps.Map(document.getElementById("google_map"), mapProp);

            for (var i = 0; i < markers.length; i++) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(markers[i][1], markers[i][2]),
                    map: map,
                    icon: 'images/map-marker' + i + '.png'
                });
            }


            var infowindow = new google.maps.InfoWindow({
                content: "united-states"
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endsection
