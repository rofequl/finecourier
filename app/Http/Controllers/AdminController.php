<?php

namespace App\Http\Controllers;
use App\shipment;
use Illuminate\Support\Facades\Hash;
use Session;
use App\adminpanel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $shipping = shipment::orderBy('id','DESC')->paginate(15);
        return view('admin.index',compact('shipping'));
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
            'username' => 'required|max:40',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:20',
        ]);
            $register_user = new adminpanel();
            $register_user->name = $request->username;
            $register_user->email = $request->email;
            $register_user->password = Hash::make($request->password);
            $register_user->save();
        Session::put('admin-username', $request->username);
        Session::put('admin-id', $register_user->id);
        return redirect('/admin');
    }

    public function Logout()
    {
        Session::forget('admin-username');
        Session::forget('admin-id');
        Session::flush();
        return redirect('/admin');
    }
}
