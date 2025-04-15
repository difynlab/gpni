@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush
 
@section('content')

    <x-frontend.notification></x-frontend.notification>
    <x-frontend.notification-popup></x-frontend.notification-popup>

    <div class="container">
        @if($contents->section_1_title_en)
            <div class="row section-1 section-margin-bottom">
                <div class="col-6">
                    <h3 class="heading">
                        {{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}
                    </h3>

                    <div class="text-heading">
                        {!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}
                    </div>

                    <div class="buttons">
                        @guest
                            <a href="{{ route('frontend.register') }}" class="blue-button">
                                {{ $contents->{'section_1_label_' . $middleware_language} ?? $contents->section_1_label_link_en }}
                            </a>
                        @endguest

                        <a href="{{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->link ?? json_decode($contents->section_1_label_link_en)->link }}"
                        class="other-button">
                            {{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->label ?? json_decode($contents->section_1_label_link_en)->label }}
                            <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Right" class="icon"/>
                        </a>
                    </div>
                </div>

                <div class="col-6 text-end">
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Section 1 Image" class="image">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Section 1 Image" class="image">
                    @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Section 1 Image" class="image">
                    @endif
                </div>
            </div>
        @endif

        @if($contents->section_2_title_en)
            <div class="section-2 section-margin-bottom">
                <div class="text-center">
                    <h3 class="heading">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h3>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="video-container">
                            @if($contents->{'section_2_video_' . $middleware_language})
                                <video src="{{ asset('storage/backend/pages/' . $contents->{'section_2_video_' . $middleware_language} ?? '') }}" controls></video>
                            @elseif($contents->section_2_video_en)
                                <video src="{{ asset('storage/backend/pages/' . $contents->section_2_video_en ?? '') }}" controls></video>
                            @else
                                <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="image" alt="Section 2 Image">
                            @endif

                            @if($contents->section_2_points_en)
                                <div class="overlay-text">
                                    <ul>
                                        @if($contents->{'section_2_points_' . $middleware_language})
                                            @foreach(json_decode($contents->{'section_2_points_' . $middleware_language}) as $section_2_point)
                                                @if($section_2_point)
                                                    <li class="text"><i class="bi bi-check-circle-fill"></i>{{ $section_2_point }}</li>
                                                @endif
                                            @endforeach
                                        @elseif($contents->section_2_points_en)
                                            @foreach(json_decode($contents->section_2_points_en) as $section_2_point)
                                                @if($section_2_point)
                                                    <li class="text"><i class="bi bi-check-circle-fill"></i>{{ $section_2_point }}</li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($contents->section_3_title_en)
            <div class="section-3 section-margin-bottom">
                <div class="text-center">
                    <h3 class="heading">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h3>
                    
                    <p class="sub-heading">{{ $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en }}</p>
                </div>

                <div class="tab-class">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" href="#tab-1">{{ $contents->{'section_3_first_tab_' . $middleware_language} ?? $contents->section_3_first_tab_en }}</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" href="#tab-2">{{ $contents->{'section_3_second_tab_' . $middleware_language} ?? $contents->section_3_second_tab_en }}</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" href="#tab-3">{{ $contents->{'section_3_third_tab_' . $middleware_language} ?? $contents->section_3_third_tab_en }}</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1">
                            <div class="swiper all-courses">
                                <div class="swiper-wrapper">
                                    @foreach($courses as $course)
                                        <div class="swiper-slide">
                                            @if($course->type == "Certification")
                                                <a href="{{ route('frontend.certification-courses.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                            @else
                                                <a href="{{ route('frontend.master-classes.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                            @endif
                                                    <div class="card">
                                                        <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" class="overlay-logo">

                                                        <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Course Image" class="card-img-top">

                                                        <div class="card-body">
                                                            <div class="card-title">{{ $course->title }}</div>
                                                            <div class="apply-now-container">
                                                                <div class="apply-now-text">{{ $contents->{'section_3_apply_' . $middleware_language} ?? $contents->section_3_apply_en }}</div>
                                                                <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                        </div> 
                                    @endforeach
                                </div>
                                <div class="swiper-pagination all-courses-pagination"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="tab-2">
                            <div class="swiper certificate-courses">
                                <div class="swiper-wrapper">
                                    @foreach($courses as $course)
                                        @if($course->type == "Certification")
                                            <div class="swiper-slide">
                                                <a href="{{ route('frontend.certification-courses.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                                    <div class="card">
                                                        <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" class="overlay-logo">

                                                        <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Course Image" class="card-img-top">

                                                        <div class="card-body">
                                                            <div class="card-title">{{ $course->title }}</div>
                                                            <div
                                                                class="apply-now-container">
                                                                <div class="apply-now-text">{{ $contents->{'section_3_apply_' . $middleware_language} ?? $contents->section_3_apply_en }}</div>
                                                                <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="swiper-pagination certificate-courses-pagination"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="tab-3">
                            <div class="swiper master-courses">
                                <div class="swiper-wrapper">
                                    @foreach($courses as $course)
                                        @if($course->type == "Master")
                                            <div class="swiper-slide">
                                                <a href="{{ route('frontend.master-classes.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                                    <div class="card">
                                                        <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" class="overlay-logo">

                                                        <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Course Image" class="card-img-top">

                                                        <div class="card-body">
                                                            <div class="card-title">{{ $course->title }}</div>
                                                            <div
                                                                class="apply-now-container">
                                                                <div class="apply-now-text">{{ $contents->{'section_3_apply_' . $middleware_language} ?? $contents->section_3_apply_en }}</div>
                                                                <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="swiper-pagination master-courses-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>

                @guest
                    <div class="text-center">
                        <a href="{{ route('frontend.register') }}" class="other-button">
                            {{ $contents->{'section_3_label_' . $middleware_language} ?? $contents->section_3_label_link_en }}
                            <img src="{{ asset('storage/frontend/arrow-right.svg') }}" class="icon"/>
                        </a>
                    </div>
                @endguest
            </div>
        @endif
    </div>
    
    @if($contents->section_4_title_en)
        <div class="container-fluid p-0">
            <div class="section-4 section-margin-bottom">
                <div class="container">
                    <div class="content">
                        <div class="text-center">
                            <h3 class="heading">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h3>

                            <p class="sub-heading">{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>
                        </div>

                        <div class="row bottom-content">
                            <div class="col-6">
                                <div class="student-video">
                                    @if($contents->{'section_4_video_' . $middleware_language})
                                        <video controls class="video">
                                            <source src="{{ asset('storage/backend/pages/' . $contents->{'section_4_video_' . $middleware_language}) }}" type="video/mp4">
                                        </video>
                                    @elseif($contents->section_4_video_en)
                                        <video controls class="video">
                                            <source src="{{ asset('storage/backend/pages/' . $contents->section_4_video_en) }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="video">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="swiper testimonials">
                                    <div class="swiper-wrapper">
                                        @foreach($testimonials as $testimonial)
                                            <div class="swiper-slide testimonial">
                                                <img src="{{ asset('storage/frontend/testimonial-quote.svg') }}" alt="Quote Icon" class="quote">

                                                <p class="testimonial-content">{{ $testimonial->content }}</p>

                                                <div class="author">
                                                    @if($testimonial->image)
                                                        <img src="{{ asset('storage/backend/testimonials/' . $testimonial->image) }}" alt="Author Picture">
                                                    @else
                                                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}">
                                                    @endif
                                                    
                                                    <div>
                                                        <p class="name">{{ $testimonial->name }}</p>
                                                        <p class="designation">{{ $testimonial->designation }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_title_en)
        <div class="container">
            <div class="section-5 section-margin-bottom">
                <div class="text-center">
                    <h3 class="heading">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</h3>
                    
                    <p class="sub-heading">{{ $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en }}</p>
                </div>
        
                @if($contents->section_5_images_en)
                    <div class="bottom-content">
                        @if($contents->{'section_5_images_' . $middleware_language})
                            <div class="row">
                                @foreach(json_decode($contents->{'section_5_images_' . $middleware_language}) as $section_5_image)
                                    <div class="col-3 text-center">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_image) }}" alt="Image" class="image">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row">
                                @foreach(json_decode($contents->section_5_images_en) as $section_5_image)
                                    <div class="col-3 text-center">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_image) }}" alt="Image" class="image">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_6_title_en)
        <div class="container-fluid p-0">
            <div class="section-6 section-margin-bottom">
                <div class="container">
                    <div class="content">
                        <div class="text-center">
                            <h3 class="heading">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</h3>

                            <p class="sub-heading">{{ $contents->{'section_6_description_' . $middleware_language} ?? $contents->section_6_description_en }}</p>
                        </div>
                        
                        <div class="buttons">
                            @guest
                                <a href="{{ route('frontend.register') }}" class="white-button">{{ $contents->{'section_6_label_' . $middleware_language} ?? $contents->section_6_label_link_en }}</a>
                            @endguest
            
                            <a href="{{ json_decode($contents->{'section_6_label_link_' . $middleware_language})->link ?? json_decode($contents->section_6_label_link_en)->link }}" class="other-white-button">
                                {{ json_decode($contents->{'section_6_label_link_' . $middleware_language})->label ?? json_decode($contents->section_6_label_link_en)->label }}
                                <img src="{{ asset('storage/frontend/arrow-icon-white.svg') }}" class="icon"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_7_title_en)
        <div class="container">
            <div class="section-7 section-margin-bottom">
                <div class="text-center">
                    <h3 class="heading">{{ $contents->{'section_7_title_' . $middleware_language} ?? $contents->section_7_title_en }}
                    </h3>

                    <p class="sub-heading">{{ $contents->{'section_7_description_' . $middleware_language} ?? $contents->section_7_description_en }}</p>
                </div>
                
                @if(!$advisory_boards->isEmpty())
                    <div class="bottom-content">
                        <div class="row justify-content-center">
                            @foreach($advisory_boards as $advisory_board)
                                <div class="single-advisor">
                                    <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="expert-image" data-bs-toggle="modal" data-bs-target="#expert-modal-{{ $advisory_board->id }}" id="{{ $advisory_board->id }}">
                                </div>

                                <div class="modal fade" id="expert-modal-{{ $advisory_board->id }}" tabindex="-1" role="dialog" aria-labelledby="expert-modal-label" aria-hidden="true">
                                    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-3">
                                                        <img class="expert-modal-image" alt="Expert Image" src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}"/>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="expert-name">{{ $advisory_board->name }}</div>
                                                        <div class="qualification">{{ $advisory_board->designations }}</div>
                                                    </div>
                                                    <div class="col-1">
                                                        <button type="button" class="btn-close btn-close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                
                                                <div class="text-content">
                                                    {!! $advisory_board->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="text-center">
                    <a href="{{ json_decode($contents->{'section_7_label_link_' . $middleware_language})->link ?? json_decode($contents->section_7_label_link_en)->link }}" class="other-button">
                        {{ json_decode($contents->{'section_7_label_link_' . $middleware_language})->label ?? json_decode($contents->section_7_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}" class="icon"/>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_8_title_en)
        <div class="container-fluid p-0">
            <div class="section-8 section-margin-bottom">
                <div class="container">
                    <div class="content">
                        <div class="text-center">
                            <h3 class="heading">{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}</h3>

                            <p class="sub-heading">{{ $contents->{'section_8_description_' . $middleware_language} ?? $contents->section_8_description_en }}</p>
                        </div>
                        
                        <div class="row justify-content-center">
                            <div class="col-9">
                                <div class="custom-search-bar">
                                    <form action="{{ route('frontend.nutritionists.index') }}" method="GET">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-search"></i>
                                            </span>

                                            <input type="text" class="form-control" name="nutritionist" placeholder="{{ $contents->{'section_8_placeholder_' . $middleware_language} ?? $contents->section_8_placeholder_en }}" aria-label="Search" aria-describedby="basic-addon1" required>

                                            <div class="search">
                                                <button class="blue-button" type="submit">{{ $contents->{'section_8_button_' . $middleware_language} ?? $contents->section_8_button_en }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="sub-heading">{{ $contents->{'section_8_sub_description_' . $middleware_language} ?? $contents->section_8_sub_description_en }}</div>

                            <div class="buttons">
                                <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_8_labels_links_en)[0]->link }}" type="button" class="btn nutritionist-button">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_8_labels_links_en)[0]->label }}</a>

                                <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_8_labels_links_en)[1]->link }}" type="button" class="btn nutritionist-button">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_8_labels_links_en)[1]->label }}</a>

                                <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[2]->link ?? json_decode($contents->section_8_labels_links_en)[2]->link }}" type="button" class="btn nutritionist-button">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[2]->label ?? json_decode($contents->section_8_labels_links_en)[2]->label }}</a>

                                <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[3]->link ?? json_decode($contents->section_8_labels_links_en)[3]->link }}" type="button" class="btn nutritionist-button">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[3]->label ?? json_decode($contents->section_8_labels_links_en)[3]->label }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    @if($contents->section_9_title_en)
        <div class="container">
            <div class="section-9 section-margin-bottom">
                <div class="text-center">
                    <h3 class="heading">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</h3>
                    <p class="sub-heading">{{ $contents->{'section_9_description_' . $middleware_language} ?? $contents->section_9_description_en }}</p>
                </div>

                <div class="accordion" id="accordionFAQ">
                    @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-heading" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $faq->id }}" aria-expanded="false" aria-controls="collapse_{{ $faq->id }}">
                                    {{ $faq->{'question'} }}
                                </button>
                            </h2>

                            <div id="collapse_{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body text-content">
                                    {!! $faq->{'answer'} !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <a href="{{ route('frontend.faqs') }}" class="other-button">
                        {{ $contents->{'section_9_button_' . $middleware_language} ?? $contents->section_9_button_en }}
                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}" class="icon"/>
                    </a>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('after-scripts')
    <script>
        const allCoursesSwiper = new Swiper(".all-courses", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".all-courses-pagination",
                clickable: true,
            }
        });

        const certificateCoursesSwiper = new Swiper(".certificate-courses", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".certificate-courses-pagination",
                clickable: true,
            }
        });

        const masterCoursesSwiper = new Swiper(".master-courses", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".master-courses-pagination",
                clickable: true,
            }
        });

        const testimonialsSwiper = new Swiper(".testimonials", {
            effect: "cube",
            grabCursor: true,
            loop: true,
            cubeEffect: {
                shadow: false,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endpush