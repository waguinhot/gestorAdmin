<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActionsAdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }


    public function test_admin_create_user()
    {
        $access = User::factory()->create(['access_user' => 1]);

        $this->actingAs($access);

        $data = [
            'name' => 'fake name',
            'email' => 'fakeemail@email.com',
            'password' => 'fakepassword',
            'access_product' => 0,
            'access_category' => 0,
            'access_brand' => 0
        ];

        $response = $this->post(route('user.store'), $data);

        //mesmo se de errado vai retornar 302 pois da mesma forma vai ser um redirect
        //tanto sendo sucesso quando sendo falha
        //sempre rodar as duas assercoes juntas para garantir
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['name' => 'fake name', 'email' => 'fakeemail@email.com']);
    }

    public function test_admin_failed_create_user_email_invalid()
    {
        $access = User::factory()->create(['access_user' => 1]);

        $this->actingAs($access);

        $data = [
            'name' => 'fake name',
            'email' => 'fakeemail',
            'password' => 'fakepassword',
            'access_product' => 0,
            'access_category' => 0,
            'access_brand' => 0
        ];

        $response = $this->post(route('user.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    public function test_admin_update_user()
    {
        $access = User::factory()->create(['access_user' => 1]);

        $this->actingAs($access);

        $data = [
            'name' => 'fake name',
            'email' => 'fakeemail@email.com',
            'password' => 'fakepassword',
            'access_product' => 0,
            'access_category' => 0,
            'access_brand' => 0
        ];

        $response = $this->put(route('user.edit', $access->id), $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['name' => 'fake name', 'email' => 'fakeemail@email.com']);
    }

    public function test_admin_update_user_email_invalid()
    {
        $access = User::factory()->create(['access_user' => 1]);

        $this->actingAs($access);

        $data = [
            'name' => 'fake name',
            'email' => 'fakeemail',
            'password' => 'fakepassword',
            'access_product' => 0,
            'access_category' => 0,
            'access_brand' => 0
        ];

        $response = $this->put(route('user.edit', $access->id), $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }


    public function test_has_permission_admin_delete_()
    {
        $user = User::factory()->create(['access_user' => 1]);

        $this->actingAs($user);

        //nao sei se e tao legal assim excluir a propria conta que esta logada :|

        $response = $this->delete(route('user.delete', ['id' => $user->id]));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }
    public function test_user_no_has_permission_admin_delete_()
    {
        $user = User::factory()->create(['access_user' => 0]);

        $this->actingAs($user);

        //nao sei se e tao legal assim excluir a propria conta que esta logada :|

        $response = $this->delete(route('user.delete', ['id' => $user->id]));
        $response->assertStatus(403);
    }
}
