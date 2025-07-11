<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    public function login()
    {
        $contents = AuthenticationContent::find(1);

        return view('frontend.auth.login', [
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
                'activity' => 'login',
                'response' => $response->json(),
                'user_agent' => $request->userAgent(),
            ]);
            
            return redirect()->back()->withInput()->with('error', 'Captcha verification failed!');;
        }

        $contents = AuthenticationContent::find(1);

        if(Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'student') {
                $redirect_url = $request->redirect ?? route('frontend.dashboard.index');
        
                return redirect()->intended($redirect_url);
            }
        }

        return back()->withErrors([
            'contents' => $contents,
            'login_failed' => 'These credentials do not match our records',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('frontend.homepage');
    }
}
