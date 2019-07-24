<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
            <?php
            $img = Image::make(Storage::get('public/logo/' . basic_information()->company_logo));
            $img->encode('png');
            $type = 'png';
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
            ?>
            <div class="w-100 mb-4 pl-5" style="height: 10px">
                <img src="{!! $base64 !!}" class="img-fluid mx-auto d-block"
                     alt="Responsive image">
            </div>
            <div class="text-center" style="font-size: 13px">
                {{basic_information()->address}}<br>
                website: {{basic_information()->website_link}}<br>
                Contact: {{basic_information()->phone_number_one}}<br><br>
                <div class="row justify-content-center">
                    <div class="col-2 pl-3">
                        {!! DNS1D::getBarcodeHTML($shipment->tracking_code, "EAN13") !!}
                    </div>
                </div>
                {{$shipment->tracking_code}}
            </div>
            <table class="w-100 table-bordered" style="font-size: 12px">
                <thead>
                <tr>
                    <th colspan="2">
                        Shipper Information
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{get_address_by_id($shipment->shipper_address)->name}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{get_address_by_id($shipment->shipper_address)->phone_one}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> {{get_address_by_id($shipment->shipper_address)->email}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        {{get_city_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state,get_address_by_id($shipment->shipper_address)->city)->name}}
                        ,
                        {{get_state_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state)->name}}
                        ,
                        {{get_country_name_by_code(get_address_by_id($shipment->shipper_address)->country)->name}}
                        ,
                        {{get_address_by_id($shipment->shipper_address)->post_code}}
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="w-100 table-bordered" style="font-size: 12px">
                <thead>
                <tr>
                    <th colspan="2">
                        Receiver Information
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{get_address_by_id($shipment->receiver_address)->name}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{get_address_by_id($shipment->shipper_address)->phone_one}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> {{get_address_by_id($shipment->shipper_address)->email}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        {{get_city_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state,get_address_by_id($shipment->receiver_address)->city)->name}}
                        ,
                        {{get_state_name_by_code(get_address_by_id($shipment->receiver_address)->country,get_address_by_id($shipment->receiver_address)->state)->name}}
                        ,
                        {{get_country_name_by_code(get_address_by_id($shipment->receiver_address)->country)->name}}
                        ,
                        {{get_address_by_id($shipment->receiver_address)->post_code}}
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="w-100 table-bordered" style="font-size: 12px">
                <thead>
                <tr>
                    <th colspan="2">
                        Billing Information
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{get_address_by_id($shipment->shipper_address)->name}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{get_address_by_id($shipment->shipper_address)->phone_one}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> {{get_address_by_id($shipment->shipper_address)->email}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        {{get_city_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state,get_address_by_id($shipment->shipper_address)->city)->name}}
                        ,
                        {{get_state_name_by_code(get_address_by_id($shipment->shipper_address)->country,get_address_by_id($shipment->shipper_address)->state)->name}}
                        ,
                        {{get_country_name_by_code(get_address_by_id($shipment->shipper_address)->country)->name}}
                        ,
                        {{get_address_by_id($shipment->shipper_address)->post_code}}
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="w-100 table-bordered" style="font-size: 12px">
                <thead>
                <tr>
                    <th colspan="4">
                        Product and pricing Information
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Quantity</td>
                    <td>Shipping type</td>
                    <td>Weight</td>
                    <td>Product value</td>
                </tr>
                <tr>
                    <td>{{$shipment->peace}}</td>
                    <td>{{$shipment->shipping_type}}</td>
                    <td>{{$shipment->weight}} {{$shipment->weight_type}}</td>
                    <td>{{$shipment->good_value}} {{$shipment->origin_currency}}</td>
                </tr>
                </tbody>
            </table>
            <table class="w-100 table-bordered" style="font-size: 12px">
                <thead>
                <tr>
                    <th>
                        Shipping Charge
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-center">
                        <b>
                            {{$shipment->price}}
                            {{$shipment->currency}}
                        </b>
                    </th>
                </tr>
                </tbody>
            </table>
            <table class="w-100" style="font-size: 12px">
                <tbody>
                <tr>
                    <th>Merchant Signature</th>
                    <th>Shipper Signature</th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px dotted black" class="mt-5"></th>
                    <th style="border-bottom: 1px dotted black" class="mt-5"></th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
