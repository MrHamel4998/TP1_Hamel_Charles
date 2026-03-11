<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Review;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_review()
    {
        $this->seed();

        $review = Review::first();
        
        $response = $this->delete('/api/reviews/'.$review->id);
        $response->assertStatus(204);
    }

    public function test_detete_invalid_review() 
    {
        $this->seed();

        $response = $this->delete('/api/reviews/9999');
        $response->assertStatus(404);
    }
}
