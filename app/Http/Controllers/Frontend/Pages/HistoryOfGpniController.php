<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\HistoryOfGpniContent;
use App\Models\AdvisoryBoard;

class HistoryOfGpniController extends Controller
{
    public function index()
    {
        // return view('frontend.pages.history-of-gpni');

        $contents = HistoryOfGpniContent::find(1);
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

        $advisoryBoard = AdvisoryBoard::where('language', $language_name)->where('status', '1')->get();

        return view('frontend.pages.history-of-gpni', [
            'contents' => $contents,
            'language' => $language,
            'advisoryBoard' => $advisoryBoard
            // 'faqs' => $faqs,
            // 'testimonials' => $testimonials
        ]);
    }
}