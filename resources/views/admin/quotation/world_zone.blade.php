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
                    <h3>World Zone</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Add New Zone
                        </button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div><hr>
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
                                  action="{{ route('AdminWorldZoneUpdate') }}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$oneData->id}}" name="id">
                                <span class="section">World Zone</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">World zone name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="name" value="{{$oneData->name}}"
                                               type="text">
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

                            <table class="table table-bordered bulk_action">
                                <thead>
                                <tr class="bg-dark">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $datas)

                                    <tr>
                                        <th scope="row">{{$datas->id}}</th>
                                        <td>{{$datas->name}}</td>
                                        <td>
                                            <a href="{{route('AdminWorldZone',$datas->id)}}" style="margin: 0 2px"
                                               data-toggle="tooltip" class="btn btn-success"
                                               data-placement="top" title=""
                                               data-original-title="Edit"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            <a href="{{route('AdminWorldZoneDelete','delete='.$datas->id)}}"
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
                    <h4 class="modal-title">Add New World Zone</h4>
                </div>
                <form method="post" action="{{route('AdminWorldZoneAdd')}}">
                    <div class="modal-body">

                        <div class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="first-name2" required="required" name="name"
                                       class="form-control col-md-7 col-xs-12" placeholder="World Zone Name">
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