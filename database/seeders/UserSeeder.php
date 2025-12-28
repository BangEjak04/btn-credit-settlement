<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Reza Andyah Wijaya',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'national_id' => '3515080401030005',
            'phone' => '081',
            'mobile_phone_1' => '081',
            'mobile_phone_2' => '081',
        ])->assignRole(\BezhanSalleh\FilamentShield\Support\Utils::createRole());

        User::factory()->create([
            'name' => 'Loan Service',
            'email' => 'loanservice@example.com',
            'password' => 'ls',
        ])->assignRole(\BezhanSalleh\FilamentShield\Support\Utils::createRole('loan_service'));
    }
}
