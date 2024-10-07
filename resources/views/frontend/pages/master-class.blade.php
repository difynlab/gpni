@extends('frontend.layouts.app')

@section('title', 'Master Classes')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-class.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    <section class="heading-section container text-center">
        <h1 class="title">Learn the Best, Be the Best</h1>
    </section>
    <section class="search-section mt-5">
        <input type="text" class="search-field" placeholder="Search">
        <img src="/storage/frontend/search-grey.svg" class="search-icon" alt="Search Icon">
    </section>

    <header class="header-section">
        <div>
            <h1>Find the best master class for your need</h1>
        </div>
        <div>
            <p>Get certified and globally recognized by the official partner of The International Society of Sports
                Nutrition (ISSN)</p>
        </div>
    </header>
    <section class="course-filter-section">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#all-courses" data-toggle="tab">All Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#upcoming-courses" data-toggle="tab">Upcoming Courses</a>
            </li>
        </ul>
    </section>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="all-courses">
            <div class="container py-5">
                <div class="row g-3">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <!-- spell-checker: disable-next-line -->
                                <h5 class="card-title">Endurance & Marathon Nutrition Coach (EMNC®)</h5>
                                <p class="card-text">Dietary strategies for endurance training with a focus on proven
                                    nutrition concepts. <a href="#" class="learn-more">Learn More</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="enroll-button">
                                        <span>Enroll Now</span>
                                        <img src="/storage/frontend/arr.svg" alt="Arrow Icon" width="12" height="10">
                                    </a>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">$599</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042-2.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">Sports Nutrition Fundamental Masterclass</h5>
                                <p class="card-text">
                                    Basic strategies and principles of sports nutrition.
                                    <a href="#" class="learn-more">Learn More</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="enroll-button">
                                        <span>Enroll Now</span>
                                        <img src="/storage/frontend/vector-6.svg" alt="Arrow Icon" width="12" height="10">
                                    </a>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">$499</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042-3.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">PNE Level 1 Part-1 <br>Modules 1 & 3</h5>
                                <p class="card-text">PNE Level 1 part 2 covers Advanced Sports Nutrition For Athletes
                                    <a href="#" class="learn-more">Learn More</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="enroll-button">
                                        <span>Enroll Now</span>
                                        <img src="/storage/frontend/vector-6.svg" alt="Arrow Icon" width="12" height="10">
                                    </a>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">$299</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042-4.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">PNE Level 1 Part-2 <br>Modules 4-7</h5>
                                <p class="card-text">PNE Level 1 part 1 covers Foundation Sports Nutrition href="#"
                                    class="learn-more">Learn More</a>
                                    <a href="#" class="learn-more">Learn More</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="enroll-button">
                                        <span>Enroll Now</span>
                                        <img src="/storage/frontend/vector-6.svg" alt="Arrow Icon" width="12" height="10">
                                    </a>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">$499</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042-5.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">PNE Level 1 Part-3 Modules 8 + Live Classes</h5>
                                <p class="card-text">PNE Level 1 part 3 covers presentations, exam. Live Classes &
                                    Official Exam. <a href="#" class="learn-more">Learn More</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="enroll-button">
                                        <span>Enroll Now</span>
                                        <img src="/storage/frontend/vector-6.svg" alt="Arrow Icon" width="12" height="10">
                                    </a>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">$299</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042-6.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <!-- spell-checker: disable-next-line -->
                                <h5 class="card-title">PNE Level-2 Masters + CISSN Trial</h5>
                                <p class="card-text">Master advanced sports nutrition with a
                                    <!-- spell-checker: disable-next-line -->CISSN trial class. <a href="#"
                                        class="learn-more">Learn More</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="enroll-button">
                                        <span>Enroll Now</span>
                                        <img src="/storage/frontend/vector-6.svg" alt="Arrow Icon" width="12" height="10">
                                    </a>
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">$99</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="upcoming-courses">
            <h3>Upcoming Courses</h3>
            <p>Content for upcoming courses goes here.</p>
        </div>
    </div>

    <div class="container-fluid certification-section">
        <h1>Why Get Certified By The GPNi®</h1>

        <div class="row gy-4">
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/frontend/ph-steps-duotone.svg" alt="Steps Icon">
                    <p>GPNi® is an-all access portal, to begin and advance your in sports nutrition to an elite level
                        with blossoming career opportunities.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/frontend/material-symbols-light-partner-exchange-outline-rounded.svg" alt="Partner Icon">
                    <p>GPNi® is the official global online partner for The International Society of Sports Nutrition,
                        The ISSN®. The ISSN® is the leading pioneer's and researcher's in Performance Nutrition
                        globally, since 2003.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/frontend/clarity-language-solid.svg" alt="Language Icon">
                    <p>GPNi® is the world’s first science backed performance nutrition online education portal to be
                        offered in multiple countries and available in multiple languages.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/frontend/mdi-school-online.svg" alt="School Icon">
                    <p>GPNi has a unique blend of on-demand content, live tutorials, and classroom-style online
                        solutions to give the most authentic and quality education solution.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/frontend/raphael-people.svg" alt="People Icon">
                    <p>Plug into the world’s network of fellow fitness professionals and business owners for career and
                        learning opportunities like no other certification offers. Upgrade your knowledge & global
                        network like no other certification can.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/frontend/fluent-people-chat-24-filled.svg" alt="Chat Icon">
                    <p>Exclusive access to the world’s most famous and leading sports nutrition researchers and experts
                        through the GPNi “Access to Experts” LIVE tutorials.</p>
                </div>
            </div>
        </div>
    </div>



    <!-- FAQ Container Start -->
    <div class="faq-container">
        <div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px;">
            <div class="text-center">
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
                            <button class="accordion-button collapsed p-2 p-md-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                                What is included in certification course enrollment? </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                            <button class="accordion-button collapsed p-2 p-md-3" type=" button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
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
                            <button class="accordion-button collapsed p-2 p-md-3" type=" button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
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
                            <button class="accordion-button collapsed p-2 p-md-3" type=" button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive">
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

    </div>

@endsection