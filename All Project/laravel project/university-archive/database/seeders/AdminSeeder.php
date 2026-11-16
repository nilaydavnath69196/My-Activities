<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['login_id' => 'admin'],
            ['name' => 'System Admin', 'email' => 'admin@example.com', 'role' => 'admin', 'password' => Hash::make('Admin@123')]
        );
    }
}
