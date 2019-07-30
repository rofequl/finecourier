<?php

use App\basic_information;
use App\citie;
use App\contact;
use App\country_manage;
use App\our_inmormation;
use App\service;
use App\state;
use App\user;
use App\address;
use App\country;
use MenaraSolutions\Geographer\Earth;

function basic_information()
{
    $data = our_inmormation::all();
    if ($data->count() < 1) {
        $insert = new our_inmormation();
        $insert->id = 1;
        $insert->save();
    }
    $data = basic_information::all();
    if ($data->count() < 1) {
        $insert = new basic_information();
        $insert->status = 0;
        $insert->save();
    }
    $data = basic_information::all()->first();
    return $data;
}

function service()
{
    $data = service::where('status', 1)->get();
    return $data;
}

function our_information()
{
    $data = our_inmormation::all()->first();
    return $data;
}

function contact_us()
{
    $data = contact::limit(1)->get();
    return $data;
}

function get_country_name_by_code($data)
{
    return country::where('code',$data)->first();
}

function check_active_country($data)
{
    $data = country_manage::where('country_code',$data)->first();
    if ($data) {
        return $data;
    } else {
        return false;
    }
}

function get_state_name_by_code($country, $state)
{
    return state::where('country_code',$country)->where('code',$state)->first();
}

function get_city_name_by_code($country,$state,$city)
{
    return citie::where('country_code',$country)->where('state_code',$state)->where('code',$city)->first();
}

function get_user_by_id($data)
{
    $data = user::find($data);
    if ($data) {
        return $data;
    } else {
        return false;
    }
}

function get_address_by_id($data){
    return address::find($data);
}
