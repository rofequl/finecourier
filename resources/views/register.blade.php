@extends('layout.app')
@section('content')

    @include('inc.slide_area')


    <!--================================
        START QUOTE AREA
    =================================-->
    <section class="regi_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-3 starts -->
                <div class="col-md-8 col-sm-10 col-sm-offset-1  col-md-offset-2">
                    <div class="regi_form_wrapper">
                        <div class="section_title title_center">
                            <div class="title"><h2>create your fine courier account</h2></div>
                        </div>

                        <div class="quote_form">
                            <form action="{{route('RegisterSubmit')}}" method="post" id="Signup-Form" autocomplete="off">
                                {{csrf_field()}}
                                <div class="form_half left" id="Sign-First-Name">
                                    <input type="text" placeholder="First Name" aria-describedby="helpBlock2"
                                           id="SignInputFirstName" name="first_name">
                                </div>
                                <div class="form_half right" id="Sign-Last-Name">
                                    <input type="text" placeholder="Last Name" id="SignInputLastName" name="last_name">
                                </div>

                                <div class="form_half left" id="Sign-Email">
                                    <input type="email" placeholder="Email" id="SignInputEmail" name="email">
                                </div>
                                <div class="form_half right" id="Sign-phone">
                                    <input type="tel" placeholder="Phone" id="SignInputPhone" name="phone">
                                </div>

                                <div class="form_half left" id="Sign-Pass">
                                    <input type="password" placeholder="Password" id="SignInputPass" name="password">
                                </div>
                                <div class="form_half right" id="Sign-Re-Pass">
                                    <input type="password" placeholder="Confirm Password" id="SignInputRePass">
                                </div>
                                <div class="form_half left" id="Sign-Post-Code">
                                    <input type="text" placeholder="Post Code" id="SignInputPostCode" name="post_code">
                                </div>
                                <div class="form_half right" id="Sign-Country">
                                    <div class="select_wrapper">
                                        <select name="country" id="SignInputCountry">
                                            <option value="">Country</option>
                                            <option value="bangladesh">Bangladesh</option>
                                            <option value="thailand">Thailand</option>
                                            <option value="uae">UAE</option>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                </div>
                                <div class="form_half left" id="Sign-City">
                                    <input type="text" placeholder="City" id="SignInputCity" name="city">
                                </div>
                                <div class="form_half right" id="Sign-State">
                                    <input type="text" placeholder="State" id="SignInputState" name="state">
                                </div>

                                <div class="regi_btn_wrapper">
                                    <button class="trust_btn regi_btn" type="submit">register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        END QUOTE AREA
    =================================-->




    @push('scripts')
        <script>
            function SignInputFirstName() {
                let name = $("#SignInputFirstName").val(), error = $("#Sign-First-Name");
                let word = name.charAt(0);
                let numeric = /^[0-9]+$/;
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your first name";
                    error.popover('show');
                    $("#SignInputFirstName").css({"border": "1px solid red"});
                    return false;
                } else if (word.match(numeric)) {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "First word must be a latter.";
                    error.popover('show');
                    $("#SignInputFirstName").css({"border": "1px solid red"});
                    return false;
                } else {
                    error.popover('destroy');
                    $("#SignInputFirstName").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputLastName() {
                let name = $("#SignInputLastName").val(), error = $("#Sign-Last-Name");
                let word = name.charAt(0);
                let numeric = /^[0-9]+$/;
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your last name.";
                    error.popover('show');
                    $("#SignInputLastName").css({"border": "1px solid red"});
                    return false;
                } else if (word.match(numeric)) {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "First word must be a latter.";
                    error.popover('show');
                    $("#SignInputLastName").css({"border": "1px solid red"});
                    return false;
                } else {
                    error.popover('destroy');
                    $("#SignInputLastName").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputEmail() {
                let name = $("#SignInputEmail").val(), error = $("#Sign-Email");
                let na = /^[\w\-.+]+@[a-zA-Z0-9.\-]+\.[a-zA-z0-9]{2,4}$/;
                let back = true;

                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your Email Id.";
                    error.popover('show');
                    $("#SignInputEmail").css({"border": "1px solid red"});
                    return false;
                } else if (name.match(na)) {
                    error.popover('destroy');
                    $("#SignInputEmail").css({"border": "1px solid #ddd"});
                    return true;

                } else {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter Valid Email Id..";
                    error.popover('show');
                    $("#SignInputEmail").css({"border": "1px solid red"});
                    return false;
                }
            }

            function SignInputPass() {
                let name = $('#SignInputPass').val(), error = $("#Sign-Pass");
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your password";
                    error.popover('show');
                    $("#SignInputPass").css({"border": "1px solid red"});
                    return false;
                } else if (name.length < 8 || name.length > 20) {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Your Password must be 8 to 20";
                    error.popover('show');
                    $("#SignInputPass").css({"border": "1px solid red"});
                    return false;
                } else {
                    error.popover('destroy');
                    $("#SignInputPass").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputRePass() {
                let name = $('#SignInputPass').val(), error = $("#Sign-Re-Pass");
                let rename = $('#SignInputRePass').val();
                if (rename === "") {

                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your Re password";
                    error.popover('show');
                    $("#SignInputRePass").css({"border": "1px solid red"});
                    return false;
                } else if (SignInputPass() !== true) {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Password not match.";
                    error.popover('show');
                    $("#SignInputRePass").css({"border": "1px solid red"});
                    return false;
                } else if (name.length !== rename.length) {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Password not match.";
                    error.popover('show');
                    $("#SignInputRePass").css({"border": "1px solid red"});
                    return false;
                } else if (rename.match(name)) {
                    error.popover('destroy');
                    $("#SignInputRePass").css({"border": "1px solid #ddd"});
                    return true;
                } else {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Password not match.";
                    error.popover('show');
                    $("#SignInputRePass").css({"border": "1px solid red"});
                    return false;
                }
            }

            function SignInputPhone() {
                let name = $("#SignInputPhone").val(), error = $("#Sign-phone");
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your Phone Number";
                    error.popover('show');
                    $("#SignInputPhone").css({"border": "1px solid red"});
                    return false;
                } else if (isNaN(name)) {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Phone must be Numeric.";
                    error.popover('show');
                    $("#SignInputPhone").css({"border": "1px solid red"});
                    return false;
                } else {
                    error.popover('destroy');
                    $("#SignInputPhone").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputCountry() {
                let name = $("#SignInputCountry").val(), error = $("#Sign-Country");
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Select your country";
                    error.popover('show');
                    $("#SignInputCountry").css({"border": "1px solid red"});
                    return false;
                }else {
                    error.popover('destroy');
                    $("#SignInputCountry").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputPostCode() {
                let name = $("#SignInputPostCode").val(), error = $("#Sign-Post-Code");
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your Post Code";
                    error.popover('show');
                    $("#SignInputPostCode").css({"border": "1px solid red"});
                    return false;
                }else {
                    error.popover('destroy');
                    $("#SignInputPostCode").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputCity() {
                let name = $("#SignInputCity").val(), error = $("#Sign-City");
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your City";
                    error.popover('show');
                    $("#SignInputCity").css({"border": "1px solid red"});
                    return false;
                } else {
                    error.popover('destroy');
                    $("#SignInputCity").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            function SignInputState() {
                let name = $("#SignInputState").val(), error = $("#Sign-State");
                if (name === "") {
                    error.popover({content: "", placement: "top"});
                    error.data('bs.popover').options.content = "Enter your state";
                    error.popover('show');
                    $("#SignInputState").css({"border": "1px solid red"});
                    return false;
                }else {
                    error.popover('destroy');
                    $("#SignInputState").css({"border": "1px solid #ddd"});
                    return true;
                }
            }

            $("#Signup-Form").submit(function (event) {
                SignInputFirstName();
                SignInputLastName();
                SignInputEmail();
                SignInputPass();
                SignInputRePass();
                SignInputPhone();
                SignInputCountry();
                SignInputPostCode();
                SignInputCity();
                SignInputState();
                if (SignInputFirstName() !== true) {
                } else if (SignInputLastName() !== true) {
                } else if (SignInputEmail() !== true) {
                } else if (SignInputPass() !== true) {
                } else if (SignInputRePass() !== true) {
                } else if (SignInputPhone() !== true) {
                } else if (SignInputCountry() !== true) {
                } else if (SignInputPostCode() !== true) {
                } else if (SignInputCity() !== true) {
                } else if (SignInputState() !== true) {
                } else {
                    return;
                }
                event.preventDefault();
            });
        </script>
    @endpush


@endsection