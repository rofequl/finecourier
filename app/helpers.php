<?php

use App\basic_information;
use App\contact;
use App\our_inmormation;
use App\service;

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

function contact_us(){
    $data = contact::limit(1)->get();
    return $data;
}