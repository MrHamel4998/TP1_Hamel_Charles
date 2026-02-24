<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'firstName' => $this->fake()->firstName(),
            'lastName'  => $this->fake()->lastName(),
            'email'     => $this->fake()->unique()->email(),
            'phone'     => $this->fake()->phoneNumber(),
        ];
    }
}
