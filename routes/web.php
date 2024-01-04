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
//login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/do_login', [App\Http\Controllers\LoginController::class, 'do_login'])->name('do_login');
Route::middleware('auth')->group(function () {
    //protect rout block
//    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/admin/category', function () {
        $data = [];
        return view('category', ['data'=>$data]);
    });
    Route::get('/admin/product', function () {
        $data = [];
        return view('product', ['data'=>$data]);
    });
    Route::get('/admin/customer', function () {
        $data = [];
        return view('customer', ['data'=>$data]);
    });

    include 'admin/category.php';
    include 'admin/users.php';

    //logout
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

//* Front Block *//

include 'front/home.php';
