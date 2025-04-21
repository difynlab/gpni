@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)
 
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/insurance-and-professional-membership.css') }}">
@endpush

@section('content')
    @if($contents->section_1_title_en)
        <div class="container bg-white section py-md-5 py-4">
            <div class="heading text-center mx-auto">
                {{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}
            </div>
            <div class="row align-items-center g-0 mt-3">
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}"
                            alt="Cover image" class="img-fluid img-fluid-custom">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Cover image"
                            class="img-fluid img-fluid-custom">
                    @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Cover image"
                            class="img-fluid img-fluid-custom">
                    @endif
                </div>
                <div class="col-md-6 content-text sub-heading px-4">
                    {!! $contents->{'section_1_content_' . $middleware_language} ?? $contents->section_1_content_en !!}
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_content_en)
        <div class="container-fluid section approve-section approve-section-background">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-7 text-main-heading text-main-content text-white">
                        {!! $contents->{'section_2_content_' . $middleware_language} ?? $contents->section_2_content_en !!}
                    </div>
                    <div class="col-md-5 text-center">
                        @if($contents->{'section_2_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}"
                                alt="Certified" class="img-fluid img-approved">
                        @elseif($contents->section_2_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" alt="Certified"
                                class="img-fluid img-approved">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}"
                                alt="Certified" class="img-fluid img-approved">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_3_content_en)
        <div class="container bg-white section py-5">
            <div class="content-text text-main-content px-md-0 px-4">
                {!! $contents->{'section_3_content_' . $middleware_language} ?? $contents->section_3_content_en !!}
            </div>
        </div>
    @endif

    @if($contents->section_4_content_en)
        <div class="container-fluid section approve-section-background">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        @if($contents->{'section_4_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_' . $middleware_language}) }}"
                                alt="Importance of insurance" class="img-fluid img-fluid-custom">
                        @elseif($contents->section_4_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_4_image_en) }}"
                                alt="Importance of insurance" class="img-fluid img-fluid-custom">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}"
                                alt="Importance of insurance" class="img-fluid img-fluid-custom">
                        @endif
                    </div>
                    <div class="col-md-6 text-white text-main-heading text-main-content mb-3">
                        {!! $contents->{'section_4_content_' . $middleware_language} ?? $contents->section_4_content_en !!}
                    </div>
                </div>

                <div class="highlight-box mt-4">
                    <div class="responsive-text text-main-heading text-main-content">
                        {!! $contents->{'section_4_sub_content_' . $middleware_language} ?? $contents->section_4_sub_content_en !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_content_en)
        <div class="container bg-white section py-5">
            <div class="content-text px-4 px-md-0 text-main-content responsive-content">
                {!! $contents->{'section_5_content_' . $middleware_language} ?? $contents->section_5_content_en !!}
            </div>
        </div>
    @endif

@endsection