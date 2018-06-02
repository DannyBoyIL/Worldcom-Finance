<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['abb', 'name'], $primaryKey = 'abb', $keyType = 'string';

    public function zips() {
        return $this->hasMany('App\Zip', 'country_abb', 'abb');
    }

    static function findPlace($request, &$data) {

        $data = [];
        $abb = $request['country'];
        $zip = $request['zip'];

        if ($zips = self::find($abb)->zips->where('zip', '=', $zip)->first()) {

            $zips = $zips->toArray();

            if ($places = Place::find($zips['place_id'])) {

                $data['place'] = $places->toArray();
                return;

            }
        }


        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "http://api.zippopotam.us/$abb/$zip");
        $promise = $client->sendAsync($request)->then(function ($response) {
            dd($response);
            echo '<pre>' . $response->getBody();
        });
        $promise->wait();

    }
}
