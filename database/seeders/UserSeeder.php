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
            'name' => 'Marcel',
            'email' => 'info@marcel-breuer.eu',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        \App\Models\User::create([
            'name' => 'Test',
            'email' => 'test@test.de',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
