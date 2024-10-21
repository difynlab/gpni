<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    
    public function index()
    { 
        $language = session('language', 'en');

        $translations = [
            'en' => [
                'forgot_password' => 'Forgot Password',
                'subtitle' => 'Please provide your email address below to reset your password',
                'email_label' => 'Email Address',
                'send_reset_link' => 'Send Reset Link',
                'validate_captcha' => 'Validate Captcha',
                'verify_button' => 'Verify',
                'email_placeholder' => 'Your email address',
                'heading' => 'Gateway to 360°<br>Nutrition Education',
                'qualified_coaches' => 'Qualified Coaches',
                'on_demand_learning' => 'On-Demand Learning',
                'social_network' => 'Social Network',
                'global_certification' => 'Globally recognized certification'
            ],
            'zh' => [
                'forgot_password' => '忘记密码',
                'subtitle' => '请在下方提供您的电子邮件地址以重置密码',
                'email_label' => '电子邮件地址',
                'send_reset_link' => '发送重置链接',
                'validate_captcha' => '验证验证码',
                'verify_button' => '验证',
                'email_placeholder' => '您的电子邮件地址',
                'heading' => '通向360°<br>营养教育之门',
                'qualified_coaches' => '合格的教练',
                'on_demand_learning' => '按需学习',
                'social_network' => '社交网络',
                'global_certification' => '全球认可的认证'
            ],
            'ja' => [
                'forgot_password' => 'パスワードを忘れましたか',
                'subtitle' => 'パスワードをリセットするには、以下にメールアドレスを入力してください',
                'email_label' => 'メールアドレス',
                'send_reset_link' => 'リセットリンクを送信',
                'validate_captcha' => 'キャプチャを確認',
                'verify_button' => '確認',
                'email_placeholder' => 'メールアドレスを入力',
                'heading' => '360°<br>栄養教育のゲートウェイ',
                'qualified_coaches' => '資格を持ったコーチ',
                'on_demand_learning' => 'オンデマンド学習',
                'social_network' => 'ソーシャルネットワーク',
                'global_certification' => '国際的に認められた認証'
            ]
        ];

        // Get the translations for the selected language
        $translation = $translations[$language] ?? $translations['en'];

        return view('frontend.auth.forgot-password', [
            'language' => $language,
            'translation' => $translation
        ]);
    }

    public function create()
    {
        
    }

    public function store()
    {

    }
}
