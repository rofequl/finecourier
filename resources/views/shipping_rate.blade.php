@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <!--================================
    START SLIDER AREA
=================================-->
    <section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort"
             style="padding-bottom: 50px">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">

                <!-- col-md-3 starts -->
                <div class="col-md-8 col-sm-7 col-sm-offset-1 col-md-offset-1">
                    <div class="quote_requ_wrapper">
                        <div class="section_title">
                            <div class="title"><h2>Shipping Rate Calculator</h2></div>
                        </div>

                        <div class="sub_content">
                            <p>Competitive shipping rates designed for your needs</p>
                        </div>

                        <div class="quote_form">
                            <form action="{{route('ShippingRateSearch')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group text-left">
                                    <label for="usr">From:</label>
                                    <select class="js-example-basic-single" name="from" style="margin-bottom: 0">
                                        <option></option>
                                        @foreach($earth as $earths)
                                            <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <label for="usr2">To:</label>
                                    <select class="js-example-basic-single form-control" name="to"
                                            style="margin-bottom: 0">
                                        <option></option>
                                        @foreach($earth as $earths)
                                            <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <label for="usr3">Weight:</label>
                                    <input type="text" id="usr3" placeholder="Weight" name="weight" class="form-control"
                                           value="0.5"
                                           style="margin-bottom: 0">
                                </div>
                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit" name="button">Check Rate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        START SLIDER AREA
    =================================-->

    <!--================================
       START Fine courier Option
   =================================-->
    @if(isset($rate))
        <section class="partner_area reveal animated" data-delay="0.2s" data-anim="fadeInUpShort"
                 style="margin-bottom: 100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="partner col-md-4"
                                 style="margin-top: 10px;margin-left:80px;font-size: 17px;text-align: center">
                                <div style="border: 1px solid #ddd; padding: 0 5px 5px">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <!-- section_title starts -->
                                            <div class="section_title">
                                                <div class="sub_title"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Value Express Parcels </h4>
                                    <h3 style="margin: 20px 0">
                                        @if($rate)
                                            {{$rate}} $
                                        @else
                                            No Result Found
                                        @endif
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--================================
        END Fine courier Option
    =================================-->

@endsection