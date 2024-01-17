<?php
Route::get('/admin/product', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('product');
Route::get('/admin/product/index_create', [\App\Http\Controllers\ProductController::class, 'index_create'])
    ->name('index_create_product');
Route::get('/admin/product/confirm_delete', [\App\Http\Controllers\ProductController::class, 'confirm_delete'])
    ->name('confirm_delete_product');
Route::post('/admin/product/create', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('create_product');

Route::get('/admin/product/index_update', [\App\Http\Controllers\ProductController::class, 'index_update'])
    ->name('index_update_product');
Route::post('/admin/product/update', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('update_product');

Route::post('/admin/product/delete', [\App\Http\Controllers\ProductController::class, 'delete'])
    ->name('delete_product');
