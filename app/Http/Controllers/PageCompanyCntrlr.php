<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCompanyCntrlr extends Controller
{
    public function index()
    {
        return view('company', array(
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
