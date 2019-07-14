<?php

namespace App\Http\Controllers;

use App\domestic_price;
use App\international_price;
use Illuminate\Http\Request;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;

class QuotationController extends Controller
{
    public function ShippingRate()
    {
        $title = 'Shipping rate Calculate';
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        return view('shipping_rate', compact('title', 'earth'));
    }

    public function ShippingRateSearch(Request $request)
    {
        $request->validate([
            'from_country' => 'required',
            'to_country' => 'required',
            'shipping_type' => 'required',
            'weight_type' => 'required',
            'delivery_type' => 'required',
        ]);

        $data = international_price::where('from_country', $request->from_country)
            ->where('to_country', $request->to_country)->where('shipping_type', $request->shipping_type)
            ->where('weight_type', $request->weight_type)->where('delivery_type', $request->delivery_type)->first();
        if ($data) {
            $weight = number_format((float)$request->weight, 2, '.', '') * 1000;
            if ($weight > $data->max_weight) {
                $ExtraWeight2 = ($weight - $data->max_weight) / $data->per_weight;
                if ((int)$ExtraWeight2 < $ExtraWeight2) {
                    $ExtraWeight2 = (int)$ExtraWeight2 + 1;
                }
                $price = ($ExtraWeight2 * $data->price) + $data->max_price;
            } else {
                $price = (int)$data->max_price;
            }
            $output = array(
                'price' => $price,
                'currency'=>$data->currency
            );
            return json_encode($output);
        } else {
            $output = array(
                'error' => 'error'
            );
            return json_encode($output);
        }
    }

    public function ShippingRateSearchDomestic(Request $request)
    {

        $request->validate([
            'from_country' => 'required',
            'FromState' => 'required',
            'FromCity' => 'required',
            'ToState' => 'required',
            'ToCity' => 'required',
            'shipping_type' => 'required',
            'weight_type' => 'required',
            'delivery_type' => 'required',
        ]);

        //dd($request->all());

        $data = domestic_price::where('country', $request->from_country)
            ->where('from_city', $request->FromCity)->where('from_state', $request->FromState)
            ->where('to_city', $request->ToCity)->where('to_state', $request->ToState)
            ->where('shipping_type', $request->shipping_type)
            ->where('weight_type', $request->weight_type)->where('delivery_type', $request->delivery_type)->first();
        if ($data) {
            $weight = number_format((float)$request->weight, 2, '.', '') * 1000;
            if ($weight > $data->max_weight) {
                $ExtraWeight2 = ($weight - $data->max_weight) / $data->per_weight;
                if ((int)$ExtraWeight2 < $ExtraWeight2) {
                    $ExtraWeight2 = (int)$ExtraWeight2 + 1;
                }
                $price = ($ExtraWeight2 * $data->price) + $data->max_price;
            } else {
                $price = (int)$data->max_price;
            }
            $output = array(
                'price' => $price,
                'currency'=>$data->currency
        );
            return json_encode($output);
        } else {
            $output = array(
                'error' => 'error'
            );
            return json_encode($output);
        }
    }


}
