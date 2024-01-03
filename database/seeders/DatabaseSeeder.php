<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'business_name' => 'Admin Business',
             'first_name' => 'Test',
             'last_name' => 'Admin',
             'phone' => '+20100000002',
             'role' => 'admin',
             'email' => 'admin@admin.com',
             'password' => Hash::make('12345678'),
         ]);
    }
}
