<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCompanyDetail extends Controller
{
    public function index(Request $request)
    {
        $company = \App\Company::find($request->id);

        return view('company_detail', array(
            'title' => 'Компания ' . $company['name']
//            'companyTemplate' => $companyTemplate,
//            'humans' => $humans
        ));
    }
}
