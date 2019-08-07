<?php

namespace App\Http\Controllers;

use App\container;
use App\driver;
use App\driver_container;
use App\shipment;
use App\shipment_status;
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
        $shipment_count = shipment::where('driver',get_driver_by_id(session('driver-id'))->driver_id)->get()->count();
        $shipment_delivered = shipment::where('driver',get_driver_by_id(session('driver-id'))->driver_id)->where('status',6)->get()->count();
        $shipment_transit = shipment::where('driver',get_driver_by_id(session('driver-id'))->driver_id)->where('status',4)->get()->count();
        $shipment_dispatch = shipment::where('driver',get_driver_by_id(session('driver-id'))->driver_id)->where('status',3)->get()->count();
        return view('driver.index',compact('shipment_count','shipment_delivered','shipment_dispatch',
        'shipment_transit'));
    }

    public function DriverShipment(Request $request)
    {
        if ($request->type && base64_decode($request->type) == 2){
            $change = 2;
            $shipping = shipment::orderBy('id', 'DESC')->where('driver',get_driver_by_id(session('driver-id'))->driver_id)->where('shipment',base64_decode($request->type))->paginate(15);
        }else{
            $change = 1;
            $shipping = shipment::orderBy('id', 'DESC')->where('driver',get_driver_by_id(session('driver-id'))->driver_id)->where('shipment',1)->paginate(15);
        }
        return view('driver.shipment.shipment', compact('shipping','change'));
    }

    public function DriverShipmentView(Request $request)
    {
        $driver = driver::all();
        $shipment = shipment::find(base64_decode($request->data));
        return view('driver.shipment.shipment_view', compact('shipment','driver'));
    }

    public function DriverShipmentStatus(Request $request)
    {
        //dd($request->all());
        $status = shipment_status::where('tracking_code',$request->tracking_code)->where('status',$request->status)->first();
        if ($status){
            $status->time = $request->time;
            $status->location = $request->location;
            $status->save();

            return 1;
        }elseif($request->status == 1){
            $message = array(
                'error' => 'This status already used for this shipment.',
            );
            return json_encode($message);
        }else{
            $insert = new shipment_status();
            $insert->tracking_code = $request->tracking_code;
            $insert->status = $request->status;
            $insert->time = $request->time;
            $insert->location = $request->location;
            if ($request->status == 2){
                $insert->name = 'Picked';
            }elseif ($request->status == 3){
                $insert->name = 'Container';
            }elseif ($request->status == 4){
                $insert->name = 'Shipped';
            }elseif ($request->status == 5){
                $insert->name = 'Delivered';
            }elseif ($request->status == 6){
                $insert->name = 'Block';
            }
            $insert->save();

            $shipment = shipment::where('tracking_code',$request->tracking_code)->first();
            $shipment->status = $request->status;
            $shipment->save();

            return 1;
        }
    }

    public function Logout()
    {
        Session::forget('driver-email');
        Session::forget('driver-id');
        return redirect('/driver');
    }
}
