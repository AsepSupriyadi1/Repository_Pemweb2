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
                'email' => 'admin@admin.com',
                'password' => Hash::make('password12345'),
                'role' => 'ADMIN',
                'email_verified_at' => now(),
            ]
        );

        // Create demo user
        User::updateOrCreate(
            ['email' => 'demo@demo.com'],
            [
                'name' => 'Demo User',
                'email' => 'demo@demo.com',
                'password' => Hash::make('demo12345'),
                'role' => 'STAFF',
                'email_verified_at' => now(),
            ]
        );

        // Create staff user
        User::updateOrCreate(
            ['email' => 'staff@staff.com'],
            [
                'name' => 'Staff User',
                'email' => 'staff@staff.com',
                'password' => Hash::make('staff12345'),
                'role' => 'STAFF',
                'email_verified_at' => now(),
            ]
        );

        // Generate 52 additional users (total 55 users)
        for ($i = 1; $i <= 52; $i++) {
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $name = $firstName . ' ' . $lastName;
            $email = strtolower($firstName . '.' . $lastName . $i . '@example.com');

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password123'),
                'role' => $faker->randomElement(['ADMIN', 'STAFF']),
                'email_verified_at' => $faker->optional(0.8)->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
