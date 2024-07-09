<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        return view('frontend.homepage');
    }
}