<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $header = "Página principal Categorias";

        $categories = Category::orderBy("name", "desc")->paginate(5);

        return view('categories.index', compact("categories", "header"));
    }


    public function create()
    {
        $header = "Crear nueva Categoría";
        return view('categories.create', compact("header"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "unique:categories,name"],
            "description" => ["required"]
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with("mensaje", "Categoria creada");
    }



    public function edit(Category $category)
    {
        $header = "Editar Categoría Nº " . $category->id;
        return view('categories.update', compact("category", "header"));
    }



    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => ["required", "unique:categories,name," . $category->id],
            "description" => ["required"]
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with("mensaje", "Categoria editada");
    }


    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('mensaje', "Categoría eliminada con éxito");
    }
}