<?php

namespace App\Http\Controllers\Ajax;

use App\Calendar;
use App\Company;
use App\Human;
use App\Transactions;
use App\Treasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Pays extends Controller
{
    public function PayCommand(Request $request){
//        dd($request->all());


        $seller = partnerPay($request->seller, $request->sellerID);
        $buyer = partnerPay($request->buyer, $request->buyerID);

        $verify_money = $buyer->money-$request->money;
        if($verify_money>0){
            $buyer->money = $verify_money;
            $seller->money = $seller->money+$request->money;


            $transaction = new Transactions();
            $transaction->seller=$request->sellerID;
            $transaction->buyer=$request->buyerID;
            $transaction->pay_data=Calendar::pluck('countDay')->first();
            $transaction->count=$request->money;

            $transaction->save();
            $seller->save();
            $buyer->save();
        } else {
            echo 'low_money';
        }




        $payArray = array(
            'HumanToHumanPay',
            'CompanyToCompanyPay',
            'CompanyToHumanPay',
            'HumanToCompanyPay',
            'TreasuryToHumanPay',
            'CompanyToTreasuryPay',
            'TreasuryToCompany',
        );

    }
}

// выбор контор агента
function partnerPay($partner, $id){
    switch ($partner){
        case 'Human':
            $elem = Human::find($id);
            break;
        case 'Company':
            $elem = Company::find($id);
            break;
        case 'Treasury':
            $elem = Treasury::find($id);
            break;
    }
    return $elem;
}