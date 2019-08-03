@extends('admin.layout.app')
@section('pageTitle','Shipping List')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All prepare shipping information</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <p>Simple table with shipping request any people</p>

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
                                    @foreach($sortedCollection as $shipment)
                                        <tr class="tr">
                                            <td>#</td>
                                            <td>
                                                <a title="Header" data-toggle="popover" data-trigger="hover"
                                                   data-content="Some content">
                                                    @if($shipment->receiver_name)
                                                        {{$shipment->receiver_name}}
                                                    @else
                                                        {{get_user_by_id($shipment->user_id)->first_name}}
                                                        {{get_user_by_id($shipment->user_id)->last_name}}
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                {{$shipment->created_at->format('d M, Y')}}
                                            </td>
                                            <td>
                                                {!! DNS1D::getBarcodeHTML($shipment->tracking_code, "EAN13",1,23) !!}
                                                <p style="font-size: 15px;color: black;">
                                                    *{{$shipment->tracking_code}}*</p>
                                            </td>
                                            <td>
                                                @if($shipment->shipment == 1)
                                                    International
                                                @else
                                                    Domestic
                                                @endif
                                            </td>
                                            <td>
                                                {{$shipment->shipping_type}}
                                            </td>
                                            <td>
                                                <span class="label label-success">Ready For A Pickup</span>
                                            </td>
                                            <td>
                                                <a href="{{route('AdminShipmentView','data='.base64_encode($shipment->id))}}"
                                                   class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $sortedCollection->render() !!}

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
