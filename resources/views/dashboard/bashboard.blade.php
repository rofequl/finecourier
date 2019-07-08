@extends('dashboard.main')
@section('content2')

    <div class="panel panel-body" style="margin-top: 10px;border: 1px solid #ddd;width: 100%;font-size: 17px">
        Hello User
    </div>
    <div class="panel panel-body"
         style="margin-top: 10px;border: 1px solid #ddd;width: 100%;font-size: 22px;text-align: center">
        <i class="fa fa-cube fa-3x" aria-hidden="true"></i><br>
        New Shipment
    </div>
    <div class="panel" style="margin-top: 10px;border: 1px solid #ddd;width: 100%;font-size: 17px;text-align: center">
        <div class="panel-body">
            <h2>Your Shipments</h2>
            <p style="margin: 24px 0">No Recent Shipment.</p>
        </div>
        <div class="panel-footer">
            Shipment History <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        </div>
    </div>
@endsection