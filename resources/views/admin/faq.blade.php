
@extends('admin.layout.app')
@section('content')


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
                                  action="{{ route('AdminFaqUpdate') }}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$oneData->id}}" name="id">
                                <span class="section">Add FAQ</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">FAQ Message</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-6 col-sm-6 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2"
                                               name="message" value="{{$oneData->message}}"
                                               placeholder="FAQ Title" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="textarea" name="description" class="form-control col-md-7 col-xs-12"
                                          rows="3">{{$oneData->description}}</textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{route('faq')}}" type="reset" class="btn btn-primary">
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
                    <div class="collapse multi-collapse show" id="multiCollapseExample2">
                        <div class="row">
                            <div class="col-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>FAQ Manage</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <table class="table table-bordered bulk_action">
                                            <thead>
                                            <tr class="bg-dark">
                                                <th>#</th>
                                                <th>FAQ Question</th>
                                                <th>FAQ Description </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $datas)
                                                    <tr>
                                                        <th scope="row">{{$datas->id}}</th>
                                                        <td>{{$datas->message}}</td>
                                                        <td>{{str_limit($datas->description,80)}}</td>
                                                        <td>
                                                            @if($datas->status==0)
                                                                <a href="{{route('faqStatus','show='.$datas->id)}}" type="button"
                                                                   class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                                                                data-original-title="Click to show this FAQ">
                                                                    Inactive
                                                                </a>
                                                                @else
                                                                <a href="{{route('faqStatus','hide='.$datas->id)}}" type="button" class="btn btn-sm btn-primary"
                                                                data-placement="top" data-toggle="tooltip" data-original-title="Click to hide this FAQ">
                                                                    Active
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('AdminFaq',$datas->id)}}" style="margin:0 2px;" data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Edit"><i class="fa fa-edit fa-2x"></i></a>
                                                            <a href="{{route('faqDelete','delete='.$datas->id)}}" data-toggle="tooltip" data-placement="top" style="margin:0 2px;"
                                                               data-orginal-title="Delete" class="delete" > <i class="fa fa-trash fa-2x"></i></a>
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