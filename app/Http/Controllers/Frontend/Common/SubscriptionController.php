<?php

namespace App\Http\Controllers\Frontend\Common;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => config('services.hcaptcha.secret'),
            'response' => $request->input('h-captcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if(!optional($response->json())['success']) {
            Log::warning('hCaptcha verification failed', [
                'ip'       => $request->ip(),
                'activity' => 'login',
                'response' => $response->json(),
                'user_agent' => $request->userAgent(),
            ]);
            
            return redirect()->back()->withInput()->with('error', 'Captcha verification failed!');;
        }
        
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                function($attribute, $value, $fail) {
                    if(Subscription::where('email', $value)->where('status', '1')->exists()) {
                        $fail('This email is already subscribed');
                    }
                },
            ],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->status = '1';
        $subscription->save();

        $mail_data = [
            'email' => $request->email
        ];

        send_email(new SubscriptionMail($mail_data, 'user'), $request->email);
        send_email(new SubscriptionMail($mail_data, 'admin'), config('app.admin_emails'));

        return redirect()->back()->with('success', 'Successfully subscribed');
    }
}