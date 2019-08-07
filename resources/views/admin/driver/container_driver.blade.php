@extends('admin.layout.app')
@section('pageTitle','Container Manage')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="modal-head">Container add driver</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
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
                        <form id="upload_form" action="{{route('AdminContainerDriverAdd')}}" method="post"
                              class="form-horizontal form-label-left input_mask">
                            {{csrf_field()}}
                            <input type="hidden" value="" name="id" id="country_id">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="driver_id">Driver id:</label>
                                <select class="select2_single" name="driver_id"
                                        id="driver_id">
                                    <option></option>
                                    @foreach($driver as $drivers)
                                        <option
                                            value="{{$drivers->driver_id}}">{{$drivers->driver_id.' ('.$drivers->first_name.' '.$drivers->last_name.')'}}</option>
                                    @endforeach
                                </select></div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="container_code">Container Code:</label>
                                <select class="select2_single" name="container_code"
                                        id="container_code">
                                    <option></option>
                                    @foreach($container as $containers)
                                        <option
                                            value="{{$containers->container_number}}">{{$containers->container_number.' ('.$containers->name.')'}}</option>
                                    @endforeach
                                </select></div>
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
            <div class="clearfix"></div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-dark">
                                        <th>Sl.</th>
                                        <th>Driver</th>
                                        <th>Driver id</th>
                                        <th>Container</th>
                                        <th>Container Number</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1 @endphp
                                    @foreach($data as $datas)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{get_driver_by_code($datas->driver_id)->first_name}}</td>
                                            <td>{{$datas->driver_id}}</td>
                                            <td>{{get_container_by_code($datas->container_code)->name}}</td>
                                            <td>{{$datas->container_code}}</td>
                                            <td>{{$datas->code}}</td>
                                            <td> <button
                                                    href="{{route('AdminContainerDriverDelete','delete='.base64_encode($datas->id))}}"
                                                    class="btn btn-success delete" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button></td>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{asset('assets/vendors/typeahead/typeahead.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{asset('assets/vendors/tagsinput/tagsinput.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendors/tagsinput/tagsinput.css')}}"/>


    <script src="{{asset('assets/vendors/sweetalert/sweetalert.js')}}"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).on('click', '.Change', function () {
            let id = $(this).attr('id'), action;
            let clases = $(this);
            if ($(this).hasClass("btn-success")) {
                action = 'inactive';
                $.ajax({
                    url: '{{route('AdminContainerChange')}}',
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
                    url: '{{route('AdminContainerChange')}}',
                    type: 'post',
                    data: {_token: CSRF_TOKEN, id: id, action: action},
                    success: function (response) {
                        $(clases).toggleClass('btn-info btn-success');
                        $(clases).html('Active');
                    }
                });

            }
        });

        $(document).ready(function () {


            $(document).on('click', '.edit-country', function () {
                $('#myModal').modal('show');
                $('.modal-header').html('Country Information Update');
                $("#upload_form").trigger("reset");
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('AdminCountrySingleGet') }}",
                    type: 'get',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#country_id').val(data.id);
                        $('#code').val(data.code);
                        $('#currency').val(data.currency);
                        $('#name').val(data.name);
                        $('#code3').val(data.code3);
                        $('#isoCode').val(data.isoCode);
                        $('#numericCode').val(data.numericCode);
                        $('#geonamesCode').val(data.geonamesCode);
                        $('#fipsCode').val(data.fipsCode);
                        $('#area').val(data.area);
                        $('#mobileFormat').val(data.mobileFormat);
                        $('#phonePrefix').val(data.phonePrefix);
                        $('#landlineFormat').val(data.landlineFormat);
                        $('#trunkPrefix').val(data.trunkPrefix);
                        $('#population').val(data.population);
                        $('#continent').val(data.continent);
                        $('#language').val(data.language);
                    }
                });
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
        });


    </script>
@endpush
