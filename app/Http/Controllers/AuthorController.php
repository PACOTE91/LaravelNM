<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $header = "Página principal Autores";
        $authors = Author::orderBy("name", "desc")->paginate(5);

        return view('authors.index', compact("authors", "header"));
    }


    public function create()
    {
        $header = "Crear nuevo Autor";
        return view('authors.create', compact("header"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "min:5"],
            "surname" => ["required", "string", "min:3"],
            "nacionality" => ["required", "string", "min:3"]
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with("mensaje", "Autor creado");
    }




    public function edit(Author $author)
    {
        $header = "Editar Autor Nº " . $author->id;
        return view('authors.update', compact("author", "header"));
    }


    public function update(Request $request, Author $author)
    {
        $request->validate([
            "name" => ["required", "string", "min:5"],
            "surname" => ["required", "string", "min:3"],
            "nacionality" => ["required", "string", "min:3"]
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with("mensaje", "Autor actualizado");
    }


    public function destroy(Author $author)
    {

        $author->delete();
        return redirect()
            ->route('authors.index')
            ->with("mensaje", "Autor eliminado con éxito");
    }
}