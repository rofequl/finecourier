<?php

namespace App\Http\Controllers;

use App\country_shipping_rate;
use App\world_zone;
use App\zone_country_manage;
use App\zone_shipping_rate;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;
use Session;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function AdminWorldZone($id = false)
    {
        if ($id) {
            $data = world_zone::all();
            $oneData = world_zone::find($id);
            return view('admin.quotation.world_zone', compact('data', 'oneData'));
        } else {
            $data = world_zone::all();
            return view('admin.quotation.world_zone', compact('data'));
        }
    }

    public function AdminWorldZoneAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
        ]);

        $insert = new world_zone();
        $insert->name = $request->name;
        $insert->save();
        Session::flash('message', 'World zone add successfully');
        return redirect('admin-world-zone');
    }

    public function AdminWorldZoneUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
        ]);

        $insert = world_zone::find($request->id);
        $insert->name = $request->name;
        $insert->save();
        Session::flash('message', 'World zone update successfully');
        return redirect('admin-world-zone');
    }

    public function AdminWorldZoneDelete(Request $request)
    {
        if ($request->delete) {

            if (get_country_by_zone($request->delete)) {
                Session::flash('message', 'World zone already add country list, You can\'t delete.');
                return redirect('admin-world-zone');
            } elseif (get_zone_shipping_price($request->delete)) {
                Session::flash('message', 'World zone already add price list, You can\'t delete.');
                return redirect('admin-world-zone');
            } else {
                $data = world_zone::find($request->delete);
                $data->delete();
                Session::flash('message', 'World zone Delete Successfully.');
                return redirect('admin-world-zone');
            }
        } else {
            echo "Something Wrong";
        }
    }

    public function AdminCountryManage($id = false)
    {
        $zone = world_zone::all();
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        if ($id) {
            $data = zone_country_manage::distinct()->get('world_zone_id');
            $oneData = $id;
            return view('admin.quotation.country_manage', compact('data', 'oneData', 'zone', 'earth'));
        } else {
            $data = zone_country_manage::distinct()->get('world_zone_id');
            return view('admin.quotation.country_manage', compact('data', 'zone', 'earth'));
        }
    }

    public function AdminCountryManageAdd(Request $request)
    {
        $request->validate([
            'zone_id' => 'required',
            'country' => 'required',
        ]);

        foreach ($request->country as $country) {
            $insert = new zone_country_manage();
            $insert->world_zone_id = $request->zone_id;
            $insert->country = $country;
            $insert->save();
        }

        Session::flash('message', 'World zone country add successfully');
        return redirect('admin-country-manage');
    }

    public function AdminCountryManageUpdate(Request $request)
    {
        $request->validate([
            'country' => 'required',
        ]);
        $data = zone_country_manage::where('world_zone_id', $request->id)->delete();

        foreach ($request->country as $country) {
            $insert = new zone_country_manage();
            $insert->world_zone_id = $request->id;
            $insert->country = $country;
            $insert->save();
        }

        Session::flash('message', 'World zone country update successfully');
        return redirect('admin-country-manage');
    }

    public function AdminCountryManageDelete(Request $request)
    {
        if ($request->delete) {
            $data = zone_country_manage::where('world_zone_id', $request->delete)->delete();
            Session::flash('message', 'World zone country Delete Successfully');
            return redirect('admin-country-manage');
        } else {
            echo "Something Wrong";
        }
    }

    public function AdminShippingRate($id = false)
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $zone = world_zone::all();
        if ($id) {
            $data = country_shipping_rate::all();
            $oneData = country_shipping_rate::find($id);
            return view('admin.quotation.shipping_rate', compact('data', 'oneData', 'earth'));
        } else {
            $data = country_shipping_rate::all();
            return view('admin.quotation.shipping_rate', compact('data', 'zone', 'earth'));
        }
    }

    public function AdminShippingRateAdd(Request $request)
    {
        $request->validate([
            'from_country' => 'required',
            'to_country' => 'required',
            'price' => 'required|max:191',
        ]);


        $insert = new country_shipping_rate();
        $insert->from_country = $request->from_country;
        $insert->to_country = $request->to_country;
        $insert->price = $request->price;
        $insert->save();


        Session::flash('message', 'Country price add successfully');
        return redirect('admin-shipping-rate');
    }

    public function AdminShippingRateUpdate(Request $request)
    {
        $request->validate([
            'from_country' => 'required',
            'to_country' => 'required',
            'price' => 'required|max:191',
        ]);


        $insert = country_shipping_rate::find($request->id);
        $insert->from_country = $request->from_country;
        $insert->to_country = $request->to_country;
        $insert->price = $request->price;
        $insert->save();


        Session::flash('message', 'Country price Update successfully');
        return redirect('admin-shipping-rate');
    }

    public function AdminShippingRateDelete(Request $request)
    {
        if ($request->delete) {
            $data = country_shipping_rate::find($request->delete);
            $data->delete();
            Session::flash('message', 'Country price Delete Successfully');
            return redirect('admin-shipping-rate');
        } else {
            echo "Something Wrong";
        }
    }

    public function ShippingRate()
    {

        $data = world_zone::all();
        $title = "Shipping Rate";
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        return view('shipping_rate', compact('data', 'title', 'earth'));

    }

    public function ShippingRateSearch(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'weight' => 'required|max:191',
        ]);

        $insert = country_shipping_rate::where('from_country', $request->from)->where('to_country', $request->to)->first();

        if ($insert) {
            $rate = ($request->weight * 1000) * $insert->price;
        } else {
            $rate = null;
        }


        $data = world_zone::all();
        $title = "Shipping Rate";
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        return view('shipping_rate', compact('data', 'title', 'earth','rate'));
    }

}
