<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FlightApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $flights = Flight::all();
        if ($flights != null){
            return response() -> json([
                "message" => "OK", 
                "data" => $flights
            ]);
        } else {
            return response() -> json([
                "message" => "No flights",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
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
        try{
            $flight = Flight::create($request -> all());
            return response() -> json([
                "message" => "OK",
                "data" => $flight
            ]);
        } catch (Exception $e){
            return response() -> json([
                "message" => "Flight not created " . $e -> getMessage(), 
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $flight = Flight::find($id);
        if ($flight != null){
            return response() -> json([
                "message" => "OK", 
                "data" => $flight
            ]);
        } else {
            return response() -> json([
                "message" => "Flight not found", 
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
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

    public function searchByCode(Request $request){
        Log::channel('stderr') -> debug("Variables de búsqueda:", [$request -> name]);
        if(isset($request -> code)){
            $flight = Flight::where('code', $request -> code) -> get();

            return response() -> json([
                "message" => "OK", 
                "data" => $flight
            ]);
        } else {
            return response() -> json([
                "message" => "Not found",
                "data" => null
            ]);
        }
    }   
}
