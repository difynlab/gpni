<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\ReferFriend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferFriendMail;
use App\Models\ReferPointActivity;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReferFriendController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $invites = ReferFriend::where('user_id', $student->id)->where('status', '1')->get();
        // $refer_point_activities = ReferPointActivity::where('referred_by_id', $student->id)->where('status', '1')->get();

        // dd($invites, $refer_point_activities);
    
        return view('frontend.student.refer-friends', [
            'invites' => $invites,
            'student' => $student
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $check = ReferFriend::where('user_id', $user->id)->where('email', $request->email)->where('status', '1')->first();

        if($check) {
            return redirect()->back()->with('error', 'Already invited!');
        }

        $code = Str::random(40) . microtime(true);
        $code = Str::substr(md5($code), 0, 60);

        $refer = ReferFriend::create([
            'user_id' => $user->id,
            'email' => $request->email,
            'code' => $code,
            'status' => '1',
        ]);

        if($refer) {
            ReferPointActivity::create([
                'refer_id' => $refer->id,
                'referred_by_id' => $refer->user_id,
                'activity' => 'Referral link created',
                'date' => Carbon::now()->toDateString(),
                'time' => Carbon::now()->toTimeString(),
                'points' => 0,
                'balance' => 0,
                'type' => 'Addition',
                'status' => '1'
            ]);
        }

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'code' => $code
        ];

        Mail::to([$request->email])->send(new ReferFriendMail($mail_data));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }
}