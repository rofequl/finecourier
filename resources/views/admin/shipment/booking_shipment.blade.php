@extends('admin.layout.app')
@section('pageTitle','Booking Request list')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All Booking request information</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <p>Simple table with booking request any people</p>

                            <!-- start project list -->
                            <div class="table-responsive">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Tracking Code</th>
                                        <th>Shipping type</th>
                                        <th>Shipping content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipping as $shipment)
                                        <tr class="tr">
                                            <td>#</td>
                                            <td>
                                                <a>{{$shipment->shipper_name}}</a>
                                                <br>
                                                <a>{{get_country_name_by_code($shipment->from_country)->name}}</a>
                                            </td>
                                            <td>
                                                @if($shipment->booking_type == 1)
                                                    {{$shipment->created_at->format('d-M-Y')}}
                                                @else
                                                    Pickup: {{$shipment->pickup_date}} <br>
                                                    Delivery: {{$shipment->pickup_delivery}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($shipment->tracking_code != '')
                                                    {!! DNS1D::getBarcodeHTML($shipment->tracking_code, "EAN13",1,23) !!}
                                                    <p style="font-size: 15px;color: black;">
                                                        *{{$shipment->tracking_code}}*</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($shipment->booking_type == 1)
                                                    International
                                                @else
                                                    Domestic
                                                @endif
                                            </td>
                                            <td>
                                                {{$shipment->shipping_type}}
                                            </td>
                                            <td>
                                                @if($shipment->status == 0)
                                                    <span class="label label-success">Request</span>
                                                @elseif($shipment->status == 1)
                                                    <span class="label label-success">Ready For A Pickup</span>
                                                @else
                                                    <span class="label label-success">Block</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('AdminBookingRequestView','data='.base64_encode($shipment->id))}}"
                                                   class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $shipping->render() !!}

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
