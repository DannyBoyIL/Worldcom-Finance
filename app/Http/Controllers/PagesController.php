<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Requests\ZipRequest;

use App\ZipCode;

class PagesController extends MainController
{
    public function home() {
        self::$data['zip_codes'] = ZipCode::all()->toArray();
        self::$data['title'] .= ' Home';
        return view('home', self::$data);
    }

    public function postZipCode(ZipRequest $request) {
//        dd($request->toArray());

        Place::findZip($request);
//        self::$data['title'] .= ' Home';
//        return view('home', self::$data);
    }
}
