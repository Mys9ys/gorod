<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageHumanCntrlr extends Controller
{
    public function index()
    {
        return view('human', array(
            'title' => 'Население'
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
