<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PassengerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $passenger = Passenger::find($id);
        if ($passenger != null){
            
            $passenger -> name = $request -> name;
            $passenger -> surname = $request -> surname;
            $passenger -> age = $request -> age; 
            $passenger -> nationality = $request -> nationality; 
            $passenger -> flight_id = $request -> flight_id;

            $passenger -> update(); 

            return response() -> json([
                "message" => "OK",
                "data" => $passenger
            ]);
        } else {
            return response() -> json([
                "message" => "Not updated",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $passeger = Passenger::find($id);
        if ($passeger != null){
            return response() -> json([
                "message" => "OK",
                "data" => $passeger
            ]);
        } else {
            return response() -> json([
                "message" => "Passenger not deleted",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
