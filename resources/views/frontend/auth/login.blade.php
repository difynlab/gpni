@extends('frontend.layouts.app')

@section('title', $contents->{'login_page_name_' . $middleware_language} !== '' 
    ? $contents->{'login_page_name_' . $middleware_language} 
    : $contents->login_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')

    <div class="container custom-container mb-4 my-0">
        <div class="row flex-grow-1 d-flex align-items-center">

            <x-frontend.auth></x-frontend.auth>

            <div class="col-lg-8 white-section d-flex justify-content-center">
                <div class="form-container">
                    <x-frontend.notification></x-frontend.notification>

                    <h1 class="fs-39">{{ $contents->{'login_page_title_' . $middleware_language} ?? $contents->login_page_title_en }}</h1>

                    <div class="subheading fs-16">{{ $contents->{'login_page_sub_title_' . $middleware_language} ?? $contents->login_page_sub_title_en }}</div>

                    <!-- <div class="social-login-buttons">
                        <a href="{{ route('frontend.login.google') }}" class="btn-social">
                            <i class="bi bi-google"></i>
                            {{ $contents->{'login_page_google_' . $middleware_language} ?? $contents->login_page_google_en }}
                        </a>
                        <a href="{{ route('frontend.login.facebook') }}" class="btn-social">
                            <i class="bi bi-facebook"></i>
                            {{ $contents->{'login_page_facebook_' . $middleware_language} ?? $contents->login_page_facebook_en }}
                        </a>
                    </div> -->

                    <form method="POST" action="{{ route('frontend.login.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="fs-16 mb-1" style="font-size:16px; font-weight:500;">{{ $contents->{'login_page_username_' . $middleware_language} ?? $contents->login_page_username_en }}</label>
                            <input type="email" class="form-control fs-13" id="username" name="email" required>
                            <x-frontend.input-error field="login_failed"></x-frontend.input-error>
                        </div>

                        <div class="form-group position-relative">
                            <label for="password" class="fs-16 mb-1" style="font-size:16px; font-weight:500;">{{ $contents->{'login_page_password_' . $middleware_language} ?? $contents->login_page_password_en }}</label>
                            <input type="password" class="form-control pr-5 fs-13" id="password" name="password" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-frontend.input-error field="login_failed"></x-frontend.input-error>
                        </div>

                        <div class="remember-forget">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember-password">
                                <label class="form-check-label fs-13" for="remember-password" style="font-size:13px; font-weight:400;">{{ $contents->{'login_page_remember_password_' . $middleware_language} ?? $contents->login_page_remember_password_en }}</label>
                            </div>

                            <a href="{{ route('frontend.password.request') }}" class="text-primary" style="font-size:13px; font-weight:400;">{{ $contents->{'login_page_forgot_password_' . $middleware_language} ?? $contents->login_page_forgot_password_en }}</a>
                        </div>

                        <div class="form-input">
                            <x-frontend.captcha></x-frontend.captcha>
                        </div>

                        <div class="form-input text-center">
                            <div class="h-captcha" data-sitekey="{{ config('services.hcaptcha.sitekey') }}" data-callback="hcaptchaCallback"></div>
                        </div>

                        <input type="hidden" name="redirect" value="{{ request('redirect') }}">

                        <button type="submit" class="btn submit-button" disabled>{{ $contents->{'login_page_button_' . $middleware_language} ?? $contents->login_page_button_en }}</button>
                    </form>

                    <div class="text-center mt-3">
                        <span class="dont-have-account fs-13">{{ $contents->{'login_page_no_account_' . $middleware_language} ?? $contents->login_page_no_account_en }}</span>
                        <a href="{{ route('frontend.register') }}" class="register-now">{{ $contents->{'login_page_register_' . $middleware_language} ?? $contents->login_page_register_en }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>

    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");

            if ($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush