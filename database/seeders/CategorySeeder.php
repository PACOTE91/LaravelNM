<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create(['name' => "Ficción", 'description' => "Libros de ficción"]);
        Category::create(['name' => "Aventura", 'description' => "Libros de aventura"]);
        Category::create(['name' => "Terror", 'description' => "Libros de terror"]);
        Category::create(['name' => "Suspenso", 'description' => "Libros de suspenso"]);
    }
}