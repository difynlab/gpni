<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\StudentDashboardContentEN;
use App\Models\StudentDashboardContentJA;
use App\Models\StudentDashboardContentZH;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class StudentDashboardController extends Controller
{
    public function index($language)
    {
        switch($language){
            case 'english':
                $contents = StudentDashboardContentEN::find(1);
                break;
            case 'chinese':
                $contents = StudentDashboardContentZH::find(1);
                break;
            case 'japanese':
                $contents = StudentDashboardContentJA::find(1);
                break;
            default:
                $contents = StudentDashboardContentEN::find(1);
                break;
        }

        return view('backend.pages.student-dashboard', [
            'contents' => $contents,
            'language' => $language
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_member_corner_we_chat_qr' => 'max:30720'
        ], [
            'new_member_corner_we_chat_qr.max' => 'Image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        switch($language){
            case 'english':
                $contents = StudentDashboardContentEN::find(1);
                break;
            case 'chinese':
                $contents = StudentDashboardContentZH::find(1);
                break;
            case 'japanese':
                $contents = StudentDashboardContentJA::find(1);
                break;
            default:
                $contents = StudentDashboardContentEN::find(1);
                break;
        }

        // Member corner WeChat image
            if($request->file('new_member_corner_we_chat_qr')) {
                if($request->old_member_corner_we_chat_qr) {
                    Storage::delete('public/backend/pages/' . $request->old_member_corner_we_chat_qr);
                }

                $new_member_corner_we_chat_qr = $request->file('new_member_corner_we_chat_qr');
                $member_corner_we_chat_qr_name = Str::random(40) . '.' . $new_member_corner_we_chat_qr->getClientOriginalExtension();
                $new_member_corner_we_chat_qr->storeAs('public/backend/pages', $member_corner_we_chat_qr_name);
            }
            else if($request->old_member_corner_we_chat_qr == null) {
                if($contents->member_corner_we_chat_qr) {
                    Storage::delete('public/backend/pages/' . $contents->member_corner_we_chat_qr);
                }

                $member_corner_we_chat_qr_name = null;
            }
            else {
                if($contents->member_corner_we_chat_qr) {
                    $member_corner_we_chat_qr_name = $request->old_member_corner_we_chat_qr;
                }
                else {
                    $member_corner_we_chat_qr_name = null;
                }
            }
        // Member corner WeChat image

        $data = $request->except(
            'old_member_corner_we_chat_qr',
            'new_member_corner_we_chat_qr'
        );

        $data['member_corner_we_chat_qr'] = $member_corner_we_chat_qr_name;
        
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}