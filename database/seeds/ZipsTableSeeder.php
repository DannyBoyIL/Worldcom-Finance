<?php

use Illuminate\Database\Seeder;
use App\Zip;
use App\Place;

class ZipsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Zip::truncate();
        $faker = \Faker\Factory::create();
        $place = Place::all()->toArray();

        for ($i = 0; $i < 10; $i++) {
            Zip::create([
                'country_abb' => $place[$i]['country_abb'],
                'place_id' => $place[$i]['id'],
                'zip' => $faker->postcode,
            ]);
        }
    }

}
