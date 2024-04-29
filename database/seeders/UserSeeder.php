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
            'name' => 'Tester',
            'email' => 'tester@example.com'
        ]);

        User::factory()->create([
            'name' => 'Tester2',
            'email' => 'tester2@example.com'
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'role' =>'instructor'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' =>'admin'
        ]);

        User::factory()->count(10)->create();

        User::factory()->count(10)->create([
            'role' => 'instructor'
        ]);
    }
}
