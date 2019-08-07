@extends('dashboard.layout.app')
@section('pageTitle','Confirm Shipment')
@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-pencil text-success" aria-hidden="true"></i>
                </div>
                <div>
                    {{$shipment->status==0?'Not Yet Confirmed':'Confirmed'}}
                    <div class="page-title-subheading">
                        {{$shipment->status==0?'Please take one more minute to double check the information
                        provided':'Thank You! Your Shipment Details Have Been Submitted'}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-card mb-3 card">
        <form class="submit" method="post" action="">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$shipment->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">
                                        Shipper: {{get_address_by_id($shipment->shipper_address)->name}}</div>
                                    <div class="widget-subheading" style="opacity: .9;">
                                        <div class="position-relative form-group">
                                            <label for="shipper_address" class="shipper_address_info">
                                                {{get_address_by_id($shipment->shipper_address)->name}}
                                                from will be shipping this shipment from
                                                {{get_address_by_id($shipment->shipper_address)->address_one}}
                                            </label>

                                            <select name="shipper_address" id="shipper_address"
                                                    class="form-control w-100" disabled="true">
                                                @foreach($address as $addresses)
                                                    @if($addresses->id == $shipment->shipper_address)
                                                        <option value="{{$addresses->id}}">{{$addresses->name}}
                                                            ({{$addresses->post_code}})
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">
                                        Receiver: {{get_address_by_id($shipment->shipper_address)->name}}</div>
                                    <div class="widget-subheading" style="opacity: .9;">
                                        <div class="position-relative form-group">
                                            <label for="receiver_address" class="receiver_address_info">
                                                {{get_address_by_id($shipment->receiver_address)->name}}
                                                from will be shipping this shipment from
                                                {{get_address_by_id($shipment->receiver_address)->address_one}}
                                            </label>

                                            <select name="receiver_address" id="receiver_address"
                                                    class="form-control" disabled="true">
                                                @foreach($address as $addresses)
                                                    @if($addresses->id == $shipment->receiver_address)
                                                        <option value="{{$addresses->id}}">{{$addresses->name}}
                                                            ({{$addresses->post_code}})
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <h5 class="card-title px-3">Billing Address: <span class="biller_address_name"></span></h5>
            <div class="form-row px-3">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="biller_address" class="biller_address_info"></label>
                        <div class="input-group">
                            <select name="biller_address" id="biller_address" class="form-control shadow-none">
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success AddBillingAddress">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add new billing
                                    address
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row px-3">
                <div class="col-md-6 form-group text-left p-3">
                    <label for="usr3">How do you want to payment?</label>
                    <div class="row justify-content-center">
                        <div class="card card-body col-md-4 m-1 p-3"
                             style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                             id="delivery_type23">
                            <p class="mb-0" style="font-size: 14px;">In cash by the shipper</p>
                        </div>
                        <div class="card card-body col-md-4 m-1 p-3"
                             style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                             id="delivery_type24">
                            <p class="mb-0" style="font-size: 14px;">By credit card by the shipper</p>
                        </div>
                        <input type="hidden"
                               value=""
                               name="payment_type" id="delivery_type22">
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

            <div class="row">
                <div class="col-md-12">
                    <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    # We’ve notified the shipper and receiver.
                                    <br>
                                    @if($shipment->status == 0)
                                        <div class="custom-checkbox custom-control"><input type="checkbox"
                                                                                           id="exampleCustomCheckbox"
                                                                                           class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox">I accept the
                                                Shipping Terms and Conditions</label></div>
                                        <br>
                                        <button class="mb-2 mr-2 px-5 btn btn-success" type="submit">Confirm Shipment
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('assets/vendors/phone/css/intlTelInput.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/scripts/bootstrap4-select2.css')}}">
    <link href="{{asset('assets/vendors/sweetalert/sweetalert.css')}}" rel="stylesheet"/>
@endpush

@push('scripts')
    <script src="{{asset('assets/scripts/bootstrap4.js')}}"></script>
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
                                    <label for="FromState" class="">State*</label>
                                    <select class="form-control select2" id="FromState" name="state">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="FromCity" class="">City*</label>
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
        onload_biller();
        $('.AddBillingAddress').click(function () {
            $("#address_upload").trigger("reset");
            $('#exampleModalLongTitle').html('Add New Billing Address');
            $('#address_type').val(3).prop("disabled", true);
            $('.bd-example-modal-lg').modal('show');
        });

        function onload_biller() {
            $.ajax({
                url: "{{ route('SelectAddressAll') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: 3,user_id: '{{session('user-id')}}'},
                dataType: 'json',
                success: function (data) {
                    $('#biller_address').html('');
                    data.forEach(function (element) {
                        $('#biller_address').append($('<option>', {
                            value: element.id,
                            text: element.name + ' (' + element.post_code + ')'
                        }));
                    });
                    let id = $("#biller_address option:first").val();
                    $.ajax({
                        url: "{{ route('SelectAddress') }}",
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: id},
                        dataType: 'json',
                        success: function (data) {
                            $('.biller_address_name').text(data.name);
                            $('.biller_address_info').text(data.name + ' from will be shipping this shipment from ' + data.address_one);
                        }
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
                        if (data == 3) {
                            $('#address_type').prop("disabled", true);
                            $('.bd-example-modal-lg').modal('hide');
                            onload_biller();
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

        $('#biller_address').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectAddress') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('.biller_address_name').text(data.name);
                    $('.biller_address_info').text(data.name + ' from will be shipping this shipment from ' + data.address_one);
                }
            });
        });

        $('.submit').on('submit', function () {
            $(this).find(':input').prop('disabled', false);
            var form = new FormData(this);
            event.preventDefault();
            if ($('#exampleCustomCheckbox').is(':checked')) {
                $.ajax({
                    url: "{{ route('PrepareShipmentDone') }}",
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
                            var url = '{{ route("PrepareShipmentEdit",$shipment->id) }}';
                            window.location.href = url;
                        }else {
                            swal({
                                title: "Something wrong",
                                text: 'Please try again later',
                                type: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                });
            } else {
                swal({
                    title: '',
                    text: "Click checkbox accept terms & conditions.",
                    type: "warning",
                });
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
    </script>
@endpush
