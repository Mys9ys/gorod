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
    public function PayOneToOne(Request $request){

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
                if(!empty($request->target)) {$transaction->target=$request->target;} else {
                    $transaction->target = 'Pay ' . $request->buyer .' to ' . $request->seller;
                }
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
    public function PayManyToOne(Request $request){
        $seller = partnerPay($request->seller, $request->sellerID);
        $seller->money = $seller->money+$request->money*count($request->buyerID);
        if($seller->save()){
            foreach ($request->buyerID as $buyerID){
                $buyer = partnerPay($request->buyer, $buyerID);
                $buyer->money = $buyer->money-$request->money;
                $buyer->save();
                $transaction = new Transactions();
                $transaction->seller=$request->sellerID;
                $transaction->buyer=$buyerID;
                $transaction->pay_data=Calendar::pluck('countDay')->first();
                $transaction->count=$request->money;
                if(!empty($request->target)) {$transaction->target=$request->target;} else {
                    $transaction->target = 'Pay ' . $request->buyer .' to ' . $request->seller;
                }
                $transaction->save();
            }
        }
    }
    public function PayOneToMany(Request $request){
        $buyer = partnerPay($request->buyer, $request->buyerID);
        $buyer->money = $buyer->money-($request->money)*count($request->sellerID);
        if($buyer->save()){
            foreach ($request->sellerID as $sellerID){
                $seller = partnerPay($request->seller, $sellerID);
                $seller->money = $seller->money+$request->money;
                $seller->save();
                $transaction = new Transactions();
                $transaction->seller=$sellerID;
                $transaction->buyer=$request->buyerID;
                $transaction->pay_data=Calendar::pluck('countDay')->first();
                $transaction->count=$request->money;
                if(!empty($request->target)) {$transaction->target=$request->target;} else {
                    $transaction->target = 'Pay ' . $request->buyer .' to ' . $request->seller;
                }
                $transaction->save();
            }
        }
    }
    public function addMoneyTreasury(Request $request){
        $treasury = partnerPay($request->buyer, $request->buyerID);
        $treasury->money +=$request->money;
        if($treasury->save()){
            $transaction = new Transactions();
            $transaction->seller=0;
            $transaction->buyer=$request->buyerID;
            $transaction->pay_data=Calendar::pluck('countDay')->first();
            $transaction->count=$request->money;
            $transaction->target='денежная эмиссия';
            $transaction->save();
            echo 'казна пополнена';
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