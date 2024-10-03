@extends('frontend.layouts.app')

@section('title', 'Student Dashboard')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-dashboard.css') }}">
@endpush

@section('content')

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 sidebar">
                <div class="sidebar-item">
                    <img src="/storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    <span>Student Profile</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    <span>Courses</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    <span>Qualifications</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    <span>Study Tools</span>
                    <img src="/storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24">
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    <span>Buy Study Material</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    <span>Members Corner</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    <span>Ask the Experts</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    <span>Referral Points</span>
                </div>
            </div>
            <div class="col-12 col-md-9 main-content">
                <div class="profile-card mb-4">
                    <div class="profile-card-details">
                        <div class="date">January 18 2024</div>
                        <h1>Welcome Back, Tim Stevens!</h1>
                        <div class="location">
                            <img src="/storage/frontend/dashicons-location.svg" alt="Location icon" width="24" height="24"
                                class="mr-2">
                            China
                        </div>
                    </div>
                    <img src="/storage/frontend/image-16.svg" alt="Profile image" width="171" height="148">
                </div>
                <div class="card-section">
                    <a href="studentProfile.html" class="card">
                        <h2>Student Profile</h2>
                        <p>View or edit student profile details</p>
                    </a>
                    <a href="changepassword.html" class="card">
                        <h2>Change Password</h2>
                        <p>View or edit student profile details</p>
                    </a>
                    <div class="card">
                        <h2>Courses</h2>
                        <p>Access your course related details</p>
                    </div>
                    <div class="card">
                        <h2>Billing Centre</h2>
                        <p>Checkout billing related info</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection