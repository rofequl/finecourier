@extends('admin.layout.app')
@section('content')

    <style>
        .tr{
            cursor: pointer;
        }
    </style>

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
                            <table class="table table-striped table-hover projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 40%">Address</th>
                                    <th>Date</th>
                                    <th>Shipping type</th>
                                    <th>Booking type</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shipping as $shipment)
                                    <tr class="tr" onclick="location.href='{{route('AdminBookingRequestView','data='.base64_encode($shipment->id))}}';">
                                        <td>#</td>
                                        <td>
                                            <a>{{str_limit($shipment->shipper_address,50)}}</a>
                                            <br>
                                            <a>{{str_limit($shipment->receiver_address,50)}}</a>
                                        </td>
                                        <td>
                                            @if($shipment->booking_type == 1)
                                                {{$shipment->created_at->format('d-MM-YY')}}
                                            @else
                                                Pickup: {{$shipment->pickup_date}} <br>
                                                Delivery: {{$shipment->pickup_delivery}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$shipment->shipping_type}}
                                        </td>
                                        <td>
                                            @if($shipment->booking_type == 1)
                                                International
                                            @else
                                                Domestic
                                            @endif
                                        </td>
                                        <td>
                                            <span class="label label-success">Request</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
