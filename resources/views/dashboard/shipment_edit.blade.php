@extends('dashboard.layout.app')
@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-pencil text-success" aria-hidden="true"></i>
                </div>
                <div>Not Yet Confirmed
                    <div class="page-title-subheading">Please take one more minute to double check the information
                        provided
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-card mb-3 card">
        <div class="row">
            <div class="col-md-5">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Shipper</div>
                                <div class="widget-subheading">
                                    <p class="text-success mb-0" style="font-size: 30px">
                                        {{get_address_by_id($shipment->shipper_address)->name}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 20px">
                                        {{get_address_by_id($shipment->shipper_address)->company}}
                                    </p>
                                    <p class="" style="font-size: 15px">
                                        {{get_city_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state,get_address_by_id($shipment->shipper_address)->city)->name}},
                                        {{get_state_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state)->name}},
                                        {{get_country_name_by_code(get_address_by_id($shipment->shipper_address)->country)->name}},
                                        {{get_address_by_id($shipment->shipper_address)->post_code}}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <i class="fa fa-arrow-right fa-3x" aria-hidden="true" style="line-height: 160px"></i>
            </div>
            <div class="col-md-5">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Receiver</div>
                                <div class="widget-subheading">
                                    <p class="text-success mb-0" style="font-size: 30px">
                                        {{get_address_by_id($shipment->receiver_address)->name}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 20px">
                                        {{get_address_by_id($shipment->receiver_address)->company}}
                                    </p>
                                    <p class="" style="font-size: 15px">
                                        {{get_city_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state,get_address_by_id($shipment->receiver_address)->city)->name}},
                                        {{get_state_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state)->name}},
                                        {{get_country_name_by_code(get_address_by_id($shipment->receiver_address)->country)->name}},
                                        {{get_address_by_id($shipment->receiver_address)->post_code}}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Peace</th>
                                <th>Origin Country</th>
                                <th>Good value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center text-muted">#345</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">John Doe</div>
                                                <div class="widget-subheading opacity-7">Web Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">Madrid</td>
                                <td class="text-center">
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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