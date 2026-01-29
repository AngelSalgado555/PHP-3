<?php

use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hola", function(){
    return "Hello Word!";
}); 

Route::get("/hola{name} ", function($name){
    return "Hola, $name";
}); 

Route::get("/journalist", [JournalistController::class, "index"]);
Route::get("/name/{name}", [JournalistController::class, "sayName"]);