<?php

namespace App\Http\Controllers\Ajax;

use App\Library_product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Product extends Controller
{
    public function ProductAdd(Request $request){
        $product = new Library_product();
        foreach ($request->all() as $key=>$item){
            if(empty($item)) $item=0;
            $product->$key=$item;
        }
        $detali = array('2', '4', '5');
        $detali_json = json_encode($detali);
        $product->detail_material=$detali_json;
        $product->save();
    }
}
