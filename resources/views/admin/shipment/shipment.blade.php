@extends('admin.layout.app')
@section('content')

    <style>
        .tr {
            cursor: pointer;
        }
    </style>

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
                            <table class="table table-striped table-hover projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Tracking Code</th>
                                    <th>Shipping type</th>
                                    <th>Shipping content</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shipping as $shipment)
                                    <tr class="tr"
                                        onclick="location.href='{{route('AdminShipmentView','data='.base64_encode($shipment->id))}}';">
                                        <td>#</td>
                                        <td>
                                            <a title="Header" data-toggle="popover" data-trigger="hover"
                                               data-content="Some content">
                                                {{get_user_by_id($shipment->user_id)->first_name}}
                                                {{get_user_by_id($shipment->user_id)->last_name}}
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
    <script>

    </script>
@endpush
