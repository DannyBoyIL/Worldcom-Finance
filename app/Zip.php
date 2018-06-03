<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zip extends Model {

    protected $fillable = ['country_abb', 'place_id', 'zip'];

    public $timestamps = false;

    static public function saveZips($country, $id) {

        $abb = $country['country abbreviation'];
        $code = $country['post code'];

            $zip = new self();
            $zip->country_abb = $abb;
            $zip->place_id = $id;
            $zip->zip = $code;
            $zip->save();
        }
}
