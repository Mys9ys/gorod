<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageHumanDetail extends Controller
{
    public function index(Request $request)
    {
        $human = \App\Human::find($request->id);

        return view('human_detail', array(
            'title' => 'Человечек ' . $human['name']
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
