<!--================================
   START HEADER AREA
   =================================-->

<style>
    .btn-style{
        background-color: #006cb7;
        color: white;
    }

    .btn-style:hover{
        background-color: #000000;
        transition: 1s;
        color: white;
    }
</style>


<!-- start header -->
<header>
    <!-- container start -->
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <div class="tiny_header clearfix">
                <div class="col-md-12">
                    <div class="tiny_header_wrapper">
                        <div class="header_info">
                            <ul>
                                <li><a href="{{route('faq')}}">Faq</a></li>
                                <li><a href="{{route('contact')}}">Help Desk</a></li>
                                <li><a href="{{route('track_trace')}}">Track Shipment</a></li>
                            </ul>
                        </div>

                        <div class="times">
                            <p><i class="fa fa-clock-o"></i> <span class="day">Sat - Thus</span>9 am - 6 pm</p>
                        </div>

                        <div class="social_links">
                            <ul>
                                <li><a href="{{basic_information()->facebook_link}}"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="{{basic_information()->pinterest_link}}"><span class="fa fa-pinterest-p"></span></a></li>
                                <li><a href="{{basic_information()->google_plus_link}}"><span class="fa fa-google-plus"></span></a></li>
                                <li><a href="{{basic_information()->twiter_link}}"><span class="fa fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row end -->

        <!-- row start -->
        <div class="row">
            <div class="header_middle_wrapper clearfix">
                <div class="col-md-3 xs_fullwidth col-xs-3" style="margin-left: -70px">
                    <div class="logo_container">
                        <a href="{{route('home')}}"><img src="{{asset('storage/logo/'.basic_information()->company_logo)}}" alt="logo Here" width="100%" height="48px"></a>
                    </div>
                </div>

                <div class="col-lg-4 xs_fullwidth col-xs-5 col-md-5 col-md-offset-0 col-lg-offset-0">
                    <div class="contact_info">
                        <div class="single_info_section">
                            <span class="fa fa-headphones v_middle"></span>
                            <div class="contact_numbers v_middle right_info">
                                <p><a href="tel:{{basic_information()->phone_number_one}}">{{basic_information()->phone_number_one}}</a></p>
                                <p><a href="tel:{{basic_information()->phone_number_two}}">{{basic_information()->phone_number_two}}</a></p>
                            </div>
                        </div>
                        <div class="single_info_section">
                            <span class="fa fa-envelope v_middle"></span>
                            <div class="contact_numbers right_info v_middle">
                                <p><a href="mailto:{{basic_information()->email}}">{{basic_information()->email}}</a></p>
                                <p><a href="mailto:{{basic_information()->website_link}}">{{basic_information()->website_link}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 xs_fullwidth col-xs-4 col-lg-4" style="width: 40%">
                    <a href="{{route('ShippingRate')}}" class="btn btn-default btn-sm btn-style" style="border-radius: 10px;margin-top: 0;line-height: 27px;width: 112px;">Shipping Request</a>
                    <a href="{{route('BookingShipment')}}" class="btn btn-default btn-sm btn-style" style="border-radius: 10px;margin-top: 0;line-height: 27px;width: 112px;">Booking Shipment</a>
                    <a href="{{route('track_trace')}}" class="btn btn-default btn-sm btn-style" style="border-radius: 10px;margin-top: 0;line-height: 27px;width: 112px;">Track and Trace</a>
                </div>
            </div>
        </div><!-- /.row end -->


    </div><!-- /.container end -->
</header><!-- start header -->
<!--================================
    END HEADER AREA
=================================-->