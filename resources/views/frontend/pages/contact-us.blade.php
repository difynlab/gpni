@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/contact-us.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <main class="container py-5">

            <x-frontend.notification></x-frontend.notification>

            <div class="header-title text-center heading mb-3">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</div>

            <div class="description sub-heading">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</div>

            <div class="form-container">
                <form action="{{ route('frontend.contact-us.store') }}" method="POST">
                    @csrf
                    <div class="form-row fs-20">
                        <div class="form-group col-md-6">
                            <label for="first-name" class="required">{{ $contents->{'first_name_' . $middleware_language} ?? $contents->first_name_en }}</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="last-name" class="required">{{ $contents->{'last_name_' . $middleware_language} ?? $contents->last_name_en }}</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>

                    <div class="form-row fs-20">
                        <div class="form-group col-md-6">
                            <label for="email" class="required">{{ $contents->{'email_' . $middleware_language} ?? $contents->email_en }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone" class="required">{{ $contents->{'phone_' . $middleware_language} ?? $contents->phone_en }}</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            <x-frontend.input-error field="phone"></x-frontend.input-error>
                        </div>
                    </div>

                    <div class="form-row fs-20">
                        <div class="form-group col-12 reason-group">
                            <label for="question" class="required">{{ $contents->{'question_' . $middleware_language} ?? $contents->question_en }}</label>
                            <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}" required>
                            <x-frontend.input-error field="question"></x-frontend.input-error>
                        </div>
                    </div>

                    <div class="form-row fs-20">
                        <div class="form-group col-12 mt-3">
                            <label for="comments" class="required">{{ $contents->{'comments_' . $middleware_language} ?? $contents->comments_en }}</label>
                            <textarea class="form-control" id="comments" rows="4" name="comments" value="{{ old('first_name') }}" required>{{ old('comments') }}</textarea>
                            <x-frontend.input-error field="comments"></x-frontend.input-error>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-submit">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                </form>
            </div>

            <div class="contact-info">
                <div class="contact-info-row">
                    <div class="info-item">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/email.svg') }}" alt="Email Icon">
                        </div>
                        <div class="info-item-content">
                            <div class="title">{{ $contents->{'contact_email_' . $middleware_language} ?? $contents->contact_email_en }}: {{ $settings->{'email_' . $middleware_language} ?? $settings->email_en }}</div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/phone.svg') }}" alt="Phone Icon">
                        </div>
                        <div class="info-item-content">
                            <div class="title">{{ $contents->{'contact_whatsapp_' . $middleware_language} ?? $contents->contact_whatsapp_en }}: {{ $settings->{'whatsapp_' . $middleware_language} ?? $settings->whatsapp_en }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif

@endsection