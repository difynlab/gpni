<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\GlobalEducationPartner;
use App\Models\GlobalEducationPartnerContent;

class EducationPartnersController extends Controller
{
    public function index()
    {
        // Fetch the content from the database
        $contents = GlobalEducationPartnerContent::find(1);
        $language = session('language', 'en');

        // Determine the language
        switch ($language) {
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'English';
        }

        // Get education partners data based on language
        $education_partners = GlobalEducationPartner::where('language', $language_name)
            ->where('status', '1')->get();

        // Fallback to English if no results and non-English language is selected
        if ($education_partners->isEmpty() && $language_name !== 'English') {
            $education_partners = GlobalEducationPartner::where('language', 'English')
                ->where('status', '1')->get();
        }

         // Decode the section_2_points_en, section_3_languages_en, and section_4_label_link_en fields to handle as JSON
         $decoded_points = json_decode($contents->section_2_points_en);
         $languages = json_decode($contents->{'section_3_languages_' . $language} ?? $contents->section_3_languages_en);
         $section_4_label_link = json_decode($contents->{'section_4_label_link_' . $language} ?? $contents->section_4_label_link_en);
         $decoded_partner_points = json_decode($contents->{'section_5_points_' . $language} ?? $contents->section_5_points_en);
 
         // Pass all necessary data to the view
         return view('frontend.pages.education-partners', [
             'contents' => $contents,
             'language' => $language,
             'education_partners' => $education_partners,
             'points_data' => $decoded_points,
             'languages' => $languages,
             'section_4_label_link' => $section_4_label_link,
             'decoded_partner_points' => $decoded_partner_points,
         ]);
    }
}