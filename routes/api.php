<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyController;

Route::get('/currencies', [CurrencyController::class, 'index']);
Route::get('/currencies/{code}', [CurrencyController::class, 'show']);
Route::post('/currencies', [CurrencyController::class, 'store']);
Route::put('/currencies/{id}', [CurrencyController::class, 'update']);
Route::delete('/currencies/{id}', [CurrencyController::class, 'destroy']);
