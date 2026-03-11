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

        $response = $this->get('/api/equipment');
        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
        
        for ($i = 0; $i < 5; $i++) {
            $response->assertJsonFragment([
                'name' => $equipments[$i]->name
            ]);
        }
    }
}
