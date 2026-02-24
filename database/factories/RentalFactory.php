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
            'startDate'   => $this->fake()->date,
            'endDate'     => $this->fake()->date,
            'totalPrice'  => $this->fake()->randomFloat(2, 20, 500),
            'userId'      => User::inRandomOrder('id')->first()->id,
            'equipmentId' => Equipment::inRandomOrder('id')->first()->id,
        ];
    }
}
