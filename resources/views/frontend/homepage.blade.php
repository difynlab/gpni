@extends('frontend.layouts.app')

@section('title', 'Homepage')

@section('content')

    <!-- Header -->
    <div class="container-xxl pt-5 hero-header">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start text-content-header">
                    <h1 class="display-3 text-black">Learn from Experts<br />Master in Nutrition Education</h1>
                    <p class="text-black mb-4 mt-5">
                        Get certified and globally recognized by <b>the official partner of The
                            <a class="international-society-of-sport" href="https://www.sportsnutritionsociety.org/"
                                target="_blank">
                                <span class="official-partner-of-the">
                                    <span class="international-society-of">International Society of Sports Nutrition
                                        (ISSN)</span>
                                </span>
                            </a>
                        </b>
                    </p>
                    <div class="pt-5">
                        <a href="" class="get-started-button btn btn-primary py-sm-3 px-sm-5 me-3">Get Started</a>
                        <a href="" class="py-sm-3 px-sm-5 fw-semi-bold">Learn More
                            <img src="img/arrow-right.svg" /> </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden image-header">
                    <object type="image/svg+xml" data="{{ asset('storage/frontend/header.svg') }}">Your browser does not support
                        SVG</object>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Container -->
    <div class="container-xxl">
    <div class="container"> <!-- Use container for full width on all breakpoints -->
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-3 mb-md-5 video-heading">GPNi&#174; Provides You 360° Nutrition <br />
                Education Access for a healthier you!</h1>
        </div>
        <div class="row g-4">
            <div class="col-12"> <!-- Ensure full width on all devices -->
                <div class="video-container position-relative">
                    <div class="embed-responsive embed-responsive-16by9"> <!-- Make iframe responsive -->
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/wIpOfvzkYN0?autoplay=1&mute=1" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="overlay-text position-absolute p-3"> <!-- Adjust padding responsively -->
                        <ul class="list-unstyled">
                            <li>On demand Learning</li>
                            <li>Live Streaming</li>
                            <li>Group Study</li>
                            <li>Social Network</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Video Container End -->

<!-- Place this outside the main container for full-page width access -->
<!-- Follow Us Button -->
<button class="btn btn-primary follow-us-btn">Follow us on</button>

<!-- Professional Education Container Start-->
<div class="py-5">
    <div class="container pt-4 mt-4">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-3 video-heading">As a gateway to Professional Education</h1>
            <p class="mb-1 professional-body">GPNi&#174; is the official exclusive global platform and partner for The
                <br />
                International Society Of Sports Nutrition (ISSN) courses.
            </p>
        </div>
        <div class="tab-class pt-5 text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <div class="tab-text mt-n1 mb-0">
                            All
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-md-tart text-center mx-3 pb-3" data-bs-toggle="pill"
                        href="#tab-2">
                        <div class="tab-text mt-n1 mb-0">
                            International Certificates
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <div class="tab-text mt-n1 mb-0">
                            Master Classes
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <!-- Tab 1 Content -->
                        <div class="tab-content" id="tab1Content">
                            <div class="scrollable-container">
                                <!-- Repeat for each card -->
                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="{{ asset('storage/frontend/image 5.png') }}" alt="Logo" width="100%">
                                    </div>
                                    <img src="{{ asset('storage/frontend/marathon.png') }}" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">Endurance &
                                            <br />
                                            Marathon<br />
                                            Nutrition
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/sports-nutriton.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">Sports Nutrition
                                            <br />
                                            Fundamental
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 1.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level 1
                                            <br />
                                            Modules 1 & 3
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 2.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level 2
                                            <br />
                                            Modules 4 & 7
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/yoga.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE
                                            Level<br />
                                            Exam & Live <br />
                                            Classes
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 2 Masters.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level
                                            2<br />
                                            Masters + CISSN
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <!-- Tab 1 Content -->
                        <div class="tab-content" id="tab1Content">
                            <div class="scrollable-container">
                                <!-- Repeat for each card -->
                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/marathon.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">Endurance &
                                            <br />
                                            Marathon<br />
                                            Nutrition
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/sports-nutriton.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">Sports
                                            Nutrition
                                            <br />
                                            Fundamental
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 1.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level 1
                                            <br />
                                            Modules 1 & 3
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 2.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level 2
                                            <br />
                                            Modules 4 & 7
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/yoga.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE
                                            Level<br />
                                            Exam & Live <br />
                                            Classes
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 2 Masters.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level
                                            2<br />
                                            Masters + CISSN
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <!-- Tab 1 Content -->
                        <div class="tab-content" id="tab1Content">
                            <div class="scrollable-container">
                                <!-- Repeat for each card -->
                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/marathon.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">Endurance &
                                            <br />
                                            Marathon<br />
                                            Nutrition
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/sports-nutriton.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">Sports
                                            Nutrition
                                            <br />
                                            Fundamental
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 1.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level 1
                                            <br />
                                            Modules 1 & 3
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 2.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level 2
                                            <br />
                                            Modules 4 & 7
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/yoga.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE
                                            Level<br />
                                            Exam & Live <br />
                                            Classes
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="overlay-logo p-3">
                                        <img src="img/image 5.png" alt="Logo" width="100%">
                                    </div>
                                    <img src="img/PNE Level 2 Masters.png" alt="Menu Item" class="card-img-top">
                                    <div class="card-body ps-4">
                                        <h5 class="card-title d-flex justify-content-start text-start">PNE Level
                                            2<br />
                                            Masters + CISSN
                                        </h5>
                                        <div
                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                            <div class="apply-now-text">APPLY NOW</div>
                                            <img src="img/right-chevron-arrow.svg" alt="right-chevron-arrow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 pt-5 explore-course-text">
            <a href="" class="py-sm-4 px-sm-5 fw-medium">Explore Courses
                <img src="img/arrow-right.svg" /> </a>
        </div>
    </div>
</div>
<!-- Professional Education Container End-->


<!-- Partners Container Start -->
<div class="partners-container">
    <div class="container">
        <div class="text-center" data-wow-delay="0.1s">
            <div class="mb-3 mb-md-5 partners-heading mt-5 pt-5">
                Global Expert Talks At
                <br />
                Seminars & Partner Facilities
            </div>
            <p class="mb-1 partners-body">
                Our expert team travels to join many key global expos, fitness education shows <br />
                throughout the world. An integral part of all major fitness and nutrition expos such as:
            </p>
        </div>
        <div class="row py-5">
            <div class="row px-5 pb-5 gx-1 custom-row-gap">
                <!-- Image 1 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/asia-fitness-conference.png" alt="asia" class="event-image img-fluid">
                </div>
                <!-- Image 2 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/arnold-classic.png" alt="arnold-classic" class="event-image img-fluid">
                </div>
                <!-- Image 3 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/gym.png" alt="gym" class="event-image img-fluid">
                </div>
                <!-- Image 4 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/supply-side-east.png" alt="supply-side-east" class="event-image img-fluid">
                </div>
            </div>
            <div class="row g-2 px-5 custom-row-gap pb-5">
                <!-- Image 1 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/natural-expo.png" alt="natural-expo" class="event-image img-fluid">
                </div>
                <!-- Image 2 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/olympia.png" alt="olympia" class="event-image img-fluid">
                </div>
                <!-- Image 3 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/Idea.png" alt="Idea" class="event-image img-fluid">
                </div>
                <!-- Image 4 -->
                <div class="col-md-3 col-6 d-flex justify-content-center align-items-center h-100">
                    <img src="img/fibo.png" alt="Fibo" class="event-image img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partners Container End -->


<!-- Journey Container Start -->
<div class="journey-container">
    <div class="container" style="padding-top: 100px; padding-bottom:100px;">
        <div class=" text-center" data-wow-delay="0.1s">
            <div class="mb-3 journey-heading h1">
                Start your journey today
            </div>
            <p class="mb-4 journey-body">
                Choose from lessons and find your perfect fit
            </p>
        </div>
        <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap">
            <a href="#" class="btn btn-secondary signup-button mb-2 mb-md-0 me-md-3 py-3 px-5">Sign Up</a>
            <a href="#" class="btn explore-lesson py-3 px-4">Explore Lessons
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                    <path
                        d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z" />
                </svg>
            </a>
        </div>
    </div>
</div>
<!-- Journey Container Container End -->

<!-- Expert Container Start -->
<div class="expert-container">
    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="text-center" data-wow-delay="0.1s">
            <div class="mb-3 expert-heading h1">
                Who makes up our Panel of Experts?
            </div>
            <p class="mb-4 expert-body">
                Meet the minds shaping your learning experience
            </p>
        </div>

        <div class="row text-center g-4 pt-4 d-flex justify-content-center">
            <div class="col-6 col-md-2">
                <img src="img/expert1.png" class="img-fluid rounded-circle expert-select" alt="Expert 1"
                    data-bs-toggle="modal" data-bs-target="#expertModal1">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert2.png" class="img-fluid rounded-circle expert-select" alt="Expert 2"
                    data-bs-toggle="modal" data-bs-target="#expertModal2">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert3.png" class="img-fluid rounded-circle expert-select" alt="Expert 3"
                    data-bs-toggle="modal" data-bs-target="#expertModal3">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert4.png" class="img-fluid rounded-circle expert-select" alt="Expert 4"
                    data-bs-toggle="modal" data-bs-target="#expertModal4">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert5.png" class="img-fluid rounded-circle expert-select" alt="Expert 5"
                    data-bs-toggle="modal" data-bs-target="#expertModal5">
            </div>
        </div>
        <!-- Second Row -->
        <div class="row text-center g-4 mt-4 d-flex justify-content-center">
            <div class="col-6  col-md-2">
                <img src="img/expert6.png" class="img-fluid rounded-circle expert-select" alt="Expert 6"
                    data-bs-toggle="modal" data-bs-target="#expertModal6">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert7.png" class="img-fluid rounded-circle expert-select" alt="Expert 7"
                    data-bs-toggle="modal" data-bs-target="#expertModal7">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert8.png" class="img-fluid rounded-circle expert-select" alt="Expert 8"
                    data-bs-toggle="modal" data-bs-target="#expertModal8">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert9.png" class="img-fluid rounded-circle expert-select" alt="Expert 9"
                    data-bs-toggle="modal" data-bs-target="#expertModal9">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert10.png" class="img-fluid rounded-circle expert-select" alt="Expert 10"
                    data-bs-toggle="modal" data-bs-target="#expertModal10">
            </div>
        </div>
        <!-- Third Row -->
        <div class="row text-center g-4 mt-4 d-flex justify-content-center">
            <div class="col-6  col-md-2">
                <img src="img/expert11.png" class="img-fluid rounded-circle expert-select" alt="Expert 11"
                    data-bs-toggle="modal" data-bs-target="#expertModal11">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert12.png" class="img-fluid rounded-circle expert-select" alt="Expert 12"
                    data-bs-toggle="modal" data-bs-target="#expertModal12">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert13.png" class="img-fluid rounded-circle expert-select" alt="Expert 13"
                    data-bs-toggle="modal" data-bs-target="#expertModal13">
            </div>
            <div class="col-6  col-md-2">
                <img src="img/expert14.png" class="img-fluid rounded-circle expert-select" alt="Expert 14"
                    data-bs-toggle="modal" data-bs-target="#expertModal14">
            </div>
        </div>
        <div class="text-center mt-5 pt-5 explore-course-text">
            <a href="" class="py-sm-4 px-sm-5 fw-medium">Learn More
                <img src="img/arrow-right.svg" /> </a>
        </div>
    </div>
</div>

<!-- Expert 1 -->
<div class="modal fade" id="expertModal1" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert1.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">Tony Attridge</div>
                            <div class="qualification">
                                BHMS(Ed)(Hons) MPSORT&EXPSYCH eMBA Dip Fitness Dip Business JP(Qual)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Tony Attridge is passionate about the fitness industry and does his part to ensure there are
                        well-educated professionals out there by owning his own registered training organization,
                        The College of Health and Fitness, and lecturing at major universities in Australia.
                    </p>
                    <p class="spacing-for-line">
                        He has a unique skill set: he is a qualified exercise physiologist, sports psychologist,
                        CISSN nutritionist, Level 3 Elite strength and conditioning coach, and Level 2 altitude
                        training coach, ISAK qualified and is also a qualified teacher.
                    </p>
                    <p class="spacing-for-line">
                        This combination of skills enables him to apply specific training principles and get into
                        the heads of his clients to elicit their absolute best.
                    </p>
                    <p class="spacing-for-line">
                        He has co-authored Fitness Trainer Essentials for the Personal Trainer, which is now in its
                        4th edition.
                    </p>
                    <p class="spacing-for-line">
                        Tony has trained athletes at every Olympic Games since 1992, as well as at Commonwealth
                        Games, and has trained many other elite athletes, and fitness and bodybuilding competitors.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Expert 2 -->
<div class="modal fade" id="expertModal2" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert2.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">Peng Xie</div>
                            <div class="qualification">
                                CISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Peng Xie is a ISSN Sports Nutrition lecturer, Certified Sports Nutritionist(CISSN) and he's also
                        known as
                    </p>
                    <p class="spacing-for-line">
                        Dietitian of Chinese National team for 2024 Paris Olympic Games (rowing, canoeing, wrestling,
                        women's volleyball),
                    </p>
                    <p class="spacing-for-line">
                        Dietitian for the Chinese National team for 2020 Tokyo Olympic Games (rowing, canoeing),
                    </p>
                    <p class="spacing-for-line">
                        Director of Beijing Bodybuilding Association,
                    </p>
                    <p class="spacing-for-line">
                        National first-class judge, Beijing Weightlifting Association,
                    </p>
                    <p class="spacing-for-line">
                        National first-class judge, Acsm-Casm Chinese CPT trainer,
                    </p>
                    <p class="spacing-for-line">
                        Nutrition lecturer of 2021 Elite Youth Training Class for Coaches of Chinese Football
                        Association
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Expert 3 -->
<div class="modal fade" id="expertModal3" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel3"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert3.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Steven Shen</div>
                            <div class="qualification">
                                CISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Steven Shen is an ISSN Sports Nutrition lecturer. He is also a Certified Sports
                        Nutritionist(CISSN), Founder of Amazing Body,
                    </p>
                    <p class="spacing-for-line">
                        Director of Beijing Bodybuilding Association
                    </p>
                    <p class="spacing-for-line">
                        Trainer of China Physical Education Training Center
                    </p>
                    <p class="spacing-for-line">
                        Ali Sports nutrition tasting officer
                    </p>
                    <p class="spacing-for-line">
                        Sina Sports Supplement Research Institute keynote speaker
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Expert 4 -->
<div class="modal fade" id="expertModal4" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel4"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert4.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Cassie Evans</div>
                            <div class="qualification">
                                MS RD CISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Cassie Evans is a registered dietitian and a published researcher.
                    </p>
                    <p class="spacing-for-line">
                        She studied sports nutrition and completed an internship with the
                        University of Miami's Sports Nutrition team and Nova Southeastern
                        University's sports performance team.
                    </p>
                    <p class="spacing-for-line">
                        She holds a bachelor of science in Exercise and Sports Science and
                        received her CISSN in 2018.
                    </p>
                    <p class="spacing-for-line">
                        She is currently pursuing her doctorate in Human and Sports
                        Performance from the Rocky Moutinan University of Health Professions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Expert 5 -->
<div class="modal fade" id="expertModal5" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel5"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert5.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Erin Brealey</div>
                            <div class="qualification">
                                CISSN, ISSN. APD. AccSD. AN.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Erin Brealey is an Accredited Practising Dietitian (APD) Accredited Sports Dietitian (AccSD) and
                        Qualified Personal Trainer.
                    </p>
                    <p class="spacing-for-line">
                        Prior to working as a nutrition professional, Erin worked as a personal trainer specializing in
                        strength training.
                    </p>
                    <p class="spacing-for-line">
                        Erin holds a Bachelor of Nutrition & Dietetics (Hons) from Queensland University of Technology
                        and a post-graduate qualification as a Sports Dietitian and is registered with Dietitians
                        Australia and Sports Dietitians Australia.
                    </p>
                    <p class="spacing-for-line">
                        Erin also obtained her CISSN as an additional post-graduate qualification to better provide her
                        athlete clients with a deeper level of sports nutrition advice.
                    </p>
                    <p class="spacing-for-line">
                        Erin currently runs her own dietetic private practice in Brisbane, Australia and travels to
                        regional Queensland to provide services to athletes in more rural and regional towns. Erin's
                        passion lies in working with adolescents and women in sport.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 6 -->
<div class="modal fade" id="expertModal6" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel6"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert6.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Trisha VanDusseldorp
                            </div>
                            <div class="qualification">
                                PhD, CISSN, CSCS
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Dr. Trisha VanDusseldorp is an Associate Professor of Exercise Science and B.S. Exercise Science
                        Program Director at Kennesaw State University (KSU).
                    </p>
                    <p class="spacing-for-line">
                        She currently serves as the ISSN President.
                    </p>
                    <p class="spacing-for-line">
                        Trisha earned her B.S. in Exercise Science from Southwest Minnesota State, M.S. in Human
                        Performance – Applied Sport Science from the University of Wisconsin- La Crosse, and Ph.D. in
                        Exercise Physiology from the University of New Mexico.
                    </p>
                    <p class="spacing-for-line">
                        Dr. Trisha is also the current ISSN President, from 2021-2023.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 7 -->

<div class="modal fade" id="expertModal7" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel7"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert7.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Tokiko Shinjo
                            </div>
                            <div class="qualification">
                                PhD, RD
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Dr. Tokiko Shinjo is a registered dietitian,
                    </p>
                    <p class="spacing-for-line">
                        She is also a Japan Sports Association certified sports nutritionist,
                    </p>
                    <p class="spacing-for-line">
                        Ph.D. (Sports and Health Science), Collaborative Researcher at Juntendo University, Department
                        of Sport and Health Science
                    </p>
                    <p class="spacing-for-line">
                        Nutrition Advisor for Yokohama F. Marinos (J League)
                    </p>
                    <p class="spacing-for-line">
                        Lecturer, Tokyo Health Science College While focusing on dietary support for athletes and
                        education of sports nutrition
                    </p>
                    <p class="spacing-for-line">
                        She publishes topics on food and health to a wide range of age groups such as children and
                        parents.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 8 -->

<div class="modal fade" id="expertModal8" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel8"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert8.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Erica Stump
                            </div>
                            <div class="qualification">
                                RD
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Ms. Stump practices primarily in the area of compliance and defense of matters under the
                        statutes enforced by the United States Food and Drug Administration and the Federal Trade
                        Commission for dietary supplement companies.
                    </p>
                    <p class="spacing-for-line">
                        She also focuses on intellectual property matters, including trademark, trade dress, trade
                        secret, and copyright litigation and trademark prosecution.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 9 -->

<div class="modal fade" id="expertModal9" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel9"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert9.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Izumi Suzuki
                            </div>
                            <div class="qualification">
                                PhD, RD
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Dr. Izumi Suzuki is a registered dietitian.
                    </p>
                    <p class="spacing-for-line">
                        Japan Sports Association certified sports nutritionist. Ph.D. (Sports and Health Sciences).
                    </p>
                    <p class="spacing-for-line">
                        Nutrition advisor for J League Hokkaido Consadole Sapporo (top team).
                    </p>
                    <p class="spacing-for-line">
                        As a part-time staff at the Tochigi Sports Medical Science Center, she is in charge of a wide
                        range of medical science support from juniors to top athletes.
                    </p>
                    <p class="spacing-for-line">
                        The main research field is performance nutrition in professional soccer players.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 10 -->

<div class="modal fade" id="expertModal10" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel10"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert10.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Rick Collins
                            </div>
                            <div class="qualification">
                                JD, FISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Rick Collins, Esq., FISSN is a popular personality in the body building, health, fitness and
                        nutrition communities.
                    </p>
                    <p class="spacing-for-line">
                        A successful lawyer, author, lecturer and magazine columnist.
                    </p>
                    <p class="spacing-for-line">
                        He is a partner in the law firm of Collins, McDonald & Gann, PC, in Mineola, New York.
                    </p>
                    <p class="spacing-for-line">
                        He was formerly a criminal prosecutor, personal trainer and film actor. </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Expert 11 -->

<div class="modal fade" id="expertModal11" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel11"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert11.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Vince Kreipke

                            </div>
                            <div class="qualification">
                                Ph.D, CISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Dr. Kreipke (“Dr. Vince”) received his Ph.D. in Exercise Physiology with a focus in Sports
                        Nutrition in 2016 from Florida State University.
                    </p>
                    <p class="spacing-for-line">
                        During this time, his research focused on the efficacy of dietary interventions, such as
                        nutritional supplementation and protein intake, and exercise on body composition, metabolism,
                        and human performance.
                    </p>
                    <p class="spacing-for-line">
                        More recently, Dr. K has expanded his research to include the role of various dietary
                        ingredients to enhance other aspects of daily living, such as cognitive performance and general
                        health.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 12 -->

<div class="modal fade" id="expertModal12" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel12"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert12.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Roger Adams
                            </div>
                            <div class="qualification">
                                Ph.D. in Nutrition, CISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        In December of 2004, Dr. Roger Adams life-long goal was obtaining a Ph.D. in Nutrition.
                    </p>
                    <p class="spacing-for-line">
                        He a member, as well as certified by the International Society of Sports Nutrition (ISSN) with
                        the highest certification available by ISSN, CISSN certification, also known as the Sports
                        Nutritionist.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expert 13 -->

<div class="modal fade" id="expertModal13" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel13"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert13.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Robert Wildman
                            </div>
                            <div class="qualification">
                                PhD, RD, LD, FISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Dr. Robert Wildman served as Chief Science Officer for Post Active Nutrition which includes
                        Dymatize, PowerBar, Premier Protein, and Supreme Protein for almost 10years.


                    </p>
                    <p class="spacing-for-line">
                        He is a Fellow of the ISSN and holds a PhD in Exercise, Nutrition, and Preventive Health from
                        Baylor University.
                    </p>
                    <p class="spacing-for-line">
                        Rob is now the Founder & CEO of TYM Performance Nutrition, a high-quality, science-backed sports
                        nutrition brand for athletes.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Expert 14 -->

<div class="modal fade" id="expertModal14" tabindex="-1" role="dialog" aria-labelledby="expertModalLabel14"
    aria-hidden="true">
    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3 col-4">
                        <img class="expert-image-15 rounded-circle" alt="" src="img/expert14.png" />
                    </div>
                    <div class="col-md-8 col-12 d-flex align-items-center">
                        <div>
                            <div class="expert-name">
                                Dr. Jose Antonio

                            </div>
                            <div class="qualification">
                                PhD, FNSCA, FISSN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-4 text-right">
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>

                <div class="mt-4 expert-content">
                    <p class="spacing-for-line">
                        Dr. Antonio is a chief executive officer and co-founder of the International Society of Sports
                        Nutrition, an academic nonprofit dedicated to the science and application of sports nutrition
                        and supplementation.
                    </p>
                    <p class="spacing-for-line">
                        In addition, he is the co-founder and vice president of the Society for Neuro sports, an
                        academic nonprofit with a focus on sports neuroscience.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Expert Container Container End -->

<!-- Sports nutritionist Form Start-->
<div class="nutritionist-container">
    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="text-center" data-wow-delay="0.1s">
            <div class="mb-3 mb-md-5 nutritionist-heading">Looking for the right sports nutritionist?
            </div>
            <b class="mb-1 nutritionist-body">
                Find a qualified sports nutritionist who is right for you. GPNi has thousands of
                freelance <br />
                nutritionist & dietitians with a broad range of specializations and interests
            </b> <!-- Fixed closing tag -->
        </div>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center ">
                    <div class="w-50">
                        <!-- Search Bar -->
                        <div class="custom-search-bar">
                            <div class="input-group mb-3 mt-5 d-flex justify-content-center align-items-center">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="ps-3 bi bi-search"></i></span>
                                <input type="text" class="form-control form-control-lg p-3"
                                    placeholder="Search by name or certification number" aria-label="Search"
                                    aria-describedby="basic-addon1">
                                <div class="p-2 d-flex align-items-center">
                                    <button class="btn btn-primary btn-lg search-button m-2" type="button">Search
                                        Now</button>
                                    <!-- Use btn-lg for larger button on all screens -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-5" data-wow-delay="0.1s">
            <div class="mb-3 mb-md-5 list-heading">View list of Nutritionists</div>
            <div class="d-flex justify-content-center flex-wrap">
                <button type="button" class="btn btn-outline-secondary nutrionist-button mx-2 my-1">SNS</button>
                <button type="button" class="btn btn-outline-secondary nutrionist-button mx-2 my-1">SNC</button>
                <button type="button" class="btn btn-outline-secondary nutrionist-button mx-2 my-1">Certified
                    Nutritionists</button>
                <button type="button" class="btn btn-outline-secondary nutrionist-button mx-2 my-1">CISSN</button>
            </div>
        </div>
    </div>
</div>




<!-- FAQ Container Start -->
<div class="faq-container">
    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="text-center" data-wow-delay="0.1s">
            <div class="mb-3 faq-heading h1">
                Frequently asked Questions
            </div>
            <p class="mb-4 faq-body">
                Discover the impact of our programs through the Success Stories from our previous<br />
                students and witness the quality of our education
            </p>
        </div>
        <div class="my-3">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button p-2 p-md-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is included in certification course enrollment? </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Enrollment Gives You Immediate Access To:<br /><br />
                            <p>GPNi Student Center with total on-demand 20+ hours of video tutorial
                                classes<br />
                                Digital online course study book<br />
                                Microsoft Teams exclusive class group for chats and "live" classes<br />
                                Presentation assessment and grading for PNE Level-I certification<br />
                                Online exam for the ISSN-SNS certification.<br />
                                Access to global sports nutrition experts to ask questions.</p>
                            <br />
                            <p>Additional Free Bonuses</p><br />
                            <p>One-year free GPNi membership - worth USD$99 a year (GPNi Members Corner)
                            </p><br />
                            <p>GPNi Membership Includes:</p><br />
                            <p>Exclusive Access to GPNi online "Members Corner".<br />
                                Online sports nutrition tools<br />
                                GPNi-TV sports nutrition conferences of the world (ISSN + Sports
                                Dietician) with
                                over
                                50<br />
                                hours of content free.<br />
                                Exclusive Members WhatsApp group<br />
                                Exclusive Facebook Private Members Group<br />
                                2.5 CEC upon yearly renewal<br />
                                Once a month ability to GPNi "Ask an Expert" a private question.</p>
                            <br /><br /><br />
                            <p>Course Materials / Clothing / Merchandise (Optional Extra)</p>
                            <br /><br />
                            <p>Full course book<br />
                                2 x study guides<br />
                                I x GPNi T-shirt<br />
                                2 x GPNi steal pens<br /><br /><br /><br />
                                (PLEASE NOTE: Materials + Logistics Additional Fee =
                                USD$149)</p>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed p-2 p-md-3" type=" button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What Will I Gain with The GPNi & ISSN Qualifications?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            All GPNi courses and the ISSN are the only authentic certification and
                            authority in
                            performance
                            & sports nutrition today. Get your qualifications from the original or
                            authentic
                            source.<br /><br />

                            As nutrition is becoming viewed as the most crucial aspect in all fitness
                            and
                            professional sports, you will upgrade yourself to serve others to the
                            highest
                            level.<br /><br />

                            One of the most important attributes you will gain that no other online
                            certification
                            can
                            offer
                            or remotely does offer is; plugging into the GPNi and ISSN global network.
                            Study with a
                            "live"
                            group class with a "real classroom" experience with our exclusive online
                            video & chat
                            groups.<br /><br />

                            Gain experience, knowledge, and most importantly, CONFIDENCE to be a Sports
                            Nutritionist
                            with
                            the GPNi unique 360-degree education solution.<br /><br />

                            Connect, learn, grow friends, and network with peers worldwide. Learn from
                            and meet the
                            elite-level experts in the world "live" online and in person offline. In
                            your career, it
                            is
                            often as important, if not more important, to who you know, not just want
                            you to know
                            —with
                            GPNi, learn and grow your connections globally!<br /><br />
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed p-2 p-md-3" type=" button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What continued education points do I need to maintain my GPNi certification?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            To maintain your PNE Level-I + SNS or PNE Level-2 Masters + CISSN
                            international
                            certification and be considered "active" on the GPNi website, you need to
                            accumulate
                            IO Continued Education Credits (CECs) Every Two Years. A complete list of
                            all the CEC
                            requirements and what specific activities you can do to achieve these
                            credits are listed
                            in the GPNi CEC Policy Section Here.
                            <br /> <br />
                            For those who do not complete the required CEC points every two years, your
                            account
                            will remain open. However, your student Public Profile on the GPNi site will
                            be
                            displayed
                            as "Inactive."
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed p-2 p-md-3" p-2 p-md-3" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                            aria-controls="collapseFour">
                            What Is The Relationship Between GPNi&#174; & ISSN?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            The Global Performance Nutrition Institute, GPNi&#174; was founded in 2018
                            and is the
                            official
                            partner for The International Society of Sports Nutrition, ISSN. In the Asia
                            Pacific
                            region,
                            GPNi&#174; is the exclusive online, as well as offline partner for the ISSN.
                            <br /><br />
                            The ISSN since 2003 has led the world in cutting-edge research, experts,
                            papers, and
                            conference in sports nutrition. With its "self-study" online exam it has
                            also led the
                            world
                            in the most recognized global certifications in performance nutrition, the
                            Sports
                            Nutrition Specialist (SNS) and Certified Sports Nutritionist (CISSN) ISSN
                            has also led
                            the
                            way.
                            <br /><br />
                            The GPNi&#174; has worked closely as partners with the ISSN since 2018 and
                            in 2020
                            launched the first-ever online exclusive courses for the globally recognized
                            certifications. For the first time, ever students of the world are now able
                            to do a
                            dedicated course to help pass the official ISSN exams exclusively on the
                            GPNi&#174;
                            portal
                            www.thegpni.com
                            Beyond just passing the ISSN official online exams, the GPNi&#174; also
                            offers an
                            additional
                            exclusive certification called the Performance Nutrition Expert (PNE). The
                            PNE Level-I
                            connected to the SNS certification, and PNE Level-2 connected to the CISSN
                            program.
                            These add-on certifications also exclusively through the GPNi&#174;
                            additional equip
                            students in the practical knowledge of understanding sports nutrition. The
                            PNE
                            certifications are graded on a case study and diet creation works to ensure
                            students
                            understand and can use the new knowledge adequately in everyday life.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed p-2 p-md-3" type=" button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What Is the difference between the GPNi&#174; courses & certifications &
                            others
                            offered online?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            The GPNi&#174; is unlike any other certifications and course programs
                            currently
                            available
                            globally. Firstly GPNi&#174; is the only truly global certification in
                            sports nutrition.
                            Others
                            may
                            claim to be "international" though are only offered in the English language
                            and often
                            only reside within one country or region.<br /><br />

                            The GPNi&#174; courses and certifications are now offered in:<br /><br />

                            1. English<br /><br />
                            2. Chinese<br /><br />
                            3. Japanese<br /><br />
                            4. Many other languages launching soon<br /><br />

                            The GPNi&#174; also has exclusive region partners to help localize the
                            content also work
                            with local regulations within each region now in:<br /><br />

                            l. United States<br /><br />
                            2. Australia & New Zealand (ANZ)<br /><br />
                            3. China Mainland<br /><br />
                            4. Hong Kong<br /><br />
                            5. Taiwan<br /><br />
                            6. Japan<br /><br />
                            7. Singapore<br /><br />
                            8. United Kingdom<br /><br />
                            9. More Region Partners Launching Soon In 2022<br /><br />

                            The GPNi&#174; certifications have all been created using the most
                            cutting-edge sports
                            nutrition scientific studies. The authors of all the courses are all
                            international
                            experts,
                            and Ph.D. level globally recognized lectures. You will not find a program or
                            course of
                            its
                            kind similar or in-depth to what the GPNi&#174; offers.<br /><br />

                            Whilst some certifications may label themselves as "sports nutrition", most
                            of the time
                            they are simply general nutrition courses with a few small details about
                            amino acids
                            thrown in. All the GPNi&#174; courses cover the foundational understanding
                            and
                            fundamentals of nutrition, but at the same time goes very deep on all
                            aspects of
                            athletics and the latest research-backed sports nutrition and diet
                            strategies that other
                            courses do not even surface-level begin to examine.<br /><br />

                            Many online courses offer on-demand content with a "cookie-cutter" approach
                            to
                            education. For those simply looking for a "piece of paper" as a
                            certification, other
                            programs may be easier and suit your needs better. The GPNi&#174; approach
                            to education
                            is a 3600 with true "classroom" like feel with our exclusive chat classroom
                            groups and
                            "live" classes. Learn from others with our global classroom and also get
                            your "Access
                            to Experts", only through the GPNi&#174;.<br /><br />

                            The GPNi&#174; courses and ISSN certifications are the fastest-growing
                            internationally
                            recognized online education now in the world. Grow your career, network
                            globally, and
                            upgrade yourself to be amongst the top in the game in the performance
                            nutrition
                            space.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- FAQ Container Container End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos
                    labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos
                    labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos
                    labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos
                    labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

@endsection