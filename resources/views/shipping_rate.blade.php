@extends('layout.app')
@section('content')

    @include('inc.slide_area')

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
                                        <div class="row">
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="shipping_type1">
                                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                                Document
                                            </div>
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="shipping_type2">
                                                <i class="fa fa-cube" aria-hidden="true"></i>
                                                Parcel
                                            </div>
                                            <input type="hidden"
                                                   value="Parcel"
                                                   name="shipping_type" id="shipping_type">
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
                                        <div class="row">
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="delivery_type1">
                                                <h4>Regular</h4>
                                                <p>I am exporting and I will pay when I ship</p>
                                            </div>
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="delivery_type2">
                                                <h4>Express</h4>
                                                <p>I am importing and I will pay when I</p>
                                            </div>
                                            <input type="hidden"
                                                   value="Regular"
                                                   name="delivery_type" id="delivery_type">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <div class="panel panel-body hidden" id="FoundPrice"
                                             style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                            <div style="font-size: 20px;height: 100px;width: 107px;margin: 20px 0;border: 1px dotted blueviolet;border-radius: 50%;padding-top: 35px;display: inline-block;"
                                                 id="PriceShowing">
                                            </div>
                                            <h4>
                                                <span id="NotFoundState1"></span>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                <span id="NotFoundState21"></span>
                                            </h4>
                                        </div>
                                        <div class="panel panel-body hidden" id="NotFound"
                                             style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                            <p>Cash Rates Are Not Yet Available For</p>
                                            <h4>
                                                <span id="NotFoundState"></span>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                <span id="NotFoundState2"></span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit"
                                            style="margin-left: auto;margin-right: auto;display: block">Check Rate
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="quote_form hidden" id="domesticForm">
                            <form action="#" method="post" id="upload_form">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
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
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr2">From State:</label>
                                        <select class="js-example-basic-single form-control" name="FromState"
                                                style="margin-bottom: 0" id="FromState">

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr2">From City:</label>
                                        <select class="js-example-basic-single form-control" name="FromCity"
                                                style="margin-bottom: 0" id="FromCity">

                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr2">To State:</label>
                                        <select class="js-example-basic-single form-control" name="ToState"
                                                style="margin-bottom: 0" id="ToState">

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <div class="col-md-12" style="padding-left: 0;">
                                            <label for="usr2">To City:</label>
                                            <select class="js-example-basic-single form-control" name="ToCity"
                                                    style="margin-bottom: 0" id="ToCity">

                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group text-left" style="padding-left: 0;">
                                            <label for="usr3">Weight:</label>
                                            <div class="input-group">
                                                <input type="text" name="weight"
                                                       class="form-control"
                                                       value="{{isset($request)? $request->weight:0.5}}" required>
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
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">What are you planning to ship?</label>
                                        <div class="row">
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="shipping_type12">
                                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                                Document
                                            </div>
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="shipping_type13">
                                                <i class="fa fa-cube" aria-hidden="true"></i>
                                                Parcel
                                            </div>
                                            <input type="hidden"
                                                   value="{{isset($request)? $request->shipping_type:'Parcel'}}"
                                                   name="shipping_type" id="shipping_type11">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <div class="panel panel-body hidden" id="FoundPricez"
                                             style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                            <div style="font-size: 20px;height: 100px;width: 107px;margin: 20px 0;border: 1px dotted blueviolet;border-radius: 50%;padding-top: 35px;display: inline-block;"
                                                 id="PriceShowingz">
                                            </div>
                                            <h4>
                                                <span id="NotFoundState1z"></span>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                <span id="NotFoundState21z"></span>
                                            </h4>
                                        </div>
                                        <div class="panel panel-body hidden" id="NotFoundz"
                                             style="text-align:center;border: 1px solid #ddd;font-size:15px;cursor: pointer;">
                                            <p>Cash Rates Are Not Yet Available For</p>
                                            <h4>
                                                <span id="NotFoundStatez"></span>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                <span id="NotFoundState2z"></span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group text-left">
                                        <label for="usr3">How do you want to arrange for payment?</label>
                                        <div class="row">
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="delivery_type12">
                                                <h4>Regular</h4>
                                                <p>I am exporting and I will pay when I ship</p>
                                            </div>
                                            <div class="panel panel-body col-md-4 col-md-offset-1"
                                                 style="border: 1px solid #ddd;font-size:15px;cursor: pointer;"
                                                 id="delivery_type13">
                                                <h4>Express</h4>
                                                <p>I am importing and I will pay when I</p>
                                            </div>
                                            <input type="hidden"
                                                   value="{{isset($request)? $request->delivery_type:'Regular'}}"
                                                   name="delivery_type" id="delivery_type11">
                                        </div>
                                    </div>
                                </div>
                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit"
                                            style="margin-left: auto;margin-right: auto;display: block">Check Rate
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
        checked();

        function checked() {
            if ($('#shipping_type').val() === 'Parcel') {
                $('#shipping_type2').css({'border': '1px solid red'});
                $('#shipping_type1').css({'border': '1px solid #ddd'});
            } else {
                $('#shipping_type1').css({'border': '1px solid red'});
                $('#shipping_type2').css({'border': '1px solid #ddd'});
            }

            if ($('#delivery_type').val() === 'Regular') {
                $('#delivery_type1').css({'border': '1px solid red'});
                $('#delivery_type2').css({'border': '1px solid #ddd'});
            } else {
                $('#delivery_type2').css({'border': '1px solid red'});
                $('#delivery_type1').css({'border': '1px solid #ddd'});
            }
        }

        $('#shipping_type1').click(function () {
            if ($('#shipping_type').val() === 'Parcel') {
                $("#shipping_type").val('Document');
                checked();
            }
        });

        $('#shipping_type2').click(function () {
            if ($('#shipping_type').val() === 'Document') {
                $("#shipping_type").val('Parcel');
                checked();
            }
        });

        $('#delivery_type1').click(function () {
            if ($('#delivery_type').val() === 'Express') {
                $("#delivery_type").val('Regular');
                checked();
            }
        });

        $('#delivery_type2').click(function () {
            if ($('#delivery_type').val() === 'Regular') {
                $("#delivery_type").val('Express');
                checked();
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#CountryId').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectState') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('#FromState').html('');
                    $('#ToState').html('');
                    data.forEach(function (element) {
                        $('#FromState').append($('<option>', {value: element.code, text: element.name}));
                        $('#ToState').append($('<option>', {value: element.code, text: element.name}));
                    });

                }
            });

            $.ajax({
                url: "{{ route('SelectCountryCode') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('#currency').val(data.currency);
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

        $('#ToState').change(function () {
            let country = $('#CountryId').val();
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectCity') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id, country: country},
                dataType: 'json',
                success: function (data) {
                    $('#ToCity').html('');
                    data.forEach(function (element) {
                        $('#ToCity').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

        $('.delete').click(function (e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
        });

        checked2();

        function checked2() {
            if ($('#shipping_type11').val() === 'Parcel') {
                $('#shipping_type13').css({'border': '1px solid red'});
                $('#shipping_type12').css({'border': '1px solid #ddd'});
            } else {
                $('#shipping_type12').css({'border': '1px solid red'});
                $('#shipping_type13').css({'border': '1px solid #ddd'});
            }

            if ($('#delivery_type11').val() === 'Regular') {
                $('#delivery_type12').css({'border': '1px solid red'});
                $('#delivery_type13').css({'border': '1px solid #ddd'});
            } else {
                $('#delivery_type13').css({'border': '1px solid red'});
                $('#delivery_type12').css({'border': '1px solid #ddd'});
            }
        }

        $('#shipping_type12').click(function () {
            if ($('#shipping_type11').val() === 'Parcel') {
                $("#shipping_type11").val('Document');
                checked2();
            }
        });

        $('#shipping_type13').click(function () {
            if ($('#shipping_type11').val() === 'Document') {
                $("#shipping_type11").val('Parcel');
                checked2();
            }
        });

        $('#delivery_type12').click(function () {
            if ($('#delivery_type11').val() === 'Express') {
                $("#delivery_type11").val('Regular');
                checked2();
            }
        });

        $('#delivery_type13').click(function () {
            if ($('#delivery_type11').val() === 'Regular') {
                $("#delivery_type11").val('Express');
                checked2();
            }
        });

        $(document).ready(function () {
            $('#upload_form').on('submit', function () {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('ShippingRateSearchDomestic') }}",
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
                        if (data.error == 'error') {
                            if (!$('#FoundPricez').hasClass('hidden')) {
                                $('#FoundPricez').addClass('hidden');
                            }
                            $('#NotFoundz').removeClass('hidden');
                            $('#NotFoundStatez').html($("#FromState option:selected").text());
                            $('#NotFoundState2z').html($("#ToState option:selected").text());
                        } else {
                            if (!$('#NotFound').hasClass('hidden')) {
                                $('#NotFound').addClass('hidden');
                            }
                            $('#FoundPricez').removeClass('hidden');
                            $('#NotFoundState1z').html($("#FromState option:selected").text());
                            $('#NotFoundState21z').html($("#ToState option:selected").text());
                            $('#PriceShowingz').html(data.price + ' ' + data.currency);
                        }
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
                    url: "{{ route('ShippingRateSearch') }}",
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
                        if (data.error == 'error') {
                            if (!$('#FoundPrice').hasClass('hidden')) {
                                $('#FoundPrice').addClass('hidden');
                            }
                            $('#NotFound').removeClass('hidden');
                            $('#NotFoundState').html($("#from_country option:selected").text());
                            $('#NotFoundState2').html($("#to_country option:selected").text());
                        } else {
                            if (!$('#NotFound').hasClass('hidden')) {
                                $('#NotFound').addClass('hidden');
                            }
                            $('#FoundPrice').removeClass('hidden');
                            $('#NotFoundState1').html($("#from_country option:selected").text());
                            $('#NotFoundState21').html($("#to_country option:selected").text());
                            $('#PriceShowing').html(data.price + ' ' + data.currency);
                        }
                    }
                })
            });
        });

    </script>
@endpush