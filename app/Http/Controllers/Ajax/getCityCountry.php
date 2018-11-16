<?php

namespace App\Http\Controllers\Ajax;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class getCityCountry extends Controller
{
    public function request(Request $request){
        $city = City::where('country', '=', $request->country)->pluck('id', 'name');
        return json_encode($city);
    }
}
