<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Equipment;
use Tests\TestCase;

class EquipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_equipments()
    {
        $this->seed();

        $equipments = Equipment::all();

        $response = $this->get('/api/equipments');
        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
        
        for ($i = 0; $i < 5; $i++) {
            $response->assertJsonFragment([
                'name' => $equipments[$i]->name
            ]);
        }
    }

    public function test_get_single_equipment()
    {
        $this->seed();

        $equipment = Equipment::first();

        $response = $this->get('/api/equipments/'.$equipment->id);

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => $equipment->name]);
    }

    public function test_get_equipment_not_found()
    {
        $this->seed();

        $response = $this->get('/api/equipments/9999');
        $response->assertStatus(404);
    }

    public function test_get_equipment_popularity()
    {
        $this->seed();

        $equipment = Equipment::first();

        $response = $this->get('/api/equipments/'.$equipment->id.'/popularity');
        $response->assertStatus(200);
    }
}