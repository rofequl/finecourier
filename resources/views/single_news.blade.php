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
                            <img src="{{asset('storage/news/'.$news->image)}}" alt="img">
                        </div><!-- /.blog_img end -->

                        <!-- blog_meta start -->
                        <div class="blog_meta">
                            <ul>
                                <li>
                                    <div class="date">
                                        <span class="text-uppercase">{{$news->updated_at->format('M')}}</span>
                                        <span class="num">{{$news->updated_at->format('d')}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="blog_title"><h3>{{$news->title}}</h3></div>
                                    <div class="author_info">
                                        <p><span class="fa fa-user"></span>{{$news->name}}</p>
                                    </div>
                                    <div class="comments_count">
                                        <p><span class="fa fa-comments-o"></span>(200)</p>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- blog_meta end -->

                        <!-- blog_contents start -->
                        <div class="blog_contents">
                            <p>{{$news->description}}</p>

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

                                {!! Share::currentPage()->facebook()->twitter()->linkedin()->whatsapp() !!}


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
                                    <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis
                                        in iis qui
                                        facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius
                                        quod ii
                                        legunt saepius. Claritas est etiam processus</p>
                                    <div class="reply"> <span class="fa fa-user"></span></div>
                                </div>
                            </div><!-- end single comment wrapper -->

                            <!-- start single comment wrapper -->
                            <div class="single_comment_wrapper">
                                <div class="single_comment clearfix">
                                    <p>Placerat facer possim assum. Typi non habent claritatem insitam est usulegentis
                                        in iis qui
                                        facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius
                                        quod ii
                                        legunt saepius. Claritas est etiam processus</p>
                                    <div class="reply"> <span class="fa fa-user"></span></div>
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
                            <div class="category_widget">
                                <ul>
                                    @foreach(service() as $services)
                                        <li><a href="{{route('SingleService',$services->id)}}">{{$services->title}}</a></li>
                                    @endforeach
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
                                @foreach($recent_news as $recent_newss)
                                    <li>
                                        <div class="recent_blog_img v_middle">
                                            <a href="{{route('SingleNews',$recent_newss->id)}}">
                                                <img src="{{asset('storage/news/'.$recent_newss->image)}}" alt="Image" width="82" height="65">
                                                <span class="recent_post_link  fa fa-link"></span>
                                            </a>
                                        </div>

                                        <div class="single_recent_post v_middle">
                                            <span class="recent_post_meta">{{$recent_newss->updated_at->format('d M Y')}}</span>
                                            <a href="{{route('SingleNews',$recent_newss->id)}}"><p>{{$recent_newss->title}}</p></a>
                                        </div>
                                    </li>
                                @endforeach

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