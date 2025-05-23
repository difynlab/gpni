@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/conferences.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <div class="container py-5">
            <div class="heading">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</div>
            <div class="row card-container">
                @if($conferences->isNotEmpty())
                    @foreach($conferences as $conference)
                        <div class="col-12 col-md-6 mb-4">
                            <div class="conference-card">
                                <div class="text-section ">
                                    <div class="sub-heading text-truncate">{{ $conference->title }}</div>
                                    <div class="item">
                                        <div class="label fs-16">{{ $contents->{'date_' . $middleware_language} ?? $contents->date_en }}:</div>
                                        <div class="value fs-16">{{ $conference->date }}</div>
                                    </div>
                                    <div class="item">
                                        <div class="label fs-16">{{ $contents->{'venue_' . $middleware_language} ?? $contents->venue_en }}:</div>
                                        <div class="value fs-16 text-truncate">{{ $conference->where }}</div>
                                    </div>
                                </div>
                                <a href="{{ route('frontend.conferences.show', [$conference, \Overtrue\Pinyin\Pinyin::permalink($conference->title)]) }}" class="view-more fs-16">
                                    <span>{{ $contents->{'view_' . $middleware_language} ?? $contents->view_en }}</span>
                                    <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

@endsection