@extends('frontend.layouts.app')

@section('title', 'Ask Questions')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ask-questions.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">

                    <x-frontend.notification></x-frontend.notification>

                    <div class="header-section">
                        <h1>Ask the Expert</h1>
                        <a href="{{ route('frontend.ask-questions.histories') }}">
                            <img src="{{ asset('storage/frontend/history-clock-icon.svg') }}" class="icon-history" alt="History Icon" width="22" height="22">
                            View History & Replies
                        </a>
                    </div>
                    <form action="{{ route('frontend.ask-questions.store') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Please mention the subject" required>
                        </div>

                        <div class="mb-5">
                            <label for="initial_message" class="form-label">Initial Message</label>
                            <textarea class="form-control textarea" rows="5" name="initial_message" id="initial_message" placeholder="Write any comments related to your subject" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection