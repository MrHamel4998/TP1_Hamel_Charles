<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Equipment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'start_date' => fake()->date,
            'end_date' => fake()->date,
            'total_price' => fake()->randomFloat(2, 20, 500),
            'user_id' => User::inRandomOrder()->first()->id,
            // https://www.w3tutorials.net/blog/in-laravel-how-do-i-retrieve-a-random-user-id-from-the-users-table-for-model-factory-seeding-data-generation/#method-1-using-inrandomorder-and-first
            'equipment_id' => Equipment::inRandomOrder()->first()->id,
        ];
    }
}
