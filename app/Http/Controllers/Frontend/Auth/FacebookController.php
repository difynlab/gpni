<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $find_user = User::where('email', $user->email)->first();

            if($find_user) {
                Auth::login($find_user);
                $redirect_url = $request->redirect ?? route('frontend.dashboard.index');
                return redirect()->intended($redirect_url);
            }
            else {
                list($first_name, $last_name) = explode(' ', $user->name, 2);

                $new_user = User::create([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $user->email,
                    'password' => encrypt('secret123'),
                    'language' => 'English',
                    'role' => 'student',
                    'facebook_id'=> $user->id,
                    'status'=> '1',
                ]);

                Auth::login($new_user);
                $redirect_url = $request->redirect ?? route('frontend.dashboard.index');
                return redirect()->intended($redirect_url);
            }
        }
        catch(\Exception $e) {
            Log::error("Failed to create account: " . $e->getMessage());
        }
    }
}