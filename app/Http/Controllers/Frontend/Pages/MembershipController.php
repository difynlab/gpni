<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\MembershipContent;
use App\Models\Membership;
use App\Models\FAQ;

class MembershipController extends Controller
{
    public function index()
    {
        $contents = MembershipContent::find(1);
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
        
       // Retrieve FAQs based on language, type, and status
        $common_faqs = FAQ::where('language', $language_name)
            ->where('status', '1')
            ->where('type', 'Common')
            ->get();

        $membership_faqs = FAQ::where('language', $language_name)
            ->where('status', '1')
            ->where('type', 'Membership')
            ->get();

        $master_class_faqs = FAQ::where('language', $language_name)
            ->where('status', '1')
            ->where('type', 'Master Class')
            ->get();

        // If no FAQs are found for a specific language, default to English
        if ($common_faqs->isEmpty() && $language_name !== 'English') {
            $common_faqs = FAQ::where('language', 'English')
                ->where('status', '1')
                ->where('type', 'Common')
                ->get();
        }

        if ($membership_faqs->isEmpty() && $language_name !== 'English') {
            $membership_faqs = FAQ::where('language', 'English')
                ->where('status', '1')
                ->where('type', 'Membership')
                ->get();
        }

        if ($master_class_faqs->isEmpty() && $language_name !== 'English') {
            $master_class_faqs = FAQ::where('language', 'English')
                ->where('status', '1')
                ->where('type', 'Master Class')
                ->get();
        }

        return view('frontend.pages.membership', [
            'contents' => $contents,
            'language' => $language,
            'common_faqs' => $common_faqs,
            'membership_faqs' => $membership_faqs,
            'master_class_faqs' => $master_class_faqs
        ]);
    }
}