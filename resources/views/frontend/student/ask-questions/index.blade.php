@extends('frontend.layouts.app')

@section('title', 'Ask Questions')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ask-questions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="container-main">

                    <x-frontend.notification></x-frontend.notification>

                    <div class="header-section">
                        <h1>{{ $student_dashboard_contents->ask_the_experts_title }}</h1>
                        <a href="{{ route('frontend.ask-questions.histories') }}">
                            <img src="{{ asset('storage/frontend/history-clock-icon.svg') }}" class="icon-history" alt="History Icon" width="22" height="22">
                            {{ $student_dashboard_contents->ask_the_experts_sub_title }}

                            @php
                                $user = auth()->user()->id;
                                $ask_question_ids = App\Models\AskQuestion::where('user_id', $user)->where('status', '1')->pluck('id')->toArray();

                                $new_replied_questions = App\Models\AskQuestionReply::where('status', '1')
                                    ->where('user_viewed', '0')
                                    ->whereIn('ask_question_id', $ask_question_ids)
                                    ->groupBy('ask_question_id')
                                    ->selectRaw('count(*) as count')
                                    ->get()
                                    ->count();

                                $total_count = $new_replied_questions;

                            @endphp

                            @if($total_count > 0)
                                <p class="count-badge">{{ $total_count }}</p>
                            @endif
                        </a>
                    </div>
                    <form action="{{ route('frontend.ask-questions.store') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="subject" class="form-label">{{ $student_dashboard_contents->ask_the_experts_subject }}</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="{{ $student_dashboard_contents->ask_the_experts_subject_placeholder }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="initial_message" class="form-label">{{ $student_dashboard_contents->ask_the_experts_initial_message }}</label>
                            <textarea class="form-control textarea" rows="5" name="initial_message" id="initial_message" placeholder="{{ $student_dashboard_contents->ask_the_experts_initial_message_placeholder }}" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit">{{ $student_dashboard_contents->ask_the_experts_button }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection