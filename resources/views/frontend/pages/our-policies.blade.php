@extends('frontend.layouts.app')

@section('title', 'Our Policies')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/our-policies.css') }}">
@endpush

@section('content')

    @if($contents->{'title_en'})
        <div class="container policies-section">
            <h2>{{ $contents->{'title_' . $language} ?? $contents->{'title_en'} }}</h2>
            <p>{!! $contents->{'description_' . $language} ?? $contents->{'description_en'} !!}</p>

            <ul class="nav nav-tabs justify-content-center pt-5" id="policiesTabs" role="tablist">
                @foreach($policy_categories as $key => $category)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="{{ $category->name }}-tab" data-bs-toggle="tab" href="#{{ Str::slug($category->name) }}" role="tab" aria-controls="{{ Str::slug($category->name) }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <div class="tab-content" id="policiesTabsContent">
                @foreach($policy_categories as $key => $category)
                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ Str::slug($category->name) }}" role="tabpanel" aria-labelledby="{{ Str::slug($category->name) }}-tab">
                        <div class="accordion pt-5" id="{{ Str::slug($category->name) }}Accordion">
                            @foreach($policies->where('policy_category_id', $category->id) as $policy)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $policy->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $policy->id }}" aria-expanded="false" aria-controls="collapse{{ $policy->id }}">
                                            {{ $policy->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $policy->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $policy->id }}" data-bs-parent="#{{ Str::slug($category->name) }}Accordion">
                                        <div class="accordion-body">
                                            {!! $policy->content !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection