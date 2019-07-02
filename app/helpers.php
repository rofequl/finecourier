<?php

use App\basic_information;
use App\service;

function basic_information(){
    $data = basic_information::all();
    if ($data->count()>0){
        $data = basic_information::all()->first();
    }else{
        $insert = new basic_information();
        $insert->status = 0;
        $insert->save();
    }
    $data = basic_information::all()->first();
    return $data;
}

function service(){
    $data = service::all();
    return $data;
}