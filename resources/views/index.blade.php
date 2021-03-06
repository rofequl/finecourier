@extends('layout.app')
@section('content')
    <!--================================
        START SLIDER AREA
    =================================-->
    <section class="slider_area" style="height: 500px">

        <!-- slider starts  -->
        <div class="sliders">

            <!-- hero slides -->
            <div class="hero_sliders">

                @foreach($slide as $slider)

                    <div class="hero_slide" data-src="{{asset('storage/slider/'.$slider->image)}}">
                        <div class="captions_wrapper right">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4">
                                        <div class="single_slider_wrapper">
                                            <span class="small_title fadeInRightShort animated">{{$slider->slider_title_one}}</span><br>
                                            <h1 class="big_title fadeInRightShort animated">{{$slider->slider_title_two}}</h1>
                                            <div class="hero_btn">
                                                <a href="#" class="trust_btn">see more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach


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
                                @include('inc.menubar')
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


{{--    <!--================================--}}
{{--        START Fine courier Option--}}
{{--    =================================-->--}}
{{--    <section class="partner_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="partner col-md-4" style="margin-top: 10px;font-size: 17px;text-align: center">--}}
{{--                            <div style="border: 1px solid #ddd;">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <!-- section_title starts -->--}}
{{--                                        <div class="section_title">--}}
{{--                                            <div class="sub_title"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h4>Find Finecourier In</h4>--}}
{{--                                <h5> Bangladesh </h5>--}}
{{--                                <p>Nothing Found</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="partner col-md-4" style="margin-top: 10px;font-size: 17px;text-align: center">--}}
{{--                            <div style="border: 1px solid #ddd; padding: 0 5px 5px">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <!-- section_title starts -->--}}
{{--                                        <div class="section_title">--}}
{{--                                            <div class="sub_title"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h4>Get A Quick Shipping Rate</h4>--}}
{{--                                <p> Competitive shipping rates designed for your needs</p>--}}
{{--                                <form action="{{route('ShippingRateSearch')}}" method="post" style="margin: 20px">--}}
{{--                                   {{csrf_field()}}--}}
{{--                                    <div class="form-group text-left">--}}
{{--                                        <label for="usr">From:</label>--}}
{{--                                        <select class="js-example-basic-single" name="from" style="margin-bottom: 0">--}}
{{--                                           <option></option>--}}
{{--                                            @foreach($earth as $earths)--}}
{{--                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group text-left">--}}
{{--                                        <label for="usr2">To:</label>--}}
{{--                                        <select class="js-example-basic-single form-control" name="to" style="margin-bottom: 0">--}}
{{--                                            <option></option>--}}
{{--                                            @foreach($earth as $earths)--}}
{{--                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group text-left">--}}
{{--                                        <label for="usr3">Weight:</label>--}}
{{--                                        <input type="text" id="usr3" name="weight" placeholder="Weight" class="form-control" value="0.5"--}}
{{--                                               style="margin-bottom: 0">--}}
{{--                                    </div>--}}

{{--                                    <div class="contact_btn_wrapper">--}}
{{--                                        <button class="trust_btn qute_sbmt" type="submit" name="button">Check Rates--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="partner col-md-4" style="margin-top: 10px;font-size: 17px;text-align: center">--}}
{{--                            <div style="border: 1px solid #ddd;">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <!-- section_title starts -->--}}
{{--                                        <div class="section_title">--}}
{{--                                            <div class="sub_title"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h4>Type your tracking number</h4>--}}
{{--                                <form action="#" style="margin: 20px">--}}
{{--                                    <div class="form-group text-left">--}}
{{--                                        <label for="usr3">Tracking Number:</label>--}}
{{--                                        <input type="text" id="usr3" placeholder="Type your tracking number" style="margin-bottom: 0">--}}
{{--                                    </div>--}}

{{--                                    <div class="contact_btn_wrapper">--}}
{{--                                        <button class="trust_btn qute_sbmt" type="submit" name="button">Track--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!--================================--}}
{{--        END Fine courier Option--}}
{{--    =================================-->--}}


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

                            @foreach($service as $services)
                                <div class="single_service_wrapper">
                                    <div class="service_img">
                                        <img src="{{asset('storage/service/'.$services->image)}}" alt="service-img"
                                             height="180px">
                                    </div>
                                    <div class="service_content">
                                        <div class="service_title">
                                            <a href="{{route('SingleService',$services->id)}}">
                                                <h3>{{$services->title}}</h3></a>
                                        </div>
                                        <div class="service_text">
                                            <p>{{str_limit($services->description,80)}}</p>
                                        </div>
                                        <div class="read_more">
                                            <a href="{{route('SingleService',$services->id)}}">read more <span
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
                                            <img src="{{asset('storage/testimonial/'.$testimonials->image)}}"
                                                 alt="testimonial-img">
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
                <p>Placerat facer possim assum Typi non habent s legentis in iis qui facit eorum</p>
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
                                                src="{{asset('storage/sponsor/'.$sponsors->image)}}" alt=""
                                                height="100%"></a>
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
