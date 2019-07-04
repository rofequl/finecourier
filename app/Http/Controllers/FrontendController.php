<?php

namespace App\Http\Controllers;

use App\contact;
use App\news;
use App\our_inmormation;
use App\service;
use App\slider_manage;
use App\sponsor;
use App\who_we_are;
use App\faq;
use App\testimonial;
use App\user;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $slide = slider_manage::where('status', 1)->get();
        $service = service::where('status', 1)->get();
        $news = news::where('status', 1)->get();
        $information = our_inmormation::all()->first();
        $faq = faq::where('status', 1)->get();
        $testimonial = testimonial::where('status', 1)->get();
        $sponsor = sponsor::all();
        return view('index', compact('slide', 'news', 'service', 'testimonial', 'information', 'faq', 'sponsor'));
    }

    public function about()
    {
        $title = "About us";
        $service = service::where('status', 1)->get();
        $faq = faq::where('status', 1)->get();
        $information = our_inmormation::all()->first();
        $testimonial = testimonial::where('status', 1)->get();
        $sponsor = sponsor::all();
        return view('about_us', compact('title', 'service', 'testimonial', 'faq', 'information', 'sponsor'));
    }

    public function service()
    {
        $title = "Service";
        $service = service::all();
        $faq = faq::where('status', 1)->get();
        $sponsor = sponsor::all();
        return view('service', compact('title', 'service', 'faq', 'sponsor'));
    }

    public function SingleService($id)
    {
        $title = "Service Details";
        $service = service::find($id);
        $testimonial = testimonial::where('status', 1)->get();
        $sponsor = sponsor::all();
        return view('single_service', compact('title', 'service', 'testimonial', 'sponsor'));
    }

    public function contact()
    {
        $title = "Contact";
        $contact = contact::all();
        $sponsor = sponsor::all();
        return view('contact', compact('title', 'contact', 'sponsor'));
    }

    public function news()
    {
        $title = "Latest News";
        $news = news::all();
        $sponsor = sponsor::all();
        return view('news', compact('title', 'news', 'sponsor'));
    }

    public function SingleNews($id)
    {
        $title = "News Details";
        $news = news::find($id);
        $recent_news = news::limit(3)->get();
        $testimonial = testimonial::where('status', 1)->orderBy('id', 'DESC')->get();
        $sponsor = sponsor::all();
        return view('single_news', compact('title', 'news', 'testimonial', 'sponsor', 'recent_news'));
    }

    public function login()
    {
        $title = "Login";
        return view('login', compact('title'));
    }

    public function register()
    {
        $title = "Register";
        return view('register', compact('title'));
    }

    public function RegisterSubmit(Request $request)
    {
        $register_user = new user();
        $register_user->first_name = $request->first_name;
        $register_user->last_name = $request->last_name;
        $register_user->email = $request->email;
        $register_user->phone = $request->phone;
        $register_user->country = $request->country;
        $register_user->post_code = $request->post_code;
        $register_user->city = $request->city;
        $register_user->state = $request->state;
        $register_user->password = Hash::make($request->password);
        $register_user->save();
        Session::put('user-email', $request->email);
        Session::put('user-id', $register_user->id);
        return redirect('/');
    }

    public function LoginCheck(Request $request)
    {
        $admin = user::where('email', $request->email)
            ->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('user-email', $request->email);
                Session::put('user-id', $admin->id);
                return redirect('/dashboard');
            } else {
                $request->session()->flash('login_error', 'password not match');
                return redirect('/login');
            }
        } else {
            $request->session()->flash('login_error', 'User email not match');
            return redirect('/login');
        }
    }

    public function Logout()
    {
        Session::forget('user-email');
        Session::forget('user-id');
        Session::flush();
        return redirect('/');
    }
}
