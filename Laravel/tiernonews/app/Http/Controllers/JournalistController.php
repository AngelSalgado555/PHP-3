<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journalist;
use Illuminate\Support\Facades\Log;


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
        // Devuelve una vista con un formulario de creación
        return view('journalist.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Para acceder a los campos del formulario, simplemente $request->nombre-del-input
        //Equivalente a $request->input("nombre-del-input")
        //Log::channel('stderr')->debug("Variable request: ", [$request->all()]);
        //todo $fillable
        $j = new Journalist($request->all());
        Log::channel('stderr')->debug("Variable request: ", [$j->email]);

        //Antes de guardar en la BD: validaciones
        $request -> validate([
            'name' => 'required', 
            'password' => 'min:3|required',
            'email' => 'unique:journalists,email|required'
        ]);

        //Con la siguiente orden se guarda en la BD:
        $j->save();
        //Para crear el index, tengo que buscar todos los periodistas en la BD
        //$journalists = Journalist::all();
        //return view('journalist.index', compact("journalists"));
        return redirect() -> route('journalist.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 1. busco en la bd a ese periodista 
        $journalist = Journalist::find($id);

        //2. devuelvo una vista con la información del periodista
        //todo comprobación errores si no existe el journalist
        return view('journalist.show', compact("journalist"));
    }

    /**
     * Show the form for editing the specified resource.
     * Va a devolver una vista con un formulario rellenado con los datos del periodista en cuestión y un botón de Actualizar 
     */
    public function edit(string $id)
    {
        //1. busco el periodista en la bd:
        $journalist = Journalist::find($id);
        //todo comprobación errores si no existe

        //2. devuelvo la vista con el formulario de edición
        return view('journalist.edit', compact("journalist"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Voy a actualizar todo menos la contraseña
        // 1. busco en la bd el journalist con ese id
        $journalist = Journalist::find($id);

        //2. actualizo los campos correspondientes
        $journalist->name = $request->name; //$request->name aquí está lo rellenado en el input name
        $journalist->surname = $request->surname;
        $journalist->email = $request->email;

        Log::channel('stderr')->info("A ver los datos que me llegan del request:");
        Log::channel('stderr')->info($request->email);
        Log::channel('stderr')->info($request->surname);
        Log::channel('stderr')->info($request->name);
        
        //3. hago el update
        $journalist->update();

        //4. devuelvo al show
        //Lo voy a buscar PERO SOLO PARA COMPROBAR que se ha actualizado
        //$journalist = Journalist::find($id);
        return view('journalist.show', compact("journalist"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1.Busco el journalist que voy a eliminar
        $j = Journalist::find($id);
        if ($j == null){
            $message = "El periodista no existe";
        } else {
             //1. eliminamos
            Journalist::destroy($id);
            $message = "Periodista " . $j -> name ." eliminado";
        }
        //2. devolvemos al index
        
        return redirect()-> route('jouranlist') -> with('deleted', $message);

    }

    public function sayName($name){
        return "Hola {$name}";
    }
}
