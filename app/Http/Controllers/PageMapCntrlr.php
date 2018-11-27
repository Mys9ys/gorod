<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageMapCntrlr extends Controller
{
    public function index()
    {
        return view('map', array(
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
