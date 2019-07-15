<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function profile()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $user = user::find(session('user-id'));
        return view('dashboard.profile',compact('user','earth'));
    }

    public function ProfileUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'phone' => 'required|max:191',
            'post_code' => 'required|max:191',
            'country' => 'required',
            'city' => 'required',
            'division' => 'required',
            'id' => 'required',
        ]);

        $register_user = user::find($request->id);
        $register_user->first_name = $request->first_name;
        $register_user->last_name = $request->last_name;
        $register_user->phone = $request->phone;
        $register_user->country = $request->country;
        $register_user->post_code = $request->post_code;
        $register_user->city = $request->city;
        $register_user->division = $request->division;
        $register_user->save();

        $request->session()->flash('message', 'Profile update successfully');
        return redirect('/profile');

    }
}
