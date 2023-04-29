<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_user_has_permission_access_brand()
    {
        $user = User::factory()->create(['access_brand' => 1]);

        $this->actingAs($user);

        $response = $this->get(route('brand'));

        $response->assertStatus(200);
    }

    public function test_user_no_has_permission_access_brand()
    {
        $user = User::factory()->create(['access_brand' => 0]);

        $this->actingAs($user);

        $response = $this->get(route('brand'));

        $response->assertStatus(403);
    }
}
