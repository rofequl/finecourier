<?php

namespace App\Http\Controllers;

use App\faq;
use App\news;
use App\our_inmormation;
use App\service;
use App\slider_manage;
use App\who_we_are;
use Session;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function OurService($id = false)
    {
        if ($id) {
            $data = service::all();
            $oneData = service::find($id);
            return view('admin.our_service', compact('data', 'oneData'));
        } else {
            $data = service::all();
            return view('admin.our_service', compact('data'));
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
        if ($request->show) {
            $insert = service::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('our-service');
        } else {
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

    public function OurInformation($id = false)
    {
        $data = our_inmormation::all();
        if ($data->count()<1){
            $insert = new our_inmormation();
            $insert->id = 1;
            $insert->save();
        }
        $data = our_inmormation::all()->first();
        return view('admin.our_information',compact('data'));
    }

    public function OurInformationAdd(Request $request)
    {
        $request->validate([
            'mission_title' => 'required|max:191',
            'mission' => 'required',
            'vision_title' => 'required|max:191',
            'vision' => 'required',
            'who_we_are' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = our_inmormation::all()->first();
        $insert->mission_title = $request->mission_title;
        $insert->mission = $request->mission;
        $insert->vision_title = $request->vision_title;
        $insert->vision = $request->vision;
        $insert->who_we_are = $request->who_we_are;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/our_information', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        return redirect('our-information');
    }

    public function faq($id = false)
    {
        if ($id) {
            $data = faq::all();
            $oneData = faq::find($id);
            return view('admin.faq', compact('data', 'oneData'));
        } else {
            $data = faq::all();
            return view('admin.faq', compact('data'));
        }
        return view('admin.faq');
    }

    public function faqAdd(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required| max:191',
            'description' => 'required'
        ]);

        $insert = new faq;
        $insert->title = $request->title;
        $insert->description = $request->description;
        $insert->save();
        Session::flash('message', 'FAQ Added Successfully');
        return redirect('faq');
    }

    public function faqStatus(Request $request)
    {
        if ($request->show) {
            $insert = faq::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('faq');
        } else {
            $insert = faq::find($request->hide);
            $insert->status = 0;
            $insert->save();
            return redirect('faq');
        }
    }

    public function faqUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required| max:191',
            'description' => 'required'
        ]);

        $insert = faq::find($request->id);
        $insert->title = $request->title;
        $insert->description = $request->description;
        $insert->save();
        Session::flash('message', 'FAQ Updated Successfully');
        return redirect('faq');
    }

    public function faqDelete(Request $request)
    {
        if ($request->delete) {
            $data = faq::find($request->delete);
            $data->delete();
            Session::flash('message', 'FAQ Deleted Successfully');
            return redirect('faq');
        } else {
            echo "Something is wrong";
        }
    }

    public function AdminNews($id = false)
    {
        if ($id) {
            $data = service::all();
            $oneData = service::find($id);
            return view('admin.our_service', compact('data', 'oneData'));
        } else {
            $data = news::all();
            return view('admin.news', compact('data'));
        }
    }

    public function AdminNewsAdd(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required|max:191',
            'title' => 'required|max:191',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);
        $insert = new news();
        $insert->name = $request->name;
        $insert->title = $request->title;
        $insert->description = $request->description;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/news', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'News add successfully');
        return redirect('admin-news');
    }

    public function AdminNewsStatus(Request $request)
    {
        if ($request->show) {
            $insert = news::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('admin-news');
        } else {
            $insert = news::find($request->hide);
            $insert->status = 0;
            $insert->save();
            return redirect('admin-news');
        }
    }

    public function AdminNewsDelete(Request $request)
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

    public function AdminNewsUpdate(Request $request)
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
