@extends('admin.layout.app')
@section('content')


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Booking request {{$shipping->booking_type==1?'International':'Domestic'}}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <div class="row">
                                <div class="col-md-6">
                                    @if($shipping->booking_type == 2)
                                        <p><i class="fa fa-calendar"></i> {{$shipping->pickup_date}}</p>
                                    @endif
                                    <p><i class="fa fa-user"></i> {{$shipping->shipper_name}}</p>
                                    <p>
                                        <i class="fa fa-map-marker"></i> {{get_country_name_by_code($shipping->from_country)->name}}
                                    </p>
                                    <p><i class="fa fa-phone"></i> {{$shipping->shipper_phone}}</p>
                                    <p><i class="fa fa-mail-reply"></i> {{$shipping->shipper_email}}</p>
                                    <p><i class="fa fa-globe"></i> {{$shipping->shipper_address}}</p>
                                </div>
                                <div class="col-md-6">
                                    @if($shipping->booking_type == 2)
                                        <p><i class="fa fa-calendar"></i> {{$shipping->pickup_delivery}}</p>
                                    @endif
                                    <p><i class="fa fa-user"></i> {{$shipping->receiver_name}}</p>
                                    @if($shipping->booking_type == 1)
                                        <p>
                                            <i class="fa fa-map-marker"></i> {{get_country_name_by_code($shipping->to_country)->name}}
                                        </p>
                                    @endif
                                    <p><i class="fa fa-phone"></i> {{$shipping->receiver_phone}}</p>
                                    <p><i class="fa fa-mail-reply"></i> {{$shipping->receiver_email}}</p>
                                    <p><i class="fa fa-globe"></i> {{$shipping->receiver_address}}</p>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover projects">
                                <thead>
                                <tr>
                                    <th>Shipping Type</th>
                                    <th>Delivery Type</th>
                                    <th>Weight</th>
                                    <th>Dimension</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$shipping->shipping_type}}</td>
                                    <td>{{$shipping->delivery_type}}</td>
                                    <td>{{$shipping->weight.' '.$shipping->weight_type}}</td>
                                    <td>{{$shipping->dimenshion}}</td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <a href="{{route('AdminBookingRequestAction','delete='.base64_encode($shipping->id))}}"
                                   class="btn btn-danger pull-right delete">Delete</a>
                                <a href="{{route('AdminBookingRequestAction','block='.base64_encode($shipping->id))}}"
                                   class="btn btn-warning pull-right">Block</a>
                                <button class="btn btn-success pull-right">Booking Approve</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="{{asset('assets/vendors/sweetalert/sweetalert.css')}}" rel="stylesheet"/>
@endpush

@push('scripts')
    <script src="{{asset('assets/vendors/sweetalert/sweetalert.js')}}"></script>
    <script>

        $('.delete').click(function (e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            swal({
                title: "Sure want to remove?",
                text: "If you click 'OK' file will be remove",
                type: "warning",
                showCancelButton: true
            }, function () { // Redirect the user | linkURL is href url
                window.location.href = linkURL;
            });
        });
    </script>
@endpush
