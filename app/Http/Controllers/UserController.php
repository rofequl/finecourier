<?php

namespace App\Http\Controllers;

use App\address;
use App\shipment;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;

class UserController extends Controller
{
    public function dashboard()
    {
        $total_shipment = shipment::where('user_id', session('user-id'))->get()->count();
        $total_delivered = shipment::where('status',5)->where('user_id', session('user-id'))->get()->count();
        $total_reject = shipment::where('status',6)->where('user_id', session('user-id'))->get()->count();

        $shipment = shipment::where('user_id', session('user-id'))->get();
        return view('dashboard.index', compact('shipment','total_shipment','total_delivered','total_reject'));
    }

    public function profile()
    {
        $total_address = address::where('user_id', session('user-id'))->get()->count();
        $total_shipment = shipment::where('user_id', session('user-id'))->get()->count();
        $total_delivered = shipment::where('status',5)->where('user_id', session('user-id'))->get()->count();
        $user = user::find(session('user-id'));
        return view('dashboard.profile', compact('user','total_delivered','total_shipment','total_address'));
    }

    public function ProfileEdit()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $user = user::find(session('user-id'));
        return view('dashboard.profile2', compact('user', 'earth'));
    }

    public function account()
    {
        $user = user::find(session('user-id'));
        return view('dashboard.account', compact('user'));
    }

    public function ChangeMail(Request $request)
    {
        $request->validate([
            'email' => 'required|max:191',
            'password' => 'required|max:20',
        ]);

        $admin = user::where('id', $request->id)->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                $admin->email = $request->email;
                $admin->save();
                $request->session()->flash('message', 'Email Change successfully');
                return redirect('/account');
            } else {
                $request->session()->flash('message', 'Password not match');
                return redirect('/account');
            }
        } else {
            $request->session()->flash('message', 'Something wrong try again later');
            return redirect('/account');
        }

    }

    public function ChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|max:20',
            'password' => 'required|max:20|confirmed',
        ]);

        $admin = user::where('id', $request->id)->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->old_password, $admin->password)) {
                $admin->password = Hash::make($request->password);
                $admin->save();
                $request->session()->flash('message', 'Password Change successfully');
                return redirect('/account');
            } else {
                $request->session()->flash('message', 'Password not match');
                return redirect('/account');
            }
        } else {
            $request->session()->flash('message', 'Something wrong try again later');
            return redirect('/account');
        }

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
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/user', $fileStore3);
            $register_user->image = $fileStore3;
        }
        $register_user->save();

        $request->session()->flash('message', 'Profile update successfully');
        return redirect('/profile');

    }

    public function address()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::where('user_id', session('user-id'))->paginate(3);
        return view('dashboard.address', compact('earth', 'address'));
    }

    public function SelectAddressId(Request $request)
    {
        $address = address::find($request->id);
        return json_encode($address);
    }

    public function AddressAdd(Request $request)
    {

        $request->validate([
            'name' => 'required|max:191',
            'company' => 'max:191',
            'country' => 'required|max:191',
            'address_type' => 'required|max:191',
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
        $insert->address_type = $request->address_type;
        $insert->post_code = $request->post_code;
        $insert->city = $request->city;
        $insert->state = $request->state;
        $insert->phone_one = $request->phone_one;
        $insert->address_one = $request->address_one;
        $insert->address_two = $request->address_two;
        $insert->email = $request->email;
        $insert->user_id = session('user-id');
        $insert->save();

        $request->session()->flash('message', 'Address add successfully');
        return $request->address_type;
    }

    public function AddressUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required|max:191',
            'company' => 'max:191',
            'country' => 'required|max:191',
            'address_type' => 'required|max:191',
            'post_code' => 'required|max:191',
            'city' => 'required|max:191',
            'state' => 'required|max:191',
            'phone_one' => 'required|max:191',
            'address_one' => 'required|max:191',
            'email' => 'required|max:191',

        ]);

        $insert = address::find($request->id);
        $insert->name = $request->name;
        $insert->company = $request->company;
        $insert->country = $request->country;
        $insert->post_code = $request->post_code;
        $insert->city = $request->city;
        $insert->state = $request->state;
        $insert->address_type = $request->address_type;
        $insert->phone_one = $request->phone_one;
        $insert->address_one = $request->address_one;
        $insert->address_two = $request->address_two;
        $insert->email = $request->email;
        $insert->user_id = session('user-id');
        $insert->save();

        $request->session()->flash('message', 'Address ad successfully');
        return redirect('/address');
    }

    public function AddressDelete(Request $request)
    {
        if ($request->delete) {
            $data = address::find($request->delete);
            $data->delete();
            return redirect('address');
        } else {
            echo "Something is wrong";
        }
    }

    public function SelectAddress(Request $request)
    {
        $address = address::find($request->id);
        return $address;
    }

    public function SelectAddressAll(Request $request)
    {
        $address = address::where('address_type', $request->id)->where('user_id',$request->user_id)->get();
        return $address;
    }

    public function PrepareShipment()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::where('user_id', session('user-id'))->get();
        return view('dashboard.shipment', compact('address', 'earth'));
    }


}
