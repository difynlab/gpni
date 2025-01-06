@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/faq.css') }}">
@endpush

@section('content')

    <div class="container py-5 faq-container">
        @if($contents->title_en)
            <div class="faq-title fs-61">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</div>

            <div class="accordion pt-5" id="faqAccordion">
                @if($faqs->isNotEmpty())
                    @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button d-flex justify-content-center align-items-center collapsed fs-25" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body fs-25">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>

@endsection