<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas de User
Route::get('/', [UserController::class, 'index']) -> name('user.index');

Route::delete('/user/{id}', [UserController::class, 'destroy']) -> name('user.delete');

//Rutas de Event
Route::get('/event', [EventController::class, 'create']) -> name('event.create');

Route::post('/event', [EventController::class, 'store']);

