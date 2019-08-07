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
                            Label Create
                            <style>
                                .shipment div,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 2)
                            Pickup
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
                            Dispatch Center
                            <style>
                                .shipment div,
                                .pickup div,
                                .containers div,
                                .pickup p,
                                .containers p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .containers i,
                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 4)
                            In Transit
                            <style>
                                .shipment div,
                                .pickup div,
                                .containers div,
                                .shipped div,
                                .pickup p,
                                .shipped p,
                                .containers p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .shipped i,
                                .containers i,
                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @elseif($track->status == 5)
                            Out for Delivery
                            <style>
                                .shipment div,
                                .pickup div,
                                .containers div,
                                .shipped div,
                                .delivered div,
                                .delivered p,
                                .pickup p,
                                .shipped p,
                                .containers p,
                                .shipment p {
                                    color: #7f7f15 !important;
                                }

                                .delivered i,
                                .shipped i,
                                .containers i,
                                .pickup i,
                                .shipment i {
                                    border-color: #7f7f15 !important;
                                }
                            </style>
                        @endif
                    </div>
                </div>
                <div class="row" style="margin: 20px 0">
                    <div class="col-md-2 text-center shipment">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-clipboard-check"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Label Create</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center pickup">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-package"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Pickup</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center containers">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-package-variant-closed"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Dispatch Center</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center shipped">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-truck-delivery"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">In Transit</p>
                        </div>
                    </div>
                    <div class="col-md-2 text-center delivered">
                        <div style="font-size: 50px;color: #9e9e9e;margin-top: 10px">
                            <i class="mdi mdi-webpack"
                               style="border: 2px solid #9e9e9e;padding: 14px;border-radius: 50%;"></i>
                            <p style="margin-top: 28px;color: #9e9e9e;">Out for Delivery</p>
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
                    <div class="col-md-8 col-md-offset-2" style="padding-right: 0; padding-left: 0">
                        <div class="col-md-8"
                             style="background-color: #d9f5ff;border-radius: 3px;">

                            <div class="" style="width: 50%;margin-top: 10px">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button type="button" id="overview" class="btn btn-primary">Overview
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" id="detailed_view" class="btn btn-default">Detailed View
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr style="background-color: #00A000;padding: .5px">
                            <table class="table" id="overview1">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($track->status == 1)
                                    <tr>
                                        <td>Confirm Shipment</td>
                                        <td>{{$track->created_at->format('d/m/Y h:m A')}}</td>
                                        <td>{{$track->address_one}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{get_shipment_status($track->tracking_code, $track->status)->name}}</td>
                                        <td>{{get_shipment_status($track->tracking_code, $track->status)->time}}</td>
                                        <td>{{get_shipment_status($track->tracking_code, $track->status)->location}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            <table class="table hidden" id="detailed_view1">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(get_shipment_status($track->tracking_code))
                                    @foreach(get_shipment_status($track->tracking_code) as $tracks)
                                        <tr>
                                            <td>{{$tracks->name}}</td>
                                            <td>{{$tracks->time}}</td>
                                            <td>{{$tracks->location}}</td>
                                        </tr>
                                    @endforeach
                                @endif

                                <tr>
                                    <td>Confirm Shipment</td>
                                    <td>{{$track->created_at->format('d/m/Y h:m A')}}</td>
                                    <td>{{$track->address_one}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4" style="padding-right: 0">
                            <table class="table" style="background-color: #d9f5ff;border-radius: 3px;">
                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>@if($track->receiver_name)
                                            {{$track->receiver_name}}
                                        @else
                                            {{get_user_by_id($track->user_id)->first_name}}
                                            {{get_user_by_id($track->user_id)->last_name}}
                                        @endif</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>
                                        {{$track->created_at->format('d M, Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping type</th>
                                    <td>
                                        @if($track->shipment == 1)
                                            International
                                        @else
                                            Domestic
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping content</th>
                                    <td>
                                        {{$track->shipping_type}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
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

@push('scripts')
    <script>
        $('#overview').click(function () {
            if (!$('#detailed_view1').hasClass('hidden')) {
                $('#detailed_view1').addClass('hidden');
            }
            if ($('#overview1').hasClass('hidden')) {
                $('#overview1').removeClass('hidden');
                $('#overview').toggleClass('btn-default btn-primary');
                $('#detailed_view').toggleClass('btn-primary btn-default');
            }
        });

        $('#detailed_view').click(function () {
            if (!$('#overview1').hasClass('hidden')) {
                $('#overview1').addClass('hidden');
            }
            if ($('#detailed_view1').hasClass('hidden')) {
                $('#detailed_view1').removeClass('hidden');
                $('#detailed_view').toggleClass('btn-default btn-primary');
                $('#overview').toggleClass('btn-primary btn-default');
            }
        });
    </script>
@endpush
