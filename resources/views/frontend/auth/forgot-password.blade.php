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
            <h2>{!! $translation['heading'] !!}</h2>
            <div class="feature-section">
                <ul class="feature-list">
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['qualified_coaches'] }}</span></li>
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['on_demand_learning'] }}</span></li>
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['social_network'] }}</span></li>
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['global_certification'] }}</span></li>
                </ul>
            </div>
        </div>

        <!-- White Section -->
        <div class="col-lg-5 offset-lg-1 white-section">
            <h1>{{ $translation['forgot_password'] }}</h1>
            <p class="subtitle">{{ $translation['subtitle'] }}</p>
            <form>
                <div class="form-group">
                    <label for="email">{{ $translation['email_label'] }}</label>
                    <input type="email" class="form-control" id="email" placeholder="{{ $translation['email_placeholder'] }}">
                </div>
                <div class="captcha-container my-4">
                    <div class="validate-captcha">{{ $translation['validate_captcha'] }}</div>
                    <div class="captcha-equation">
                        <span>10</span>
                        <span>+</span>
                        <span>6</span>
                        <span>=</span>
                        <span>?</span>
                    </div>
                    <button class="verify-button" type="button">{{ $translation['verify_button'] }}</button>
                </div>
                <button type="submit" class="btn btn-primary btn-block">{{ $translation['send_reset_link'] }}</button>
            </form>
        </div>
    </div>
</div>

@endsection