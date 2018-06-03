<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

    protected $fillable = ['country_abb', 'name', 'place', 'longitude', 'latitude'];

    public function zips() {
        return $this->belongsTo('App\Zip', 'id', 'place_id');
    }

    static function savePlace($request, &$abb) {

        $abb = $request['country abbreviation'];
        foreach ($request['places'] as $place) {
            $places = new self();
            $places->country_abb = $abb;
            $places->name = $place['place name'];
            $places->place = $place['state'];
            $places->longitude = $place['longitude'];
            $places->latitude = $place['latitude'];
            $places->save();
            Zip::saveZips($request, $places->id);
        }
    }

}
