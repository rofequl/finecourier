<?php

namespace App\Http\Controllers;

use App\booking_shipment;
use App\container;
use App\driver;
use App\driver_container;
use App\payment;
use App\shipment;
use Illuminate\Http\Request;
use DataTables;
use Session;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function AdminContainer()
    {
        return view("admin.container");
    }

    public function AdminContainerGet()
    {
        $count = container::all()->count() + 1;
        DB::statement(DB::raw("set @rownum=$count"));
        return DataTables::of(container::get(['*',DB::raw('@rownum  := @rownum  - 1 AS rownum')]))->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm">
                        <button class="btn btn-success edit-country" id="' . $country->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                        <button class="btn btn-success delete" id="' . $country->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>
                      </div>
            ';
        })->addColumn('status', function ($country) {
            if ($country->status == 1) {
                return "<button type = 'button' id = '$country->id' class='btn btn-success btn-xs Change'> Active</button>";
            } else {
                return "<button type = 'button' id = '$country->id' class='btn btn-info btn-xs Change'> Inactive</button>";
            }
        })->rawColumns(['status', 'action'])->addIndexColumn()->make(true);
    }

    public function AdminContainerSingleGet(Request $request)
    {
        return container::where('id', $request->id)->first();
    }

    public function AdminContainerAdd(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'Required',
            'container_number' => 'Required|max:191|unique:containers,container_number,'. $request->id,
        ]);

        if ($request->id == '') {
            $insert = new container();
        }else{
            $insert = container::find($request->id);
        }
        $insert->name = $request->name;
        $insert->container_number = $request->container_number;
        $insert->save();

        return 1;
    }

    public function AdminContainerTrackingCode(Request $request)
    {
        $track = shipment::where('tracking_code', 'LIKE', "%$request->id%")->where('status', 2)->get();
        $track2 = booking_shipment::where('tracking_code', 'LIKE', "%$request->id%")->where('status', 2)->get();
        $data = array();
        if ($track->count() > 0) {
            foreach ($track as $tracks) {
                $data[] = $tracks->tracking_code;
            }
        }

        if ($track2->count() > 0) {
            foreach ($track2 as $tracks) {
                $data[] = $tracks->tracking_code;
            }
        }
        return json_encode($data);
    }

    public function AdminContainerDelete(Request $request)
    {
        $category = container::where('id', $request->id)->first();
        if ($category->delete()) {
            echo "1";
        }
    }

    public function AdminContainerChange(Request $request)
    {
        if ($request->action == 'inactive') {
            $insert = container::find($request->id);
            $insert->status = 0;
            $insert->save();

            return 1;
        } else {
            $insert = container::find($request->id);
            $insert->status = 1;
            $insert->save();

            return 1;
        }
    }

    public function AdminContainerDriver()
    {
        $driver = driver::all();
        $container = container::where('status',1)->get();
        $data = driver_container::all();
        return view("admin.driver.container_driver",compact('driver','container','data'));
    }

    public function AdminContainerDriverDelete(Request $request){

        if ($request->delete) {
            $data = driver_container::find(base64_decode($request->delete));
            $data->delete();
            Session::flash('message', 'Driver by Container delete successfully');
            return redirect('admin-container-driver');
        } else {
            echo "Something is wrong";
        }

    }

    public function AdminContainerDriverGet()
    {
        return DataTables::of(driver_container::all())->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm">
                        <button class="btn btn-success edit-country" id="' . $country->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                        <button class="btn btn-success delete" id="' . $country->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>
                      </div>
            ';
        })->addColumn('status', function ($country) {
            if ($country->status == 1) {
                return "<button type = 'button' id = '$country->id' class='btn btn-success btn-xs Change'> Active</button>";
            } else {
                return "<button type = 'button' id = '$country->id' class='btn btn-info btn-xs Change'> Inactive</button>";
            }
        })->rawColumns(['status', 'action'])->make(true);
    }

    public function AdminContainerDriverAdd(Request $request)
    {
        $this->validate($request, [
            'driver_id' => 'Required',
            'container_code' => 'Required',
        ]);
        $insert = new driver_container();
        $insert->driver_id = $request->driver_id;
        $insert->container_code = $request->container_code;
        $insert->code = 'DC' . rand(100, 999) . time();
        $insert->save();

        Session::flash('message', 'Driver by Container add successfully');
        return redirect('admin-container-driver');
    }


    public function AdminPickup()
    {
        return view("admin.transaction.pickup");
    }

    public function AdminPickupGet(Request $request)
    {
        $this->validate($request, [
            'track' => 'Required|max:191',
        ]);
        $data = shipment::where('tracking_code', $request->track)->first();
        if ($data) {
            $output = array(
                'done' => 'shipment',
                'data' => $data
            );
            return $output;
        } else {
            $data = booking_shipment::where('tracking_code', $request->track)->first();
            if ($data) {
                $output = array(
                    'done' => 'booking',
                    'data' => $data
                );
                return $output;
            } else {
                $output = array(
                    'done' => 'error',
                );
                return json_encode($output);
            }
        }
    }

    public function AdminPickupStatus(Request $request)
    {
        if ($request->id == 1) {
            if ($request->action == 'active') {
                $insert = shipment::find($request->value);
                $insert->status = 2;
                $insert->save();
            } else {
                $insert = shipment::find($request->value);
                $insert->status = 1;
                $insert->save();
            }
        } else {
            if ($request->action == 'active') {
                $insert = booking_shipment::find($request->value);
                $insert->status = 2;
                $insert->save();
            } else {
                $insert = booking_shipment::find($request->value);
                $insert->status = 1;
                $insert->save();
            }
        }
    }

    public function AdminPickupPaymentStatus(Request $request)
    {
        if ($request->id == 1) {
            if ($request->action == 'active') {
                $insert = shipment::find($request->value);
                $insert->payment_status = 1;
                $insert->save();

                $payment = new payment();
                $payment->tracking_code = $insert->tracking_code;
                $payment->price = $insert->price;
                $payment->currency = $insert->currency;
                $payment->save();
            } else {
                $insert = shipment::find($request->value);
                $insert->payment_status = 0;
                $insert->save();

                $payment = payment::where('tracking_code', $insert->tracking_code)->first();
                $payment->delete();
            }
        } else {
            if ($request->action == 'active') {
                $insert = booking_shipment::find($request->value);
                $insert->payment_status = 1;
                $insert->save();

                $payment = new payment();
                $payment->tracking_code = $insert->tracking_code;
                $payment->price = $insert->price;
                $payment->currency = $insert->currency;
                $payment->save();
            } else {
                $insert = booking_shipment::find($request->value);
                $insert->payment_status = 0;
                $insert->save();

                $payment = payment::where('tracking_code', $insert->tracking_code)->first();
                $payment->delete();
            }
        }
    }

    public function AdminBilling(Request $request)
    {
        $shipment_count = shipment::all()->count();
        $user_count = shipment::all()->count();
        $delivered_count = shipment::where('status',5)->get()->count();
        $container_count = container::all()->count();
        $shipment = shipment::orderBy('id','DESC')->paginate(15);
        return view('admin.transaction.billing',compact('shipment','shipment_count','delivered_count',
            'user_count','container_count'));
    }
}
