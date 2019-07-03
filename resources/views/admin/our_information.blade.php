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
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" novalidate=""
                                          action="{{ route('OurInformationAdd') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <span class="section">About us Information</span>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mission
                                                Title</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2"
                                                       name="mission_title"
                                                       value="{{$data->mission_title}}"
                                                       placeholder="Title Mission" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Mission
                                                Description</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="textarea" name="mission" rows="5"
                                                          class="form-control col-md-7 col-xs-12">{{$data->mission}}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Vision
                                                Title</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2"
                                                       name="vision_title"
                                                       value="{{$data->vision_title}}"
                                                       placeholder="Title Vision" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Vision
                                                Description</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="textarea" name="vision" rows="5"
                                                          class="form-control col-md-7 col-xs-12">{{$data->vision}}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Who
                                                we are</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="textarea" name="who_we_are" rows="5"
                                                          class="form-control col-md-7 col-xs-12">{{$data->who_we_are}}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">About us
                                                image</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div onclick="chooseFile()" id="previewImage">
                                                    <div class="mt-5">
                                                        <i class="fa fa-cloud-upload fa-3x"></i><br>
                                                        Add a about us image
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
                                        <h2>Mission</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a data-toggle="collapse" data-target=".multi-collapse"
                                                   aria-expanded="false"
                                                   aria-controls="multiCollapseExample1 multiCollapseExample2"><i
                                                            class="fa fa-edit"></i> Edit</a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <h4>{{$data->mission_title}}</h4>
                                        <p>{{$data->mission}}</p>
                                    </div>
                                </div>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Vision</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <h4>{{$data->vision_title}}</h4>
                                        <p>{{$data->vision}}</p>
                                    </div>
                                </div>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Who we are</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <p>{{$data->who_we_are}}</p>
                                    </div>
                                </div>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>About us image</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <p><img src="{{asset('storage/our_information/'.$data->image)}}" width="100%"></p>
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