<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQContent;

class CourseController extends Controller
{
    public function index()
    {
        $contents = FAQContent::find(1);
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
        
        $faqs = FAQ::where('language', $language_name)->where('status', '1')->get();

        if($faqs->isEmpty() && $language_name !== 'English') {
            $faqs = FAQ::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.faq', [
            'contents' => $contents,
            'language' => $language,
            'faqs' => $faqs
        ]);
    }
    
    public function show_pne_level_1()
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
        
        return view('frontend.pages.pne-level-1', [
            'language' => $language
        ]);
    }    

    public function show_master_class()
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
        
        return view('frontend.pages.master-class', [
            'language' => $language
        ]);
    }
}