<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function store(Request $request)
    {
    }

    public function logout(Request $request)
    {
    }
}
