<?php

namespace App\Http\Controllers;

use App\address;
use App\domestic_price;
use App\international_price;
use App\shipment;
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

    public function PrepareShipmentAdd(Request $request)
    {
        $request->validate([
            'shipper_address' => 'required',
            'receiver_address' => 'required',
            'shipping_type' => 'required',
            'peace' => 'required|max:11',
            'weight' => 'required|max:11',
            'weight_type' => 'required|max:11',
            'origin_country' => 'required',
            'good_value' => 'required|max:11',
            'origin_currency' => 'required',
            'shipment_reference' => 'max:191',
            'payment_type' => 'required',
            'delivery_type' => 'required',
        ]);

        if ($request->shipping_type == "Parcel"){
            $request->validate([
                'parcel_content' => 'required|max:191',
            ]);
        }

        if ($request->submit == 'done'){
            dd('okfgdjjkf');
        }
        //dd($request->all());
        $shipper_address = address::find($request->shipper_address);
        $receiver_address = address::find($request->receiver_address);

        if ($shipper_address->country == $receiver_address->country){
            dd("same");
        }else{
             $data = international_price::where('from_country', $shipper_address->country)
                ->where('to_country', $receiver_address->country)->where('shipping_type', $request->shipping_type)
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
                    'currency'=>$data->currency,
                    'shipper_address'=>$shipper_address->country,
                    'receiver_address'=>$receiver_address->country

                );
                return json_encode($output);
            } else {
                $output = array(
                    'error' => 'error'
                );
                return json_encode($output);
            }
        }


        dd($request->all());
    }

    public function PrepareShipmentSubmit(Request $request)
    {
        $request->validate([
            'shipper_address' => 'required',
            'receiver_address' => 'required',
            'shipping_type' => 'required',
            'peace' => 'required|max:11',
            'weight' => 'required|max:11',
            'weight_type' => 'required|max:11',
            'origin_country' => 'required',
            'good_value' => 'required|max:11',
            'origin_currency' => 'required',
            'shipment_reference' => 'max:191',
            'payment_type' => 'required',
            'delivery_type' => 'required',
        ]);

        if ($request->shipping_type == "Parcel"){
            $request->validate([
                'parcel_content' => 'required|max:191',
            ]);
        }


        $shipper_address = address::find($request->shipper_address);
        $receiver_address = address::find($request->receiver_address);

        if ($shipper_address->country == $receiver_address->country){
            dd("same");
        }else{
            $data = international_price::where('from_country', $shipper_address->country)
                ->where('to_country', $receiver_address->country)->where('shipping_type', $request->shipping_type)
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

                $insert = new shipment();
                $insert->shipper_address = $request->shipper_address;
                $insert->receiver_address = $request->receiver_address;
                $insert->shipping_type = $request->shipping_type;
                $insert->peace = $request->peace;
                $insert->weight = $request->weight;
                $insert->weight_type = $request->weight_type;
                $insert->parcel_content = $request->parcel_content;
                $insert->origin_country = $request->origin_country;
                $insert->good_value = $request->good_value;
                $insert->origin_currency = $request->origin_currency;
                $insert->payment_type = $request->payment_type;
                $insert->delivery_type = $request->delivery_type;
                $insert->user_id = session('user-id');
                $insert->price = $price;
                $insert->currency = $data->currency;
                $insert->address_one = get_country_name_by_code($data->from_country)->name;
                $insert->address_two = get_country_name_by_code($data->to_country)->name;
                $insert->save();

                $output = array(
                    'done' => 'done'
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

    public function PrepareShipmentDelete(Request $request)
    {
        if ($request->delete) {
            $data = shipment::find($request->delete);
            $data->delete();
            return redirect('dashboard');
        } else {
            echo "Something is wrong";
        }
    }

    public function PrepareShipmentEdit($id)
    {
        $shipment = shipment::where('user_id',session('user-id'))->where('id',$id)->first();
        return view('dashboard.shipment_edit',compact('shipment'));
    }

    public function PrepareShipmentDone($id)
    {
        $shipment = shipment::where('user_id',session('user-id'))->where('id',$id)->first();
        $shipment->tracking_code = rand(1000,9999).str_pad($id, 3, "0", STR_PAD_LEFT).str_pad(session('user-id'), 3, "0", STR_PAD_LEFT);
        $shipment->status = 1;
        $shipment->save();

        return redirect('dashboard');
    }
}
