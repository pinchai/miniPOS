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

//login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/do_login', [App\Http\Controllers\LoginController::class, 'do_login'])->name('do_login');

Route::middleware('auth')->group(function () {
    //protect rout block
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


    Route::get('/admin/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('user');
    Route::get('/admin/users/index_create', [\App\Http\Controllers\UsersController::class, 'index_create'])
        ->name('create_user');
    Route::get('/admin/users/confirm_delete', [\App\Http\Controllers\UsersController::class, 'confirm_delete'])
        ->name('confirm_delete');
    Route::post('/admin/users/create', [\App\Http\Controllers\UsersController::class, 'create']);


    //logout
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

