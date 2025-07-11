<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseInformationController extends Controller
{
    private function deleteOldRemovedFiles($course, $field, $name, $path)
    {
        $existing_files = collect(json_decode($course->$field, true));
        $existing_files = collect($existing_files->pluck('image')->all());
        $old_files = collect($name);
        $missing_files = $existing_files->diff($old_files);

        if($missing_files->isNotEmpty()) {
            foreach($missing_files as $key => $missing_file) {
                Storage::delete('public/backend/courses/' . $path . $missing_file);
            }
        }
    }

    public function index(Course $course)
    {
        return view('backend.course-information.index', [
            'course' => $course
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'new_certification_section_2_image' => 'nullable|max:30720',
            'certification_section_3_point_files.*' => 'nullable|max:30720',
            'new_certification_section_4_video' => 'nullable|max:204800',
            'certification_section_6_team_files.*' => 'nullable|max:30720',
            'new_certification_section_7_video' => 'nullable|max:204800',
            'new_certification_section_8_image' => 'nullable|max:30720',
            'new_certification_section_10_image' => 'nullable|max:30720',
            'new_certification_section_11_image' => 'nullable|max:30720',
            'new_certification_section_14_video' => 'nullable|max:204800',
            'new_certification_section_15_video' => 'nullable|max:204800',

            'new_master_section_4_image' => 'nullable|max:30720',
            'new_master_section_7_video' => 'nullable|max:204800',
            'master_section_8_video_files.*' => 'nullable|max:204800',
        ], [
            'new_certification_section_2_image.max' => 'Image must not be greater than 30 MB',
            'certification_section_3_point_files.*.max' => 'Each image must not be greater than 30 MB',
            'new_certification_section_4_video.max' => 'Video must not be greater than 200 MB',
            'certification_section_6_team_files.*.max' => 'Each image must not be greater than 30 MB',
            'new_certification_section_7_video.max' => 'Video must not be greater than 200 MB',
            'new_certification_section_8_image.max' => 'Image must not be greater than 30 MB',
            'new_certification_section_10_image.max' => 'Image must not be greater than 30 MB',
            'new_certification_section_10_image.max' => 'Image must not be greater than 30 MB',
            'new_certification_section_14_video.max' => 'Video must not be greater than 200 MB',
            'new_certification_section_15_video.max' => 'Video must not be greater than 200 MB',

            'new_master_section_4_image.max' => 'Image must not be greater than 30 MB',
            'new_master_section_7_video.max' => 'Video must not be greater than 200 MB',
            'master_section_8_video_files.*.max' => 'Each video must not be greater than 200 MB',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        // Section 2 image
            if($request->file('new_certification_section_2_image')) {
                if($request->old_certification_section_2_image) {
                    Storage::delete('public/backend/courses/course-images/' . $request->old_certification_section_2_image);
                }

                $new_certification_section_2_image = $request->file('new_certification_section_2_image');
                $certification_section_2_image_name = Str::random(40) . '.' . $new_certification_section_2_image->getClientOriginalExtension();
                $new_certification_section_2_image->storeAs('public/backend/courses/course-images', $certification_section_2_image_name);
            }
            else {
                if($course->certification_section_2_image) {
                    $certification_section_2_image_name = $request->old_certification_section_2_image;
                }
                else {
                    $certification_section_2_image_name = null;
                }
            }
        // Section 2 image

        // Section 2 points
            $certification_section_2_points = [];
            if($request->certification_section_2_points) {
                $certification_section_2_points = json_encode($request->certification_section_2_points);
            }
            else {
                $certification_section_2_points = null;
            }
        // Section 2 points

        // Section 3 points
            $certification_section_3_points = [];

            $this->deleteOldRemovedFiles($course, 'certification_section_3_points', $request->old_certification_section_3_point_files, 'course-images/');

            if($request->old_certification_section_3_point_descriptions) {
                foreach($request->old_certification_section_3_point_descriptions as $key => $old_certification_section_3_point_description) {
                    array_push($certification_section_3_points, [
                        'description' => $old_certification_section_3_point_description,
                        'image' => $request->old_certification_section_3_point_files[$key] ?? null
                    ]);
                }
            }

            if($request->certification_section_3_point_descriptions) {
                foreach($request->certification_section_3_point_descriptions as $key => $certification_section_3_point_description) {
                    if($request->certification_section_3_point_files && $request->certification_section_3_point_files[$key]) {
                        $image = $request->certification_section_3_point_files[$key];
                        $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('public/backend/courses/course-images', $image_name);
                    }

                    array_push($certification_section_3_points, [
                        'description' => $certification_section_3_point_description,
                        'image' => $image_name ?? null
                    ]);
                }
            }

            $final_certification_section_3_points = $certification_section_3_points ? json_encode($certification_section_3_points) : null;
        // Section 3 points

        // Section 4 video
            if($request->file('new_certification_section_4_video')) {
                if($request->old_certification_section_4_video) {
                    Storage::delete('public/backend/courses/course-videos/' . $request->old_certification_section_4_video);
                }

                $new_certification_section_4_video = $request->file('new_certification_section_4_video');
                $certification_section_4_video_name = Str::random(40) . '.' . $new_certification_section_4_video->getClientOriginalExtension();
                $new_certification_section_4_video->storeAs('public/backend/courses/course-videos', $certification_section_4_video_name);
            }
            else {
                if($course->certification_section_4_video) {
                    $certification_section_4_video_name = $request->old_certification_section_4_video;
                }
                else {
                    $certification_section_4_video_name = null;
                }
            }
        // Section 4 video

        // Section 6 points
            $certification_section_6_teams = [];

            $this->deleteOldRemovedFiles($course, 'certification_section_6_teams', $request->old_certification_section_6_team_files, 'course-images/');

            if($request->old_certification_section_6_team_names) {
                foreach($request->old_certification_section_6_team_names as $key => $old_certification_section_6_team_name) {
                    array_push($certification_section_6_teams, [
                        'name' => $old_certification_section_6_team_name,
                        'image' => $request->old_certification_section_6_team_files[$key] ?? null
                    ]);
                }
            }

            if($request->certification_section_6_team_names) {
                foreach($request->certification_section_6_team_names as $key => $certification_section_6_team_name) {
                    if($request->certification_section_6_team_files && $request->certification_section_6_team_files[$key]) {
                        $image = $request->certification_section_6_team_files[$key];
                        $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                        $image->storeAs('public/backend/courses/course-images', $image_name);
                    }

                    array_push($certification_section_6_teams, [
                        'name' => $certification_section_6_team_name,
                        'image' => $image_name ?? null
                    ]);
                }
            }

            $final_certification_section_6_teams = $certification_section_6_teams ? json_encode($certification_section_6_teams) : null;
        // Section 6 points

        // Section 7 video
            if($request->file('new_certification_section_7_video')) {
                if($request->old_certification_section_7_video) {
                    Storage::delete('public/backend/courses/course-videos/' . $request->old_certification_section_7_video);
                }

                $new_certification_section_7_video = $request->file('new_certification_section_7_video');
                $certification_section_7_video_name = Str::random(40) . '.' . $new_certification_section_7_video->getClientOriginalExtension();
                $new_certification_section_7_video->storeAs('public/backend/courses/course-videos', $certification_section_7_video_name);
            }
            else {
                if($course->certification_section_7_video) {
                    $certification_section_7_video_name = $request->old_certification_section_7_video;
                }
                else {
                    $certification_section_7_video_name = null;
                }
            }
        // Section 7 video

        // Section 7 labels & links
            $certification_section_7_label_link = [
                'label' => $request->certification_section_7_button_label,
                'link' => $request->certification_section_7_button_link
            ];
        // Section 7 labels & links

        // Section 8 image
            if($request->file('new_certification_section_8_image')) {
                if($request->old_certification_section_8_image) {
                    Storage::delete('public/backend/courses/course-images/' . $request->old_certification_section_8_image);
                }

                $new_certification_section_8_image = $request->file('new_certification_section_8_image');
                $certification_section_8_image_name = Str::random(40) . '.' . $new_certification_section_8_image->getClientOriginalExtension();
                $new_certification_section_8_image->storeAs('public/backend/courses/course-images', $certification_section_8_image_name);
            }
            else {
                if($course->certification_section_8_image) {
                    $certification_section_8_image_name = $request->old_certification_section_8_image;
                }
                else {
                    $certification_section_8_image_name = null;
                }
            }
        // Section 8 image

        // Section 9 points
            $certification_section_9_points = $request->certification_section_9_points ? json_encode($request->certification_section_9_points) : null;
        // Section 9 points

        // Section 10 image
            if($request->file('new_certification_section_10_image')) {
                if($request->old_certification_section_10_image) {
                    Storage::delete('public/backend/courses/course-images/' . $request->old_certification_section_10_image);
                }

                $new_certification_section_10_image = $request->file('new_certification_section_10_image');
                $certification_section_10_image_name = Str::random(40) . '.' . $new_certification_section_10_image->getClientOriginalExtension();
                $new_certification_section_10_image->storeAs('public/backend/courses/course-images', $certification_section_10_image_name);
            }
            else {
                if($course->certification_section_10_image) {
                    $certification_section_10_image_name = $request->old_certification_section_10_image;
                }
                else {
                    $certification_section_10_image_name = null;
                }
            }
        // Section 10 image

        // Section 10 label & link
            $certification_section_10_label_link = [
                'label' => $request->certification_section_10_button_label,
                'link' => $request->certification_section_10_button_link
            ];
        // Section 10 label & link

        // Section 10 points
            $certification_section_10_points = [];
            if($request->certification_section_10_point_titles) {
                foreach($request->certification_section_10_point_titles as $key => $certification_section_10_point_title) {
                    array_push($certification_section_10_points, [
                        'title' => $certification_section_10_point_title,
                        'description' => $request->certification_section_10_point_descriptions[$key]
                    ]);
                }

                $certification_section_10_points = json_encode($certification_section_10_points);
            }
            else {
                $certification_section_10_points = null;
            }
            
        // Section 10 points

        // Section 11 video
            if($request->file('new_certification_section_11_image')) {
                if($request->old_certification_section_11_image) {
                    Storage::delete('public/backend/courses/course-images/' . $request->old_certification_section_11_image);
                }

                $new_certification_section_11_image = $request->file('new_certification_section_11_image');
                $certification_section_11_image_name = Str::random(40) . '.' . $new_certification_section_11_image->getClientOriginalExtension();
                $new_certification_section_11_image->storeAs('public/backend/courses/course-images', $certification_section_11_image_name);
            }
            else {
                if($course->certification_section_11_image) {
                    $certification_section_11_image_name = $request->old_certification_section_11_image;
                }
                else {
                    $certification_section_11_image_name = null;
                }
            }
        // Section 11 video
    
        // Section 11 labels & links
            $certification_section_11_label_link = [
                'label' => $request->certification_section_11_button_label,
                'link' => $request->certification_section_11_button_link
            ];
        // Section 11 labels & links

        // Section 12 labels & links
            $certification_section_12_label_link = [
                'label' => $request->certification_section_12_button_label,
                'link' => $request->certification_section_12_button_link
            ];
        // Section 12 labels & links

        // Section 13 points
            $certification_section_13_table_points = [];

            if($request->certification_section_13_table_first_points) {
                foreach($request->certification_section_13_table_first_points as $key => $certification_section_13_table_first_point) {
                    array_push($certification_section_13_table_points, [
                        'first' => $certification_section_13_table_first_point,
                        'second' => $request->certification_section_13_table_second_points[$key],
                        'third' => $request->certification_section_13_table_third_points[$key]
                    ]);
                }

                $certification_section_13_table_points = json_encode($certification_section_13_table_points);
            }
            else {
                $certification_section_13_table_points = null;
            }
        // Section 13 points

        // Section 13 labels & links
            $certification_section_13_label_link = [
                'label' => $request->certification_section_13_button_label,
                'link' => $request->certification_section_13_button_link
            ];
        // Section 13 labels & links

        // Section 14 video
            if($request->file('new_certification_section_14_video')) {
                if($request->old_certification_section_14_video) {
                    Storage::delete('public/backend/courses/course-videos/' . $request->old_certification_section_14_video);
                }

                $new_certification_section_14_video = $request->file('new_certification_section_14_video');
                $certification_section_14_video_name = Str::random(40) . '.' . $new_certification_section_14_video->getClientOriginalExtension();
                $new_certification_section_14_video->storeAs('public/backend/courses/course-videos', $certification_section_14_video_name);
            }
            else {
                if($course->certification_section_14_video) {
                    $certification_section_14_video_name = $request->old_certification_section_14_video;
                }
                else {
                    $certification_section_14_video_name = null;
                }
            }
        // Section 14 video

        // Section 15 video
            if($request->file('new_certification_section_15_video')) {
                if($request->old_certification_section_15_video) {
                    Storage::delete('public/backend/courses/course-videos/' . $request->old_certification_section_15_video);
                }

                $new_certification_section_15_video = $request->file('new_certification_section_15_video');
                $certification_section_15_video_name = Str::random(40) . '.' . $new_certification_section_15_video->getClientOriginalExtension();
                $new_certification_section_15_video->storeAs('public/backend/courses/course-videos', $certification_section_15_video_name);
            }
            else {
                if($course->certification_section_15_video) {
                    $certification_section_15_video_name = $request->old_certification_section_15_video;
                }
                else {
                    $certification_section_15_video_name = null;
                }
            }
        // Section 15 video

        // Section 15 labels & links
            $certification_section_15_label_link = [
                'label' => $request->certification_section_15_button_label,
                'link' => $request->certification_section_15_button_link
            ];
        // Section 15 labels & links

        // Section 15 points
            $certification_section_15_points = [];
            if($request->certification_section_15_point_titles) {
                foreach($request->certification_section_15_point_titles as $key => $certification_section_15_point_title) {
                    array_push($certification_section_15_points, [
                        'title' => $certification_section_15_point_title,
                        'description' => $request->certification_section_15_point_descriptions[$key]
                    ]);
                }

                $certification_section_15_points = json_encode($certification_section_15_points);
            }
            else {
                $certification_section_15_points = null;
            }
        // Section 15 points

        // Section 16 labels & links
            $certification_section_16_label_link = [
                'label' => $request->certification_section_16_button_label,
                'link' => $request->certification_section_16_button_link
            ];
        // Section 16 labels & links

        // Master section 2 points
            $master_section_2_points = $request->master_section_2_points ? json_encode($request->master_section_2_points) : null;
        // Master section 2 points

        // Master section 4 image
            if($request->file('new_master_section_4_image')) {
                if($request->old_master_section_4_image) {
                    Storage::delete('public/backend/courses/course-images/' . $request->old_master_section_4_image);
                }

                $new_master_section_4_image = $request->file('new_master_section_4_image');
                $master_section_4_image_name = Str::random(40) . '.' . $new_master_section_4_image->getClientOriginalExtension();
                $new_master_section_4_image->storeAs('public/backend/courses/course-images', $master_section_4_image_name);
            }
            else {
                if($course->master_section_4_image) {
                    $master_section_4_image_name = $request->old_master_section_4_image;
                }
                else {
                    $master_section_4_image_name = null;
                }
            }
        // Master section 4 image

        // Master section 5 label & link
            $master_section_5_label_link = [
                'label' => $request->master_section_5_button_label,
                'link' => $request->master_section_5_button_link
            ];
        // Master section 5 label & link

        // Master section 7 video
            if($request->file('new_master_section_7_video')) {
                if($request->old_master_section_7_video) {
                    Storage::delete('public/backend/courses/course-videos/' . $request->old_master_section_7_video);
                }

                $new_master_section_7_video = $request->file('new_master_section_7_video');
                $master_section_7_video_name = Str::random(40) . '.' . $new_master_section_7_video->getClientOriginalExtension();
                $new_master_section_7_video->storeAs('public/backend/courses/course-videos', $master_section_7_video_name);
            }
            else {
                if($course->master_section_7_video) {
                    $master_section_7_video_name = $request->old_master_section_7_video;
                }
                else {
                    $master_section_7_video_name = null;
                }
            }
        // Master section 7 video

        // Master section 8 videos
            $master_section_8_video_files = [];

            $existing_files = collect(json_decode($course->master_section_8_videos, true));
            $existing_files = collect($existing_files->all());
            $old_files = collect($request->old_master_section_8_video_files);
            $missing_files = $existing_files->diff($old_files);

            if($missing_files->isNotEmpty()) {
                foreach($missing_files as $key => $missing_file) {
                    Storage::delete('public/backend/courses/course-videos/' . $missing_file);
                }
            }

            if($request->old_master_section_8_video_files) {
                foreach($request->old_master_section_8_video_files as $key => $old_master_section_8_video_file) {
                    array_push($master_section_8_video_files, $old_master_section_8_video_file);
                }
            }

            if($request->master_section_8_video_files != null) {
                foreach($request->master_section_8_video_files as $key => $master_section_8_video_file) {
                    $video = $master_section_8_video_file;
                    $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
                    $video->storeAs('public/backend/courses/course-videos', $video_name);

                    array_push($master_section_8_video_files, $video_name);
                }
            }

            $final_master_section_8_video_files = $master_section_8_video_files ? json_encode($master_section_8_video_files) : null;
        // Master section 8 videos

        $data = $request->except(
            'old_certification_section_2_image',
            'new_certification_section_2_image',
            'certification_section_3_point_descriptions',
            'certification_section_3_point_files',
            'old_certification_section_3_point_descriptions',
            'old_certification_section_3_point_files',
            'old_certification_section_4_video',
            'new_certification_section_4_video',
            'certification_section_6_team_names',
            'certification_section_6_team_files',
            'old_certification_section_6_team_names',
            'old_certification_section_6_team_files',
            'old_certification_section_7_video',
            'new_certification_section_7_video',
            'certification_section_7_button_label',
            'certification_section_7_button_link',
            'old_certification_section_8_image',
            'new_certification_section_8_image',
            'old_certification_section_10_image',
            'new_certification_section_10_image',
            'certification_section_10_point_titles',
            'certification_section_10_point_descriptions',
            'certification_section_10_button_label',
            'certification_section_10_button_link',
            'old_certification_section_11_image',
            'new_certification_section_11_image',
            'certification_section_11_button_label',
            'certification_section_11_button_link',
            'certification_section_12_button_label',
            'certification_section_12_button_link',
            'certification_section_13_table_first_points',
            'certification_section_13_table_second_points',
            'certification_section_13_table_third_points',
            'certification_section_13_button_label',
            'certification_section_13_button_link',
            'old_certification_section_14_video',
            'new_certification_section_14_video',
            'old_certification_section_15_video',
            'new_certification_section_15_video',
            'certification_section_15_button_label',
            'certification_section_15_button_link',
            'certification_section_15_point_titles',
            'certification_section_15_point_descriptions',
            'certification_section_16_button_label',
            'certification_section_16_button_link',

            'old_master_section_4_image',
            'new_master_section_4_image',
            'master_section_5_button_label',
            'master_section_5_button_link',
            'old_master_section_7_video',
            'new_master_section_7_video',
            'master_section_8_video_files',
            'old_master_section_8_video_files'
        );

        $data['certification_section_2_image'] = $certification_section_2_image_name;
        $data['certification_section_2_points'] = $certification_section_2_points;
        $data['certification_section_3_points'] = $final_certification_section_3_points;
        $data['certification_section_4_video'] = $certification_section_4_video_name;
        $data['certification_section_6_teams'] = $final_certification_section_6_teams;
        $data['certification_section_7_label_link'] = $certification_section_7_label_link;
        $data['certification_section_7_video'] = $certification_section_7_video_name;
        $data['certification_section_8_image'] = $certification_section_8_image_name;
        $data['certification_section_9_points'] = $certification_section_9_points;
        $data['certification_section_10_image'] = $certification_section_10_image_name;
        $data['certification_section_10_label_link'] = json_encode($certification_section_10_label_link);
        $data['certification_section_10_points'] = $certification_section_10_points;
        $data['certification_section_11_image'] = $certification_section_11_image_name;
        $data['certification_section_11_label_link'] = json_encode($certification_section_11_label_link);
        $data['certification_section_12_label_link'] = json_encode($certification_section_12_label_link);
        $data['certification_section_13_table_points'] = $certification_section_13_table_points;
        $data['certification_section_13_label_link'] = $certification_section_13_label_link;
        $data['certification_section_14_video'] = $certification_section_14_video_name;
        $data['certification_section_15_video'] = $certification_section_15_video_name;
        $data['certification_section_15_label_link'] = json_encode($certification_section_15_label_link);
        $data['certification_section_15_points'] = $certification_section_15_points;
        $data['certification_section_16_label_link'] = $certification_section_16_label_link;

        $data['master_section_2_points'] = $master_section_2_points;
        $data['master_section_4_image'] = $master_section_4_image_name;
        $data['master_section_5_label_link'] = json_encode($master_section_5_label_link);
        $data['master_section_7_video'] = $master_section_7_video_name;
        $data['master_section_8_videos'] = $final_master_section_8_video_files;

        $course->fill($data)->save();
        
        return redirect()->route('backend.courses.information.index', $course)->with('success', "Successfully updated!");
    }
}