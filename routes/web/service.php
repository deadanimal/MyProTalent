<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServiceController;

Route::middleware('auth')->group(function () {

    Route::get('/services', [ServiceController::class, 'list_services']);
    Route::get('/services/{service_id}', [ServiceController::class, 'detail_service']);
    Route::post('/services', [ServiceController::class, 'create_service']);
    Route::put('/services/{service_id}', [ServiceController::class, 'update_service']);

});
