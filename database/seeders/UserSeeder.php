<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        // Regular User
        User::create([
            'name' => 'Rahayu',
            'email' => 'rahayu@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);
    }
}
