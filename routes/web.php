<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::get('/currencies', [CurrencyController::class, 'index']);
    Route::post('/currencies', [CurrencyController::class, 'store']);
    Route::get('/currencies/{code}', [CurrencyController::class, 'show']);
    Route::put('/currencies/{id}', [CurrencyController::class, 'update']);
    Route::delete('/currencies/{id}', [CurrencyController::class, 'destroy']);
});

