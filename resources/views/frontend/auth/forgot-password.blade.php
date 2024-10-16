@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}">
@endpush

@section('content')
    
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center min-vh-100">
            <!-- Blue Section -->
            <div class="col-lg-4 blue-section">
                <img src="/storage/frontend/gpni-removebg-pre.png" alt="GPNi Logo" class="logo">
                <h2>Gateway to 360°<br>Nutrition Education</h2>
                <div class="feature-section">
                    <ul class="feature-list">
                        <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>Qualified Coaches</span></li>
                        <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>On-Demand Learning</span></li>
                        <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>Social Network</span></li>
                        <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>Globally recognized certification</span></li>
                    </ul>
                </div>
                <div class="partners">
                    <div class="partners-inner">
                        <div class="partner-logo"><img src="/storage/frontend/SignIn1.png" alt="ISSN Logo"></div>
                        <div class="partner-logo"><img src="/storage/frontend/SignIn2.png" alt="IDEA Logo"></div>
                        <div class="partner-logo"><img src="/storage/frontend/SignIn3.png" alt="FIBO Logo"></div>
                        <div class="partner-logo"><img src="/storage/frontend/SignIn4.png" alt="Nike Sparq Training Logo"></div>
                        <!-- Repeat logos for continuous scroll effect -->
                        <div class="partner-logo"><img src="/storage/frontend/SignIn1.png" alt="ISSN Logo"></div>
                        <div class="partner-logo"><img src="/storage/frontend/SignIn2.png" alt="IDEA Logo"></div>
                        <div class="partner-logo"><img src="/storage/frontend/SignIn3.png" alt="FIBO Logo"></div>
                        <div class="partner-logo"><img src="/storage/frontend/SignIn4.png" alt="Nike Sparq Training Logo"></div>
                    </div>
                </div>
            </div>

            <!-- White Section -->
            <div class="col-lg-5 offset-lg-1 white-section">
                <h1>Forgot Password</h1>
                <p class="subtitle">Please provide your email address below to reset your password</p>
                <form>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your email address">
                    </div>
                    <div class="captcha-container my-4">
                        <div class="validate-captcha">Validate Captcha</div>
                        <div class="captcha-equation">
                            <span>10</span>
                            <span>+</span>
                            <span>6</span>
                            <span>=</span>
                            <span>?</span>
                        </div>
                        <button class="verify-button" type="button">Verify</button>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>

@endsection