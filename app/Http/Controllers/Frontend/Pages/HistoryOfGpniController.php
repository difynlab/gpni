<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;

class HistoryOfGpniController extends Controller
{
    public function index()
    {
        return view('frontend.pages.history-of-gpni');
    }
}