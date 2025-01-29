@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/our-policies.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <div class="container py-5 policies-section">
            <h2>{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h2>
            <div class="text-center fs-20">{!! $contents->{'description_' . $middleware_language} ?? $contents->description_en !!}</div>

            @if($policy_categories->isNotEmpty())
                <ul class="nav nav-tabs justify-content-center pt-5" id="policiesTabs" role="tablist">
                    @foreach($policy_categories as $key => $policy_category)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="{{ $policy_category->id }}-tab" data-bs-toggle="tab" href="#{{ $policy_category->id }}" role="tab" aria-controls="{{ Str::slug($policy_category->name) }}" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                {{ $policy_category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                
                <div class="tab-content" id="policiesTabsContent">
                    @foreach($policy_categories as $key => $policy_category)
                        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ $policy_category->id }}" role="tabpanel" aria-labelledby="{{ $policy_category->id }}-tab">
                            <div class="accordion pt-5" id="{{ $policy_category->id }}Accordion">
                                @foreach($policies->where('policy_category_id', $policy_category->id) as $policy)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $policy->id }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $policy->id }}" aria-expanded="false" aria-controls="collapse{{ $policy->id }}">
                                                {{ $policy->title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $policy->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $policy->id }}" data-bs-parent="#{{ $policy_category->id }}Accordion">
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
            @endif
        </div>
    @endif


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="assets/Screenshot 2025-01-15 191040.png" alt="Profile Image" class="img-fluid">
            </div>
            <div class="col-md-4 text-center">
                <img src="assets/Screenshot 2025-01-15 191057.png" alt="Profile Image" class="img-fluid">
            </div>
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/150" alt="Quality Assurance" class="img-fluid">
            </div>
        </div>

        <div class="mt-5 policies-section">
            <p>Students are required to obtain 10 Continued Education Credits (CEC) every 2 years to remain qualified and eligible for the PNE Level-1 + SNS and PNE Level-2 Masters + CISSN International certifications.</p>

            <h5>CEC Points Policy Table</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Detailed Description</th>
                        <th>CEC Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Continued Education Course (SNC)</td>
                        <td>Sports Nutrition Coach (SNC ©) certificate continued education programs at or above 12 hours in length.</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Sports Nutrition Coach (SNC ©) certificate continued education programs at or above 8 hours in length.</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>Seminars & Online Talks</td>
                        <td>On-demand seminars by the ISSN® or GPNi®. Four hours to one full day in length – each day.</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>GPNi® Membership</td>
                        <td>Every active year of membership</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>ISSN “Live Conferences”</td>
                        <td>Online and offline seminars “live” with the ISSN® at or above 4 hours to 1 full day in length – each day.</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Books & Products</td>
                        <td>Books & approved resource products</td>
                        <td>2-3</td>
                    </tr>
                    <tr>
                        <td>Online Tests & Exams</td>
                        <td>Online tests and exams</td>
                        <td>3-5</td>
                    </tr>
                </tbody>
            </table>

            <p>To submit your Continued Education approval please email to <a href="mailto:edu@gpni.fit">edu@gpni.fit</a> or submit directly through your GPNi online Student Centre.</p>
        </div>
    </div>
@endsection