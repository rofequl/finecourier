@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <!--================================
        START BRANCHES AREA
    =================================-->
    <section class="branches section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-12 starts -->
                <div class="col-md-12">
                    <!-- single address -->
                    @foreach($contact as $contacts)
                        <div class="single_branch">
                            <div class="branch_title"><h4>{{$contacts->contact_title}}</h4></div>
                            {!!$contacts->contact_information!!}
                        </div>
                    @endforeach

                </div><!-- col-md-12 ends -->
            </div><!-- row ends -->
        </div>
    </section>
    <!--================================
        END BRANCHES AREA
    =================================-->

    <!--================================
        START QUOTE AREA
    =================================-->
    <section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">

                <!-- col-md-3 starts -->
                <div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1">
                    <div class="quote_requ_wrapper">
                        <div class="section_title title_center">
                            <div class="title"><h2>SEND US A MESSAGE</h2></div>
                        </div>
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="contact_form">
                            <form action="{{route('SendUsMessage')}}" method="post">
                                {{csrf_field()}}
                                <div class="form_half left">
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                                <div class="form_half right">
                                    <input type="number" placeholder="Phone" name="phone">
                                </div>

                                <input type="email" placeholder="Email" name="email">

                                <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>

                                <div class="contact_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit" name="button">send message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!--  -->
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        END QUOTE AREA
    =================================-->

    <!--================================
        START MAP AREA
    =================================-->
    <div id="google_map"></div>
    <!--================================
        END MAP AREA
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



    <script>

        function initMap() {
            var map = new google.maps.Map(document.getElementById('google_map'), {
                center: {
                    lat: 23.777, lng: 90.399
                },
                zoom: 6.5
            });
        }
    </script>

@endsection
