<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Country;

class Place extends Model {

    protected $fillable = ['country_id', 'name', 'place', 'longitude', 'latitude'];

    public function zips() {
        return $this->belongsTo('App\Zip', 'id', 'place_id');
    }

//array:3 [▼
//"country_id" => 8
//"place_id" => 1
//"zip" => "4005"
//]


    public function countries() {
        return $this->belongsTo('App\country', 'country_id', 'id');
    }

    static public function findZip($z, $c, $p) {
//        $zips = Zip::where('zip', '=', $z)->get();
//        $countries = self::find($c)->countries;
        $places = self::find($p)->get();

//        dd($zips->toArray());
//        dd($countries->toArray());
        dd($places->toArray());
    }

}
