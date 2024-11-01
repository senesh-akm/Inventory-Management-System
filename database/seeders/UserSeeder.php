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
            'empname' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'),
            'is_active' => true,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_permissions')->insert([
            'user_id' => 1,
            'dashboard' => 1,
            'adjestment' => 1,
            'customer' => 1,
            'supplier' => 1,
            'item' => 1,
            'products' => 1,
            'product_category' => 1,
            'product' => 1,
            'purchase_order' => 1,
            'sales_order' => 1,
            'store' => 1,
            'warehouse' => 1,
            'stock_location' => 1,
            'transaction' => 1,
            'settings' => 1,
            'users' => 1,
            'user_permission' => 1,
            'theme' => 1,
            'reports' => 1,
            'sales_report' => 1,
            'purchase_report' => 1,
        ]);
    }
}
