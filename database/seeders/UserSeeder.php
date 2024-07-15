<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => env('TEST_USER_NAME'),
            'email' => env('TEST_USER_EMAIL'),
            'password' => bcrypt(env('TEST_USER_PASSWORD')),
            'email_verified_at' => now(),
        ]);
    }
}
