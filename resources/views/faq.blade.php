@extends('layout.app')
@section('content')

    @include('inc.slide_area')


    <!--================================
        START ABOUT US AREA
    =================================-->
    <section class="about_us_area dark_bg section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">

            <!-- row starts -->
            <div class="row">
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
                                                {{$faqs->message}}
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

                <!-- /.col-md-6 starts -->
                <div class="col-md-6 xs_fullwidth col-xs-6">
                    <div class="right_message">
                        <!-- section_title starts -->
                        <div class="section_title">
                            <div class="sub_title">
                                <p>Contact Us</p>
                            </div>
                            <div class="title"><h2>send us message</h2></div>
                        </div><!-- section_title starts -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                    @endif
                    <!-- send us message form -->
                        <div class="send_message">
                            <form action="{{route('AddFaq')}}" method="post">
                                {{csrf_field()}}
                                <div class="form_half">
                                    <input class="name" type="text" placeholder="Name" name="name">
                                </div>
                                <div class="form_half">
                                    <input class="phone" type="text" placeholder="Phon No" name="phone">
                                </div>
                                <input type="email" placeholder="Your Email" name="email">

                                <textarea name="message" placeholder="Write Your Text" id="message" cols="30"
                                          rows="10"></textarea>

                                <div class="submit_btn">
                                    <button class="trust_btn" type="submit" name="button">send message</button>
                                </div>
                            </form>
                        </div>
                        <!-- end send us message form -->
                    </div>
                </div><!-- /.col-md-6 ends -->
            </div><!-- /.row ends -->

        </div><!-- /.container ends -->
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