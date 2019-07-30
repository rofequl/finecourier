@extends('admin.layout.app')
@section('pageTitle','State Manage')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>State Manage</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus fs-13 m-r-3"></i> Add New State
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

                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dataTable no-footer dtr-inline">
                                <thead>
                                <tr class="bg-dark">
                                    <th>Code</th>
                                    <th>Fips Code</th>
                                    <th>ISO Code</th>
                                    <th>Name</th>
                                    <th>Country code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($state as $states)

                                    <tr>
                                        <th scope="row">{{$states['code']}}</th>
                                        <th scope="row">{{$states['fipsCode']}}</th>
                                        <th scope="row">{{$states['isoCode']}}</th>
                                        <th scope="row">{{$states['name']}}</th>
                                        <th scope="row">{{$states['country_code']}}</th>
                                        <td>

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
                                <small>State Information add</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="demo-form2" method="post"
                                  action="{{route('AdminStateAdd')}}"
                                  class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="code">Code*:</label>
                                    <input type="number" class="form-control" placeholder="BD" name="code" id="code"
                                           value="{{old('code')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="country_code">Country*:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="country_code"
                                            id="country_code">
                                        <option></option>
                                        @foreach($country as $countries)
                                            <option value="{{$countries['code']}}">{{$countries['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="name">Name*:</label>
                                    <input type="text" class="form-control" placeholder="Bangladesh" name="name"
                                           id="name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fipsCode">Fips Code:</label>
                                    <input type="text" class="form-control" placeholder="BGD" name="fipsCode"
                                           id="fipsCode"
                                           value="{{old('fipsCode')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="isoCode">ISO Code:</label>
                                    <input type="text" class="form-control" placeholder="BD" name="isoCode" id="isoCode"
                                           value="{{old('isoCode')}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="geonamesCode">Geo names Code:</label>
                                    <input type="number" class="form-control" placeholder="050" name="geonamesCode"
                                           id="geonamesCode" value="{{old('geonamesCode')}}">
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
        $('.Change').click(function () {
            let id = $(this).attr('id'), action;
            let clases = $(this);
            if ($(this).hasClass("btn-success")) {
                action = 'inactive';
                $.ajax({
                    url: '{{route('AdminCountryChange')}}',
                    type: 'post',
                    data: {_token: CSRF_TOKEN, id: id, action: action},
                    success: function (response) {
                        $(clases).toggleClass('btn-success btn-info');
                        $(clases).html('Inactive');
                    }
                });
            } else {
                action = 'active';
                $.ajax({
                    url: '{{route('AdminCountryChange')}}',
                    type: 'post',
                    data: {_token: CSRF_TOKEN, id: id, action: action},
                    success: function (response) {
                        $(clases).toggleClass('btn-info btn-success');
                        $(clases).html('Active');
                    }
                });

            }
        });

    </script>
@endpush
