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
                    <h3>News</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <a data-toggle="collapse" data-target=".multi-collapse"
                           aria-expanded="false" class="btn btn-primary btn-sm"
                           aria-controls="multiCollapseExample1 multiCollapseExample2"><i
                                    class="fa fa-plus"></i> Add New Slide</a>
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
                                  action="{{ route('OurServiceUpdate') }}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$oneData->id}}" name="id">
                                <span class="section">Add Our Service</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Service
                                        Title</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="title" value="{{$oneData->title}}"
                                               placeholder="Service Title" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">Service
                                        Information</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="textarea" name="description"
                                                  class="form-control col-md-7 col-xs-12">{{$oneData->description}}</textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider
                                        Image</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div onclick="chooseFile()" id="previewImage">
                                            <div class="mt-5">
                                                <i class="fa fa-cloud-upload fa-3x"></i><br>
                                                Add a Service Image
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
                                          action="{{ route('AdminNewsAdd') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <span class="section">Add News</span>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">News
                                                Writer Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2"
                                                       name="name"
                                                       placeholder="News Writer" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">News
                                                Title</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2"
                                                       name="title"
                                                       placeholder="News Title" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">News
                                                Information</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="textarea" name="description"
                                                          class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">News Tags</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="tags_1" type="text" class="tags form-control" value="" name="tag"/>
                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">News
                                                Image</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div onclick="chooseFile()" id="previewImage">
                                                    <div class="mt-5">
                                                        <i class="fa fa-cloud-upload fa-3x"></i><br>
                                                        Add a News Image
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
                            @foreach($data as $datas)

                                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                                    <div class="x_panel fixed_height_390">
                                        <div class="pull-left">
                                            @if($datas->status == 0)
                                                <a href="{{route('AdminNewsStatus','show='.$datas->id)}}"
                                                   class="label label-default">Inactive</a>
                                            @else
                                                <a href="{{route('AdminNewsStatus','hide='.$datas->id)}}"
                                                   class="label label-primary">Active</a>
                                            @endif
                                        </div>
                                        <div role="presentation" class="dropdown pull-right">
                                            <a id="drop4" href="#" data-toggle="dropdown" aria-haspopup="true"
                                               role="button"
                                               aria-expanded="false">
                                                <i class="fa fa-reorder"></i>
                                            </a>
                                            <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                           href="https://twitter.com/fat"><i
                                                                class="fa fa-edit"></i> Edit</a>
                                                </li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" class="delete"
                                                                           href="{{route('AdminTestimonialDelete','delete='.$datas->id)}}"><i
                                                                class="fa fa-trash"></i> Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="x_content">
                                            <div class="flex">
                                                <div>
                                                    <img src="{{asset('storage/news/'.$datas->image)}}" alt="..."
                                                         class="img-circle profile_img img-responsive center-block">
                                                </div>
                                            </div>
                                            <br>
                                            <ul class="list-inline">
                                                <li><a href="#"><span class="fa fa-user"></span> {{$datas->name}}</a>
                                                </li>
                                                <li><a href="#"><span class="fa fa-heart-o"></span> {{$datas->like}}</a>
                                                </li>
                                            </ul>
                                            <h4 class="">{{$datas->title}}</h4>
                                            <hr>
                                            <p class="text-justify">{{str_limit($datas->description,120)}}</p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
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