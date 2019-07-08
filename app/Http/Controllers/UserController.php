<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $title = "Dashboard";
        return view('dashboard.bashboard',compact('title'));
    }

    public function profile()
    {
        $title = "User Profile";
        return view('dashboard.profile',compact('title'));
    }
}
