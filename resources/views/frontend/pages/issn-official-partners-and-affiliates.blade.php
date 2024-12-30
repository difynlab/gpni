@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles') 
    <link rel="stylesheet" href="{{ asset('frontend/css/issn-official-partners-and-affiliates.css') }}">
@endpush

@section('content')

        @if($contents->section_1_title_en)
            <section class="container py-5">
                <h1 class="text-center mx-auto issn-heading">
                    {{ $contents->{'section_1_title_'. $middleware_language} ?? $contents->section_1_title_en }}
                </h1>

                <div class="partners-section container pt-3 pt-md-5 mt-3 mt-md-4">
                    <h2 class="fs-49  mb-3 mb-md-4">
                        {{ $contents->{'section_1_sub_title_'. $middleware_language} ?? $contents->section_1_sub_title_en }}
                    </h2>
                    <div class="fs-25  px-2 px-md-4 pt-2 pt-md-3">
                        {!! $contents->{'section_1_description_'. $middleware_language} ?? $contents->section_1_description_en
                        !!}
                    </div>

                    <div class="row py-md-5 py-2 gx-1 custom-row-gap">
                        <div class="row px-2 px-md-5 pb-3 pb-md-5 gx-2 gx-md-4 custom-row-gap">
                            @if(!$partners->isEmpty())
                            @foreach($partners as $partner)
                            <div class="col-6 col-md-3 pt-2 d-flex justify-content-center align-items-center">
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
            <section class="affiliates-section d-flex align-items-center py-4 py-md-5">
                <div class="container">
                    <div class="row g-4 image-content-container">
                        <div class="content col-12 col-lg-6 order-2 order-lg-1">
                            <h2 class="fs-49  mb-3 mb-md-4">
                                {{ $contents->{'section_2_title_'. $middleware_language} ?? $contents->section_2_title_en }}
                            </h2>
                            <div class="description-content fs-25">
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
            <section class="text-center py-4 py-md-5">
                <div class="container">
                    <h2 class="fs-49  mb-3 mb-md-4">
                        {{ $contents->{'section_3_title_'. $middleware_language} ?? $contents->section_3_title_en }}
                    </h2>
                    <div class="fs-25  text-subtitle text-center mx-auto mb-4">
                        {!! $contents->{'section_3_description_'. $middleware_language} ?? $contents->section_3_description_en
                        !!}
                    </div>

                    <div class="pt-3 pt-md-5 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                        <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_3_labels_links_en)[0]->link }}"
                            class="btn btn-primary btn-responsive fs-20 fs-md-16 fs-sm-13">
                            {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->label ??
                            json_decode($contents->section_3_labels_links_en)[0]->label }}
                        </a>

                        <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_3_labels_links_en)[1]->link }}"
                            class="btn sign-up-btn btn-responsive fs-20 fs-md-16 fs-sm-13 d-flex align-items-center justify-content-center">
                            {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->label ??
                            json_decode($contents->section_3_labels_links_en)[1]->label }}
                            <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Right" class="ms-2" />
                        </a>
                    </div>
                </div>
            </section>
        @endif

@endsection