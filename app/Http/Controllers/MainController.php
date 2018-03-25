<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
//        $calendar = Calendar::all()[0];
//        $humans = Human::all();
//        dd($calendar);

        return view('main', array(
//            'calendar' => $calendar,
//            'humans' => $humans
        ));
    }
}
