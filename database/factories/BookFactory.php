<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->unique()->words(5, true)),
            'resume' => $this->faker->sentence(),
            'category_id' => Category::all()->random()->id,
            'image' => "books/" . $this->faker->image("public/storage/books", 640, 480, null, false),
            // 'image' => $this->faker->text(250),
            'price' => $this->faker->randomFloat(2, 10, 35)

        ];
    }
}