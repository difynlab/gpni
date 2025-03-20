@extends('frontend.layouts.app')

@section('title', 'Qualifications')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/qualifications.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="container-main">
                    <div class="header-section">
                        <h1>{{ $student_dashboard_contents->qualifications_title }}</h1>
                    </div>

                    <form action="{{ route('frontend.qualifications') }}" method="GET">
                        <div class="search-bar">
                            <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" alt="Search Icon" width="18" height="18">
                            <input type="text" name="qualification" placeholder="{{ $student_dashboard_contents->qualifications_search }}" value="{{ $qualification ?? '' }}">
                        </div>
                    </form>

                    <div class="certificate-list">
                        @if(count($obtained_certificates) > 0)
                            @foreach($obtained_certificates as $obtained_certificate)
                                @foreach($obtained_certificate['certificates'] as $single_certificate)
                                    <div class="certificate-card">
                                        <div class="certificate-header">
                                            <div class="title">{{ $obtained_certificate['course_title'] }}</div>

                                            <a href="{{ asset('storage/backend/courses/course-certificates/' . $single_certificate->file) }}" class="download-button" download>{{ $student_dashboard_contents->qualifications_download }}<i class="bi bi-download"></i></a>
                                        </div>

                                        <p class="certificate-issued">{{ $student_dashboard_contents->qualifications_issued }}: <span>{{ $single_certificate->date }} | {{ $single_certificate->time }}</span></p>
                                    </div>
                                @endforeach
                            @endforeach
                        @else
                            <p class="no-data">{{ $student_dashboard_contents->qualifications_no_certificates }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection