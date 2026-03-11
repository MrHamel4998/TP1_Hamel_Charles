<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

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

        $response = $this->post('/api/users', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', $data);
    }

    public function test_create_user_invalid()
    {
        $this->seed();

        $response = $this->postJson('/api/users', []);
        $response->assertStatus(422);
    }

    public function test_update_user()
    {
        $this->seed();

        $user = User::factory()->create();

        $data = [
            'first_name' => 'Updated',
            'last_name' => 'Updated',
            'email' => 'updated@test.com',
            'phone' => '819-888-1123'
        ];

        $response = $this->put('/api/users/'.$user->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users',$data);
    }

    public function test_update_user_not_found()
    {
        $this->seed();

        $data = [
            'first_name' => 'Missing',
            'last_name' => 'User',
            'email' => 'missing.user@test.com',
            'phone' => '819-777-5544'
        ];

        $response = $this->put('/api/users/9999', $data);

        $response->assertStatus(404);
    }
}
