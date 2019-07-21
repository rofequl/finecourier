@extends('dashboard.layout.app')
@section('content')

    <style>
        .phonediv > div {
            display: block;
        }
    </style>

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                </div>
                <div>Address Book
                    <div class="page-title-subheading">Manage your contact information
                    </div>
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
            <div class="main-card mb-3 card card-body">
                <div class="input-group"><input type="text" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-success">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Search
                        </button>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary my-4"
                            data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        New Contact
                    </button>
                </div>
            </div>


            <div class="collapse" id="collapseExample123" style="">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="{{route('AddressAdd')}}">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Name*</label>
                                        <input name="name" id="name"
                                                                type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="company" class="">Company*
                                        </label><input name="company" id="company"
                                                       type="text" class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="CountryId" class="">Country*</label>
                                        <select class="form-control" id="CountryId" name="country">
                                            <option value="">Select Country</option>
                                            @foreach($earth as $earths)
                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="post_code"
                                                                                     class="">Post code*</label><input
                                                name="post_code" id="post_code" type="text"
                                                class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="FromState" class="">City*</label>
                                        <select class="form-control" id="FromState" name="state">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="FromCity" class="">State*</label>
                                        <select class="form-control" id="FromCity" name="city">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group phonediv"><label for="phone"
                                                                                              class="">
                                            Phone*</label><input name="phone_one" id="phone"
                                                                 type="tel" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group phonediv"><label for="phone2"
                                                                                              class="">
                                            Phone
                                        </label><input name="phone_two" id="phone2"
                                                       type="text" class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="address_one" class="">
                                            Address line 1*</label><input name="address_one" id="address_one"
                                                                          type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="address_two" class="">
                                            Address line 2
                                        </label><input name="address_two" id="address_two"
                                                       type="text" class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="email" class="">
                                            Email*</label><input name="email" id="email"
                                                                 type="email" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="email" class="">
                                            Address type*</label>
                                        <select class="form-control" id="" name="state">
                                            <option value="">Select Type</option>
                                            <option value="">Shipping Address</option>
                                            <option value="">Receiver Address</option>
                                            <option value="">Billing Address</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="mt-2 btn btn-primary float-right" type="submit">Save</button>
                            <button class="mt-2 btn btn-primary float-right mx-3 collapsed" type="button"
                                    data-toggle="collapse" href="#collapseExample123" aria-expanded="false">Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div id="accordion" class="accordion-wrapper mb-3">
                        @foreach($address as $addresses)
                            <div class="card">
                                <div id="headingOne" class="card-header">
                                    <div class="w-100 row">
                                        <div class="col">
                                            <h5>{{$addresses->name}}</h5>
                                            <p style="color: #48505791;font-size: 13px" class="mb-0">
                                                ({{$addresses->post_code}}) -
                                                {{$addresses->address_one}}
                                            </p>
                                        </div>
                                        <div class="col-2 d-inline-block">
                                            <button type="button" data-toggle="collapse" data-target="#collapse{{$addresses->id}}"
                                                    aria-expanded="false" aria-controls="collapseOne"
                                                    class="btn btn-sm btn-primary collapsed mb-3 w-100">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit
                                            </button>
                                            <a href="{{route('AddressDelete','delete='.$addresses->id)}}" class="btn btn-sm btn-danger w-100 delete text-capitalize">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                Delete</a>
                                        </div>
                                    </div>

                                </div>
                                <div data-parent="#accordion" id="collapse{{$addresses->id}}" aria-labelledby="headingOne"
                                     class="collapse" style="">
                                    <div class="card-body py-4">
                                        <form method="post" action="{{route('AddressUpdate')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$addresses->id}}">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="name" class="">Name*</label>
                                                        <input name="name" id="name" value="{{$addresses->name}}"
                                                               type="text" class="form-control"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="company" class="">Company*
                                                        </label><input name="company" id="company" value="{{$addresses->company}}"
                                                                       type="text" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="CountryId" class="">Country*</label>
                                                        <select class="form-control country" id="{{$addresses->id}}" name="country">
                                                            <option value="">Select Country</option>
                                                            @foreach($earth as $earths)
                                                                <option value="{{$earths['code']}}">{{$earths['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="post_code"
                                                                                                     class="">Post code*</label><input
                                                                name="post_code" id="post_code" type="text" value="{{$addresses->post_code}}"
                                                                class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="FromState{{$addresses->id}}" class="">City*</label>
                                                        <select class="form-control" id="FromState{{$addresses->id}}" name="state">
                                                            <option value="">Select State</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="FromCity{{$addresses->id}}" class="">State*</label>
                                                        <select class="form-control" id="FromCity{{$addresses->id}}" name="city">
                                                            <option value="">Select City</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group phonediv"><label for="phone"
                                                                                                              class="">
                                                            Phone*</label><input name="phone_one" id="phone" value="{{$addresses->phone_one}}"
                                                                                 type="tel" class="form-control"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group phonediv"><label for="phone2"
                                                                                                              class="">
                                                            Phone
                                                        </label><input name="phone_two" id="phone2" value="{{$addresses->phone_two}}"
                                                                       type="text" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="address_one" class="">
                                                            Address line 1*</label><input name="address_one" id="address_one"
                                                                                          value="{{$addresses->address_one}}"                        type="text" class="form-control"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="address_two" class="">
                                                            Address line 2
                                                        </label><input name="address_two" id="address_two"  value="{{$addresses->address_two}}"
                                                                       type="text" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="email" class="">
                                                            Email*</label><input name="email" id="email" value="{{$addresses->email}}"
                                                                                 type="email" class="form-control"></div>
                                                </div>
                                            </div>
                                            <button class="mt-2 mb-5 btn btn-success float-right" type="submit">Update</button>
                                            <button class="mt-2 mb-5 btn btn-secondary float-right mx-3 collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{$addresses->id}}"
                                                    aria-expanded="false" aria-controls="collapseOne">Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="w-100">
                        <div class="d-table mx-auto">
                            {{ $address->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('assets/vendors/phone/css/intlTelInput.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
@endpush

@push('scripts')
    <script src="{{asset('assets/vendors/phone/js/prism.js')}}"></script>
    <script src="{{asset('assets/vendors/phone/js/intlTelInput-jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.delete').click(function (e) {
            e.preventDefault(); // Prevent the href from redirecting directly
            var linkURL = $(this).attr("href");
            warnBeforeRedirect(linkURL);
        });

        function warnBeforeRedirect(linkURL) {
            swal({
                title: "Sure want to remove?",
                text: "If you click 'OK' address will be remove",
                type: "warning",
                showCancelButton: true
            }, function () { // Redirect the user | linkURL is href url
                window.location.href = linkURL;
            });
        }

        $("#phone").intlTelInput({
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                $.get('https://ipinfo.io', function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "{{asset('assets/vendors/phone/js/utils.js')}}",
        });

        $("#phone2").intlTelInput({
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                $.get('https://ipinfo.io', function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "{{asset('assets/vendors/phone/js/utils.js')}}",
        });


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

        $('.country').each(function() {
            let id = $(this).attr('id');
            let country = $(this);
            $.ajax({
                url: "{{ route('SelectAddressId') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN, id: id},
                dataType: 'json',
                success: function (data) {
                   $(country).val(data.country);
                    $.ajax({
                        url: "{{ route('SelectState') }}",
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: data.country},
                        dataType: 'json',
                        success: function (data2) {
                            $('#FromState'+id).html('');
                            data2.forEach(function (element) {
                                $('#FromState'+id).append($('<option>', {value: element.code, text: element.name}));
                            });
                            $('#FromState'+id).val(data.state);
                        }
                    });

                    $.ajax({
                        url: "{{ route('SelectCity') }}",
                        type: 'post',
                        data: {_token: CSRF_TOKEN, id: data.state, country: data.country},
                        dataType: 'json',
                        success: function (data2) {
                            $('#FromCity'+id).html('');
                            data2.forEach(function (element) {
                                $('#FromCity'+id).append($('<option>', {value: element.code, text: element.name}));
                            });
                            ('#FromCity'+id).val(data.city);
                        }
                    });
                }
            });

        });

    </script>

    <!-- Large modal -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endpush