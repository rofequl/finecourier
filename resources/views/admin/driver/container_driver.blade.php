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
                        <form id="upload_form" method="post" class="form-horizontal form-label-left input_mask">
                            {{csrf_field()}}
                            <input type="hidden" value="" name="id" id="country_id">
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="name">Driver id:</label>
                                <input type="text" class="form-control" placeholder="Enter driver id" name="driver_id" id="name">
                            </div>
                            <div class="col-xs-12 form-group has-feedback">
                                <label for="tracking">Container Code:</label>
                                <input type="text" name="container_code" id="tracking_code" class="form-control" autocomplete="off"/>
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-dark">
                                        <th>Code</th>
                                        <th>Driver</th>
                                        <th>Container Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

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
                            <h4 class="modal-head"></h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="upload_form" method="post" class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <input type="hidden" value="" name="id" id="country_id">
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Container Name" name="name" id="name">
                                </div>
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="tracking">Tracking Code:</label>
                                    <input type="text" name="tracking_code" id="tracking_code" class="form-control" autocomplete="off"/>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{asset('assets/vendors/tagsinput/tagsinput.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/vendors/tagsinput/tagsinput.css')}}" />


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
            $(function () {
                table.ajax.reload();
            });
            let table = $('.table').DataTable({
                processing: true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                },

                serverSide: true,
                ajax: "{{route('AdminContainerDriverGet')}}",
                order: [ [0, 'desc'] ],
                columns: [
                    {data: 'code'},
                    {data: 'driver_id'},
                    {data: 'container_code'},
                    {data: 'status'},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });

            $(document).on('click', '.add-country', function () {
                $('#myModal').modal('show');
                $('.modal-head').html('Container Information Add');
                $('#country_id').val('');
                $("#upload_form").trigger("reset");
            });
            $('#tracking_code').tagsInput();
            $('#tracking_code_tag').attr('autocomplete', 'off').typeahead({
                source: function(query, result) {
                    $.ajax({
                        url: "{{route('AdminContainerContainerCode')}}",
                        method: "POST",
                        data: {_token: CSRF_TOKEN, id: query},
                        dataType: "json",
                        success: function (data) {
                            result($.map(data, function (item) {
                                return item;
                            }));
                        }
                    })
                }
            });

            $('#upload_form').on('submit', function () {
                event.preventDefault();
                let form = new FormData(this);
                swal({
                    title: "Are you sure want to add Container?",
                    text: "If all information is correct, press ok.",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    setTimeout(function () {
                        $.ajax({
                            url: "{{ route('AdminContainerDriverAdd') }}",
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
                                if (data == 1){
                                    swal("Container add successfully");
                                    $("#upload_form").trigger("reset");
                                    $('#myModal').modal('hide');
                                    table.ajax.reload();
                                } else{
                                    swal("Something wrong, please try again later!");
                                    $("#upload_form").trigger("reset");
                                    $('#myModal').modal('hide');
                                }
                            }
                        })
                    }, 2000);
                });
            });

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

            $(document).on('click', '.delete', function () {
                let id = $(this).attr('id');
                let classes = $(this);
                swal({
                    title: "Are you sure want to delete container?",
                    text: "If you click 'OK' country will be remove.",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    setTimeout(function () {
                        $.ajax({
                            url: "{{ route('AdminContainerDelete') }}",
                            type: 'get',
                            data: {id: id},
                            dataType: 'json',
                            success: function (data) {
                                if (data == '1') {
                                    swal({
                                        title: "Deleted",
                                        text: 'Container was deleted',
                                        type: 'success',
                                        confirmButtonText: 'Ok'
                                    });
                                    $(classes).closest('tr').remove();
                                } else {
                                    swal({
                                        title: "Something wrong",
                                        text: 'Please try again later.',
                                        type: 'error',
                                        confirmButtonText: 'Ok'
                                    });
                                }
                            }
                        });
                    }, 2000);
                });
            });
        });



    </script>
@endpush
