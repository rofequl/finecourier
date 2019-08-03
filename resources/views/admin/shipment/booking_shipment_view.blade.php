@extends('admin.layout.app')
@section('pageTitle','Booking History')
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
                                <div class="col-12">
                                    <a href="{{route('AdminBookingRequestAction','delete='.base64_encode($shipping->id))}}"
                                       class="btn btn-danger pull-right delete"><i class="mdi mdi-delete"></i> Delete</a>
                                    @if($shipping->status == 0)
                                        <button class="btn btn-success pull-right approve">Booking Approve</button>
                                    @else
                                        @if($shipping->status == 5)
                                            <a href="{{route('AdminBookingRequestAction','unblock='.base64_encode($shipping->id))}}"
                                               class="btn btn-primary pull-right"
                                               data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="You can approve shipment again"><i class="mdi mdi-approval"></i> Approve</a>
                                        @else
                                            <a href="{{route('AdminBookingRequestAction','block='.base64_encode($shipping->id))}}"
                                               class="btn btn-warning pull-right" style="" data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="You can block this shipment"><i class="mdi mdi-block-helper"></i> Block</a>
                                        @endif
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
                                    {!! DNS1D::getBarcodeHTML($shipping->tracking_code, "EAN13") !!}
                                    <p class="text-dark" style="font-size: 15px">Tracking Code:
                                        {{$shipping->tracking_code}}</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    Date: {{$shipping->created_at->format('d M, Y')}}
                                </div>
                            </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4>Approve booking request</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form method="post" action="{{route('AdminBookingRequestApprove')}}"
                                  class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$shipping->id}}" name="id">
                                <div class="col-md-12 form-group text-left" style="padding-left: 0;">
                                    <label for="usr3">Booking Shipment Cost:</label>
                                    <div class="input-group" style="width: 100%">
                                        <input type="text" name="price"
                                               class="form-control" placeholder="Enter Price....">
                                        <span class="input-group-addon"
                                              style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                        <select id="searchbygenerals_currency" name="currency"
                                                class="form-control">
                                            @foreach($country as $countries)
                                                @if($shipping->from_country == $countries->code)
                                                    <option
                                                        value="{{$countries->currency}}"
                                                        selected>{{$countries->currency}}</option>
                                                @else
                                                    <option
                                                        value="{{$countries->currency}}">{{$countries->currency}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group has-feedback" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-success pull-right send-button"
                                            id="load"
                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i
                                            class="mdi mdi-approval m-r-3"></i>Approve
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

    <!-- Modal -->
    <div id="myModal2" class="modal fade bs-example-modal-lg" role="dialog">
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
                                           value="{{$shipping->shipper_email}}" readonly>
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
        @if(session()->has('message'))
        swal({
            title: 'Message',
            text: "{{ session()->get('message') }}",
            type: 'info',
            confirmButtonText: 'Ok'
        });
        @endif

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

        $(document).on('click', '.approve', function () {
            $('#myModal').modal('show');
            $("#upload_form").trigger("reset");
        });

        $(document).on('click', '.send-mail', function () {
            $('#myModal2').modal('show');
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
                        $('#myModal2').modal('hide');
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

    </script>
@endpush
