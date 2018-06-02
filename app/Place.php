<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['country_abb', 'name', 'place', 'longitude', 'latitude'];

    public function zips() {
        return $this->belongsTo('App\Zip', 'id', 'place_id');
    }

    static function savePlace($request) {

//        dd($request);
        $abb = $request['country abbreviation'];
        $places = new self();
        foreach($request['places'] as $place) {
        $places->country_abb = $abb;
        $places->name = $place['place name'];
        $places->place = $place['state'];
        $places->longitude = $place['longitude'];
        $places->latitude = $place['latitude'];
        }
        $places->save();
    }
}
