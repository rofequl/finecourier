<?php

namespace App\Http\Controllers;

use App\faq;
use Session;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function faq($id = false)
    {
        if ($id)
        {
            $data = faq::all();
            $oneData = faq::find($id);
            return view('admin.faq', compact('data','oneData'));
        }else{
            $data= faq::all();
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

        $insert= new faq;
        $insert->title = $request->title;
        $insert->description = $request->description;
        $insert->save();
        Session::flash('message','FAQ Added Successfully');
        return redirect('faq');
    }
    public function faqStatus(Request $request)
    {
        if($request->show)
        {
            $insert = faq::find($request->show);
            $insert->status =1;
            $insert->save();
            return redirect('faq');
        }else{
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

        $insert =faq::find($request->id);
        $insert->title = $request->title;
        $insert->description = $request->description;
        $insert->save();
        Session::flash('message','FAQ Updated Successfully');
        return redirect('faq');
    }

    public function faqDelete(Request $request)
    {
        if ($request->delete)
        {
            $data= faq::find($request->delete);
            $data->delete();
            Session::flash('message','FAQ Deleted Successfully');
            return redirect('faq');
        }else{
            echo "Something is wrong";
        }
    }
}
