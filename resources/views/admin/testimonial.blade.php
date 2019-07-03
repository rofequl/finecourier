@extends('admin.layout.app')
@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
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
                    <h3>Testimonials Information</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Add New Testimonials
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

                @foreach($contact as $contacts)

                    <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                            <div class="pull-left">
                                @if($contacts->status == 0)
                                    <a href="{{route('AdminTestimonialStatus','show='.$contacts->id)}}"
                                       class="label label-default">Inactive</a>
                                @else
                                    <a href="{{route('AdminTestimonialStatus','hide='.$contacts->id)}}"
                                       class="label label-primary">Active</a>
                                @endif
                            </div>
                            <div role="presentation" class="dropdown pull-right">
                                <a id="drop4" href="#" data-toggle="dropdown" aria-haspopup="true" role="button"
                                   aria-expanded="false">
                                    <i class="fa fa-reorder"></i>
                                </a>
                                <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                               href="https://twitter.com/fat"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                    </li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" class="delete"
                                                               href="{{route('AdminTestimonialDelete','delete='.$contacts->id)}}"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="x_content">
                                <div class="flex">
                                    <div>
                                        <img src="{{asset('storage/testimonial/'.$contacts->image)}}" alt="..."
                                             class="img-circle profile_img img-responsive center-block">
                                    </div>
                                </div>
                                <h3 class="text-center">{{$contacts->name}}</h3>
                                <h4 class="text-center">{{$contacts->profession}}</h4>
                                <hr>
                                <p class="text-justify">{{str_limit($contacts->message,120)}}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
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
                    <h4 class="modal-title">Add New Testimonials</h4>
                </div>
                <form method="post" action="{{route('AdminTestimonialAdd')}}" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-horizontal form-label-left input_mask">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div onclick="chooseFile()" id="previewImage">
                                        <div class="mt-5">
                                            <i class="fa fa-cloud-upload fa-3x"></i><br>
                                            Add a public image
                                        </div>
                                    </div>
                                    <input type="file" name="image" class="ImageUpload hidden">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Profession</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="profession" class="form-control" placeholder="Profession">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Message</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="message" rows="3"
                                              placeholder="Message"></textarea>
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