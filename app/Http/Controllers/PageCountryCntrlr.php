<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCountryCntrlr extends Controller
{
    public function index()
    {
        if(!empty($_COOKIE['CountryID'])) {
            $title = 'Государство - '. \App\Country::find($_COOKIE['CountryID'])['name'];
        } else {
            $title = 'Государство';
        }
        return view('country', array(
            'title' => $title
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
