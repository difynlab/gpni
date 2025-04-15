@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush
 
@section('content')

    @if($contents->section_1_title_en)
        <!-- Hero Section -->
        <section class="bg-white">
            <div class="container homepg">
                <x-frontend.notification></x-frontend.notification>
                <x-frontend.notification-popup></x-frontend.notification-popup>

                <div class="row align-items-center section-margin-bottom">
                    <div class="col-md-12 col-lg-6 text-center text-lg-start">
                        <div class="display-3 text-black heading fs-61">
                            {{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}
                        </div>

                        <div class="my-4 sub-heading text-content  international-society-of-sport">
                            {!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}
                        </div>

                        <div class="pt-md-3 pt-2">
                            @guest
                                <a href="{{ route('frontend.register') }}"
                                class="blue-button btn  py-sm-2 px-sm-4 me-3 btn-responsive btn btn-primary py-sm-2 px-sm-4 me-3 btn-responsive">
                                    {{ $contents->{'section_1_label_' . $middleware_language} ?? $contents->section_1_label_link_en }}
                                </a>
                            @endguest

                            <a href="{{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->link ?? json_decode($contents->section_1_label_link_en)->link }}"
                            class="py-sm-3 px-sm-2 other-button fw-semi-bold learn-more btn-responsive">
                                {{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->label ?? json_decode($contents->section_1_label_link_en)->label }}
                                <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Right" class="arrow-right-icon"/>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 text-center text-lg-end overflow-hidden image-header">
                        @if($contents->{'section_1_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Header Image" class="img-fluid">
                        @elseif($contents->section_1_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Header Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Header Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_2_title_en)
        <div class="container-xxl">
            <div class="container">
                <div class="text-center">
                    <div class="mb-3 mb-md-5 mx-md-5 mx-0 heading">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="video-container position-relative">
                            @if($contents->{'section_2_video_' . $middleware_language})
                                <video src="{{ asset('storage/backend/pages/' . $contents->{'section_2_video_' . $middleware_language} ?? '') }}" controls class="w-100"></video>
                            @elseif($contents->section_2_video_en)
                                <video src="{{ asset('storage/backend/pages/' . $contents->section_2_video_en ?? '') }}" controls class="w-100"></video>
                            @else
                                <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="img-fluid w-100" alt="Header Image">
                            @endif

                            @if($contents->section_2_points_en)
                                <div class="overlay-text position-absolute p-3">
                                    <ul class="list-unstyled">
                                        @if($contents->{'section_2_points_' . $middleware_language})
                                            @foreach(json_decode($contents->{'section_2_points_' . $middleware_language}) as $section_2_point)
                                                @if($section_2_point)
                                                    <li class="fs-16">{{ $section_2_point }}</li>
                                                @endif
                                            @endforeach
                                        @elseif($contents->section_2_points_en)
                                            @foreach(json_decode($contents->section_2_points_en) as $section_2_point)
                                                @if($section_2_point)
                                                    <li class="fs-16">{{ $section_2_point }}</li>
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
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="py-5">
            <div class="container">
                <div class="text-center">
                    <div class="mb-3 heading">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</div>
                    <div class="mb-1 sub-heading">{{ $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en }}</div>
                </div>

                <div class="tab-class pt-3 text-center">
                    <ul class="nav nav-pills d-flex justify-content-center mb-5 flex-md-row flex-column w-100">
                        <li class="nav-item mx-5">
                            <a class="d-flex align-items-center ms-0 pb-md-0 pb-0 active pill-link w-100" data-bs-toggle="pill" href="#tab-1">
                                <div class="tab-text fs-25 mt-1 mb-0">
                                    {{ $contents->{'section_3_first_tab_' . $middleware_language} ?? $contents->section_3_first_tab_en }}
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="d-flex align-items-center pb-md-0 pb-0 pill-link" data-bs-toggle="pill" href="#tab-2">
                                <div class="tab-text fs-25 mt-1 mb-0">
                                    {{ $contents->{'section_3_second_tab_' . $middleware_language} ?? $contents->section_3_second_tab_en }}
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="d-flex align-items-center me-0 pb-md-0 pb-0 pill-link" data-bs-toggle="pill" href="#tab-3">
                                <div class="tab-text fs-25 mt-1 mb-0">
                                    {{ $contents->{'section_3_third_tab_' . $middleware_language} ?? $contents->section_3_third_tab_en }}
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="tab-content" id="tab1Content">
                                    <div class="scrollable-container">
                                        @foreach($courses as $course)
                                            @if($course->type == "Certification")
                                                <a href="{{ route('frontend.certification-courses.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                            @else
                                                <a href="{{ route('frontend.master-classes.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                            @endif
                                                <div class="card course-card">
                                                    <div class="overlay-logo p-3">
                                                        <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" width="100%">
                                                    </div>
                                                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Menu Item" class="card-img-top">
                                                    <div class="card-body course-card-body ps-4">
                                                        <div class="card-title fs-25 d-flex justify-content-start text-start">{{ $course->title }}</div>
                                                        <div class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                                            <div class="apply-now-text fs-25">{{ $contents->{'section_3_apply_' . $middleware_language} ?? $contents->section_3_apply_en }}</div>
                                                            <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="tab-content" id="tab1Content">
                                    <div class="scrollable-container">
                                        @foreach($courses as $course)
                                            @if($course->type == "Certification")
                                                <a href="{{ route('frontend.certification-courses.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                                    <div class="card">
                                                        <div class="overlay-logo p-3">
                                                            <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" width="100%">
                                                        </div>
                                                        <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Menu Item" class="card-img-top">
                                                        <div class="card-body ps-4">
                                                            <div class="card-title fs-36 d-flex justify-content-start text-start">{{ $course->title }}</div>
                                                            <div
                                                                class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                                                <div class="apply-now-text fs-25">{{ $contents->{'section_3_apply_' . $middleware_language} ?? $contents->section_3_apply_en }}</div>
                                                                <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="tab-content" id="tab1Content">
                                    <div class="scrollable-container">
                                        @foreach($courses as $course)
                                            @if($course->type == "Master")
                                                <a href="{{ route('frontend.master-classes.show', [$course, \Overtrue\Pinyin\Pinyin::permalink($course->title)]) }}">
                                                    <div class="card">
                                                        <div class="overlay-logo p-3">
                                                            <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" width="100%">
                                                        </div>
                                                        <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Menu Item" class="card-img-top">
                                                        <div class="card-body ps-4">
                                                            <div class="card-title fs-36 d-flex justify-content-start text-start">{{ $course->title }}</div>
                                                            <div
                                                                class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                                                <div class="apply-now-text fs-25">{{ $contents->{'section_3_apply_' . $middleware_language} ?? $contents->section_3_apply_en }}</div>
                                                                <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @guest
                    <div class="text-center pt-5">
                        <a href="{{ route('frontend.register') }}" class=" sub-heading explore-course-text">
                            {{ $contents->{'section_3_label_' . $middleware_language} ?? $contents->section_3_label_link_en }}
                            <img src="{{ asset('storage/frontend/arrow-right.svg') }}" class="arrow-right-icon"/>
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="container-fluid p-0">
            <div class="section-4">
                <div class="container py-5">
                    <div class="content">
                        <div class="text-center">
                            <h3 class="heading">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h3>

                            <p class="sub-heading">{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 mb-4 mb-md-0">
                                <div class="student-video">
                                    @if($contents->{'section_4_video_' . $middleware_language})
                                        <video controls class="video w-100">
                                            <source src="{{ asset('storage/backend/pages/' . $contents->{'section_4_video_' . $middleware_language}) }}" type="video/mp4">
                                        </video>
                                    @elseif($contents->section_4_video_en)
                                        <video controls class="video w-100">
                                            <source src="{{ asset('storage/backend/pages/' . $contents->section_4_video_en) }}" type="video/mp4">
                                        </video>
                                    @else
                                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="video w-100">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
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
        <div class="partners-container py-5 py-md-0">
            <div class="container">
                <div class="text-center">
                    <div class="mb-3  heading partners-heading mt-md-5 px-5">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</div>
                    <div class="mb-3 partners-body fw-normal sub-heading">{{ $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en }}</div>
                </div>
        
                @if($contents->section_5_images_en)
                    <div class="row pt-md-3 py-2 gx-1 custom-row-gap">
                        <!-- <div class="row px-5 pb-5 gx-1 custom-row-gap"> -->
                        @if($contents->{'section_5_images_' . $middleware_language})
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                @foreach(json_decode($contents->{'section_5_images_' . $middleware_language}) as $section_5_image)
                                    <div class="col-md-3 col-6 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_image) }}" alt="Image" class="event-image img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                @foreach(json_decode($contents->section_5_images_en) as $section_5_image)
                                    <div class="col-md-3 col-6 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_image) }}" alt="Image" class="event-image img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <!-- </div> -->
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_6_title_en)
        <div class="journey-container">
            <div class="container py-5">
                <div class="text-center">
                    <div class="mb-3 journey-heading heading fw-poppins-medium">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</div>
                    <div class="mb-3 journey-body sub-heading fw-poppins-regular">{{ $contents->{'section_6_description_' . $middleware_language} ?? $contents->section_6_description_en }}</div>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap">
                    @guest
                        <a href="{{ route('frontend.register') }}" class="btn white-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5">{{ $contents->{'section_6_label_' . $middleware_language} ?? $contents->section_6_label_link_en }}</a>
                    @endguest
    
                    <a href="{{ json_decode($contents->{'section_6_label_link_' . $middleware_language})->link ?? json_decode($contents->section_6_label_link_en)->link }}" class="btn other-white-button btn-responsive  px-4">
                        {{ json_decode($contents->{'section_6_label_link_' . $middleware_language})->label ?? json_decode($contents->section_6_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/arrow-icon-white.svg') }}" class="arrow-right-icon"/>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_7_title_en)
        <div class="expert-container">
            <div class="container py-5">
                <div class="text-center">
                    <div class="mb-3 expert-heading heading">{{ $contents->{'section_7_title_' . $middleware_language} ?? $contents->section_7_title_en }}
                    </div>
                    <div class="mb-3 expert-body sub-heading ">{{ $contents->{'section_7_description_' . $middleware_language} ?? $contents->section_7_description_en }}</div>
                </div>

                
                @if(!$advisory_boards->isEmpty())
                    <div class="container bottom-content">
                        <div class="row text-center g-4 pt-4 d-flex justify-content-center">
                            @foreach($advisory_boards->take(10) as $index => $advisory_board)
                                @if($index % 5 == 0 && $index != 0)
                                    </div><div class="row text-center g-4 pt-4 d-flex justify-content-center">
                                @endif
                                <div class="col-6 col-md-2">
                                    <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="img-fluid rounded-circle expert-select" data-bs-toggle="modal" data-bs-target="#expert-modal-{{ $advisory_board->id }}" id="{{ $advisory_board->id }}">
                                </div>

                                <div class="modal fade" id="expert-modal-{{ $advisory_board->id }}" tabindex="-1" role="dialog" aria-labelledby="expert-modal-label" aria-hidden="true">
                                    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2 col-4">
                                                        <img class="expert-image-15 rounded-circle" alt="" src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}"/>
                                                    </div>
                                                    <div class="col-md-8 col-12 d-flex align-items-center flex-column fs-25">
                                                        <div class="text-center">
                                                            <div class="expert-name fs-22">{{ $advisory_board->name }}</div>
                                                            <div class="qualification fs-16">{{ $advisory_board->designations }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-4 text-right">
                                                        <button type="button" class="btn-close position-absolute btn-close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                <div class="mt-md-4 text-content text-left">
                                                    {!! $advisory_board->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row text-center g-4 pt-4 d-flex justify-content-center">
                            @foreach($advisory_boards->slice(10, 4) as $advisory_board)
                                <div class="col-6 col-md-2">
                                    <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="img-fluid rounded-circle expert-select" data-bs-toggle="modal" data-bs-target="#expert-modal-{{ $advisory_board->id }}" id="{{ $advisory_board->id }}">
                                </div>

                                <div class="modal fade" id="expert-modal-{{ $advisory_board->id }}" tabindex="-1" role="dialog" aria-labelledby="expert-modal-label" aria-hidden="true">
                                    <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2 col-4">
                                                        <img class="expert-image-15 rounded-circle" alt="" src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}"/>
                                                    </div>
                                                    <div class="col-md-8 col-12 d-flex align-items-center flex-column">
                                                        <div class="text-center">
                                                            <div class="expert-name fs-20">{{ $advisory_board->name }}</div>
                                                            <div class="qualification fs-16">{{ $advisory_board->designations }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-4 text-right">
                                                        <button type="button" class="btn-close position-absolute btn-close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                <div class="mt-4 text-content text-left">
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

                <div class="text-center mt-5 explore-course-text">
                    <a href="{{ json_decode($contents->{'section_7_label_link_' . $middleware_language})->link ?? json_decode($contents->section_7_label_link_en)->link }}" class="py-sm-4 px-sm-5 fw-medium other-button">
                        {{ json_decode($contents->{'section_7_label_link_' . $middleware_language})->label ?? json_decode($contents->section_7_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}" class="arrow-right-icon"/>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_8_title_en)
        <div class="nutritionist-container">
            <div class="container py-5">
                <div class="text-center">
                    <div class="mb-3 nutritionist-heading heading">{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}</div>
                    <div class="mb-1 nutritionist-body  sub-heading">{{ $contents->{'section_8_description_' . $middleware_language} ?? $contents->section_8_description_en }}</div>
                </div>
                
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <div class="w-75 w-md-50">
                                <div class="custom-search-bar">
                                    <form action="{{ route('frontend.nutritionists.index') }}" method="GET">
                                        <div class="input-group mb-3 mt-5 d-flex justify-content-center align-items-center">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ps-3 bi bi-search"></i>
                                            </span>
                                            <input type="text" class="form-control form-control-lg p-3" name="nutritionist" placeholder="{{ $contents->{'section_8_placeholder_' . $middleware_language} ?? $contents->section_8_placeholder_en }}" aria-label="Search" aria-describedby="basic-addon1" required>
                                            <div class="p-2 d-flex align-items-center">
                                                <button class="btn btn-primary btn-lg search-button btn-responsive m-2" type="submit">{{ $contents->{'section_8_button_' . $middleware_language} ?? $contents->section_8_button_en }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-5">
                    <div class="mb-3 list-heading fs-25">{{ $contents->{'section_8_sub_description_' . $middleware_language} ?? $contents->section_8_sub_description_en }}</div>

                    <div class="d-flex justify-content-center flex-wrap">
                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_8_labels_links_en)[0]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_8_labels_links_en)[0]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_8_labels_links_en)[1]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_8_labels_links_en)[1]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[2]->link ?? json_decode($contents->section_8_labels_links_en)[2]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[2]->label ?? json_decode($contents->section_8_labels_links_en)[2]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[3]->link ?? json_decode($contents->section_8_labels_links_en)[3]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[3]->label ?? json_decode($contents->section_8_labels_links_en)[3]->label }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    @if($contents->section_9_title_en)
        <div class="faq-container">
            <div class="container py-5">
                <div class="text-center">
                    <div class="mb-3 faq-heading heading">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</div>
                    <div class="mb-3 faq-body sub-heading">{{ $contents->{'section_9_description_' . $middleware_language} ?? $contents->section_9_description_en }}</div>
                </div>
                <div class="my-3">
                    <div class="accordion" id="accordionFAQ">
                        @foreach($faqs->take(5) as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed p-2 p-md-3 text-heading" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $faq->id }}" aria-expanded="false" aria-controls="collapse_{{ $faq->id }}">
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
                    <div class="text-center explore-course-text pt-4">
                        <a href="{{ route('frontend.faqs') }}" class="py-sm-4 px-sm-5 fw-medium other-button">
                            {{ $contents->{'section_9_button_' . $middleware_language} ?? $contents->section_9_button_en }}
                            <img src="{{ asset('storage/frontend/arrow-right.svg') }}" class="arrow-right-icon"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('after-scripts')
    <script>
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