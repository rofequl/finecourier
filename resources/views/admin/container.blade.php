@extends('admin.layout.app')
@section('pageTitle','Container Manage')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Container Manage</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-4 col-sm-4 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm add-country">
                            <i class="fa fa-plus fs-13 m-r-3"></i> Add New Container
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-dark">
                                        <th>Serial Number</th>
                                        <th>Container Number</th>
                                        <th>Container Name</th>
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
                            <form id="upload_form" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <input type="hidden" value="" name="id" id="country_id">
                                <div class="col-xs-12 form-group">
                                    <label for="container_number">Container Number:</label>
                                    <input type="text" placeholder="Please enter Container number" name="container_number" id="container_number" class="form-control"/>
                                </div>
                                <div class="col-xs-12 form-group has-feedback">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Container Name" name="name" id="name">
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
            let serialid = 1;
            let table = $('.table').DataTable({
                processing: true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                },
                serverSide: true,
                ajax: "{{route('AdminContainerGet')}}",
                order: [ [0, 'asc'] ],
                columns: [
                    {data: 'rownum'},
                    {data: 'container_number'},
                    {data: 'name'},
                    {data: 'status'},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });

            $(document).on('click', '.add-country', function () {
                $('#myModal').modal('show');
                $('.modal-head').html('Add New Container');
                $('#country_id').val('');
                $("#upload_form").trigger("reset");
            });

            $('#upload_form').on('submit', function () {
                event.preventDefault();
                let form = new FormData(this);
                let id = $('#country_id').val();
                if (id==''){
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
                                url: "{{ route('AdminContainerAdd') }}",
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
                }else {
                    swal({
                        title: "Are you sure want to update Container?",
                        text: "If all information is correct, press ok.",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function () {
                        setTimeout(function () {
                            $.ajax({
                                url: "{{ route('AdminContainerAdd') }}",
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
                                        swal("Container update successfully");
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
                }

            });

            $(document).on('click', '.edit-country', function () {
                $('#myModal').modal('show');
                $('.modal-head').html('Container Information Update');
                $("#upload_form").trigger("reset");
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('AdminContainerSingleGet') }}",
                    type: 'get',
                    data: {id: id},
                    dataType: 'json',
                    success: function (data) {
                        $('#country_id').val(data.id);
                        $('#container_number').val(data.container_number);
                        $('#name').val(data.name);
                    }
                });
            });

            $(document).on('click', '.delete', function () {
                let id = $(this).attr('id');
                let classes = $(this);
                swal({
                    title: "Are you sure want to delete container?",
                    text: "If you click 'OK' container will be remove.",
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
