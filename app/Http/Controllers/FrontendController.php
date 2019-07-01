<?php

namespace App\Http\Controllers;

use App\service;
use App\slider_manage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $slide = slider_manage::where('status',1)->get();
        $service = service::where('status',1)->get();
        return view('index',compact('slide','service'));
    }
}
