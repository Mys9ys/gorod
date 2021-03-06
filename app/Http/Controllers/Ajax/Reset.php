<?php

namespace App\Http\Controllers\Ajax;

use App\City;
use App\Company;
use App\Country;
use App\Human;
use App\Human_skills;
use App\Transactions;
use App\Treasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar;

class Reset extends Controller
{
    public function reset(Request $request){
        $res = Calendar::latest()->first();
        $res->countDay = 1;
        $res->partDay = 1;
        $res->update();

        $res = new Human();
        $res->truncate();
        $res = new Human_skills();
        $res->truncate();
        $res = new Transactions();
        $res->truncate();
        $res = new Country();
        $res->truncate();
        $res = new City();
        $res->truncate();
        $res = new Company();
        $res->truncate();
        $res = new Treasury();
        $res->truncate();
        setcookie('CountryID','');
        setcookie('CityID','');
    }
}
