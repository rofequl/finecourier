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
                    <h3>Admin country manage</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Add New Zone country
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
                                  action="{{ route('AdminCountryManageUpdate') }}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input name="id" value="{{$oneData}}" type="hidden">
                                <span class="section">World Zone Country Update</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">World zone
                                        name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                              value="{{get_zone_name_by_id($oneData)->name}}" type="text" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">World zone
                                        name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single" name="country[]" multiple="multiple">
                                            <option></option>
                                            @foreach($earth as $earths)
                                                @if(!country_has_zone($earths['code'],$oneData))
                                                    <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                @else
                                                    <option value="{{$earths['code']}}" selected>{{$earths['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
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
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $datas)

                                    <tr>
                                        <th scope="row">{{$datas->world_zone_id}}</th>
                                        <td>{{get_zone_name_by_id($datas->world_zone_id)->name}}</td>
                                        <td>
                                            @foreach(get_country_by_zone($datas->world_zone_id) as $country)
                                                {{get_country_name_by_code($country->country)->name}},
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('AdminCountryManage',$datas->world_zone_id)}}" style="margin: 0 2px"
                                               data-toggle="tooltip" class="btn btn-success"
                                               data-placement="top" title=""
                                               data-original-title="Edit"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            <a href="{{route('AdminCountryManageDelete','delete='.$datas->world_zone_id)}}"
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
                <form method="post" action="{{route('AdminCountryManageAdd')}}">
                    <div class="modal-body">

                        <div class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                                <select class="form-control" name="zone_id">
                                    <option value="">Choose option</option>
                                    @foreach($zone as $zones)
                                        @if(!get_country_by_zone($zones->id))
                                            <option value="{{$zones->id}}">{{$zones->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="select2_single" name="country[]" multiple="multiple">
                                    <option></option>
                                    @foreach($earth as $earths)
                                        @if(!country_has_zone($earths['code']))
                                            <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
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