@extends('dashboard.layout.app')
@section('content')

    <style>
        .phonediv > div {
            display: block;
        }
    </style>

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-location-arrow text-success" aria-hidden="true"></i>
                </div>
                <div>Prepare Shipment
                    <div class="page-title-subheading">Fill in your details to prepare the shipment label
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{$error}}
                </div>
            @endforeach
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card card-body">
                <form id="upload_form" method="post" action="">
                    {{csrf_field()}}
                    <h5 class="card-title">Shipper Details:<span class="shipper_address_name"></span></h5>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="shipper_address" class="shipper_address_info"></label>
                                <div class="input-group">
                                    <select name="shipper_address" id="shipper_address" class="form-control my-select"
                                            data-live-search="true">
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success AddShipperAddress">
                                            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add new shipper
                                            address
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h5 class="card-title">Receiver Details: <span class="receiver_address_name"></span></h5>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="receiver_address" class="receiver_address_info"></label>
                                <div class="input-group">
                                    <select name="receiver_address" id="receiver_address" class="form-control my-select"
                                            data-live-search="true">
                                        <option value="" selected disabled>Select address</option>
                                        @foreach($address as $addresses)
                                            @if($addresses->address_type==2)
                                                <option value="{{$addresses->id}}">{{$addresses->name}}
                                                    ({{$addresses->post_code}})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success AddReceiverAddress">
                                            <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add new receiver address
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mt-4">Shipment Details:</h5>
                    <div class="form-row">
                        <div class="col-md-6 form-group text-left">
                            <label for="usr3">What are you planning to ship?</label>
                            <div class="row justify-content-center">
                                <div class="card card-body col-md-4 m-1 d-inline p-2"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                     id="shipping_type1">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    Document
                                </div>
                                <div class="card card-body col-md-4 m-1 d-inline p-2"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                     id="shipping_type2">
                                    <i class="fa fa-cube" aria-hidden="true"></i>
                                    Parcel
                                </div>
                                <input type="hidden" value=""
                                       name="shipping_type" id="shipping_type">
                            </div>
                        </div>
                        <div class="col-md-6 form-group text-left">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="usr3">Number of peace:</label>
                                    <input type="text" name="peace" class="form-control" value="1">
                                </div>
                                <div class="col-md-7">
                                    <label for="weight">Weight:</label>
                                    <div class="input-group">
                                        <input type="text" name="weight" id="weight"
                                               class="form-control"
                                               value="0.5" required>
                                        <span class="input-group-addon"
                                              style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                        <select id="weight_type" name="weight_type"
                                                class="form-control">
                                            <option value="KG">KG</option>
                                            <option value="LB">LB</option>
                                        </select>
                                        <div class="w-100">
                                            <small>My total chargeable weight is <span
                                                        class="weight_info">0.50 kg</span></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col text-left" id="parcel_content" style="display: none">
                            <label class="">Content of parcel*</label>
                            <input type="text" class="form-control" name="parcel_content">
                        </div>
                        <div class="col text-left">
                            <label class="">Goods origin*</label>
                            <select class="form-control select2" name="origin_country" id="origin_country">
                                <option value="" selected disabled>Select country</option>
                                @foreach($earth as $earths)
                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col text-left">
                            <label for="usr3">Declared Value*</label>
                            <div class="input-group">
                                <input type="text" name="good_value"
                                       class="form-control"
                                       placeholder="0">
                                <span class="input-group-addon"
                                      style="width:0; padding-left:0; padding-right:0; border:none;"></span>
                                <select class="form-control" name="origin_currency" id="origin_currency"
                                        data-live-search="true">
                                    <option value="" selected disabled>Select currency</option>
                                    @foreach($earth as $earths)
                                        <option value="{{$earths['currency']}}">{{$earths['currency']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col text-left">
                            <label class="">Shipment Reference</label>
                            <input type="text" class="form-control" name="shipment_reference">
                        </div>
                        <div class="col text-left">
                            <label class="">Remarks</label>
                            <textarea class="form-control" rows="3" name="remarks"></textarea>
                        </div>
                    </div>

                    <h5 class="card-title mt-5">Payment method:</h5>
                    <div class="form-row">
                        <div class="col-md-6 form-group text-left">
                            <label for="usr3">How do you want to arrange for payment?</label>
                            <div class="row justify-content-center">
                                <div class="card card-body col-md-4 m-1 p-3"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                     id="delivery_type12">
                                    <h4 class="card-title">Regular</h4>
                                    <p class="mb-0" style="font-size: 12px;">I am exporting and I will pay when I
                                        ship</p>
                                </div>
                                <div class="card card-body col-md-4 m-1 p-3"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                     id="delivery_type13">
                                    <h4 class="card-title">Express</h4>
                                    <p class="mb-0" style="font-size: 12px;">I am importing and I will pay when I</p>
                                </div>
                                <input type="hidden"
                                       value=""
                                       name="delivery_type" id="delivery_type11">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-7">

                            <div class="card card-body d-none" id="FoundPrice"
                                 style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                <div style="font-size: 20px;height: 100px;width: 107px;margin: 20px 0;border: 1px dotted blueviolet;border-radius: 50%;padding-top: 35px;display: inline-block;margin-left: auto;
                            margin-right: auto;" id="PriceShowing">
                                </div>
                                <h4>
                                    <span id="NotFoundState1"></span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <span id="NotFoundState21"></span>
                                </h4>
                                <button type="button" id="submit_button" class="btn btn-success rounded my-4">
                                    Shipping Submit
                                </button>
                            </div>
                            <div class="card card-body d-none" id="NotFound"
                                 style="text-align:center;margin-top:80px;border: 1px solid #ddd;font-size:18px;cursor: pointer;">
                                <p>Cash Rates Are Not Yet Available</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 px-4 btn btn-success float-left">Shipping Rate</button>

                </form>
            </div>


        </div>
    </div>

@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('assets/vendors/phone/css/intlTelInput.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/scripts/bootstrap4-select2.css')}}">
    <link href="{{asset('assets/vendors/sweetalert/sweetalert.css')}}" rel="stylesheet"/>
@endpush

@push('scripts')

    <!-- Large modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="address_upload" action="">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Name*</label>
                                    <input name="name" id="name"
                                           type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="company" class="">Company
                                    </label><input name="company" id="company"
                                                   type="text" class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="email" class="">
                                        Email*</label><input name="email" id="email"
                                                             type="email" class="form-control"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="email" class="">
                                        Address type*</label>
                                    <select class="form-control" id="address_type" name="address_type">
                                        <option value="">Select Type</option>
                                        <option value="1">Shipping Address</option>
                                        <option value="2">Receiver Address</option>
                                        <option value="3">Billing Address</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="CountryId" class="">Country*</label>
                                    <select class="form-control select2" id="CountryId" name="country">
                                        <option value="">Select Country</option>
                                        @foreach($earth as $earths)
                                            @if(check_active_country($earths['code']))
                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="post_code"
                                                                                 class="">Post code*</label><input
                                            name="post_code" id="post_code" type="text"
                                            class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="FromState" class="">City*</label>
                                    <select class="form-control select2" id="FromState" name="state">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="FromCity" class="">State*</label>
                                    <select class="form-control select2" id="FromCity" name="city">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group phonediv"><label for="phone"
                                                                                          class="">
                                        Phone*</label><input name="phone_one"
                                                             type="tel" class="form-control phone"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group phonediv"><label for="phone2"
                                                                                          class="">
                                        Phone
                                    </label><input name="phone_two"
                                                   type="tel" class="form-control phone"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="address_one" class="">
                                        Address line 1*</label><input name="address_one" id="address_one"
                                                                      type="text" class="form-control"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="address_two" class="">
                                        Address line 2
                                    </label><input name="address_two" id="address_two"
                                                   type="text" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/vendors/phone/js/prism.js')}}"></script>
    <script src="{{asset('assets/vendors/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/phone/js/intlTelInput-jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendors/sweetalert/sweetalert.js')}}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        onload_shipper();
        onload_receiver();

        $('.AddShipperAddress').click(function () {
            $('#exampleModalLongTitle').html('Add New Shipper Address');
            $('#address_type').val(1).prop("disabled", true);
            $('.bd-example-modal-lg').modal('show');
        });

        $('.AddReceiverAddress').click(function () {
            $('#exampleModalLongTitle').html('Add New Receiver Address');
            $('#address_type').val(2).prop("disabled", true);
            $('.bd-example-modal-lg').modal('show');
        });

        function onload_shipper() {
            $.ajax({
                url: "{{ route('SelectAddressAll') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: 1},
                dataType: 'json',
                success: function (data) {
                    $('#shipper_address').html('');
                    $('#shipper_address').append($('<option>', {value: '', text: 'Select Shipper Address'}));
                    data.forEach(function (element) {
                        $('#shipper_address').append($('<option>', {
                            value: element.id,
                            text: element.name + ' (' + element.post_code + ')'
                        }));
                    });
                }
            });
        }

        function onload_receiver() {
            $.ajax({
                url: "{{ route('SelectAddressAll') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: 2},
                dataType: 'json',
                success: function (data) {
                    $('#receiver_address').html('');
                    $('#receiver_address').append($('<option>', {value: '', text: 'Select Receiver Address'}));
                    data.forEach(function (element) {
                        $('#receiver_address').append($('<option>', {
                            value: element.id,
                            text: element.name + ' (' + element.post_code + ')'
                        }));
                    });
                }
            });
        }

        $(document).ready(function () {
            $('#address_upload').on('submit', function () {
                $(this).find(':input').prop('disabled', false);
                var form = new FormData(this);
                event.preventDefault();
                $.ajax({
                    url: "{{ route('AddressAdd') }}",
                    type: 'post',
                    processData: false,
                    contentType: false,
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
                            $('#address_type').prop("disabled", true);
                            $('.bd-example-modal-lg').modal('hide');
                            onload_shipper();
                        } else if (data == 2) {
                            $('#address_type').prop("disabled", true);
                            $('.bd-example-modal-lg').modal('hide');
                            onload_receiver();
                        } else {
                            swal({
                                title: "Something wrong",
                                text: 'Please try again later',
                                type: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                });
            });
        });

        $('#CountryId').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectState') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('#FromState').html('');
                    data.forEach(function (element) {
                        $('#FromState').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

        $('#FromState').change(function () {
            let country = $('#CountryId').val();
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectCity') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id, country: country},
                dataType: 'json',
                success: function (data) {
                    $('#FromCity').html('');
                    data.forEach(function (element) {
                        $('#FromCity').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

        $('#shipper_address').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectAddress') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('.shipper_address_name').text(data.name);
                    $('.shipper_address_info').text(data.name + ' from will be shipping this shipment from ' + data.address_one);
                }
            });
        });
        $('#receiver_address').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectAddress') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('.receiver_address_name').text(data.name);
                    $('.receiver_address_info').text(data.name + ' from will be receving this shipment from ' + data.address_one);
                }
            });
        });
        $('#shipping_type1').click(function () {
            if ($('#shipping_type').val() === 'Parcel' || $('#shipping_type').val() === '') {
                $("#shipping_type").val('Document');
                $('#shipping_type1').css({'border': '1px solid red'});
                $('#shipping_type2').css({'border': '1px solid #ddd'});
                $('#parcel_content').hide('1000');
            }
        });
        $('#shipping_type2').click(function () {
            if ($('#shipping_type').val() === 'Document' || $('#shipping_type').val() === '') {
                $("#shipping_type").val('Parcel');
                $('#shipping_type2').css({'border': '1px solid red'});
                $('#shipping_type1').css({'border': '1px solid #ddd'});
                $('#parcel_content').show('1000');
            }
        });
        $('#weight').keyup(function () {
            let id = parseFloat($(this).val());
            $('.weight_info').text(id.toFixed(2) + ' ' + $('#weight_type').val());
        });
        $(document).ready(function () {
            $('.select2').select2({
                theme: "bootstrap",
                width: '100%'
            });
        });
        $('#origin_country').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectCountryCode') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('#origin_currency').val(data.currency);
                }
            });
        });
        $('#delivery_type12').click(function () {
            if ($('#delivery_type11').val() === 'Express' || $('#delivery_type11').val() === '') {
                $("#delivery_type11").val('Regular');
                $('#delivery_type12').css({'border': '1px solid red'});
                $('#delivery_type13').css({'border': '1px solid #ddd'});
            }
        });
        $('#delivery_type13').click(function () {
            if ($('#delivery_type11').val() === 'Regular' || $('#delivery_type11').val() === '') {
                $("#delivery_type11").val('Express');
                $('#delivery_type13').css({'border': '1px solid red'});
                $('#delivery_type12').css({'border': '1px solid #ddd'});
            }
        });
        $('#delivery_type23').click(function () {
            if ($('#delivery_type22').val() == 1 || $('#delivery_type22').val() === '') {
                $("#delivery_type22").val(0);
                $('#delivery_type23').css({'border': '1px solid red'});
                $('#delivery_type24').css({'border': '1px solid #ddd'});
            }
        });
        $('#delivery_type24').click(function () {
            if ($('#delivery_type22').val() == 0 || $('#delivery_type22').val() === '') {
                $("#delivery_type22").val(1);
                $('#delivery_type24').css({'border': '1px solid red'});
                $('#delivery_type23').css({'border': '1px solid #ddd'});
            }
        });
        $(document).ready(function () {
            $('#upload_form').on('submit', function () {
                var form = new FormData(this);
                event.preventDefault();
                $.ajax({
                    url: "{{ route('PrepareShipmentAdd') }}",
                    type: 'post',
                    processData: false,
                    contentType: false,
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
                        if (data.error == 'error') {
                            if (!$('#FoundPrice').hasClass('d-none')) {
                                $('#FoundPrice').addClass('d-none');
                            }
                            $('#NotFound').removeClass('d-none');
                            $('html, body').animate({
                                scrollTop: $("#NotFound").offset().top - 350
                            }, 2000);
                        } else {
                            if (!$('#NotFound').hasClass('d-none')) {
                                $('#NotFound').addClass('d-none');
                            }
                            $('#FoundPrice').removeClass('d-none');
                            $('#NotFoundState1').html(data.shipper_address);
                            $('#NotFoundState21').html(data.receiver_address);
                            $('#PriceShowing').html(data.price + ' ' + data.currency);
                            $('html, body').animate({
                                scrollTop: $("#FoundPrice").offset().top - 350
                            }, 2000);
                        }
                    }
                });
            });
            $('#submit_button').click(function () {
                var form = new FormData($('#upload_form')[0]);
                warnBeforeRedirect(form);
            });

            function warnBeforeRedirect(form) {
                swal({
                        title: "Sure want to save?",
                        text: "If you click 'OK' you cant edit data.",
                        type: "warning",
                        showCancelButton: true
                    }, function () {
                        $.ajax({
                            url: "{{ route('PrepareShipmentSubmit') }}",
                            type: 'post',
                            processData: false,
                            contentType: false,
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
                                if (data.error == 'error') {
                                    swal({
                                        title: "Something wrong",
                                        text: 'Please check the shipping rate again.',
                                        type: 'error',
                                        confirmButtonText: 'Ok'
                                    })
                                } else {
                                    var url = '{{ route("PrepareShipmentEdit", ":slug") }}';
                                    url = url.replace(':slug', data.id);
                                    window.location.href = url;
                                }
                            }
                        });
                    }
                );
            }
        });
    </script>

@endpush