<?php

namespace App\Http\Controllers\ajax;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class setInfo extends Controller
{
    public function addCountry(Request $request) { // установка данных в базу
       $country = new Country();
       $country = $request->country_name;
//       dd($request->city_name);
        return json_encode($request['country_name']);
//        if ($companyLib->save()) {return json_encode('запись удалась');}
//        else { return json_encode('Проблема записи');}
    }
}
