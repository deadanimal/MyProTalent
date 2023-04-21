<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::middleware('auth')->group(function () {

    Route::get('/products', [ProductController::class, 'list_products']);
    Route::get('/products/{product_id}', [ProductController::class, 'detail_product']);
    Route::post('/products', [ProductController::class, 'create_product']);
    Route::put('/products/{product_id}', [ProductController::class, 'update_product']);

});
