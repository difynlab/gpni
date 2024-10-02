<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;

class CourseDetailController extends Controller
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
        
        return view('frontend.pages.student.course-detail', [
            'language' => $language
        ]);
    }

    // public function show($id)
    
    public function show()
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

        // $articles = Article::findOrFail($id);

        return view('frontend.pages.student.course-detail-open', [
            // 'articles' => $articles
        ]);
    }
}