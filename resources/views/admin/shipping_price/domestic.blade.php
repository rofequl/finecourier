@extends('admin.layout.app')
@section('pageTitle','Domestic shipping price')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Domestic shipping price</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Add new domestic price
                        </button>
                    </div>
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
                @if(isset($oneData))
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" novalidate=""
                                  action="{{ route('SliderManageUpdate') }}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$oneData->id}}" name="id">
                                <span class="section">Update Slider</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider
                                        Title One</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="slider_title_one" value="{{$oneData->slider_title_one}}"
                                               placeholder="Slider Title One" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">Slider
                                        Title Two</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name2" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="slider_title_two" value="{{$oneData->slider_title_two}}"
                                               placeholder="Slider Title Two" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider
                                        Image</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div onclick="chooseFile()" id="previewImage">
                                            <div class="mt-5">
                                                <i class="fa fa-cloud-upload fa-3x"></i><br>
                                                Add a Slider Image
                                            </div>
                                        </div>
                                        <input type="file" name="image" class="ImageUpload hidden">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{route('SliderManage')}}" type="reset" class="btn btn-primary">
                                            Cancel
                                        </a>
                                        <button id="send" type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                <tr class="bg-dark">
                                    <th>Country</th>
                                    <th>From  State</th>
                                    <th>From City</th>
                                    <th>To  State</th>
                                    <th>To City</th>
                                    <th>Shipping type</th>
                                    <th>Weight type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $datas)

                                    <tr>
                                        <th scope="row">{{get_country_name_by_code($datas->country)->name}}</th>
                                        <th scope="row">{{get_state_name_by_code($datas->country,$datas->from_state)->name}}</th>
                                        <th scope="row">{{get_city_name_by_code($datas->country,$datas->from_state,$datas->from_city)->name}}</th>
                                        <th scope="row">{{get_state_name_by_code($datas->country,$datas->to_state)->name}}</th>
                                        <th scope="row">{{get_city_name_by_code($datas->country,$datas->to_state,$datas->to_city)->name}}</th>

                                        <td>{{$datas->shipping_type}}</td>
                                        <td>{{$datas->weight_type}}</td>
                                        <td>
                                            0 to {{$datas->max_weight}} gram price {{$datas->max_price}} {{$datas->currency}},<br>
                                            Next per {{$datas->per_weight}} gram price {{$datas->price}} {{$datas->currency}}
                                        </td>

                                        <td>
                                            {{--                                            <a href="{{route('SliderManage',$datas->id)}}" style="margin: 0 2px"--}}
                                            {{--                                               data-toggle="tooltip"--}}
                                            {{--                                               data-placement="top" title=""--}}
                                            {{--                                               data-original-title="Edit"><i--}}
                                            {{--                                                        class="fa fa-edit fa-2x"></i></a>--}}
                                            <a href="{{route('AdminDomesticDelete','delete='.$datas->id)}}"
                                               style="margin: 0 2px" data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="Delete" class="delete"><i
                                                        class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
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
                            <h2>
                                <small>Domestic Shipping price add</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post"
                                  action="{{route('AdminDomesticAdd')}}" class="form-horizontal form-label-left">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">From Country</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="col-md-7 col-xs-12 select2_single" id="CountryId"
                                                name="country">
                                            <option value="">Select Country</option>
                                            @foreach($earth as $earths)
                                                @if(check_active_country($earths['code']))
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">From State</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="col-md-7 col-xs-12 select2_single" id="FromState"
                                                name="from_state">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">From City</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="col-md-7 col-xs-12 select2_single" id="FromCity"
                                                name="from_city">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">To State</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="col-md-7 col-xs-12 select2_single" id="ToState" name="to_state">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">To City</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="col-md-7 col-xs-12 select2_single" id="ToCity" name="to_city">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Shipping Type</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="radio col-sm-6">
                                                <label class="">
                                                    <div class="iradio_flat-green" style="position: relative;"><input
                                                                type="radio" class="flat" checked=""
                                                                name="shipping_type" value="Document"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    Document
                                                </label>
                                            </div>
                                            <div class="radio col-sm-6">
                                                <label class="">
                                                    <div class="iradio_flat-green" style="position: relative;"><input
                                                                type="radio" class="flat" name="shipping_type"
                                                                value="Parcel"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    Parcel
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Weight Type</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="radio col-sm-6">
                                                <label class="">
                                                    <div class="iradio_flat-green" style="position: relative;"><input
                                                                type="radio" class="flat" checked="" name="weight_type"
                                                                value="KG" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    KG
                                                </label>
                                            </div>
                                            <div class="radio col-sm-6">
                                                <label class="">
                                                    <div class="iradio_flat-green" style="position: relative;"><input
                                                                type="radio" class="flat" name="weight_type" value="LB"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    LB
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery Type</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="radio col-sm-6">
                                                <label class="">
                                                    <div class="iradio_flat-green" style="position: relative;"><input
                                                                type="radio" class="flat" checked=""
                                                                name="delivery_type" value="Regular"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    Regular
                                                </label>
                                            </div>
                                            <div class="radio col-sm-6">
                                                <label class="">
                                                    <div class="iradio_flat-green" style="position: relative;"><input
                                                                type="radio" class="flat" name="delivery_type"
                                                                value="Express"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    Express
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Currency</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="currency" id="currency" style="width: 80px"
                                                class="col-md-7 col-xs-12 form-control">
                                            @foreach($earth as $earths)
                                                <option value="{{$earths['currency']}}">{{$earths['currency']}}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="number" class="form-control" value="0" readonly>
                                    <span class="input-group-addon" id="priceLabel">to</span>
                                    <input type="number" name="max_weight" placeholder="Insert Gram"
                                            class="form-control">
                                    <span class="input-group-addon" id="priceLabel">gram price</span>
                                    <input type="number"  name="max_price"
                                            class="form-control" placeholder="Insert Price">
                                </div>
                                <span class="help-block">Example: 0 to 500 gram price 20</span>
                                <div class="input-group">
                                    <span class="input-group-addon" title="* Price" id="priceLabel">Next per</span>
                                    <input type="number"  placeholder="Insert Gram"
                                           name="per_weight" class="form-control">
                                    <span class="input-group-addon" id="priceLabel">gram price</span>
                                    <input type="number"  name="price"
                                           class="form-control" placeholder="Insert Price">
                                </div>
                                <span class="help-block">Example: Next per 300 gram price 20 USD</span>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" data-dismiss="modal" type="button">Cancel
                                        </button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Datatables -->
    <script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
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

        function warnBeforeRedirect(linkURL) {
            swal({
                title: "Sure want to delete?",
                text: "If you click 'OK' file will be deleted",
                type: "warning",
                showCancelButton: true
            }, function () { // Redirect the user | linkURL is href url
                window.location.href = linkURL;
            });
        }

    </script>
@endpush
