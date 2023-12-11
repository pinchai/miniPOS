<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public static function getList(Request $request){
        $product_list = [];
        $x = 0;
        while ($x < 100){
            array_push($product_list,
                [
                    'id'=>$x,
                    'name'=>'coca',
                    'category_id'=>1,
                    'price'=>10,
                    'cost'=>5,
                ]
            );
            $x++;
        }
        return $product_list;
    }
}
