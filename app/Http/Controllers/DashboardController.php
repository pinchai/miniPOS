<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public static function index(Request $request){
        $data = \App\Models\Category::getList();
        return view('dashboard', ['data'=>$data]);
    }
}
