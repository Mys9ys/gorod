<?php

namespace App\Http\Controllers;

use App\Human;
use Illuminate\Http\Request;
use App\Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendar = Calendar::all()[0];
        $humans = Human::all();
//        dd($calendar);

        return view('home', array(
            'calendar' => $calendar,
            'humans' => $humans
        ));
    }
}
