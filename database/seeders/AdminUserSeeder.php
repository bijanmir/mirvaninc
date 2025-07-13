<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@mirvaninc.com',
            'password' => Hash::make('password123'), // Change this in production!
            'is_admin' => true,
            'role' => 'Super Admin',
            'email_verified_at' => now(),
        ]);

        // Create additional admin user
        User::create([
            'name' => 'Mirvan Admin',
            'email' => 'hello@mirvaninc.com',
            'password' => Hash::make('password123'), // Change this in production!
            'is_admin' => true,
            'role' => 'Administrator',
            'email_verified_at' => now(),
        ]);
    }
}