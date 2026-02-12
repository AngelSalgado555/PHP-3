<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Devolver vista del formulario de creación del artículo
        $journalists = Journalist::all();
        
        return view('article.create', compact('journalist'));
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
        //
    }
}
