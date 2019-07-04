<?php

namespace App\Http\Controllers;

use App\basic_information;
use App\contact;
use App\slider_manage;
use App\sponsor;
use App\testimonial;
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
        if ($id) {
            $data = slider_manage::all();
            $oneData = slider_manage::find($id);
            return view('admin.slider_manage', compact('data', 'oneData'));
        } else {
            $data = slider_manage::all();
            return view('admin.slider_manage', compact('data'));
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
        if ($request->show) {
            $insert = slider_manage::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('slider-manage');
        } else {
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

    public function AdminContact($id = false)
    {
        if ($id) {
            $oneData = contact::find($id);
            $contact = contact::all();
            return view('admin.contact', compact('contact','oneData'));
        } else {
            $contact = contact::all();
            return view('admin.contact', compact('contact'));
        }
    }

    public function AdminContactAdd(Request $request)
    {
        $request->validate([
            'contact_title' => 'required|max:191',
            'contact_information' => 'required',
        ]);

        $insert = new contact();
        $insert->contact_title = $request->contact_title;
        $insert->contact_information = $request->contact_information;
        $insert->save();
        Session::flash('message', 'Contact add successfully');
        return redirect('admin-contact');
    }

    public function AdminContactUpdate(Request $request)
    {
        $request->validate([
            'contact_title' => 'required|max:191',
            'contact_information' => 'required',
        ]);

        $insert = contact::find($request->id);
        $insert->contact_title = $request->contact_title;
        $insert->contact_information = $request->contact_information;
        $insert->save();
        Session::flash('message', 'Contact update successfully');
        return redirect('admin-contact');
    }

    public function AdminContactDelete(Request $request)
    {
        if ($request->delete) {
            $data = contact::find($request->delete);
            $data->delete();
            Session::flash('message', 'Contact Delete Successfully');
            return redirect('admin-contact');
        } else {
            echo "Something Wrong";
        }
    }

    public function AdminTestimonial()
    {
        $contact = testimonial::all();
        return view('admin.testimonial', compact('contact'));
    }

    public function AdminTestimonialAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'profession' => 'required|max:191',
            'message' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = new testimonial();
        $insert->name = $request->name;
        $insert->profession = $request->profession;
        $insert->message = $request->message;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/testimonial', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Testimonial add successfully');
        return redirect('admin-testimonial');
    }

    public function AdminTestimonialStatus(Request $request)
    {
        if ($request->show) {
            $insert = testimonial::find($request->show);
            $insert->status = 1;
            $insert->save();
            return redirect('admin-testimonial');
        } else {
            $insert = testimonial::find($request->hide);
            $insert->status = 0;
            $insert->save();
            return redirect('admin-testimonial');
        }
    }

    public function AdminTestimonialDelete(Request $request)
    {
        if ($request->delete) {
            $data = testimonial::find($request->delete);
            $data->delete();
            Session::flash('message', 'Testimonial Delete Successfully');
            return redirect('admin-testimonial');
        } else {
            echo "Something Wrong";
        }
    }

    public function AdminSponsor($id = false)
    {
        if ($id) {
            $data = sponsor::all();
            $oneData = sponsor::find($id);
            return view('admin.sponsor', compact('data', 'oneData'));
        } else {
            $data = sponsor::all();
            return view('admin.sponsor', compact('data'));
        }
    }

    public function AdminSponsorAdd(Request $request)
    {
        $request->validate([
            'url' => 'required|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = new sponsor();
        $insert->url = $request->url;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/sponsor', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Sponsor add successfully');
        return redirect('admin-sponsor');
    }

    public function AdminSponsorDelete(Request $request)
    {
        if ($request->delete) {
            $data = sponsor::find($request->delete);
            $data->delete();
            Session::flash('message', 'Sponsor Delete Successfully');
            return redirect('/admin-sponsor');
        } else {
            echo "Something Wrong";
        }
    }

    public function AdminSponsorUpdate(Request $request)
    {
        $request->validate([
            'url' => 'required|max:191',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        $insert = sponsor::find($request->id);
        $insert->url = $request->url;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/sponsor', $fileStore3);
            $insert->image = $fileStore3;
        }
        $insert->save();
        Session::flash('message', 'Sponsor Update successfully');
        return redirect('admin-sponsor');
    }

}
