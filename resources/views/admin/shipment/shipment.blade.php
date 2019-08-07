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
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <button type="button"
                                            onclick="location.href='{{route('AdminShipment','type='.base64_encode(1))}}';"
                                            id="international" class="btn {{$change==1?'btn-primary':'btn-default'}} ">
                                        International
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button"
                                            onclick="location.href='{{route('AdminShipment','type='.base64_encode(2))}}';"
                                            id="domestic" class="btn {{$change==2?'btn-primary':'btn-default'}}">
                                        Domestic
                                    </button>
                                </div>
                            </div>
                            <p style="margin-top: 10px">Simple table with shipping request any people</p>

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
                                        <th class="text-center">Shipping content</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1; @endphp
                                    @foreach($shipping as $shipment)
                                        <tr class="text-center">
                                            <td>{{$no}}</td>
                                            @php $no++; @endphp
                                            <td class="text-left">
                                                {!! DNS1D::getBarcodeHTML($shipment->tracking_code, "EAN13",1,23) !!}
                                                <p style="font-size: 15px;color: black;">
                                                    *{{$shipment->tracking_code}}*</p>
                                            </td>
                                            <td>
                                                {{$shipment->created_at->format('d M, Y')}}
                                            </td>
                                            <td>
                                                <a title="Header" data-toggle="popover" data-trigger="hover"
                                                   data-content="Some content">
                                                    {{get_user_by_id($shipment->user_id)->first_name}}
                                                    {{get_user_by_id($shipment->user_id)->last_name}}
                                                </a>
                                            </td>
                                            <td>
                                                {{$shipment->address_one}}
                                            </td>
                                            <td>
                                                {{$shipment->address_two}}
                                            </td>
                                            <td>
                                                {{$shipment->shipping_type}}
                                            </td>
                                            <td>

                                                @if($shipment->block == 1)
                                                    <span class="label label-danger">Reject</span>
                                                    @else
                                                    {!!$shipment->status==1?' <span class="label label-default">Label Create':''!!}
                                                    {!!$shipment->status==2?' <span class="label label-primary">Picked':''!!}
                                                    {!!$shipment->status==3?' <span class="label label-info">Dispatch Center':''!!}
                                                    {!!$shipment->status==4?' <span class="label label-warning">In Transit':''!!}
                                                    {!!$shipment->status==5?' <span class="label label-success">Out for Delivery':''!!}
                                                    {!!$shipment->status==6?' <span class="label label-primary">Delivered':''!!}
                                                    </span><br>
                                                    @if($shipment->status != 1)
                                                        {{get_shipment_status($shipment->tracking_code, $shipment->status)->time}}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('AdminShipmentView','data='.base64_encode($shipment->id))}}"
                                                   class="btn btn-success"><i class="mdi mdi-teamviewer"
                                                                              style="margin-right: 4px;"></i>View</a>
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
