<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Equipment;
use App\Models\Sport;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EquipmentSportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'equipmentId' => Equipment::inRandomOrder('id')->first()->id,
            'sportId'     => Sport::inRandomOrder('id')->first()->id,
        ];
    }
}
