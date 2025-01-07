<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\OurPolicyContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OurPolicyController extends Controller
{
    public function index($language)
    {
        $contents = OurPolicyContent::find(1);

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

        return view('backend.pages.our-policies', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_cec_images.*' => 'max:30720'
        ], [
            'new_cec_images.*.max' => 'Each image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $contents = OurPolicyContent::find(1);

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

        // CEC points
            $cec_points = [];
            if($request->cec_points_points)
                foreach($request->cec_points_type as $key => $cec_points_type) {
                    array_push($cec_points, [
                        'type' => $cec_points_type,
                        'description' => $request->cec_points_description[$key],
                        'points' => $request->cec_points_points[$key]
                    ]);
                }
            else {
                $cec_points = null;
            }
        // CEC points

        // CEC images
            if($request->file('new_cec_images') != null) {
                if($request->old_cec_images) {
                    $encoded_string = htmlspecialchars_decode($request->old_cec_images);
                    $images = json_decode($encoded_string);

                    foreach($images as $image) {
                        Storage::delete('public/backend/pages/' . $image);
                    }
                }

                $cec_images = [];
                foreach($request->file('new_cec_images') as $image) {
                    $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/backend/pages', $image_name);
                    $cec_images[] = $image_name;
                }

                $cec_images = json_encode($cec_images);
            }
            else {
                if($contents->{'cec_images_' . $short_code}) {
                    $cec_images = htmlspecialchars_decode($request->old_cec_images);
                }
                else {
                    $cec_images = null;
                }
            }
        // CEC images

        $data = $request->except(
            'old_cec_images',
            'new_cec_images',
            'cec_points_type',
            'cec_points_description',
            'cec_points_points',
        );

        $data['cec_points_' . '' . $short_code] = $cec_points;
        $data['cec_images_' . '' . $short_code] = $cec_images;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}