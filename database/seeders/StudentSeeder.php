<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRole = Role::firstOrCreate(['name' => 'Student']);
        for ($i = 0; $i < 10; $i++) {
            $studentData = [
                'name' => fake()->name,
                'email' => fake()->unique()->safeEmail,
                'password' => bcrypt('password'),
            ];

            $user = User::create($studentData);

            $user->assignRole($studentRole);
        }

        $parentRole = Role::firstOrCreate(['name' => 'Parent']);
        for ($i = 0; $i < 10; $i++) {
            $parentData = [
                'name' => fake()->name,
                'email' => fake()->unique()->safeEmail,
                'password' => bcrypt('password'),
            ];

            $user = User::create($parentData);

            $user->assignRole($parentRole);
        }
    }
}
