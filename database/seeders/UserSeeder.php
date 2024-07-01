<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'empnumber' => 'AM0000',
            'empname' => 'Adminstrator',
            'email' => 'admin@admin.com',
            'role' => 'Administrator',
            'password' => Hash::make('123123'),
        ]);
    }
}
