<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function index($email, $token)
    {
        $contents = AuthenticationContent::find(1);
        
        $reset_password = PasswordResetToken::where('email', $email)->whereNotNull('token')->orderBy('created_at', 'desc')->first();

        if(!$reset_password || $reset_password->token !== $token) {
            abort(404);
        }

        return view('frontend.auth.reset-password', [
            'email' => $email,
            'token' => $token,
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
                'activity' => 'reset-password',
                'response' => $response->json(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Captcha verification failed!');;
        }
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'token' => 'required'
        ], [
            'password.min' => 'The password must be at least 8 characters long',
            'confirm_password.same' => 'The confirm password must match the password'
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reset_password = PasswordResetToken::where('email', $request->email)->orderBy('created_at', 'desc')->first();

        if(!$reset_password || $reset_password->token !== $request->token) {
            return redirect()->back()->with('error', 'Invalid or expired reset token');
        }

        $user = User::where('email', $request->email)->first();
        if($user) {
            $user->password = $request->password;
            $user->save();

            return redirect()->route('frontend.login')->with('success', 'Password has been reset successfully');
        }

        return redirect()->back()->with('email', 'The email does not exist in the database');
    }
}
