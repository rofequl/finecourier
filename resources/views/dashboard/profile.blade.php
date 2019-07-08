@extends('dashboard.main')
@section('content2')
<style>
    .ProManage{
        background-color: black;
        color: white;
        padding: 11px 15px;
        font-size: 28px;
        border-radius: 50%;
    }
    .ProManageText{
        margin: 10px 0;
        font-size: 19px;
    }
</style>
    <div class="panel panel-body" style="margin-top: 10px;border: 1px solid #ddd;width: 100%;font-size: 17px;text-align: center">
        <i class="fa fa-lock ProManage" aria-hidden="true"></i><br>
        <p class="ProManageText">Manage Profile</p>


        <div class="quote_form" style="margin-top: 20px">
            <form action="{{route('RegisterSubmit')}}" method="post" id="Signup-Form"
                  autocomplete="off">
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
                <div class="form_half left" id="Sign-Country">
                    <div class="select_wrapper">
                        <select name="country" class="countries" id="countryId">
                            <option value="">Select Country</option>
                        </select>
                        <span class="fa fa-caret-down"></span>
                    </div>
                </div>
                <div class="form_half right" id="Sign-Post-Code">
                    <input type="number" placeholder="Post Code" id="SignInputPostCode"
                           name="post_code">
                </div>
                <div class="form_half left" id="Sign-State">
                    <div class="select_wrapper">
                        <select name="state" class="states" id="stateId">
                            <option value="">Select Division</option>
                        </select>
                        <span class="fa fa-caret-down"></span>
                    </div>
                </div>
                <div class="form_half right" id="Sign-City">
                    <div class="select_wrapper">
                        <select name="city" class="cities" id="cityId">
                            <option value="">Select City</option>
                        </select>
                        <span class="fa fa-caret-down"></span>
                    </div>
                </div>
                <div class="form_half left" id="Sign-State">
                    <input type="text" placeholder="Place Name" id="placeName" name="placeName">
                </div>
                <div class="regi_btn_wrapper">
                    <button class="trust_btn regi_btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection