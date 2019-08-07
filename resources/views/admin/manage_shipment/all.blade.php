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
                                <table class="table table-striped table-bordered projects">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%">#</th>
                                        <th class="text-center">Tracking Code</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">From</th>
                                        <th class="text-center">To</th>
                                        <th class="text-center">Shipping type</th>
                                        <th class="text-center">Shipping content</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1; @endphp
                                    @foreach($shipment as $shipments)
                                        <tr class="text-center">
                                            <td>{{$no}}</td>
                                            @php $no++; @endphp
                                            <td>
                                                {!! DNS1D::getBarcodeHTML($shipments->tracking_code, "EAN13",1,23) !!}
                                                <p style="font-size: 15px;color: black;">
                                                    *{{$shipments->tracking_code}}*</p>
                                            </td>
                                            <td>
                                                {{$shipments->created_at->format('d M, Y')}}
                                            </td>
                                            <td>
                                                <a title="Header" data-toggle="popover" data-trigger="hover"
                                                   data-content="Some content">
                                                        {{get_user_by_id($shipments->user_id)->first_name}}
                                                        {{get_user_by_id($shipments->user_id)->last_name}}
                                                </a>
                                            </td>
                                            <td>{{$shipments->address_one}}</td>
                                            <td>{{$shipments->address_two}}</td>
                                            <td>
                                                @if($shipments->shipment == 1)
                                                    International
                                                @else
                                                    Domestic
                                                @endif
                                            </td>
                                            <td>
                                                {{$shipments->shipping_type}}
                                            </td>
                                            <td>

                                                @if($shipments->block == 1)
                                                    <span class="label label-danger">Reject</span>
                                                    @else
                                                    {!!$shipments->status==1?' <span class="label label-default">Label Create':''!!}
                                                    {!!$shipments->status==2?' <span class="label label-primary">Picked':''!!}
                                                    {!!$shipments->status==3?' <span class="label label-info">Dispatch Center':''!!}
                                                    {!!$shipments->status==4?' <span class="label label-warning">In Transit':''!!}
                                                    {!!$shipments->status==5?' <span class="label label-success">Out for Delivery':''!!}
                                                    {!!$shipments->status==6?' <span class="label label-primary">Delivered':''!!}
                                                    </span><br>
                                                    @if($shipments->status != 1)
                                                        {{get_shipment_status($shipments->tracking_code, $shipments->status)->time}}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('AdminShipmentView','data='.base64_encode($shipments->id))}}"
                                                   class="btn btn-success">View</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $shipment->render() !!}

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
