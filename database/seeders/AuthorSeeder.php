<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Author::create([
            "name" => "Almudena",
            "surname" => "Grandes",
            "nacionality" => "Española"
        ]);

        Author::create([
            "name" => "Carlos",
            "surname" => "Ruiz Zafon",
            "nacionality" => "Española"
        ]);

        Author::create([
            "name" => "Antonio",
            "surname" => "Machado",
            "nacionality" => "Española"
        ]);

        Author::create([
            "name" => "Mark",
            "surname" => "Twain",
            "nacionality" => "Americano"
        ]);

        Author::create([
            "name" => "Stephen",
            "surname" => "King",
            "nacionality" => "Americano"
        ]);
    }
}