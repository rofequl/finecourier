<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin')}}" class="site_title"><img
                        src="{{asset('storage/logo/'.basic_information()->company_logo)}}"></a>
        </div>

        <div class="clearfix"></div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li><a><i class="fa fa-home"></i> Shipping Price <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminCountry')}}">Country Management</a></li>
                            <li><a href="{{route('AdminInternational')}}">International</a></li>
                            <li><a href="{{route('AdminDomestic')}}">Domestic</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('AdminShipment')}}"><i class="fa fa-location-arrow"></i> Prepare Shipment</a>
                    </li>
                    <li><a><i class="fa fa-home"></i> Website Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('BasicInformation')}}">Basic Information</a></li>
                            <li><a href="{{route('SliderManage')}}">Slider Manage</a></li>
                            <li><a href="{{route('AdminContact')}}">Contact us</a></li>
                            <li><a href="{{route('AdminTestimonial')}}">Testimonials</a></li>
                            <li><a href="{{route('AdminSponsor')}}">Sponsor</a></li>
                            <li><a href="{{route('OurService')}}">Our Service</a></li>
                            <li><a href="{{route('AdminFaq')}}">Faq</a></li>
                            <li><a href="{{route('OurInformation')}}">Our Information</a></li>
                            <li><a href="{{route('AdminNews')}}">News</a></li>
                        </ul>
                    </li>
               </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>