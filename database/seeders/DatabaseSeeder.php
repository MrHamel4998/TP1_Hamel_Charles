<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SportSeeder::class,
            CategorySeeder::class,
            EquipmentSeeder::class,
            EquipmentSportSeeder::class,
        ]);

        //Album::factory(4)->has(Song::factory(8))->create();

    }
}
