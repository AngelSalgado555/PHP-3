<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('article.index', compact('articles'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Devolver vista del formulario de creación del artículo
        $journalists = Journalist::all();
        
        return view('article.create', compact('journalists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $a = new Article($request-> all());
        Log::channel('stderr') -> debug("Variable request: ", [$a -> title]);

        //Antes de guardar en la DB: Validaciones
        $request -> validate([
            'title' => 'required',
            'content' => 'required', 
            'readers' => 'required', 
            'journalist_id' => 'required'
        ]);


        //Lo guardamos
        $a -> save(); 

        return redirect() -> route('article.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //Hacer ahora
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //Ya no tengo que buscarlo con el id, ya que este controlador me lo busca en la base de datos automaticamente.
        $article -> title = $request -> title; 
        $article -> content = $request -> get('content');
        $article -> save(); 
        return redirect() -> route('article.index')-> with('success', 'Se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //Eliminar un articulo
        if ($article == null){
            $message = "El articulo no existe";
        } else {
            $article -> delete(); 
            $message = "El articulo " . $article -> title . " fue eliminado";
        }

        return redirect() -> route('article.index') -> with('deleted', $message);
    }
}
