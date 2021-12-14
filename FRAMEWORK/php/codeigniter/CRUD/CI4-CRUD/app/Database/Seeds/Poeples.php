<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Poeples extends Seeder
{
    public function run()
    {
        $model = model('PoeplesModel');
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            $data = [
                'uuid' => date('His') . $i + $i,
                'email' => $faker->email(),
                'image' => $faker->imageUrl(),
                'phone' => $faker->phoneNumber(),
                'created_at' => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $model->insert($data);
        }
    }
}
