<?php

namespace App\Http\Controllers\Ajax;

use App\Human;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class addHuman extends Controller
{
    public function add(Request $request)
    {
        $letter1 = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'];
        $letter2 = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'];
        $letter3 = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'];

        $res = new Human();
        $array = [];
        for ($value = 1; $value <= $request->count; $value++) {
            $res = new Human();
            $res->name = $letter1[rand(0,29)].$letter2[rand(0,29)].$letter3[rand(0,29)];
            $res->save();
//            $res = $letter1[rand(0,29)].$letter2[rand(0,29)].$letter3[rand(0,29)];
//            $array[] = $res;
        }

//        dd($array);

//        return json_encode($request->all());
    }
}
