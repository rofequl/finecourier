@extends('layout.app')
@section('content')

    @include('inc.slide_area')

    <style>
        input[type=radio] {
            display: inline-block;
        }
    </style>
    <!--================================
    START SLIDER AREA
=================================-->
    <section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort"
             style="padding-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1">
                    <div class="quote_requ_wrapper">
                        <div class="section_title">
                            <div class="title"><h2>Shipping Rate Calculator</h2></div>
                        </div>
                        <div class="sub_content">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <button type="button" id="international" class="btn btn-primary">International
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" id="domestic" class="btn btn-default">Domestic</button>
                                </div>
                            </div>
                        </div>
                        <div class="quote_form" id="internationalForm">
                            <form action="" method="post" id="upload_form2">
                                {{csrf_field()}}
                                <input type="hidden" name="booking_type" value="1">
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr">From:</label>
                                        <select class="js-example-basic-single" name="from_country" id="from_country"
                                                style="margin-bottom: 0">
                                            <option></option>
                                            @foreach($earth as $earths)
                                                @if(check_active_country($earths['code']))
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr2">To:</label>
                                        <select class="js-example-basic-single form-control" name="to_country"
                                                id="to_country"
                                                style="margin-bottom: 0">
                                            <option></option>
                                            @foreach($earth as $earths)
                                                @if(check_active_country($earths['code']))
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">What are you planning to ship?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <label class="radio-inline"><input type="radio" value="Document"
                                                                               name="shipping_type">Document</label>
                                            <label class="radio-inline"><input type="radio" value="Parcel"
                                                                               name="shipping_type" checked>Parcel</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">Weight:</label>
                                        <div class="input-group">
                                            <input type="text" name="weight"
                                                   class="form-control"
                                                   value="0.5" required>
                                            <span class="input-group-addon"
                                                  style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                            <select id="searchbygenerals_currency" name="weight_type"
                                                    class="form-control">
                                                <option value="KG">KG</option>
                                                <option value="LB">LB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">How do you want to arrange for payment?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <label class="radio-inline"><input type="radio" value="Regular"
                                                                               name="delivery_type" checked>Regular</label>
                                            <label class="radio-inline"><input type="radio" value="Express"
                                                                               name="delivery_type">Express</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">Dimenshion</label>
                                        <div class="row" style="margin-left: 3px">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="pwd" name="dimenshion"
                                                       placeholder="LxWxH in CM">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3">Shipper Details?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Contact Name:</label>
                                                <input type="text" name="shipper_name" placeholder="Shipper Name" class="form-control" id="usr">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr1">Contact Phone:</label>
                                                <input type="tel" name="shipper_phone" placeholder="Shipper Phone" class="form-control" id="usr1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr2">Contact Email:</label>
                                                <input type="email" name="shipper_email" placeholder="Shipper Email" class="form-control" id="usr2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Contact Address:</label>
                                                <textarea name="shipper_address" placeholder="City / State / Address" class="form-control" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3">Receiver Details?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Contact Name:</label>
                                                <input type="text" name="receiver_name" placeholder="Receiver Name" class="form-control" id="usr">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr1">Contact Phone:</label>
                                                <input type="tel" name="receiver_phone" placeholder="Receiver Phone" class="form-control" id="usr1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr2">Contact Email:</label>
                                                <input type="email" name="receiver_email" placeholder="Receiver Email" class="form-control" id="usr2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Dalivery Address:</label>
                                                <textarea class="form-control" name="receiver_address" style="height: 100px"
                                                placeholder="City / State / Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit"
                                            style="margin-left: auto;margin-right: auto;display: block">Book
                                    </button>
                                </div>
                            </form>
                        </div>


                        <div class="quote_form hidden" id="domesticForm">
                            <form action="#" method="post" id="upload_form">
                                {{csrf_field()}}
                                <input type="hidden" name="booking_type" value="2">
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr">Pickup date:</label>
                                        <input type="text" class="form-control" name="pickup_date">
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr2">Pickup Delivery:</label>
                                        <input type="text" class="form-control" name="pickup_delivery">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr">Country:</label>
                                        <select class="js-example-basic-single" name="from_country" id="CountryId"
                                                style="margin-bottom: 0">
                                            <option></option>
                                            @foreach($earth as $earths)
                                                @if(check_active_country($earths['code']))
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3">Weight:</label>
                                        <div class="input-group">
                                            <input type="text" name="weight"
                                                   class="form-control"
                                                   value="0.5" required>
                                            <span class="input-group-addon"
                                                  style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                            <select id="searchbygenerals_currency" name="weight_type"
                                                    class="form-control">
                                                <option value="KG">KG</option>
                                                <option value="LB">LB</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3">Dimenshion</label>
                                        <div class="row" style="margin-left: 3px">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="pwd" name="dimenshion"
                                                       placeholder="LxWxH in CM">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">What are you planning to ship?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <label class="radio-inline"><input type="radio" value="Document"
                                                                               name="shipping_type">Document</label>
                                            <label class="radio-inline"><input type="radio" value="Parcel"
                                                                               name="shipping_type" checked>Parcel</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">How do you want to arrange for payment?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <label class="radio-inline"><input type="radio" value="Regular"
                                                                               name="delivery_type" checked>Regular</label>
                                            <label class="radio-inline"><input type="radio" value="Express"
                                                                               name="delivery_type">Express</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3">Shipper Details?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Contact Name:</label>
                                                <input type="text" name="shipper_name" placeholder="Shipper Name" class="form-control" id="usr">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr1">Contact Phone:</label>
                                                <input type="tel" name="shipper_phone" placeholder="Shipper Phone" class="form-control" id="usr1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr2">Contact Email:</label>
                                                <input type="email" name="shipper_email" placeholder="Shipper Email" class="form-control" id="usr2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Contact Address:</label>
                                                <textarea name="shipper_address" placeholder="City / State / Address" class="form-control" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3">Receiver Details?</label>
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Contact Name:</label>
                                                <input type="text" name="receiver_name" placeholder="Receiver Name" class="form-control" id="usr">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr1">Contact Phone:</label>
                                                <input type="tel" name="receiver_phone" placeholder="Receiver Phone" class="form-control" id="usr1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group text-left">
                                        <label for="usr3"> </label>
                                        <div class="row" style="margin-left: 5px;margin-top: 5px">
                                            <div class="form-group">
                                                <label for="usr2">Contact Email:</label>
                                                <input type="email" name="receiver_email" placeholder="Receiver Email" class="form-control" id="usr2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group text-left">
                                        <div class="row" style="margin-left: 5px">
                                            <div class="form-group">
                                                <label for="usr">Dalivery Address:</label>
                                                <textarea class="form-control" name="receiver_address" style="height: 100px"
                                                          placeholder="City / State / Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit"
                                            style="margin-left: auto;margin-right: auto;display: block">Book
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================================
        START SLIDER AREA
    =================================-->

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function () {
            $('#upload_form').on('submit', function () {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('BookingShipmentPost') }}",
                    method: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
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
                            Swal.fire({
                                title: mainData,
                                html: allData,
                                type: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                    success: function (data) {
                       dd(data);
                    }
                })
            });
        });

        $('#international').click(function () {
            if (!$('#domesticForm').hasClass('hidden')) {
                $('#domesticForm').addClass('hidden');
            }
            if ($('#internationalForm').hasClass('hidden')) {
                $('#internationalForm').removeClass('hidden');
                $('#international').toggleClass('btn-default btn-primary');
                $('#domestic').toggleClass('btn-primary btn-default');
                if (!$('#NotFound').hasClass('hidden')) {
                    $('#NotFound').addClass('hidden');
                }
                if (!$('#FoundPrice').hasClass('hidden')) {
                    $('#FoundPrice').addClass('hidden');
                }
                $("#response").removeClass("alert alert-danger").html('');
            }
        });

        $('#domestic').click(function () {
            if (!$('#internationalForm').hasClass('hidden')) {
                $('#internationalForm').addClass('hidden');
            }
            if ($('#domesticForm').hasClass('hidden')) {
                $('#domesticForm').removeClass('hidden');
                $('#domestic').toggleClass('btn-default btn-primary');
                $('#international').toggleClass('btn-primary btn-default');
                if (!$('#NotFound').hasClass('hidden')) {
                    $('#NotFound').addClass('hidden');
                }
                if (!$('#FoundPrice').hasClass('hidden')) {
                    $('#FoundPrice').addClass('hidden');
                }
                $("#response").removeClass("alert alert-danger").html('');
            }
        });

        $(document).ready(function () {
            $('#upload_form2').on('submit', function () {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('BookingShipmentPost') }}",
                    method: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
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
                            Swal.fire({
                                title: mainData,
                                html: allData,
                                type: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                    success: function (data) {
                        console.log(data);
                    }
                })
            });
        });

    </script>
@endpush
