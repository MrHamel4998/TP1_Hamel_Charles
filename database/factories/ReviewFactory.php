<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Rental;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id,
            // https://www.w3tutorials.net/blog/in-laravel-how-do-i-retrieve-a-random-user-id-from-the-users-table-for-model-factory-seeding-data-generation/#method-1-using-inrandomorder-and-first
            'rental_id' => Rental::inRandomOrder()->first()->id,
        ];
    }
}
