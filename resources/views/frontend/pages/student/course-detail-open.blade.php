@extends('frontend.layouts.app')

@section('title', 'Course Details')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/course-detail-open.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    
    <div class="d-flex flex-column flex-md-row dashboard-container">
        <div class="d-flex flex-column flex-md-row">
            <nav class="sidebar">
                <div class="profile-card">
                    <div class="profile-container">
                        <img src="/storage/frontend/ellipse-2.svg" class="profile-img" alt="Profile Image">
                        <div class="edit-icon">
                            <img src="/storage/frontend/akar-icons-edit.svg" alt="Edit">
                        </div>
                    </div>
                    <h2>Tim Stevens</h2>
                    <p>
                        <img src="/storage/frontend/dashicons-location.svg" class="location-icon" alt="Location" width="24"
                            height="24">
                        China
                    </p>
                </div>
                <a href="./studentProfile.html" class="sidebar-item">
                    <img src="/storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    Student Profile
                </a>
                <a href="./courseListView.html" class="sidebar-item">
                    <img src="/storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    Courses
                </a>
                <a href="./qualification.html" class="sidebar-item">
                    <img src="/storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    Qualifications
                </a>
                <a href="./studyMaterialMain.html" class="sidebar-item d-flex">
                    <img src="/storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    Study Tools
                    <img src="/storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24" class="ml-auto">
                </a>
                <a href="./studyMaterialPaymentPortal.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Buy Study Material
                </a>
                <a href="./members.Corner.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Members Corner
                </a>

                <a href="./askTheExpert.html" class="sidebar-item">
                    <img src="/storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    Ask the Experts
                </a>
                <a href="./referFriend.html" class="sidebar-item">
                    <img src="/storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    Referral Points
                </a>
            </nav>
        </div>

        <div class="col-md-9 main-content">
            <div class="course-details-container">
                <div class="course-title">Science of Building A Successful PT Business (On-Demand Webinar)</div>

                <div class="section-title">Description</div>
                <div class="section-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum.
                </div>
                <div class="section-title">Content Includes</div>
                <div class="section-content">
                    <ul>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Sed do eiusmod tempor incididunt ut labore et dolore</li>
                    </ul>
                </div>

                <div class="section-title">Additional Information</div>
                <div class="section-content">
                    sed do eiusmod tempor incididunt ut labore et dolore
                    Ut enim ad minim veniam
                    quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo
                </div>

                <div class="section-title">Guides</div>
                <button class="accordion-button">
                    Course Book <img src="/storage/frontend/ep-arrow-down-bold.svg" alt="Arrow Down" width="24" height="24">
                </button>
                <div class="accordion-content">
                    No data found
                </div>
                <button class="accordion-button">
                    Course Video <img src="/storage/frontend/ep-arrow-down-bold-2.svg" alt="Arrow Down" width="24" height="24">
                </button>
                <div class="accordion-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                </div>

                <div class="section-title">Additional Resources</div>
                <button class="accordion-button">
                    Additional Video Media <img src="/storage/frontend/ep-arrow-down-bold-3.svg" alt="Arrow Down" width="24"
                        height="24">
                </button>
                <div class="accordion-content">
                    No data found
                </div>
                <button class="accordion-button">
                    Presentation Media <img src="/storage/frontend/ep-arrow-down-bold-4.svg" alt="Arrow Down" width="24"
                        height="24">
                </button>
                <div class="accordion-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                </div>
                <button class="accordion-button">
                    Downloadable Resources <img src="/storage/frontend/ep-arrow-down-bold-5.svg" alt="Arrow Down" width="24"
                        height="24">
                </button>
                <div class="accordion-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                </div>
            </div>
        </div>
    </div>

        
    </div>

@endsection