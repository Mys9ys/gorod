<?php

namespace App\Http\Controllers;

use App\CompanyLibrary;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $companyTemplate = CompanyLibrary::all();
        $title = 'Настройки';
        return view('setting', array(
            'companyTemplate' => $companyTemplate,
            'title' => $title
//            'humans' => $humans
        ));
    }
}
