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
                        <img src="{{asset('storage/service/'.$service->image)}}" alt="single detail">
                    </div>

                    <div class="post">
                        <div class="section_title">
                            <div class="title"><h2>{{$service->title}}</h2></div>
                        </div>

                        <div class="post_content">
                            <p>
                                {{$service->description}}
                            </p>
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