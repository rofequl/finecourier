<?php

namespace App\Http\Controllers;

use App\booking_shipment;
use App\citie;
use App\domestic_price;
use App\country_manage;
use App\international_price;
use App\shipment;
use App\state;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use MenaraSolutions\Geographer\City;
use Session;
use Mail;
use MenaraSolutions\Geographer\Earth;
use App\Country;

class ShippingpriceController extends Controller
{


    public function AdminCountry()
    {
        $earth = new Earth();
        $earth = $earth->getCountries()->toArray();


//        foreach ($earth as $earths) {
//            $insert = new country();
//            $insert->code = $earths['code'];
//            $insert->code3 = $earths['code3'];
//            $insert->isoCode = $earths['isoCode'];
//            $insert->numericCode = $earths['numericCode'];
//            $insert->geonamesCode = $earths['geonamesCode'];
//            $insert->fipsCode = $earths['fipsCode'];
//            $insert->area = $earths['area'];
//            $insert->currency = $earths['currency'];
//            $insert->phonePrefix = $earths['phonePrefix'];
//            $insert->mobileFormat = $earths['mobileFormat'];
//            $insert->landlineFormat = $earths['landlineFormat'];
//            $insert->trunkPrefix = $earths['trunkPrefix'];
//            $insert->population = $earths['population'];
//            $insert->continent = $earths['continent'];
//            $insert->language = $earths['language'];
//            $insert->name = $earths['name'];
//            $insert->save();
//        }


//        foreach ($glove as $gloves) {
//            $state = $earth->findOneByCode($gloves['code']);
//            $state = $state->getStates()->toArray();
//            foreach ($state as $states) {
//                $insert = new state();
//                $insert->code = $states['code'];
//                $insert->fipsCode = $states['fipsCode'];
//                $insert->isoCode = $states['isoCode'];
//                $insert->geonamesCode = $states['geonamesCode'];
//                $insert->name = $states['name'];
//                $insert->country_code = $gloves['code'];
//                $insert->save();
//            }
//        }

//        foreach ($glove as $gloves) {
//            $statet = $earth->findOneByCode($gloves['code']);
//            $state = $statet->getStates()->toArray();
//            foreach ($state as $states) {
//                $city = $statet->getStates()->find(['code' => $states['code']])->first()->getCities()->toArray();
//                foreach ($city as $citys) {
//                    $insert = new citie();
//                    $insert->code = $citys['code'];
//                    $insert->geonamesCode = $citys['geonamesCode'];
//                    $insert->latitude = $citys['latitude'];
//                    $insert->longitude = $citys['longitude'];
//                    $insert->population = $citys['population'];
//                    $insert->state_code = $states['code'];
//                    $insert->country_code = $gloves['code'];
//                    $insert->save();
//                }
//            }
//        }
        //dd(' ');


        return view('admin.shipping_price.country_manage', compact('earth'));
    }

    public function AdminCountryChange(Request $request)
    {
        if ($request->action == 'inactive') {
            $insert = country_manage::where('country_code', $request->id)->first();
            $insert->delete();
        } else {
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
        $earth = new Earth();
        $earth = $earth->findOneByCode($request->id);
        return json_encode($earth->getStates()->toArray());
    }

    public function SelectCity(Request $request)
    {
        $earth = new Earth();
        $earth = $earth->findOneByCode($request->country);
        return json_encode($earth->getStates()->find(['code' => $request->id])->first()->getCities()->toArray());
    }

    public function SelectCountryCode(Request $request)
    {
        $earth = new Earth();
        $earth = $earth->findOneByCode($request->id);
        return json_encode($earth->toArray());
    }

    public function AdminInternationalAdd(Request $request)
    {
        $request->validate([
            'from_country' => 'required',
            'to_country' => 'required',
            'shipping_type' => 'required',
            'weight_type' => 'required',
            'delivery_type' => 'required',
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
        $insert->delivery_type = $request->delivery_type;
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
        $insert->delivery_type = $request->delivery_type;
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

    public function AdminShipment()
    {
        $shipping = shipment::orderBy('id', 'DESC')->paginate(15);
        return view('admin.shipment.shipment', compact('shipping'));
    }

    public function AdminShipmentView(Request $request)
    {
        $shipment = shipment::find(base64_decode($request->data));
        return view('admin.shipment.shipment_view', compact('shipment'));
    }

    public function AdminShipmentBlock(Request $request)
    {
        if ($request->block) {
            $data = shipment::find(base64_decode($request->block));
            $data->status = 5;
            $data->save();
            Session::flash('message', 'Shipment has been rejected');
            return redirect()->back();
        } elseif ($request->approve) {
            $data = shipment::find(base64_decode($request->approve));
            $data->status = 1;
            $data->save();
            Session::flash('message', 'Shipment has been Approve');
            return redirect()->back();
        }
    }

    public function AdminBookingRequest()
    {
        $shipping = booking_shipment::orderBy('id', 'DESC')->paginate(15);
        return view('admin.shipment.booking_shipment', compact('shipping'));
    }

    public function AdminBookingRequestView(Request $request)
    {
        $country = country::all();
        $shipping = booking_shipment::find(base64_decode($request->data));
        return view('admin.shipment.booking_shipment_view', compact('shipping', 'country'));
    }

    public function AdminBookingRequestAction(Request $request)
    {
        if ($request->delete) {
            $data = booking_shipment::find(base64_decode($request->delete));
            $data->delete();
            Session::flash('message', 'Booking request Deleted Successfully');
            return redirect('admin-booking-request');
        } elseif ($request->block) {
            $data = booking_shipment::find(base64_decode($request->block));
            $data->status = 5;
            $data->save();
            Session::flash('message', 'Shipment has been rejected');
            return redirect()->back();
        } elseif ($request->unblock) {
            $data = booking_shipment::find(base64_decode($request->unblock));
            $data->status = 1;
            $data->save();
            Session::flash('message', 'Shipment has been Approve');
            return redirect()->back();
        }
    }

    public function AdminBookingRequestApprove(Request $request)
    {
        $request->validate([
            'price' => 'required',
        ]);
        $insert = booking_shipment::find($request->id);
        $insert->price = $request->price;
        $insert->currency = $request->currency;
        $insert->status = 1;
        $insert->tracking_code = rand(1000, 9999) . str_pad($request->id, 4, "0", STR_PAD_LEFT);
        $insert->save();

        Session::flash('message', 'Booking request has been Approve');
        return redirect()->back();
    }

    public function AdminShippingRate()
    {
        $country = country::all();
        return view('admin.shipping_price.shipping_rate', compact('country'));
    }

    public function AdminCreateShipping()
    {
        $country = country::all();
        return view('admin.shipment.create_shipment', compact('country'));
    }

    public function AdminSandMail(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:200',
            'message' => 'required',
        ]);
        Mail::send(array(), array(), function ($message) use ($request) {
            $message->to($request->mail)->subject($request->subject);
            $message->from('finecourier@gmail.com', 'Finecourier')
                ->setBody($request->message, 'text/html');
        });
        return 1;
    }

    public function AdminManageShipmentAll()
    {
        $shipment = shipment::all();
        $booking = booking_shipment::all();
        $collection = new \Illuminate\Support\Collection();
        $sortedCollection = $collection->merge($shipment)->merge($booking)->sortBy('created_at');
        $sortedCollection = $this->paginate($sortedCollection);
        return view('admin.manage_shipment.all', compact('sortedCollection'));
    }

    public function paginate($items, $perPage = 2, $page = null, $baseUrl = 'admin-manage-shipment-all', $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }
        return $lap;
    }
}
