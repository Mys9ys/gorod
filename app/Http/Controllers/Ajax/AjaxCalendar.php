<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar;

class AjaxCalendar extends Controller
{
    public function send(Request $request)
    {
        $res = Calendar::latest()->first();
        $res->partDay = $request->partDay;
        $res->countDay = $request->countDay;
        $res->update();
    }
}
