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
            <div class="clearfix"></div>
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
                              action="{{ route('SliderManageUpdate') }}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$oneData->id}}" name="id">
                            <span class="section">Update Slider</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider
                                    Title One</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="6" data-validate-words="2"
                                           name="slider_title_one" value="{{$oneData->slider_title_one}}"
                                           placeholder="Slider Title One" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">Slider
                                    Title Two</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name2" class="form-control col-md-7 col-xs-12"
                                           data-validate-length-range="6" data-validate-words="2"
                                           name="slider_title_two" value="{{$oneData->slider_title_two}}"
                                           placeholder="Slider Title Two" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider
                                    Image</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div onclick="chooseFile()" id="previewImage">
                                        <div class="mt-5">
                                            <i class="fa fa-cloud-upload fa-3x"></i><br>
                                            Add a Slider Image
                                        </div>
                                    </div>
                                    <input type="file" name="image" class="ImageUpload hidden">
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
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" novalidate=""
                                          action="{{ route('SliderManageAdd') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <span class="section">Add New Slider</span>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider
                                                Title One</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2"
                                                       name="slider_title_one"
                                                       placeholder="Slider Title One" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">Slider
                                                Title Two</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name2" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2"
                                                       name="slider_title_two"
                                                       placeholder="Slider Title Two" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider
                                                Image</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div onclick="chooseFile()" id="previewImage">
                                                    <div class="mt-5">
                                                        <i class="fa fa-cloud-upload fa-3x"></i><br>
                                                        Add a Slider Image
                                                    </div>
                                                </div>
                                                <input type="file" name="image" class="ImageUpload hidden">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary" data-toggle="collapse"
                                                        data-target=".multi-collapse"
                                                        aria-expanded="false"
                                                        aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    Cancel
                                                </button>
                                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapseExample2">
                        <div class="row">
                            <div class="col-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Slide Manage</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a data-toggle="collapse" data-target=".multi-collapse"
                                                   aria-expanded="false"
                                                   aria-controls="multiCollapseExample1 multiCollapseExample2"><i
                                                            class="fa fa-plus"></i> Add New Slide</a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <table class="table table-bordered bulk_action">
                                            <thead>
                                            <tr class="bg-dark">
                                                <th>#</th>
                                                <th>Slider Title One</th>
                                                <th>Slider Title Two</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $datas)

                                                <tr>
                                                    <th scope="row">{{$datas->id}}</th>
                                                    <td>{{$datas->slider_title_one}}</td>
                                                    <td>{{$datas->slider_title_two}}</td>
                                                    <td><img src="{{asset('storage/slider/'.$datas->image)}}"
                                                             width="100px"></td>
                                                    <td>
                                                        @if($datas->status == 0)
                                                            <a href="{{route('SliderManageStatus','show='.$datas->id)}}"
                                                               type="button" class="btn btn-sm btn-success"
                                                               data-toggle="tooltip" data-placement="top" title=""
                                                               data-original-title="Click Show your Slider">Inactive
                                                            </a>
                                                        @else
                                                            <a href="{{route('SliderManageStatus','hide='.$datas->id)}}"
                                                               type="button" class="btn btn-sm btn-primary"
                                                               data-toggle="tooltip" data-placement="top" title=""
                                                               data-original-title="Click Hide your Slider">Active
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('SliderManage',$datas->id)}}" style="margin: 0 2px" data-toggle="tooltip"
                                                           data-placement="top" title=""
                                                           data-original-title="Edit"><i
                                                                    class="fa fa-edit fa-2x"></i></a>
                                                        <a href="{{route('SliderManageDelete','delete='.$datas->id)}}" style="margin: 0 2px" data-toggle="tooltip"
                                                           data-placement="top" title=""
                                                           data-original-title="Delete" class="delete"><i
                                                                    class="fa fa-trash fa-2x"></i></a>
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
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
@endpush

@push('scripts')
    <!-- validator -->
    <script src="{{asset('assets/vendors/validator/validator.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        function chooseFile() {
            $(".ImageUpload").click();
        }

        $(function () {
            $(".ImageUpload").change(function () {
                let file = this.files[0];
                let imagefile = file.type;
                let match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    alert("only jpeg, jpg and png Images type allowed");
                    return false;
                } else {
                    $('#previewImage').html('<img src="" class="img-thumbnail h-100 mx-auto" id="previewLogo">');
                    let reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $('#previewLogo').attr('src', e.target.result);
        }

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