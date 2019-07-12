<?php

namespace App\Http\Controllers;

use App\domestic_price;
use App\country_manage;
use App\international_price;
use Illuminate\Http\Request;
use Session;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;

class ShippingpriceController extends Controller
{

    public function AdminCountry()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        //dd($earth);
        return view('admin.shipping_price.country_manage', compact( 'earth'));
    }

    public function AdminCountryChange(Request $request)
    {
        if ($request->action == 'inactive'){
            $insert = country_manage::where('country_code',$request->id)->first();
            $insert->delete();
        }else{
            $insert = new country_manage();
            $insert->country_code = $request->id;
            $insert->save();
        }
    }

    public function AdminInternational()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $data = international_price::all();
        return view('admin.shipping_price.international', compact('data', 'earth'));
    }

    public function SelectState(Request $request)
    {
        $earth = Country::build($request->id);
        return json_encode($earth->getStates()->toArray());
    }

    public function SelectCity(Request $request)
    {
        $earth = Country::build($request->country);
        return json_encode($earth->getStates()->find(['code' => $request->id])->first()->getCities()->toArray());
    }

    public function SelectCountryCode(Request $request)
    {
        $earth = Country::build($request->id);
        return json_encode($earth->toArray());
    }

    public function AdminInternationalAdd(Request $request)
    {
        $request->validate([
            'from_country' => 'required',
            'to_country' => 'required',
            'shipping_type' => 'required',
            'weight_type' => 'required',
            'payment_option' => 'required',
            'max_weight' => 'required',
            'max_price' => 'required',
            'per_weight' => 'required',
            'price' => 'required',
            'currency' => 'required',
        ]);
        $insert = new international_price();
        $insert->from_country = $request->from_country;
        $insert->to_country = $request->to_country;
        $insert->shipping_type = $request->shipping_type;
        $insert->weight_type = $request->weight_type;
        $insert->payment_option = $request->payment_option;
        $insert->max_weight = $request->max_weight;
        $insert->max_price = $request->max_price;
        $insert->per_weight = $request->per_weight;
        $insert->price = $request->price;
        $insert->currency = $request->currency;
        $insert->save();

        Session::flash('message', 'International price add successfully');
        return redirect('admin-international');
    }

    public function AdminInternationalDelete(Request $request)
    {
        if ($request->delete) {
            $data = international_price::find($request->delete);
            $data->delete();
            Session::flash('message', 'International price Deleted Successfully');
            return redirect('admin-international');
        } else {
            echo "Something is wrong";
        }
    }

    public function AdminDomestic()
    {
        $earth = new Earth();
        //$earth = Country::build('BD');

        $earth = $earth->getCountries(); //Get all Country
        //$earth = $earth->findOneByCode('TH');  //Get one Country
        //$earth = Country::build('BD');  //Get one Country
        //$earth->getStates()->find(['code' => 1337179])->toArray() //Get Single State
        //$earth->getStates()->find(['code' => 1337179])->first()->getCities()->toArray() //Get all city
        $data = domestic_price::all();
        return view('admin.shipping_price.domestic', compact('data', 'earth'));
    }

    public function AdminDomesticAdd(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'from_city' => 'required',
            'from_state' => 'required',
            'to_city' => 'required',
            'to_state' => 'required',
            'shipping_type' => 'required',
            'weight_type' => 'required',
            'max_weight' => 'required',
            'max_price' => 'required',
            'per_weight' => 'required',
            'price' => 'required',
            'currency' => 'required',
        ]);
        $insert = new domestic_price();
        $insert->country = $request->country;
        $insert->from_city = $request->from_city;
        $insert->from_state = $request->from_state;
        $insert->to_city = $request->to_city;
        $insert->to_state = $request->to_state;
        $insert->shipping_type = $request->shipping_type;
        $insert->weight_type = $request->weight_type;
        $insert->max_weight = $request->max_weight;
        $insert->max_price = $request->max_price;
        $insert->per_weight = $request->per_weight;
        $insert->price = $request->price;
        $insert->currency = $request->currency;
        $insert->save();

        Session::flash('message', 'Domestic price add successfully');
        return redirect('admin-domestic');
    }

    public function AdminDomesticDelete(Request $request)
    {
        if ($request->delete) {
            $data = domestic_price::find($request->delete);
            $data->delete();
            Session::flash('message', 'Domestic price Deleted Successfully');
            return redirect('admin-domestic');
        } else {
            echo "Something is wrong";
        }
    }
}
