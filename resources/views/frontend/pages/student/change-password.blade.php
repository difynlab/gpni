@extends('frontend.layouts.app')

@section('title', 'Change Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}">
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
            <div class="change-password-container">
                <div class="text-centered">
                    <h1 style="font-weight: 500; font-size: 31px; line-height: 46.5px; color: #0e0e0e;">Change Password
                    </h1>
                    <p style="font-weight: 400; font-size: 20px; line-height: 30px; color: #505050;">To change password,
                        please fill in the fields below</p>
                </div>
                <div class="password-rules-container">
                    <h5>Password should be and must contain:</h5>
                    <div class="password-rules-list">
                        <div class="password-rule-item">
                            <span class="rule-title">8+</span>
                            <span class="rule-desc">Characters</span>
                        </div>
                        <div class="password-rule-item">
                            <span class="rule-title">AA</span>
                            <span class="rule-desc">Uppercase</span>
                        </div>
                        <div class="password-rule-item">
                            <span class="rule-title">aa</span>
                            <span class="rule-desc">Lowercase</span>
                        </div>
                        <div class="password-rule-item">
                            <span class="rule-title">123</span>
                            <span class="rule-desc">Numbers</span>
                        </div>
                        <div class="password-rule-item">
                            <span class="rule-title">@#$</span>
                            <span class="rule-desc">Symbols</span>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="newPassword" style="font-weight: 500; font-size: 16px; color: #505050;">New
                            Password</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="********">
                        <img src="/storage/frontend/carbon-view-off.svg" alt="Toggle View" class="form-password-icon">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" style="font-weight: 500; font-size: 16px; color: #505050;">Confirm
                            Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="********">
                        <img src="/storage/frontend/carbon-view-off-2.svg" alt="Toggle View" class="form-password-icon">
                    </div>
                    <div class="change-password-button">
                        <button type="submit" class="btn btn-change-password">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    </div>

@endsection