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
            'startDate' => fake()->date,
            'endDate' => fake()->date,
            'totalPrice' => fake()->randomFloat(2, 20, 500),
            'user_id' => User::inRandomOrder('id')->first()->id,
            'equipment_id' => Equipment::inRandomOrder('id')->first()->id,
        ];
    }
}
