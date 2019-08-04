<?php

namespace App\Http\Controllers;

use App\container;
use App\driver;
use App\driver_container;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Session;

class DriverController extends Controller
{
    public function LoginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:20',
        ]);
        $admin = driver::where('email', $request->email)
            ->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('driver-email', $request->email);
                Session::put('driver-id', $admin->id);
                return redirect('/driver');
            } else {
                Session::flash('message', 'password not match');
                return redirect('driver-login');
            }
        } else {
            Session::flash('message', 'Email name not match');
            return redirect('driver-login');
        }
    }

    public function index(Request $request)
    {
        return view('driver.index');
    }

    public function DriverContainer()
    {
        $container = driver_container::where('driver_id', get_driver_by_id(session('driver-id'))->driver_id)->get();
        $collection = new Collection();
        foreach ($container as $containers) {
            $arraydata = explode(",", $containers->container_code);
            foreach ($arraydata as $arraydatas) {
                $code = container::where('code', $arraydatas)->first();
                $collection->push($code);
            }


        }
        return view('driver.shipment',compact('collection'));
    }


    public function Logout()
    {
        Session::forget('driver-email');
        Session::forget('driver-id');
        return redirect('/driver');
    }
}
