<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'address' => 'Gandaki, Pokhara',
            'email' => 'dev@gmail.com',
            'phone' => '+977 9823234323',
            'fax' => '+977 982623646161'
        ]);
    }
}
