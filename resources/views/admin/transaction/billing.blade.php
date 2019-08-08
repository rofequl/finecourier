@extends('admin.layout.app')
@section('pageTitle','Billing')
@section('content')

    <div class="right_col" role="main" style="min-height: 1962px;">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa mdi mdi-cube-send"></i></div>
                    <div class="count">{{$shipment_count}}</div>
                    <h3>Total Shipment</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">{{$shipment_paid}}</div>
                    <h3>Total Paid</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                    <div class="count">{{$shipment_not_paid}}</div>
                    <h3>Not Paid</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa mdi mdi-currency-usd"></i></div>
                    <div class="count">{{$container_count}}</div>
                    <h3>Amount</h3>
                </div>
            </div>
        </div>

        <div class="row tile_count">

            @foreach($money as $moneys)
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-money"></i> Total {{$moneys->currency}}</span>
                    <div class="count">{{$moneys->sum}}</div>
                </div>
            @endforeach
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Shipping list Earrings</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start project list -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%">#</th>
                                    <th class="text-center">Tracking Code</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Biller Name</th>
                                    <th class="text-center">Biller Address</th>
                                    <th class="text-center">Shipping type</th>
                                    <th class="text-center">Cost</th>
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
                                                {{get_address_by_id(get_shipment_by_tracking_code($shipments->tracking_code)->biller_address)->name}}
                                            </a>
                                        </td>
                                        <td>{{get_address_by_id(get_shipment_by_tracking_code($shipments->tracking_code)->biller_address)->address_one}}</td>

                                        <td>
                                            @if(get_shipment_by_tracking_code($shipments->tracking_code)->shipment == 1)
                                                International
                                            @else
                                                Domestic
                                            @endif
                                        </td>
                                        <td>
                                            {{get_shipment_by_tracking_code($shipments->tracking_code)->price.' '.get_shipment_by_tracking_code($shipments->tracking_code)->currency}}
                                        </td>
                                        <td>
                                            @if(get_shipment_by_tracking_code($shipments->tracking_code)->block == 1)
                                                <span class="label label-danger">Reject</span>
                                                @else
                                                {!!get_shipment_by_tracking_code($shipments->tracking_code)->status==1?' <span class="label label-default">Label Create':''!!}
                                                {!!get_shipment_by_tracking_code($shipments->tracking_code)->status==2?' <span class="label label-primary">Picked':''!!}
                                                {!!get_shipment_by_tracking_code($shipments->tracking_code)->status==3?' <span class="label label-info">Dispatch Center':''!!}
                                                {!!get_shipment_by_tracking_code($shipments->tracking_code)->status==4?' <span class="label label-warning">In Transit':''!!}
                                                {!!get_shipment_by_tracking_code($shipments->tracking_code)->status==5?' <span class="label label-success">Out for Delivery':''!!}
                                                {!!get_shipment_by_tracking_code($shipments->tracking_code)->status==6?' <span class="label label-primary">Delivered':''!!}
                                                </span><br>
                                                @if(get_shipment_by_tracking_code($shipments->tracking_code)->status != 1)
                                                    {{get_shipment_status(get_shipment_by_tracking_code($shipments->tracking_code)->tracking_code, get_shipment_by_tracking_code($shipments->tracking_code)->status)->time}}
                                                @endif
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{route('AdminShipmentView','data='.base64_encode(get_shipment_by_tracking_code($shipments->tracking_code)->id))}}"
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

@endsection


@push('style')

@endpush

@push('scripts')
    <!-- jQuery Sparklines -->
    <script
        src="{{asset('assets/')}}{{asset('assets/')}}vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="{{asset('assets/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/vendors/morris.js/morris.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('assets/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('assets/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('assets/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('assets/vendors/DateJS/build/date.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('assets/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

@endpush
