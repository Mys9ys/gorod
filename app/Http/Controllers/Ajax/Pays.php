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

        $buyer = partnerPay($request->buyer, $request->buyerID);
        $buyer->money = $buyer->money-$request->money;
        if($buyer->save()){
            $seller = partnerPay($request->seller, $request->sellerID);
            $seller->money = $seller->money+$request->money;
            if($seller->save()){
                $transaction = new Transactions();
                $transaction->seller=$request->sellerID;
                $transaction->buyer=$request->buyerID;
                $transaction->pay_data=Calendar::pluck('countDay')->first();
                $transaction->count=$request->money;
                if($transaction->save()){

                }  else {
                    echo 'что то пошло не так $transaction';
                }
            }  else {
                echo 'что то пошло не так $seller';
            }
        } else {
            echo 'что то пошло не так $buyer';
        }
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