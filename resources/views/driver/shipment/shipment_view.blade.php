@extends('driver.layout.app')
@section('pageTitle','Shipping History')
@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Shipment Information {{$shipment->shipment==1?'International':'Domestic'}}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-12">
                                    @if($shipment->block == 1)
                                        <a href="{{route('AdminShipmentBlock','unblock='.base64_encode($shipment->id))}}"
                                           class="btn btn-success pull-right"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="Shipment Approve"><i
                                                class="mdi mdi-block-helper"></i> Approve
                                        </a>
                                    @else
                                        <a href="{{route('AdminShipmentBlock','block='.base64_encode($shipment->id))}}"
                                           class="btn btn-danger pull-right"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="Shipment rejected"><i
                                                class="mdi mdi-block-helper"></i> Reject
                                        </a>
                                    @endif
                                    <button class="btn btn-warning pull-right status"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="Shipment Status update"><i class="mdi mdi-comment-question-outline"></i> Status
                                    </button>
                                </div>
                                <div class="col-12">
                                    <img
                                        src="{{asset('storage/logo/'.basic_information()->company_logo)}}"
                                        width="200px">
                                </div>
                                <div class="col-sm-6">
                                    {!! DNS1D::getBarcodeHTML($shipment->tracking_code, "EAN13") !!}
                                    <p class="text-dark" style="font-size: 15px">Tracking Code:
                                        {{$shipment->tracking_code}}</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    Date: {{$shipment->created_at->format('d M, Y')}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="font-weight: 700;font-size: 20px;color: #6f5858;">Shipper</h4>
                                    <p class="text-success mb-0" style="font-size: 20px">
                                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->name}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-phone-square mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->phone_one}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->email}}
                                    </p>
                                    <p class="text-black" style="font-size: 15px">
                                        <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                        {{get_city_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state,get_address_by_id($shipment->shipper_address)->city)->name}}
                                        ,
                                        {{get_state_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state)->name}}
                                        ,
                                        {{get_country_name_by_code(get_address_by_id($shipment->shipper_address)->country)->name}}
                                        ,
                                        {{get_address_by_id($shipment->shipper_address)->post_code}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="font-weight: 700;font-size: 20px;color: #6f5858;">Receiver</h4>
                                    <p class="text-success mb-0" style="font-size: 20px">
                                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->receiver_address)->name}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-phone-square mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->phone_one}}
                                    </p>
                                    <p class="text-black mb-0" style="font-size: 15px">
                                        <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->shipper_address)->email}}
                                    </p>
                                    <p class="text-black" style="font-size: 15px">
                                        <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                        {{get_city_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state,get_address_by_id($shipment->receiver_address)->city)->name}}
                                        ,
                                        {{get_state_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state)->name}}
                                        ,
                                        {{get_country_name_by_code(get_address_by_id($shipment->receiver_address)->country)->name}}
                                        ,
                                        {{get_address_by_id($shipment->receiver_address)->post_code}}
                                    </p>
                                </div>
                                <div class="col-12" style="padding: 10px;">
                                    <h4 style="font-weight: 700;font-size: 20px;color: #6f5858;">Biller address</h4>
                                    <p class="text-success mb-0" style="font-size: 20px">
                                        <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                        {{get_address_by_id($shipment->biller_address)->name}}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-black mb-0" style="font-size: 15px">
                                                <i class="fa fa-phone-square mr-2" aria-hidden="true"></i>
                                                {{get_address_by_id($shipment->biller_address)->phone_one}}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-black mb-0" style="font-size: 15px">
                                                <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                                                {{get_address_by_id($shipment->biller_address)->email}}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-black mt-2" style="font-size: 15px">
                                                <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                                {{get_city_name_by_code(get_address_by_id($shipment->biller_address)->country,get_address_by_id($shipment->biller_address)->state,get_address_by_id($shipment->biller_address)->city)->name}}
                                                ,
                                                {{get_state_name_by_code(get_address_by_id($shipment->biller_address)->country,get_address_by_id($shipment->biller_address)->state)->name}}
                                                ,
                                                {{get_country_name_by_code(get_address_by_id($shipment->biller_address)->country)->name}}
                                                ,
                                                {{get_address_by_id($shipment->biller_address)->post_code}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>No. of Peace</th>
                                                <th>Shipping Type</th>
                                                <th>Origin Country</th>
                                                <th>Weight</th>
                                                <th>Good Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$shipment->peace}}</td>
                                                <td>{{$shipment->shipping_type}}</td>
                                                <td>{{get_country_name_by_code($shipment->origin_country)->name}}</td>
                                                <td>{{$shipment->weight}} {{$shipment->weight_type}}</td>
                                                <td>{{$shipment->good_value}} {{$shipment->origin_currency}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Service type:
                                                        <small>
                                                            @if($shipment->delivery_type == 'Regular')
                                                                REGULAR
                                                                (I am importing and I will pay when)
                                                            @else
                                                                EXPRESS
                                                                (I am exporting and I will pay when I ship)
                                                            @endif
                                                        </small>
                                                    </div>
                                                    <br>
                                                    <div class="widget-heading">Payment:
                                                        <small>
                                                            @if($shipment->payment_type == 1)
                                                                In cash by the shipper
                                                            @else
                                                                By credit card by the shipper
                                                            @endif
                                                        </small>
                                                    </div>
                                                    <br>
                                                    # We’ve notified the shipper and receiver.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left w-100">
                                                    <div class="card card-body shadow-none p-1" id="FoundPrice"
                                                         style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                                        <div style="font-size: 20px;height: 100px;width: 107px;margin: 20px 0;border: 1px dotted blueviolet;border-radius: 50%;padding-top: 35px;display: inline-block;margin-left: auto;
                            margin-right: auto;" id="PriceShowing">
                                                            {{$shipment->price}}
                                                            {{$shipment->currency}}
                                                        </div>
                                                        <h4>
                                                            <span id="NotFoundState1">{{$shipment->address_one}}</span>
                                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                            <span id="NotFoundState21">{{$shipment->address_two}}</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Status Modal -->
    <div id="myModal3" class="modal fade bs-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Shipment Status Update</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="upload_form3" method="post">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$shipment->tracking_code}}" name="tracking_code">
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="code">Shipment Status:</label>
                                    <select class="select2_single" name="status"
                                            id="driver_id">
                                        <option></option>
                                        <option value="1" {{$shipment->status==1?'selected':''}}>Label Create
                                            ({{$shipment->created_at->format('d M, Y')}})
                                        </option>
                                        <option value="2" {{$shipment->status==2?'selected':''}}>
                                            Picked {{get_shipment_status($shipment->tracking_code, 2)? '('.get_shipment_status($shipment->tracking_code, 2)->time.')':''}}</option>
                                        <option value="3" {{$shipment->status==3?'selected':''}}>
                                            Dispatch Center {{get_shipment_status($shipment->tracking_code, 3)? '('.get_shipment_status($shipment->tracking_code, 3)->time.')':''}}</option>
                                        <option value="4" {{$shipment->status==4?'selected':''}}>
                                            In Transit {{get_shipment_status($shipment->tracking_code, 4)? '('.get_shipment_status($shipment->tracking_code, 4)->time.')':''}}</option>
                                        <option value="5" {{$shipment->status==5?'selected':''}}>
                                            Out for Delivery {{get_shipment_status($shipment->tracking_code, 5)? '('.get_shipment_status($shipment->tracking_code, 5)->time.')':''}}</option>
                                        <option value="6" {{$shipment->status==6?'selected':''}}>
                                            Delivered {{get_shipment_status($shipment->tracking_code, 6)? '('.get_shipment_status($shipment->tracking_code, 6)->time.')':''}}</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 form-group">
                                    <label for="code">Date:</label>
                                    <div class='input-group date' id='myDatepicker4'>
                                        <input type='text' name="time" class="form-control" readonly="readonly"/>
                                        <span class="input-group-addon">
                                           <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="code">Location:</label>
                                    <input type="text" placeholder="Enter the location" class="form-control" name="location">
                                </div>
                                <hr>
                                <div class="col-md-12 form-group has-feedback" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-success pull-right send-button"
                                            id="load"
                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i
                                            class="mdi mdi-truck-fast m-r-3"></i>Driver Assign
                                    </button>
                                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">
                                        <i class="mdi mdi-cancel m-r-3"></i>Cancel
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>

@endsection

@push('style')
    <link href="{{asset('assets/vendors/sweetalert/sweetalert.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/vendors/ckeditor/ckeditor.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <link href="{{asset('assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
          rel="stylesheet">
@endpush

@push('scripts')
    <!-- bootstrap-datetimepicker -->
    <script src="{{asset('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/sweetalert/sweetalert.js')}}"></script>
    <script>
        $(document).ready(function () {

            @if(session()->has('message'))
            swal({
                title: 'Message',
                text: "{{ session()->get('message') }}",
                type: 'info',
                confirmButtonText: 'Ok'
            });
            @endif


            $(document).on('click', '.status', function () {
                $('#myModal3').modal('show');
            });

            $('#upload_form3').on('submit', function () {
                event.preventDefault();
                let form = new FormData(this);
                $('.send-button').button('loading');
                $.ajax({
                    url: "{{ route('DriverShipmentStatus') }}",
                    method: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form,
                    dataType: 'json',
                    error: function (data) {
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            let allData = '', mainData = '';
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        allData += value + "<br/>";
                                    });
                                } else {
                                    mainData += value + "<br/>";
                                }
                            });
                            $('.send-button').button('reset');
                            swal({
                                title: mainData,
                                text: allData,
                                type: 'error',
                                html: true,
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                    success: function (data) {
                        if (data == 1) {
                            $('.send-button').button('reset');
                            $('#myModal2').modal('hide');
                            swal({
                                title: "Congratulation",
                                text: "Shipment status update",
                                type: 'success',
                                html: true,
                                confirmButtonText: 'Ok'
                            })
                        }else if(data.error){
                            $('.send-button').button('reset');
                            swal({
                                title: "Error",
                                text: data.error,
                                type: 'warning',
                                html: true,
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                });
            });

        });

        $('#myDatepicker4').datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true,
            defaultDate: new Date()
        });
    </script>

@endpush
