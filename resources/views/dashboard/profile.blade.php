@extends('dashboard.layout.app')
@section('pageTitle',$user->first_name.' Profile')
@section('content')

    <div class="app-page-title main-card card" style="border-radius: 0;background-color: #fff">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon" style="width: 87px;height: 87px;padding: 0px">
                    <img src="{{$user->image==null? asset('images/user.png'):asset('storage/user/'.$user->image)}}" id="previewLogo" width="100%" height="100%" class="border p-1">
                </div>
                <div>{{$user->first_name.' '.$user->last_name}}
                    <div class="page-title-subheading">{{$user->email}}
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <button type="button" onclick="location.href='{{route('ProfileEdit')}}';" class="btn-shadow btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <table class="mb-0 table table-hover">
                        <tbody>
                        <tr>
                            <td style="width: 60%">Name:</td>
                            <td>{{$user->first_name.' '.$user->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>phone:</td>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <td>Country:</td>
                            <td>{{get_country_name_by_code($user->country)->name}}</td>
                        </tr>
                        <tr>
                            <td>Post Code:</td>
                            <td>{{$user->post_code}}</td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td>{{get_state_name_by_code($user->country,$user->division)->name}}</td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td>{{get_city_name_by_code($user->country,$user->division,$user->city)->name}}</td>
                        </tr>
                        <tr>
                            <td>Place Name:</td>
                            <td>{{$user->placeName}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Address Book</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{$total_address}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Shipment</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{$total_shipment}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Shipment Delivered</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">{{$total_delivered}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
