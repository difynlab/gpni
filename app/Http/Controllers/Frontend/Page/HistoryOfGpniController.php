<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\HistoryOfGpniContent;
use App\Models\OurFounder;
use Illuminate\Http\Request;

class HistoryOfGpniController extends Controller
{
    public function index(Request $request)
    {
        $contents = HistoryOfGpniContent::find(1);

        $our_founders = OurFounder::where('language', $request->middleware_language_name)->orderBy('id', 'asc')->take(2)->where('status', '1')->get();

        if($our_founders->isEmpty() && $request->middleware_language_name != 'English') {
            $our_founders = OurFounder::where('language', 'English')->orderBy('id', 'asc')->take(2)->where('status', '1')->get();
        }

        return view('frontend.pages.history-of-gpni', [
            'contents' => $contents,
            'our_founders' => $our_founders
        ]);
    }
}