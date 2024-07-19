<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HistoryOfGpniController extends Controller
{
    public function index()
    {
        return view('frontend.history-of-gpni');
    }
}