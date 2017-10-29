<?php

namespace App\Http\Controllers\Ajax;

use App\CompanyLibrary;
use App\CompanySector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class companyLib extends Controller
{
    public function set(Request $request) { // установка данных в базу
        $companyLib = new CompanyLibrary();
        $companyLib->name = $request->name;
        $companyLib->workplace = $request->workplace;
        $companyLib->sector = $request->sector;
        if ($companyLib->save()) {return json_encode('запись удалась');}
        else { return json_encode('Проблема записи');}
    }
    public function get() { // получение данных из базы
        $sector = CompanySector::all();
        $companyLib = CompanyLibrary::all();
        return  json_encode(array(
            'sector' => $sector,
            'companyLib' => $companyLib
        ));
    }
    public function delete(Request $request) { // удаление данных по id
        $companyLib = CompanyLibrary::find($request->id);
        $companyLib->delete();

    }
}
