@extends('dashboard.layout.app')
@section('content')

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Orders</div>
                        <div class="widget-subheading">Last year expenses</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>1896</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Clients</div>
                        <div class="widget-subheading">Total Clients Profit</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>$ 568</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Followers</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>46%</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>$14M</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    Your Shipment
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                        <thead>
                        <tr>
                            <th class="text-center">Status</th>
                            <th>Tracking No.</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Recipient</th>
                            <th class="text-center">Current activity</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shipment as $shipments)
                            <tr>
                                <td class="text-center">
                                    @if($shipments->status == 0)
                                        <div class="badge badge-info text-capitalize">DRAFT</div>
                                    @else
                                        <div class="badge badge-info text-capitalize">Ready for a pickup</div>
                                    @endif
                                </td>
                                <td>{{$shipments->tracking_code}}</td>
                                <td class="text-center">
                                    <p style="color: black;font-size: 19px"
                                       class="mb-0">{{$shipments->updated_at->format('d M')}}</p>
                                    {{$shipments->updated_at->format('Y')}}
                                </td>
                                <td style="font-size: 15px">{{get_address_by_id($shipments->receiver_address)->name}}</td>
                                <td></td>
                                <td>
                                    @if($shipments->status == 0)
                                        <a href="{{route('PrepareShipmentEdit',$shipments->id)}}" class="text-success"><i
                                                    class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a><br>
                                        <a href="{{route('PrepareShipmentDelete','delete='.$shipments->id)}}"
                                           class="delete text-success"><i class="fa fa-trash-o fa-2x"
                                                                          aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{route('PrepareShipmentView','data='.base64_encode($shipments->id))}}" class="w-100 btn btn-sm btn-success">
                                            VIEW
                                        </a><br>
                                        <a href="{{route('ShipmentLabel',base64_encode($shipments->id))}}" class="btn btn-sm btn-success mt-2 w-100">LABEL</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">

                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
@endpush

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>

        $('.delete').click(function (e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
        });

        function warnBeforeRedirect(linkURL) {
            swal({
                title: "Sure want to remove?",
                text: "If you click 'OK' file will be remove",
                type: "warning",
                showCancelButton: true
            }, function () { // Redirect the user | linkURL is href url
                window.location.href = linkURL;
            });
        }
    </script>
@endpush
