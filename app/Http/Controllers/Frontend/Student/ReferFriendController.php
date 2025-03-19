<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\ReferFriend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferFriendMail;
use Illuminate\Support\Str;

class ReferFriendController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $invites = ReferFriend::where('user_id', $student->id)->where('status', '1')->get();
    
        return view('frontend.student.refer-friends', [
            'invites' => $invites,
            'student' => $student
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $code = Str::random(40) . microtime(true);
        $code = Str::substr(md5($code), 0, 60);

        $refer = new ReferFriend();
        $refer->user_id = $user->id;
        $refer->email = $request->email;
        $refer->code = $code;
        $refer->status = '1';
        $refer->save();

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'code' => $code
        ];

        Mail::to([$request->email])->send(new ReferFriendMail($mail_data));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }
}