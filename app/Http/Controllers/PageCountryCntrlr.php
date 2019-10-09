<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCountryCntrlr extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request)){
            $title = 'Государство - '. \App\Country::find($request['id'])['name'];
            setcookie("CountryID", $request['id'], time()+84600, "/");
        } else {
            if(!empty($_COOKIE['CountryID'])) {
                $title = 'Государство - '. \App\Country::find($_COOKIE['CountryID'])['name'];
            } else {
                'Государство - не выбрано';
            }
        }

        return view('country', array(
            'title' => $title
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
