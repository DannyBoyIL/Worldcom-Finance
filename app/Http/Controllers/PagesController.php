<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ZipRequest;
use App\Traits\CountryResolver;
use App\Country;

class PagesController extends MainController {

    public function home() {
        self::$data['countries'] = Country::all()->toArray();
        self::$data['title'] .= ' Home';
        return view('home', self::$data);
    }

    public function postZipCode(ZipRequest $request) {
        Country::findPlace($request->toArray(), self::$data);
    }

}
