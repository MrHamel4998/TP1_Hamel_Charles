<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_create_user()
    {
        $this->seed();

        $data = [
            'first_name' => 'Test',
            'last_name' =>  'Test',
            'email' => 'test@test.com',
            'phone' => '819-999-1234'
        ];

        $response = $this->postJson('/api/users', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', $data);
    }

    public function test_create_user_invalid()
    {
        $this->seed();

        $response = $this->postJson('/api/users', []);
        $response->assertStatus(422);
    }
}
