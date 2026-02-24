<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class EquipmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->fake()->word(),
            'description' => $this->fake()->paragraph(),
            'dailyPrice' => $this->fake()->randomFloat(2, 0, 1000),
            // https://www.w3tutorials.net/blog/in-laravel-how-do-i-retrieve-a-random-user-id-from-the-users-table-for-model-factory-seeding-data-generation/#method-1-using-inrandomorder-and-first
            'categoryId' => Category::inRandomOrder('id')->first()->id,
        ];
    }
}
