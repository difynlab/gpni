@extends('frontend.layouts.app')

@section('title', $contents->{'single_page_name_' . $middleware_language} ?? $contents->single_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/certification-course.css') }}">
@endpush

@section('content')

    <section class="header-section">
        <div class="container">
            <x-frontend.notification-popup></x-frontend.notification-popup>

            <div class="row d-flex align-items-center">
                <div class="col-lg-7 col-md-12">
                    <section class="certification-section">
                        <div class="title heading text-md-start text-center">{{ $course->title }}</div>

                        @if($course->certificate_images)
                            <div class="row certificates-container">
                                @foreach(json_decode($course->certificate_images) as $certificate_image)
                                    <div class="col-sm-6 col-6">
                                        <img src="{{ asset('storage/backend/courses/certificate-images/' . $certificate_image) }}" alt="Certificate" class="certificate-image img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="rating pt-0 d-flex justify-content-md-start justify-content-center">
                            <span>{{ $average_rating }}.0</span>
                            @for($i = 0; $i < $average_rating; $i++)
                                <i class="bi bi-star-fill star"></i>
                            @endfor
                            <span>({{ $course_reviews->count() }})</span>
                        </div>
                    </section>
                </div>

                <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
                    <div class="description sub-heading text-md-start text-center">
                        {{ $course->short_description }}
                    </div>
                    
                    <div class="d-flex justify-content-md-start justify-content-center">
                        @if(auth()->check())
                            @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name) && $course->language == $middleware_language_name)
                                @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                                    <a class="btn btn-primary fs-20">{{ $contents->{'single_page_already_purchased_' . $middleware_language} ?? $contents->single_page_already_purchased_en }}</a>
                                @else
                                    <a href="{{ route('frontend.certification-courses.purchase', $course) }}" class="btn btn-primary fs-20">{{ $contents->{'single_page_enroll_now_' . $middleware_language} ?? $contents->single_page_enroll_now_en }}</a>
                                @endif
                            @else
                                <a class="btn btn-primary fs-20">{{ $contents->{'single_page_not_available_' . $middleware_language} ?? $contents->single_page_not_available_en }}</a>
                            @endif
                        @else
                            <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn btn-primary blue-button">{{ $contents->{'single_page_login_for_enroll_' . $middleware_language} ?? $contents->single_page_login_for_enroll_en }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid mx-0 px-0">
        <section class="course-details container-fluid">
            <div class="row align-items-center text-heading justify-content-center mb-0">
                <div class="col-12 col-md-6 col-lg-3 mb-md-3 mb-lg-0 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label sub-heading">{{ $contents->{'single_page_no_of_modules_' . $middleware_language} ?? $contents->single_page_no_of_modules_en }}</div>
                        <div class="value text-heading mb-0">{{ $course->no_of_modules }}</div>
                    </div>
                    <div class="vertical-line"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-md-3 mb-lg-0 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label sub-heading">{{ $contents->{'single_page_course_type_' . $middleware_language} ?? $contents->single_page_course_type_en }}</div>
                        <div class="value text-heading mb-0">{{ $course->type }}</div>
                    </div>
                    <div class="vertical-line"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-md-3 mb-lg-0 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label sub-heading">{{ $contents->{'single_page_course_duration_' . $middleware_language} ?? $contents->single_page_course_duration_en }}</div>
                        <div class="value text-heading mb-0">{{ $course->duration }}</div>
                    </div>
                    <div class="vertical-line"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-md-3 mb-lg-0 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label sub-heading">{{ $contents->{'single_page_course_language_' . $middleware_language} ?? $contents->single_page_course_language_en }}</div>
                        <div class="value text-heading mb-0">{{ $course->language }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- @if($course->certification_section_2_title)
            <section class="plans-payment position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7 mb-4 mb-md-0 d-flex align-items-center justify-content-center d-none d-lg-flex">
                            <div class="image-section">
                                @if($course->certification_section_2_image)
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_2_image) }}" alt="Certificate" class="img-fluid">
                                @else
                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Header Image" class="img-fluid">
                                @endif
                            </div>
                        </div>
            
                        <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center">
                            <div class="text-section">
                                <h1 class="fs-39 text-md-start text-center">{{ $course->certification_section_2_title }}</h1>
                                <p class="description fs-20 text-md-start text-center">{{ $course->certification_section_2_description }}</p>
        
                                @if($course->certification_section_2_points)
                                    @foreach(json_decode($course->certification_section_2_points) as $certification_section_2_point)
                                        <label class="plan plan-normal d-block">
                                            <div class="plan-description fs-16">
                                                <div class="check-container mb-2">
                                                    <img src="{{ asset('storage/frontend/check-lightning.svg') }}" alt="Check" class="img-fluid">
                                                </div>
                                                <div class="description-content">
                                                    {!! $certification_section_2_point !!}
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif -->

        @if($course->certification_section_2_title)
            <section class="plans-payment position-relative">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-5 mb-4 mb-md-0 order-md-1 order-2">
                            <div class="img-container d-flex justify-content-md-start justify-content-center align-items-center">
                                @if($course->certification_section_2_image)
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_2_image) }}" alt="{{ $course->certification_section_2_title }}" class="section-2-image img-fluid" />
                                @else
                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="No Image" class="section-2-image img-fluid">
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-7 order-md-2 order-1">
                            <div class="font-weight-bold mb-3 heading">
                                {{ $course->certification_section_2_title }}
                            </div>
                            <div class="mb-3 sub-heading">{{ $course->certification_section_2_description }}</div>
                            
                            @if($course->certification_section_2_points)
                                <div>
                                    @foreach(json_decode($course->certification_section_2_points) as $certification_section_2_point)
                                        <div class="step-container p-3 p-md-4 d-flex align-items-center">
                                            <div class="step-number flex-shrink-0 me-3 me-md-4 fs-25">{{ $loop->iteration }}</div>
                                            <div class="step-content">
                                                <div class="mb-0 text-heading text-content">
                                                    {!! $certification_section_2_point !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- @if($course->certification_section_3_title)
            <div class="container certification-section py-md-5 py-2">
                <h1 class="text-center fs-39 my-4">{{ $course->certification_section_3_title }}</h1>

                @if($course->certification_section_3_points)
                    <div class="row gy-4">
                        @foreach(json_decode($course->certification_section_3_points) as $certification_section_3_point)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="certification-card">
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $certification_section_3_point->image) }}" alt="Steps Icon">
                                    <p class="fs-16">{{ $certification_section_3_point->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif -->

        <!-- @if($course->certification_section_4_video)
            <div class="container py-md-5 py-2">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="video-section section-4-video-container">
                            <div class="video-container">
                                <video controls class="section-4-video">
                                    <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_4_video) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif -->

        @if($course->certification_section_5_title)
            <section class="container py-md-5 py-2">
                <div class="row">
                    <div class="col-12">
                        <div class="card content-wrapper">
                            <div class="row">
                                <div class="col-12 col-md-6 text-content">
                                    <div class="mb-3 heading">{{ $course->certification_section_5_title }}</div>
                                    <div class="sub-heading">{{ $course->certification_section_5_description }}</div>
                                </div>
                                <div class="col-12 col-md-6 testimonial-content">
                                    <div class="testimonial-stars">
                                        @for($i = 0; $i < $course->certification_section_5_rating; $i++)
                                            <i class="bi bi-star-fill star"></i>
                                        @endfor
                                    </div>
                                    <div class="testimonial-text sub-heading">{{ $course->certification_section_5_content }}</div>
                                    <div class="testimonial-author">
                                        <div class="name fs-20">{{ $course->certification_section_5_name }}</div>
                                        <div class="role fs-18 pt-2">{{ $course->certification_section_5_designation }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_6_title)
            <section class="container-fluid team-section py-md-5 py-2">
                <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="title heading">{{ $course->certification_section_6_title }}</div>
                        <div class="mb-3 description sub-heading">{{ $course->certification_section_6_description }}</div>
                    </div>
                        
                    @if($course->certification_section_6_teams)
                        @foreach(json_decode($course->certification_section_6_teams) as $certification_section_6_team)
                            <div class="col-6 col-md-3 profile-card mt-md-0 mt-2">
                                <img src="{{ asset('storage/backend/courses/course-images/' . $certification_section_6_team->image) }}" alt="Person">
                                <div class="name fs-20">{{ $certification_section_6_team->name }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_7_title)
            <section class="enrollment-section container py-3 py-md-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="program-title heading mb-3">{{ $course->certification_section_7_title }}</div>
                        <div class="program-description sub-heading">{!! $course->certification_section_7_description !!}</div>
                        <div class="pt-3 d-flex align-items-center flex-wrap justify-content-lg-start justify-content-center mb-3">

                            @if(auth()->check())
                                @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name) && $course->language == $middleware_language_name)
                                    @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                                        <a class="btn enroll-button btn-responsive fs-20 mb-2 mb-md-0 me-md-3 py-3 px-5">{{ $contents->{'single_page_already_purchased_' . $middleware_language} ?? $contents->single_page_already_purchased_en }}</a>
                                    @else
                                        <a href="{{ route('frontend.certification-courses.purchase', $course) }}" class="btn enroll-button btn-responsive fs-20 mb-2 mb-md-0 me-md-3 py-3 px-5">{{ $contents->{'single_page_enroll_now_' . $middleware_language} ?? $contents->single_page_enroll_now_en }}</a>
                                    @endif
                                @else
                                    <a class="btn enroll-button btn-responsive fs-20 mb-2 mb-md-0 me-md-3 py-3 px-5">{{ $contents->{'single_page_not_available_' . $middleware_language} ?? $contents->single_page_not_available_en }}</a>
                                @endif
                            @else
                                <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class=" btn-responsive blue-button mb-2 mb-md-0 me-md-3 py-3 px-5">{{ $contents->{'single_page_login_for_enroll_' . $middleware_language} ?? $contents->single_page_login_for_enroll_en }}</a>
                            @endif

                            <a href="{{ json_decode($course->certification_section_7_label_link)->link }}" class="btn-responsive other-button py-3 px-4">{{ json_decode($course->certification_section_7_label_link)->label }} <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow" class="ms-2"></a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 d-flex justify-content-center">
                        <video controls class="section-7-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_7_video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </section>
        @endif

        <div class="tab-container container pb-md-5 py-2">
            <nav class="nav content-header d-flex justify-content-center">
                <ul class="nav nav-tabs flex-column flex-md-row">
                    <li class="nav-item">
                        <a class="nav-link active fs-20 fs-md-16" href="#introduction" data-bs-toggle="tab">{{ $contents->{'single_page_first_tab_' . $middleware_language} ?? $contents->single_page_first_tab_en }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-20 fs-md-16" href="#course-content" data-bs-toggle="tab">{{ $contents->{'single_page_second_tab_' . $middleware_language} ?? $contents->single_page_second_tab_en }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-20 fs-md-16" href="#chapters" data-bs-toggle="tab">{{ $contents->{'single_page_third_tab_' . $middleware_language} ?? $contents->single_page_third_tab_en }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-20 fs-md-16" href="#review" data-bs-toggle="tab">{{ $contents->{'single_page_fourth_tab_' . $middleware_language} ?? $contents->single_page_fourth_tab_en }}</a>
                    </li>
                </ul>
            </nav>

            <div class="tab-content mt-3 px-md-0 px-2">
                <div class="tab-pane fade show active" id="introduction">
                    <div class="content-box text-heading text-content">
                        <div>{!! $course->course_introduction !!}</div>
                    </div>
                </div>

                <div class="tab-pane fade" id="course-content">
                    <div class="content-box text-heading text-content">
                        <div>{!! $course->course_content !!}</div>
                    </div>
                </div>

                <div class="tab-pane fade" id="chapters">
                    <div class="content-box text-heading text-content">
                        <div>{!! $course->course_chapter !!}</div>
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
                                            <div class="testimonial-content text-content">
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

        @if($course->certification_section_8_content)
            <div class="certification-section-8 py-5" style="background-color: #0040c3;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-1 order-1 text-center mb-4 mb-lg-0 pe-lg-5">
                            <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_8_image) }}" alt="Course Image" class="img-fluid rounded section-8-image">
                        </div>
                        <div class="col-lg-6 order-lg-2 order-2 mb-4 mb-lg-0 ps-lg-3">
                                <div class="text-white  mb-4 text-lg-start text-main-heading text-main-content text-center">{!! $course->certification_section_8_content !!}</div>
                                <div class="d-flex justify-content-lg-start justify-content-center">
                                    @if(auth()->check())
                                        @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name) && $course->language == $middleware_language_name)
                                            @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                                                <a class="btn btn-light fs-20 py-3 px-4">{{ $contents->{'single_page_already_purchased_' . $middleware_language} ?? $contents->single_page_already_purchased_en }}</a>
                                            @else
                                                <a href="{{ route('frontend.certification-courses.purchase', $course) }}" class="btn white-button fs-20 py-3 px-4">{{ $contents->{'single_page_enroll_now_' . $middleware_language} ?? $contents->single_page_enroll_now_en }}</a>
                                            @endif
                                        @else
                                            <a class="btn btn-light fs-20 py-3 px-4">{{ $contents->{'single_page_not_available_' . $middleware_language} ?? $contents->single_page_not_available_en }}</a>
                                        @endif
                                    @else
                                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="white-button py-3 px-4">{{ $contents->{'single_page_login_for_enroll_' . $middleware_language} ?? $contents->single_page_login_for_enroll_en }}</a>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($course->certification_section_9_title)
            <div class="learn-section container py-5">
                <div class="header text-center mb-3">
                    <div class="title heading mb-3">{{ $course->certification_section_9_title }}</div>
                    <div class="subtitle sub-heading">{{ $course->certification_section_9_description }}</div>
                </div>
                
                <div class="learning-points row g-4 text">
                    @if($course->certification_section_9_points)
                        @foreach(json_decode($course->certification_section_9_points) as $certification_section_9_point)
                            <div class="col-md-6">
                                <div class="learn-list-certificate d-flex text-heading mb-0">
                                    <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick" class="me-3">
                                    {{ $certification_section_9_point }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        @if($course->certification_section_9_content)
            <section class="requirements-section container py-md-5 py-2">
                <div class="row align-items-center">
                    <div class="col-lg-6 d-flex justify-content-center align-items-center image-container pb-md-0 py-4">
                        @if($course->certification_section_9_image)
                            <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_9_image) }}" alt="Person Image" class="img-fluid person section-9-image">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Person Image" class="img-fluid person section-9-image">
                        @endif
                    </div>
                    <div class="col-lg-6">
                        {!! $course -> certification_section_9_content !!}
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_10_content)
            <section class="cissn-section bg-blue container-fluid py-md-5 py-2">
                <div class="container">
                <div class="row align-items-start text-white  ">  <!-- Added text-white class -->
                    <div class="col-lg-6">
                        <div class="text-white text-main-heading text-main-content">{!! $course->certification_section_10_content !!}</div>
                    </div>
                    <div class="col-lg-6 ">
                        <!-- <video controls class="section-10-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_10_video) }}" type="video/mp4">
                        </video> -->

                        @if($course->certification_section_10_image)
                            <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_10_image) }}" alt="Image" class="section-10-image">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="section-10-image">
                        @endif
                        
                        @if($course->certification_section_10_points)
                            <div class="accordion" id="accordionExample">
                                @foreach(json_decode($course->certification_section_10_points) as $key => $certification_section_10_point)
                                    <div class="accordion-item"> <!-- Added bg-transparent -->
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                                <span class="cissn-collapse-title text-white">{{ $certification_section_10_point->title }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="mcissn-collapse-content .accordion-item .accordion-collapse.show .mcissn-collapse-content">{{ $certification_section_10_point->description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_11_content)
            <section class="gpni-section container-fluid py-md-5 py-2">
                <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- <div class="video-section">
                            <video controls class="w-100">
                                <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_11_video) }}" type="video/mp4">
                            </video>
                        </div> -->

                        @if($course->certification_section_11_image)
                            <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_11_image) }}" alt="Image" class="section-10-image">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Image" class="section-10-image">
                        @endif
                    </div>
                    <div class="col-lg-6 text-main-heading text-main-content">
                        {!!  $course->certification_section_11_content !!}
                    </div>
                </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_13_title)
            <section class="payment-options-section container py-md-5 py-2">
                <div class="payment-options-title heading mb-3">{{ $course->certification_section_13_title }}</div>
                <div class="payment-options-description sub-heading mb-3">{{ $course->certification_section_13_description }}</div>

                @if($course->certification_section_13_table_points)
                    <div class="table-container">
                        <table class="payment-table">
                            <thead>
                                <tr>
                                    <th class="text-heading highlight-primary">{{ $course->certification_section_13_first_column }}</th>
                                    <th class="text-heading highlight-secondary">{{ $course->certification_section_13_second_column }}</th>
                                    <th class="text-heading highlight-primary">{{ $course->certification_section_13_third_column }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(json_decode($course->certification_section_13_table_points) as $certification_section_13_table_point)
                                    <tr>
                                        <td class="text-content">{{ $certification_section_13_table_point->first }}</td>
                                        <td class="text-content">{{ $certification_section_13_table_point->second }}</td>
                                        <td class="text-content">{{ $certification_section_13_table_point->third }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="pt-3 d-flex align-items-center flex-wrap justify-content-center mb-3">
                    @if(auth()->check())
                        @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name) && $course->language == $middleware_language_name)
                            @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                                <a class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5">{{ $contents->{'single_page_already_purchased_' . $middleware_language} ?? $contents->single_page_already_purchased_en }}</a>
                            @else
                                <a href="{{ route('frontend.certification-courses.purchase', $course) }}" class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_enroll_now_' . $middleware_language} ?? $contents->single_page_enroll_now_en }}</a>
                            @endif
                        @else
                            <a class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_not_available_' . $middleware_language} ?? $contents->single_page_not_available_en }}</a>
                        @endif
                    @else
                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_login_for_enroll_' . $middleware_language} ?? $contents->single_page_login_for_enroll_en }}</a>
                    @endif

                    <a href="{{ json_decode($course->certification_section_13_label_link)->link }}" class="btn contact-us-btn btn-responsive fs-20 fs-md-16 py-3 px-4">{{ json_decode($course->certification_section_13_label_link)->label }} <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow"></a>
                </div>
            </section>
        @endif

        <!-- @if($course->certification_section_12_title)
            <section class="advisory-board-section container py-md-5 py-2">
                <h2 class="advisory-board-title fs-39">{{ $course->certification_section_12_title }}</h2>

                @if($advisory_boards->isNotEmpty())
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
                        @foreach($advisory_boards as $advisory_board)
                            <div class="col">
                                <div class="advisory-board-card d-flex align-items-center">
                                    <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" alt="Erica Stump">
                                    <div class="ms-3">
                                        <div class="advisory-board-name fs-20">{{ $advisory_board->name }}</div>
                                        <div class="advisory-board-role fs-16">{{ $advisory_board->designations }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <a href="{{ json_decode($course->certification_section_12_label_link)->link }}" class="view-more-link fs-20">
                    {{ json_decode($course->certification_section_12_label_link)->label }}
                    <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Icon">
                </a>
            </section>
        @endif -->

        @if($course->certification_section_14_title)
            <section class="student-testimonial-section container">
                <div class="student-testimonial-content">
                    <div class="row d-flex align-items-center justify-content-center mx-md-3 mx-0">
                        <div class="col-md-6">
                            <div class="student-testimonial-text">
                                <div class="student-testimonial-header mb-3 d-flex align-items-center">
                                    <img src="{{ asset('storage/frontend/dash.svg') }}" alt="Line" class="me-3">
                                    <div class="text-muted font-weight-light fs-20">{{ $course->certification_section_14_title }}</div>
                                </div>
                                @if($testimonials->isNotEmpty())
                                    @foreach($testimonials as $index => $testimonial)
                                        @if($index === 0)
                                            <div class="quote-container">
                                                <div class="student-testimonial-quote mb-2 text-heading">"{{ $testimonial->content }}"</div>
                                                <div class="student-testimonial-author text-content mb-0">{{ $testimonial->name }}</div>
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
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="video-container">
                                <video controls class="responsive-video-2" style="border-radius: 35px; width: 100%;">
                                    <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_14_video) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if(count($testimonials) > 1)
                <section class="student-reviews-section container pt-0 mb-3">
                    <div class="testimonial-slider-container mt-5">
                        <div class="testimonial-slider">
                            <button class="slider-arrow prev-arrow">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            
                            <div class="slider-wrapper">
                                <div class="slider-track">
                                    @foreach($testimonials as $index => $testimonial)
                                        @if($index !== 0)
                                            <div class="testimonial-slide">
                                                <div class="student-review-card p-3">
                                                    <h5 class="student-review-name text-heading">{{ $testimonial->name }}</h5>
                                                    <p class="student-review-text text-content">{{ $testimonial->content }}</p>
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
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                    
                            <button class="slider-arrow next-arrow">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </section>
            @endif
        @endif

        <!-- @if($course->certification_section_15_title)
            <section class="advanced-certification-section container py-md-5 py-2">
                <h2 class="advanced-certification-title fs-39">{{ $course->certification_section_15_title }}</h2>
                <div class="row mx-5 mb-4">
                    <div class="col-lg-6">
                        <video controls class="section-15-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_15_video) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-lg-6">
                        <div class="advanced-certification-text fs-20">
                            {!! $course->certification_section_15_content !!}
                        </div>
                    </div>
                </div>

                @if($course->certification_section_15_points)
                    <div class="accordion" id="accordion15">
                        <div class="row mx-5">
                            @foreach(json_decode($course->certification_section_15_points) as $key => $certification_section_15_point)
                                <div class="col-6">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                                <span class="cissn-collapse-title">{{ $certification_section_15_point->title }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordion15">
                                            <div class="accordion-body">
                                                <p class="cissn-collapse-content">{{ $certification_section_15_point->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <a href="{{ json_decode($course->certification_section_15_label_link)->link }}" class="contact-us-btn">
                    {{ json_decode($course->certification_section_15_label_link)->label }}
                    <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Icon">
                </a>
            </section>
        @endif -->
    </div>

    @if($course->certification_section_16_title && $middleware_language_name != 'Japanese')
        <div class="container-fluid p-0">
            <section class="masters-pack-section py-5">
                <div class="masters-pack-overlay"></div>
                <div class="masters-pack-content">
                    <div class="heading text-white mb-3">{{ $course->certification_section_16_title }}</div>

                    <div class="sub-heading text-white mb-3">{!! $course->certification_section_16_content !!}</div>
                    
                    <div class="pt-3 d-flex align-items-center flex-wrap justify-content-center mb-3">

                        @if(auth()->check())
                            @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name) && $course->language == $middleware_language_name)
                                @if($middleware_language_name == 'English')
                                    @if(hasUserPurchasedCourse(auth()->user()->id, 6) || hasUserPurchasedCourse(auth()->user()->id, 7))
                                        <a class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_already_purchased_' . $middleware_language} ?? $contents->single_page_already_purchased_en }}</a>
                                    @else
                                        <a href="{{ route('frontend.certification-courses.purchase', 34) }}" class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_enroll_now_' . $middleware_language} ?? $contents->single_page_enroll_now_en }}</a>
                                    @endif
                                @else
                                    @if(hasUserPurchasedCourse(auth()->user()->id, 23) || hasUserPurchasedCourse(auth()->user()->id, 25))
                                        <a class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_already_purchased_' . $middleware_language} ?? $contents->single_page_already_purchased_en }}</a>
                                    @else
                                        <a href="{{ route('frontend.certification-courses.purchase', 34) }}" class="btn blue-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5 fs-20">{{ $contents->{'single_page_enroll_now_' . $middleware_language} ?? $contents->single_page_enroll_now_en }}</a>
                                    @endif
                                @endif
                            @else
                                <a class="btn other-white-button">{{ $contents->{'single_page_not_available_' . $middleware_language} ?? $contents->single_page_not_available_en }}</a>
                            @endif
                        @else
                            <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn-custom blue-button">{{ $contents->{'single_page_login_for_enroll_' . $middleware_language} ?? $contents->single_page_login_for_enroll_en }}</a>
                        @endif

                        <a href="{{ json_decode($course->certification_section_16_label_link)->link }}" class="btn-custom secondary other-white-button border-0">{{ json_decode($course->certification_section_16_label_link)->label }} <img src="{{ asset('storage/frontend/arrow-icon-white.svg') }}" alt="Arrow"></a>
                    </div>
                </div>
            </section>
        </div>
    @endif

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