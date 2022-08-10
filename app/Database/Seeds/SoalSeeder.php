<?php

namespace App\Database\Seeds;

use App\Models\Admin\BankSoalModel;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class SoalSeeder extends Seeder
{
    public function run()
    {

        $model = new BankSoalModel;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
          $model->save(
                [
                    'question'        =>    $faker->name,
                    'discussion'       =>    $faker->name,
                    'created_by'  =>    $faker->name,
                    'created_at'  =>    Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'  =>    Time::now()
                ]
            );
        }
    }
}
