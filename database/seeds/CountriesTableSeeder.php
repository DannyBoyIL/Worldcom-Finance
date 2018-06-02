<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supported = [
            'AD' => 'Andorra',
            'AR' => 'Argentina',
            'AS' => 'American Samoa',
            'AT' => 'Austria',
            'AU' => 'Australia',
            'BD' => 'Bangladesh',
            'BE' => 'Belgium',
            'BG' => 'Bulgaria',
            'BR' => 'Brazil',
            'CA' => 'Canada',
            'CH' => 'Switzerland',
            'CZ' => 'Czech Republic',
            'DE' => 'Germany',
            'DK' => 'Denmark',
            'DO' => 'Dominican Republic',
            'ES' => 'Spain',
            'FI' => 'Finland',
            'FO' => 'Faroe Islands',
            'FR' => 'France',
            'GB' => 'Great Britain',
            'GF' => 'French Guyana',
            'GG' => 'Guernsey',
            'GL' => 'Greenland',
            'GP' => 'Guadeloupe',
            'GT' => 'Guatemala',
            'GU' => 'Guam',
            'GY' => 'Guyana',
            'HR' => 'Croatia',
            'HU' => 'Hungary',
            'IM' => 'Isle of Man',
            'IN' => 'India',
            'IS' => 'Iceland',
            'IT' => 'Italy',
            'JE' => 'Jersey',
            'JP' => 'Japan',
            'LI' => 'Liechtenstein',
            'LK' => 'Sri Lanka',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MC' => 'Monaco',
            'MD' => 'Moldavia',
            'MH' => 'Marshall Islands',
            'MK' => 'Macedonia',
            'MP' => 'Northern Mariana Islands',
            'MQ' => 'Martinique',
            'MX' => 'Mexico',
            'MY' => 'Malaysia',
            'NL' => 'Holland',
            'NO' => 'Norway',
            'NZ' => 'New Zealand',
            'PH' => 'Phillippines',
            'PK' => 'Pakistan',
            'PL' => 'Poland',
            'PM' => 'Saint Pierre and Miquelon',
            'PR' => 'Puerto Rico',
            'PT' => 'Portugal',
            'RE' => 'French Reunion',
            'RU' => 'Russia',
            'SE' => 'Sweden',
            'SI' => 'Slovenia',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SK' => 'Slovak Republic',
            'SM' => 'San Marino',
            'TH' => 'Thailand',
            'TR' => 'Turkey',
            'US' => 'United States',
            'VA' => 'Vatican',
            'VI' => 'Virgin Islands',
            'YT' => 'Mayotte',
            'ZA' => 'South Africa'];
        Country::truncate();

        for ($i = 0; $i < 10; $i++) {

            $n = rand(0, (count($supported) - 1));

            foreach ($supported as $abb => $name) {

                $array = array_values($supported);

                if ($array[$n] == $name) {

                    Country::create([
                        'abb' => $abb,
                        'name' => $name,
                    ]);
                }
            }
        }

    }
}
