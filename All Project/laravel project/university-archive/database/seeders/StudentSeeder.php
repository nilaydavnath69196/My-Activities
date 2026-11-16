<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['login_id' => 'STU001'],
            [
                'name' => 'Nilay Student',
                'email' => 'student@example.com',
                'role' => 'student',
                'password' => Hash::make('Student@123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}


