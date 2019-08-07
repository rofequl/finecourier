@extends('admin.layout.app')
@section('pageTitle','User List')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Customer List</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-user-plus fs-13 m-r-3"></i> Create new user
                        </button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            @if ($errors->any())
                <ul class="alert alert-danger alert-dismissible">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
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

                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                <tr class="bg-dark">
                                    <th>User Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $users)

                                    <tr>
                                        <th scope="row">{{$users['user_id']}}</th>
                                        <th scope="row"><img width="42" height="42" class="img-thumbnail img-fluid"
                                                             src="{{get_user_by_id($users->id)->image == null? asset('images/user.png'):asset('storage/user/'.get_user_by_id($users->id)->image)}}"
                                                             alt=""></th>
                                        <th scope="row">{{$users['first_name']}} {{$users['last_name']}}</th>
                                        <th scope="row">{{$users['phone']}}</th>
                                        <th scope="row">{{$users['email']}}</th>
                                        <th scope="row">
                                            @if($users->status==1)
                                                <span class="label label-success">Registerd</span>
                                            @elseif($users->status==1)
                                                <span class="label label-success">Block</span>
                                            @else
                                                <span class="label label-success">{{$users->created_at->diffForHumans()}}</span>
                                            @endif
                                        </th>
                                        <th scope="row">
                                            <a href="{{route('AdminCustomerView','profile='.base64_encode($users->id))}}" class="btn btn-primary">View</a>
                                        </th>
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
                                <small>Customer Information add</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post"
                                  action="{{route('AdminCustomerAdd')}}" autocomplete="off"
                                  class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" placeholder="Arafat" name="first_name"
                                           id="first_name"
                                           value="{{old('first_name')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" placeholder="Ahmed" name="last_name"
                                           id="last_name" value="{{old('last_name')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" placeholder="abc@gmail.com" name="email"
                                           id="email" value="{{old('email')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" placeholder="01234567898" name="phone"
                                           id="phone"
                                           value="{{old('phone')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" placeholder="*******" name="password"
                                           id="password">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password_confirmation ">Confirm Password:</label>
                                    <input type="password" class="form-control" placeholder="*******"
                                           name="password_confirmation"
                                           id="password_confirmation">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="numericCode">Country:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="country"
                                            id="country_code">
                                        <option></option>
                                        @foreach($country as $countries)
                                            <option value="{{$countries['code']}}">{{$countries['name']}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="post_code">Post Code:</label>
                                    <input type="number" class="form-control" placeholder="1210997" name="post_code"
                                           id="post_code" value="{{old('post_code')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="division">Division:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="division"
                                            id="division">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="city">City:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="city"
                                            id="city">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="placeName">Place Name:</label>
                                    <input type="text" class="form-control" name="placeName" id="placeName"
                                           value="{{old('placeName')}}">
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#country_code').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectState') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('#division').html('').append($('<option>', {value: '', text: 'Select State'}));
                    data.forEach(function (element) {
                        $('#division').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

        $('#division').change(function () {
            let country = $('#country_code').val();
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectCity') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id, country: country},
                dataType: 'json',
                success: function (data) {
                    $('#city').html('').append($('<option>', {value: '', text: 'Select City'}));
                    data.forEach(function (element) {
                        $('#city').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

        $('#post_code').focusout(function () {
            let post = $(this).val();
            let country = $('#country_code').val();
            if (post != "" && country != "") {
                var client = new XMLHttpRequest();
                var url = "http://api.zippopotam.us/" + country + "/" + post;
                client.open("GET", url, true);
                client.onreadystatechange = function () {
                    if (client.readyState == 4) {
                        let address = JSON.parse(client.responseText);
                        address = address.places[0]['place name'];
                        $('#placeName').val(address);
                    } else {
                        $('#placeName').val('');
                    }
                };
                client.send();
            }
        });

    </script>
@endpush
