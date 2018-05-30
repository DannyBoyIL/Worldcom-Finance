<?php

use Illuminate\Database\Seeder;
use App\ZipCode;

class ZipCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZipCode::truncate();
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            ZipCode::create([
                $country = $faker->country,
//                'zip_code' => $faker->postcode,
                'country' => $country,
                'country_abb' => strtoupper(substr($country, 0, 2)),
            ]);
        }
    }
}
