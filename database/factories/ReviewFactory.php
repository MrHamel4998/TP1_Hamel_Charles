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
            'rating'   => $this->fake()->numberBetween(1, 5),
            'comment'  => $this->fake()->paragraph(),
            'userId'   => User::inRandomOrder('id')->first()->id,
            'rentalId' => Rental::inRandomOrder('id')->first()->id,
        ];
    }
}
