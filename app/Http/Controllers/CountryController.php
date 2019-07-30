<?php

namespace App\Http\Controllers;

use App\citie;
use App\country;
use App\country_manage;
use App\state;
use Illuminate\Http\Request;
use Session;
use DataTables;

class CountryController extends Controller
{
    public function AdminCountry(){
        $country = country::all();
        return view('admin.country.country',compact('country'));
    }

    public function AdminCountryGet(){
        return DataTables::of(country::all())->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm">
                        <button class="btn btn-success edit-country" id="'.$country->code.'" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                        <button class="btn btn-success" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>
                      </div>
            ';
        })->addColumn('status', function ($country) {
            if(check_active_country($country->code)) {
                return "<button type = 'button' id = '$country->code' class='btn btn-success btn-xs Change'> Active</button>";
            }else {
                return "<button type = 'button' id = '$country->code' class='btn btn-info btn-xs Change'> Inactive</button>";
           }
        })->rawColumns(['status', 'action'])->make(true);
    }

    public function AdminCountrySingleGet(Request $request){
        return country::where('code',$request->id)->first();
    }

    public function AdminCountryAdd(Request $request){
        $this->validate($request,[
           'code' => 'Required|max:191|unique:countries,code',
           'code3' => 'max:191',
           'isoCode' => 'max:191',
           'numericCode' => 'max:191',
           'geonamesCode' => 'max:11',
           'fipsCode' => 'max:191',
           'area' => 'max:11',
           'currency' => 'Required|max:191',
           'phonePrefix' => 'max:191',
           'mobileFormat' => 'max:191',
           'landlineFormat' => 'max:191',
           'trunkPrefix' => 'max:191',
           'population' => 'max:11',
           'continent' => 'max:191',
           'language' => 'max:191',
           'name' => 'Required|max:191',
        ]);

        $insert = new country();
        $insert->code = $request->code;
        $insert->code3 = $request->code3;
        $insert->isoCode = $request->isoCode;
        $insert->numericCode = $request->numericCode;
        $insert->geonamesCode = $request->geonamesCode;
        $insert->fipsCode = $request->fipsCode;
        $insert->currency = $request->currency;
        $insert->phonePrefix = $request->phonePrefix;
        $insert->mobileFormat = $request->mobileFormat;
        $insert->landlineFormat = $request->landlineFormat;
        $insert->trunkPrefix = $request->trunkPrefix;
        $insert->population = $request->population;
        $insert->continent = $request->continent;
        $insert->language = $request->language;
        $insert->name = $request->name;
        $insert->save();

        return 1;
    }

    public function AdminState(){
        $state = state::all();
        $country = country::all();
        return view('admin.country.state',compact('state','country'));
    }

    public function AdminStateAdd(Request $request){
        $this->validate($request,[
            'code' => 'Required|max:11|unique:states,code',
            'fipsCode' => 'max:191',
            'isoCode' => 'max:191',
            'geonamesCode' => 'max:11',
            'name' => 'Required|max:191',
            'country_code' => 'Required|max:191',
        ]);

        $insert = new state();
        $insert->code = $request->code;
        $insert->isoCode = $request->isoCode;
        $insert->geonamesCode = $request->geonamesCode;
        $insert->fipsCode = $request->fipsCode;
        $insert->name = $request->name;
        $insert->country_code = $request->country_code;
        $insert->save();

        Session::flash('message', 'State add successfully');
        return redirect('admin-state');
    }

    public function AdminCity(){
        $city = citie::all();
        $state = state::all();
        $country = country::all();
        return view('admin.country.city',compact('state','country','city'));
    }

    public function AdminCityAdd(Request $request){
        $this->validate($request,[
            'code' => 'Required|max:11|unique:cities,code',
            'geonamesCode' => 'max:11',
            'name' => 'Required|max:191',
            'latitude' => 'max:191',
            'longitude' => 'max:191',
            'population' => 'max:191',
            'country_code' => 'Required|max:191',
            'state_code' => 'Required|max:191',
        ]);

        $insert = new citie();
        $insert->code = $request->code;
        $insert->geonamesCode = $request->geonamesCode;
        $insert->name = $request->name;
        $insert->latitude = $request->latitude;
        $insert->longitude = $request->longitude;
        $insert->population = $request->population;
        $insert->country_code = $request->country_code;
        $insert->state_code = $request->state_code;
        $insert->save();

        Session::flash('message', 'City add successfully');
        return redirect('admin-city');
    }

}
