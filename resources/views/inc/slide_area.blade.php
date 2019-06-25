<!--================================
    START SLIDER AREA
=================================-->
<section class="breadcrumb reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">

    <div class="breadcrumb_content">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-12 starts -->
                <div class="col-md-12">
                    <div class="breadcrumb_title_wrapper">
                        <div class="page_title">
                            <h1>{{$title}}</h1>
                        </div>
                        <ul class="bread_crumb">
                            <li><a href="{{route('home1')}}">Home</a></li>
                            <li class="bread_active">{{$title}}</li>
                        </ul>
                    </div>
                </div><!-- col-md-12 ends -->
            </div>
            <!-- /.row ends -->
        </div><!-- /.container ends -->
    </div>

    <!-- menu starts -->
    <div class="menu_area">

        <!-- container starts -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="mainmenu nav_shadow">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav magic_menu">
                                    <li class="has_dropdown">
                                        <a href="{{route('home1')}}">home<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li>
                                                    <a href="{{route('home1')}}">Home V1</a>
                                                </li>
                                                <li>
                                                    <a href="index2.html">Home V2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown active">
                                        <a href="{{route('about_us')}}">About us<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li><a href="{{route('about_us')}}">About Us</a></li>
                                                <li><a href="{{route('about_us2')}}">about us 2</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="{{route('service')}}">services<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li><a href="{{route('service')}}">services</a></li>
                                                <li><a href="{{route('service_sidebar')}}">Sidebar Services</a></li>
                                                <li><a href="{{route('single_service')}}">Service Detail</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="{{route('track_trace')}}">Track & Trace</a></li>
                                    <li class="has_megamenu">
                                        <a href="#">pages<span class="fa fa-angle-down"></span></a>
                                        <div class="megamenu">
                                            <ul>
                                                <li><a href="{{route('home1')}}">Home V1 </a></li>
                                                <li><a href="{{route('home2')}}">Home V2 </a></li>
                                                <li><a href="{{route('about_us')}}">About Us</a></li>
                                                <li><a href="{{route('about_us2')}}">About Us-2</a></li>
                                                <li><a href="{{route('service')}}">Services</a></li>
                                                <li><a href="{{route('service_sidebar')}}">Services Sidebar</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="{{route('single_service')}}">Single Service</a></li>
                                                <li><a href="{{route('quote')}}">Get a Quote</a></li>
                                                <li><a href="{{route('single_service')}}">Track-Trace</a></li>
                                                <li><a href="{{route('news')}}">News </a></li>
                                                <li><a href="{{route('news_list')}}">News List</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="{{route('single_news')}}">Single News</a></li>
                                                <li><a href="{{route('login')}}">Login</a></li>
                                                <li><a href="#">Register</a></li>
                                                <li><a href="#">contact</a></li>
                                                <li><a href="#">error-404</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="{{route('news')}}">News<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li><a href="{{route('news_list')}}">news list</a></li>
                                                <li><a href="{{route('news')}}">news grid</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">contact</a></li>
                                </ul>
                                <div class="search_form">
                                    <div class="search_btn" data-toggle="modal" data-target="#search_modal">
                                        <span class="fa fa-search"></span>
                                    </div>

                                    <!-- search Modal -->
                                    <div class="modal fade" id="search_modal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog s_modal" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="search_form_wrapper">
                                                        <form method="post">
                                                            <div class="search_input">
                                                                <input type="text" name="search_field" placeholder="Search Query...">
                                                                <button class="submit_btn" type="submit">
                                                                    <span class="fa fa-search"></span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- END SEARCH MODAL -->

                                </div>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div><!-- main menu ends -->
                </div>
            </div><!-- /.row end -->

        </div><!-- /.container ends -->
    </div><!-- menu ends -->
</section>
<!--================================
    END SLIDER AREA
=================================-->