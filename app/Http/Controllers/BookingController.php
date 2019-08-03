<?php

namespace App\Http\Controllers;

use App\booking_shipment;
use App\container;
use App\driver_container;
use App\shipment;
use Illuminate\Http\Request;
use DataTables;

class BookingController extends Controller
{
    public function AdminContainer(){
        return view("admin.container");
    }

    public function AdminContainerGet()
    {
        return DataTables::of(container::all())->addColumn('action', function ($country) {
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

    public function AdminContainerAdd(Request $request){
        $this->validate($request, [
            'name' => 'Required|max:191',
            'tracking_code' => 'Required',
        ]);
        $insert = new container();
        $insert->name = $request->name;
        $insert->tracking_code = $request->tracking_code;
        $insert->code = 'CC'.rand(100,999).time();
        $insert->save();

        return 1;
    }

    public function AdminContainerTrackingCode(Request $request){
        $track = shipment::where('tracking_code', 'LIKE', "%$request->id%")->get();
        $track2 = booking_shipment::where('tracking_code', 'LIKE', "%$request->id%")->get();
        $data = array();
        if ($track->count() > 0){
            foreach ($track as $tracks){
                $data[] = $tracks->tracking_code;
            }
        }

        if ($track2->count() > 0){
            foreach ($track2 as $tracks){
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

    public function AdminContainerDriver(){
        return view("admin.driver.container_driver");
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

    public function AdminContainerDriverAdd(Request $request){
        $this->validate($request, [
            'driver_id' => 'Required|max:191',
            'container_code' => 'Required',
        ]);
        $insert = new driver_container();
        $insert->driver_id = $request->driver_id;
        $insert->container_code = $request->container_code;
        $insert->code = 'DC'.rand(100,999).time();
        $insert->save();

        return 1;
    }

    public function AdminContainerContainerCode(Request $request){
        $track = container::where('code', 'LIKE', "%$request->id%")->get();
        $data = array();
        if ($track->count() > 0){
            foreach ($track as $tracks){
                $data[] = $tracks->code;
            }
        }
        return json_encode($data);
    }
}
