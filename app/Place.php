<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['country_abb', 'name', 'place', 'longitude', 'latitude'];

    public function zips() {
        return $this->belongsTo('App\Zip', 'id', 'place_id');
    }
}
