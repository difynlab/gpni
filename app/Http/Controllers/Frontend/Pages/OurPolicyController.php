<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\PolicyContent;
use App\Models\PolicyCategory;
use App\Models\Policy;

class OurPolicyController extends Controller
{
    public function index()
    {
        $contents = PolicyContent::find(1);
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

        $policies = Policy::where('language', $language_name)->where('status', '1')->orderBy('id', 'asc')->get();
        if($policies->isEmpty() && $language_name !== 'English') {
            $policies = Policy::where('language', 'English')->where('status', '1')->orderBy('id', 'asc')->get();
        }
    
        $policy_categories = PolicyCategory::where('language', $language_name)->where('status', '1')->orderBy('id', 'asc')->get();
        if($policy_categories->isEmpty() && $language_name !== 'English') {
            $policy_categories = PolicyCategory::where('language', 'English')->where('status', '1')->orderBy('id', 'asc')->get();
        }
    
        return view('frontend.pages.our-policies', [
            'contents' => $contents,
            'language' => $language,
            'policy_categories' => $policy_categories,
            'policies' => $policies
        ]);
    }
}