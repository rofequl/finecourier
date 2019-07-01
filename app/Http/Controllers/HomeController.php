<?php

namespace App\Http\Controllers;

use App\basic_information;
use App\slider_manage;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function BasicInformation()
    {
        return view('admin.basic_information');
    }

    public function BasicInformationUpdate(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = basic_information::all()->first();
        $insert->website_title = $request->website_title;
        $insert->company_name = $request->company_name;
        $insert->phone_number_one = $request->phone_number_one;
        $insert->phone_number_two = $request->phone_number_two;
        $insert->email = $request->email;
        $insert->website_link = $request->website_link;
        $insert->facebook_link = $request->facebook_link;
        $insert->twiter_link = $request->twiter_link;
        $insert->google_plus_link = $request->google_plus_link;
        $insert->linkedin_link = $request->linkedin_link;
        $insert->pinterest_link = $request->pinterest_link;
        $insert->footer_text = $request->footer_text;
        $insert->address = $request->address;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/logo', $fileStore3);
            $insert->company_logo = $fileStore3;
        }
        $insert->save();
        return redirect('basic-information');
    }

    public function SliderManage($id = false)
    {
        if ($id){
            $data = slider_manage::all();
            $oneData = slider_manage::find($id);
            return view('admin.slider_manage',compact('data','oneData'));
        }else{
            $data = slider_manage::all();
            return view('admin.slider_manage',compact('data'));
        }
    }

    public function SliderManageAdd(Request $request)
    {
        $request->validate([
            'slider_title_one' => 'required|max:191',
            'slider_title_two' => 'required|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = new slider_manage;
        $insert->slider_title_one = $request->slider_title_one;
        $insert->slider_title_two = $request->slider_title_two;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/slider', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Slider add successfully');
        return redirect('slider-manage');
    }

    public function SliderManageStatus(Request $request)
    {
        if ($request->show){
            $insert = slider_manage::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('slider-manage');
        }else{
            $insert = slider_manage::find($request->hide);
            $insert->status = 0;
            $insert->save();
            return redirect('slider-manage');
        }
    }

    public function SliderManageDelete(Request $request)
    {
        if ($request->delete) {
            $data = slider_manage::find($request->delete);
            $data->delete();
            Session::flash('message', 'Slider Delete Successfully');
            return redirect('/slider-manage');
        } else {
            echo "Something Wrong";
        }
    }

    public function SliderManageUpdate(Request $request)
    {
        $request->validate([
            'slider_title_one' => 'required|max:191',
            'slider_title_two' => 'required|max:191',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = slider_manage::find($request->id);
        $insert->slider_title_one = $request->slider_title_one;
        $insert->slider_title_two = $request->slider_title_two;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/slider', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Slider Update successfully');
        return redirect('slider-manage');
    }

}
