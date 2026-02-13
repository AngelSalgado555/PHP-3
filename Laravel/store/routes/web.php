<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas de client
Route::get("/client/create", [ClientController::class, "create"]) -> name("client.create");

Route::post("/client/store", [ClientController::class, "store"]) -> name("client.store");

Route::delete("/client/{id}", [ClientController::class, "destroy"]) -> name("client.destroy");

//Rutas de Order
Route::get("/order", [ClientController::class, "index"]) -> name("order.index");

Route::get("/order/create", [OrderController::class, "create"]) -> name("order.create");

Route::post("/order/store", [OrderController::class, "store"]) -> name("order.store");
 
