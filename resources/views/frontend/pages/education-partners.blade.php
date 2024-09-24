@extends('frontend.layouts.app')

@section('title', 'Education Partners')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/education-partners.css') }}">
@endpush

@section('content')

    
    <!-- SECTION 01-->
    @if($contents->{'section_1_title_en'})
        <!-- Global Education Partners Section -->
        <section class="global-education-partners py-5 my-5">
            <div class="container text-center">
                <h2 class="section-title mb-4">{{ $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} }}</h2>
            </div>
        </section>

        <!-- Continued Education Partners Section -->
        <section class="education-partners py-5">
            <div class="container text-center">
                <h2 class="section-title mb-4">{{ $contents->{'section_1_sub_title_' . $language} ?? $contents->{'section_1_sub_title_en'} }}</h2>
                <p class="mb-5">{!! $contents->{'section_1_description_' . $language} ?? $contents->{'section_1_description_en'} !!}</p>
                <div class="partner-logos">
                    <div class="row justify-content-center mb-5">
                        <div class="col-6 col-md-3">
                            <img src="/storage/frontend/globalimage1.png" alt="ACE Approved" class="img-fluid">
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="/storage/frontend/globalimage2.png" alt="NSCA CEU Approved" class="img-fluid">
                        </div>
                        <div class="col-6 col-md-2 middle-alignment">
                            <img src="/storage/frontend/globalimage3.png" alt="Physical Activity Australia" class="img-fluid">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-3">
                            <img src="/storage/frontend/globalimage4.png" alt="AFAA Approved Provider" class="img-fluid">
                        </div>
                        <div class="col-6 col-md-3">
                            <img src="/storage/frontend/globalimage5.png" alt="NASM Approved Provider" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- END OF SECTION 01-->
    
    <!-- SECTION 02-->
    @if($contents->{'section_2_title_en'})
    <!-- Education Table Section -->
    <section class="education-table py-5">
    <div class="container text-center">
        <h2 class="section-title">{{ $contents->section_2_title_en }}</h2>
        <table>
            <thead>
                <tr>
                    <th>{{ $contents->section_2_first_column_title_en }}</th>
                    <th>{{ $contents->section_2_second_column_title_en }}</th>
                    <th>{{ $contents->section_2_third_column_title_en }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($points_data as $data)
                    <tr>
                        <td class="white-text">{{ $data->partner_name }}</td>
                        <td class="white-text">{{ $data->course_name }}</td>
                        <td class="white-text points-column">{{ $data->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>  
    @endif
    <!-- END OF SECTION 02-->

    <!-- SECTION 03-->
    @if($contents->{'section_3_title_en'})
    <!-- Language Partners Section -->
    <section class="language-partners py-5">
        <div class="container text-center">
            <h2 class="section-title">{{ $contents->{'section_3_title_' . $language} ?? $contents->{'section_3_title_en'} }}</h2>
            <p class="mb-5">{!! $contents->{'section_3_description_' . $language} ?? $contents->{'section_3_description_en'} !!}</p>
            <h3 class="sub-title">{{ $contents->{'section_3_sub_title_' . $language} ?? $contents->{'section_3_sub_title_en'} }}</h3>

            <div class="language-cards">
                @foreach($languages as $lang)
                    <div class="language-card" tabindex="0">
                        <p>{{ $contents->{'section_3_language_title_' . $language} ?? $contents->section_3_language_title_en }}</p>
                        <h3>{{ $lang }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 03-->

    <!-- SECTION 04-->
    @if($contents->{'section_4_title_en'})
        <!-- Journey Start Section -->
        <section class="journey-start py-5">
            <div class="container">
                <h2 class="section-title">{{ $contents->{'section_4_title_' . $language} ?? $contents->{'section_4_title_en'} }}</h2>
                <p class="section-subtitle">{{ $contents->{'section_4_description_' . $language} ?? $contents->{'section_4_description_en'} }}</p>

                <!-- Button with dynamic label and link -->
                <button class="signup-btn" 
                    onclick="window.location.href='{{ $label_link_data->link ?? url('/signup') }}'">
                    {{ $label_link_data->label ?? 'Sign Up Now' }}
                </button>
            </div>
        </section>
    @endif
    <!-- END OF SECTION 04-->

    <!-- SECTION 05-->
    @if($contents->{'section_5_title_en'})
        <!-- Other Education Partners Section -->
        <section class="other-education-partners py-5">
            <div class="container text-center">
                <h2 class="section-title mb-4">{{ $contents->{'section_5_title_' . $language} ?? $contents->{'section_5_title_en'} }}</h2>
                <p class="section-subtitle mb-5">{!! $contents->{'section_5_description_' . $language} ?? $contents->{'section_5_description_en'} !!}</p>
                
                @foreach($decoded_partner_points as $point)
                    <div class="partner-card">
                        <img src="{{ asset('storage/backend/pages/' . $point->image) }}" alt="Partner Logo" class="partner-logo" />
                        <div class="partner-info">
                            {!! $point->content !!}
                        </div>
                    </div>
                    <hr class="hr-divider" />
                @endforeach
            </div>
        </section>
    @endif
    <!-- END OF SECTION 04-->



@endsection