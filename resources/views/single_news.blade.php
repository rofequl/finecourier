@extends('layout.app')
@section('content')

    @include('inc.slide_area')


<!--================================
    START SINGLE NEWS
=================================-->
<section class="services_section section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
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

                <!-- stsrt detail blog post wrapper -->
                <div class="detail_blog_post_wrapper">
                    <!-- start blog_img -->
                    <div class="blog_img">
                        <img src="images/single_news.jpg" alt="img">
                    </div><!-- /.blog_img end -->

                    <!-- blog_meta start -->
                    <div class="blog_meta">
                        <ul>
                            <li>
                                <div class="date">
                                    <span>FEB</span>
                                    <span class="num">10</span>
                                </div>
                            </li>
                            <li>
                                <div class="blog_title"><h3>sea shipping</h3></div>
                                <div class="author_info">
                                    <p><span class="fa fa-user"></span>David Jhon Doe</p>
                                </div>
                                <div class="comments_count">
                                    <p><span class="fa fa-comments-o"></span>(200)</p>
                                </div>
                            </li>
                        </ul>
                    </div><!-- blog_meta end -->

                    <!-- blog_contents start -->
                    <div class="blog_contents">
                        <p>Vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                            praesent luptatum zzril the duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend
                            option congue nihil imperdiet doming id quod mazim placerate  possim assum. Typi non habent claritatem
                            insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverun wlectt legere
                            me lius quod ii legunt saepius. Claritas est etiam processus dynamicus qui</p>

                        <blockquote cite="http://themeebit.com">
                            Clest etiam processus dynamicus qui sequitur mutationem consuetClaritas est etiam processus dynamicus
                            qui sequitur mutationem consu
                        </blockquote>

                        <p>
                            Dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                            luptatum zzril the duis dolorec feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option
                            congue nihil imperdiet doming id quod mazim placerate  possim assumTypi non habent claritatem insitam est usus
                            legentis in iis qui facit eorum claritatem Investigationes
                        </p>
                    </div><!-- blog_contents end -->

                    <!-- tag_share start -->
                    <div class="tag_share clearfix">
                        <!-- Blog post tsgs -->
                        <div class="tags">
                            <span>Tags</span>
                            <ul>
                                <li><a href="#"> Transport</a></li>
                                <li><a href="#">Tracuking</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Delivery</a></li>
                            </ul>
                        </div><!-- Blog post tags ends -->

                        <!-- Sharing Social icons -->
                        <div class="social_icons">
                            <span>Share Now</span>
                            <ul>
                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                            </ul>
                        </div><!-- Sharing social icons ends -->

                    </div><!-- tag_share end -->

                </div><!-- end detail blog post wrapper -->

                <!-- start blog comments area -->
                <div class="blog_commnets">
                    <div class="section_title">
                        <div class="title"><h2>comments <span>(3)</span></h2></div>
                    </div>

                    <!-- start comments -->
                    <div class="comments">
                        <div class="single_comment_wrapper">
                            <div class="single_comment clearfix">
                                <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis in iis qui
                                    facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                                    legunt saepius. Claritas est etiam processus</p>
                                <div class="reply">Reply <span class="fa fa-long-arrow-right"></span></div>
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


                            <!-- commnet_reply starts -->
                            <div class="commnet_reply">
                                <div class="single_comment_wrapper">
                                    <div class="single_comment clearfix">
                                        <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis in iis qui
                                            facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                                            legunt saepius. Claritas est etiam processus</p>
                                        <div class="reply">Reply <span class="fa fa-long-arrow-right"></span></div>
                                    </div>
                                    <div class="person_about">
                                        <div class="image">
                                            <img src="images/testimonial2.png" alt="testimonial-img">
                                        </div>
                                        <div class="desig">
                                            <p class="name">Shahadat Hossain</p>
                                            <span>ux/ui Designer</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- commnet_reply ends -->
                        </div><!-- end single comment wrapper -->

                        <!-- start single comment wrapper -->
                        <div class="single_comment_wrapper">
                            <div class="single_comment clearfix">
                                <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis in iis qui
                                    facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                                    legunt saepius. Claritas est etiam processus</p>
                                <div class="reply">Reply <span class="fa fa-long-arrow-right"></span></div>
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
                        </div><!-- end single comment wrapper -->
                    </div><!-- end comments -->

                    <!-- reply_form starts -->
                    <div class="reply_form">
                        <div class="section_title">
                            <div class="title"><h2>write  a reply</h2></div>
                        </div>

                        <div class="reply_form_wrapper">
                            <form action="#">
                                <div class="form_half">
                                    <input class="name" type="text" placeholder="Name">
                                </div>
                                <div class="form_half">
                                    <input class="email" type="text" placeholder="Email">
                                </div>
                                <textarea cols="30" rows="10" placeholder="Message"></textarea>
                                <button type="submit" class="comment_btn" name="button">send message</button>
                            </form>
                        </div>
                    </div><!-- /.reply_form ends -->
                </div><!-- end blog comments area -->
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
    END SINGLE NEWS
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
            <p>Placerat facer possim assum Typi no legentis in iis qui facit eorum</p>
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