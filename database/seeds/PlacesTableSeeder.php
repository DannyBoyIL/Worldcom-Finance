<?php

use Illuminate\Database\Seeder;
use App\Place;
use App\Country;

class PlacesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Place::truncate();
        $faker = \Faker\Factory::create();
        $country = Country::all()->toArray();

        for ($i = 0; $i < 10; $i++) {
            Place::create([
                'country_abb' => $country[$i]['abb'],
                'name' => $faker->streetName,
                'place' => $faker->streetAddress,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
            ]);
        }
    }

}
