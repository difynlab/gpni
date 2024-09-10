<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\AdvisoryBoardContent;

class AdvisoryBoardController extends Controller
{
    public function index()
    {
        $contents = AdvisoryBoardContent::find(1);
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

        $advisory_boards = AdvisoryBoard::where('language', $language_name)->where('status', '1')->get();

        if($advisory_boards->isEmpty() && $language_name !== 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.advisory-board', [
            'contents' => $contents,
            'language' => $language,
            'advisory_boards' => $advisory_boards
        ]);
    }
}