<?php

namespace App\Http\Controllers;

use App\service;
use App\slider_manage;
use Illuminate\Http\Request;
use Session;

class AboutController extends Controller
{
    public function OurService($id = false)
    {
        if ($id){
            $data = service::all();
            $oneData = service::find($id);
            return view('admin.our_service',compact('data','oneData'));
        }else{
            $data = service::all();
            return view('admin.our_service',compact('data'));
        }
    }

    public function OurServiceAdd(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = new service;
        $insert->title = $request->title;
        $insert->description = $request->description;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/service', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Service add successfully');
        return redirect('our-service');
    }

    public function OurServiceStatus(Request $request)
    {
        if ($request->show){
            $insert = service::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('our-service');
        }else{
            $insert = service::find($request->hide);
            $insert->status = 0;
            $insert->save();
            return redirect('our-service');
        }
    }

    public function OurServiceDelete(Request $request)
    {
        if ($request->delete) {
            $data = service::find($request->delete);
            $data->delete();
            Session::flash('message', 'Service Delete Successfully');
            return redirect('our-service');
        } else {
            echo "Something Wrong";
        }
    }

    public function OurServiceUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = service::find($request->id);
        $insert->title = $request->title;
        $insert->description = $request->description;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/service', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Service update successfully');
        return redirect('our-service');
    }
}
