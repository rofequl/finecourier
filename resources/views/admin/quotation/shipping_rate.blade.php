@extends('admin.layout.app')
@section('content')

    <style>
        #previewImage {
            width: 100px;
            height: 100px;
            border: 1px dotted gray;
            text-align: center;
            cursor: pointer;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Country Shipping Rate</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Add New Country Rate
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
                                  action="{{ route('AdminShippingRateUpdate') }}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input name="id" value="{{$oneData->id}}" type="hidden">
                                <span class="section">World Zone Rate Update</span>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">From Cuntry</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single" name="from_country">
                                            <option value="">Choose option</option>
                                            @foreach($earth as $earths)
                                                @if($earths['code']== $oneData->from_country)
                                                    <option value="{{$earths['code']}}" selected>{{$earths['name']}}</option>
                                                @else
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">To Country</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single" name="to_country">
                                            <option value="">Choose option</option>
                                            @foreach($earth as $earths)
                                                @if($earths['code']== $oneData->to_country)
                                                    <option value="{{$earths['code']}}" selected>{{$earths['name']}}</option>
                                                @else
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" class="form-control" name="price" placeholder="Price USD" value="{{$oneData->price}}">
                                    </div>
                                </div>
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

                            <table class="table table-bordered bulk_action">
                                <thead>
                                <tr class="bg-dark">
                                    <th>#</th>
                                    <th>From Country Name</th>
                                    <th>To Country Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $datas)

                                    <tr>
                                        <th scope="row">{{$datas->id}}</th>
                                        <td>{{get_country_name_by_code($datas->from_country)->name}}</td>
                                        <td>{{get_country_name_by_code($datas->to_country)->name}}</td>
                                        <td>{{$datas->price}} $</td>
                                        <td>
                                            <a href="{{route('AdminShippingRate',$datas->id)}}" style="margin: 0 2px"
                                               data-toggle="tooltip" class="btn btn-success"
                                               data-placement="top" title=""
                                               data-original-title="Edit"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            <a href="{{route('AdminShippingRateDelete','delete='.$datas->id)}}"
                                               style="margin: 0 2px" data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="Delete" class="btn btn-danger delete"><i
                                                        class="fa fa-trash"></i> Delete</a>
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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add World Zone Country</h4>
                </div>
                <form method="post" action="{{route('AdminShippingRateAdd')}}">
                    <div class="modal-body">

                        <div class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">From Cuntry</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single" name="from_country">
                                        <option value="">Choose option</option>
                                        @foreach($earth as $earths)
                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">To Country</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single" name="to_country">
                                        <option value="">Choose option</option>
                                        @foreach($earth as $earths)
                                            <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" class="form-control" name="price" placeholder="Price USD">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
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