@extends('admin.layout.app')
@section('pageTitle','Parcel Pickup')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Parcel Pickup</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
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
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-row" id="upload_form" method="post">
                                @csrf
                                <div class="input-group col-md-6">
                                    <input type="text" name="track" class="form-control"
                                           placeholder="Enter Tracking Code">
                                    <span class="input-group-btn">
                                              <button type="submit" class="btn btn-primary">
                                                  <i class="mdi mdi-account-search"></i>Search</button>
                                          </span>
                                </div>
                            </form>
                        </div>

                        <div class="x_content hidden product-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Shipper</h4>
                                    <p>Name: <span class="shipper-name"></span></p>
                                    <p>phone: <span class="shipper-phone"></span></p>
                                    <p>Email: <span class="shipper-email"></span></p>
                                </div>
                                <div class="col-md-4">
                                    <h4>Receiver</h4>
                                    <p>Name: <span class="receiver-name"></span></p>
                                    <p>phone: <span class="receiver-phone"></span></p>
                                    <p>Email: <span class="receiver-email"></span></p>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left w-100">
                                                    <div class="card card-body shadow-none p-1" id="FoundPrice"
                                                         style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                                        <div style="font-size: 20px;height: 79px;width: 83px;margin: 11px 0;border: 1px dotted blueviolet;border-radius: 50%;padding-top: 29px;display: inline-block;margin-left: auto;
                            margin-right: auto;" id="PriceShowing">

                                                        </div>
                                                        <h4>
                                                            <span id="NotFoundState1"></span>
                                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                            <span id="NotFoundState21"></span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Shipping content: <span class="shipping-type"></span></p>
                                    <p>Weight: <span class="weight"></span></p>
                                    <div class="checkbox pickup hidden" style="margin-left: 20px">
                                        <input type="checkbox" id="1" class="payment-input" value=""> Payment<br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Shipping type: <span class="shipment"></span></p>
                                    <p>Status: <span class="status"></span></p>
                                    <div class="checkbox pickup hidden" style="margin-left: 20px">
                                        <input type="checkbox" id="2" class="picked-input"  value=""> Picked?<br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Date: <span class="date"></span></p>
                                </div>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function () {

            $('#upload_form').on('submit', function () {
                event.preventDefault();
                let form = new FormData(this);
                $.ajax({
                    url: "{{ route('AdminPickupGet') }}",
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
                        if (data.done === 'shipment') {
                            $('.pickup').addClass('hidden');
                            $.ajax({
                                url: "{{ route('SelectAddress') }}",
                                type: 'post',
                                data: {_token: CSRF_TOKEN, id: data.data.shipper_address},
                                dataType: 'json',
                                success: function (datas) {
                                    $('.shipper-name').html(datas.name);
                                    $('.shipper-phone').html(datas.phone_one);
                                    $('.shipper-email').html(datas.email);
                                }
                            });
                            $.ajax({
                                url: "{{ route('SelectAddress') }}",
                                type: 'post',
                                data: {_token: CSRF_TOKEN, id: data.data.receiver_address},
                                dataType: 'json',
                                success: function (datas) {
                                    $('.receiver-name').html(datas.name);
                                    $('.receiver-phone').html(datas.phone_one);
                                    $('.receiver-email').html(datas.email);
                                }
                            });
                            $('.picked-input').val(data.data.id).attr('id',1);
                            $('.payment-input').val(data.data.id).attr('id',1);
                            $('.shipping-type').html(data.data.shipping_type);
                            $('.weight').html(data.data.weight + data.data.weight_type);
                            if (data.data.payment_status == 1){
                                $('.payment-input').prop('checked',true);
                            }else {
                                $('.payment-input').prop('checked',false);
                            }
                            if (data.data.shipment == 1){
                                $('.shipment').html('International');
                            }else {
                                $('.shipment').html('Domestic');
                            }
                            if (data.data.status == 1){
                                $('.status').html('Ready for pickup');
                                $('.pickup').removeClass('hidden');
                            }else if(data.data.status == 2){
                                $('.status').html('picked');
                                $('.pickup').removeClass('hidden');
                                $('.picked-input').prop('checked',true);
                            }else if(data.data.status == 3){
                                $('.status').html('Container');
                            }else if(data.data.status == 4){
                                $('.status').html('Shipped');
                            }else if(data.data.status == 5){
                                $('.status').html('Block');
                            }else if(data.data.status == 6){
                                $('.status').html('Cancel');
                            }else if(data.data.status == 7){
                                $('.status').html('Delivered');
                            }
                            $('.date').html(data.data.created_at);
                            $('#PriceShowing').html(data.data.price +' '+ data.data.currency);
                            $('#NotFoundState1').html(data.data.address_one);
                            $('#NotFoundState21').html(data.data.address_two);
                            $('.product-info').removeClass('hidden');


                        } else if (data.done === 'booking') {
                            $('.pickup').addClass('hidden');
                            $('.picked-input').val(data.data.id).attr('id',2);
                            $('.payment-input').val(data.data.id).attr('id',2);
                            $('.shipper-name').html(data.data.shipper_name);
                            $('.shipper-phone').html(data.data.shipper_phone);
                            $('.shipper-email').html(data.data.shipper_email);

                            $('.receiver-name').html(data.data.receiver_name);
                            $('.receiver-phone').html(data.data.receiver_phone);
                            $('.receiver-email').html(data.data.receiver_email);
                            if (data.data.payment_status == 1){
                                $('.payment-input').prop('checked',true);
                            }else {
                                $('.payment-input').prop('checked',false);
                            }
                            if (data.data.status == 1){
                                $('.status').html('Ready for pickup');
                                $('.pickup').removeClass('hidden');
                            }else if(data.data.status == 2){
                                $('.status').html('picked');
                                $('.pickup').removeClass('hidden');
                                $('.picked-input').prop('checked',true);
                            }else if(data.data.status == 3){
                                $('.status').html('Container');
                            }else if(data.data.status == 4){
                                $('.status').html('Shipped');
                            }else if(data.data.status == 5){
                                $('.status').html('Block');
                            }else if(data.data.status == 6){
                                $('.status').html('Cancel');
                            }else if(data.data.status == 7){
                                $('.status').html('Delivered');
                            }
                            $('.date').html(data.data.created_at);
                            $('#PriceShowing').html(data.data.price +' '+ data.data.currency);
                            $('#NotFoundState1').html(data.data.from_country);
                            if (data.data.to_country == null){
                                $('#NotFoundState21').html(data.data.from_country);
                            }else {
                                $('#NotFoundState21').html(data.data.to_country);
                            }
                            $('.shipping-type').html(data.data.shipping_type);
                            $('.weight').html(data.data.weight + data.data.weight_type);
                            if (data.data.booking_type == 1){
                                $('.shipment').html('International');
                            }else {
                                $('.shipment').html('Domestic');
                            }
                            $('.product-info').removeClass('hidden');


                        } else if (data.done === 'error') {
                            swal("Invalid number / data not currently available");
                            $('.product-info').addClass('hidden');
                        } else {
                            swal("Something wrong, please try again later!");
                            $("#upload_form").trigger("reset");
                            $('.product-info').addClass('hidden');
                        }
                    }
                })

            });

            jQuery('.picked-input').change(function() {
                if ($(this).prop('checked')) {
                    let id = $(this).attr('id'), action, value;
                    action = 'active';
                    value = $(this).val();
                    $.ajax({
                        url: '{{route('AdminPickupStatus')}}',
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: id, action: action, value:value},
                        success: function (response) {
                            $('.status').html('Picked');
                        }
                    });
                }else {
                    let id = $(this).attr('id'), action, value;
                    action = 'inactive';
                    value = $(this).val();
                    $.ajax({
                        url: '{{route('AdminPickupStatus')}}',
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: id, action: action, value:value},
                        success: function (response) {
                            $('.status').html('Ready for pickup');
                        }
                    });
                }
            });

            jQuery('.payment-input').change(function() {
                if ($(this).prop('checked')) {
                    let id = $(this).attr('id'), action, value;
                    action = 'active';
                    value = $(this).val();
                    $.ajax({
                        url: '{{route('AdminPickupPaymentStatus')}}',
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: id, action: action, value:value},
                        success: function (response) {
                            $('.status').html('Picked');
                        }
                    });
                }else {
                    let id = $(this).attr('id'), action, value;
                    action = 'inactive';
                    value = $(this).val();
                    $.ajax({
                        url: '{{route('AdminPickupPaymentStatus')}}',
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: id, action: action, value:value},
                        success: function (response) {
                            $('.status').html('Ready for pickup');
                        }
                    });
                }
            });

        });


    </script>
@endpush
