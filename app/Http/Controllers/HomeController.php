<?php

namespace App\Http\Controllers;

use App\basic_information;
use Illuminate\Http\Request;

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
}
