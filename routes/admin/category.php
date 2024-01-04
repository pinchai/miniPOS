<?php
Route::get('/admin/category', [\App\Http\Controllers\CategoryController::class, 'index'])
    ->name('category');
Route::get('/admin/category/index_create', [\App\Http\Controllers\CategoryController::class, 'index_create'])
    ->name('index_create_category');
Route::get('/admin/category/confirm_delete', [\App\Http\Controllers\CategoryController::class, 'confirm_delete'])
    ->name('confirm_delete_category');
Route::post('/admin/category/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->name('create_category');

Route::get('/admin/category/index_update', [\App\Http\Controllers\CategoryController::class, 'index_update'])
    ->name('index_update_category');
Route::post('/admin/category/update', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->name('update_category');

Route::post('/admin/category/delete', [\App\Http\Controllers\CategoryController::class, 'delete'])
    ->name('delete_category');
