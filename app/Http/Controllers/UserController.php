<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function profile()
    {
        $title = "User Profile";
        return view('dashboard.profile',compact('title'));
    }
}
