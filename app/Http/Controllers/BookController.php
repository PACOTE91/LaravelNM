<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $header = "Página principal Libros";
        $books = Book::orderBy("title", "desc")->paginate(5);
        $categories = Category::all();

        return view('books.index', compact("books", "header", "categories"));
    }



    public function indexaut(Request $request, Author $item)
    {
        $header = "Libros de " . $item->name . " " . $item->surname;

        $libros = Book::orderBy("title", "desc")->get();
        $ids = $item->books()->pluck('book_id')->toArray();

        $books = [];

        foreach ($libros as $libro) {
            if (in_array($libro->id, $ids)) {
                var_dump($libro->title);
                array_push($books, $libro);
            }
        }

        $categories = Category::all();

        return view('books.index', compact("books", "header", "categories"));
    }


    public function indexcat(Request $request, Category $item)
    {
        $header = "Libros con categoría " . $item->name;
        $books = Book::orderBy("title", "desc")->where(['category_id' => $item->id])->paginate(5);
        $categories = Category::all();

        return view('books.index', compact("books", "header", "categories"));
    }


    public function create()
    {
        $header = "Crear nuevo Libro";
        $categories = Category::orderBy('name')->get();
        $authors = Author::orderBy('name')->get();

        return view('books.create', compact("header", "categories", "authors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required", "unique:books,id", "min:3"],
            "resume" => ["required", "min:3"],
            "price" => ["required", "numeric", "between:0.00,999.99"],
            "image" => ["nullable", "image", "max:1024"],
            "category_id" => ["required"],
            "authors" => ["required"]
        ]);

        if ($request->file('image')) {
            $url = Storage::put("public/books", $request->file('image'));
            $url_file = "books/" . basename($url);
        }


        $book = Book::create($request->all());
        $book->update([
            "image" => $url_file
        ]);

        $book->authors()->attach($request->authors);

        return redirect()->route("books.index")->with("mensaje", "Libro creado exitosamente");
    }


    public function show(Book $book)
    {
        $header = "Detalles Libro " . " ' " . $book->title . " '";
        $authors = Author::all();
        $category = Category::get()->where("id", $book->category_id);

        //Devolvemos los IDs de los Autores asociados a ese libro
        $ids = $book->authors()->pluck('authors.id')->toArray();

        $autores = [];

        foreach ($authors as $author) {
            foreach ($ids as $id) {
                if ($author->id == $id) {
                    array_push($autores, $author);
                }
            }
        }

        return view('books.show', compact('book', "header", "autores", "category"));
    }



    public function edit(Book $book)
    {
        $header = "Editar Libro Nº " . $book->id;

        $authors = Author::all();
        $categories = Category::get();

        //Devolvemos los IDs de los Autores asociados a ese libro
        $ids = $book->authors()->pluck('authors.id')->toArray();

        return view('books.update', compact("book", "header", "authors", "ids", "categories"));
    }



    public function update(Request $request, Book $book)
    {
        $imagen_actual = $book->image;
        $request->validate([
            "title" => ["required", 'unique:books,title,' . $book->id, "min:3"],
            "resume" => ["required", "min:3"],
            "price" => ["required", "numeric", "between:0.00,999.99"],
            "image" => ["nullable", "image", "max:1024"],
            "category_id" => ["required"],
            "authors" => ["required"]
        ]);


        if ($request->file('image')) {

            Storage::delete("public/" . $book->image);
            $url = Storage::put("public/posts", $request->file('image'));
            $url_imagen = "posts/" . basename($url);
            $book->update($request->all());
            $book->update([
                'image' => $url_imagen
            ]);
        } else {
            $book->update($request->all());

            $book->update([
                'image' => $imagen_actual
            ]);
        }

        $book->authors()->sync($request->authors);

        return redirect()->route("books.index")->with("mensaje", "Libro actualido exitosamente");
    }

    public function destroy(Book $book)
    {
        Storage::delete("public/" . $book->image);
        $book->delete();

        return redirect()
            ->route("books.index")
            ->with("mensaje", "Libro eliminado exitosamente");
    }
}