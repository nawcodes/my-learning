<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $post = [
            'title' => $faker->sentence,
            'content' => $faker->paragraph,
        ];

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Post::create($post);
        }


    }
}
