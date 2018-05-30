<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $fillable = ['country', 'country_abb'];

    public function places() {
        return $this->hasMany('App\Place');
    }

//    static function index() {
//        dd(ZipCode::all()->toArray());
//    }
}
