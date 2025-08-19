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

        try {
            $portal_id = '40197468';

            if($request->middleware_language == 'en') {
                $form_id = '64e9ff1a-77b8-409d-84f7-c6cb06eb4673';
            }
            elseif($request->middleware_language == 'zh') {
                $form_id = '8fc6801d-3dd7-470c-aac8-5206d48c5ced';
            }
            else {
                $form_id = '7b536000-3c0e-4d8f-b654-2c4e7e42647f';
            }

            $hs_url = "https://api.hsforms.com/submissions/v3/integration/submit/{$portal_id}/{$form_id}";

            $payload = [
                'fields' => [
                    ['name' => 'email', 'value' => $subscription->email],
                ],
                'context' => [
                    'pageUri'  => $request->headers->get('referer') ?? url()->current(),
                    'pageName' => 'Subscription',
                ],
            ];

            $hs_res = Http::acceptJson()
                ->withHeaders(['Content-Type' => 'application/json'])
                ->timeout(8)
                ->retry(2, 200)
                ->post($hs_url, $payload);

            if(!$hs_res->ok()) {
                Log::warning('HubSpot submission failed', [
                    'status' => $hs_res->status(),
                    'body'   => $hs_res->body(),
                    'email'  => $subscription->email,
                ]);
            }
        }
        catch (\Throwable $e) {
            Log::error('HubSpot submission exception', [
                'error' => $e->getMessage(),
                'email' => $subscription->email,
            ]);
        }

        $mail_data = [
            'email' => $request->email
        ];

        send_email(new SubscriptionMail($mail_data, 'user'), $request->email);
        send_email(new SubscriptionMail($mail_data, 'admin'), config('app.admin_emails'));

        return redirect()->back()->with('success', 'Successfully subscribed');
    }
}