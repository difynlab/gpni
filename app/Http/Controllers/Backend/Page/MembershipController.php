<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\MembershipContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    public function index($language)
    {
        $contents = MembershipContent::find(1);

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

        return view('backend.pages.membership', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_section_2_image' => 'nullable|max:30720'
        ], [
            'new_section_2_image.max' => 'Image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }
        
        $contents = MembershipContent::find(1);

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

        // Section 2 image
            if($request->file('new_section_2_image')) {
                if($request->old_section_2_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_2_image);
                }

                $new_section_2_image = $request->file('new_section_2_image');
                $section_2_image_name = Str::random(40) . '.' . $new_section_2_image->getClientOriginalExtension();
                $new_section_2_image->storeAs('public/backend/pages', $section_2_image_name);
            }
            else if($request->old_section_2_image == null) {
                if($contents->{'section_2_image_' . $short_code}) {
                    Storage::delete('public/backend/pages/' . $contents->{'section_2_image_' . $short_code});
                }

                $section_2_image_name = null;
            }
            else {
                if($contents->{'section_2_image_' . $short_code}) {
                    $section_2_image_name = $request->old_section_2_image;
                }
                else {
                    $section_2_image_name = null;
                }
            }
        // Section 2 image

        // Section 3 titles and contents
            if($request->section_3_labels[0] != null) {
                $label_contents = [];

                foreach($request->section_3_labels as $key => $section_3_label) {
                    array_push($label_contents, [
                        'title' => $section_3_label,
                        'content' => $request->section_3_contents[$key] ?? null
                    ]);
                }
                $final_label_contents = $label_contents ? json_encode($label_contents) : null;
            }
        // Section 3 titles and contents

        // Section 4 labels & links
            $section_4_label_link = [
                'label' => $request->section_4_button_label,
                'link' => $request->section_4_button_link
            ];
        // Section 4 labels & links

        $data = $request->except(
            'old_section_2_image',
            'new_section_2_image',
            'section_3_labels',
            'section_3_contents',
            'section_4_button_label',
            'section_4_button_link',
        );
        $data['section_2_image_' . '' . $short_code] = $section_2_image_name;
        $data['section_3_labels_contents_' . '' . $short_code] = $final_label_contents ?? null;
        $data['section_4_label_link_' . '' . $short_code] = json_encode($section_4_label_link);

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}