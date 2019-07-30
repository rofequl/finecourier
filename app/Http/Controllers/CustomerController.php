<?php

namespace App\Http\Controllers;

use App\address;
use Session;
use App\country;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function AdminCustomerList(){
        $user = user::all();
        $country = country::all();
        return view('admin.customer.customer',compact('user','country'));
    }

    public function AdminCustomerAdd(Request $request){

        //dd($request->all());

        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:191',
            'country' => 'required|max:191',
            'post_code' => 'required|max:191',
            'city' => 'required|max:191',
            'division' => 'required|max:191',
            'placeName' => 'required|max:191',
            'password' => 'required|max:20|min:6|confirmed',
        ]);

        $register_user = new user();
        $register_user->user_id = 'UR'.rand(100,999).time();
        $register_user->first_name = $request->first_name;
        $register_user->last_name = $request->last_name;
        $register_user->email = $request->email;
        $register_user->phone = $request->phone;
        $register_user->country = $request->country;
        $register_user->post_code = $request->post_code;
        $register_user->city = $request->city;
        $register_user->division = $request->division;
        $register_user->placeName = $request->placeName;
        $register_user->password = Hash::make($request->password);
        $register_user->save();

        return redirect('/admin-customer-list');
    }

    public function AdminCustomerView(Request $request)
    {
        $user = user::find(base64_decode($request->profile));
        $address = address::where('user_id',base64_decode($request->profile))->get();
        return view('admin.customer.profile',compact('user','address'));
    }
}
