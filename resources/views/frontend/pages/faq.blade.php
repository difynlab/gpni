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
            <div class="faq-title heading">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</div>

            <div class="accordion pt-3" id="faqAccordion">
                @if($faqs->isNotEmpty())
                    @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <div class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button d-flex justify-content-center align-items-center collapsed text-heading" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </div>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-content">
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