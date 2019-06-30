<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function BasicInformation(Request $request)
    {
        return view('admin.basic_information');
    }
}
