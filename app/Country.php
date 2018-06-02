<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $fillable = ['abb', 'name'], $primaryKey = 'abb', $keyType = 'string';

    public function zips() {
        return $this->hasMany('App\Zip', 'country_abb', 'abb');
    }

    static function findPlace($request, &$data) {

        $data = [];
        $abb = $request['country'];
        $zip = $request['zip'];

        if ($zips = self::find($abb)) {

            $zips = self::find($abb)->zips->where('zip', '=', $zip)->first();

            if ($places = Place::find($zips['place_id'])) {

                $data['place'] = $places->toArray();
                return;
            }
        }

        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "http://api.zippopotam.us/$abb/$zip");
        $promise = $client->sendAsync($request)->then(function ($response) {

                    $body = json_decode($response->getBody());
                    $array = (array) $body;
                    foreach ($array['places'] as $key => $place) {
                        $array['places'][$key] = (array) $place;
                    };
                    Place::savePlace($array);
                    dd($array);
                })->otherwise(function ($error) {
            dd('error');
            return $error;
            view('errors.404')->withErrors($error);
        });
        $promise->wait();
//        dd($promise);
    }

    static function saveCountry($request) {

//        dd($request);
        $country = new self();
        $country->abb = $request['country abbreviation'];
        $country->name = $request['country'];
        $country->save();
    }

}
