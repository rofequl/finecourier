<?php

use App\basic_information;

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