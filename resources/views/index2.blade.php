
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
            <div class="hero_slide" data-src="images/home2slide1.jpg">
                <div class="captions_wrapper right">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="single_slider_wrapper">
                                    <span class="small_title fadeInRightShort animated">FAST DELIVERY</span><br>
                                    <h1 class="big_title fadeInRightShort animated">trust is world wide transport service</h1>
                                    <div class="hero_btn">
                                        <a href="#" class="trust_btn" data-hover="see more">see more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- single hero_slide -->

            <!-- single hero_slide -->
            <div class="hero_slide" data-src="images/slider_1.jpg">
                <div class="captions_wrapper left">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="single_slider_wrapper">
                                    <span class="small_title fadeInLeftShort animated">FAST DELIVERY</span><br>
                                    <h1 class="big_title fadeInLeftShort animated">trust is world wide transport service</h1>
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
                                    <li class="has_dropdown active">
                                        <a href="index.html">Home<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li>
                                                    <a href="index.html">Home V1</a>
                                                </li>
                                                <li>
                                                    <a href="index2.html">Home V2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="about_us.html">About us<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li><a href="about_us.html">About Us</a></li>
                                                <li><a href="about_us2.html">about us 2</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="services.html">services<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li><a href="services.html">services</a></li>
                                                <li><a href="services_sidebar.html">Sidebar Services</a></li>
                                                <li><a href="single_service.html">Service Detail</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="track_trace.html">Track & Trace</a></li>
                                    <li class="has_megamenu">
                                        <a href="#">pages<span class="fa fa-angle-down"></span></a>
                                        <div class="megamenu">
                                            <ul>
                                                <li><a href="index.html">Home V1 </a></li>
                                                <li><a href="index2.html">Home V2 </a></li>
                                                <li><a href="about_us.html">About Us</a></li>
                                                <li><a href="about_us2.html">About Us-2</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="services_sidebar.html">Services Sidebar</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="single_service.html">Single Service</a></li>
                                                <li><a href="quote.html">Get a Quote</a></li>
                                                <li><a href="track_trace.html">Track-Trace</a></li>
                                                <li><a href="news.html">News </a></li>
                                                <li><a href="news_list.html">News List</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="single_news.html">Single News</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="404.html">error-404</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="news.html">News<span class="fa fa-angle-down"></span></a>
                                        <div class="dropdwon">
                                            <ul>
                                                <li><a href="news_list.html">news list</a></li>
                                                <li><a href="news.html">news grid</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="contact.html">contact</a></li>
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
    START SERVICE AREA STYLE2
=================================-->
<section class="service2 clearfix reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <div class="service_wrapper clearfix">
        <div class="single_service">
            <div class="service_img">
                <img class="svg" src="images/service_icon1.svg" alt="service icons">
            </div>
            <div class="service_content_wrapper">
                <div class="service_title">
                    <h4>Fast sea delivery</h4>
                </div>
                <p>Claritas est etiam processus dynamicu sequitur mutationem consuetudiuMirum est notare quam littera gothmus </p>
            </div>
        </div>

        <div class="single_service">
            <div class="service_img">
                <img class="svg" src="images/service_icon2.svg" alt="service icons">
            </div>
            <div class="service_content_wrapper">
                <div class="service_title">
                    <h4>Fast road delivery</h4>
                </div>
                <p>Claritas est etiam processus dynamicu sequitur mutationem consuetudiuMirum est notare quam littera gothmus </p>
            </div>
        </div>

        <div class="single_service">
            <div class="service_img">
                <img class="svg" src="images/service_icon3.svg" alt="service icons">
            </div>
            <div class="service_content_wrapper">
                <div class="service_title">
                    <h4>Fast air shipping</h4>
                </div>
                <p>Claritas est etiam processus dynamicu sequitur mutationem consuetudiuMirum est notare quam littera gothmus </p>
            </div>
        </div>

        <div class="single_service">
            <div class="service_img">
                <img class="svg" src="images/service_icon4.svg" alt="service icons">
            </div>
            <div class="service_content_wrapper">
                <div class="service_title">
                    <h4>online support</h4>
                </div>
                <p>Claritas est etiam processus dynamicu sequitur mutationem consuetudiuMirum est notare quam littera gothmus </p>
            </div>
        </div>

        <div class="single_service hidden-sm">
            <div class="service_img">
                <img class="svg" src="images/service_icon5.svg" alt="service icons">
            </div>
            <div class="service_content_wrapper">
                <div class="service_title">
                    <h4>best security system</h4>
                </div>
                <p>Claritas est etiam processus dynamicu sequitur mutationem consuetudiuMirum est notare quam littera gothmus </p>
            </div>
        </div>
    </div>
</section>
<!--================================
    START SERVICE AREA STYLE2
=================================-->


<!--================================
    START ABOUT US AREA
=================================-->
<section class="mission_vision section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- mission start -->
    <div class="mission">
        <!-- container starts -->
        <div class="container">

            <!-- row starts -->
            <div class="row">
                <!-- /.col-md-6 ends -->
                <div class="col-md-6 col-md-offset-6 col-xs-6 xxs_offset-0 xxs_fullwidth col-xs-offset-6">
                    <!-- section_title starts -->
                    <div class="kmas_area">
                        <div class="section_title">
                            <div class="sub_title">
                                <p>Our Future Plan ?</p>
                            </div>
                            <div class="title"><h2>our next mission</h2></div>
                        </div><!-- section_title starts -->

                        <div class="about_us_content">
                            <div class="who_we_text">
                                <p>Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium the Mirum est notare quam
                                    littera gothica quam nunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula
                                    quarta decima et quinta decima Eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes in
                                    futurum.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-6 ends -->
            </div><!-- /.row ends -->
        </div><!-- /.container ends -->

        <div class="mission_img"></div>
    </div><!-- /.mission end -->

    <!-- start vision -->
    <div class="vision">
        <!-- container -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- /.col-md-6 ends -->
                <div class="col-md-6 col-xs-6 xxs_offset-0 xxs_fullwidth">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="sub_title">
                            <p>Our Vission</p>
                        </div>
                        <div class="title"><h2>our vission</h2></div>
                    </div><!-- section_title starts -->

                    <div class="about_us_content">
                        <div class="who_we_text">
                            <p>Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium the Mirum est notare quam
                                littera gothica quam nunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula
                                quarta decima et quinta decima Eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes in
                                futurum.</p>

                        </div>
                    </div>
                </div><!-- /.col-md-6 ends -->
            </div><!-- /.row ends -->
        </div><!-- /.container -->

        <div class="vision_img"></div>
    </div><!-- /.vision end-->
</section>
<!--================================
    END ABOUT US AREA
=================================-->


<!--================================
    START COUNTER UP
=================================-->
<section class="counter_up reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="counter_wrapper">
                    <ul>
                        <li>
                            <div class="icon"><span class="fa fa-user"></span></div>
                            <p><span class="counter">300</span>+</p>
                            <span>Team Member</span>
                        </li>
                        <li>
                            <div class="icon"><span class="fa fa-truck"></span></div>
                            <p><span class="counter">500</span>+</p>
                            <span>Strong Ship</span>
                        </li>
                        <li>
                            <div class="icon"><span class="fa fa-trophy"></span></div>
                            <p><span class="counter">290</span>+</p>
                            <span>Win Award</span>
                        </li>
                        <li>
                            <div class="icon"><span class="fa fa-globe"></span></div>
                            <p><span class="counter">800</span>+</p>
                            <span>Worldwide Clients</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
    END COUNTER UP
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

                        <p>Delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobeleifend
                            option congue nihil imperdiet doming id quod mazim placerat facer possim assum Typi non habent
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" class="collapsed">
                                        Mirum est notare quam littera gothica quam nunc putamus ?<span class="fa fa-plus"></span></a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;" role="tablist">
                                <div class="panel-body"><p>Mirum est notare quam littera gothica, quam nunc putamus parum anteposuerit litterarum
                                        formas humanitatis per seacula quarta decima et quinta deceo Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemn</p>
                                    <span class="acoo_icon fa fa-truck"></span>
                                </div>
                            </div>
                        </div><!-- single accprdion pnae end -->

                        <!-- single accprdion pnae start -->
                        <div class="panel panel-default">
                            <div class="single_acco_title">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                        Typi non habent claritatem insitam; est usus legentis ? <span class="fa fa-plus"></span></a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;" role="tablist">
                                <div class="panel-body"><p>Mirum est notare quam littera gothica, quam nunc putamus parum anteposuerit litterarum
                                        formas humanitatis per seacula quarta decima et quinta deceo Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemn</p>
                                    <span class="acoo_icon fa fa-truck"></span>
                                </div>
                            </div>
                        </div><!-- single accprdion pnae end -->

                        <!-- single accprdion pnae start -->
                        <div class="panel panel-default">
                            <div class="single_acco_title">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">
                                        Processus dynamicus, qui sequitur mutationem cons ? <span class="fa fa-plus"></span></a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;" role="tablist">
                                <div class="panel-body"><p>Mirum est notare quam littera gothica, quam nunc putamus parum anteposuerit litterarum
                                        formas humanitatis per seacula quarta decima et quinta deceo Eodem modo typi, qui nunc nobis videntur parum
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
                                    <p>Claritas est etiam processus dynamicus sequitur the  consuetudium lectorum Mirum est  </p>
                                </div>
                                <div class="read_more">
                                    <a href="single_news.html">read more <span class="fa fa-long-arrow-right"></span></a>
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
                                        <li><a href="#"><span class="fa fa-user"></span>Md.Masud</a></li>
                                        <li><a href="#"><span class="fa fa-commenting-o"></span>250</a></li>
                                        <li><a href="#"><span class="fa fa-heart-o"></span>120</a></li>
                                    </ul>
                                </div>

                                <div class="blog_title">
                                    <a href="single_news.html"><h3> Mirum est notare quame </h3></a>
                                </div>
                                <div class="blog_text">
                                    <p>Claritas est etiam processus dynamicus sequitur the  consuetudium lectorum Mirum est  </p>
                                </div>
                                <div class="read_more">
                                    <a href="single_news.html">read more <span class="fa fa-long-arrow-right"></span></a>
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
                                        <li><a href="#"><span class="fa fa-user"></span>Md.Masud</a></li>
                                        <li><a href="#"><span class="fa fa-commenting-o"></span>250</a></li>
                                        <li><a href="#"><span class="fa fa-heart-o"></span>120</a></li>
                                    </ul>
                                </div>

                                <div class="blog_title">
                                    <a href="single_news.html"><h3>Quarta Decima Etquinta</h3></a>
                                </div>
                                <div class="blog_text">
                                    <p>Claritas est etiam processus dynamicus sequitur the  consuetudium lectorum Mirum est  </p>
                                </div>
                                <div class="read_more">
                                    <a href="single_news.html">read more <span class="fa fa-long-arrow-right"></span></a>
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
                                <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis in iis qui
                                    facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                                    legunt saepius. Claritas est etiam processus <span class="quote fa fa-quote-right"></span></p>
                            </div>
                            <div class="person_about">
                                <div class="image">
                                    <img src="images/testimonial1.png" alt="testimonial-img">
                                </div>
                                <div class="desig">
                                    <p class="name">Md.Masud</p>
                                    <span>ux/ui Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider">
                            <div class="testimonial">
                                <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis in iis qui
                                    facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                                    legunt saepius. Claritas est etiam processus <span class="quote fa fa-quote-right"></span></p>
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
                <h3>need emergency transportaion </h3>
            </div>
            <p>Placerat facer possim assum Typi non legentis in iis qui facit eorum</p>
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