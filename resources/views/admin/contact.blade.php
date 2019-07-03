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
                    <h3>Contact Information</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            Add New Contact
                        </button>
                    </div>
                </div>
            </div>
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

                @foreach($contact as $contacts)

                    <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>
                                    <small>{{$contacts->contact_title}}</small>
                                </h3>
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
                                                                   href="{{route('AdminContactDelete','delete='.$contacts->id)}}"><i
                                                        class="fa fa-trash"></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                {!!$contacts->contact_information!!}
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
                    <h4 class="modal-title">Add New Contact</h4>
                </div>
                <form method="post" action="{{route('AdminContactAdd')}}">
                    <div class="modal-body">

                        <div class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="first-name2" required="required" name="contact_title"
                                       class="form-control col-md-7 col-xs-12" placeholder="Contact title">
                            </div>
                            <textarea id="editor1" name="contact_information" placeholder="Contact Information">Contact Information</textarea>
                            <script>
                                CKEDITOR.replace('editor1');
                            </script>
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