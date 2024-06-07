<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteConfig::create([
            'logo_title' => 'HAMRO PASAL',
            'company_name' => 'Hamro Pasal',
            'popular_dish_title' => 'Feature Product',
            'special_food' => ' Popular Product',
            'social_headline' => 'Social headline',
            'description' => 'Hamro Bazar is the best ecommerce site in the Pokhara'
        ]);

    }
}
