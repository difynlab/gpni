@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' ? $contents->{'page_name_' .
    $middleware_language} : $contents->page_name_en)

    @push('after-styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/why-we-are-different.css') }}">
    @endpush

@section('content')

    @if ($contents->section_1_title_en)
        <div class="different-section px-4 py-5">
            <div class="container">
                <div class="heading">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>
                <div class="image-placeholder">
                    @if ($contents->{'section_1_video_' . $middleware_language})
                        <video
                            src="{{ asset('storage/backend/pages/' . $contents->{'section_1_video_' . $middleware_language} ?? '') }}"
                            controls class="w-100"></video>
                    @elseif($contents->section_1_video_en)
                        <video src="{{ asset('storage/backend/pages/' . $contents->section_1_video_en ?? '') }}" controls
                            class="w-100"></video>
                    @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}"
                            class="w-100" alt="Header Image">
                    @endif
                </div>
                <div class="text-main-content text-start">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}</div>
            </div>
        </div>
    @endif

    @if ($contents->section_2_title_en)
        <div class="regions-languages-section"
            style="background-image: url({{ asset('storage/backend/pages/' . ($contents->{'section_2_image_' . $middleware_language} ?? $contents->section_2_image_en)) }}); background-size: cover;">
            <div class="container">
                <div class="heading text-white text-center">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</div>

                <div class="sub-heading text-white">{!! $contents->{'section_2_top_description_' . $middleware_language} ?? $contents->section_2_top_description_en !!}</div>
            </div>
        </div>

        <div class="language-offerings-section py-5">
            <div class="container text-main-content pt-3">{!! $contents->{'section_2_bottom_description_' . $middleware_language} ??
                $contents->section_2_bottom_description_en !!}</div>
        </div>
    @endif

@endsection
