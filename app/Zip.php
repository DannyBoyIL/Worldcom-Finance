<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zip extends Model {

    public function country() {
        return $this->hasMany('App\Country', 'id', 'country_id');
    }

// TODO Column not found: 1054 Unknown column 'zips.id' in 'where clause' (SQL: select * from `zips` where `zips`.`id` = 1 limit 1)"
}
