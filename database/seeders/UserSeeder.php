<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'names' => 'Test User',
            'last_names' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'identification_card' => '123456789',
            'phone' => '123456789',
            'rank_id' => 1,
            'military_unit_id' => 1,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Admin');

        User::create([
            'names' => 'Bryan',
            'last_names' => 'Cruz',
            'email' => 'bc@gmail.com',
            'password' => Hash::make('admin'),
            'identification_card' => '1718324765',
            'phone' => '0959113863',
            'rank_id' => 11,
            'military_unit_id' => 1,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Admin');

        User::create([
            'names' => 'Steven',
            'last_names' => 'Quezada',
            'email' => 'logistic@gmail.com',
            'password' => Hash::make('admin'),
            'identification_card' => '1718324766',
            'phone' => '0959113863',
            'rank_id' => 11,
            'military_unit_id' => 1,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Logistic');



    }
}
