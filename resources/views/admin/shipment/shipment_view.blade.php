@extends('admin.layout.app')
@section('content')


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Booking request {{$shipment->shipment==1?'International':'Domestic'}}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-12">
                                    <img
                                        src="{{asset('storage/logo/'.basic_information()->company_logo)}}"
                                        width="200px">
                                </div>
                                <div class="col-sm-6">
                                    {!! DNS1D::getBarcodeHTML($shipment->tracking_code, "EAN13") !!}
                                    <p class="text-dark" style="font-size: 15px">Tracking Code:
                                        {{$shipment->tracking_code}}</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    Date: {{$shipment->created_at->format('d M, Y')}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="font-weight: 700;font-size: 20px;color: #6f5858;">Shipper</h4>
                                    <p class="text-success mb-0" style="font-size: 20px">
                                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->name}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-phone-square mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->phone_one}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->email}}
                                    </p>
                                    <p class="" style="font-size: 15px">
                                        <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                        {{get_city_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state,get_address_by_id($shipment->shipper_address)->city)->name}}
                                        ,
                                        {{get_state_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state)->name}}
                                        ,
                                        {{get_country_name_by_code(get_address_by_id($shipment->shipper_address)->country)->name}}
                                        ,
                                        {{get_address_by_id($shipment->shipper_address)->post_code}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="font-weight: 700;font-size: 20px;color: #6f5858;">Receiver</h4>
                                    <p class="text-success mb-0" style="font-size: 20px">
                                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->receiver_address)->name}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-phone-square mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->phone_one}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->email}}
                                    </p>
                                    <p class="" style="font-size: 15px">
                                        <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                        {{get_city_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state,get_address_by_id($shipment->receiver_address)->city)->name}}
                                        ,
                                        {{get_state_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state)->name}}
                                        ,
                                        {{get_country_name_by_code(get_address_by_id($shipment->receiver_address)->country)->name}}
                                        ,
                                        {{get_address_by_id($shipment->receiver_address)->post_code}}
                                    </p>
                                </div>
                                <div class="col-12" style="padding: 10px;">
                                    <h4 style="font-weight: 700;font-size: 20px;color: #6f5858;">Biller address</h4>
                                    <p class="text-success mb-0" style="font-size: 20px">
                                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->biller_address)->name}}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-black mb-0" style="font-size: 15px">
                                                <i class="fa fa-phone-square mr-2" aria-hidden="true"></i>
                                                {{get_address_by_id($shipment->biller_address)->phone_one}}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-black mb-0" style="font-size: 15px">
                                                <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                                {{get_address_by_id($shipment->biller_address)->email}}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mt-2" style="font-size: 15px">
                                                <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                                {{get_city_name_by_code(get_address_by_id($shipment->biller_address)->country,get_address_by_id($shipment->biller_address)->state,get_address_by_id($shipment->biller_address)->city)->name}}
                                                ,
                                                {{get_state_name_by_code(get_address_by_id($shipment->biller_address)->country,get_address_by_id($shipment->biller_address)->state)->name}}
                                                ,
                                                {{get_country_name_by_code(get_address_by_id($shipment->biller_address)->country)->name}}
                                                ,
                                                {{get_address_by_id($shipment->biller_address)->post_code}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>No. of Peace</th>
                                                <th>Shipping Type</th>
                                                <th>Origin Country</th>
                                                <th>Weight</th>
                                                <th>Good Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$shipment->peace}}</td>
                                                <td>{{$shipment->shipping_type}}</td>
                                                <td>{{get_country_name_by_code($shipment->origin_country)->name}}</td>
                                                <td>{{$shipment->weight}} {{$shipment->weight_type}}</td>
                                                <td>{{$shipment->good_value}} {{$shipment->origin_currency}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Service type:
                                                        <small>
                                                            @if($shipment->delivery_type == 'Regular')
                                                                REGULAR
                                                                (I am importing and I will pay when)
                                                            @else
                                                                EXPRESS
                                                                (I am exporting and I will pay when I ship)
                                                            @endif
                                                        </small>
                                                    </div>
                                                    <br>
                                                    <div class="widget-heading">Payment:
                                                        <small>
                                                            @if($shipment->payment_type == 1)
                                                                In cash by the shipper
                                                            @else
                                                                By credit card by the shipper
                                                            @endif
                                                        </small>
                                                    </div>
                                                    <br>
                                                    # We’ve notified the shipper and receiver.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left w-100">
                                                    <div class="card card-body shadow-none p-1" id="FoundPrice"
                                                         style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                                        <div style="font-size: 20px;height: 100px;width: 107px;margin: 20px 0;border: 1px dotted blueviolet;border-radius: 50%;padding-top: 35px;display: inline-block;margin-left: auto;
                            margin-right: auto;" id="PriceShowing">
                                                            {{$shipment->price}}
                                                            {{$shipment->currency}}
                                                        </div>
                                                        <h4>
                                                            <span id="NotFoundState1">{{$shipment->address_one}}</span>
                                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                            <span id="NotFoundState21">{{$shipment->address_two}}</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')

@endpush

@push('scripts')

@endpush
