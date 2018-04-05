<?php

namespace App\Http\Controllers\ajax;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class setInfo extends Controller
{
    public function addCountry(Request $request) { // установка данных в базу
       $country = new Country();
       $country->name = $request->country_name;
       $country->save();
       $city = new City();
       $city->name = $request->city_name;
       $city->country = $country->id;
       $city->save();
        return json_encode($city->id);
    }
}
