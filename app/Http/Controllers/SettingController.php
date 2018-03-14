<?php

namespace App\Http\Controllers;

use App\CompanyLibrary;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companyTemplate = CompanyLibrary::all();

        return view('setting', array(
            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
