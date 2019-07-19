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
                <form id="upload_form2" method="post" action="">
                    {{csrf_field()}}
                    <h5 class="card-title">Shipper Details: <span class="shipper_address_name"></span></h5>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="shipper_address" class="shipper_address_info"></label>
                                <select name="shipper_address" id="shipper_address" class="form-control my-select"
                                        data-live-search="true">
                                    <option value="" selected disabled>Select address</option>
                                    @foreach($address as $addresses)
                                        <option value="{{$addresses->id}}">{{$addresses->name}}
                                            ({{$addresses->post_code}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <h5 class="card-title">Receiver Details: <span class="receiver_address_name"></span></h5>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="receiver_address" class="receiver_address_info"></label>
                                <select name="receiver_address" id="receiver_address" class="form-control my-select"
                                        data-live-search="true">
                                    <option value="" selected disabled>Select address</option>
                                    @foreach($address as $addresses)
                                        <option value="{{$addresses->id}}">{{$addresses->name}}
                                            ({{$addresses->post_code}})
                                        </option>
                                    @endforeach
                                </select>
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
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;" id="delivery_type12">
                                    <h4 class="card-title">Regular</h4>
                                    <p class="mb-0" style="font-size: 12px;">I am exporting and I will pay when I
                                        ship</p>
                                </div>
                                <div class="card card-body col-md-4 m-1 p-3"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;" id="delivery_type13">
                                    <h4 class="card-title">Express</h4>
                                    <p class="mb-0" style="font-size: 12px;">I am importing and I will pay when I</p>
                                </div>
                                <input type="hidden"
                                       value=""
                                       name="delivery_type" id="delivery_type11">
                            </div>
                        </div>
                        <div class="col-md-6 form-group text-left">
                            <label for="usr3">How do you want to payment?</label>
                            <div class="row justify-content-center">
                                <div class="card card-body col-md-4 m-1 p-3"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;" id="delivery_type23">
                                    <p class="mb-0" style="font-size: 14px;">In cash by the shipper</p>
                                </div>
                                <div class="card card-body col-md-4 m-1 p-3"
                                     style="border: 1px solid #ddd;font-size:15px;cursor: pointer;" id="delivery_type24">
                                    <p class="mb-0" style="font-size: 14px;">By credit card by the shipper</p>
                                </div>
                                <input type="hidden"
                                       value=""
                                       name="delivery_type" id="delivery_type22">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary float-right">Save</button>
                </form>
            </div>


        </div>
    </div>

@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
    rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

@endpush

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
        $(document).ready(function() {
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
            if ($('#delivery_type22').val() === 'Express' || $('#delivery_type22').val() === '') {
                $("#delivery_type22").val('Regular');
                $('#delivery_type23').css({'border': '1px solid red'});
                $('#delivery_type24').css({'border': '1px solid #ddd'});
            }
        });

        $('#delivery_type24').click(function () {
            if ($('#delivery_type22').val() === 'Regular' || $('#delivery_type22').val() === '') {
                $("#delivery_type22").val('Express');
                $('#delivery_type24').css({'border': '1px solid red'});
                $('#delivery_type23').css({'border': '1px solid #ddd'});
            }
        });

        $(document).ready(function () {
            $('#upload_form2').on('submit', function () {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('PrepareShipmentAdd') }}",
                    method: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    dataType: 'json',
                    error: function (data) {
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            let allData='',mainData='';
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        allData += value + "<br/>";
                                    });
                                } else {
                                    mainData += value + "<br/>";
                                }
                            });
                            Swal.fire({
                                title: mainData,
                                html: allData,
                                type: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                    success: function (data) {
                        alert(data);
                    }
                })
            });
        });
    </script>

@endpush