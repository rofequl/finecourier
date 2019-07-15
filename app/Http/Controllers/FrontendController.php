<?php

namespace App\Http\Controllers;

use App\comment;
use App\contact;
use App\news;
use App\our_inmormation;
use App\service;
use App\slider_manage;
use App\sponsor;
use App\faq;
use App\testimonial;
use App\user;
use Illuminate\Http\Request;
use Mail;
use Session;
use Illuminate\Support\Facades\Hash;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;

class FrontendController extends Controller
{
    public function index()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $slide = slider_manage::where('status', 1)->get();
        $service = service::where('status', 1)->get();
        $news = news::where('status', 1)->get();
        $information = our_inmormation::all()->first();
        $faq = faq::where('status', 1)->get();
        $testimonial = testimonial::where('status', 1)->get();
        $sponsor = sponsor::all();
        return view('index', compact('slide','earth', 'news', 'service', 'testimonial', 'information', 'faq', 'sponsor'));
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

    public function SendUsMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'phone' => 'required|max:191',
            'message' => 'required',
        ]);
        //return view('mail.contact')->with(['data'=>$request]);
        Mail::send('mail.contact',['data'=>$request],function ($message) use ($request){
            $message->to('finecourier@gmail.com')->subject('A Message From Contact Page');
            $message->from($request->email,$request->name);
        });
        Session::flash('message', 'Message sent successfully');
        return redirect()->back();
    }

    public function news()
    {
        $title = "Latest News";
        $news = news::all();
        $sponsor = sponsor::all();
        return view('news', compact('title', 'news', 'sponsor'));
    }

    public function LoveReact(Request $request)
    {
        $news = news::find($request->id);
        return $news->like;
    }

    public function AddLoveReact(Request $request)
    {
        $news = news::find($request->id);
        $list = explode(",", $news->like);
        array_push($list, $request->ip);
        $news->like = implode(",", $list);
        $news->save();
        return 1;
    }

    public function AddNewsComment(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'message' => 'required',
        ]);
        $insert = new comment();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->message = $request->message;
        $insert->news_id = $request->news_id;
        $insert->save();

        Session::flash('message', 'Comment insert successfully');
        return redirect()->back();
    }

    public function RemoveLoveReact(Request $request)
    {
        $news = news::find($request->id);
        $list = explode(",", $news->like);
        $list = array_diff($list, array($request->ip));
        $news->like = implode(",", $list);
        $news->save();
        return 1;
    }

    public function SingleNews($id)
    {
        $title = "News Details";
        $news = news::find($id);
        $comment = comment::where('news_id',$id)->get();
        $recent_news = news::limit(3)->get();
        $testimonial = testimonial::where('status', 1)->orderBy('id', 'DESC')->get();
        $sponsor = sponsor::all();
        return view('single_news', compact('comment','title', 'news', 'testimonial', 'sponsor', 'recent_news'));
    }

    public function faq()
    {
        $title = "faq";
        $faq = faq::where('description', '!=', Null)->get();
        $sponsor = sponsor::all();
        return view('faq', compact('title', 'faq', 'sponsor'));
    }

    public function AddFaq(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'phone' => 'required|max:191',
            'email' => 'required|max:191',
            'message' => 'required|max:191',
        ]);
        $insert = new faq();
        $insert->name = $request->name;
        $insert->phone = $request->phone;
        $insert->email = $request->email;
        $insert->message = $request->message;
        $insert->save();

        Session::flash('message', 'Faq add successfully');
        return redirect('faq');
    }

    public function login()
    {
        $title = "Login";
        return view('login', compact('title'));
    }

    public function register()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $title = "Register";
        return view('register', compact('title','earth'));
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
        $register_user->division = $request->state;
        $register_user->placeName = $request->placeName;
        $register_user->password = Hash::make($request->password);
        $register_user->save();
        Session::put('user-email', $request->email);
        Session::put('user-id', $register_user->id);
        return redirect('/dashboard');
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
