@extends('frontend.layouts.app')

@section('title', 'GPNI TV')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gpni-tv.css') }}">
@endpush

@section('content')

    <div class="container my-5 py-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="rating me-2">Rating</span>
                    <img src="/storage/frontend/frame-1171275930.svg" alt="star-rating">
                </div>
                <h1 class="main-heading mb-4">Now Exclusively Available On GPNi-TV®</h1>
                <h2 class="section-heading mb-4">All ISSN® Webinars & Seminars On-Demand Viewing</h2>
                <p class="content-text mb-4">
                    It gives us great pleasure to announce that all ISSN® "live" webinars and offline
                    seminars will be now recorded and available on-demand on the GPNi® portal. With
                    on-demand viewing, you can watch anytime, anywhere, and in any time zone.
                </p>
                <p class="content-text mb-4">
                    Ask about the GPNi-TV® annual subscription option and see all of these below + all
                    new on-demand webinar and seminars for one year from purchase.
                </p>
                <h2 class="section-heading mb-4">All ISSN® Webinars & Seminars On-Demand Viewing</h2>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="check-icon" width="30" height="30">
                        <span class="list-item-text">The Science Of Building a Successful PT Busines (Webinar)</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="check-icon" width="30" height="30">
                        <span class="list-item-text">SSN Female Health & Performance Nutrition (Webinar)</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="check-icon" width="30" height="30">
                        <span class="list-item-text">ISSN Fight Science Camp (Seminar)</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="check-icon" width="30" height="30">
                        <span class="list-item-text">The ISSN Live Online Webinar: the Position Stands, February 12th,
                            2022.</span>
                    </li>
                </ul>
                <h2 class="coming-soon mb-4">Coming Soon For 2022</h2>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <img src="/storage/frontend/charm-circle-tick-5.svg" alt="check-icon" width="30" height="30">
                        <span class="list-item-text">ISSN 19th Annual Conference and Expo, Ft. Lauderdale FL, June
                            16-18, 2022 (Not To Be Missed)</span>
                    </li>
                </ul>
                <div href="#" class="btn btn-enroll mt-4">
                    Enroll Now
                    <img src="/storage/frontend/right-white-arrow.svg" alt="arrow-icon" width="10" height="12">
                </div>
            </div>
            <div class="col-lg-5 text-lg-end">
                <img src="/storage/frontend/gpni-tv-image-1.svg" alt="GPNi-TV" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="container-fluid summary-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="main-heading">Summary Of Speakers <br> From Recent Webinars & Seminars</h2>
                <p class="sub-heading pb-5">Global Elite Focusing On Key Subjects Per Webinar & Seminar</p>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-md-4 text-center">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/speaker 1 summary.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-8">
                    <img src="/storage/frontend/entypo-quote-4.svg" alt="quote-icon" class="quote-icon mb-3">
                    <div class="speaker-title">From The Science Of Building a Successful PT Business Webinar</div>
                    <div class="speaker-text">
                        Juan Carlos Santana MS CSCS FNSCA - What I've learned running the Institute of Human Performance
                        - BIO: Fitness maverick, founder of the Institute of Human Performance (IHP), dynamic speaker,
                        sought-after consultant, prolific author; for over 30 years Juan Carlos “JC”.
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="row align-items-center mb-5">
                <div class="col-md-4 text-center">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/speaker 2 summary.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-8">
                    <img src="/storage/frontend/entypo-quote-4.svg" alt="quote-icon" class="quote-icon mb-3">
                    <div class="speaker-title">From The ISSN Fight Science Camp</div>
                    <div class="speaker-text">
                        Corey Peacock Ph.D. FISSN CSCS - Research from the NSU Fight Science Lab. Bio: Dr. Peacock is an
                        Associate Professor of Exercise Science at Nova Southeastern University. His research focuses on
                        human performance and, in particular, his work with world-class fighters. Corey Peacock |
                        College of Health Care Sciences | NSU (nova.edu)!
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="row align-items-center mb-5">
                <div class="col-md-4 text-center">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/speaker 3 summary.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-8">
                    <img src="/storage/frontend/entypo-quote-4.svg" alt="quote-icon" class="quote-icon mb-3">
                    <div class="speaker-title">From The ISSN Fight Science Camp</div>
                    <div class="speaker-text">
                        Jackie Kaminski MS RDN/LDN - Acute Weight Loss Strategies for Fight Week. Bio: Ms. Kaminski is a
                        registered dietitian and sports nutritionist that works as the personal nutritionist for a
                        diverse group of professional fighters. Performance Nutrition | The Fight Nutritionist | Home
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="row align-items-center mb-5">
                <div class="col-md-4 text-center">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/speaker 4 summary.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-8">
                    <img src="/storage/frontend/entypo-quote-4.svg" alt="quote-icon" class="quote-icon mb-3">
                    <div class="speaker-title">From The Female Health & Performance Nutrition</div>
                    <div class="speaker-text">
                        Dr. VanDusseldorp PhD, CISSN, CSCS is an Assistant Professor of Exercise Science at Kennesaw
                        State University (KSU). She earned her BS in Exercise Science from Southwest Minnesota State; MS
                        in Human Performance – Applied Sport Science from the University of Wisconsin- LaCrosse; and
                        Ph.D. in Exercise Physiology from the University of New Mexico. Trisha’s primary research
                        focuses on supplementation and nutritional interventions in healthy and disease-state
                        populations.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid webinars-section">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="main-heading">Are These Webinars & Seminars For You?</h1>
                <p class="sub-heading">
                    If you are in the fitness business, a trainer, an MMA athlete or coach, a female caring about
                    health,<br />
                    a man caring about nutrition, then these Webinar's are for you. Helping you learn more and earn
                    <br />more
                    $$
                    and be better at what you do.<br /> Specifically, if you are:
                </p>
            </div>

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <img src="/storage/frontend/image-53.svg" alt="Global Experts" class="img-fluid">
                </div>

                <div class="col-lg-7">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Gym & PT Studio Owners</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">MMA Fighter or coach</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Female athlete</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Male athlete</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Fitness Professional & Personal Trainers</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Health Coaches</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Group Fitness Instructors</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="benefits-list">Registered Dietitians</span>
                        </li>
                    </ul>
                    <p class="final-statement mt-5">
                        Then these webinars & Seminars are for you!
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid Famous-Global-Speakers-Experts-section">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="main-heading">Famous Global Speakers & Experts</h1>
                <p class="sub-heading">
                    The International Society of Sports Nutrition (ISSN®) held these live webinars & offline seminars
                    with the who’s who and leading experts in the field of sports nutrition, combat sports, female
                    professional sport, exercise science, and business owners in the training space.
                </p>
                <p class="additional-info">The More You Learn - The More You Earn</p>
                <p class="additional-info">Some Of The Expert Speakers Below From Recent Webinars & Seminars</p>
            </div>

            <div class="row justify-content-center">
                <!-- Column 1 -->
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Juan Carlos Santana MS CSCS FNSCA</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Shawn Arent PhD FISSN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Paul Christopher ATC</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Trisha VanDusseldorp PhD FISSN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Pete Bommarito MS CSCS</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Mike Ormsbee PhD FISSN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Corey Peacock Ph.D. FISSN CSCS</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Jackie Kaminski MS RDN/LDN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Julius Thomas</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Alan Nguyen DO</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Tony Ricci EdD FISSN CSCS</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Mara Cortina PhD FISSN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Stacy Sims PhD</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Eoin Molloy</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Katie Hirsch PhD</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Kirsty Sale PhD</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Abbie Smith-Ryan PhD FISSN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Kathryn Ackerman MD</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Mel Sulaver CISSN</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick-3.svg" alt="tick-icon" width="35" height="35"
                                class="me-3">
                            <span class="expert-list">Alyssa Olenick MS</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid Webinar-Seminar-Key-Takeaways-section">
        <div class="container">
            <div class="row g-5 d-flex align-items-center">
                <div class="col-lg-6">
                    <h1 class="main-heading mb-4">Webinar & Seminar Key Takeaways</h1>
                    <h2 class="sub-heading mb-4">The Who's Who In Sports Nutrition Globally</h2>

                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">Cutting Edge Science</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">Nutrition Facts Over Fiction</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">
                                Combined Hundreds Of Years Of Real Experience With Professional Athletes
                            </span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">Published Authors & Researchers</span>
                        </li>
                    </ul>

                    <h2 class="sub-heading mb-4">Key Takeaways Include:</h2>

                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">All The Ins & Outs Of The Personal Training Business</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">What Are the Mistakes Many Trainers Make in Their Business &
                                Ways To Avoid Them?</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">How To Incorporate Sports Nutrition Strategy into Your Business
                                For Strength & Conditioning Trainers</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">What Advice to Give & Not Give for Supplements &
                                Nutrition.</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">Who Do the Experts Go to For Advice?</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <img src="/storage/frontend/charm-circle-tick.svg" alt="tick-icon" width="30" height="30"
                                class="me-3">
                            <span class="takeaway-list">How Are Professional Athletes Coached In Sports Nutrition</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 text-center d-flex justify-content-center">
                    <img src="/storage/frontend/image-53.svg" alt="Webinar Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <section class="learn-more-earn-more">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/storage/frontend/image-54.svg" alt="On-Demand Benefits" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1>Learn More & Earn More</h1>
                    <p>Watch and learn from the global elite training and sports nutrition experts and grow your PT
                        business with these knowledge bombs!</p>
                    <p>For those that missed the “live” version, you are very fortunate now to be given the opportunity
                        to watch the on-demand version and watch it as many times as you wish for one year after
                        purchase.</p>
                    <p>Sit back, relax in the comfort of your own home or office and watch all to lap up the amazing
                        knowledge gained from these elite-level experts to grow and improve your business and earnings
                        in personal training.</p>
                    <p class="italic">“The More You Learn, The More You Earn!”</p>
                </div>
            </div>
        </div>
    </section>


    <section class="learn-grow-career-business">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <h1>Learn & Grow Your Career & Business</h1>
                    <p>These on-demand webinars and seminars by the ISSN are exclusively available on the Global
                        Performance Nutrition Institute (GPNi®) online portal and GPNi-TV®</p>
                    <p>What Makes GPNi® Different?</p>
                    <div class="feature">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="Tick Icon">
                        <span>Localized Language Content</span>
                    </div>
                    <div class="feature">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="Tick Icon">
                        <span>On-Demand Content With 24/7 Access</span>
                    </div>
                    <div class="feature">
                        <img src="/storage/frontend/charm-circle-tick.svg" alt="Tick Icon">
                        <span>360 Degree Education Solutions</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/learn & grow.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="watch-anytime-anywhere">
        <div class="container">
            <h1>Watch Anytime Anywhere</h1>
            <p>“Female Health & Performance Nutrition.” Learn from experts in the field of professional sport and female
                health on the cutting edge on what helps aid female athletes for best performance, also remain healthy
                longer. For those that missed this incredible webinar, you can now watch and get instant access. Over 6
                hours of on-demand content. <a href="#" style="color: #ffffff; ">Click Here
                    To Buy</a></p>
            <p>The Science Of Building a Successful PT Business Over 3 hours of jam-packed value with global experts in
                training, gyms, and sports nutrition. Leveraging off decades of expertise in the personal training
                business and sports nutrition. <a href="#" style="color: #ffffff; ">Click
                    Here To Buy</a></p>
            <p>The ISSN® Fight Science Camp seminar was held on November 6th at the IHP® headquarters in Florida. With
                over 2 hours of content with professional filming. Hundreds joined to learn from the global experts
                about combat sports about training, competition, and nutrition. If you missed it due to a conflict of
                schedule or could not travel, now you can catch up and watch the on-demand version exclusively through
                the GPNi® portal. <a href="#" style="color: #ffffff; ">Click Here To Buy</a>
            </p>
            <p>ISSN conferences and webinars, now with an on-demand option exclusively on GPNi-TV®. View for up to one
                year after purchase as many times as you wish.</p>
            <button class="btn-sign-up">Sign Up Now</button>
        </div>
    </section>

    <section class="previous-experts-seminars">
        <div class="container">
            <h1>Previous Experts & Seminars</h1>
            <p>Check out all the previous expert lecturers, seminars, and webinars all exclusively available on GPNi®,
                through GPNi-TV®</p>
            <p>Plug into the worldwide network of the who's who in sports nutrition with on-demand content and get
                access anytime, anywhere in the world!</p>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 2.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 3.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 4.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="special-offer-members">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/storage/frontend/image-55.svg" alt="Special Offer" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1>Special Offer For Members</h1>
                    <h2>Special ISSN® / GPNi® Members Offer</h2>
                    <p>Use coupon code “issnfight” and pay USD$69 ISSN® members only, saving USD$20 with the public
                        price set at USD$89 on the GPNi® website, or existing members just log in and pay.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you.</p>
            <div class="contact-us-icons">
                <div class="row d-flex align-items-end">
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/email-grey.svg" alt="Email Icon" class="img-fluid">
                            <p>info@thegpni.com</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/insta-grey.svg" alt="Instagram Icon" class="img-fluid">
                            <p>Instagram</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/twitter-greey.svg" alt="Twitter Icon" class="img-fluid">
                            <p>Twitter</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/linkedin-grey.svg" alt="LinkedIn Icon" class="img-fluid">
                            <p>LinkedIn</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/youtube-grey.svg" alt="Youtube Icon" class="img-fluid">
                            <p>Youtube</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/facebook-grey.svg" alt="Facebook Icon" class="img-fluid">
                            <p>Facebook</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="newsletter mt-4">
                <h2 style="color: #0040c3;">Subscribe & Get the latest from GPNi®</h2>
                <div class="d-flex justify-content-center flex-wrap">
                    <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter email address">
                    <button class="btn btn-primary ml-md-2">Subscribe</button>
                </div>
            </div>
        </div>
    </section>


@endsection