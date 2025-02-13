<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('transactions')->insert([
                'product' => $faker->word,
                'product_id' => $faker->numberBetween(1, 100),
                'qty' => $faker->numberBetween(1, 100),
                'selling_price' => $faker->numberBetween(10000, int2: 50000),
                'creation_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
