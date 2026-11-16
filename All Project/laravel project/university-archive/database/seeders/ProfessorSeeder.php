<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['login_id' => 'PROF001'],
            [
                'name' => 'Nilay Professor',
                'email' => 'professor@example.com',
                'role' => 'professor',
                'password' => Hash::make('Professor@123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}