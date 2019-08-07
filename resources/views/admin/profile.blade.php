@extends('admin.layout.app')
@section('pageTitle','Admin Profile')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Admin Profile Manage</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Create a new account
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
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr class="bg-dark">
                                    <th>Serial No.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no=1; @endphp
                                @foreach($admin as $admins)
                                    <tr>
                                        <td>{{$no}}</td>@php $no++; @endphp
                                        <td>{{$admins->name}}</td>
                                        <td>{{$admins->email}}</td>
                                        <td>
                                            <div class="btn-group  btn-group-sm">
                                                <button class="btn btn-success edit-account" id="{{$admins->id}}"
                                                        type="button"><i
                                                        class="mdi mdi-table-edit m-r-3"></i>Edit
                                                </button>
                                                <button class="btn btn-success change-password" id="{{$admins->id}}" type="button"><i
                                                        class="mdi mdi-account-key m-r-3"></i>Change Password
                                                </button>
                                                <button class="btn btn-success delete" type="button"
                                                        href="{{route('AdminDelete','delete='.base64_encode($admins->id))}}">
                                                    <i class="mdi mdi-delete m-r-3"></i>Delete
                                                </button>
                                            </div>
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

    <!-- New account Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Create a new account
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post"
                                  action="{{route('AdminUserRegister')}}" class="form-horizontal form-label-left">
                                {{csrf_field()}}

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="name">Username:</label>
                                    <input type="text" class="form-control" placeholder="Arafat" name="name"
                                           id="name"
                                           value="{{old('name')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" placeholder="arafat@gmail.com" name="email"
                                           id="email"
                                           value="{{old('email')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="password">Password:</label>
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
                                            class="mdi mdi-content-save m-r-3"></i>Create Admin
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

    <!-- Edit Profile Modal -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="modal-head">Edit Account</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="upload_form" method="post" class="form-horizontal"
                                  action="{{route('AdminSingleProfile')}}">
                                {{csrf_field()}}
                                <input type="hidden" value="" name="id" id="country_id">
                                <div class="col-xs-12 form-group">
                                    <label for="name1">Username:</label>
                                    <input type="text" placeholder="Please enter Container number" name="name"
                                           id="name1" class="form-control"/>
                                </div>
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="email1">Email:</label>
                                    <input type="email" class="form-control" placeholder="Container Name" name="email"
                                           id="email1">
                                </div>
                                <hr>
                                <div class="col-md-12 form-group">
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

    <!-- Change Password Modal -->
    <div id="myModal3" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="modal-head">Change Password</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="upload_form2" method="post" class="form-horizontal"
                                  action="{{route('AdminPasswordChange')}}">
                                {{csrf_field()}}
                                <input type="hidden" value="" name="id" id="password_id">
                                <div class="col-xs-12 form-group">
                                    <label for="password2">Password:</label>
                                    <input type="password" name="password"
                                           id="password2" class="form-control"/>
                                </div>
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="password_confirmation2">Confirm Password:</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           id="password_confirmation2">
                                </div>
                                <hr>
                                <div class="col-md-12 form-group">
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
    <link href="{{asset('assets/vendors/sweetalert/sweetalert.css')}}" rel="stylesheet"/>
@endpush


@push('scripts')
    <script src="{{asset('assets/vendors/sweetalert/sweetalert.js')}}"></script>
    <script>

        $(document).on('click', '.edit-account', function () {
            $('#myModal2').modal('show');
            $("#upload_form").trigger("reset");
            let id = $(this).attr('id');
            $.ajax({
                url: "{{ route('AdminSingleProfile') }}",
                type: 'get',
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $('#country_id').val(data.id);
                    $('#name1').val(data.name);
                    $('#email1').val(data.email);
                }
            });
        });

        $(document).on('click', '.change-password', function () {
            $('#myModal3').modal('show');
            $("#upload_form2").trigger("reset");
            let id = $(this).attr('id');
            $('#password_id').val(id);


        });

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
    </script>
@endpush
