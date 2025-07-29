<?php

namespace Database\Seeders;

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
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
            'is_verified' => true,
            'terms_and_conditions' => true,
            'email_verified_at' => now(),
            'verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 10 Tracker
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => "Tracker $i",
                'email' => "tracker$i@gmail.com",
                'password' => Hash::make('12345678'),
                'user_type' => 'trucker',
                'is_verified' => true,
                'terms_and_conditions' => true,
                'email_verified_at' => now(),
                'verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 10 Shipper
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => "Shipper $i",
                'email' => "shipper$i@gmail.com",
                'password' => Hash::make('12345678'),
                'user_type' => 'shipper',
                'is_verified' => true,
                'terms_and_conditions' => true,
                'email_verified_at' => now(),
                'verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
