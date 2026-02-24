<?php

use App\Http\Controllers\FlightApiController;
use App\Http\Controllers\PassengerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rutas de Flight
Route::get('/', [FlightApiController::class, 'index']);

Route::get('/flight/{id}', [FlightApiController::class, 'show']); 

Route::post('/flight', [FlightApiController::class, 'store']);

Route::get('/search/flight', [FlightApiController::class, 'searchByCode']);


//Rutas de Passeger
Route::delete('/passenger/{id}', [PassengerApiController::class, 'destroy']);

Route::put('/passenger/{id}', [PassengerApiController::class, 'update']);

