<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;

class MyStorageController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }
        
        return view('frontend.pages.student.my-storage', [
            'language' => $language
        ]);
    }
}