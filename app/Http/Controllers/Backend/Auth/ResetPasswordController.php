<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function create($token)
    {
        return view('backend.auth.reset-password');
    }

    public function store()
    {
        dd('In progress');
    }
}
