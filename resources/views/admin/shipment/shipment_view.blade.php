@extends('admin.layout.app')
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
                                    @if($shipment->status == 5)
                                        <a href="{{route('AdminShipmentBlock','approve='.base64_encode($shipment->id))}}"
                                           class="btn btn-primary pull-right"
                                           data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="You can approve shipment again">Approve</a>
                                    @else
                                        <a href="{{route('AdminShipmentBlock','block='.base64_encode($shipment->id))}}"
                                           class="btn btn-danger pull-right" style="" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="You can block this shipment"><i class="mdi mdi-block-helper"></i> Reject</a>
                                    @endif
                                    <button class="btn btn-warning pull-right send-mail"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="Send mail Shipper"><i class="mdi mdi-email"></i> Send Email
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

    <!-- Modal -->
    <div id="myModal" class="modal fade bs-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Send Mail shipper</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="upload_form" method="post" class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <input type="hidden" value="" name="id" id="country_id">
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="code">Shipper Mail Address:</label>
                                    <input type="email" class="form-control" name="mail" id="mail"
                                           value="{{get_address_by_id($shipment->shipper_address)->email}}" readonly>
                                </div>
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="code">Subject:</label>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Message subject">
                                </div>
                                <div class="col-xs-12">
                                    <label for="language">Message:</label>
                                    <textarea id="editor1" name="message"></textarea>
                                    <script>
                                        CKEDITOR.replace('editor1', {
                                            customConfig: "{{asset('assets/vendors/ckeditor/config.js')}}"
                                        });
                                    </script>
                                </div>
                                <hr>
                                <div class="col-md-12 form-group has-feedback" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-success pull-right send-button"
                                            id="load"
                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i
                                            class="mdi mdi-send m-r-3"></i>Send Mail
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
@endpush

@push('scripts')
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

            $(document).on('click', '.send-mail', function () {
                $('#myModal').modal('show');
                $("#upload_form").trigger("reset");
            });

            $('#upload_form').on('submit', function () {
                event.preventDefault();
                let form = new FormData(this);
                $('.send-button').button('loading');

                $.ajax({
                    url: "{{ route('AdminSandMail') }}",
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
                        if(data == 1){
                            $('.send-button').button('reset');
                            $('#myModal').modal('hide');
                            swal({
                                title: "Congratulation",
                                text: "Your message send to the shipper",
                                type: 'success',
                                html: true,
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                });
            });

        });
    </script>

@endpush
