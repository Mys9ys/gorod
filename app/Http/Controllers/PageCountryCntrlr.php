<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCountryCntrlr extends Controller
{
    public function index()
    {
        return view('country', array(
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
