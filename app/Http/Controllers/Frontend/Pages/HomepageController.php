<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FAQ;
use App\Models\Testimonial;
use App\Models\HomepageContent;

class HomepageController extends Controller
{
    public function index()
    {
        $contents = HomepageContent::find(1);
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
                $short_code = 'unknown';
                break;
        }

        $courses = Course::where('language', $language_name)->where('status', '1')->get();
        $faqs = FAQ::where('language', $language_name)->where('status', '1')->get();
        $testimonials = Testimonial::where('language', $language_name)->where('status', '1')->get();

        return view('frontend.pages.homepage', [
            'contents' => $contents,
            'language' => $language,
            'courses' => $courses,
            'faqs' => $faqs,
            'testimonials' => $testimonials
        ]);
    }
}