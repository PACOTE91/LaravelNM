<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $books = Book::factory(10)->create();
        $autor_id = Author::pluck("id")->toArray();

        foreach ($books as $book) {
            $id = array_slice($autor_id, 0, random_int(1, count($autor_id)));
            $book->authors()->attach($id);
        }
    }
}