<?php

namespace App\Http\Controllers;

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
//        dd($calendar);

        return view('home', array(
            'calendar' => $calendar
        ));
    }
}
