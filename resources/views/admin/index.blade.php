@extends('admin.layout.app')
@section('pageTitle','Dashboard')
@section('content')

    <div class="right_col" role="main" style="min-height: 1962px;">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa mdi mdi-cube-send"></i></div>
                    <div class="count">{{$shipment_count}}</div>
                    <h3>Shipment</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">{{$user_count}}</div>
                    <h3>User</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa mdi mdi-package-variant"></i></div>
                    <div class="count">{{$delivered_count}}</div>
                    <h3>Delivered</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa mdi mdi-package-variant-closed"></i></div>
                    <div class="count">{{$container_count}}</div>
                    <h3>Container</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph x_panel">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Shiping sales <small>How much shipping has been</small></h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>June 22, 2019 - July 21, 2019</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="demo-container" style="height:250px">
                            <div id="chart_plot_03" class="demo-placeholder" style="padding: 0px; position: relative;"><canvas class="flot-base" width="833" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 833px; height: 280px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 15px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 116px; text-align: center;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 217px; text-align: center;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 318px; text-align: center;">6</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 419px; text-align: center;">8</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 516px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 617px; text-align: center;">12</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 718px; text-align: center;">14</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 92px; top: 264px; left: 819px; text-align: center;">16</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 252px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 220px; left: 7px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 189px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 157px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 126px; left: 1px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 95px; left: 1px; text-align: right;">25</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 63px; left: 1px; text-align: right;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 32px; left: 1px; text-align: right;">35</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">40</div></div></div><canvas class="flot-overlay" width="833" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 833px; height: 280px;"></canvas><div class="legend"><div style="position: absolute; width: 78px; height: 15px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(38,185,154);overflow:hidden"></div></div></td><td class="legendLabel">Registrations</td></tr></tbody></table></div></div>
                        </div>
                    </div>
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
