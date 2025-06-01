<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\GiftCardContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GiftCardController extends Controller
{
    public function index($language)
    {
        $contents = GiftCardContent::find(1);

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

        return view('backend.pages.gift-card', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_images.*' => 'max:30720'
        ], [
            'new_images.*.max' => 'Each image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $contents = GiftCardContent::find(1);
        
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

        // Images
            // if($request->file('new_images') != null) {
            //     if($request->old_images) {
            //         $encoded_string = htmlspecialchars_decode($request->old_images);
            //         $images = json_decode($encoded_string);

            //         foreach($images as $image) {
            //             Storage::delete('public/backend/pages/' . $image);
            //         }
            //     }

            //     $images = [];
            //     foreach($request->file('new_images') as $image) {
            //         $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            //         $image->storeAs('public/backend/pages', $image_name);
            //         $images[] = $image_name;
            //     }

            //     $images = json_encode($images);
            // }
            // else {
            //     if($contents->{'images_' . $short_code}) {
            //         $images = htmlspecialchars_decode($request->old_images);
            //     }
            //     else {
            //         $images = null;
            //     }
            // }

            $existing_images = json_decode($contents->{'images_' . $short_code}, true) ?? [];
            $current_images = json_decode(htmlspecialchars_decode($request->old_images), true) ?? [];

            $deleted_images = array_diff($existing_images, $current_images);
            foreach($deleted_images as $image) {
                Storage::delete('public/backend/pages/' . $image);
            }

            $images = $current_images;

            if($request->file('new_images') != null) {
                if($request->old_images) {
                    $encoded_string = htmlspecialchars_decode($request->old_images);
                    $images = json_decode($encoded_string);

                    foreach($images as $image) {
                        Storage::delete('public/backend/pages/' . $image);
                    }
                }

                $images = [];
                foreach($request->file('new_images') as $image) {
                    $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/backend/pages', $image_name);
                    $images[] = $image_name;
                }
            }
            
            $images = !empty($images) ? json_encode($images) : null;
        // Images

        $data = $request->except(
            'old_images',
            'new_images'
        );
        
        $data['images_' . '' . $short_code] = $images;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}