<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 2,
            'number' => '9823231188',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'address' => 'Parbat, Nepal'
        ]);
    }
}
