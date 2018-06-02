<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    use Traits\CountryResolver;

    protected $fillable = ['name', 'abbreviation'];

    public function zips() {
        return $this->hasMany('App\Zip');
    }

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
    }

//    static function prepareRequest($array) {
////        $country = new self();
////        $array = $country->convert_checkbox($array);
////        $sql = $country->prepare_query($array['countries'], 'OR', ['abbreviation']);
////        $get_id = $country->select('id')->whereRaw($sql, $array['countries'])->get();
////        $array['countries'] = $country->get_values($get_id->toArray());
////        dd(var_dump($array));
////        return $array;
//        $country = new self();
//        $array = $country->convert_checkbox($array);
//        $zip = $array['zip'];
//        $countries =& $array['countries'];
////        dd($countries);
//        $sql = $country->prepare_query($countries, 'OR', ['abbreviation']);
//        $get_id = $country->select('id')->whereRaw($sql, $countries)->get();
//        $countries = $country->get_values($get_id->toArray());
//        $countries['zip'] = $zip;
////        dd($countries);
//        return $countries;
//    }
//
//    static function searchDB($array) {
//        dd($array);
//        foreach ($array as $key => $value) {
//            $keeper = $value;
//            if (!is_string($value)) {
//                $zip = self::find($value)->zips->where('zip', '=', $array['zip'])->toArray();
//                $array[$key] = array_pop($zip);
//                $array[$key] = is_null($array[$key]) ? $keeper : $array[$key];
//            }
//        }
////                dd($array);
////
////        foreach ($array as $key => $value) {
////            if(is_null($value)) {
////                unset($array[$key]);
////            }
////        }
//        return $array;
//    }
//
//    static function findPlace($array)
//    {
//        $arr = self::prepareRequest($array);
//        $zips = self::searchDB($arr);
//
//        $isArray = array_where($zips, function ($value) {
//            return is_array($value);
//        });
//
////        if ($isArray) {
////
////        $result = new self();
//////        dd($isArray);
////        $sql = $result->prepare_query($isArray, 'AND', ['c.id', 'places.id', 'z.zip'], true);
////        dd($sql);
////        $result = Place::join('zips AS z', 'z.place_id', 'places.id')
////            ->join('countries AS c', 'c.id', 'places.country_id')
////            ->whereRaw('c.id = ? AND places.id = ? AND z.zip = ?', $isArray)
////            ->select('c.name AS country', 'c.abbreviation', 'z.zip', 'places.*')
////            ->get();
////
////        dd($result->toArray());
////        }
//
//
//            $country = new self();
//            $array = $country->convert_checkbox($array);
//            $zip = $array['zip'];
//            dd($zip);
////            dd($array['countries'] . 'if (empty($zips))');
//
//            $client = new \GuzzleHttp\Client();
//            $request = new \GuzzleHttp\Psr7\Request('GET', "http://api.zippopotam.us/$country/$zip");
//            $promise = $client->sendAsync($request)->then(function ($response) {
//                echo '<pre>' . $response->getBody();
//            });
//            $promise->wait();
//
//    }

}
