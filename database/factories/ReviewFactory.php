<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $book_id = Book::pluck("book_id")->toArray();
        $user_id = User::pluck("id")->toArray();
        return [
            //
            'book_id' => fake()->randomElement($book_id),
            'user_id' => fake()->randomElement($user_id),
            'rating' => fake()->randomElement(['1', '2', '3', '4', '5']),
            'reviewText' => fake()->text(100),
            'reviewDate' => fake()->date(),
        ];
    }
}
