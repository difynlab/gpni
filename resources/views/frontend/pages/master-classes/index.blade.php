@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-classes.css') }}">
@endpush

@section('content')

    <div class="container-fluid my-5 p-0 m-0 mb-0">

        @if($contents->section_1_title_en)
            <section class="heading-section container text-center">
                <x-frontend.notification></x-frontend.notification>
                <x-frontend.notification-popup></x-frontend.notification-popup>

                <div class="title heading">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>
            </section>

            <form action="{{ route('frontend.master-classes.index') }}" method="GET">
                <section class="search-section mt-5">
                    <input type="text" class="search-field" name="master_class" value="{{ $master_class ?? '' }}" placeholder="{{ $contents->{'section_1_search_' . $middleware_language} ?? $contents->section_1_search_en }}">
                    <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" class="search-icon" alt="Search Icon">
                </section>
            </form>

            <header class="header-section text-center display-flex flex-column justify-content-center align-items-center">
                <div>
                    <div class="heading mb-3 mt-3">{{ $contents->{'section_1_sub_title_' . $middleware_language} ?? $contents->section_1_sub_title_en }}</div>
                </div>
                <div class="d-flex justify-content-center align-items-center w-100">
                    <div class="sub-heading w-75 text-center mx-auto description">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}</div>
                </div>
            </header>
        @endif

        <section>
            <div class="container mb-3 mt-3">
                <div class="row g-3 mb-3 m-0">
                    @if($all_courses->isNotEmpty())
                        @foreach($all_courses as $all_course)
                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                <div class="card h-100 d-flex flex-column mx-1 master-class-card">
                                    <a href="{{ route('frontend.master-classes.show', [$all_course, \Overtrue\Pinyin\Pinyin::permalink($all_course->title)]) }}">
                                        <img src="{{ asset('storage/backend/courses/course-images/' . $all_course->image) }}" class="card-img-top" alt="Card Image">
                                    </a>
                                    <div class="card-body d-flex flex-column">
                                        <div class="card-title sub-heading">{{ $all_course->title }}</div>

                                        <div class="card-text text-heading">{{ \Illuminate\Support\Str::words($all_course->short_description, 6, '...') }}<a href="{{ route('frontend.master-classes.show', [$all_course, \Overtrue\Pinyin\Pinyin::permalink($all_course->title)]) }}" class="learn-more">{{ $contents->{'section_2_learn_' . $middleware_language} ?? $contents->section_2_learn_en }}</a></div>

                                        <div class="card-footer pt-2">
                                            <a href="{{ route('frontend.master-classes.show', [$all_course, \Overtrue\Pinyin\Pinyin::permalink($all_course->title)]) }}" class="enroll-button">
                                                <span class="pe-2">{{ $contents->{'section_2_enroll_' . $middleware_language} ?? $contents->section_2_enroll_en }}</span>
                                                <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon" width="15" height="15">
                                            </a>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="card-price-column">{{ $contents->{'section_2_price_' . $middleware_language} ?? $contents->section_2_price_en }}</div>
                                                <div class="card-price fs-31">{{ $currency_symbol }}{{ $all_course->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-data fs-31">{{ $contents->{'section_2_no_all_courses_' . $middleware_language} ?? $contents->section_2_no_all_courses_en }}</div>
                    @endif
                </div>

                {{ $all_courses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </section>

        @if($contents->section_3_title_en)
            <div class="container certification-section">
                <div class="text-center heading my-3">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</div>

                <div class="row gy-4 mx-0">
                    @if($contents->section_3_points_en)
                        @foreach(json_decode($contents->{'section_3_points_' . $middleware_language} ?? $contents->section_3_points_en) as $point)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="certification-card">
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $point->image) }}" alt="Certification Icon">
                                    <div class="sub-heading">{{ $point->description }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <!-- @if($contents->section_4_title_en)
            <div class="testimonial-container m-0">
                <div class="container py-5">
                    <div class="text-center">
                        <div class="mb-3 testimonial-heading heading">
                            {{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}
                        </div>
                        <b class="mb-3 testimonial-body sub-heading">
                            {{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}
                        </b>
                    </div>

                    <div class="row gy-4 pt-5 mx-0">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="student-video">
                                @if($contents->{'section_4_video_' . $middleware_language})
                                    <video controls class="responsive-video">
                                        <source src="{{ asset('storage/backend/pages/' . $contents->{'section_4_video_' . $middleware_language}) }}" type="video/mp4">
                                    </video>
                                @elseif($contents->section_4_video_en)
                                    <video controls class="responsive-video">
                                        <source src="{{ asset('storage/backend/pages/' . $contents->section_4_video_en) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="responsive-video">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 testimonials-wrapper">
                            @foreach($testimonials as $index => $testimonial)
                                <div class="testimonial {{ $index === 0 ? 'clear' : 'blurry' }}">
                                    
                                    <img src="{{ asset('storage/frontend/testimonial-quote.svg') }}" alt="Quote Icon" class="quote">

                                    <div class="fs-20">{{ $testimonial->content }}</div>

                                    <div class="author">
                                        @if($testimonial->image)
                                            <img src="{{ asset('storage/backend/testimonials/' . $testimonial->image) }}" alt="Author Picture">
                                        @else
                                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}">
                                        @endif
                                        
                                        <div>
                                            <div class="fs-16 mb-1">{{ $testimonial->name }}</div>
                                            <div class="fs-13 mb-1">{{ $testimonial->designation }}</div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
    </div> -->
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
    <!-- //     function rotateTestimonials() {
    //         const testimonials = document.querySelectorAll('.testimonial');
    //         const numberOfTestimonials = testimonials.length;
    //         let clearIndex = Array.from(testimonials).findIndex(t => t.classList.contains('clear'));

    //         if(clearIndex >= 0) {
    //             testimonials[clearIndex].classList.remove('clear');
    //             testimonials[clearIndex].classList.add('blurry');
    //         }

    //         const nextClearIndex = (clearIndex + 1) % numberOfTestimonials;
    //         testimonials[nextClearIndex].classList.add('clear');
    //         testimonials[nextClearIndex].classList.remove('blurry');

    //         testimonials.forEach((t, i) => {
    //             const diff = (i - nextClearIndex + numberOfTestimonials) % numberOfTestimonials;
    //             if(diff === 0) {
    //                 t.style.top = '50%';
    //                 t.style.transform = 'translateY(-50%)';
    //             }
    //             else if (diff === 1) {
    //                 t.style.top = '100%';
    //                 t.style.transform = 'translateY(-100%)';
    //             }
    //             else if (diff === 2) {
    //                 t.style.top = '0%';
    //                 t.style.transform = 'translateY(0)';
    //             }
    //         });
    //     }

    //     window.addEventListener('DOMContentLoaded', () => {
    //         setInterval(rotateTestimonials, 3000);
    //     }); -->
    
@endpush