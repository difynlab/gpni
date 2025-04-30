@extends('frontend.layouts.app')

@section('title', $contents->{'single_article_page_name_' . $middleware_language} ?? $contents->single_article_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endpush

@section('content')

    <div class="container article-main-container mb-5">
        <x-frontend.notification></x-frontend.notification>

        <div class="main-content row">
            <div class="col-xl-8 col-lg-7">
                <div class="content-wrapper mt-5">
                    <div class="header-metadata mt-2">
                        <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Calendar Icon" class="icon">
                        <span class="custom-text-muted date-meta fs-13">{{ $article->created_at->format('d M,Y') }}</span>
                    </div>

                    <div class="heading pt-2">{{ $article->title }}</div>

                    <div class="content-section text-content">
                        <div>{!! $article->content !!}</div>
                    </div>

                    <div class="share-article-section mt-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <span class="me-2 share-text">{{ $contents->{'section_1_share_article_' . $middleware_language} ?? $contents->section_1_share_article_en }}</span>
                            <div class="social-share-icons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="me-2">
                                    <img src="{{ asset('storage/frontend/facebook-article.png') }}" alt="Facebook" width="30">
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" target="_blank" class="me-2">
                                    <img src="{{ asset('storage/frontend/twitter-article.png') }}" alt="Twitter" width="30">
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($article->title) }}" target="_blank">
                                    <img src="{{ asset('storage/frontend/linkedin-article.png') }}" alt="LinkedIn" width="30">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="article-navigation-links mt-4">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('frontend.articles.show', [$previous_article, \Overtrue\Pinyin\Pinyin::permalink($previous_article->title)]) }}" class="navigation-link prev-link">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/frontend/left-arrow.png') }}" alt="Previous Arrow">
                                    <span class="navigation-text">{{ $contents->{'section_1_previous_' . $middleware_language} ?? $contents->section_1_previous_en }}</span>
                                </div>
                            </a>
                            <a href="{{ route('frontend.articles.show', [$next_article, \Overtrue\Pinyin\Pinyin::permalink($next_article->title)]) }}" class="navigation-link next-link">
                                <div class="d-flex align-items-center">
                                    <span class="navigation-text">{{ $contents->{'section_1_next_' . $middleware_language} ?? $contents->section_1_next_en }}</span>
                                    <img src="{{ asset('storage/frontend/right-arrow.png') }}" alt="Next Arrow">
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- <div class="mt-4 fs-16 author-title text-center text-md-start">{{ $contents->{'single_article_author_' . $middleware_language} ?? $contents->single_article_author_en }}</div>

                    <div
                        class="d-flex mt-1 flex-column flex-md-row align-items-center align-items-md-start text-center text-md-start">
                        @if($article->author_image)
                        <img src="{{ asset('storage/backend/articles/author-images/' . $article->author_image) }}"
                            alt="User" class="rounded-circle img-fluid mx-auto mx-md-0" style="width:60px; height:60px;">
                        @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}"
                            alt="Main Image" class="rounded-circle img-fluid mx-auto mx-md-0"
                            style="width:60px; height:60px;">
                        @endif

                        <div class="ps-0 ps-md-3 mt-3 mt-md-0">
                            <div class="username mb-1 fs-16">{{ $article->author_name }}</div>
                            <div class="mb-0 fs-13">{{ $article->author_designation }}</div>
                            <div class="mb-0 fs-12">{{ $article->author_description }}</div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="sidebar mt-5 ps-md-4 px-3">
                    <a href="{{ route('frontend.gift-cards.index') }}">
                        <img src="{{ asset('storage/frontend/banner.svg') }}" alt="Banner" class="img-fluid mb-4 banner-section w-100">
                    </a>

                    <div class="fs-20 latest-article-title py-2">{{ $contents->{'section_1_first_tab_' . $middleware_language} ?? $contents->section_1_first_tab_en }}</div>
                    <div class="latest-articles-section">
                        @if($latest_articles->isNotEmpty())
                            @foreach($latest_articles as $latest_article)
                                <a href="{{ route('frontend.articles.show', [$latest_article, \Overtrue\Pinyin\Pinyin::permalink($latest_article->title)]) }}" class="text-decoration-none">
                                    <div class="article-container">
                                        <div class="row g-3 w-100">
                                            <div class="col-4 col-lg-6">
                                                @if($latest_article->thumbnail)
                                                <img src="{{ asset('storage/backend/articles/articles/'. $latest_article->thumbnail) }}"
                                                    alt="Main Image" class="img-fluid object-fit-cover">
                                                @else
                                                <img src="{{ asset('storage/backend/main/'. App\Models\Setting::find(1)->no_image) }}"
                                                    alt="Trending Image" class="img-fluid object-fit-cover">
                                                @endif
                                            </div>
                                            <div class="col-8 col-lg-6">
                                                <div class="article-details">
                                                    <div class="article-title fs-16 title-clamp">{{ $latest_article->title }}</div>
                                                    <div class="line-clamp-2 fs-16">
                                                        {!! strip_tags($latest_article->content) !!}
                                                    </div>
                                                    <div
                                                        class="date-and-read d-flex justify-content-between align-items-center flex-wrap gap-2 mt-2 mt-md-3">
                                                        <span class="small text-muted">{{ $latest_article->created_at->format('M
                                                            d,Y')
                                                            }}</span>
                                                        @if($latest_article->reading_time)
                                                        <span class="small time-read d-flex align-items-center gap-1">
                                                            <img src="{{ asset('storage/frontend/clock.svg') }}" alt="Clock"
                                                                class="read-icon" style="width: 12px; height: 12px;">
                                                            <span class="d-inline-block">{{ $latest_article->reading_time }}</span>
                                                        </span> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>

                    <div class="find-us-on d-flex flex-column align-items-lg-start align-items-center mt-4">
                        <div class="title fs-16 text-lg-start text-center fw-bold">
                            {{ $contents->{'section_1_social_title_' . $middleware_language} ??
                            $contents->section_1_social_title_en }}
                        </div>
                        <div class="social-icons d-flex justify-content-lg-start justify-content-center gap-4">
                            <a href="{{ $settings->fb }}">
                                <img src="{{ asset('/storage/frontend/facebook-article.png') }}" alt="Facebook">
                            </a>
                            <a href="{{ $settings->linkedin }}">
                                <img src="{{ asset('storage/frontend/linkedin-icon.svg') }}" alt="LinkedIn">
                            </a>
                            <a href="{{ $settings->youtube }}">
                                <img src="{{ asset('storage/frontend/youtube-icon.svg') }}" alt="YouTube">
                            </a>
                        </div>
                    </div>

                    <div class="subscribe fs-18 d-flex flex-column align-items-lg-start align-items-center">
                        <div class="fs-16 text-lg-start text-center w-100 mb-3 fw-bold">
                            {{ $contents->{'section_1_newsletter_title_' . $middleware_language} ??
                            $contents->section_1_newsletter_title_en }}</div>

                        <div class="fs-16 text-lg-start text-center w-100 mb-3">
                            {{ $contents->{'section_1_newsletter_description_' . $middleware_language} ??
                            $contents->section_1_newsletter_description_en }}</div>

                        <form class="subscribe-form-article" action="{{ route('frontend.subscription') }}" method="POST">
                            @csrf
                            <input type="email" class="fs-16 ps-3" name="email" placeholder="{{ $contents->{'section_1_newsletter_placeholder_' . $middleware_language} ?? $contents->section_1_newsletter_placeholder_en }}" required>
                            <button type="submit" class="m-2">{{ $contents->{'section_1_newsletter_button_' . $middleware_language} ?? $contents->section_1_newsletter_button_en }}</button>
                        </form>

                        <x-frontend.input-error field="email"></x-frontend.input-error>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="text-center mb-5">
                <div class="heading">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</div>
            </div>

            <div class="row d-flex justify-content-center">
                @foreach($you_like_articles as $you_like_article)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <a href="{{ route('frontend.articles.show', [$you_like_article, \Overtrue\Pinyin\Pinyin::permalink($you_like_article->title)]) }}">
                            <div class="article-item-we-might-also-like">
                                <div class="article-category">
                                    <span>{{ App\Models\ArticleCategory::find($you_like_article->article_category_id)->name }}</span>
                                </div>

                                @if($you_like_article->thumbnail)
                                    <img src="{{ asset('storage/backend/articles/articles/'. $you_like_article->thumbnail) }}" alt="Article Image" class="article-img">
                                @else
                                    <img src="{{ asset('storage/backend/main/'. App\Models\Setting::find(1)->no_image) }}" alt="Article Image" class="article-image">
                                @endif

                                <div class="article-content">
                                    <div class="article-title-we-might-also-like text-heading">{{ $you_like_article->title }}</div>
                                    <div class="text-content card-text-article">{{ $you_like_article->short_description }}</div>
                                </div>
                                
                                <div class="article-date-we-might-also-like">
                                    <small>{{ $you_like_article->created_at->format('M d, Y') }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection