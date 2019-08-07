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
    public function AdminCountry()
    {
        $country = country::all();
        return view('admin.country.country', compact('country'));
    }

    public function AdminCountryGet()
    {
        return DataTables::of(country::orderBy('id', 'DESC')->get())->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm">
                        <button class="btn btn-success edit-country" id="' . $country->code . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                      </div>
            ';
        })->addColumn('status', function ($country) {
            if (check_active_country($country->code)) {
                return "<button type = 'button' id = '$country->code' class='btn btn-success btn-xs Change'> Active</button>";
            } else {
                return "<button type = 'button' id = '$country->code' class='btn btn-info btn-xs Change'> Inactive</button>";
            }
        })->rawColumns(['status', 'action'])->make(true);
    }

    public function AdminCountrySingleGet(Request $request)
    {
        return country::where('code', $request->id)->first();
    }

    public function AdminCountryAdd(Request $request)
    {
        $this->validate($request, [
            'code' => 'Required|max:191|unique:countries,code,' . $request->id,
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

        if ($request->id == '') {
            $insert = new country();
        } else {
            $insert = country::find($request->id);
        }
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

    public function AdminCountryDelete(Request $request)
    {
        $category = country::where('code', $request->id)->first();
        if ($category->delete()) {
            echo "1";
        }
    }

    public function AdminState()
    {
        $country = country::all();
        return view('admin.country.state', compact('country'));
    }

    public function AdminStateGet()
    {
        $active_country = country_manage::pluck('country_code')->all();
        return DataTables::of(state::whereIn('country_code',$active_country)->orderBy('id', 'DESC')->get())->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm">
                        <button class="btn btn-success edit-country" id="' . $country->code . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                      </div>
            ';
        })->addColumn('country', function ($country) {
            return country::where('code', $country->country_code)->pluck('name')->first();
        })->make(true);
    }

    public function AdminStateAdd(Request $request)
    {
        $this->validate($request, [
            'code' => 'Required|max:11|unique:states,code,' . $request->id,
            'fipsCode' => 'max:191',
            'isoCode' => 'max:191',
            'geonamesCode' => 'max:11',
            'name' => 'Required|max:191',
            'country_code' => 'Required|max:191',
        ]);

        if ($request->id == '') {
            $insert = new state();
        } else {
            $insert = state::find($request->id);
        }
        $insert->code = $request->code;
        $insert->isoCode = $request->isoCode;
        $insert->geonamesCode = $request->geonamesCode;
        $insert->fipsCode = $request->fipsCode;
        $insert->name = $request->name;
        $insert->country_code = $request->country_code;
        $insert->save();

        return 1;
    }

    public function AdminStateSingleGet(Request $request)
    {
        return state::where('code', $request->id)->first();
    }

    public function AdminStateDelete(Request $request)
    {
        $category = state::where('code', $request->id)->first();
        if ($category->delete()) {
            echo "1";
        }
    }

    public function AdminCity()
    {
        $state = state::select('name', 'code')->get();
        $country = country::all();
        return view('admin.country.city', compact('state', 'country'));
    }

    public function AdminCityGet()
    {
        $active_country = country_manage::pluck('country_code')->all();
        return DataTables::of(citie::whereIn('country_code',$active_country)->get())->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm">
                        <button class="btn btn-success edit-city" id="' . $country->code . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                      </div>
            ';
        })->addColumn('country', function ($country) {
            return country::where('code', $country->country_code)->pluck('name')->first();
        })->addColumn('state', function ($country) {
            return state::where('code', $country->state_code)->pluck('name')->first();
        })->make(true);
    }

    public function AdminCitySingleGet(Request $request)
    {
        return citie::where('code', $request->id)->first();
    }

    public function AdminCityAdd(Request $request)
    {
        $this->validate($request, [
            'code' => 'Required|max:11|unique:cities,code,' . $request->id,
            'geonamesCode' => 'max:11',
            'name' => 'Required|max:191',
            'latitude' => 'max:191',
            'longitude' => 'max:191',
            'population' => 'max:191',
            'country_code' => 'Required|max:191',
            'state_code' => 'Required|max:191',
        ]);

        if ($request->id == '') {
            $insert = new citie();
        } else {
            $insert = citie::find($request->id);
        }
        $insert->code = $request->code;
        $insert->geonamesCode = $request->geonamesCode;
        $insert->name = $request->name;
        $insert->latitude = $request->latitude;
        $insert->longitude = $request->longitude;
        $insert->population = $request->population;
        $insert->country_code = $request->country_code;
        $insert->state_code = $request->state_code;
        $insert->save();

        return 1;
    }

    public function AdminCityDelete(Request $request)
    {
        $category = citie::where('code', $request->id)->first();
        if ($category->delete()) {
            echo "1";
        }
    }

}
