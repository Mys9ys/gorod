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
        $res->countDay = $request->count;
        $res->update();
    }
}
