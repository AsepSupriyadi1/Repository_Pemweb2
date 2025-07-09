<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrator',
                'email' => 'admin@pddikti.com',
                'password' => Hash::make('password12345'),
                'role' => 'ADMIN',
                'email_verified_at' => now(),
            ]
        );

        // Create staff user
        User::updateOrCreate(
            ['email' => 'staff@staff.com'],
            [
                'name' => 'Staff User',
                'email' => 'staff@pddikti.com',
                'password' => Hash::make('staff12345'),
                'role' => 'STAFF',
                'email_verified_at' => now(),
            ]
        );
    }
}
