<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) { // Insert 10 random products
            DB::table('products')->insert([
                'name' => $faker->word, // Random product name
                'cost_price' => $faker->numberBetween(1000, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
