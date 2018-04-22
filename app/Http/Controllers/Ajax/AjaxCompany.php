<?php

namespace App\Http\Controllers\Ajax;

use App\Calendar;
use App\Company;
use App\CompanyLibrary;
use App\CompanySector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxCompany extends Controller
{
    public function getSector() {
        $sector = CompanySector::all();
        $companyLib = CompanyLibrary::all();
        return  json_encode(array(
            'sector' => $sector,
            'companyLib' => $companyLib
        ));
    }
    public function addNewCompany(Request $request) {
//        return json_encode($request->all());
        $company = new Company();
        foreach ($request->all() as $key=>$item){
            if($key!='name'){$item =(int)$item;}
            $company->$key=$item;
        }
        $company->create_date=Calendar::pluck('countDay')->first();
        if ($company->save()) {return json_encode('запись удалась');}
    }
}
