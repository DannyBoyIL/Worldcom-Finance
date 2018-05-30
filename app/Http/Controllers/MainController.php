<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    static public $data = ['title' => 'Worldcom Finance '];

    function __construct() {
//        self::$data['menu'] = Menu::all()->toArray();
    }
}
