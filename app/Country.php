<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['abb', 'name'];

    static function findPlace($request, &$data) {

//        dd($request);
        $data = [];
        $abb = $request['country'];
        $zip = $request['zip'];

//        $place = self::find($abb)->zips->where('zip', '=', $zip)->toArray();
        $place = self::find($abb);
        dd($place->toArray());

        die;
        if ($category = Category::where('url', '=', $category_url)->first()) {
            $category = $category->toArray();
            if ($products = Category::find($category['id'])->products) {
                $data['products'] = $products->toArray();
            }
        }

        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', "http://api.zippopotam.us/$abb/$zip");
        $promise = $client->sendAsync($request)->then(function ($response) {
//                $res = $response;
//                $body = $response->getBody();
//                dd($body);
//                dd($res->toJson());
            echo '<pre>' . $response->getBody();
        });
        $promise->wait();

    }
}
