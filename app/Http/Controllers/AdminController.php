<?php

namespace App\Http\Controllers;
use App\container;
use App\shipment;
use App\user;
use Illuminate\Support\Facades\Hash;
use Session;
use App\adminpanel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $shipment_count = shipment::all()->count();
        $user_count = user::all()->count();
        $delivered_count = shipment::where('status',5)->get()->count();
        $container_count = container::all()->count();
        $shipment = shipment::orderBy('id','DESC')->paginate(15);
        return view('admin.index',compact('shipment','shipment_count','delivered_count',
        'user_count','container_count'));
    }

    public function profile()
    {
        $admin = adminpanel::all();
        return view('admin.profile',compact('admin'));
    }

    public function AdminDelete(Request $request)
    {
        if ($request->delete) {
            $data = adminpanel::find(base64_decode($request->delete));
            $data->delete();
            Session::flash('message', 'Account deleted Successfully');
            return redirect('admin-profile');
        } else {
            abort('404','Something wrong');
        }
    }

    public function AdminSingleProfile(Request $request)
    {
        $admin = adminpanel::where('id',$request->id)->select('id','name','email')->first();
        return json_encode($admin);
    }

    public function AdminSingleProfilePost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:255',
        ]);
        $register_user = adminpanel::find($request->id);
        $register_user->name = $request->name;
        $register_user->email = $request->email;
        $register_user->save();

        Session::flash('message', 'Account update successfully');
        return redirect('/admin-profile');
    }

    public function LoginCheck(Request $request)
    {
        $request->validate([
            'username' => 'required|max:40',
            'password' => 'required|min:8|max:20',
        ]);
        $admin = adminpanel::where('name', $request->username)
            ->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('admin-username', $request->username);
                Session::put('admin-id', $admin->id);
                return redirect('/admin');
            } else {
                Session::flash('message', 'password not match');
                return redirect('admin-login');
            }
        } else {
            Session::flash('message', 'User name not match');
            return redirect('admin-login');
        }
    }

    public function AdminRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:20|confirmed',
        ]);
            $register_user = new adminpanel();
            $register_user->name = $request->name;
            $register_user->email = $request->email;
            $register_user->password = Hash::make($request->password);
            $register_user->save();
        Session::put('admin-username', $request->name);
        Session::put('admin-id', $register_user->id);

        Session::flash('message', 'New account create successfully');
        return redirect('/admin-profile');
    }

    public function AdminPasswordChange(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|max:20|confirmed',
        ]);
        $register_user = adminpanel::find($request->id);
        $register_user->password = Hash::make($request->password);

        Session::flash('message', 'Password change successfully');
        return redirect('/admin-profile');
    }

    public function AdminTrack(Request $request)
    {
        $value = substr($request->id,0,2);
        if($value == "UR"){
            $check = user::where('user_id',$request->id)->first();
            if ($check){
                return route('AdminCustomerView','profile='.base64_encode($check->id));
            }else{
                return 'error';
            }
        }else{
            $check2 = shipment::where('tracking_code',$request->id)->first();
            if ($check2){
                return route('AdminShipmentView','data='.base64_encode($check2->id));
            }else{
                return 'error';
            }
        }
    }

    public function Logout()
    {
        Session::forget('admin-username');
        Session::forget('admin-id');
        Session::flush();
        return redirect('/admin');
    }
}
