<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\MasterClassContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MasterClassController extends Controller
{
    private function deleteOldRemovedFiles($course_chapter, $field, $name, $path)
    {
        $existing_files = collect(json_decode($course_chapter->$field, true));
        $existing_files = collect($existing_files->pluck('image')->all());
        $old_files = collect($name);
        $missing_files = $existing_files->diff($old_files);

        if($missing_files->isNotEmpty()) {
            foreach($missing_files as $key => $missing_file) {
                Storage::delete('public/backend/courses/' . $path . $missing_file);
            }
        }
    }
    
    public function index($language)
    {
        $contents = MasterClassContent::find(1);

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

        return view('backend.pages.master-class', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'section_3_point_files.*' => 'max:30720',
            'new_section_4_video' => 'max:204800',
        ], [
            'section_3_point_files.*.max' => 'Each image must not be greater than 30 MB',
            'new_section_4_video.max' => 'Video must not be greater than 200 MB',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $contents = MasterClassContent::find(1);

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

        // Section points store function
            $section_3_points = [];

            $this->deleteOldRemovedFiles($contents, 'section_3_points_' . '' . $short_code, $request->old_section_3_point_files, 'course-images/');

            if($request->old_section_3_point_descriptions) {
                foreach($request->old_section_3_point_descriptions as $key => $old_section_3_point_description) {
                    array_push($section_3_points, [
                        'description' => $old_section_3_point_description,
                        'image' => $request->old_section_3_point_files[$key] ?? null
                    ]);
                }
            }

            if($request->section_3_point_descriptions) {
                foreach($request->section_3_point_descriptions as $key => $section_3_point_description) {
                    if($request->section_3_point_files && $request->section_3_point_files[$key]) {
                        $image = $request->section_3_point_files[$key];
                        $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('public/backend/courses/course-images', $image_name);
                    }

                    array_push($section_3_points, [
                        'description' => $section_3_point_description,
                        'image' => $image_name ?? null
                    ]);
                }
            }

            $final_section_3_points = $section_3_points ? json_encode($section_3_points) : null;
        // Section points store function

        // Section 4 video
            if($request->file('new_section_4_video')) {
                if($request->old_section_4_video) {
                    Storage::delete('public/backend/pages/' . $request->old_section_4_video);
                }

                $new_section_4_video = $request->file('new_section_4_video');
                $section_4_video_name = Str::random(40) . '.' . $new_section_4_video->getClientOriginalExtension();
                $new_section_4_video->storeAs('public/backend/pages', $section_4_video_name);
            }
            else if($request->old_section_4_video == null) {
                if($contents->{'section_4_video_' . $short_code}) {
                    Storage::delete('public/backend/pages/' . $contents->{'section_4_video_' . $short_code});
                }

                $section_4_video_name = null;
            }
            else {
                if($contents->{'section_4_video_' . $short_code}) {
                    $section_4_video_name = $request->old_section_4_video;
                }
                else {
                    $section_4_video_name = null;
                }
            }
        // Section 4 video

        $data = $request->except(
            'section_3_point_descriptions',
            'old_section_3_point_descriptions',
            'section_3_point_files',
            'old_section_3_point_files',
            'old_section_4_video',
            'new_section_4_video',
        );
        $data['section_3_points_' . '' . $short_code] = $final_section_3_points ?? null;
        $data['section_4_video_' . '' . $short_code] = $section_4_video_name;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}