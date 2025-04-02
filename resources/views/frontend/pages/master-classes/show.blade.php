@extends('frontend.layouts.app')

@section('title', $contents->{'single_master_class_page_name_' . $middleware_language} ?? $contents->single_master_class_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-class.css') }}">
@endpush

@section('content')

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4 fs-49 mb-3">{{ $course->title }}</h1>
                <div class="d-flex align-items-center mt-3">
                    <span class="me-2 fs-16" style="font-weight: 500; color: #898989;">{{ $average_rating }}.0</span>
                    @for($i = 0; $i < $average_rating; $i++)
                        <i class="bi bi-star-fill star"></i>
                    @endfor
                    <span class="ms-2 fs-16" style="font-weight: 500; color: #898989;">({{ $course_reviews->count() }})</span>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-5 mb-4 mb-md-3">
                <div class="list-group">
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-duration.svg') }}" alt="Course Duration" class="me-3 img-size">
                            <div class="common-style fs-25 fs-md-20">{{ $contents->{'course_duration_' . $middleware_language} ?? $contents->course_duration_en }}</div>
                        </div>
                        <div class="common-text-style fs-20 fs-md-16">{{ $course->duration }}</div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-language.svg') }}" alt="Language" class="me-3 img-size">
                            <div class="common-style fs-25 fs-md-20">{{ $contents->{'language_' . $middleware_language} ?? $contents->language_en }}</div>
                        </div>
                        <div class="common-text-style fs-20 fs-md-16">{{ $course->language }}</div>
                    </div>
                    <div class="list-group-item bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/frontend/course-type.svg') }}" alt="Course Type"
                                    class="me-3 img-size">
                                <div class="common-style fs-25 fs-md-20">{{ $contents->{'course_type_' . $middleware_language} ?? $contents->course_type_en }}</div>
                            </div>
                            <div class="common-text-style fs-20 fs-md-16">{{ $course->type }}</div>
                        </div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-modules.svg') }}" alt="No. of Modules"
                                class="me-3 img-size">
                            <div class="common-style fs-25 fs-md-20">{{ $contents->{'no_of_modules_' . $middleware_language} ?? $contents->no_of_modules_en }}</div>
                        </div>
                        <div class="common-text-style fs-20 fs-md-16">{{ $course->no_of_modules }}</div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-students.svg') }}" alt="No. Of Student Enrolled" class="me-3 img-size">
                            <div class="common-style fs-25 fs-md-20">{{ $contents->{'no_of_students_enrolled_' . $middleware_language} ?? $contents->no_of_students_enrolled_en }}</div>
                        </div>
                        <div class="common-text-style fs-20 fs-md-16">{{ $course->no_of_students_enrolled }}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                @if($course->media_type == 'Video')
                    <video class="video-player rounded w-100" controls>
                        <source src="{{ asset('storage/backend/courses/course-videos/' . $course->video) }}" type="video/mp4">
                    </video>
                @else
                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Course Thumbnail" class="course-image rounded w-100">
                @endif
            </div>
        </div>
        
        <div class="row mt-4 mb-4">
            <div class="col-md-5 mb-4 mb-md-0">
                <div class="author-card bg-warning rounded d-flex align-items-center p-3 position-relative mb-3">
                    <div class="by-badge text-center">
                        <span class="fs-20 fs-md-16">{{ $contents->{'by_' . $middleware_language} ?? $contents->by_en }}</span>
                    </div>

                    <img src="{{ asset('storage/backend/courses/course-instructors/' . $course->instructor_profile_image) }}" alt="Instructor Profile Image" class="rounded-circle ms-2 ms-md-3" style="width: 80px; height: 80px; object-fit: cover;">

                    <div class="ms-3 text-white">
                        <div class="fs-25 fs-md-20" style="font-weight: 500; line-height: 120%;">{{ $course->instructor_name }}</div>
                        <small class="fs-16">{{ $course->instructor_designation }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <p class="text-muted line-clamp-3 fs-25 fs-md-16 mb-0">{{ $course->short_description }}</p>

                @if(auth()->check())
                    @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                        <button type="submit" class="btn btn-primary btn-block w-100 py-2 py-md-3 fs-20 fs-md-16">{{ $contents->{'already_purchased_' . $middleware_language} ?? $contents->already_purchased_en }}</button>
                    @else
                        <form action="{{ route('frontend.master-classes.checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_name" value="{{ $course->title }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="payment_mode" value="payment">
                            <input type="hidden" name="price" value="{{ $course->price }}">

                            <button type="submit" class="btn btn-primary btn-block w-100 py-2 py-md-3 fs-20 fs-md-16 mt-2 mt-md-2">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn btn-primary btn-block w-100 py-2 py-md-3 fs-20 fs-md-16 mt-2 mt-md-3">{{ $contents->{'login_for_enroll_' . $middleware_language} ?? $contents->login_for_enroll_en }}</a>
                @endif
            </div>
        </div>

        @if($course->master_section_2_title)
            <div class="row mt-4 mt-md-5">
                <div class="col text-center mb-3 mb-md-4 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="learn-title my-3 my-md-4 fs-49">{{ $course->master_section_2_title }}</h2>
                    <p class="learn-subtitle fs-25 w-100 w-md-75">{{ $course->master_section_2_description }}</p>
                </div>
            </div>

            <div class="row">
                @if($course->master_section_2_points)
                    @foreach(json_decode($course->master_section_2_points) as $master_section_2_point)
                        <div class="col-md-6">
                            <div class="learn-list d-flex fs-25 py-2 py-md-3">
                                <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick" class="me-2 me-md-3">
                                <span>{{ $master_section_2_point }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>

    @if($course->master_section_3_title)
        <div class="container-fluid journey-container py-5">
            <div class="row justify-content-center text-center text-white">
                <div class="col-md-8">
                    <h2 class="journey-title pb-2 fs-49">{{ $course->master_section_3_title }}</h2>
                    <p class="journey-subtitle px-3 px-md-0 fs-25">{{ $course->master_section_3_description }}</p>

                    @guest
                        <div class="text-center fs-20 mt-3">
                            <a href="{{ route('frontend.register') }}" class="btn btn-light journey-button fs-20 mt-3 mt-md-4 fs-20">{{ $course->master_section_3_label }}</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    @endif

    <div class="tab-container container py-5">
        <nav class="nav content-header d-flex justify-content-center overflow-auto">
            <ul class="nav nav-tabs d-flex flex-row justify-content-start justify-content-md-center align-items-center w-100">
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link active px-2 px-md-3" href="#introduction" data-bs-toggle="tab">{{ $contents->{'first_tab_' . $middleware_language} ?? $contents->first_tab_en }}</a>
                </li>
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link px-2 px-md-3" href="#course-content" data-bs-toggle="tab">{{ $contents->{'second_tab_' . $middleware_language} ?? $contents->second_tab_en }}</a>
                </li>
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link px-2 px-md-3" href="#chapters" data-bs-toggle="tab">{{ $contents->{'third_tab_' . $middleware_language} ?? $contents->third_tab_en }}</a>
                </li>
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link px-2 px-md-3" href="#review" data-bs-toggle="tab">{{ $contents->{'fourth_tab_' . $middleware_language} ?? $contents->fourth_tab_en }}</a>
                </li>
            </ul>
        </nav>

        <div class="tab-content mt-3 px-2 px-md-0">
            <div class="tab-pane fade show active" id="introduction">
                <div class="content-box py-3 py-md-4 px-3 px-md-5">
                    <div class="fs-20">{!! $course->course_introduction !!}</div>
                </div>
            </div>

            <div class="tab-pane fade" id="course-content">
                <div class="content-box py-3 py-md-4 px-3 px-md-5">
                    <div class="fs-20">{!! $course->course_content !!}</div>
                </div>
            </div>

            <div class="tab-pane fade" id="chapters">
                <div class="content-box py-3 py-md-4 px-3 px-md-5">
                    <div class="fs-20">{!! $course->course_chapter !!}</div>
                </div>
            </div>

            <div class="tab-pane fade" id="review">
                @if($course_reviews->isNotEmpty())
                    <section class="testimonial-section py-3 py-md-4 px-2 px-md-4">
                        <div class="slider-container">
                            <div class="testimonial-slider">
                                @foreach($course_reviews as $course_review)
                                <div class="slide">
                                    <div class="single-course-review">
                                        <div class="testimonial-header">
                                            <img src="{{ asset('storage/backend/courses/course-reviews/' . $course_review->image) }}" alt="{{ $course_review->name }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            <div>
                                                <div class="testimonial-name fs-20">{{ $course_review->name }}</div>
                                                <div class="testimonial-stars">
                                                    @for($i = 0; $i < $course_review->rating; $i++)
                                                        <i class="bi bi-star-fill star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-content fs-20 mt-3">
                                            {{ $course_review->content }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="slider-controls mt-3">
                                <button class="prev-btn fs-16"><i class="bi bi-chevron-left"></i> Prev</button>
                                <button class="next-btn fs-16">Next <i class="bi bi-chevron-right"></i></button>
                            </div>
                            <div class="slider-dots mt-2"></div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>

    @if($course->master_section_4_content)
        <div class="our-story py-5" style="background-color: #0040c3; color: white;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/backend/courses/course-images/' . $course->master_section_4_image) }}" alt="Course Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 ps-md-5"> 
                        <h2 class="mb-3 fs-49 ff-poppins-medium mb-3 text-white">{!! $course->master_section_4_content !!}</h2>
                        <div class="fs-25 ff-poppins-regular">
                            @if(auth()->check())
                                @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                                    <button type="submit" class="btn btn-light mt-3 mt-md-4 fs-20 py-2 px-3 px-md-4">{{ $contents->{'already_purchased_' . $middleware_language} ?? $contents->already_purchased_en }}</button>
                                @else
                                    <form action="{{ route('frontend.master-classes.checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="course_name" value="{{ $course->title }}">
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="hidden" name="payment_mode" value="payment">
                                        <input type="hidden" name="price" value="{{ $course->price }}">

                                        <button type="submit" class="btn btn-light mt-3 mt-md-4 fs-20 py-2 px-3 px-md-4">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn btn-light mt-3 mt-md-4 fs-20 py-2 px-3 px-md-4">{{ $contents->{'login_for_enroll_' . $middleware_language} ?? $contents->login_for_enroll_en }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($course->master_section_7_title)
        <div class="container mt-5 custom-testimonial-section">
            <div class="row d-flex align-items-center justify-content-center mx-md-3 mx-0">
                <div class="col-md-6">
                    <div class="testimonial-header mb-3 d-flex align-items-center">
                        <div class="line me-3"></div>
                        <span class="text-muted font-weight-light fs-20">{{ $course->master_section_7_title }}</span>
                    </div>
                
                    @if($testimonials->isNotEmpty())
                        @foreach($testimonials as $index => $testimonial)
                            @if($index === 0)
                                <div class="quote-container">
                                    <div class="quote mb-3 fs-25" data-length="{{ strlen($testimonial->content) }}">"{{ $testimonial->content }}"</div>
                                    <div class="student-name mb-2 fs-20">{{ $testimonial->name }}</div>
                                    <div class="stars">
                                        @for($i = 0; $i < $testimonial->rate; $i++)
                                            <i class="bi bi-star-fill star"></i>
                                        @endfor
                                    </div>
                                </div>
                                @break
                            @endif
                        @endforeach
                    @endif
                </div>
                
                <div class="col-md-6">
                    <div class="video-container">
                        <video controls class="responsive-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->master_section_7_video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            
            @if(count($testimonials) > 1)
            <div class="testimonial-slider-container mt-5">
                <div class="testimonial-slider">
                    <button class="slider-arrow prev-arrow">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    
                    <div class="slider-wrapper">
                        <div class="slider-track">
                            @foreach($testimonials as $testimonial)
                                <div class="testimonial-slide">
                                    <div class="student-review-card-2 p-3">
                                        <h5 class="student-review-name fs-20">{{ $testimonial->name }}</h5>
                                        <p class="student-review-text fs-18">{{ $testimonial->content }}</p>
                                        <div class="student-review-footer">
                                            <div class="student-review-rating">
                                                <span>{{ $contents->{'single_page_rated_' . $middleware_language} ?? $contents->single_page_rated_en }} {{ $testimonial->rate }}/5 {{ $contents->{'single_page_stars_' . $middleware_language} ?? $contents->single_page_stars_en }}</span>
                                                
                                                <span>
                                                    @for($i = 0; $i < $testimonial->rate; $i++)
                                                        <i class="bi bi-star-fill star"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            
                    <button class="slider-arrow next-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            @endif
        </div>
    @endif

    <!-- @if($course->master_section_8_title)
        <div class="container text-center mt-5">
            <h2 class="experts-title fs-49">{{ $course->master_section_8_title }}</h2>
            <p class="experts-description fs-25">{{ $course->master_section_8_description }}</p>

            @if($course->master_section_8_videos)
                <div class="assessment-container my-4">
                    <div class="row g-3">
                        @foreach(json_decode($course->master_section_8_videos) as $master_section_8_video)
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="video-wrapper">
                                    <video class="assessment-video" controls>
                                        <source src="{{ asset('storage/backend/courses/course-videos/' . $master_section_8_video) }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif

    @if($course->master_section_9_title)
        <section class="contact-us my-5">
            <div class="container">
                <h1 class="fs-49">{{ $course->master_section_9_title }}</h1>
                <p class="fs-25">{{ $course->master_section_9_description }}</p>

                <div class="contact-us-icons">
                    <div class="row d-flex align-items-end">
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="mailto: {{ $settings->email }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/frontend/email-white.svg') }}" alt="Email Icon" class="img-fluid white-fill">
                                    <p>{{ $settings->email }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->instagram }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/instagram-white.svg') }}" alt="Instagram Icon" class="img-fluid">
                                    <p>{{ $contents->{'instagram_' . $middleware_language} ?? $contents->instagram_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->twitter }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/twitter-white.svg') }}" alt="Twitter Icon" class="img-fluid">
                                    <p>{{ $contents->{'twitter_' . $middleware_language} ?? $contents->twitter_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->linkedin }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/linkedin-white.svg') }}" alt="LinkedIn Icon" class="img-fluid">
                                    <p>{{ $contents->{'linkedin_' . $middleware_language} ?? $contents->linkedin_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->youtube }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/youtube-white.svg') }}" alt="Youtube Icon" class="img-fluid">
                                    <p>{{ $contents->{'youtube_' . $middleware_language} ?? $contents->youtube_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->fb }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/facebook-white.svg') }}" alt="Facebook Icon" class="img-fluid">
                                    <p>{{ $contents->{'facebook_' . $middleware_language} ?? $contents->facebook_en }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($course->master_section_10_title)
        <div class="container my-5">
            <h2 class="faq-title fs-49 text-center">{{ $course->master_section_10_title }}</h2>
            <p class="faq-subtitle fs-25 text-center">{{ $course->master_section_10_description }}</p>

            @if($faqs->isNotEmpty())
                <div class="faq-container mt-5">
                    <div class="accordion" id="accordionExample">
                        @foreach($faqs as $faq)
                            <div class="accordion-item" id="heading{{ $faq->id }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fs-25 collapsed p-2 p-md-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>

                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif -->

@endsection

@push('after-scripts')
    <script>
        const slider = document.querySelector('.testimonial-slider');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const dotsContainer = document.querySelector('.slider-dots');
        let currentSlide = 0;

        // Create dots dynamically
        for (let i = 0; i < slides.length; i++) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }

        const dots = document.querySelectorAll('.dot');

        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            const translateX = -100 * currentSlide;
            slider.style.transform = `translateX(${translateX}%)`;
            updateDots();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            goToSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            goToSlide(currentSlide);
        }

        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Initialize the slider to show the first slide
        goToSlide(0);


        document.addEventListener('DOMContentLoaded', function() {
            const sliderTrack = document.querySelector('.slider-track');
            const slides = document.querySelectorAll('.testimonial-slide');
            const prevButton = document.querySelector('.prev-arrow');
            const nextButton = document.querySelector('.next-arrow');
            
            let currentPosition = 0;
            let slidesToShow = 3;
            let slidesToScroll = 1;

            function updateSlidesToShow() {
                if (window.innerWidth <= 768) {
                    slidesToShow = 1;
                } else if (window.innerWidth <= 992) {
                    slidesToShow = 2;
                } else {
                    slidesToShow = 3;
                }
            }

            function updateSliderPosition() {
                const slideWidth = 100 / slidesToShow;
                sliderTrack.style.transform = `translateX(-${currentPosition * slideWidth}%)`;
            }

            function checkButtons() {
                prevButton.disabled = currentPosition === 0;
                nextButton.disabled = currentPosition >= slides.length - slidesToShow;
                prevButton.style.opacity = prevButton.disabled ? '0.5' : '1';
                nextButton.style.opacity = nextButton.disabled ? '0.5' : '1';
            }

            prevButton.addEventListener('click', () => {
                if (currentPosition > 0) {
                    currentPosition--;
                    updateSliderPosition();
                    checkButtons();
                }
            });

            nextButton.addEventListener('click', () => {
                if (currentPosition < slides.length - slidesToShow) {
                    currentPosition++;
                    updateSliderPosition();
                    checkButtons();
                }
            });

            window.addEventListener('resize', () => {
                updateSlidesToShow();
                currentPosition = 0;
                updateSliderPosition();
                checkButtons();
            });

            updateSlidesToShow();
            updateSliderPosition();
            checkButtons();
        });
    </script>
@endpush