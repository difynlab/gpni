<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use App\Models\AuthenticationContent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function index()
    { 
        $contents = AuthenticationContent::find(1);
        
        return view('frontend.auth.forgot-password', [
            'contents' => $contents
        ]);
    }

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
                'activity' => 'forgot-password',
                'response' => $response->json(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Captcha verification failed!');;
        }
        
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                function($attribute, $value, $fail) {
                    $user = User::where('email', $value)->where('role', 'student')->first();
                    if(!$user) {
                        $fail('The email does not belong to a student or does not exist in the database');
                    }
                },
            ],
        ], [
            'email.required' => 'The email field is required',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Reset password request failed');
        }

        $token = Str::random(40) . microtime(true);
        $token = Str::substr(md5($token), 0, 60);

        $password_reset = new PasswordResetToken();
        $password_reset->email = $request->email;
        $password_reset->token = $token;
        $password_reset->save();

        $user = User::where('email', $request->email)->where('role', 'student')->where('status', '1')->first();
        $role = $user->role;

        $mail_data = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'token' => $token,
        ];

        Mail::to([$request->email])->send(new ResetPasswordMail($mail_data, $role));

        return redirect()->back()->with('success', "Email sent successfully");
    }
}
