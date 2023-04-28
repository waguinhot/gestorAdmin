<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_user_has_permission_access_to_category()
    {
        $user = User::factory()->create(['access_category' => 1]);

        $this->actingAs($user);

        $response = $this->get(route('category'));

        $response->assertStatus(200);
    }

    public function test_user_no_has_permission_access_to_category()
    {
        $user = User::factory()->create(['access_category' => 0]);

        $this->actingAs($user);

        $response = $this->get(route('category'));

        $response->assertStatus(404);
    }
}
