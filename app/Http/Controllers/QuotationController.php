<?php

namespace App\Http\Controllers;

use App\address;
use App\booking_shipment;
use App\domestic_price;
use App\international_price;
use App\shipment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use MenaraSolutions\Geographer\Earth;

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



    public function BookingShipment()
    {
        $title = 'Booking Shipment';
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        return view('booking_shipment', compact('title', 'earth'));

    }

    public function BookingShipmentPost(Request $request)
    {
        //dd($request->all());
        if ($request->booking_type == 1){
            $request->validate([
                'from_country' => 'required',
                'to_country' => 'required',
                'shipping_type' => 'required',
                'delivery_type' => 'required',
                'weight' => 'required|max:11',
                'weight_type' => 'required',
                'dimenshion' => 'max:191',
                'shipper_name' => 'required|max:191',
                'shipper_phone' => 'required|max:191',
                'shipper_email' => 'required|max:191',
                'shipper_address' => 'required',
                'receiver_name' => 'required|max:191',
                'receiver_phone' => 'required|max:191',
                'receiver_email' => 'required|max:191',
                'receiver_address' => 'required',
            ]);

            $insert = new booking_shipment();
            $insert->booking_type = $request->booking_type;
            $insert->from_country = $request->from_country;
            $insert->to_country = $request->to_country;
            $insert->shipping_type = $request->shipping_type;
            $insert->delivery_type = $request->delivery_type;
            $insert->dimenshion = $request->dimenshion;
            $insert->weight = $request->weight;
            $insert->weight_type = $request->weight_type;
            $insert->shipper_name = $request->shipper_name;
            $insert->shipper_phone = $request->shipper_phone;
            $insert->shipper_email = $request->shipper_email;
            $insert->shipper_address = $request->shipper_address;
            $insert->receiver_name = $request->receiver_name;
            $insert->receiver_phone = $request->receiver_phone;
            $insert->receiver_email = $request->receiver_email;
            $insert->receiver_address = $request->receiver_address;
            $insert->save();

            return 1;
        }else{
            $request->validate([
                'pickup_date' => 'required|max:191',
                'pickup_delivery' => 'required|max:191',
                'from_country' => 'required',
                'shipping_type' => 'required',
                'delivery_type' => 'required',
                'weight' => 'required|max:11',
                'weight_type' => 'required',
                'dimenshion' => 'max:191',
                'shipper_name' => 'required|max:191',
                'shipper_phone' => 'required|max:191',
                'shipper_email' => 'required|max:191',
                'shipper_address' => 'required',
                'receiver_name' => 'required|max:191',
                'receiver_phone' => 'required|max:191',
                'receiver_email' => 'required|max:191',
                'receiver_address' => 'required',
            ]);

            $insert = new booking_shipment();
            $insert->booking_type = $request->booking_type;
            $insert->pickup_date = $request->pickup_date;
            $insert->pickup_delivery = $request->pickup_delivery;
            $insert->from_country = $request->from_country;
            $insert->shipping_type = $request->shipping_type;
            $insert->delivery_type = $request->delivery_type;
            $insert->dimenshion = $request->dimenshion;
            $insert->weight = $request->weight;
            $insert->weight_type = $request->weight_type;
            $insert->shipper_name = $request->shipper_name;
            $insert->shipper_phone = $request->shipper_phone;
            $insert->shipper_email = $request->shipper_email;
            $insert->shipper_address = $request->shipper_address;
            $insert->receiver_name = $request->receiver_name;
            $insert->receiver_phone = $request->receiver_phone;
            $insert->receiver_email = $request->receiver_email;
            $insert->receiver_address = $request->receiver_address;
            $insert->save();

            return 2;
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
            $data = domestic_price::where('country', $shipper_address->country)
                ->where('from_state', $shipper_address->state)
                ->where('from_city', $shipper_address->city)->where('to_state', $receiver_address->state)
                ->where('to_city', $receiver_address->city)->where('shipping_type', $request->shipping_type)
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
                    'shipper_address'=>get_city_name_by_code($shipper_address->country,$shipper_address->state,$shipper_address->city)->name,
                    'receiver_address'=>get_city_name_by_code($receiver_address->country,$receiver_address->state,$receiver_address->city)->name

                );
                return json_encode($output);
            } else {
                $output = array(
                    'error' => 'error'
                );
                return json_encode($output);
            }
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
                    'shipper_address'=>get_country_name_by_code($shipper_address->country)->name,
                    'receiver_address'=>get_country_name_by_code($receiver_address->country)->name

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
            $data = domestic_price::where('country', $shipper_address->country)
                ->where('from_state', $shipper_address->state)
                ->where('from_city', $shipper_address->city)->where('to_state', $receiver_address->state)
                ->where('to_city', $receiver_address->city)->where('shipping_type', $request->shipping_type)
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
                //dd($data->from_country);
                $insert = new shipment();
                $insert->shipper_address = $request->shipper_address;
                $insert->receiver_address = $request->receiver_address;
                $insert->shipping_type = $request->shipping_type;
                $insert->shipment = 2;
                $insert->peace = $request->peace;
                $insert->weight = $request->weight;
                $insert->weight_type = $request->weight_type;
                $insert->parcel_content = $request->parcel_content;
                $insert->origin_country = $request->origin_country;
                $insert->good_value = $request->good_value;
                $insert->origin_currency = $request->origin_currency;
                $insert->delivery_type = $request->delivery_type;
                $insert->user_id = session('user-id');
                $insert->price = $price;
                $insert->currency = $data->currency;
                $insert->address_one = get_city_name_by_code($shipper_address->country,$shipper_address->state,$shipper_address->city)->name;
                $insert->address_two = get_city_name_by_code($receiver_address->country,$receiver_address->state,$receiver_address->city)->name;
                $insert->save();
                $output = array(
                    'done' => 'done',
                    'id'=>$insert->id
                );

                return json_encode($output);
            } else {
                $output = array(
                    'error' => 'error'
                );
                return json_encode($output);
            }
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
                $insert->shipment = 1;
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
                    'done' => 'done',
                    'id'=>$insert->id
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
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::all();
        $shipment = shipment::where('user_id',session('user-id'))->where('id',$id)->first();
        if ($shipment->status == 1){
            return redirect('dashboard');
        }
        return view('dashboard.shipment_edit',compact('shipment','address','earth'));
    }

    public function PrepareShipmentView(Request $request)
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();
        $address = address::all();
        $shipment = shipment::where('user_id',session('user-id'))->where('id',base64_decode($request->data))->first();
        return view('dashboard.shipment_view',compact('shipment','address','earth'));
    }

    public function PrepareShipmentDone(Request $request)
    {

        $request->validate([
            'biller_address' => 'required',
            'payment_type' => 'required'
        ]);
        $shipment = shipment::where('user_id',session('user-id'))->where('id',$request->id)->first();
        $shipment->tracking_code = rand(1000,9999).str_pad($request->id, 3, "0", STR_PAD_LEFT).str_pad(session('user-id'), 3, "0", STR_PAD_LEFT);
        $shipment->status = 1;
        $shipment->biller_address = $request->biller_address;
        $shipment->payment_type = $request->payment_type;
        $shipment->save();

        return 1;
    }

    public function ShipmentLabel($id)
    {
        $shipment = shipment::where('user_id',session('user-id'))->where('id',base64_decode($id))->first();

        //return view('pdf.label',compact('shipment'));

        $pdf = PDF::loadView('pdf.label',compact('shipment'));
        return $pdf->setPaper('A4', 'portrait')->download('invoice.pdf');
    }
}
