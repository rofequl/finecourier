@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <!--================================
    START ABOUT US AREA
=================================-->
    <section class="services_section section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <div class="row">

                @foreach($news as $newss)
                    <div class="col-md-4 col-xs-6 xxs_fullwidth">
                        <div class="single_blog_wrapper">
                            <div class="blog_img">
                                <img src="{{asset('storage/news/'.$newss->image)}}" alt="service-img" width="100%">
                            </div>

                            <div class="blog_content">
                                <div class="date">
                                    <span>FEB</span>
                                    <span class="num">10</span>
                                </div>

                                <div class="blog_meta">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-user"></span>{{$newss->name}}</a></li>
                                        <li><a href="#"><span class="fa fa-heart-o"></span>{{$newss->like}}</a></li>
                                    </ul>
                                </div>

                                <div class="blog_title">
                                    <a href="single_news.html"><h3>{{$newss->title}}</h3></a>
                                </div>
                                <div class="blog_text">
                                    <p>{{str_limit($newss->description,120)}}</p>
                                </div>
                                <div class="read_more">
                                    <a href="single_news.html">read more <span class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div><!-- /.row end -->
        </div>
        <!-- /.container starts -->
    </section>
    <!--================================
        END ABOUT US AREA
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
                <p>Placerat facer possim assum Typi non habent claritatem iis qui facit eorum</p>
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