<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            $product = Product::inRandomOrder()->first();
            $selling_price = $product->selling_price;
            $cost_price = $product->cost_price;
            $qty = $faker->numberBetween(1, 10);
            // gamble for profit or loss
            $profit_loss = $faker->numberBetween(0, 1);
            if ($profit_loss == 0) {
                // random decimal between 1.1 and 1.5
                $selling_price = $cost_price * $faker->randomFloat(1, 1.1, 1.5);
            } else {
                // random decimal between 0.1 and 0.9
                $selling_price = $cost_price * $faker->randomFloat(1, 0.1, 0.9);
            }
            $total = $selling_price * $qty;
            DB::table('transactions')->insert([
                'product_id' => $product->id,
                'selling_price' => $selling_price,
                'qty' => $qty,
                'total' => $total,
                // random start on 2020 - 2025
                'creation_date' => $faker->dateTimeBetween('2020-01-01', '2025-12-31'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
