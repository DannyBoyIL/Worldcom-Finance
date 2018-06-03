<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $fillable = ['abb', 'name'], $primaryKey = 'abb', $keyType = 'string';

    public function zips() {
        return $this->hasMany('App\Zip', 'country_abb', 'abb');
    }

    public function places() {
        return $this->hasMany('App\Place', 'country_abb', 'abb');
    }

    static function findPlace($request, &$data) {

        $data = [];
        $abb = $request['country'];
        $zip = $request['zip'];

        $zips = self::find($abb)->zips->where('zip', '=', $zip);

        $zips = $zips->toArray();

        if (!empty($zips)) {

            $places = [];
            foreach ($zips as $key => $zip) {
                $places[$key] = self::find($abb)->places->where('id', '=', $zip['place_id'])->toArray();
                $places[$key] = array_pop($places[$key]);
            }
//            dd('findPlace->$places', $places);

            $data['places'] = $places;
            return;
        }

        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "http://api.zippopotam.us/$abb/$zip");
        $promise = $client->sendAsync($request)->then(function ($response) {

            $body = json_decode($response->getBody());
            $country = (array) $body;
            foreach ($country['places'] as $key => $place) {
                $country['places'][$key] = (array) $place;
            };

            Place::savePlace($country, $abb);

            return $country['places'];
        }, function ($error) {

            $message = 'Sorry, the place wasn\'t found. try again';
            return $message;
        });
        $callback = $promise->wait();

        if (is_string($callback)) {

            return $callback;
        } else {

            foreach ($callback as $key => $c) {
                $callback[$key]['name'] = $c['place name'];
                $callback[$key]['place'] = $c['state'];
                unset($callback[$key]['place name']);
                unset($callback[$key]['state']);
            }

            $data['places'] = $callback;
        }
    }

}
