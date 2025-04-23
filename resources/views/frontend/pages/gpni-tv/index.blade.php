@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gpni-tv.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container gpni-container py-md-5 py-3">
            <x-frontend.notification></x-frontend.notification>

            <div class="row d-flex align-items-center">
                <div class="col-lg-7 mx-auto text-center text-lg-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                        <span class="rating me-2">{{ $contents->{'section_1_rating_title_' . $middleware_language} ?? $contents->section_1_rating_title_en }}</span>
                        
                        @if($contents->{'section_1_rating_' . $middleware_language})
                            @for($i = 1; $i <= $contents->{'section_1_rating_' . $middleware_language}; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        @elseif($contents->section_1_rating_en)
                            @for($i = 1; $i <= $contents->section_1_rating_en; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        @endif
                    </div>
                
                    <div class="heading mb-3">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>
                
                    <div class="section-1 text-main-heading text-main-content">{!! $contents->{'section_1_content_' . $middleware_language} ?? $contents->section_1_content_en !!}</div>
                </div>

                <div class="col-lg-5 text-lg-end">
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="GPNi-TV" class="img-fluid pt-lg-0 pt-3 hide-on-small">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="GPNi-TV" class="img-fluid pt-lg-0 pt-3 hide-on-small">
                    @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNi-TV" class="img-fluid pt-lg-0 pt-3 hide-on-small">
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if($small_courses->isNotEmpty())
        <div class="container">
            <div class="row g-3 mb-5 m-0">
                @foreach($small_courses as $small_course)
                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                        <div class="card h-100 mx-1">
                            <a href="{{ route('frontend.gpni-tv.show', [$small_course, \Overtrue\Pinyin\Pinyin::permalink($small_course->title)]) }}">
                                @if($small_course->image)
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $small_course->image) }}" class="card-img-top" alt="Card Image">
                                @else
                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="No Image" class="card-img-top">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $small_course->title }}</h5>
                                    <div class="card-price">{{ $contents->{'section_1_price_' . $middleware_language} ?? $contents->section_1_price_en }}: <span class="fw-bold">{{ $currency_symbol }}{{ $small_course->price }}</span></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $small_courses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="container-fluid summary-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <div class="heading text-white mb-3">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</div>
                    <div class="sub-heading mb-3">{{ $contents->{'section_2_sub_title_' . $middleware_language} ?? $contents->section_2_sub_title_en }}</div>
                </div>

                @if($recent_webinars->isNotEmpty())
                    @foreach($recent_webinars as $index => $recent_webinar)
                        <div class="row align-items-center mb-3">
                            <div class="col-md-5 text-center">
                                <video controls class="img-fluid video-container">
                                    <source src="{{ asset('storage/backend/webinars/' . $recent_webinar->video) }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-7">
                                <img src="{{ asset('storage/frontend/quote.svg') }}" alt="quote-icon" class="quote-icon">
                                <div class="speaker-text quote-heading text-heading text-content">{!! $recent_webinar->content !!}</div>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <div class="divider"></div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="container-fluid webinars-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <div class="heading mb-3">{!! $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en !!}</div>
                    <div class="sub-heading">
                    {!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-5 text-center mb-4 mb-lg-0">
                        @if($contents->{'section_3_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $middleware_language}) }}" alt="Global Experts" class="img-fluid">
                        @elseif($contents->section_3_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_3_image_en) }}" alt="Global Experts" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Global Experts" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="section-3 sub-heading text-start px-2 mb-3">{!! $contents->{'section_3_content_' . $middleware_language} ?? $contents->section_3_content_en !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="container-fluid Famous-Global-Speakers-Experts-section py-5">
            <div class="container">
                <div class="heading mb-3 text-white text-center">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</div>

                <div class="row justify-content-center section-4 text-main-heading text-main-content text-white">
                    {!! $contents->{'section_4_content_' . $middleware_language} ?? $contents->section_4_content_en !!}
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_content_en)
        <div class="container-fluid Webinar-Seminar-Key-Takeaways-section py-5 ">
            <div class="container">
                <div class="row g-5 d-flex">
                    <div class="col-md-6 section-5 text-main-heading text-main-content mb-3">
                        {!! $contents->{'section_5_content_' . $middleware_language} ?? $contents->section_5_content_en !!}
                    </div>
                    
                    <div class="col-md-6 text-center d-flex justify-content-center mt-0">
                        @if($contents->{'section_5_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_' . $middleware_language}) }}" alt="Webinar Image" class="img-fluid">
                        @elseif($contents->section_5_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_5_image_en) }}" alt="Webinar Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Webinar Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_6_content_en)
        <section class="learn-more-earn-more py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        @if($contents->{'section_6_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_' . $middleware_language}) }}" alt="On-Demand Benefits" class="img-fluid learn-more-image">
                        @elseif($contents->section_6_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_6_image_en) }}" alt="On-Demand Benefits" class="img-fluid learn-more-image">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid learn-more-image">
                        @endif
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center content-section text-main-heading text-main-content">
                        {!! $contents->{'section_6_content_' . $middleware_language} ?? $contents->section_6_content_en !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_7_content_en)
        <section class="learn-grow-career-business py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-0 d-flex flex-column justify-content-center section-7 text-main-heading text-main-content">
                        {!! $contents->{'section_7_content_' . $middleware_language} ?? $contents->section_7_content_en !!}
                    </div>
                    <div class="col-md-6 d-flex justify-content-center ">
                        @if($contents->{'section_7_video_' . $middleware_language})
                            <video controls class="img-fluid learn-grow-video">
                                <source src="{{ asset('storage/backend/pages/' . $contents->{'section_7_video_' . $middleware_language}) }}" type="video/mp4">
                            </video>
                        @elseif($contents->section_7_video_en)
                            <video controls class="img-fluid learn-grow-video">
                                <source src="{{ asset('storage/backend/pages/' . $contents->section_7_video_en) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid learn-grow-video">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_8_title_en)
        <section class="watch-anytime-anywhere py-5">
            <div class="container">
                <div class="heading mb-3 text-white text-center">{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}</div>
                
                <div class="section-8-content text-main-content text-white">{!! $contents->{'section_8_content_' . $middleware_language} ?? $contents->section_8_content_en !!}</div>  

                @guest
                    <div class="py-3">
                        <a href="{{ route('frontend.register') }}" class="btn-sign-up">
                            {{ $contents->{'section_8_label_' . $middleware_language} ?? $contents->section_8_label_link_en }}
                        </a>
                    </div>
                @endguest
            </div>
        </section>
    @endif

    @if($contents->section_9_title_en)
        <section class="previous-experts-seminars py-5">
            <div class="container">
                <div class="heading mb-3 text-center">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</div>

                <div class="section-9-content sub-heading">{!! $contents->{'section_9_content_' . $middleware_language} ?? $contents->section_9_content_en !!}</div>                
                @if($previous_webinars->isNotEmpty())
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($previous_webinars as $previous_webinar)
                                <div class="col-12 col-md-6 col-lg-3 mb-3">
                                    <video controls class="img-fluid">
                                        <source src="{{ asset('storage/backend/webinars/' . $previous_webinar->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($contents->section_10_content_en)
        <section class="special-offer-members py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        @if($contents->{'section_10_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_10_image_' . $middleware_language}) }}" alt="Special Offer" class="img-fluid">
                        @elseif($contents->section_10_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_10_image_en) }}" alt="Special Offer" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Special Offer" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3 text-main-heading text-main-content">
                        {!! $contents->{'section_10_content_' . $middleware_language} ?? $contents->section_10_content_en !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_11_title_en)
        <section class="contact-us py-5">
            <div class="container">
                <div class="heading">{{ $contents->{'section_11_title_' . $middleware_language} ?? $contents->section_11_title_en }}</div>
                <div class="sub-heading">{{ $contents->{'section_11_sub_title_' . $middleware_language} ?? $contents->section_11_sub_title_en }}</div>

                <div class="contact-us-icons">
                    <div class="row d-flex align-items-end">
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="mailto:{{ $settings->{'email_' . $middleware_language} ?? $settings->email_en }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('storage/frontend/email-gray.svg') }}" alt="Email Icon" class="img-fluid mb-2">
                                    <div>{{ $settings->{'email_' . $middleware_language} ?? $settings->email_en }}</div>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->{'instagram_' . $middleware_language} ?? $settings->instagram_en }}" class="text-decoration-none text-black" target="_blank">
                                    <img src="{{ asset('storage/frontend/instagram-gray.svg') }}" alt="Instagram Icon" class="img-fluid mb-2">
                                    <div>{{ $contents->{'section_11_instagram_' . $middleware_language} ?? $contents->section_11_instagram_en }}</div>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->{'twitter_' . $middleware_language} ?? $settings->twitter_en }}" class="text-decoration-none text-black" target="_blank">
                                    <img src="{{ asset('storage/frontend/twitter-gray.svg') }}" alt="Twitter Icon" class="img-fluid mb-2">
                                    <div>{{ $contents->{'section_11_twitter_' . $middleware_language} ?? $contents->section_11_twitter_en }}</div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->{'linkedin_' . $middleware_language} ?? $settings->linkedin_en }}" class="text-decoration-none text-black" target="_blank">
                                    <img src="{{ asset('storage/frontend/linkedin-gray.svg') }}" alt="LinkedIn Icon" class="img-fluid mb-2">
                                    <div>{{ $contents->{'section_11_linkedin_' . $middleware_language} ?? $contents->section_11_linkedin_en }}</div>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->{'youtube_' . $middleware_language} ?? $settings->youtube_en }}" class="text-decoration-none text-black" target="_blank">
                                    <img src="{{ asset('storage/frontend/youtube-gray.svg') }}" alt="Youtube Icon" class="img-fluid mb-2">
                                    <div>{{ $contents->{'section_11_youtube_' . $middleware_language} ?? $contents->section_11_youtube_en }}</div>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->{'fb_' . $middleware_language} ?? $settings->fb_en }}" class="text-decoration-none text-black" target="_blank">
                                    <img src="{{ asset('storage/frontend/facebook-gray.svg') }}" alt="Facebook Icon" class="img-fluid mb-2">
                                    <div>{{ $contents->{'section_11_facebook_' . $middleware_language} ?? $contents->section_11_facebook_en }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="newsletter mt-4">
                    <div class="mb-3 fs-20" style="color: #000;">{{ $contents->{'section_11_message_' . $middleware_language} ?? $contents->section_11_message_en }}</div>
                    
                    <form action="{{ route('frontend.subscription') }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="d-flex flex-md-row justify-content-center align-items-center">
                                        <input type="email" class="form-control" name="email" placeholder="{{ $contents->{'section_11_placeholder_' . $middleware_language} ?? $contents->section_11_placeholder_en }}" required>
                                        <button class="btn btn-primary ml-md-2">{{ $contents->{'section_11_button_' . $middleware_language} ?? $contents->section_11_button_en }}</button>
                                    </div>
                                    <x-frontend.input-error field="email"></x-frontend.input-error>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif

@endsection