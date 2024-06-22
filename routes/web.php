<?php

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $requestIP = $request->ip();

    $headers = $request->header();
    $headerString = "";

    foreach($headers as $header => $value){

        if(is_array($value)){
            $value = implode(',', $value);
        }

        $headerString .= $header . ": " . $value . " ; \n";

    }
    $fullData = $headerString;

    $visit = new Visit;

    $visit->IP_address = $requestIP;
    $visit->data = $fullData;

    $visit->save();

    return view('welcome');
});
