@extends('layout.app')
@section('content')

    @include('inc.slide_area')

<!--================================
    START BLOG LIST AREA
=================================-->
<section class="blog_list section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 xxs_fullwidth xs_fullwidth col-xs-8">
                <div class="search_bar visible-xs reveal animated" data-reveal-anim="fadeInRight">
                    <form action="#" class="search_widget">
                        <input placeholder="Search..." type="text">
                        <button type="submit" class="blog_search_btn"><span class="fa fa-search"></span></button>
                    </form>
                </div>
                <!-- single blog item -->
                <div class="single_blog_wrapper">
                    <div class="blog_img blog_vid">
                        <div class="vid_img"><img src="images/list1.jpg" alt="service-img"></div>
                        <a class="venobox vbox-item" data-type="youtube" href="https://www.youtube.com/watch?v=-MspFZpwMkk">
                            <span class="fa fa-play"></span>
                        </a>
                        <div class="date">
                            <span>FEB</span>
                            <span class="num">10</span>
                        </div>
                    </div>

                    <div class="blog_content">
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
                            <p>Claritas est etiam processus dynamicus, qui sequitur mun consuetudium lectorum. Mirum est notare quam
                                littera gothica quam nunc pute parum claram anteposuerit litterarum formas humanitatis per seacula </p>
                        </div>
                    </div>
                </div><!-- sigle blog item end -->

                <!-- single blog item -->
                <div class="single_blog_wrapper">
                    <div class="blog_img">
                        <img src="images/list2.jpg" alt="service-img">
                        <div class="date">
                            <span>FEB</span>
                            <span class="num">10</span>
                        </div>
                    </div>

                    <div class="blog_content">
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
                            <p>Claritas est etiam processus dynamicus, qui sequitur mun consuetudium lectorum. Mirum est notare quam
                                littera gothica quam nunc pute parum claram anteposuerit litterarum formas humanitatis per seacula </p>
                        </div>
                    </div>
                </div><!-- sigle blog item end -->

                <!-- single blog item -->
                <div class="single_blog_wrapper">
                    <div class="blog_img blog_vid">
                        <div class="vid_img"><img src="images/list3.jpg" alt="service-img"></div>
                        <a class="venobox vbox-item" data-type="youtube" href="https://www.youtube.com/watch?v=-MspFZpwMkk">
                            <span class="fa fa-play"></span>
                        </a>
                        <div class="date">
                            <span>FEB</span>
                            <span class="num">10</span>
                        </div>
                    </div>

                    <div class="blog_content">
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
                            <p>Claritas est etiam processus dynamicus, qui sequitur mun consuetudium lectorum. Mirum est notare quam
                                littera gothica quam nunc pute parum claram anteposuerit litterarum formas humanitatis per seacula </p>
                        </div>
                    </div>
                </div><!-- sigle blog item end -->

                <!-- single blog item -->
                <div class="single_blog_wrapper">
                    <div class="blog_img">
                        <img src="images/list4.jpg" alt="service-img">
                        <div class="date">
                            <span>FEB</span>
                            <span class="num">10</span>
                        </div>
                    </div>

                    <div class="blog_content">
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
                            <p>Claritas est etiam processus dynamicus, qui sequitur mun consuetudium lectorum. Mirum est notare quam
                                littera gothica quam nunc pute parum claram anteposuerit litterarum formas humanitatis per seacula </p>
                        </div>
                    </div>
                </div><!-- sigle blog item end -->
            </div>

            <div class="col-md-3 xxs_fullwidth xs_fullwidth col-xs-4">
                <!-- start aside -->
                <aside class="sidebar">
                    <div class="sidebar_title hidden-md hidden-lg hidden-sm visible-xs">
                        <h4>Categories</h4>
                    </div>
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

                    <!-- tag area starts -->
                    <div class="sidebar_widget">
                        <div class="sidebar_title">
                            <h4>Tags</h4>
                        </div>

                        <ul class="tags">
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Transport</a></li>
                            <li><a href="#">Air</a></li>
                            <li><a href="#">Road Shipping</a></li>
                            <li><a href="#">Sea</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">Trucking</a></li>
                        </ul>
                    </div><!-- tag area ends -->

                    <!-- tag area starts -->
                    <div class="recent_posts sidebar_widget">
                        <div class="sidebar_title">
                            <h4>Recent Post</h4>
                        </div>
                        <ul class="recent_posts">
                            <li>
                                <div class="recent_blog_img v_middle">
                                    <a href="single_news.html">
                                        <img src="images/recent_post1.jpg" alt="Image">
                                        <span class="recent_post_link  fa fa-link"></span>
                                    </a>
                                </div>

                                <div class="single_recent_post v_middle">
                                    <span class="recent_post_meta">30 Aug 2016</span>
                                    <a href="single_news.html"><p>Quis Nostrud Exercitatio Ullamco.</p></a>
                                </div>
                            </li>
                            <li>
                                <div class="recent_blog_img v_middle">
                                    <a href="single_news.html">
                                        <img src="images/recent_post2.jpg" alt="Image">
                                        <span class="recent_post_link  fa fa-link"></span>
                                    </a>
                                </div>

                                <div class="single_recent_post v_middle">
                                    <span class="recent_post_meta">25 Oct 2016</span>
                                    <a href="single_news.html"><p>Lorem Ipsum dolor sit amet percucitie</p></a>
                                </div>
                            </li>
                            <li>
                                <div class="recent_blog_img v_middle">
                                    <a href="single_news.html">
                                        <img src="images/recent_post3.jpg" alt="Image">
                                        <span class="recent_post_link  fa fa-link"></span>
                                    </a>
                                </div>

                                <div class="single_recent_post v_middle">
                                    <span class="recent_post_meta">1 Nov 2016</span>
                                    <a href="single_news.html"><p>Nostrud Exercitatio Ipsum dolor dignar.</p></a>
                                </div>
                            </li>
                        </ul>
                    </div><!-- tag area ends -->
                </aside><!-- end aside -->
            </div>
        </div><!-- /.row end -->
    </div>
    <!-- /.container ends -->
</section>
<!--================================
    END BLOG LIST AREA
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
            <p>Placerat facer possim assum Typi non usus legentis in iis qui facit eorum</p>
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