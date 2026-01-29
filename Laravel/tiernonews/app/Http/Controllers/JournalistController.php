<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journalist;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Estoy en el index del JounalitsController
        //1. Buscar todos los jounalist de la bd
        $journalists = Journalist::all();
        
        //2. Devolver una vista que los contenga
        return view('journalist.index', compact("journalists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Va a devolver una vista con un formulario rellenado con los datos del periodista en cuestión y un botón de Actualizar 
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sayName($name){
        return "Hola {$name}";
    }
}
