<?php

namespace App\Http\Controllers\Ajax;

use App\Human;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar;

class Reset extends Controller
{
    public function reset(Request $request){
        $res = Calendar::latest()->first();
        $res->countDay = 1;
        $res->update();

        $res = new Human();
        $res->truncate();
    }
}
