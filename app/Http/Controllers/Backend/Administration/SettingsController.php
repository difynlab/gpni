<?php

namespace App\Http\Controllers\Backend\Administration;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);

        return view('backend.administrations.settings', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1);

        $validator = Validator::make($request->all(), [
            'logo' => 'image|max:2048',
            'favicon' => 'image|max:2048',
        ], [
            'logo.image' => 'The uploaded file must be an image',
            'logo.max' => 'The image size must not exceed 2 MB',

            'favicon.image' => 'The uploaded file must be an image',
            'favicon.max' => 'The image size must not exceed 2 MB',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_logo') != null) {
            if($request->old_logo) {
                Storage::delete('public/' . $request->old_logo);
            }

            $logo = $request->file('new_logo');
            $logo_name = 'logo.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public', $logo_name);
        }
        else {
            $logo_name = $request->old_logo;
        }

        if($request->file('new_favicon') != null) {
            if($request->old_favicon) {
                Storage::delete('public/' . $request->old_favicon);
            }

            $favicon = $request->file('new_favicon');
            $favicon_name = 'favicon.' . $favicon->getClientOriginalExtension();
            $favicon->storeAs('public', $favicon_name);
        }
        else {
            $favicon_name = $request->old_favicon;
        }

        $data = $request->except('old_logo', 'new_logo', 'old_favicon', 'new_favicon');
        $data['logo'] = $logo_name;
        $data['favicon'] = $favicon_name;
        $setting->fill($data)->save();

        return redirect()->route('backend.settings.index')->with('success', "Successfully updated!");
    }
}
