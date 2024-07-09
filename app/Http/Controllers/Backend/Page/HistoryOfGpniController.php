<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\HistoryOfGpniContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HistoryOfGpniController extends Controller
{
    public function index()
    {
        $contents = HistoryOfGpniContent::find(1);

        return view('backend.pages.history-of-gpni', [
            'contents' => $contents
        ]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'new_section_1_image' => 'max:2048',
            'new_section_3_image' => 'max:2048',
            'new_section_4_image' => 'max:2048',
            'new_section_5_image' => 'max:2048',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', 'Update failed!');
        }

        $contents = HistoryOfGpniContent::find(1);

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

        // Section 3 image
            if($request->file('new_section_3_image')) {
                if($request->old_section_3_image) {
                    Storage::delete('public/pages/' . $request->old_section_3_image);
                }

                $new_section_3_image = $request->file('new_section_3_image');
                $section_3_image_name = Str::random(40) . '.' . $new_section_3_image->getClientOriginalExtension();
                $new_section_3_image->storeAs('public/pages', $section_3_image_name);
            }
            else {
                if($contents->section_3_image) {
                    $section_3_image_name = $request->old_section_3_image;
                }
                else {
                    $section_3_image_name = null;
                }
            }
        // Section 3 image

        // Section 4 image
            if($request->file('new_section_4_image')) {
                if($request->old_section_4_image) {
                    Storage::delete('public/pages/' . $request->old_section_4_image);
                }

                $new_section_4_image = $request->file('new_section_4_image');
                $section_4_image_name = Str::random(40) . '.' . $new_section_4_image->getClientOriginalExtension();
                $new_section_4_image->storeAs('public/pages', $section_4_image_name);
            }
            else {
                if($contents->section_4_image) {
                    $section_4_image_name = $request->old_section_4_image;
                }
                else {
                    $section_4_image_name = null;
                }
            }
        // Section 4 image

        // Section 5 image
            if($request->file('new_section_5_image')) {
                if($request->old_section_5_image) {
                    Storage::delete('public/pages/' . $request->old_section_5_image);
                }

                $new_section_5_image = $request->file('new_section_5_image');
                $section_5_image_name = Str::random(40) . '.' . $new_section_5_image->getClientOriginalExtension();
                $new_section_5_image->storeAs('public/pages', $section_5_image_name);
            }
            else {
                if($contents->section_5_image) {
                    $section_5_image_name = $request->old_section_5_image;
                }
                else {
                    $section_5_image_name = null;
                }
            }
        // Section 5 image

        $data = $request->except(
            'old_section_1_image',
            'new_section_1_image',
            'old_section_3_image',
            'new_section_3_image',
            'old_section_4_image',
            'new_section_4_image',
            'old_section_5_image',
            'new_section_5_image'
        );
                
        $data['section_1_image'] = $section_1_image_name;

        $data['section_3_image'] = $section_3_image_name;

        $data['section_4_image'] = $section_4_image_name;

        $data['section_5_image'] = $section_5_image_name;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}