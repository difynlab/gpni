<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('frontend.pages.student.student-dashboard');
    }
}