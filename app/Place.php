<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Place extends Model
{
    protected $fillable = ['country_id', 'zip', 'name', 'place', 'longitude', 'latitude'];

    static public function findZip($r)
    {
//        dd($r->toArray());
        $arr = $r->toArray();
        $countries = [];
        $zip = $arr['zip'];
        foreach ($arr as $key => $value) {
            if ($value == 'on') {
                $countries[] = $key;
            }
        }

//        dd('OR ' . $country[1]);
        if(count($countries) > 1) {
            for($i = 1; $i < count($countries); $i++ ) {
                $countries[$i] = ' OR z.country_abb = ' . $countries[$i];
            }
        }

//        dd($countries);
        $sql = '';
        foreach($countries as $country) {
            $sql .= $country;
        }
//        dd($sql);

        $places = DB::select('select z.country_abb, p.* from places AS p ' .
            ' join zip_codes AS z ON z.id = p.country_id ' .
            ' where z.country_abb = ' . "$sql");

        dd($places);

        $client = new \GuzzleHttp\Client();

        // Send an asynchronous request.
//        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://api.zippopotam.us/us/90210');
//        $str = '';
//        for ($i = 0; $i < strlen($zip); $i++) {
//        $str .= $zip[$i];
////        echo $str . '<br>';
//    }
//    die();
        $request = new \GuzzleHttp\Psr7\Request('GET', "http://api.zippopotam.us/$country/$zip");
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo '<pre>' . $response->getBody();
        });
        $promise->wait();

    }
}
