<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TalentController;

Route::middleware('auth')->group(function () {

    Route::get('/talents', [TalentController::class, 'list_talents']);
    Route::get('/talents/{talent_id}', [TalentController::class, 'detail_talent']);
    Route::post('/talents', [TalentController::class, 'create_talent']);
    Route::put('/talents/{talent_id}', [TalentController::class, 'update_talent']);

});
