<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    
    public function index()
    {
        return view('frontend.auth.forgot-password');
    }

    public function create()
    {
        
    }

    public function store()
    {

    }
}
