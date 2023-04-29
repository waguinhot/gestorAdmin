<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_user_has_permission_admin_create_access()
    {
        $user = User::factory()->create(['access_user' => 1]);

        $this->actingAs($user);
        $response = $this->get(route('user.create'));
        $response->assertStatus(200);
    }

    public function test_user_no_has_permission_admin_create_access()
    {
        $user = User::factory()->create(['access_user' => 0]);

        $this->actingAs($user);
        $response = $this->get(route('user.create'));
        $response->assertStatus(403);
    }

    public function test_user_has_permission_admin_update_access()
    {
        $user = User::factory()->create(['access_user' => 1]);

        $this->actingAs($user);
        $response = $this->get(route('user.show', ['id' => $user->id]));
        $response->assertStatus(200);
    }

    public function test_user_no_has_permission_admin_update_access()
    {
        $user = User::factory()->create(['access_user' => 0]);

        $this->actingAs($user);
        $response = $this->get(route('user.show', ['id' => $user->id]));
        $response->assertStatus(403);
    }

    public function test_id_not_found_in_show_user()
    {
        $user = User::factory()->create(['access_user' => 1]);

        $this->actingAs($user);
        $response = $this->get(route('user.show', ['id' => 450504]));
        $response->assertStatus(302);
    }
}
