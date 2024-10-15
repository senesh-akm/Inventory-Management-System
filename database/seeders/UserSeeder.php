<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'empnumber' => 'EMP001',
            'empname' => 'John Doe',
            'email' => 'john.doe@admin.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // Replace 'password' with the hashed password
            'is_active' => true,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
