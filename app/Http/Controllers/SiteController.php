<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function static_home(Request $request) {
        return view('static.home');
    }
}
