<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin')}}" class="site_title"><img
                        src="{{asset('storage/logo/'.basic_information()->company_logo)}}"></a>
        </div>

        <div class="clearfix"></div>
        <br/>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Driver Dashboard</a>
                    </li>
                    <li><a href="{{route('DriverContainer')}}"><i class="fa mdi mdi-truck-fast"></i> Shipment</a>
                    </li>
                    <li><a href="#"><i class="fa mdi mdi-account"></i> Profile</a>
                    </li>
                    <li><a href="#"><i class="fa mdi mdi-settings-box"></i> Setting</a>
                    </li>
                    <li><a href="{{route('DriverLogout')}}"><i class="fa mdi mdi-logout-variant"></i> Logout</a>
                    </li>
               </ul>
            </div>

        </div>
    </div>
</div>
