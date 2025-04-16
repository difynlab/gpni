@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/history-of-gpni.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="section container-fluid p-0">
            <div class="text-container">
                <div class="since">
                    {{ $contents->{'section_1_large_title_' . $middleware_language} ?? $contents->section_1_large_title_en }}

                    <br>

                    <div class="history">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>
                    
                    {{ $contents->{'section_1_year_' . $middleware_language} ?? $contents->section_1_year_en }}
                </div>
            </div>

            <div class="image-container">
                @if($contents->{'section_1_image_' . $middleware_language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Section 1 Image" class="img-fluid">
                @elseif($contents->section_1_image_en)
                    <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Section 1 Image" class="img-fluid">
                @else
                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="No Image" class="img-fluid">
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="who-we-are py-md-5 py-3">
            <div class="container">
                <div class="heading">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</div>

                <div class="ff-poppins-medium fs-31">{{ $contents->{'section_2_sub_title_' . $middleware_language} ?? $contents->section_2_sub_title_en }}</div>

                <div class="sub-heading ">{{ $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en }}</div>
            </div>
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="our-story py-md-5 py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading text-center text-md-start text-white ff-poppins-medium mb-3">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</div>
                        <div class="sub-heading text-center text-md-start ff-poppins-regular">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>
                    </div>
                    <div class="col-md-6">
                        @if($contents->{'section_3_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $middleware_language}) }}" alt="GPNI Image" class="img-fluid">
                        @elseif($contents->section_3_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_3_image_en) }}" alt="GPNI Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNI Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="our-founders py-md-5 py-3">
            <div class="container">
                <div class="heading ff-poppins-medium text-center text-lg-end mb-3">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</div>

                @if($our_founders->isNotEmpty())
                    @foreach($our_founders as $key => $our_founder)
                        <div class="row founder align-items-center">
                            @if($key == 0)
                                <div class="col-lg-2 text-center">
                                    <img src="{{ asset('storage/backend/persons/our-founders/' . $our_founder->image) }}" alt="{{ $our_founder->name }}" class="img-fluid">
                                </div>
                                <div class="col-lg-10 text-center text-md-start">
                                    <div class="p-0 m-0 sub-heading ff-poppins-semibold">{{ $our_founder->name }}</div>
                                    <div class="title text-heading ff-poppins-regular">{{ $our_founder->designations }}</div>
                                    <div class="pt-3 text-content text-center text-md-start">{!! $our_founder->description !!}</div>
                                </div>
                            @else
                                <div class="col-lg-10 text-center text-md-end order-2 order-md-1">
                                    <div class="p-0 m-0 sub-heading ff-poppins-semibold">{{ $our_founder->name }}</div>
                                    <div class="title text-heading ff-poppins-regular">{{ $our_founder->designations }}</div>
                                    <div class="pt-3 text-content text-center text-md-end">{!! $our_founder->description !!}</div>
                                </div>
                                <div class="col-lg-2 text-center order-1 order-md-2">
                                    <img src="{{ asset('storage/backend/persons/our-founders/' . $our_founder->image) }}" alt="{{ $our_founder->name }}" class="img-fluid">
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
    
    @if($contents->section_5_title_en)
        <div class="our-partners py-md-5 py-3" style="background-color: #0040C3;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        @if($contents->{'section_5_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_' . $middleware_language}) }}"  alt="Section 05 Image" class="img-fluid">
                        @elseif($contents->section_5_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_5_image_en) }}" alt="Section 05 Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Section 05 Image" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6  ">
                        <div class="heading text-white ff-poppins-medium">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</div>
                        <div class="sub-heading ff-poppins-regular">{!! $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_6_title_en)
        <div class="gold-standard py-md-5 py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="heading ff-poppins-medium">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</div>
                        <div class="sub-heading ff-poppins-regular">{!! $contents->{'section_6_description_' . $middleware_language} ?? $contents->section_6_description_en !!}</div>
                    </div>
                    <div class="col-lg-6">
                        @if($contents->{'section_6_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_' . $middleware_language}) }}" alt="Section 06 Image" class="img-fluid">
                        @elseif($contents->section_6_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_6_image_en) }}" alt="Section 06 Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Section 06 Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection