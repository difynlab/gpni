<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\WhyWeAreDifferentContent;

class WhyWeAreDifferentController extends Controller
{
    public function index()
    {
        $contents = WhyWeAreDifferentContent::find(1);
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

        return view('frontend.pages.why-different', [
            'contents' => $contents,
            'language' => $language
        ]);
    }
}