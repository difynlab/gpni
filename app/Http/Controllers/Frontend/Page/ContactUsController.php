<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\ContactUsContent;
use App\Models\Setting;
use App\Models\Connection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        $contents = ContactUsContent::find(1);
        $settings = Setting::find(1);

        return view('frontend.pages.contact-us', [
            'contents' => $contents,
            'settings' => $settings
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^\+?[0-9]+$/',
            'question' => 'required|min:10|max:65535',
            'comments' => 'required|min:10|max:65535',
        ], [
            'phone.unique' => 'The phone number is already in use',
            'phone.regex' => 'The phone number is invalid',
            'question.required' => 'This content field is required.',
            'question.min' => 'The content must be at least 10 characters.',
            'question.max' => 'The content must not be greater than 65535 characters.',
            'comments.required' => 'This comments field is required.',
            'comments.min' => 'The comments must be at least 10 characters.',
            'comments.max' => 'The comments must not be greater than 65535 characters.',
            
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Message sending failed!');
        }
        
        $connection = new Connection();
        $data = $request->except('middleware_language', 'middleware_language_name');
        $data['status'] = '1';
        $connection->create($data);

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
