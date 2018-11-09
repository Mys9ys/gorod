<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
//        $calendar = Calendar::all()[0];
//        $humans = Human::all();
//        dd($calendar);

        return view('map', array(
//            'calendar' => $calendar,
//            'humans' => $humans
        ));
    }
}
