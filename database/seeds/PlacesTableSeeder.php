<?php

use Illuminate\Database\Seeder;
use App\Places;
use App\ZipCode;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Places::truncate();
        $faker = \Faker\Factory::create();
        $country_id = ZipCode::all()->lists('id');

        for($i = 0; $i < 10; $i++) {
            Places::create([
//                'zip_code_id' = $faker->randomElement($zipcodes),
                'country_id' => $faker->randomElement($country_id),
                'zip' => $faker->postcode,
                'name' => Faker::Address.street_name,
                'place' => Faker::Address.state,
                'longitude' => Faker::Address.longitude,
                'latitude' => Faker::Address.latitude,
            ]);
        }
    }
}
