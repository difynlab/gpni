<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSupport;
use App\Mail\TechnicalSupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TechnicalSupportController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        return view('frontend.student.technical-supports', [
            'student' => $student
        ]);
    }

    public function store(Request $request)
    {
        $technical_support = new TechnicalSupport();
        $technical_support->user_id = Auth::user()->id;
        $technical_support->subject = $request->subject;
        $technical_support->message = $request->message;
        $technical_support->status = '1';
        $technical_support->save();

        $mail_data = [
            'user_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            'user_email' => Auth::user()->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to(Auth::user()->email)->send(new TechnicalSupportMail($mail_data, 'user'));
        Mail::to(config('app.admin_email'))->send(new TechnicalSupportMail($mail_data, 'admin'));

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
