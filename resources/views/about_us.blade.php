
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
                    <img src="{{asset('storage/our_information/'.$information->image)}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-xs-6 xs_fullwidth v_middle">
                <div class="about_us_content_wrapper">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a  href="#mission" aria-controls="mission" role="tab" data-toggle="tab">our mission</a></li>
                            <li role="presentation"><a href="#vision"  aria-controls="vision" role="tab" data-toggle="tab">our vision</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fadeInUpShort animated active" id="mission">
                                <div class="mission_vision_title"><h4>{{$information->mission_title}}</h4></div>
                                <p>{{$information->mission}}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fadeInUpShort animated" id="vision">
                                <div class="mission_vision_title"><h4>{{$information->vision_title}}</h4></div>
                                <p>{{$information->vision}}</p>
                            </div>
                        </div>
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
                        <p>{{$information->who_we_are}}</p>

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
                        @foreach($faq as $faqs)
                            <div class="panel panel-default">
                                <div class="single_acco_title">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#{{$faqs->id}}"
                                           aria-expanded="false" class="collapsed">
                                            {{$faqs->title}}
                                            <span class="fa fa-plus"></span></a>
                                    </h4>
                                </div>
                                <div id="{{$faqs->id}}" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;" role="tablist">
                                    <div class="panel-body text-justify"><p>{{$faqs->description}}</p>
                                        <span class="acoo_icon fa fa-truck"></span>
                                    </div>
                                </div>
                            </div><!-- single accprdion pnae end -->
                        @endforeach


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
    START SERVICE AREA
=================================-->
<section class="service_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
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

                        @foreach($service as $services)
                            <div class="single_service_wrapper">
                                <div class="service_img">
                                    <img src="{{asset('storage/service/'.$services->image)}}" alt="service-img">
                                </div>
                                <div class="service_content">
                                    <div class="service_title">
                                        <a href="single_service.html"><h3>{{$services->title}}</h3></a>
                                    </div>
                                    <div class="service_text">
                                        <p>{{str_limit($services->description,80)}}</p>
                                    </div>
                                    <div class="read_more">
                                        <a href="single_service.html">read more <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                        @foreach($testimonial as $testimonials)
                            <div class="single_slider">
                                <div class="testimonial">
                                    <p>
                                        {{str_limit($testimonials->message,200)}}
                                        <span class="quote fa fa-quote-right"></span>
                                    </p>
                                </div>
                                <div class="person_about">
                                    <div class="image">
                                        <img src="{{asset('storage/testimonial/'.$testimonials->image)}}" alt="testimonial-img">
                                    </div>
                                    <div class="desig">
                                        <p class="name">{{$testimonials->name}}</p>
                                        <span>{{$testimonials->profession}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
            <p>Placerat facer possim assumm insitam est usus legentis in iis qui facit eorum</p>
        </div>
        <div class="col-md-5 xs_fullwidth col-xs-3 v_middle">
            <div class="call_to_action_btn">
                <a class="trust_btn" href="{{route('contact')}}">contact us</a>
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
                <!-- section_title starts -->
                <div class="section_title title_center">
                    <div class="sub_title">
                        <p>What Our Partner Was</p>
                    </div>
                    <div class="title"><h2>Sponsor</h2></div>
                </div><!-- section_title starts -->
            </div>
        </div><!-- /.row end -->
        <div class="row">
            <div class="col-md-12">
                <div class="partner_wrapper">
                    <div class="partner_slider">
                        @foreach($sponsor as $sponsors)
                            <div class="partner">
                                <a href="{{$sponsors->url}}"><img
                                            src="{{asset('storage/sponsor/'.$sponsors->image)}}" alt="" height="100%"></a>
                            </div>
                        @endforeach
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