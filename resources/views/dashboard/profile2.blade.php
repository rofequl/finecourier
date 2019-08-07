@extends('dashboard.layout.app')
@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-user text-success">
                    </i>
                </div>
                <div>Hello {{$user->first_name}} {{$user->last_name}}
                    <div class="page-title-subheading">You can update your profile here
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <button type="button" onclick="location.href='{{route('profile')}}';" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-hand-o-left" aria-hidden="true"></i></span>
                        Back Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
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
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post" action="{{route('ProfileUpdate')}}"  enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-3 col-12" onclick="chooseFile()" style="cursor: pointer">
                                <img src="{{$user->image==null? asset('images/user.png'):asset('storage/user/'.$user->image)}}" id="previewLogo" width="100%" class="border p-1">
                            </div>
                        </div>
                        <input type="file" name="image" class="ImageUpload d-none">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleEmail11" class="">First
                                        Name</label><input name="first_name" id="exampleEmail11"
                                                           value="{{$user->first_name}}" type="text"
                                                           class="form-control"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="examplePassword11" class="">Last
                                        Name</label><input name="last_name" id="examplePassword11"
                                                           value="{{$user->last_name}}" type="text"
                                                           class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleEmail11"
                                                                                 class="">Phone</label><input
                                            name="phone" id="exampleEmail11" value="{{$user->phone}}" type="text"
                                            class="form-control"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class="">Country</label>
                                    <select class="form-control" id="CountryId" name="country">
                                        <option value="">Select Country</option>
                                        @foreach($earth as $earths)
                                            @if($earths['code'] == $user->country)
                                                <option value="{{$earths['code']}}"
                                                        selected>{{$earths['name']}}</option>
                                            @else
                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="exampleCity" class="">City</label>
                                    <select class="form-control" id="FromState" name="division">
                                        <option value="">Select Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="exampleState" class="">State</label>
                                    <select class="form-control" id="FromCity" name="city">
                                        <option value="">Select Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label>
                                    <input name="post_code" id="exampleZip" value="{{$user->post_code}}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('profile')}}" class="mt-2 btn btn-primary float-right mx-3">Cancel</a>
                        <button class="mt-2 btn btn-primary float-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        profileManage();
        function profileManage() {
            let country = $('#CountryId').val();
            let id = {{$user->division}};
            $.ajax({
                url: "{{ route('SelectState') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: country},
                dataType: 'json',
                success: function (data) {
                    $('#FromState').html('');
                    data.forEach(function (element) {
                        $('#FromState').append($('<option>', {value: element.code, text: element.name}));
                        $('#FromState').val(id);
                    });
                }
            });

            $.ajax({
                url: "{{ route('SelectCity') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id, country: country},
                dataType: 'json',
                success: function (data) {
                    $('#FromCity').html('');
                    data.forEach(function (element) {
                        $('#FromCity').append($('<option>', {value: element.code, text: element.name}));
                        $('#FromCity').val({{$user->city}});
                    });
                }
            });

        }

        $('#CountryId').change(function () {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectState') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                    $('#FromState').html('');
                    data.forEach(function (element) {
                        $('#FromState').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

        $('#FromState').change(function () {
            let country = $('#CountryId').val();
            let id = $(this).val();
            $.ajax({
                url: "{{ route('SelectCity') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id, country: country},
                dataType: 'json',
                success: function (data) {
                    $('#FromCity').html('');
                    data.forEach(function (element) {
                        $('#FromCity').append($('<option>', {value: element.code, text: element.name}));
                    });
                }
            });
        });

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



    </script>

@endpush
