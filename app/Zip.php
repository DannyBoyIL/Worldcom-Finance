<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zip extends Model {

    protected $fillable = ['country_abb', 'place_id', 'zip'];
    public $timestamps = false;

    public function country() {
        return $this->hasMany('App\Country', 'id', 'country_id');
    }

    static public function saveZips() {
        
    }

}
