@extends('frontend.layouts.app')

@section('title', $contents->{'single_master_class_page_name_' . $middleware_language} ?? $contents->single_master_class_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-class.css') }}">
@endpush

@section('content')

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4 fs-49">{{ $course->title }}</h1>
                <div class="d-flex align-items-center mt-3">
                    <span class="me-2" style="font-size: 16px; font-weight: 500; color: #898989;">{{ $average_rating }}.0</span>
                    @for($i = 0; $i < $average_rating; $i++)
                        <i class="bi bi-star-fill star"></i>
                    @endfor
                    <span class="ms-2" style="font-size: 16px; font-weight: 500; color: #898989;">({{ $course_reviews->count() }})</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="list-group">
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-duration.svg') }}" alt="Course Duration" class="me-3 img-size">
                            <div class="common-style fs-25">{{ $contents->{'course_duration_' . $middleware_language} ?? $contents->course_duration_en }}</div>
                        </div>
                        <div class="common-text-style fs-20">{{ $course->duration }}</div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-language.svg') }}" alt="Language" class="me-3 img-size">
                            <div class="common-style fs-25">{{ $contents->{'language_' . $middleware_language} ?? $contents->language_en }}</div>
                        </div>
                        <div class="common-text-style fs-20">{{ $course->language }}</div>
                    </div>
                    <div class="list-group-item bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/frontend/course-type.svg') }}" alt="Course Type"
                                    class="me-3 img-size">
                                <div class="common-style fs-25">{{ $contents->{'course_type_' . $middleware_language} ?? $contents->course_type_en }}</div>
                            </div>
                            <div class="common-text-style fs-20">{{ $course->type }}</div>
                        </div>
                        <!-- <div class="note mt-2 px-3 py-1 rounded">
                            Note: Certifications included in the package
                        </div> -->
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-modules.svg') }}" alt="No. of Modules"
                                class="me-3 img-size">
                            <div class="common-style fs-25">{{ $contents->{'no_of_modules_' . $middleware_language} ?? $contents->no_of_modules_en }}</div>
                        </div>
                        <div class="common-text-style fs-20">{{ $course->no_of_modules }}</div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-students.svg') }}" alt="No. Of Student Enrolled" class="me-3 img-size">
                            <div class="common-style fs-25">{{ $contents->{'no_of_students_enrolled_' . $middleware_language} ?? $contents->no_of_students_enrolled_en }}</div>
                        </div>
                        <div class="common-text-style fs-20">{{ $course->no_of_students_enrolled }}</div>
                    </div>
                </div>

              
            </div>

            <div class="col-md-7">
                <video class="video-player" controls>
                    <source src="{{ asset('storage/backend/courses/course-videos/' . $course->video) }}" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="author-card bg-warning rounded d-flex align-items-center p-3 position-relative mt-3">
                    <div class="by-badge text-center">
                        <span class="fs-20">{{ $contents->{'by_' . $middleware_language} ?? $contents->by_en }}</span>
                    </div>

                    <img src="{{ asset('storage/backend/courses/course-instructors/' . $course->instructor_profile_image) }}" alt="Instructor Profile Image" class="rounded-circle ms-md-3 ms-0"style="width: 100px; height: 100px;">

                    <div class="ms-lg-4 ms-0 text-white">
                        <div class="h5 mb-1 fs-31" style="font-weight: 500; font-size: 25px; line-height: 120%;">{{ $course->instructor_name }}</div>
                        <small class="fs-20">{{ $course->instructor_designation }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <p class="pt-3 text-muted line-clamp-3" style="font-size: 19px; line-height: 145%;">{{ $course->short_description }}</p>

                @if(auth()->check())
                    @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                        <button type="submit" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'already_purchased_' . $middleware_language} ?? $contents->already_purchased_en }}</button>
                    @else
                        <form action="{{ route('frontend.master-classes.checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_name" value="{{ $course->title }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="payment_mode" value="payment">
                            <input type="hidden" name="price" value="{{ $course->price }}">

                            <button type="submit" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'login_for_enroll_' . $middleware_language} ?? $contents->login_for_enroll_en }}</a>
                @endif
            </div>
            
        </div>

        @if($course->master_section_2_title)
            <div class="row mt-5">
                <div class="col text-center mb-4 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="learn-title my-4 fs-49">{{ $course->master_section_2_title }}</h2>
                    <p class="learn-subtitle fs-25 w-75">{{ $course->master_section_2_description }}</p>
                </div>
            </div>

            <div class="row">
                @if($course->master_section_2_points)
                    @foreach(json_decode($course->master_section_2_points) as $master_section_2_point)
                        <div class="col-md-6">
                            <div class="learn-list d-flex fs-20 py-3">
                                <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick" class="me-3">
                                {{ $master_section_2_point }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>

    @if($course->master_section_3_title)
        <div class="container-fluid journey-container">
            <div class="row justify-content-center text-center text-white py-5 my-5">
                <div class="col-md-8">
                    <h2 class="journey-title pb-2 fs-49">{{ $course->master_section_3_title }}</h2>
                    <p class="journey-subtitle fs-25">{{ $course->master_section_3_description }}</p>

                    <div class="text-center mt-3">
                        <a href="{{ json_decode($course->master_section_3_label_link)->link }}" class="btn btn-light journey-button mt-4 fs-20">{{ json_decode($course->master_section_3_label_link)->label }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="tab-container container">
        <nav class="nav content-header d-flex justify-content-center">
            <ul class="nav nav-tabs d-flex flex-column flex-sm-row justify-content-center align-items-center">
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link active" href="#introduction" data-bs-toggle="tab">{{ $contents->{'first_tab_' . $middleware_language} ?? $contents->first_tab_en }}</a>
                </li>
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link" href="#course-content" data-bs-toggle="tab">{{ $contents->{'second_tab_' . $middleware_language} ?? $contents->second_tab_en }}</a>
                </li>
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link" href="#chapters" data-bs-toggle="tab">{{ $contents->{'third_tab_' . $middleware_language} ?? $contents->third_tab_en }}</a>
                </li>
                <li class="nav-item fs-20 text-center">
                    <a class="nav-link" href="#review" data-bs-toggle="tab">{{ $contents->{'fourth_tab_' . $middleware_language} ?? $contents->fourth_tab_en }}</a>
                </li>
            </ul>
        </nav>

        <div class="tab-content mt-3 px-3 px-md-0">
            <div class="tab-pane fade show active" id="introduction">
                <div class="content-box">
                    {!! $course->course_introduction !!}
                </div>
            </div>

            <div class="tab-pane fade" id="course-content">
                <div class="content-box">
                    {!! $course->course_content !!}
                </div>
            </div>

            <div class="tab-pane fade" id="chapters">
                <div class="content-box">
                    {!! $course->course_chapter !!}
                </div>
            </div>

            <div class="tab-pane fade" id="review">
                @if($course_reviews->isNotEmpty())
                    <section class="testimonial-section">
                        <div class="slider-container">
                            <div class="testimonial-slider">
                                @foreach($course_reviews as $course_review)
                                <div class="slide">
                                    <div class="single-course-review">
                                        <div class="testimonial-header">
                                            <img src="{{ asset('storage/backend/courses/course-reviews/' . $course_review->image) }}" alt="{{ $course_review->name }}" class="rounded-circle">
                                            <div>
                                                <div class="testimonial-name fs-20">{{ $course_review->name }}</div>
                                                <div class="testimonial-stars">
                                                    @for($i = 0; $i < $course_review->rating; $i++)
                                                        <i class="bi bi-star-fill star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-content fs-20">
                                            {{ $course_review->content }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="slider-controls">
                                <button class="prev-btn"><i class="bi bi-chevron-left"></i> Prev</button>
                                <button class="next-btn">Next <i class="bi bi-chevron-right"></i></button>
                            </div>
                            <div class="slider-dots"></div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>

    @if($course->master_section_4_content)
        <div class="container-fluid p-5 my-5" style="background-color: #0040c3;">
            <div class="row justify-content-center text-white p-md-5 p-2">
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->master_section_4_image) }}" alt="Merchandise Image" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12 px-4">
                    <div class="fs-49 text-lg-start text-center">{!! $course->master_section_4_content !!}</div>
                    <div class="d-flex justify-content-lg-start justify-content-center">
                        <a href="{{ json_decode($course->master_section_4_label_link)->link }}" class="btn btn-light mt-4">
                            {{ json_decode($course->master_section_4_label_link)->label }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- @if($course->master_section_5_title)
        <div class="container py-3 py-md-5">
            <div class="text-center mb-3 mb-md-4">
                <h2 class="advisory-title fs-4 fs-md-49 mb-0">{{ $course->master_section_5_title }}</h2>
            </div>
    
            @if($advisory_boards->isNotEmpty())
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="board-images">
                            <div class="row text-center g-4 pt-4 d-flex justify-content-center px-3">
                                @foreach($advisory_boards as $index => $advisory_board)
                                    @if($index % 5 == 0 && $index != 0)
                                        </div><div class="row text-center g-4 pt-4 d-flex justify-content-center px-3">
                                    @endif
                                    <div class="col-6 col-md-2">
                                        <div class="rounded-circle-wrapper">
                                            <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" 
                                                 alt="Member" 
                                                 class="rounded-circle img-fluid shadow"
                                                 loading="lazy">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="text-center mt-3 mt-md-4">
                    <a href="{{ json_decode($course->master_section_5_label_link)->link }}" 
                       class="learn-more d-inline-flex align-items-center">
                        <span class="me-2">{{ json_decode($course->master_section_5_label_link)->label }}</span>
                        <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" 
                             alt="Arrow" 
                             class="ms-1"
                             width="18"
                             height="18">
                    </a>
                </div>
            @endif
        </div>
    @endif -->

    <!-- @if($course->master_section_6_title)
        <div class="regions-languages-section">
            <div class="container">
                <h2 class="fs-49">{{ $course->master_section_6_title }}</h2>
                <p class="pt-3 fs-25">{{ $course->master_section_6_description }}</p>

                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <div class="map-background d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/frontend/world-map.svg') }}" alt="World Map" class="img-fluid">

                            <div class="regions-text">
                                <div class="text-container fs-20">
                                    {!! $course->master_section_6_content !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="languages-box">
                            <div class="language-heading text-start fs-25">Languages</div>
                            <ul class="languages-list">
                                <li class="fs-20">{{ $contents->{'first_language_' . $middleware_language} ?? $contents->first_language_en }}</li>
                                <li class="fs-20">{{ $contents->{'second_language_' . $middleware_language} ?? $contents->second_language_en }}</li>
                                <li class="fs-20">{{ $contents->{'third_language_' . $middleware_language} ?? $contents->third_language_en }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif -->

    @if($course->master_section_7_title)
        <div class="container mt-5 custom-testimonial-section">
            <div class="row d-flex align-items-center justify-content-center mx-md-0 mx-2">
                <div class="col-md-6">
                    <div class="testimonial-header mb-3 d-flex align-items-center">
                        <div class="line me-3"></div>
                        <span class="text-muted font-weight-light fs-20">{{ $course->master_section_7_title }}</span>
                    </div>
                
                    @if($testimonials->isNotEmpty())
                        @foreach($testimonials as $index => $testimonial)
                            @if($index === 0)
                                <div class="quote-container">
                                    <div class="quote mb-3 fs-31" data-length="{{ strlen($testimonial->content) }}">"{{ $testimonial->content }}"</div>
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
                
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="video-container">
                        <video controls class="responsive-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->master_section_7_video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            @if(count($testimonials) > 1)
            <div class="testimonial-slider-container mt-4">
                <div class="testimonial-slider">
                    <button class="slider-arrow prev-arrow">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    
                    <div class="slider-wrapper">
                        <div class="slider-track">
                            @foreach($testimonials as $index => $testimonial)
                                @if($index !== 0)
                                    <div class="testimonial-slide">
                                        <div class="card p-4 rounded shadow-sm testimonial-card">
                                            <div class="card-title fs-20 text-primary mb-2">{{ $testimonial->name }}</div>
                                            <div class="card-text fs-20 mb-3">{{ $testimonial->content }}</div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <span class="font-weight-bold d-block mb-1 fs-20">
                                                        {{ $contents->{'rated_' . $middleware_language} ?? $contents->rated_en }} 
                                                        {{ $testimonial->rate }}/5 
                                                        {{ $contents->{'stars_' . $middleware_language} ?? $contents->stars_en }}
                                                    </span>
                                                    <div class="stars text-warning">
                                                        <span>
                                                            @for($i = 0; $i < $testimonial->rate; $i++)
                                                                <i class="bi bi-star-fill star"></i>
                                                            @endfor
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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