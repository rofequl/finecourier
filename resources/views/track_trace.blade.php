@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <!--================================
    START TRACK & TRACE AREA
=================================-->
    <section class="tc_section section_padding reveal animated" style="padding-bottom: 70px" data-delay="0.2s"
             data-anim="fadeInUpShort">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="tc_title"><h4>Please Enter Your Product Code And You Will See Your Product</h4></div>
                    <div class="tc_form">
                        <form action="{{route('TrackTrace')}}" method="GET">
                            <div class="tc_input_wrapper">
                                <input name="track" type="text" placeholder="Enter Your Tracking Code"
                                       value="{{isset($track)?$track->tracking_code:''}}">
                                <span class="fa fa-truck"></span>
                                <button class="tc_btn" type="submit">enter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================
        END TRACK & TRACE AREA
    =================================-->
    @if(isset($track))
        <section>
            <div class="container" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-md-8 panel panel-body col-md-offset-2"
                         style="background-color: #006cb7;border-radius: 3px;color: white;font-size: 19px;">
                        Your Item(s) has been
                        @if($track->status == 1)
                            ready for pickup
                            <style>
                                .shipment div,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 1)
                            picked
                            <style>
                                .shipment div,
                                .pickup div,
                                .pickup p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 3)
                            container
                            <style>
                                .shipment div,
                                .pickup div,
                                .container div,
                                .pickup p,
                                .container p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .container i,
                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 4)
                            shipped
                            <style>
                                .shipment div,
                                .pickup div,
                                .container div,
                                .shipped div,
                                .pickup p,
                                .shipped p,
                                .container p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .shipped i,
                                .container i,
                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 7)
                            delivered
                            <style>
                                .shipment div,
                                .pickup div,
                                .container div,
                                .shipped div,
                                .delivered div,
                                .delivered p,
                                .pickup p,
                                .shipped p,
                                .container p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .delivered i,
                                .shipped i,
                                .container i,
                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @endif
                    </div>
                </div>
                <div class="row" style="margin: 20px 0">
                    <div class="col-md-2 col-md-offset-1 text-center shipment">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-clipboard-check"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Confirm Shipment</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center pickup">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-package"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Pickup</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center container">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-package-variant-closed"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Container</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center shipped">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-truck-delivery"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Shipped</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center delivered">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-webpack"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Delivered</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 panel panel-body col-md-offset-2"
                         style="background-color: #d9f5ff;border-radius: 3px;">
                        Dear
                        @if($track->receiver_name)
                            {{$track->receiver_name}}
                        @else
                            {{get_user_by_id($track->user_id)->first_name}}
                            {{get_user_by_id($track->user_id)->last_name}}
                        @endif
                        , <br>
                        Item(s) from your order #{{$track->tracking_code}} has been Shipped! Details on when you can
                        expect it at
                        your doorstep are provided below. Please find tracking information for your package below.
                        We will update you again if there is outstanding item(s) in your order.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 panel panel-body col-md-offset-2"
                         style="background-color: #d9f5ff;border-radius: 3px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Shipping type</th>
                                <th class="text-center">Shipping content</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">@if($track->receiver_name)
                                        {{$track->receiver_name}}
                                    @else
                                        {{get_user_by_id($track->user_id)->first_name}}
                                        {{get_user_by_id($track->user_id)->last_name}}
                                    @endif</td>
                                <td class="text-center">
                                    {{$track->created_at->format('d M, Y')}}
                                </td>
                                <td class="text-center">
                                    @if($track->shipment == 1)
                                        International
                                    @else
                                        Domestic
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{$track->shipping_type}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(isset($none))
        <section>
            <div class="container" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-md-8 panel panel-body col-md-offset-2"
                         style="background-color: #006cb7;border-radius: 3px;color: white;font-size: 19px;">
                        Invalid number / data not currently available
                    </div>
                </div>
            </div>
        </section>
    @endif



@endsection

@push('style')
    <link href="//cdn.materialdesignicons.com/3.8.95/css/materialdesignicons.min.css" rel="stylesheet">
@endpush
