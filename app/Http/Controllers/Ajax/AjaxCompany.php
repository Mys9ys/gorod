<?php

namespace App\Http\Controllers\Ajax;

use App\Calendar;
use App\Company;
use App\CompanyLibrary;
use App\CompanySector;
use App\Human;
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

        $company = new Company();
        foreach ($request->all() as $key=>$item){
            if($key!='name'){$item =(int)$item;}
            $company->$key=$item;
        }
        $company->create_date=Calendar::pluck('countDay')->first();
        $company->city=$_COOKIE['CityID'];
        $company->save();
//       Выбираем безработных и заполняем ими свободные рабочие места
        $worker = Human::where('job', '=', 0)->take($request['workplace'])->pluck('id');
        $workers = '';
        $worker_count = 0;
        for($i=0;$i<$request['workplace'];$i++){
            if(!empty($worker[$i])){
                $workers .= $worker[$i].';';
                $worker_count++;
                $new_jobster = Human::find($worker[$i]);
                $new_jobster->job = $company->id;
                $new_jobster->save();
            }
        }
        $company->worker_count = $worker_count;
        $company->workplace -= $worker_count;
        $company->workers = $workers;
        if ($company->save()) {return json_encode('запись удалась');}
    }
    public function addNewWorker(Request $request) {

    }
}
