<?php

use App\basic_information;
use App\contact;
use App\our_inmormation;
use App\service;
use App\user;
use App\world_zone;
use App\zone_country_manage;
use App\zone_shipping_rate;
use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;

function basic_information(){
    $data = our_inmormation::all();
    if ($data->count()<1){
        $insert = new our_inmormation();
        $insert->id = 1;
        $insert->save();
    }
    $data = basic_information::all();
    if ($data->count()<1){
        $insert = new basic_information();
        $insert->status = 0;
        $insert->save();
    }
    $data = basic_information::all()->first();
    return $data;
}

function service(){
    $data = service::where('status',1)->get();
    return $data;
}

function our_information(){
    $data = our_inmormation::all()->first();
    return $data;
}

function contact_us(){
    $data = contact::limit(1)->get();
    return $data;
}

function country_has_zone($data,$zone = false){
    if ($zone){
        $data = zone_country_manage::where('country',$data)->where('world_zone_id',$zone)->first();
        if ($data){
            return true;
        }else{
            return false;
        }
    }else{
        $data = zone_country_manage::where('country',$data)->first();
        if ($data){
            return true;
        }else{
            return false;
        }
    }
}

function get_country_by_zone($data){
    $data = zone_country_manage::where('world_zone_id',$data)->get();
    if (!$data->isEmpty()){
        return $data;
    }else{
        return false;
    }
}

function get_zone_name_by_id($data){
    $data = world_zone::find($data);
    return $data;
}

function get_country_name_by_code($data){
    $earth = new Earth();
    $thailand = $earth->findOneByCode($data);
    return $thailand;
}

function get_zone_shipping_price($data){
    $data = zone_shipping_rate::where('world_zone_id',$data)->first();
    if ($data){
        return $data;
    }else{
        return false;
    }
}

function get_user_by_id($data){
    $data = user::find($data);
    if ($data){
        return $data;
    }else{
        return false;
    }
}