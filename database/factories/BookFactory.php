<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->title(),
            'author' => fake()->unique()->name(),
            'genre' => fake()->randomElement(['Văn học','Tiểu thuyết','Ngôn tình']),
            'PublicationYear' => fake()->year(),
            'isbn' => fake()->unique()->isbn13(),
            'coverImageUrl' => fake()->imageUrl(),
        ];
    }
}
