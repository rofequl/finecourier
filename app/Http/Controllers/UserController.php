<?php

namespace App\Http\Controllers;

use App\address;
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

    public function address()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::all();
        return view('dashboard.address',compact('earth','address'));
    }

    public function AddressAdd(Request $request)
    {

        $request->validate([
            'name' => 'required|max:191',
            'company' => 'required|max:191',
            'country' => 'required|max:191',
            'post_code' => 'required|max:191',
            'city' => 'required|max:191',
            'state' => 'required|max:191',
            'phone_one' => 'required|max:191',
            'address_one' => 'required|max:191',
            'email' => 'required|max:191',

        ]);

        $insert = new address();
        $insert->name = $request->name;
        $insert->company = $request->company;
        $insert->country = $request->country;
        $insert->post_code = $request->post_code;
        $insert->city = $request->city;
        $insert->state = $request->state;
        $insert->phone_one = $request->phone_one;
        $insert->address_one = $request->address_one;
        $insert->address_two = $request->address_two;
        $insert->email = $request->email;
        $insert->user_id = session('user-id');
        $insert->save();

        $request->session()->flash('message', 'Address ad successfully');
        return redirect('/address');
    }

    public function SelectAddress(Request $request)
    {
        $address = address::find($request->id);
        return $address;
    }

    public function PrepareShipment()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::where('user_id',session('user-id'))->get();
        return view('dashboard.shipment',compact('address','earth'));
    }

    public function PrepareShipmentAdd(Request $request)
    {
        dd($request->all());
    }

}
