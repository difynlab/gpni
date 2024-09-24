@extends('frontend.layouts.app')

@section('title', 'Membership')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/membership.css') }}">
@endpush

@section('content')

    <div class="container-fluid membership-section">
        
        <!-- SECTION 01-->
        @if($contents->{'section_1_title_en'})
        <h2 class="ff-poppins-medium fs-61">{{ $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} }}</h2>
        <p class="px-4 ff-poppins-regular fs-25 pt-2">{!! $contents->{'section_1_description_' . $language} ?? $contents->{'section_1_description_en'} !!}
        </p>
        @endif
        <!-- END OF SECTION 01-->

        <div class="row d-flex align-items-center py-4">
            
            <!-- SECTION 02-->
            <div class="col-12 col-md-6">
                @if($contents->{'section_2_image_' . $language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $language}) }}" alt="img-fluid">
                @elseif($contents->{'section_2_image_en'})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_en'}) }}" alt="img-fluid">
                @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="img-fluid">
                @endif
            </div>
            <div class="col-12 col-md-6 py-md-0 py-2">
                <div class="feature d-flex align-items-center mb-4">
                    <img src="/storage/frontend/charm-circle-tick-2.svg" alt="Tick Icon" class="feature-icon">
                    <div>
                        {!! $contents->{'section_2_top_description_' . $language} ?? $contents->{'section_2_top_description_en'} !!}
                    </div>
                </div>
                <div class="feature d-flex align-items-center">
                    <img src="/storage/frontend/charm-circle-tick-2.svg" alt="Tick Icon" class="feature-icon">
                    <div>
                        {!! $contents->{'section_2_bottom_description_' . $language} ?? $contents->{'section_2_bottom_description_en'} !!}
                    </div>
                </div>
            </div>
            <!-- END OF SECTION 02-->

            <!-- SECTION 03-->
            @if($contents->{'section_3_title_en'})
            <div class="benefits-section py-5">
                <h2 class="text-center mb-4 pt-3 fs-49 ff-poppins-medium">{!! $contents->{'section_3_title_' . $language} ?? $contents->{'section_3_title_en'} !!}</h2>
                <p class="text-center mb-5 fs-25 ff-poppins-regular">{!! $contents->{'section_3_description_' . $language} ?? $contents->{'section_3_description_en'} !!}</p>

                <!-- SAVED AS HTML CONTENT IN DATABASE -->
                <div class="accordion px-5" id="benefitsAccordion">
                    @foreach($membership_faqs as $membership_faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                {{ $membership_faq->question }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#benefitsAccordion">
                            <div class="accordion-body">
                                <ul>
                                {!! $membership_faq->answer !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <!-- END OF SECTION 03-->

            <!-- SECTION 04-->
            @if($contents->{'section_4_title_en'})
            <div class="container-fluid journey-section">
                <h2 class="fs-49 ff-poppins-medium">{!! $contents->{'section_4_title_' . $language} ?? $contents->{'section_4_title_en'} !!}</h2>
                <p class="fs-25 ff-poppins-regular">{!! $contents->{'section_4_description_' . $language} ?? $contents->{'section_4_description_en'} !!}</p>
                <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap">
                    <a href="#"
                        class="btn btn-secondary register-button fd-20 ff-poppins-medium mb-2 mb-md-0 me-md-3 py-3 px-5">Register
                        Now</a>
                    <a href="#" class="btn explore-lesson ff-poppins-medium fs-20 py-3 px-4">Explore more
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                            <path
                                d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z" />
                        </svg>
                    </a>
                </div>
            </div>
            @endif
            <!-- END OF SECTION 04-->

            <!-- SECTION 05-->
            @if($contents->{'section_5_title_en'})
            <div class="faq-section">
                <h2>{!! $contents->{'section_5_title_' . $language} ?? $contents->{'section_5_title_en'} !!}</h2>
                <p>{!! $contents->{'section_5_description_' . $language} ?? $contents->{'section_5_description_en'} !!}</p>

                <div class="accordion px-5" id="faqAccordion">
                    
                    @foreach($common_faqs as $common_faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                {{ $common_faq->question }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                            {!! $common_faq->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif
            <!-- END OF SECTION 05-->
        </div>
    </div>


@endsection