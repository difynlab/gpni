<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomepageController extends Controller
{
    public function index()
    {
        $contents = HomepageContent::find(1);

        return view('backend.pages.home-page', [
            'contents' => $contents
        ]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'new_section_1_image' => 'max:2048',
            'new_section_5_images.*' => 'max:2048',
        ], [
            'new_section_5_images.*.max' => 'Each image must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', 'Update failed!');
        }
        
        $contents = HomepageContent::find(1);

        // Section 1 image
            if($request->file('new_section_1_image')) {
                if($request->old_section_1_image) {
                    Storage::delete('public/pages/' . $request->old_section_1_image);
                }

                $new_section_1_image = $request->file('new_section_1_image');
                $section_1_image_name = Str::random(40) . '.' . $new_section_1_image->getClientOriginalExtension();
                $new_section_1_image->storeAs('public/pages', $section_1_image_name);
            }
            else {
                if($contents->section_1_image) {
                    $section_1_image_name = $request->old_section_1_image;
                }
                else {
                    $section_1_image_name = null;
                }
            }
        // Section 1 image

        // Section 1 labels & links
            $section_1_labels_links = [];
            foreach($request->section_1_button_labels as $key => $section_1_button_label) {
                array_push($section_1_labels_links, [
                    'label' => $section_1_button_label,
                    'link' => $request->section_1_button_links[$key]
                ]);
            }
        // Section 1 labels & links

        // Section 2 video
            if($request->file('new_section_2_video')) {
                if($request->old_section_2_video) {
                    Storage::delete('public/pages/' . $request->old_section_2_video);
                }

                $new_section_2_video = $request->file('new_section_2_video');
                $section_2_video_name = Str::random(40) . '.' . $new_section_2_video->getClientOriginalExtension();
                $new_section_2_video->storeAs('public/pages', $section_2_video_name);
            }
            else {
                if($contents->section_2_video) {
                    $section_2_video_name = $request->old_section_2_video;
                }
                else {
                    $section_2_video_name = null;
                }
            }
        // Section 2 video

        // Section 5 images
            if($request->file('new_section_5_images') != null) {
                if($request->old_section_5_images) {
                    $encoded_string = htmlspecialchars_decode($request->old_section_5_images);
                    $images = json_decode($encoded_string);

                    foreach($images as $image) {
                        Storage::delete('public/pages/' . $image);
                    }
                }

                $section_5_images = [];
                foreach($request->file('new_section_5_images') as $image) {
                    $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/pages', $image_name);
                    $section_5_images[] = $image_name;
                }

                $section_5_images = json_encode($section_5_images);
            }
            else {
                if($contents->section_5_images) {
                    $section_5_images = htmlspecialchars_decode($request->old_section_5_images);
                }
                else {
                    $section_5_images = null;
                }
            }
        // Section 5 images

        // Section 6 labels & links
            $section_6_label_link = [
                'label' => $request->section_6_button_label,
                'link' => $request->section_6_button_link
            ];
        // Section 6 labels & links

        // Section 8 labels & links
            $section_8_labels_links = [];
            foreach($request->section_8_button_labels as $key => $section_8_button_label) {
                array_push($section_8_labels_links, [
                    'label' => $section_8_button_label,
                    'link' => $request->section_8_button_links[$key]
                ]);
            }
        // Section 8 labels & links

        $data = $request->except(
            'old_section_1_image',
            'new_section_1_image',
            'section_1_button_labels',
            'section_1_button_links',
            'old_section_2_video',
            'new_section_2_video',
            'old_section_5_images',
            'new_section_5_images',
            'section_6_button_label',
            'section_6_button_link',
            'section_8_button_labels',
            'section_8_button_links'
        );
        
        $data['section_1_image'] = $section_1_image_name;
        $data['section_1_labels_links'] = json_encode($section_1_labels_links);

        $data['section_2_video'] = $section_2_video_name;
        $data['section_2_points'] = json_encode($data['section_2_points']);

        $data['section_5_images'] = $section_5_images;

        $data['section_6_label_link'] = json_encode($section_6_label_link);

        $data['section_8_labels_links'] = json_encode($section_8_labels_links);

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}
