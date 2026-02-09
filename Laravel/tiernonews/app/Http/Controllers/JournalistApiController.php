<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Log;

class JournalistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Devuelve JSON con el journalist cread
     * $request contiene el JSON de la petición POST
     */
    public function store(Request $request)
    {
        if (!isset($request -> name)){
            $errors = true;
        } else if (!isset($request -> password)){
            $errros = true;
        }

        if (!$errors){
            $j = new Journalist($request -> all());
            $j -> save();

            return response() -> json($j);
        } else {
            return response() -> json([
                "message" => "error",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //1. Busco el journalist con ese id
        $j = Journalist::find($id);

        if ($j != null){
            //2. Lo devuelvo en formato JSON
            return response() -> json([
                "message" => "",
                "data" => $j
            ]);
        } else {
            return response() -> json([
                "message" => "Journalist not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND); //Esto equivale al error 404 que es no encontrado
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //1. Busco por id
        $j = Journalist::find($id);
        if ($j != null){
            $j -> name = $request -> name; 
            $j -> surname = $request -> surname;
            $j -> email = $request -> email; 
            $j -> update(); 
            return response() -> json([
                "message" => "",
                "data" => $j
            ]);
        } else {
            return response() -> json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND); //Esto equivale al error 404 que es no encontrado
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $j = Journalist::find($id);
        if ($j != null){
            $j -> delete();
            return response() -> json([
                "message" => "Deleted", 
                "data" => $j
            ]);
        } else {
            return response() -> json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND); //Esto equivale al error 404 que es no encontrado
        }
    }

    //Para las búsquedas
    public function search(Request $request){
        Log::channel('stderr') -> debug("VARIABLES DE BÚSQUEDA", [$request -> name]);
        //todo
        //SELECT * FROM journalist WHERE name = ?
        // if (isset($request -> name)){
        //     $journalists = Journalist::where('name', $request -> name) -> get();
        //     return response() -> json($journalists);
        // }

        // //Buscar por email
        // if (isset($request -> email)){
        //     $journalists = Journalist::where('email', $request -> email) -> get();
        //     return response() -> json($journalists);
        // }

        // if (isset($request -> minreaders) && isset($request -> maxreaders)){
        //     //Quiero devolver los artículos que tengan más de minReader readers
        //     $articles = Article::where("readers", ">=", $request -> minreaders) ->
        //         where("readers", "<=", $request -> minreaders)-> get();
        //     return response() -> json($articles);
        // } else if (isset($request -> minreaders)){
        //     //Quiero devolver los artículos que tengan más de minReader readers
        //     $articles = Article::where(
        //         "readers", ">=", $request -> minreaders
        //     ) -> get();
        //     return response() -> json($articles);
        // }

        //Buscar periodistas por nombre y por email
        // if (isset($request -> name) && isset($request -> email)){
        //     $journalists = Journalist::where("name", $request -> name) -> 
        //     where("email", $request -> email) -> get();

        //     return response() -> json($journalists);
        // }

        //Buscar periodista por nombre o por apellido
        if (isset($request -> name) || isset($request -> surname)){
            $journalists = Journalist::where("name", $request -> name) -> 
            orwhere("surname", $request -> surname) -> get();

            return response() -> json($journalists);
        }

    }
}
