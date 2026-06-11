@extends('frontend.layouts.app')

@section('title', 'Complete Your Profile')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')

    <div class="container custom-container mb-4 my-0">
        <div class="row flex-grow-1 d-flex align-items-center">

            <x-frontend.auth></x-frontend.auth>

            <div class="col-lg-8 white-section d-flex justify-content-center">
                <div class="form-container">
                    <x-frontend.notification></x-frontend.notification>

                    <h1 class="fs-39 text-center">{{ $contents->{'complete_profile_page_title_' . $middleware_language} ?? $contents->complete_profile_page_title_en }}</h1>

                    <p class="subheading fs-16 text-center">{{ $contents->{'complete_profile_page_sub_title_' . $middleware_language} ?? $contents->complete_profile_page_sub_title_en }}</p>

                    <form method="POST" action="{{ route('frontend.complete-profile.store') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="country"
                                class="form-label">{{ $contents->{'register_page_country_' . $middleware_language} ?? $contents->register_page_country_en }}</label>
                            <select class="form-control country-select" id="country" name="country" required>
                                <option value="">
                                    {{ $contents->{'register_page_country_select_' . $middleware_language} ?? $contents->register_page_country_select_en }}
                                </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>
                                        {{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn submit-button">{{ $contents->{'complete_profile_page_button_' . $middleware_language} ?? $contents->complete_profile_page_button_en }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
