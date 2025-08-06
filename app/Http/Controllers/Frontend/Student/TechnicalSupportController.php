<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSupport;
use App\Mail\TechnicalSupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $auth = Auth::user();

        $technical_support = new TechnicalSupport();
        $technical_support->user_id = $auth->id;
        $technical_support->subject = $request->subject;
        $technical_support->message = $request->message;
        $technical_support->status = '1';
        $technical_support->save();

        $mail_data = [
            'user_name' => $auth->first_name . ' ' . $auth->last_name,
            'user_email' => $auth->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        send_email(new TechnicalSupportMail($mail_data, 'user'), $auth->email);
        send_email(new TechnicalSupportMail($mail_data, 'admin'), config('app.admin_emails'));

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
