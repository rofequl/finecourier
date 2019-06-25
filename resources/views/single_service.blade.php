@extends('layout.app')
@section('content')

    @include('inc.slide_area')

<!--================================
    START ABOUT US AREA
=================================-->
<section class="service_detail section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 xxs_fullwidth xs_fullwidth col-xs-8">
                <div class="search_bar visible-xs reveal animated" data-reveal-anim="fadeInRight">
                    <form action="#" class="search_widget">
                        <input placeholder="Search..." type="text">
                        <button type="submit" class="blog_search_btn"><span class="fa fa-search"></span></button>
                    </form>
                </div>

                <div class="single_service_detail">
                    <div class="post_image">
                        <img src="images/single_detail.jpg" alt="single detail">
                    </div>

                    <div class="post">
                        <div class="section_title">
                            <div class="title"><h2>air shipping</h2></div>
                        </div>

                        <div class="post_content">
                            <p>
                                Molestie consequat vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio
                                dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                                Nam liber tempor cum sol nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum Typi none claritatem insitam est usus legentis in iis qui facit eorum claritatem Investigationes
                                demonstraverunt.
                            </p>

                            <p>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blanditthe
                                luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend
                                optio congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 xxs_fullwidth xs_fullwidth col-xs-4">
                <aside class="sidebar">
                    <div class="search_category">
                        <div class="search_bar hidden-xs reveal animated" data-reveal-anim="fadeInRight">
                            <form action="#" class="search_widget">
                                <input placeholder="Search..." type="text">
                                <button type="submit" class="blog_search_btn"><span class="fa fa-search"></span></button>
                            </form>
                        </div>

                        <div class="category_widget">
                            <ul>
                                <li><a href="#">Air Transport</a></li>
                                <li><a href="#">Road Transport</a></li>
                                <li><a href="#">Online Support</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">About Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="testimonial_slider_wrapper sidebar_widget">
                        <div class="sidebar_title">
                            <h4>Clients testimonials</h4>
                        </div>
                        <div class="single_item_testimonial_slider">
                            <div class="single_slider">
                                <div class="testimonial">
                                    <p>Placerat facer possim assum. Typi non habeclaritatem insitam est usulegentis in iis qui facit eoru
                                        claritatem. Investigationes demonstraverunt lectores legere <span class="quote fa fa-quote-right"></span></p>
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
                                    <p>Placerat facer possim assum. Typi non habeclaritatem insitam est usulegentis in iis qui facit eoru
                                        claritatem. Investigationes demonstraverunt lectores legere <span class="quote fa fa-quote-right"></span></p>
                                </div>
                                <div class="person_about">
                                    <div class="image">
                                        <img src="images/testimonial2.png" alt="testimonial-img">
                                    </div>
                                    <div class="desig">
                                        <p class="name">Md.Salam</p>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div><!-- /.row end -->
    </div>
    <!-- /.container ends -->
</section>
<!--================================
    END ABOUT US AREA
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