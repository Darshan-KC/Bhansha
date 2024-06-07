<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create role for user
         Role::create([
            'role' => 'user',
        ]);

        // Create role for admin
        Role::create([
            'role' => 'admin',
        ]);
    }
}
