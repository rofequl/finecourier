<div class="col-md-3 left_col menu_fixed">
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
                    <li><a><i class="fa mdi mdi-google-maps"></i> Country Manage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminCountry')}}">Country</a></li>
                            <li><a href="{{route('AdminState')}}">State</a></li>
                            <li><a href="{{route('AdminCity')}}">City</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa mdi mdi-export"></i> Shipping Price <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminInternational')}}">International</a></li>
                            <li><a href="{{route('AdminDomestic')}}">Domestic</a></li>
                            <li><a href="{{route('AdminShippingRate')}}">Shipping Price Calculate</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa mdi mdi-cube-send"></i> Shipment <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminShipment')}}">Shipment List</a></li>
                            <li><a href="{{route('AdminBookingRequest')}}">Booking Request</a></li>
                            <li><a href="{{route('AdminCreateShipping')}}">Create a new shipment</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa mdi mdi-book-multiple"></i> Manage Shipment <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminManageShipmentAll')}}">All</a></li>
                            <li><a href="{{route('AdminManageShipmentPending')}}">Pending</a></li>
                            <li><a href="{{route('AdminManageShipmentReject')}}">Rejected</a></li>
                            <li><a href="{{route('AdminManageShipmentDelivered')}}">Delivered</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa mdi mdi-currency-usd"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminBilling')}}">Billing</a></li>
                            <li><a href="{{route('AdminPickup')}}">Payments</a></li>
                        </ul>
                    </li>
                    </li>
                    <li><a href="{{route('AdminContainer')}}"><i class="fa mdi mdi-package-variant-closed"></i> Container</a>
                    </li>
                    <li><a><i class="fa mdi mdi-truck-fast"></i> Driver <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('AdminDriverList')}}">Driver List</a></li>
                            <li><a href="{{route('AdminContainerDriver')}}">Driver by Container</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('AdminCustomerList')}}"><i class="fa mdi mdi-account-multiple-plus"></i> Customer List</a>
                    </li>
                    <li><a><i class="fa mdi mdi-settings-box"></i> Website Management <span class="fa fa-chevron-down"></span></a>
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
