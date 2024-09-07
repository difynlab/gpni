@extends('frontend.layouts.app')

@section('title', 'History of GPNi')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/history-of-gpni.css') }}">
@endpush

@section('content')

    <!-- SECTION 01-->
    @if($contents->{'section_1_title_en'})
    <div class="section">
        <div class="text-container">
            <div class="since">
                @switch($language)
                    @case('en')
                        SINCE
                        @break
                    @case('zh')
                        自
                        @break
                    @case('ja')
                        以来
                        @break
                    @default
                        SINCE
                @endswitch
            <br>
                <div class="history">{{ $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} }}</div>2018
            </div>
        </div><br><br>
        <div class="image-container">
        @if($contents->{'section_1_image_' . $language})
             <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $language}) }}" alt="Since 2018" class="img-fluid">
        @elseif($contents->{'section_1_image_en'})
            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_en' . $language}) }}" alt="Since 2018" class="img-fluid">
        @else
            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Since 2018" class="img-fluid">
        @endif
        </div>
    </div>
    @endif
    <!-- END OF SECTION 01 -->

    <!-- SECTION 02-->
    @if($contents->{'section_2_title_en'})
        <div class="who-we-are">
            <h2 class="ff-poppins-medium fs-49">{{ $contents->{'section_2_title_' . $language} ?? $contents->{'section_2_title_en'} }}</h2>
            <h3 class="fs-31 ff-poppins-medium">{{ $contents->{'section_2_sub_title_' . $language} ?? $contents->{'section_2_sub_title_en'} }}</h3>
            <p class="fs-25 ff-poppins-regular">{!! $contents->{'section_2_description_' . $language} ?? $contents->{'section_2_description_en'} !!}</p>
        </div>
    @endif
    <!-- END OF SECTION 02 -->

    <!-- SECTION 03-->
    @if($contents->{'section_3_title_en'})
        <div class="our-story">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="pb-3 fs-49 ff-poppins-medium">{{ $contents->{'section_3_title_' . $language} ?? $contents->{'section_3_title_en'} }}</h2>
                        <p class="fs-25 ff-poppins-regular">{!! $contents->{'section_3_description_' . $language} ?? $contents->{'section_3_description_en'} !!}</p>
                    </div>
                    <div class="col-md-6">
                        @if($contents->{'section_3_image_' . $language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $language}) }}" alt="GPNI Image" class="img-fluid">
                        @elseif($contents->{'section_3_image_en'})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_en' . $language}) }}" alt="GPNI Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNI Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF SECTION 03 -->

    <!-- FOUNDERS SECTION -->
    @if($contents->{'section_3_title_en'}) <!-- there is no title for founder section, so section_3_title_en is used -->
        <div class="our-founders">
            <div class="container">
                <h2 class="fs-49 ff-poppins-medium">
                    @switch($language)
                        @case('en')
                            Our Founders
                            @break
                        @case('zh')
                            我们的创始人
                            @break
                        @case('ja')
                            私たちの創設者
                            @break
                        @default
                            Our Founders
                    @endswitch
                </h2>
                @foreach($advisoryBoard as $index => $boardMember)
                    <div class="row founder align-items-center">
                        @if($index % 2 == 0)
                            {{-- Left-aligned --}}
                            <div class="col-lg-2 text-center text-md-start">
                                <img src="{{ asset('storage/backend/persons/advisory-boards/'.$boardMember->image) }}" alt="{{ $boardMember->name }}" class="img-fluid">
                            </div>
                            <div class="col-lg-10 text-center text-md-start">
                                <h4 class="p-0 m-0 fs-31 ff-poppins-semibold">{{ $boardMember->name }}</h4>
                                <div class="title py-2 fs-20 ff-poppins-regular">{{ $boardMember->designations }}</div>
                                <p class="pt-3 fs-25">{!! $boardMember->description !!}</p>
                            </div>
                        @else
                            {{-- Right-aligned --}}
                            <div class="col-lg-10 text-center text-md-end order-2 order-md-1">
                                <h4 class="p-0 m-0 fs-31 ff-poppins-semibold">{{ $boardMember->name }}</h4>
                                <div class="title py-2 fs-20 ff-poppins-regular">{{ $boardMember->designations }}</div>
                                <p class="pt-3 fs-25">{!! $boardMember->description !!}</p>
                            </div>
                            <div class="col-lg-2 text-center text-md-start order-1 order-md-2">
                                <img src="{{ asset('storage/backend/persons/advisory-boards/'.$boardMember->image) }}" alt="{{ $boardMember->name }}" class="img-fluid">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <!-- END OF FOUNDERS SECTION -->

    <!-- SECTION 04-->
    @if($contents->{'section_4_title_en'})
        <div class="our-partners">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        @if($contents->{'section_4_image_' . $language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_' . $language}) }}"  alt="ISSN Logo" class="img-fluid">
                        @elseif($contents->{'section_4_image_en'})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_en' . $language}) }}" alt="ISSN Logo" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="ISSN Logo" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h2 class="fs-49 ff-poppins-medium">{{ $contents->{'section_4_title_' . $language} ?? $contents->{'section_4_title_en'} }}</h2>
                        <p class="fs-25 ff-poppins-regular">{!! $contents->{'section_4_description_' . $language} ?? $contents->{'section_4_description_en'} !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF SECTION 04 -->

    <!-- SECTION 05-->
    @if($contents->{'section_5_title_en'})
        <div class="gold-standard py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fs-49 ff-poppins-medium">{{ $contents->{'section_5_title_' . $language} ?? $contents->{'section_5_title_en'} }}</h2>
                        <p class="fs-25 ff-poppins-regular">{!! $contents->{'section_5_description_' . $language} ?? $contents->{'section_5_description_en'} !!}</p>
                    </div>
                    <div class="col-md-6">
                        @if($contents->{'section_5_image_' . $language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_' . $language}) }}" alt="Gold Standard Image" class="img-fluid">
                        @elseif($contents->{'section_5_image_en'})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_en' . $language}) }}" alt="Gold Standard Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Gold Standard Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- END OF SECTION 05 -->

@endsection