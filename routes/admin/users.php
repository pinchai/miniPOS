<?php
Route::get('/admin/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('user');
Route::get('/admin/users/index_create', [\App\Http\Controllers\UsersController::class, 'index_create'])
    ->name('create_user');
Route::get('/admin/users/confirm_delete', [\App\Http\Controllers\UsersController::class, 'confirm_delete'])
    ->name('confirm_delete');
Route::post('/admin/users/create', [\App\Http\Controllers\UsersController::class, 'create']);
