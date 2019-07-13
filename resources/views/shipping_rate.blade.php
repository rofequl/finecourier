@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <!--================================
    START SLIDER AREA
=================================-->
    <section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort"
             style="padding-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-sm-offset-1 col-md-offset-1">
                    <div class="quote_requ_wrapper">
                        <div class="section_title">
                            <div class="title"><h2>Shipping Rate Calculator</h2></div>
                        </div>

                        <div class="sub_content">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">International</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Domestic</button>
                                </div>
                            </div>
                        </div>

                        <div class="quote_form">
                            <form action="{{route('ShippingRateSearch')}}" method="get">
                                <div class="form-group text-left">
                                    <label for="usr">From:</label>
                                    <select class="js-example-basic-single" name="from_country"
                                            style="margin-bottom: 0">
                                        <option></option>
                                        @foreach($earth as $earths)
                                            @if(isset($request) && $request->from_country == $earths['code'])
                                                <option value="{{$earths['code']}}" selected>{{$earths['name']}}</option>
                                            @else
                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <label for="usr2">To:</label>
                                    <select class="js-example-basic-single form-control" name="to_country"
                                            style="margin-bottom: 0">
                                        <option></option>
                                        @foreach($earth as $earths)
                                            @if(isset($request) && $request->to_country == $earths['code'])
                                                <option value="{{$earths['code']}}" selected>{{$earths['name']}}</option>
                                            @else
                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <label for="usr3">What are you planning to ship?</label>
                                    <div class="row">
                                        <div class="panel panel-body col-md-4 col-md-offset-1"
                                             style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                             id="shipping_type1">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                            Document
                                        </div>
                                        <div class="panel panel-body col-md-4 col-md-offset-1"
                                             style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                             id="shipping_type2">
                                            <i class="fa fa-cube" aria-hidden="true"></i>
                                            Parcel
                                        </div>
                                        <input type="hidden" value="{{isset($request)? $request->shipping_type:'Parcel'}}" name="shipping_type" id="shipping_type">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="usr3">Weight:</label>
                                        <div class="input-group">
                                            <input type="text" name="weight"
                                                   class="form-control" value="{{isset($request)? $request->weight:0.5}}" required>
                                            <span class="input-group-addon"
                                                  style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                            <select id="searchbygenerals_currency" name="weight_type"
                                                    class="form-control">
                                                <option value="KG">KG</option>
                                                <option value="LB">LB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <label for="usr3">How do you want to arrange for payment?</label>
                                    <div class="row">
                                        <div class="panel panel-body col-md-4 col-md-offset-1"
                                             style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                             id="delivery_type1">
                                            <h4>Regular</h4>
                                            <p>I am exporting and I will pay when I ship</p>
                                        </div>
                                        <div class="panel panel-body col-md-4 col-md-offset-1"
                                             style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                             id="delivery_type2">
                                            <h4>Express</h4>
                                            <p>I am importing and I will pay when I receive</p>
                                        </div>
                                        <input type="hidden" value="{{isset($request)? $request->delivery_type:'Regular'}}" name="delivery_type" id="delivery_type">
                                    </div>
                                </div>
                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit">Check Rate</button>
                                </div>
                            </form>
                        </div>

                        <div class="quote_form hidden">
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
                </div>
                <div class="col-md-4 col-sm-5 bg-dark">
                    @if(isset($action))

                        @if($action == 1)
                            <div class="panel panel-body"
                                 style="text-align:center;margin-top:80px;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                <p style="font-size: 20px;margin: 20px 0">Price: {{$price}} {{$data->currency}}</p>
                                <h4>
                                    {{get_country_name_by_code($request->from_country)->name}}
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    {{get_country_name_by_code($request->to_country)->name}}

                                </h4>
                            </div>
                        @else

                            <div class="panel panel-body"
                                 style="text-align:center;margin-top:80px;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                <p>Cash Rates Are Not Yet Available For</p>
                                <h4>
                                    {{get_country_name_by_code($request->from_country)->name}}
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    {{get_country_name_by_code($request->to_country)->name}}

                                </h4>
                            </div>

                        @endif

                    @endif
                </div>
            </div>
        </div>
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

@push('scripts')
    <script>
        checked();

        function checked() {
            if ($('#shipping_type').val() === 'Parcel') {
                $('#shipping_type2').css({'border': '1px solid red'});
                $('#shipping_type1').css({'border': '1px solid #ddd'});
            } else {
                $('#shipping_type1').css({'border': '1px solid red'});
                $('#shipping_type2').css({'border': '1px solid #ddd'});
            }

            if ($('#delivery_type').val() === 'Regular') {
                $('#delivery_type1').css({'border': '1px solid red'});
                $('#delivery_type2').css({'border': '1px solid #ddd'});
            } else {
                $('#delivery_type2').css({'border': '1px solid red'});
                $('#delivery_type1').css({'border': '1px solid #ddd'});
            }
        }

        $('#shipping_type1').click(function () {
            if ($('#shipping_type').val() === 'Parcel') {
                $("#shipping_type").val('Document');
                checked();
            }
        });

        $('#shipping_type2').click(function () {
            if ($('#shipping_type').val() === 'Document') {
                $("#shipping_type").val('Parcel');
                checked();
            }
        });

        $('#delivery_type1').click(function () {
            if ($('#delivery_type').val() === 'Express') {
                $("#delivery_type").val('Regular');
                checked();
            }
        });

        $('#delivery_type2').click(function () {
            if ($('#delivery_type').val() === 'Regular') {
                $("#delivery_type").val('Express');
                checked();
            }
        });
    </script>
@endpush