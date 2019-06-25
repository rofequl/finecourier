@extends('layout.app')
@section('content')

    @include('inc.slide_area')



    <!--================================
    START ABOUT US AREA
=================================-->
<section class="mission_vision section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-6 xs_fullwidth v_middle">
                <div class="about_us_img">
                    <img src="images/about_us2_m.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 col-xs-6 xs_fullwidth v_middle">
                <div class="about_us_content_wrapper">
                    <!-- section_title starts -->
                    <div class="section_title">
                        <div class="title"><h2>Our Next Mission</h2></div>
                    </div><!-- section_title starts -->

                    <div class="mission_content">
                        <p>Claritas est etiam processus dynamicus qui sequitur mutationem consuetudium the Mirum est notare quam
                            littera gothica quam nunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula
                            quarta decima et quinta decima Eodem modo typi qui nunc nobis videntur parum clari fiant sollemnes in
                            futurum.</p>
                        <p>Formas humanitatis per seacula quarta decima et quinta decima Eodem modo typi quinunc nobis videntur
                            parum clari fiant sollemnes in futurum.formas humanitatis per seacuquarta decima et quinta decima
                            Eodem modo typi qui nunc mnes in futurum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container starts -->
</section>
<!--================================
    END ABOUT US AREA
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
    START COUNTER UP
=================================-->
<section class="team_area dark_bg section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- section_title starts -->
                <div class="section_title title_center">
                    <div class="sub_title">
                        <p>Expert Team</p>
                    </div>
                    <div class="title"><h2>Meet our team</h2></div>
                </div><!-- section_title starts -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="team_slider_wrapper">
                    <div class="team_slider">
                        <div class="single_team_wrapper">
                            <div class="single_team_member">
                                <div class="team_img">
                                    <img src="images/team1.jpg" alt="images">
                                </div>
                                <div class="hover_overlay">
                                    <div class="social_links">
                                        <ul>
                                            <li><a href="#" class="fb"><span class="fa fa-facebook"></span></a></li>
                                            <li><a href="#" class="pin"><span class="fa fa-pinterest-p"></span></a></li>
                                            <li><a href="#" class="twit"><span class="fa fa-twitter"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="name_designation">
                                <h4 class="name">Capitan Bumra</h4>
                                <span class="designation">Business consult</span>
                            </div>
                        </div>

                        <div class="single_team_wrapper">
                            <div class="single_team_member">
                                <div class="team_img">
                                    <img src="images/team2.jpg" alt="images">
                                </div>
                                <div class="hover_overlay">
                                    <div class="social_links">
                                        <ul>
                                            <li><a href="#" class="fb"><span class="fa fa-facebook"></span></a></li>
                                            <li><a href="#" class="pin"><span class="fa fa-pinterest-p"></span></a></li>
                                            <li><a href="#" class="twit"><span class="fa fa-twitter"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="name_designation">
                                <h4 class="name">Wounder Wiman</h4>
                                <span class="designation">Account Officer</span>
                            </div>
                        </div>

                        <div class="single_team_wrapper">
                            <div class="single_team_member">
                                <div class="team_img">
                                    <img src="images/team3.jpg" alt="images">
                                </div>
                                <div class="hover_overlay">
                                    <div class="social_links">
                                        <ul>
                                            <li><a href="#" class="fb"><span class="fa fa-facebook"></span></a></li>
                                            <li><a href="#" class="pin"><span class="fa fa-pinterest-p"></span></a></li>
                                            <li><a href="#" class="twit"><span class="fa fa-twitter"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="name_designation">
                                <h4 class="name">Blak Widew</h4>
                                <span class="designation">Developemnt Exc.</span>
                            </div>
                        </div>

                        <div class="single_team_wrapper">
                            <div class="single_team_member">
                                <div class="team_img">
                                    <img src="images/team4.jpg" alt="images">
                                </div>
                                <div class="hover_overlay">
                                    <div class="social_links">
                                        <ul>
                                            <li><a href="#" class="fb"><span class="fa fa-facebook"></span></a></li>
                                            <li><a href="#" class="pin"><span class="fa fa-pinterest-p"></span></a></li>
                                            <li><a href="#" class="twit"><span class="fa fa-twitter"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="name_designation">
                                <h4 class="name">david maxwell</h4>
                                <span class="designation">Project Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="slider_navigatiors">
                        <span class="prev icofont icofont-thin-left"></span>
                        <span class="next icofont icofont-thin-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</section>
<!--================================
    END COUNTER UP
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
                                    <p class="name">Md.Salam</p>
                                    <span>Web Developer</span>
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
                                    <p class="name">Md.Salam</p>
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
            <p>Placerat facer possim assum Typi non habent  usus legentis in iis qui facit eorum</p>
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