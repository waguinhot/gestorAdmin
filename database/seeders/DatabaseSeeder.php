<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('secret123'),
            'access_user' => 1,
            'access_product' => 1,
            'access_category' => 1,
            'access_brand' => 1
        ]);

        User::factory()->create([
            'name' => 'User User',
            'email' => 'user@email.com',
            'password' => Hash::make('secret123'),
            'access_user' => 0,
            'access_product' => 0,
            'access_category' => 0,
            'access_brand' => 0
        ]);

        User::factory(5)->create();
    }
}

// access_user
// access_product
// access_category
// access_brand
// password
