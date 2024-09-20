@extends('frontend.layouts.app')

@section('title', 'Why We Are Different')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/why_different.css') }}">
@endpush

@section('content')

<div id="navbar-placeholder"></div>

<!-- SECTION 01-->
@if($contents->{'section_1_title_en'})
    <div class="different-section">
        <div class="container">
            <h2>{{ $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} }}</h2>
            <div class="image-placeholder"></div>
            <p>{!! $contents->{'section_1_description_' . $language} ?? $contents->{'section_1_description_en'} !!}</p>
        </div>
    </div>
@endif
<!-- END OF SECTION 01 -->


<!-- SECTION 02-->
@if($contents->{'section_2_title_en'})
<div class="regions-languages-section">
        <div class="container">
            
            <!-- data added in the database wrapped with <p> tags for each paraghraps -->
            <h2>
                {!! strip_tags(explode('</p>', $contents->{'section_2_title_' . $language} ?? $contents->{'section_2_title_en'})[0]) !!}
            </h2>
            <p class="pt-3">
                {!! strip_tags(explode('</p>', $contents->{'section_2_title_' . $language} ?? $contents->{'section_2_title_en'})[1]) !!}
            </p>

            <!-- data added in the database in fully HTML format -->
            <div>
                {!! $contents->{'section_2_top_description_' . $language} ?? $contents->{'section_2_top_description_en'} !!}
            </div>

        </div>
    </div>
	
    <div class="language-offerings-section">
        <div class="container pt-3">
            <!-- data added in the database in fully HTML format -->
            {!! $contents->{'section_2_bottom_description_' . $language} ?? $contents->{'section_2_bottom_description_en'} !!}
        </div>
    </div>

@endif

@endsection