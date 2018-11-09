<?php

namespace App\Http\Controllers\Ajax;

use App\Calendar;
use App\Country;
use App\Human;
use App\Human_skills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class addHuman extends Controller
{
    public function add(Request $request)
    {
//        $letter1 = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'];
//        $letter2 = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'];
//        $letter3 = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'];

        foreach ($request->all() as $arHumans){
            dd($_COOKIE);
            $country = Country::find($_COOKIE['CountryID']);
            $country->population=count($arHumans);
            $country->save();
            foreach ($arHumans as $human){
                $res = new Human();
                $res->name=$human['name'];
                $res->born_city=$human['city'];
                $res->born_date=Calendar::pluck('countDay')->first();
                $res->save();
                $skill = new Human_skills();
                $skill->skill=0;
                $skill->save();
            }
        }
        return json_encode('yra');
    }
}
