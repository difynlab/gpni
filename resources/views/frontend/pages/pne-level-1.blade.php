@extends('frontend.layouts.app')

@section('title', 'PNE Level 1 + SNS')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/pne-level-1.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    <section class="header-section">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7 col-md-12">
                <section class="certification-section">
                    <h1 class="title">PNE Level-1 + SNS Double Certification</h1>
                    <div class="certificates-container d-flex flex-wrap justify-content-center">
                        <img src="/storage/frontend/certificate 1.png" alt="Certificate 1" class="img-fluid">
                        <div class="d-flex flex-column align-items-center">
                            <img src="/storage/frontend/certificate 2.png" alt="Certificate 2" class="img-fluid">
                            <div class="rating pt-4">
                                <span>5.0</span>
                                <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars">
                                <span>(9)</span>
                            </div>
                        </div>
                    </div>

                    <p class="description">
                        To apply for the PNE L2 Masters + CISSN course, you must meet at least one of the following
                        eligibility criteria:
                        holding a degree in exercise or sports science, being a registered Dietician or Nutritionist or
                        similar qualifications,
                        having at least five years of previous experience in fitness and nutrition, and/or having
                        previously been certified by GPNi
                        with PNE Level-1 + SNS Sports Nutrition Specialist (SNS) within the past two years.
                    </p>
                </section>
            </div>
            <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
                <div class="form-wrapper">
                    <div class="form-heading">Sign up Today To Get Your Free Trial!</div>
                    <div class="form-subheading">
                        For limited time ONLY! GPNi® is offering a FREE trial to everyone who signs up using the below
                        form.
                    </div>
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Country/Region" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enroll Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="course-details container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Delivery of Mode</div>
                    <div class="value">Online</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Course Type</div>
                    <div class="value">Certificate</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Course Duration</div>
                    <div class="value">70+ Hours</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Course Language</div>
                    <div class="value">English, Chinese, Japanese</div>
                </div>
            </div>
        </div>
    </section>

    <section class="plans-payment position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0 d-flex align-items-center justify-content-center">
                    <div class="image-section">
                        <img src="/storage/frontend/girl.svg" alt="Certificate">
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="text-section">
                        <h1>Upgrade Your Life in Fitness & Sports Nutrition</h1>
                        <p>Get Started Now & Enroll – Easy Choices of 1, 2 or 3</p>
                        <label class="plan plan-highlight">
                            <input type="radio" name="plan" value="type-one">
                            <div class="check-container">
                                <img src="/storage/frontend/check-square-contained-filled.svg" alt="Check">
                            </div>
                            <div>
                                <div class="plan-title">Type One</div>
                                <div class="plan-description">
                                    Pay Only USD 99.00 Monthly For 12 Months & Start Today.
                                </div>
                            </div>
                        </label>
                        <label class="plan plan-normal">
                            <input type="radio" name="plan" value="type-two">
                            <div class="check-container">
                                <img src="/storage/frontend/check-square-contained-filled-2.svg" alt="Check">
                            </div>
                            <div>
                                <div class="plan-title">Type Two</div>
                                <div class="plan-description">
                                    Pay in One Time Go & Pay Only USD 1,099.00, Savings of Over USD 600.00, together
                                    with USD 928.00
                                    In Additional Free Bonuses.
                                </div>
                            </div>
                        </label>
                        <label class="plan plan-normal">
                            <input type="radio" name="plan" value="type-three">
                            <div class="check-container">
                                <img src="/storage/frontend/check-square-contained-filled-3.svg" alt="Check">
                            </div>
                            <div>
                                <div class="plan-title">Type Three</div>
                                <div class="plan-description">
                                    Get in Contact with Our Team to Ask Questions and/or Schedule One-On-One-Call to
                                    Walk Through
                                    Thing The Demo Ask Questions On Teams Video Call.
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid certification-section">
        <h1 class="text-center mb-4">Why Get Certified By The GPNi®</h1>

        <div class="row gy-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/ph-steps-duotone.svg" alt="Steps Icon">
                    <p>GPNi® is an-all access portal, to begin and advance your in sports nutrition to an elite level
                        with blossoming career opportunities.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/material-symbols-light-partner-exchange-outline-rounded.svg" alt="Partner Icon">
                    <p>GPNi® is the official global online partner for The International Society of Sports Nutrition,
                        The ISSN®. The ISSN® is the leading pioneer's and researcher's in Performance Nutrition
                        globally, since 2003.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/clarity-language-solid.svg" alt="Language Icon">
                    <p>GPNi® is the world’s first science backed performance nutrition online education portal to be
                        offered in multiple countries and available in multiple languages.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/mdi-school-online.svg" alt="School Icon">
                    <p>GPNi has a unique blend of on-demand content, live tutorials, and classroom-style online
                        solutions to give the most authentic and quality education solution.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/raphael-people.svg" alt="People Icon">
                    <p>Plug into the world’s network of fellow fitness professionals and business owners for career and
                        learning opportunities like no other certification offers. Upgrade your knowledge & global
                        network like no other certification can.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/fluent-people-chat-24-filled.svg" alt="Chat Icon">
                    <p>Exclusive access to the world’s most famous and leading sports nutrition researchers and experts
                        through the GPNi “Access to Experts” LIVE tutorials.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="video-section">
                    <div class="video-container">
                        <video controls>
                            <source src="/storage/frontend/psn1 video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="nutrition-section container-fluid p-5">
        <div class="row content-wrapper">
            <div class="col-12 col-md-6 text-content">
                <h1>Become A Certified Sports Nutritionist (CISSN) today.</h1>
                <p>See Why The ISSN-CISSN Is The Most Recognized & Highest Level Certification. The GPNi Offers Now This
                    Exclusive Course & International </p>
                <p>Certification Online Now!</p>
            </div>
            <div class="col-12 col-md-6 testimonial-content">
                <div class="testimonial-stars">
                    <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars" class="img-fluid">
                </div>
                <div class="testimonial-text">“The CISSN Level-2 Masters ISSN certification and course by the GPNi is
                    for those that want to position themselves at
                    the top level in sports and professional athlete nutrition. Boost your knowledge, qualification, and
                    career”.
                </div>
                <div class="testimonial-author">
                    <div class="name">Arlene Semeco</div>
                    <div class="role">RD-World Class Swimmer/CISSN</div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="title">The Diverse and Experienced Team at GPNi</h1>
                    <p class="description">Get to know the diverse and highly experienced professionals who make up the
                        team at Global Performance Nutrition Institute (GPNi). Our team includes leading sports
                        nutrition experts, successful business owners, and accomplished individuals in the fields of
                        nutrition and fitness, who bring a wealth of knowledge and dedication to their roles.</p>
                </div>
                <div class="col-6 col-md-3 profile-card">
                    <img src="/storage/frontend/drew.png" alt="Drew Campbell">
                    <div class="name">Drew Campbell</div>
                </div>
                <div class="col-6 col-md-3 profile-card">
                    <img src="/storage/frontend/jose.png" alt="Dr. Jose Antonio">
                    <div class="name">Dr. Jose Antonio</div>
                </div>
                <div class="col-6 col-md-3 profile-card">
                    <img src="/storage/frontend/reid.png" alt="Dr. Reid Reale">
                    <div class="name">Dr. Reid Reale</div>
                </div>
                <div class="col-6 col-md-3 profile-card">
                    <img src="/storage/frontend/roger.png" alt="Dr. Roger Adams">
                    <div class="name">Dr. Roger Adams</div>
                </div>
            </div>
        </div>
    </section>

    <section class="enrollment-section container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <h1 class="program-title">Enroll Now To The Master's Program</h1>
                    <p class="program-description">PNE Level-2 Masters + ISSN-CISSN. Combination of online on-demand
                        learning together with “live” tutorials in a classroom online together with Ph.D. academic
                        lectures.</p>
                    <div class="d-flex flex-wrap">
                        <a href="#" class="btn-custom btn-enroll">Enroll Now</a>
                        <a href="#" class="btn-custom btn-contact">Contact us <img src="/storage/frontend/arrow-indication-10.svg"
                                alt="Arrow" class="ms-2"></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center">
                    <img src="/storage/frontend/1653789192-png-1.svg" alt="Program Image" class="program-image">
                </div>
            </div>
        </div>
    </section>

    <div class="tab-container container-fluid">
        <nav class="nav content-header d-flex justify-content-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#introduction" data-bs-toggle="tab">Introduction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#course-content" data-bs-toggle="tab">Course Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chapters" data-bs-toggle="tab">Chapters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#review" data-bs-toggle="tab">Review</a>
                </li>
            </ul>
        </nav>

        <div class="tab-content mt-3 px-5">
            <div class="tab-pane fade show active" id="introduction">
                <div class="content-box">
                    <div class="content-title">
                        This course includes 15 modules and the available chapters are listed below:
                    </div>
                    <div class="content-description">
                        Enrollment Gives You Immediate Access To:
                        <ul>
                            <li>On-demand video content – 25+ hours</li>
                            <li>Live-streaming class – 10+ hours.</li>
                            <li>Homework & presentations – 15+ hours.</li>
                            <li>Reading & review – approximately – 15-25hours</li>
                            <li>Exam – 1.5hours.</li>
                            <li>Live online tutorials + Q&A with expert lectures</li>
                            <li>Group assignments + new connections with students based globally</li>
                        </ul>
                    </div>
                    <div class="info-note warning">
                        <img src="/storage/frontend/bi-exclamation-circle.svg" alt="Note Icon">
                        <div class="text-warning">
                            Please Note: Only Available For Those That Have Paid 100% Of Their Tuition Fees
                        </div>
                    </div>
                    <div class="info-note primary">
                        <img src="/storage/frontend/bi-exclamation-circle-2.svg" alt="Note Icon">
                        <div class="text-primary">
                            Additional free bonuses, including a one-year GPNi membership worth USD$99
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="course-content">
                <div class="content-box">
                    <div class="content-description">
                        Live online tutorials + Q&A with expert lectures. <br>
                        Group assignments + new connections with
                        students based globally.
                        <br><br>“It’s Who You Know, Not Just What You Know”
                        <br><br>On-demand video content – 40+ hours.<br>
                        Live-streaming with experts in Ph.D. lecture classes – 20+ hours.<br>
                        Homework & presentations – 25+ hours.<br>
                        Reading & review – approximately – 25-45 hours.<br>
                        Exam – 2 hours.<br>
                        Additional Free Bonuses
                        <br><br>One-year free GPNi membership - worth USD$99 a year<br>
                        Bonus Free Content & Courses
                        <br><br>PNE Level-1 + SNS online course content<br>
                        GPNi-TV with ISSN seminars and video content
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="chapters">
                <div class="modules-content">
                    <div class="modules-title">
                        This course includes 15 modules and the available chapters are listed below:
                    </div>
                    <div class="module-item">Module 1: Course Introduction & Nutrition Fundamentals</div>
                    <div class="module-item">Module 2: Skeletal Muscle Support Systems</div>
                    <div class="module-item">Module 3: Energy Expenditure and Balance</div>
                    <div class="module-item">Module 4: Nutrition & Performance, Dietary Trends</div>
                    <div class="module-item">Module 5: Dietary Supplements & Ergogenic Aids</div>
                    <div class="module-item">Module 6: Exercise, Hydration & Nutrition Considerations</div>
                    <div class="module-item">Module 7: Sports Nutrition Applications</div>
                    <div class="module-item">Module 8: Exam Review & Assignment Discussion</div>
                    <!-- Add more modules here if needed -->
                </div>
            </div>

            <div class="tab-pane fade" id="review">
                <section class="testimonial-section">
                    <div class="testimonial-header">
                        <img src="/storage/frontend/expert-image.svg" alt="Lenka Sutra">
                        <div>
                            <div class="testimonial-name">Lenka Sutra</div>
                            <div class="testimonial-stars">
                                <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars">
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        I was looking for the perfect course that combined theoretical knowledge and practical
                        experience in
                        sports nutrition for many years.
                        <br><br>
                        After much research, I chose The ISSN Sports Nutrition Specialist (SNS) on the GPNi® portal. I
                        was
                        greatly impressed with the new knowledge
                        I gained also the course flow with the blend of on-demand content together with “live” online
                        Zoom
                        tutorials and class group.
                        <br><br>
                        For those in the fitness industry, I highly recommended getting ISSN certified on the GPNi®
                        portal
                        and upgrading your knowledge and career at the same time.
                    </div>
                </section>
            </div>
        </div>


    </div>

    <section class="requirements-section container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 image-container">
                <img src="/storage/frontend/div.col-lg-6.svg" alt="Person Image" class="img-fluid person">
            </div>
            <div class="col-lg-6">
                <h2 class="requirements-title">Requirements</h2>
                <div class="requirements-list">
                    There are many thousands of certified SNS® and CISSN® professionals in the world today, these
                    consist of:
                    <ul>
                        <li>Fitness Professional & Personal Trainers</li>
                        <li>Nurses & Doctors</li>
                        <li>Health Coaches</li>
                        <li>Group Fitness Instructors</li>
                        <li>Registered Dietitians</li>
                        <li>Fitness Lovers</li>
                        <li>Parents</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="cissn-section container">
        <div class="row align-items-start">
            <div class="col-lg-6">
                <h2 class="cissn-title">The #1 Recognized Certified Sports Nutritionist (CISSN) Certification</h2>
                <p class="cissn-description pb-4">
                    Advanced level for those wanting to take their career to the highest level. Become accredited and
                    globally recognized to be a Certified Sports Nutritionist (CISSN) through the GPNi and ISSN.
                    <br><br>
                    Taught by experts, created by experts, and founded by experts in sports and performance nutrition.
                    No other course certification globally offers this level of authenticity and quality found in the
                    GPNi and the ISSN double certifications.
                    <br><br>
                    <span class="cissn-price">Price: USD 3,199.00 USD 2,999.00*</span>
                </p>
                <a href="#" class="cissn-btn">View CEC Policy</a>
            </div>
            <div class="col-lg-6">
                <img src="/storage/frontend/pne-level-2-masters-cissn-1.svg" alt="CISSN Certification" class="img-fluid mb-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="cissn-collapse-title">Ornare laoreet mi tempus neque</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="cissn-collapse-content">Timperdiet gravida scelerisque odio nunc. Eget felis,
                                    odio bibendum quis eget sit lorem donec diam. Volutpat sed orci turpis sit dolor est
                                    a pretium eget. Vitae turpis orci vel tellus cursus lorem vestibulum quis eu. Ut
                                    commodo, eget lorem venenatis urna.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="cissn-collapse-title">Rhoncus nullam aliquam nam proin</span>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="cissn-collapse-content">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="cissn-collapse-title">Rhoncus nullam aliquam nam proin</span>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="cissn-collapse-content">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gpni-section container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="video-section">
                    <video controls class="img-fluid mb-4 full-width-video">
                        <source src="/storage/frontend/who gpni.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="gpni-title">Who Is The GPNi®</h2>
                <p class="gpni-description pb-4">
                    "Your Nutrition Key"
                    <br><br>
                    The Global Performance Nutrition Institute (GPNi®). The GPNi® was founded in 2018 and is the
                    official
                    partner of The <a href="https://www.sportsnutritionsociety.org/" target="_blank"
                        style="color: #505050;">
                        International Society of Sports Nutrition
                    </a>(ISSN®).
                    <br><br>
                    <b>Insurance & Professional Membership</b>
                    <br><br>
                    Now Available: Full sports nutrition professional liability and professional membership in selected
                    countries.
                    <br><br>
                    Available with our partners, the <a href="https://www.sportsnutritionsociety.org/" target="_blank"
                        style="color: #505050;">International Institute for Complementary Therapies (IICT)</a>

                </p>
                <a href="#" class="gpni-btn">View CEC Policy</a>
            </div>
        </div>
    </section>

    <section class="advisory-board-section container">
        <h2 class="advisory-board-title">The International Society Of Sports Nutrition <br>Advisory Board</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-8-1.svg" alt="Erica Stump">
                    <div class="ms-3">
                        <div class="advisory-board-name">Erica Stump</div>
                        <div class="advisory-board-role">Legal Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-6.svg" alt="Sue Graves">
                    <div class="ms-3">
                        <div class="advisory-board-name">Sue Graves</div>
                        <div class="advisory-board-role">Scientific Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-10.svg" alt="Rick Collins">
                    <div class="ms-3">
                        <div class="advisory-board-name">Rick Collins</div>
                        <div class="advisory-board-role">Legal Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-9.svg" alt="David Sandler">
                    <div class="ms-3">
                        <div class="advisory-board-name">David Sandler</div>
                        <div class="advisory-board-role">Performance Training Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-7.svg" alt="Robert Wildman">
                    <div class="ms-3">
                        <div class="advisory-board-name">Robert Wildman</div>
                        <div class="advisory-board-role">Scientific Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-1.svg" alt="Jeffrey Stout">
                    <div class="ms-3">
                        <div class="advisory-board-name">Jeffrey Stout</div>
                        <div class="advisory-board-role">Scientific Advisor and Past President 2006-2008</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-2.svg" alt="Susan Kleiner">
                    <div class="ms-3">
                        <div class="advisory-board-name">Susan Kleiner</div>
                        <div class="advisory-board-role">Scientific Advisor and Co-Founder</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-3.svg" alt="Roger Harris">
                    <div class="ms-3">
                        <div class="advisory-board-name">Roger Harris</div>
                        <div class="advisory-board-role">Scientific Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-5.svg" alt="Jaime Tartar">
                    <div class="ms-3">
                        <div class="advisory-board-name">Jaime Tartar</div>
                        <div class="advisory-board-role">Sports Neuroscience Advisor</div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="view-more-link">
            View More
            <img src="/storage/frontend/arrow-indication-10.svg" alt="Arrow Icon">
        </a>
    </section>

    <section class="payment-options-section container">
        <h2 class="payment-options-title">Flexible Payment Options for Your PNE Level-2 Masters + CISSN Certification
            Course</h2>
        <p class="payment-options-description">
            CISSN Certification Course At GPNi, we understand that investing in education can be a big decision,
            which is why we offer flexible payment options to make our PNE Level-2 Masters + CISSN program more
            accessible.
            With our various payment plans, you can choose the option that best fits your budget and start your journey
            towards becoming a certified expert in sports nutrition.
            Explore our payment plans and take advantage of our additional free bonuses to maximize your savings and
            enhance your learning experience.
        </p>
        <div class="table-container">
            <table class="payment-table">
                <thead>
                    <tr>
                        <th class="highlight-primary">PNE 2</th>
                        <th class="highlight-secondary">Pay One Time</th>
                        <th class="highlight-primary">Instalment (Plan for 12 months)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Payment Amount</td>
                        <td>USD 1,699.00 <span style="color: red;">USD 1,099.00</span></td>
                        <td>USD 99.00 Per Month</td>
                    </tr>
                    <tr>
                        <td>Number Of Payments</td>
                        <td>1</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Hard copy materials and international logistics</td>
                        <td>Free</td>
                        <td>USD 229.00</td>
                    </tr>
                    <tr>
                        <td>GPNi TV 4 X ISSN Webinars</td>
                        <td>Free</td>
                        <td>USD 699.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <a href="#" class="btn-enroll">Enroll Now</a>
            <a href="#" class="btn-contact border-0">Contact us <img src="/storage/frontend/arrow-indication-10.svg"
                    alt="Arrow Icon"></a>
        </div>
    </section>

    <section class="student-testimonial-section container">
        <div class="student-testimonial-content">
            <div class="student-testimonial-text">
                <div class="student-testimonial-header">
                    <img src="/storage/frontend/line-42.svg" alt="Line">
                    <div class="header-text">What our students say</div>
                </div>
                <div class="student-testimonial-quote">“I was looking for the perfect course that combined theoretical
                    knowledge and practical experience in sports nutrition for many years.</div>
                <div class="student-testimonial-author">Lenka Sutra</div>
                <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars">
            </div>
            <div>
                <img src="/storage/frontend/group-1171276142.svg" alt="Student Photo" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="student-reviews-section container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="student-review-card p-3">
                    <h5 class="student-review-name">Bindi Wilson</h5>
                    <p class="student-review-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <div class="student-review-footer">
                        <div class="student-review-rating">
                            <span>Rated 5/5 stars</span>
                            <img src="/storage/frontend/frame-1171275930.svg" alt="Star">
                        </div>
                        <div>
                            <p class="student-review-verified">Verified Student</p>
                            <p class="student-review-batch"> <img src="/storage/frontend/check blue.svg" alt="check" width="10px"
                                    height="10px">
                                2022 Batch</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="student-review-card p-3">
                    <h5 class="student-review-name">Anne Marry</h5>
                    <p class="student-review-text">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.
                    </p>
                    <div class="student-review-footer">
                        <div class="student-review-rating">
                            <span>Rated 5/5 stars</span>
                            <img src="/storage/frontend/frame-1171275930.svg" alt="Star">
                        </div>
                        <div>
                            <p class="student-review-verified">Verified Student</p>
                            <p class="student-review-batch"> <img src="/storage/frontend/check blue.svg" alt="check" width="10px"
                                    height="10px">
                                2022 Batch</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="student-review-card p-3">
                    <h5 class="student-review-name">Byron Rolfson</h5>
                    <p class="student-review-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <div class="student-review-footer">
                        <div class="student-review-rating">
                            <span>Rated 5/5 stars</span>
                            <img src="/storage/frontend/frame-1171275930.svg" alt="Star">
                        </div>
                        <div>
                            <p class="student-review-verified">Verified Student</p>
                            <p class="student-review-batch"> <img src="/storage/frontend/check blue.svg" alt="check" width="10px"
                                    height="10px">
                                2022 Batch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="advanced-certification-section container-fluid">
        <h2 class="advanced-certification-title">Why Are the ISSN International Certification Courses By the GPNi
            Superior To Other Sports Nutrition Certifications Globally?</h2>
        <div class="row mx-5">
            <div class="col-lg-6">
                <img src="/storage/frontend/1672650802-removebg-preview-1.svg" alt="Certification Image"
                    class="advanced-certification-image img-fluid">
            </div>
            <div class="col-lg-6">
                <p class="advanced-certification-text">
                    A question often asked is why both the PNE-L1 + ISSN-SNS, also the PNE-L2 Masters + ISSN-CISSN
                    (Certified Sports Nutritionist) certification course by the GPNi is superior compared to other
                    sports nutrition certifications in the world, such as:<br>
                    NASM-CSNC (Certified Sports Nutrition Coach)<br>
                    Precision Nutrition PN Level-2 Masters (Master Health Coach)<br>
                    ISSA – Nutritionist Certification<br>
                    ACE – Fitness Nutrition Specialist<br>
                    Clean Health Institute – Performance Nutrition Coach<br>
                    Sports Nutrition Association – Certified in Applied Sports Nutrition<br><br>
                    There are many reasons why the the GPNi international certifications course is superior to all
                    others. Please review below these five key points that make this certification superior to other
                    sports nutrition certifications in the world:
                </p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row mx-5">
            <div class="col-lg-6">
                <div class="accordion" id="accordionExample1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Ornare laoreet mi tempus neque
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                Timperdiet gravida scelerisque odio nunc. Eget felis, odio bibendum quis eget sit lorem
                                donec diam. Volutpat sed orci turpis sit dolor est a pretium eget. Vitae turpis orci vel
                                tellus cursus lorem vestibulum quis eu. Ut commodo, eget lorem venenatis urna.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Rhoncus nullam aliquam nam proin
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                Lore ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion" id="accordionExample2">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Example Title
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                Example content for this section. Some additional content goes here.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Additional Title
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                Additional content for this section.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="contact-us-btn">
            Contact us
            <img src="/storage/frontend/arrow-indication-13.svg" alt="Arrow Icon">
        </a>
    </section>

    <section class="masters-pack-section">
        <div class="masters-pack-overlay"></div>
        <div class="masters-pack-content">
            <h2 class="masters-pack-title">GPNi Masters Pack</h2>
            <p class="masters-pack-subtitle">Includes both the PNE L1 + ISSN-SNS and PNE L2 Masters + ISSN-CISSN</p>
            <p class="masters-pack-description">The “GPNi Masters Pack” is the elite level and a way to jump-start your
                career to the masters level in sports nutrition for those not eligible, or not ready to go directly into
                PNE L2 Masters + CISSN program.</p>
            <div class="btn-group">
                <a href="#" class="btn-custom">Enroll Now</a>
                <a href="#" class="btn-custom secondary border-0">
                    Contact us
                    <img src="/storage/frontend/right-white-arrow.svg" alt="Arrow Icon">
                </a>
            </div>
        </div>
    </section>

    </div>

@endsection