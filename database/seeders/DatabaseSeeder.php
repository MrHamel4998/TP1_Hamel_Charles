<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Rental;
use App\Models\Review;
use App\Models\Sport;
use App\Models\Equipment;
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

        User::factory(20)->create();
        Rental::factory(30)->create();
        Review::factory(50)->create();

        $sports = Sport::all();
        $equipments = Equipment::all();

        //https://laravel.com/docs/master/eloquent-relationships#updating-many-to-many-relationships
        foreach ($sports as $sport) {
            $sport->equipment()->sync(
                $equipments->random(2)->pluck('id')->toArray()
            );
        }
        
    }
}
