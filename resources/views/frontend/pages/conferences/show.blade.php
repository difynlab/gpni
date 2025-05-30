@extends('frontend.layouts.app')

@section('title', $contents->{'single_conference_page_name_' . $middleware_language} ?? $contents->single_conference_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/conference.css') }}">
@endpush

@section('content')
    <div class="container py-5 conference-container">
        <div class="main-container">
            <x-frontend.notification></x-frontend.notification>

            <section class="container-shadow">
                <a href="{{ route('frontend.conferences.index') }}" class="return-link">
                    <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                    {{ $contents->{'back_' . $middleware_language} ?? $contents->back_en }}
                </a>

                <div class="event-title-wrapper text-center">
                    <div class="title-container mobile-full-width">
                        <div class="event-title-container mobile-full-width">
                            <div class="event-title heading mobile-title">
                                <span>{{ $conference->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container-shadow">
                <div class="table-container d-flex justify-content-center">
                    <img src="{{ asset('storage/frontend/conference-image.png') }}" alt="Conference Image" class="img-fluid">
                </div>

                <div class="event-info-container">
                    <div class="event-info-row row mx-0">
                        <div class="event-info-title title-column col-12 col-md-4 text-heading">{{ $contents->{'date_' . $middleware_language} ?? $contents->date_en }}</div>
                        <div class="event-info-value col-12 col-md-8 text-heading">{{ $conference->date }}</div>
                    </div>
                    <div class="event-info-row row mx-0">
                        <div class="event-info-title title-column col-12 col-md-4 text-heading">{{ $contents->{'where_' . $middleware_language} ?? $contents->where_en }}</div>
                        <div class="event-info-value col-12 col-md-8 text-heading">{{ $conference->where }}</div>
                    </div>
                    <div class="event-info-row row mx-0">
                        <div class="event-info-title event-info-warning-title title-column col-12 col-md-4 text-heading">{{ $contents->{'early_registration_deadline_' . $middleware_language} ?? $contents->early_registration_deadline_en }}</div>
                        <div class="event-info-value event-info-warning-value col-12 col-md-8 fs-20">{{ $conference->early_registration_deadline }}</div>
                    </div>

                    @if($conference->more_details)
                        @foreach(json_decode($conference->more_details) as $more_detail)
                            <div class="event-info-row row mx-0">
                                <div class="event-info-title title-column col-12 col-md-4 text-heading">{{ $more_detail->title }}</div>
                                <div class="event-info-value col-12 col-md-8 text-heading">{{ $more_detail->value }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>

            @if($conference->price_details)
                <section class="container-shadow">
                    <div class="price-details">
                        <div class="mb-4 heading">{{ $contents->{'price_details_' . $middleware_language} ?? $contents->price_details_en }}</div>

                        <div class="table-responsive">
                            <table class="price-table table text-heading text-content">
                                <thead>
                                    <tr>
                                        <th>{{ $contents->{'member_type_' . $middleware_language} ?? $contents->member_type_en }}</th>
                                        <th>{{ $contents->{'early_registration_price_' . $middleware_language} ?? $contents->early_registration_price_en }}</th>
                                        <th>{{ $contents->{'regular_registration_price_' . $middleware_language} ?? $contents->regular_registration_price_en }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(json_decode($conference->price_details) as $price_detail)
                                        <tr>
                                            <td>{{ $price_detail->member_type }}</td>
                                            <td>{{ $price_detail->early_registration_price }}</td>
                                            <td>{{ $price_detail->regular_registration_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            @endif

            <section class="container-shadow">
                <div class="get-in-touch-header heading">{{ $contents->{'get_in_touch_' . $middleware_language} ?? $contents->get_in_touch_en }}</div>

                <div class="form-container">
                    <form action="{{ route('frontend.contact-us.store') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="first-name" class="required text-heading">{{ $contents->{'first_name_' . $middleware_language} ?? $contents->first_name_en }}</label>
                                <input type="text" class="form-control" id="first-name" name="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last-name" class="required text-heading">{{ $contents->{'last_name_' . $middleware_language} ?? $contents->last_name_en }}</label>
                                <input type="text" class="form-control" id="last-name" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="email" class="required text-heading">{{ $contents->{'email_' . $middleware_language} ?? $contents->email_en }}</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="required text-heading">{{ $contents->{'phone_' . $middleware_language} ?? $contents->phone_en }}</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="form-group col-md-12 reason-group">
                                <label for="question" class="required text-heading">{{ $contents->{'question_' . $middleware_language} ?? $contents->question_en }}</label>
                                <input type="text" class="form-control" id="question" name="question" required>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="form-group col-md-12 comments-group">
                                <label for="comments" class="required text-heading">{{ $contents->{'comments_' . $middleware_language} ?? $contents->comments_en }}</label>
                                <textarea class="form-control form-textarea" id="comments" rows="4" name="comments" required></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-submit btn-responsive fs-18">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                        </div>
                    </form>
                </div>

                <!-- <div class="contact-info text-center">
                    <div class="contact-info-row row">
                        <div class="info-item col-md-6">
                            <div class="icon-background">
                                <img src="{{ asset('storage/frontend/email.svg') }}" alt="Email Icon">
                            </div>
                            <div class="info-item-content text-truncate">
                                <div class="title fs-20">{{ $contents->{'contact_email_' . $middleware_language} ?? $contents->contact_email_en }}</div>
                                <div class="info fs-16">{{ $settings->email }}</div>
                            </div>
                        </div>
                        <div class="info-item col-md-6">
                            <div class="icon-background">
                                <img src="{{ asset('storage/frontend/phone.svg') }}" alt="Phone Icon">
                            </div>
                            <div class="info-item-content text-truncate">
                                <div class="title fs-20">{{ $contents->{'contact_whatsapp_' . $middleware_language} ?? $contents->contact_whatsapp_en }}</div>
                                <div class="info fs-16">{{ $settings->whatsapp }}</div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </section>
        </div>
    </div>
@endsection

@push('after-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleColumns = document.querySelectorAll('.title-column');
    let maxWidth = 0;
    
    // Find the widest title
    titleColumns.forEach(column => {
        const width = column.offsetWidth;
        maxWidth = Math.max(maxWidth, width);
    });
    
    // Set all title columns to the same width
    titleColumns.forEach(column => {
        column.style.width = `${maxWidth}px`;
    });
});
</script>
@endpush