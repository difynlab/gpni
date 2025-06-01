<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\ArticleContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index($language)
    {
        $contents = ArticleContent::find(1);

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

        return view('backend.pages.article', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {

        $validator = Validator::make($request->all(), [
            'new_section_1_video' => 'max:102400'
        ], [
            'new_section_1_video.max' => 'Video must not be greater than 100 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $contents = ArticleContent::find(1);

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

        // Section 1 video
            if($request->file('new_section_1_video')) {
                if($request->old_section_1_video) {
                    Storage::delete('public/backend/pages/' . $request->old_section_1_video);
                }

                $new_section_1_video = $request->file('new_section_1_video');
                $section_1_video_name = Str::random(40) . '.' . $new_section_1_video->getClientOriginalExtension();
                $new_section_1_video->storeAs('public/backend/pages', $section_1_video_name);
            }
            else if($request->old_section_1_video == null) {
                if($contents->{'section_1_video_' . $short_code}) {
                    Storage::delete('public/backend/pages/' . $contents->{'section_1_video_' . $short_code});
                }

                $section_1_video_name = null;
            }
            else {
                if($contents->{'section_1_video_' . $short_code}) {
                    $section_1_video_name = $request->old_section_1_video;
                }
                else {
                    $section_1_video_name = null;
                }
            }
        // Section 1 video

        $data = $request->except(
            'old_section_1_video',
            'new_section_1_video'
        );

        $data['section_1_video_' . '' . $short_code] = $section_1_video_name;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}