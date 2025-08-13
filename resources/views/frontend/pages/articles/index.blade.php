@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/articles.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container pt-5">
            <x-frontend.notification></x-frontend.notification>

            <div class="all-articles-heading heading">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>

            <div class="video-section my-4">
                <div class="row">
                    <div class="video-placeholder">
                        @if($contents->{'section_1_video_' . $middleware_language})
                            <video src="{{ asset('storage/backend/pages/' . $contents->{'section_1_video_' . $middleware_language} ?? '') }}" 
                                autoplay 
                                muted 
                                loop 
                                playsinline 
                                controls 
                                class="w-100">
                            </video>
                        @elseif($contents->section_1_video_en)
                            <video src="{{ asset('storage/backend/pages/' . $contents->section_1_video_en ?? '') }}" 
                                autoplay 
                                muted 
                                loop 
                                playsinline 
                                controls 
                                class="w-100">
                            </video>
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="img-fluid w-100" alt="Header Image">
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <ul class="nav" role="tablist">
                        <li class="nav-item m-0" role="presentation">
                            <button class="nav-link category fs-20 active" id="latest-articles-tab" data-bs-toggle="tab"
                                data-bs-target="#latest-articles-tab-pane" type="button" role="tab"
                                aria-controls="latest-articles-tab-pane" aria-selected="true">{{ $contents->{'section_1_first_tab_' . $middleware_language} ?? $contents->section_1_first_tab_en }}</button>
                        </li>
                        <li class="nav-item my-0 ms-md-5 ms-3" role="presentation">
                            <button class="nav-link category fs-20" id="recommended-tab" data-bs-toggle="tab"
                                data-bs-target="#recommended-tab-pane" type="button" role="tab"
                                aria-controls="recommended-tab-pane" aria-selected="false">{{ $contents->{'section_1_second_tab_' . $middleware_language} ?? $contents->section_1_second_tab_en }}</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="latest-articles-tab-pane" role="tabpanel"
                            aria-labelledby="latest-articles-tab" tabindex="0">
                            <div class="row">
                                @if($articles->isNotEmpty())
                                    @foreach($articles as $article)
                                        <div class="col-md-6 col-sm-12 my-3 card-wrapper">
                                            <div class="card shadow-none border-0">
                                                <div class="position-relative">
                                                    <a href="{{ route('frontend.articles.show', [$article, \Overtrue\Pinyin\Pinyin::permalink($article->title)]) }}">
                                                        @if($article->thumbnail)
                                                            <img src="{{ asset('storage/backend/articles/articles/'. $article->thumbnail) }}"
                                                                alt="Main Image" class="img-fluid article-image">
                                                        @else
                                                            <img src="{{ asset('storage/backend/main/'. App\Models\Setting::find(1)->no_image) }}"
                                                                alt="Main Image" class="img-fluid article-image">
                                                        @endif
                                                    </a>
                                                    <div class="share-icon position-absolute">
                                                        <button class="btn btn-light" onclick="shareContent('{{ $article->title }}', '{{ asset('storage/backend/articles/articles/'. $article->thumbnail) }}')">
                                                            <img src="{{ asset('storage/frontend/share-icon.svg') }}" alt="Share Icon">
                                                        </button>
                                                    </div>
                                                </div>
                                        
                                                <div>
                                                    <div class="header-metadata mb-2 fs-13 pt-3">
                                                        <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Icon" class="icon mr-2">
                                                        <span class="custom-text-muted date-meta fs-13">{{ $article->created_at->format('d M, Y') }}</span>
                                                        <div class="divider">|</div>
                                                        <span class="custom-text-muted fs-13">{{ App\Models\ArticleCategory::find($article->article_category_id)->name }}</span>
                                                    </div>
                                                    <a href="{{ route('frontend.articles.show', [$article, \Overtrue\Pinyin\Pinyin::permalink($article->title)]) }}" class="text-decoration-none">
                                                        <div class="text-primary-title text-heading mb-2 title-clamp">{{ $article->title }}</div>
                                                    </a>
                                                    <div class="text-content card-text mb-3 line-clamp-3">{{ $article->short_description }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            {{ $articles->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                        </div>

                        <div class="tab-pane fade" id="recommended-tab-pane" role="tabpanel" aria-labelledby="recommended-tab"
                            tabindex="0">
                            <div class="row">
                                @if($recommended_articles->isNotEmpty())
                                    @foreach($recommended_articles as $recommended_article)
                                        <div class="col-md-6 col-sm-12 my-3 card-wrapper">
                                            <div class="card shadow-none border-0">
                                                <div class="position-relative">
                                                    <a href="{{ route('frontend.articles.show', [$recommended_article, \Overtrue\Pinyin\Pinyin::permalink($recommended_article->title)]) }}">
                                                        @if($recommended_article->thumbnail)
                                                        <img src="{{ asset('storage/backend/articles/articles/'. $recommended_article->thumbnail) }}"
                                                            alt="Main Image" class="img-fluid article-image">
                                                        @else
                                                        <img src="{{ asset('storage/backend/main/'. App\Models\Setting::find(1)->no_image) }}"
                                                            alt="Main Image" class="img-fluid article-image">
                                                        @endif
                                                    </a>
                                                    <div class="share-icon position-absolute">
                                                        <button class="btn btn-light" onclick="shareContent('{{ $recommended_article->title }}', '{{ asset('storage/backend/articles/articles/'. $recommended_article->thumbnail) }}')">
                                                            <img src="{{ asset('storage/frontend/share-icon.svg') }}" alt="Share Icon">
                                                        </button>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="header-metadata mb-2 fs-13 pt-3">
                                                        <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Icon" class="icon mr-2">
                                                        <span class="custom-text-muted date-meta fs-13">{{ $recommended_article->created_at->format('d M, Y') }}</span>
                                                        <div class="divider">|</div>
                                                        <span class="custom-text-muted fs-13">{{ App\Models\ArticleCategory::find($recommended_article->article_category_id)->name }}</span>
                                                    </div>

                                                    <a href="{{ route('frontend.articles.show', [$recommended_article, \Overtrue\Pinyin\Pinyin::permalink($recommended_article->title)]) }}" class="text-decoration-none">
                                                        <div class="text-primary-title fs-22 mb-2 title-clamp">{{ $recommended_article->title }}</div>
                                                    </a>

                                                    <div class="fs-16 card-text mb-4 line-clamp-3">{{ $recommended_article->short_description }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            {{ $recommended_articles->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 ps-md-4 px-3">
                    <div class="trending-articles-section">
                        <div class="fs-20 trending-article-title py-2 fw-bold">{{ $contents->{'section_1_trend_' . $middleware_language} ?? $contents->section_1_trend_en }}</div>

                        @if($trending_articles->isNotEmpty())
                            @foreach($trending_articles as $trending_article)
                                <a href="{{ route('frontend.articles.show', [$trending_article, \Overtrue\Pinyin\Pinyin::permalink($trending_article->title)]) }}" class="text-decoration-none">
                                    <div class="trending-article">
                                        <div class="row g-3 w-100">
                                            <div class="col-4 col-lg-6">
                                                @if($trending_article->thumbnail)
                                                    <img src="{{ asset('storage/backend/articles/articles/' . $trending_article->thumbnail) }}" alt="Trending Image" class="img-fluid object-fit-cover">
                                                @else
                                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Trending Image" class="img-fluid object-fit-cover">
                                                @endif
                                            </div>
                                            <div class="col-8 col-lg-6">
                                                <div class="trending-content">
                                                    <div class="trending-content-title title-clamp fs-18">{{ $trending_article->title }}
                                                    </div>

                                                    <div class="line-clamp-2 trending-content-description fs-16">{{ $trending_article->short_description }}</div>

                                                    <div
                                                        class="date-and-read d-flex justify-content-between align-items-center flex-wrap gap-2 mt-2">
                                                        <!-- Date -->
                                                        <span class="small text-muted">{{ $trending_article->created_at->format('M d,Y')
                                                            }}</span>

                                                        <!-- Reading time -->
                                                        @if($trending_article->reading_time)
                                                        <span class="small time-read d-flex align-items-center gap-1">
                                                            <img src="{{ asset('storage/frontend/clock.svg') }}" alt="Clock"
                                                                class="read-icon" style="width: 12px; height: 12px;">
                                                            <span class="d-inline-block">{{ $trending_article->reading_time }}</span>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>

                    <div class="find-us-on d-flex flex-column align-items-lg-start align-items-center">
                        <div class="title fs-16 text-lg-start text-center fw-bold">
                            {{ $contents->{'section_1_social_title_' . $middleware_language} ??
                            $contents->section_1_social_title_en }}
                        </div>
                        <div class="social-icons d-flex justify-content-lg-start justify-content-center gap-4">
                            <a href="{{ $settings->fb }}">
                                <img src="{{ asset('storage/frontend/facebook-article.png') }}" alt="Facebook">
                            </a>
                            <a href="{{ $settings->linkedin }}">
                                <img src="{{ asset('storage/frontend/linkedin-icon.svg') }}" alt="LinkedIn">
                            </a>
                            <a href="{{ $settings->youtube }}">
                                <img src="{{ asset('storage/frontend/youtube-icon.svg') }}" alt="YouTube">
                            </a>
                        </div>
                    </div>

                    <div class="subscribe fs-16 d-flex flex-column align-items-lg-start align-items-center">
                        <div class="fs-18 text-lg-start text-center w-100 fw-bold mb-3">
                            {{ $contents->{'section_1_newsletter_title_' . $middleware_language} ??
                            $contents->section_1_newsletter_title_en }}</div>

                        <div class="fs-16 text-lg-start text-center w-100 mb-3">
                            {{ $contents->{'section_1_newsletter_description_' . $middleware_language} ??
                            $contents->section_1_newsletter_description_en }}</div>

                        <form id="myForm" class="subscribe-form-article" action="{{ route('frontend.subscription') }}" method="POST">
                            @csrf
                            <input type="email" class="fs-16 ps-3 " name="email" placeholder="{{ $contents->{'section_1_newsletter_placeholder_' . $middleware_language} ?? $contents->section_1_newsletter_placeholder_en }}" required>
                            <button type="button" class="m-2" id="submitBtn">{{ $contents->{'section_1_newsletter_button_' . $middleware_language} ?? $contents->section_1_newsletter_button_en }}</button>

                            <div style="display:none;">
                                <div class="h-captcha" data-sitekey="{{ config('services.hcaptcha.sitekey') }}" data-callback="onHcaptchaSuccess"></div>
                            </div>
                        </form>

                        <x-frontend.input-error field="email"></x-frontend.input-error>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="instagram-section container-fluid px-3 px-md-4 py-5">
            <div class="heading mb-3">{{ $contents->{'section_2_title_' . $middleware_language} ??
                $contents->section_2_title_en }}</div>

            <div class="sub-heading mb-4 mb-md-5">{{ $contents->{'section_2_description_' . $middleware_language} ??
                $contents->section_2_description_en }}</div>

            <div class="instagram-images row g-3 justify-content-center">
                <div class="col-6 col-sm-6 col-md-3">
                    <img src="{{ asset('storage/frontend/follow-us-on-1.jpg') }}" alt="Instagram post 1"
                        class="img-fluid w-100 h-100 object-fit-cover">
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    <img src="{{ asset('storage/frontend/follow-us-on-2.jpg') }}" alt="Instagram post 2"
                        class="img-fluid w-100 h-100 object-fit-cover">
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    <img src="{{ asset('storage/frontend/follow-us-on-3.jpg') }}" alt="Instagram post 3"
                        class="img-fluid w-100 h-100 object-fit-cover">
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    <img src="{{ asset('storage/frontend/follow-us-on-4.jpg') }}" alt="Instagram post 4"
                        class="img-fluid w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    @endif

@endsection

@push('after-scripts')
    <script>
        function shareContent(title, imagePath) {
            if(navigator.share) {
                navigator.share({
                    title: title,
                    text: `Check out this article: ${title}`,
                    url: window.location.href,
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(err => {
                    console.error('Error sharing:', err);
                });
            } else {
                const shareUrl = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`Check out this article: ${title}`);
                const twitterUrl = `https://twitter.com/intent/tweet?url=${shareUrl}&text=${text}`;
                window.open(twitterUrl, '_blank');
            }
        }
    </script>

    <script>
        const submitBtn = document.getElementById('submitBtn');
        const form = document.getElementById('myForm');

        submitBtn.addEventListener('click', function () {
            if(!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            submitBtn.disabled = true;

            hcaptcha.execute();
        });

        function onHcaptchaSuccess(token) {
            form.submit();
        }
    </script>
@endpush