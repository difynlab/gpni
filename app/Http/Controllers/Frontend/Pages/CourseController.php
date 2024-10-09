<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQContent;

use App\Models\MasterClassContent;
use App\Models\Course;

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

        $course_content = Course::where('language', $language_name)
        ->where('status', '1')
        ->where('title', 'like', 'PNE Level 1%')
        ->first(); // Use first() if expecting only one record

        // Check if no course found, then fallback to English
        if (!$course_content && $language_name !== 'English') {
        $course_content = Course::where('language', 'English')
                    ->where('status', '1')
                    ->where('title', 'like', 'PNE Level 1%')
                    ->where('type', 'Certification')
                    ->first(); // Again, use first() for a single result
        }
        
        return view('frontend.pages.pne-level-1', [
            'course_content' => $course_content,
            'language' => $language
        ]);
    }

    public function show_master_class()
    {
        $contents = MasterClassContent::find(1);
        $language = session('language', 'en');

           // Handle language switching
        $points_column = 'section_3_points_' . $language;
        if (!isset($contents->$points_column)) {
            $points_column = 'section_3_points_en'; // Default to English if column not available
        }
        
        // Decode the JSON points
        $points = json_decode($contents->$points_column, true);

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
        
        $courses = Course::where('language', $language_name)->where('status', '1')->get();

        if($courses->isEmpty() && $language_name !== 'English') {
            $courses = Course::where('language', 'English')->where('status', '1')->where('type', 'Masters')->get();
        }
        
        return view('frontend.pages.master-class', [
            'contents' => $contents,
            'language' => $language,
            'points' => $points,
            'faqs' => $faqs,
            'courses' => $courses
        ]);
    }
}