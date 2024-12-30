<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\NutritionistContent;
use Illuminate\Http\Request;

class NutritionistController extends Controller
{
    public function index($language)
    {
        $contents = NutritionistContent::find(1);

        switch($language){
            case 'english':
                $short_code = 'en';
                break;
            case 'chinese':
                $short_code = 'zh';
                break;
            case 'japanese':
                $short_code = 'ja';
                break;
            default:
                $short_code = 'unknown';
                break;
        }

        return view('backend.pages.nutritionist', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {

        $contents = NutritionistContent::find(1);

        // Search labels & links
            $search_labels_links = [];
            foreach($request->search_button_labels as $key => $search_button_label) {
                array_push($search_labels_links, [
                    'label' => $search_button_label,
                    'link' => $request->search_button_links[$key]
                ]);
            }
        // Search labels & links

        $data = $request->except(
            'search_button_labels',
            'search_button_links'
        );

        switch($language){
            case 'english':
                $short_code = 'en';
                break;
            case 'chinese':
                $short_code = 'zh';
                break;
            case 'japanese':
                $short_code = 'ja';
                break;
            default:
                $short_code = 'unknown';
                break;
        }

        $data['search_labels_links_' . '' . $short_code] = json_encode($search_labels_links);
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}