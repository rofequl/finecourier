@extends('layout.app')
@section('content')
    <!--================================
        START SLIDER AREA
    =================================-->
    <section class="slider_area">

        <!-- slider starts  -->
        <div class="sliders">

            <!-- hero slides -->
            <div class="hero_sliders">

                <!-- single hero_slide -->
                <div class="hero_slide" data-src="images/slider_1.jpg">
                    <div class="captions_wrapper right">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="single_slider_wrapper">
                                        <span class="small_title fadeInRightShort animated">FAST DELIVERY</span><br>
                                        <h1 class="big_title fadeInRightShort animated">fine is world wide courier
                                            service</h1>
                                        <div class="hero_btn">
                                            <a href="#" class="trust_btn">see more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- single hero_slide -->

                <!-- single hero_slide -->
                <div class="hero_slide" data-src="images/slider_2.jpg">
                    <div class="captions_wrapper left">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="single_slider_wrapper">
                                        <span class="small_title fadeInLeftShort animated">FAST DELIVERY</span><br>
                                        <h1 class="big_title fadeInLeftShort animated">fine is world wide courier
                                            service</h1>
                                        <div class="hero_btn">
                                            <a href="#" class="trust_btn">see more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- single hero_slide -->

            </div><!-- ./hero slides  -->
        </div><!-- /.sliders ends -->

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
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav magic_menu">
                                        <li class="has_dropdown active">
                                            <a href="{{route('home1')}}">home<span class="fa fa-angle-down"></span></a>
                                            <div class="dropdwon">
                                                <ul>
                                                    <li>
                                                        <a href="{{route('home1')}}">Home V1</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('home2')}}">Home V2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="has_dropdown">
                                            <a href="{{url('about_us')}}">About us<span class="fa fa-angle-down"></span></a>
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
                                                    <li><a href="{{route('track_trace')}}">Track-Trace</a></li>
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
                                                                    <input type="text" name="search_field"
                                                                           placeholder="Search Query...">
                                                                    <button class="submit_btn" type="submit">
                                                                        <span class="fa fa-search"></span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <!--================================
        START SERVICE AREA
    =================================-->
    <section class="service_area section_padding reveal animated" data-anim="fadeInUpShort">
        <!-- container start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="sub_title">
                            <p>Service We Provide</p>
                        </div>
                        <div class="title"><h2>our service</h2></div>
                    </div><!-- section_title starts -->
                </div>
            </div>

            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-md-12">

                    <!-- start service wrapper -->
                    <div class="service_wrapper">

                        <!-- service slider start -->
                        <div class="service_slider">

                            <div class="single_service_wrapper">
                                <div class="service_img">
                                    <img src="images/service1.jpg" alt="service-img">
                                </div>
                                <div class="service_content">
                                    <div class="service_title">
                                        <a href="single_service.html"><h3>ground shipping</h3></a>
                                    </div>
                                    <div class="service_text">
                                        <p>Claritas est etiam processus dynamicus sequitur the mutationem lectorum Mirum
                                            est.. </p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_service.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="single_service_wrapper">
                                <div class="service_img">
                                    <img src="images/service2.jpg" alt="service-img">
                                </div>
                                <div class="service_content">
                                    <div class="service_title">
                                        <a href="single_service.html"><h3>air shipping</h3></a>
                                    </div>
                                    <div class="service_text">
                                        <p>Claritas est etiam processus dynamicus sequitur the mutationem lectorum Mirum
                                            est.. </p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_service.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="single_service_wrapper">
                                <div class="service_img">
                                    <img src="images/service3.jpg" alt="service-img">
                                </div>
                                <div class="service_content">
                                    <div class="service_title">
                                        <a href="single_service.html"><h3>sea delivery</h3></a>
                                    </div>
                                    <div class="service_text">
                                        <p>Claritas est etiam processus dynamicus sequitur the mutationem lectorum Mirum
                                            est.. </p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_service.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- service slider start -->

                        <!-- slider control start -->
                        <div class="slider_controller">
                            <div class="prev"><span class="fa fa-angle-left"></span></div>
                            <div class="next"><span class="fa fa-angle-right"></span></div>
                        </div><!-- slider control end -->

                    </div><!-- start service wrapper -->
                </div><!-- /.col ends -->
            </div><!-- /.row end -->
        </div><!-- /.container start -->
    </section>
    <!--================================
        END SERVICE AREA
    =================================-->

    <!--================================
        START WHY CHOOSE US AREA
    =================================-->
    <section class="feature_area dark_bg reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">

        <!-- container -->
        <div class="container">
            <div class="col-md-6 xs_fullwidth col-xs-6 features_bg">
                <div class="feature_wrapper section_padding">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="sub_title">
                            <p>Our Best Features</p>
                        </div>
                        <div class="title"><h2>why choose us</h2></div>
                    </div><!-- section_title starts -->

                    <div class="about_us_text">
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                            Mirum est notare quam littera gothica quam nunc putamus parum claram anteposuerit.</p>
                    </div>

                    <div class="single_feature">
                        <div class="feature_icon">
                            <span class="fa fa-clock-o"></span>
                        </div>
                        <div class="feature_content">
                            <div class="feature_title">
                                <h4>timely delivery</h4>
                            </div>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                                lectorum.</p>
                        </div>
                    </div>

                    <div class="single_feature">
                        <div class="feature_icon">
                            <span class="fa fa-plane"></span>
                        </div>
                        <div class="feature_content">
                            <div class="feature_title">
                                <h4>world wide delivery</h4>
                            </div>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                                lectorum.</p>
                        </div>
                    </div>

                    <div class="single_feature">
                        <div class="feature_icon">
                            <span class="fa fa-support"></span>
                        </div>
                        <div class="feature_content">
                            <div class="feature_title">
                                <h4>24/7 hours support</h4>
                            </div>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                                lectorum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container ends -->

        <!-- feature starts -->
        <div class="feature_img"></div><!-- feature ends -->

    </section>
    <!--================================
        END WHY CHOOSE US AREA
    =================================-->

    <!--================================
        START ABOUT US AREA
    =================================-->
    <section class="about_us_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">

            <!-- row starts -->
            <div class="row">
                <!-- /.col-md-6 ends -->
                <div class="col-md-6 xs_fullwidth col-xs-6">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="sub_title">
                            <p>Do You Know ?</p>
                        </div>
                        <div class="title"><h2>who we are ?</h2></div>
                    </div><!-- section_title starts -->

                    <div class="about_us_content">
                        <div class="who_we_text">
                            <p>Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium lectorum.
                                Mirum est notare quam littera gothica quam nunc putamus parum claram antep litterarum
                                formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi qununc
                                nobis videntur parum clari fiant sollemnes. </p>

                            <p>Delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobeleifend
                                option congue nihil imperdiet doming id quod mazim placerat facer possim assum Typi non
                                habent
                                claritatem insitam est usus legentis in iis qui facit eorum claritatem</p>
                        </div>

                        <div class="who_we_btn">
                            <a class="trust_btn" href="about_us.html">read more</a>
                        </div>
                    </div>
                </div><!-- /.col-md-6 ends -->

                <!-- /.col-md-6 starts -->
                <div class="col-md-6 xs_fullwidth col-xs-6">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="sub_title">
                            <p>Ask Question</p>
                        </div>
                        <div class="title"><h2>faq</h2></div>
                    </div><!-- section_title starts -->

                    <!-- accrodion area starts  -->
                    <div class="accordion_wrapper">
                        <!-- panel-group start -->
                        <div class="panel-group" id="accordion">

                            <!-- single accprdion pnae start -->
                            <div class="panel panel-default">
                                <div class="single_acco_title">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                                           aria-expanded="false" class="collapsed">
                                            Mirum est notare quam littera gothica quam nunc putamus ?<span
                                                    class="fa fa-plus"></span></a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;" role="tablist">
                                    <div class="panel-body"><p>Mirum est notare quam littera gothica, quam nunc putamus
                                            parum anteposuerit litterarum
                                            formas humanitatis per seacula quarta decima et quinta deceo Eodem modo
                                            typi, qui nunc nobis videntur parum
                                            clari, fiant sollemn</p>
                                        <span class="acoo_icon fa fa-truck"></span>
                                    </div>
                                </div>
                            </div><!-- single accprdion pnae end -->

                            <!-- single accprdion pnae start -->
                            <div class="panel panel-default">
                                <div class="single_acco_title">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"
                                           class="collapsed" aria-expanded="false">
                                            Typi non habent claritatem insitam; est usus legentis ? <span
                                                    class="fa fa-plus"></span></a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;" role="tablist">
                                    <div class="panel-body"><p>Mirum est notare quam littera gothica, quam nunc putamus
                                            parum anteposuerit litterarum
                                            formas humanitatis per seacula quarta decima et quinta deceo Eodem modo
                                            typi, qui nunc nobis videntur parum
                                            clari, fiant sollemn</p>
                                        <span class="acoo_icon fa fa-truck"></span>
                                    </div>
                                </div>
                            </div><!-- single accprdion pnae end -->

                            <!-- single accprdion pnae start -->
                            <div class="panel panel-default">
                                <div class="single_acco_title">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"
                                           class="collapsed" aria-expanded="false">
                                            Processus dynamicus, qui sequitur mutationem cons ? <span
                                                    class="fa fa-plus"></span></a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;" role="tablist">
                                    <div class="panel-body"><p>Mirum est notare quam littera gothica, quam nunc putamus
                                            parum anteposuerit litterarum
                                            formas humanitatis per seacula quarta decima et quinta deceo Eodem modo
                                            typi, qui nunc nobis videntur parum
                                            clari, fiant sollemn</p>
                                        <span class="acoo_icon fa fa-truck"></span>
                                    </div>
                                </div>
                            </div><!-- single accprdion pnae end -->

                        </div><!-- /.panel-group ends -->
                    </div><!-- accrodion area ends  -->
                </div><!-- /.col-md-6 ends -->
            </div><!-- /.row ends -->

        </div><!-- /.container ends -->
    </section>
    <!--================================
        END ABOUT US AREA
    =================================-->


    <!--================================
        START BLOG AREA
    =================================-->
    <section class="blog_area dark_bg section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="sub_title">
                            <p>See Our News</p>
                        </div>
                        <div class="title"><h2>latest blog</h2></div>
                    </div><!-- section_title starts -->
                </div>
            </div>

            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-md-12">

                    <!-- start service wrapper -->
                    <div class="blog_wrapper">

                        <!-- service slider start -->
                        <div class="blog_slider">

                            <div class="single_blog_wrapper">
                                <div class="blog_img">
                                    <img src="images/blog1.jpg" alt="service-img">
                                </div>

                                <div class="blog_content">
                                    <div class="date">
                                        <span>FEB</span>
                                        <span class="num">10</span>
                                    </div>

                                    <div class="blog_meta">
                                        <ul>
                                            <li><a href="#"><span class="fa fa-user"></span>Md.Masud</a></li>
                                            <li><a href="#"><span class="fa fa-commenting-o"></span>250</a></li>
                                            <li><a href="#"><span class="fa fa-heart-o"></span>120</a></li>
                                        </ul>
                                    </div>

                                    <div class="blog_title">
                                        <a href="single_news.html"><h3>Quarta Decima Etquinta</h3></a>
                                    </div>
                                    <div class="blog_text">
                                        <p>Claritas est etiam processus dynamicus sequitur the consuetudium lectorum
                                            Mirum est </p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_news.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="single_blog_wrapper">
                                <div class="blog_img">
                                    <img src="images/blog2.jpg" alt="service-img">
                                </div>

                                <div class="blog_content">
                                    <div class="date">
                                        <span>FEB</span>
                                        <span class="num">10</span>
                                    </div>

                                    <div class="blog_meta">
                                        <ul>
                                            <li><a href="#"><span class="fa fa-user"></span>Md.Salam</a></li>
                                            <li><a href="#"><span class="fa fa-commenting-o"></span>250</a></li>
                                            <li><a href="#"><span class="fa fa-heart-o"></span>120</a></li>
                                        </ul>
                                    </div>

                                    <div class="blog_title">
                                        <a href="single_news.html"><h3> Mirum est notare quame </h3></a>
                                    </div>
                                    <div class="blog_text">
                                        <p>Claritas est etiam processus dynamicus sequitur the consuetudium lectorum
                                            Mirum est </p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_news.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="single_blog_wrapper">
                                <div class="blog_img">
                                    <img src="images/blog3.jpg" alt="service-img">
                                </div>

                                <div class="blog_content">
                                    <div class="date">
                                        <span>FEB</span>
                                        <span class="num">10</span>
                                    </div>

                                    <div class="blog_meta">
                                        <ul>
                                            <li><a href="#"><span class="fa fa-user"></span>Md.Salam</a></li>
                                            <li><a href="#"><span class="fa fa-commenting-o"></span>250</a></li>
                                            <li><a href="#"><span class="fa fa-heart-o"></span>120</a></li>
                                        </ul>
                                    </div>

                                    <div class="blog_title">
                                        <a href="single_news.html"><h3>Quarta Decima Etquinta</h3></a>
                                    </div>
                                    <div class="blog_text">
                                        <p>Claritas est etiam processus dynamicus sequitur the consuetudium lectorum
                                            Mirum est </p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_news.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- service slider start -->

                        <!-- slider control start -->
                        <div class="slider_controller">
                            <div class="prev"><span class="fa fa-angle-left"></span></div>
                            <div class="next"><span class="fa fa-angle-right"></span></div>
                        </div><!-- slider control end -->

                    </div><!-- start service wrapper -->
                </div><!-- /.col ends -->
            </div><!-- /.row end -->
        </div><!-- /.container start -->
    </section>
    <!--================================
        END BLOG AREA
    =================================-->

    <!--================================
        START TESTIMONIAL AREA
    =================================-->
    <section class="testimonial_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-md-12">
                    <!-- section_title starts -->
                    <div class="section_title title_center">
                        <div class="sub_title">
                            <p>What Our Clients Say</p>
                        </div>
                        <div class="title"><h2>testimonials</h2></div>
                    </div><!-- section_title starts -->
                </div>
            </div><!-- /.row end -->

            <!-- row starts -->
            <div class="row">
                <!-- col-md-12 starts -->
                <div class="col-md-12">
                    <div class="testimonial_slider_wrapper">
                        <div class="testimonial_slider">
                            <div class="single_slider">
                                <div class="testimonial">
                                    <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis
                                        in iis qui
                                        facit eorum claritatem. Investigationes demonstrav erunt lectores legere me lius
                                        quod ii
                                        legunt saepius. Claritas est etiam processus <span
                                                class="quote fa fa-quote-right"></span>
                                    </p>
                                </div>
                                <div class="person_about">
                                    <div class="image">
                                        <img src="images/testimonial1.png" alt="testimonial-img">
                                    </div>
                                    <div class="desig">
                                        <p class="name">Md.Salam</p>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_slider">
                                <div class="testimonial">
                                    <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis
                                        in iis qui
                                        facit eorum claritatem. Investigationes demonstrav erunt lectores legere me lius
                                        quod ii
                                        legunt saepius. Claritas est etiam processus <span
                                                class="quote fa fa-quote-right"></span>
                                    </p>
                                </div>
                                <div class="person_about">
                                    <div class="image">
                                        <img src="images/testimonial2.png" alt="testimonial-img">
                                    </div>
                                    <div class="desig">
                                        <p class="name">Shahadat Hossain</p>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-12 starts -->
            </div><!-- /.row ends -->
        </div><!-- /.container ends -->
    </section>
    <!--================================
        END TESTIMONIAL AREA
    =================================-->


    <!--================================
        START CALL TO ACTION
    =================================-->
    <section class="call_to_action reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <div class="container">
            <div class="col-md-7 xs_fullwidth col-xs-8 v_middle">
                <div class="call_to_action_title">
                    <h3>need emergency transportaion</h3>
                </div>
                <p>Placerat facer possim assum Typi non habent s legentis in iis qui facit eorum</p>
            </div>
            <div class="col-md-5 xs_fullwidth col-xs-3 v_middle">
                <div class="call_to_action_btn">
                    <a class="trust_btn" href="contact.html">contact us</a>
                </div>
            </div>
        </div>
    </section>
    <!--================================
        END CALL TO ACTION
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

@endsection