@extends('admin.layout.app')
@section('pageTitle','Dashboard')
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
                    <div class="count">{{$user_count}}</div>
                    <h3>Total Paid</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                    <div class="count">{{$delivered_count}}</div>
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

                                                <span class="label label-success">
                                                    {{$shipments->status==1?'Confirm Shipment':''}}
                                                    {{$shipments->status==2?'Picked':''}}
                                                    {{$shipments->status==3?'Container':''}}
                                                    {{$shipments->status==4?'Shipped':''}}
                                                    {{$shipments->status==5?'Delivered':''}}
                                                    {{$shipments->status==6?'Block':''}}
                                                </span><br>
                                            @if($shipments->status != 1)
                                                {{get_shipment_status($shipments->tracking_code, $shipments->status)->time}}
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

@endsection


@push('style')

@endpush

@push('scripts')
    <!-- jQuery Sparklines -->
    <script src="{{asset('assets/')}}{{asset('assets/')}}vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
