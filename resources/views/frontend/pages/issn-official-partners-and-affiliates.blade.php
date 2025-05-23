@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles') 
    <link rel="stylesheet" href="{{ asset('frontend/css/issn-official-partners-and-affiliates.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <section class="container pt-5">
            <div class="text-center mx-auto issn-heading heading">
                {{ $contents->{'section_1_title_'. $middleware_language} ?? $contents->section_1_title_en }}
            </div>

            <div class="partners-section container">
                <div class="fs-31 mb-3">
                    {{ $contents->{'section_1_sub_title_'. $middleware_language} ?? $contents->section_1_sub_title_en }}
                </div>
                <div class="sub-heading px-2 px-md-4 pt-2">
                    {!! $contents->{'section_1_description_'. $middleware_language} ?? $contents->section_1_description_en
                    !!}
                </div>

                <div class="row py-md-5 py-2 gx-1 custom-row-gap">
                    <div class="row px-2 px-md-5 pb-3 pb-md-5 gx-2 gx-md-4 custom-row-gap">
                        @if(!$partners->isEmpty())
                        @foreach($partners as $partner)
                        <div class="col-6 col-md-3 pt-2 d-flex justify-content-center a+gn-items-center">
                            <img src="{{ asset('storage/backend/persons/issn-partners/' . $partner->image) }}"
                                alt="Partner Logo" class="partner-images img-fluid">
                        </div>
                        @endforeach
                        @else
                        <div class="col-6 col-md-3 pt-2 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}"
                                alt="No Image" class="partner-images img-fluid">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_2_title_en)
        <section class="affiliates-section d-flex align-items-center py-md-5">
            <div class="container">
                <div class="row g-4 image-content-container">
                    <div class="content col-12 col-lg-6 order-2 order-lg-1">
                        <div class="heading text-white mb-3">
                            {{ $contents->{'section_2_title_'. $middleware_language} ?? $contents->section_2_title_en }}
                        </div>
                        <div class="description-content sub-heading text-white">
                            {!! $contents->{'section_2_description_'. $middleware_language} ??
                            $contents->section_2_description_en !!}
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-1 order-lg-2 d-flex justify-content-center align-items-center">
                        @if($contents->{'section_2_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}"
                            alt="Affiliates Image" class="image img-fluid">
                        @elseif($contents->section_2_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}"
                            alt="Affiliates Image" class="image img-fluid">
                        @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}"
                            alt="Affiliates Image" class="image img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_3_title_en)
        <section class="text-center py-5 py-md-5">
            <div class="container">
                <div class="heading mb-3">
                    {{ $contents->{'section_3_title_'. $middleware_language} ?? $contents->section_3_title_en }}
                </div>
                <div class="sub-heading text-subtitle text-center mx-auto mb-4">
                    {!! $contents->{'section_3_description_'. $middleware_language} ?? $contents->section_3_description_en
                    !!}
                </div>

                <div class="pt-3 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                    @guest
                        <a href="{{ route('frontend.register') }}"
                            class="btn btn-primary btn-responsive fs-20">
                            {{ $contents->{'section_3_label_' . $middleware_language} ?? $contents->section_3_label_link_en }}
                        </a>
                    @endguest

                    <a href="{{ json_decode($contents->{'section_3_label_link_' . $middleware_language})->link ?? json_decode($contents->section_3_label_link_en)->link }}"
                        class="btn sign-up-btn btn-responsive fs-18 d-flex align-items-center justify-content-center">
                        {{ json_decode($contents->{'section_3_label_link_' . $middleware_language})->label ?? json_decode($contents->section_3_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Right" class="ms-2" />
                    </a>
                </div>
            </div>
        </section>
    @endif

@endsection