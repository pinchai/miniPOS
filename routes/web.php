<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', function () {
//    return view('student');
//});

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/category', function () {
    $data = [];
    return view('category', ['data'=>$data]);
});

Route::get('/product', function () {
    $data = [];
    return view('product', ['data'=>$data]);
});

Route::get('/customer', function () {
    $data = [];
    return view('customer', ['data'=>$data]);
});

Route::get('/users', function () {
    $data = [];
    return view('users', ['data'=>$data]);
});


