<?php

namespace App\Http\Controllers\Ajax;

use App\Human;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class getHumanCountry extends Controller
{
    public function request(Request $request){

        $Humans = Human::where($request['props1']['name'], '=', $request['props1']['value'])
            ->where($request['props2']['name'], '=', $request['props2']['value'])->pluck('id');
        return json_encode($Humans);
    }
}
