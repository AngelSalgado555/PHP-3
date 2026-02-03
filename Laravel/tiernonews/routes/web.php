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

Route::get("/journalist", [JournalistController::class, "index"]) -> name('jouranlist');
Route::get("/name/{name}", [JournalistController::class, "sayName"]);

//Esto para devolver la vista con el formulario de creación
//Al darle un nombre a al a ruta, luego la uedo utilizar para referenciarla desde el resto de mi proyecto
Route::get("/jounalist/create", [JournalistController::class, "create"]) -> name('jounalist.create');

//Esto para guardar el jounalist con los datos rellenados del formulario de creación
Route::post("/jounalist", [JournalistController::class, "store"]) -> name('jounalist.store');

Route::get("/journalist/{id}", [JournalistController::class, "show"]);

//Una de tipo de get
Route::get("/jounalist/{id}", [JournalistController::class, "edit"]) -> name('journalist.edit');

//El de tipo put para que haga update
Route::put("/journalist/{id}", [JournalistController::class, "update"]) -> name('journalist.update');

//De tipo delete para borrar de la base de datos
Route::delete("/journalist/{id}", [JournalistController::class, "destroy"]) -> name('journalist.destroy');
