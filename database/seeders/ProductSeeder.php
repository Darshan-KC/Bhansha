<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => $faker->company,
                'category' => $faker->randomElement(['Electronics', 'Clothing', 'Books', 'Home & Garden', 'Sports', 'Toys']),
                'price' => $faker->randomFloat(2, 10, 1000),
                'image_id' => $faker->numberBetween(1, 6),
                'description' => $faker->text,
            ]);
        }
    }
}
