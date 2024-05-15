<?php

namespace App\Modules\HomePage\Controllers;

use App\Http\Controllers\Controller;

class HomePageController extends Controller
{

    public function get(){
        return view('main.pages.index');
    }
}