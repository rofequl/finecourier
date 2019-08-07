@extends('admin.layout.app')
@section('pageTitle',$user->first_name.' Profile')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{$user->first_name}} Profile</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-4 col-lg-3">
                                    <img class="img-thumbnail img-fluid" width="100px"
                                         src="{{get_user_by_id($user->id)->image==null? asset('images/user.png'):asset('storage/user/'.get_user_by_id($user->id)->image)}}"
                                         alt="">
                                </div>
                                <div class="col-xs-12 col-md-8 col-lg-9">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2>{{$user->first_name.' '.$user->last_name}}</h2>
                                        </div>
                                        <div class="col-12 pos-relative" style="height: 55px">
                                            <div class="btn-group btn-group-justified pos-absolute bottom-0">
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                   data-target="#myModal">Edit</a>
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                   data-target="#myModal2">Change Password</a>
                                                @if($user->status == 2)
                                                    <a href="{{route('AdminCustomerBlock','unblock='.base64_encode($user->id))}}"
                                                       class="btn btn-danger">Unblock</a>
                                                @else
                                                    <a href="{{route('AdminCustomerBlock','block='.base64_encode($user->id))}}"
                                                       class="btn btn-primary">Block</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="text-success"><i class="mdi mdi-face"></i> Intro</h4>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Phone:
                                        </div>
                                        <div class="col-xs-6">
                                            {{$user->phone}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Email:
                                        </div>
                                        <div class="col-xs-6">
                                            {{$user->email}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Country:
                                        </div>
                                        <div class="col-xs-6">
                                            {{get_country_name_by_code($user->country)->name}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Post Code:
                                        </div>
                                        <div class="col-xs-6">
                                            {{$user->post_code}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            State:
                                        </div>
                                        <div class="col-xs-6">
                                            {{get_state_name_by_code($user->country,$user->division)->name}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            City:
                                        </div>
                                        <div class="col-xs-6">
                                            {{get_city_name_by_code($user->country,$user->division,$user->city)->name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h4 class="text-success"><i class="mdi mdi-map-marker"></i> Address Book</h4>
                                </div>
                                <div class="x_content">
                                    <div class="panel-group" id="accordion">
                                        @foreach($address as $addresses)
                                            <div class="panel panel-default">
                                                <div id="headingOne" class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <h4>{{$addresses->name}}
                                                                <small>
                                                                    @if($addresses->address_type == 1)
                                                                        <span
                                                                            class="mb-2 ml-4 label label-success text-capitalize">Shipper Address</span>
                                                                    @elseif($addresses->address_type == 2)
                                                                        <span
                                                                            class="mb-2 ml-4 label label-success text-capitalize">Receiver Address</span>
                                                                    @else
                                                                        <span
                                                                            class="mb-2 ml-4 label label-success text-capitalize">Billing Address</span>
                                                                    @endif
                                                                </small>
                                                            </h4>
                                                            <p style="color: #48505791;font-size: 13px" class="mb-0">
                                                                {{get_city_name_by_code($addresses->country,$addresses->state,$addresses->city)->name}}
                                                                ,
                                                                {{get_state_name_by_code($addresses->country,$addresses->state)->name}}
                                                                ,
                                                                {{get_country_name_by_code($addresses->country)->name}}
                                                                ,
                                                                {{$addresses->post_code}}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a type="button" data-toggle="collapse"
                                                               href="#collapse{{$addresses->id}}"
                                                               data-parent="#accordion"
                                                               class="btn btn-sm btn-primary">
                                                                <i class="mdi mdi-teamviewer" aria-hidden="true"></i>
                                                                View
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="collapse{{$addresses->id}}"
                                                     class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Name:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->name}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Company:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->company}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Email:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->email}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Address Type:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        @if($addresses->address_type == 1)
                                                                            Shipper Address
                                                                        @elseif($addresses->address_type == 2)
                                                                            Receiver Address
                                                                        @else
                                                                            Billing Address
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Country:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{get_country_name_by_code($addresses->country)->name}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Post Code:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->post_code}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        State:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{get_state_name_by_code($addresses->country,$addresses->state)->name}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        City:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{get_city_name_by_code($addresses->country,$addresses->state,$addresses->city)->name}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Phone one:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->phone_one}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Phone two:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->phone_two}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Address one:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->address_one}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-xs-5">
                                                                        Address two:
                                                                    </div>
                                                                    <div class="col-xs-7">
                                                                        {{$addresses->address_two}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-12">

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
                                {{$user->first_name}} profile edit
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post"
                                  action="{{route('AdminCustomerUpdate')}}" autocomplete="off"
                                  class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" placeholder="Arafat" name="first_name"
                                           id="first_name"
                                           value="{{$user->first_name}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" placeholder="Ahmed" name="last_name"
                                           id="last_name" value="{{$user->last_name}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" placeholder="abc@gmail.com" name="email"
                                           id="email" value="{{$user->email}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" placeholder="01234567898" name="phone"
                                           id="phone"
                                           value="{{$user->phone}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="numericCode">Country:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="country"
                                            id="CountryId">
                                        <option value="">Select Country</option>
                                        @foreach($country as $countries)
                                            @if($countries->code == $user->country)
                                                <option value="{{$countries->code}}"
                                                        selected>{{$countries->name}}</option>
                                            @else
                                                <option value="{{$countries->code}}">{{$countries->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="post_code">Post Code:</label>
                                    <input type="number" class="form-control" placeholder="1210997" name="post_code"
                                           id="post_code" value="{{$user->post_code}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="division">Division:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="division"
                                            id="FromState">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="city">City:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="city"
                                            id="FromCity">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="placeName">Place Name:</label>
                                    <input type="text" class="form-control" name="placeName" id="placeName"
                                           value="{{$user->placeName}}">
                                </div>
                                <hr>
                                <div class="col-md-12 form-group has-feedback ">
                                    <button type="submit" class="btn btn-success pull-right"><i
                                            class="mdi mdi-content-save m-r-3"></i>Save
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
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Password Change
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post"
                                  action="{{route('AdminCustomerPasswordChange')}}" autocomplete="off"
                                  class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password">password:</label>
                                    <input type="password" class="form-control" name="password"
                                           id="password">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           id="password_confirmation">
                                </div>
                                <hr>
                                <div class="col-md-12 form-group has-feedback ">
                                    <button type="submit" class="btn btn-success pull-right"><i
                                            class="mdi mdi-content-save m-r-3"></i>Save
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

        @if(session()->has('message'))
        swal({
            title: 'Message',
            text: "{{ session()->get('message') }}",
            type: 'success',
            html: true,
            confirmButtonText: 'Ok'
        });
        @endif

        @if ($errors->any())
        swal({
            title: 'Error',
            text: "@foreach ($errors->all() as $error){!!$error.'<br>'!!}@endforeach",
            type: 'error',
            html: true,
            confirmButtonText: 'Ok'
        });
        @endif

        profileManage();
        function profileManage() {
            let country = $('#CountryId').val();
            let id = '{{$user->division}}';
            $.ajax({
                url: "{{ route('SelectState') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: country},
                dataType: 'json',
                success: function (data) {
                    $('#FromState').html('');
                    data.forEach(function (element) {
                        $('#FromState').append($('<option>', {value: element.code, text: element.name}));
                        $('#FromState').val(id);
                    });
                }
            });

            $.ajax({
                url: "{{ route('SelectCity') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id, country: country},
                dataType: 'json',
                success: function (data) {
                    $('#FromCity').html('');
                    data.forEach(function (element) {
                        $('#FromCity').append($('<option>', {value: element.code, text: element.name}));
                        $('#FromCity').val({{$user->city}});
                    });
                }
            });

        }


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

    </script>
@endpush
