@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/membership.css') }}">
@endpush

@section('content')

    <div class="membership-section pt-5">
        <div class="container">
            <x-frontend.notification></x-frontend.notification>
            <x-frontend.notification-popup></x-frontend.notification-popup>

            @if($contents->section_1_title_en)
                <div class="heading text-center mb-3">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>
                <div class="ff-poppins-regular sub-heading pt-2 text-center">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}
                </div>
            @endif

            <div class="row d-flex align-items-center py-4 py-md-4 py-2 mx-md-0 mx-0">
                <div class="col-12 col-md-6">
                    @if($contents->{'section_2_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}" class="img-fluid">
                    @elseif($contents->section_2_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="img-fluid">
                    @endif
                </div>

                @if($contents->section_2_top_description_en)
                    <div class="col-12 col-md-6 py-md-0 py-3">
                        @if($contents->section_2_top_description_en)
                            <div class="feature d-flex align-items-center mb-md-4 mb-3">
                                <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick Icon" class="feature-icon">
                                <div class="text-heading text-content">
                                    {!! $contents->{'section_2_top_description_' . $middleware_language} ?? $contents->section_2_top_description_en !!}
                                </div>
                            </div>
                        @endif

                        @if($contents->section_2_bottom_description_en)
                            <div class="feature d-flex align-items-center">
                                <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick Icon" class="feature-icon">
                                <div class="text-heading text-content">
                                    {!! $contents->{'section_2_bottom_description_' . $middleware_language} ?? $contents->section_2_bottom_description_en !!}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
                
            @if($contents->section_3_title_en)
                <div class="benefits-section py-5 mx-md-0 mx-0">
                    <div class="text-center heading mb-3">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</div>
                    <div class="text-center mb-md-5 mb-3 sub-heading">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>
                    <div class="membership-buttons">
                        @if(auth()->check())
                            @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name))
                                @if(hasUserPurchasedMembership(auth()->user()->id))
                                    <button class="btn-pay-now fs-sm-16">{{ $contents->{'section_3_already_purchased_' . $middleware_language} ?? $contents->section_3_already_purchased_en }}</button>
                                @else
                                    <div class="w-100 d-flex flex-column flex-md-row align-items-center justify-content-center">
                                        <button type="button" class="btn-pay-now blue-button btn-pay-now-modal" data-value="Lifetime" data-type="{{ $contents->{'section_3_lifetime_proceed_' . $middleware_language} ?? $contents->section_3_lifetime_proceed_en }}" data-amount="{{ $currency_symbol }}{{ $lifetime_membership_price }}" data-bs-toggle="modal" data-bs-target="#purchaseModal">{{ $contents->{'section_3_lifetime_proceed_' . $middleware_language} ?? $contents->section_3_lifetime_proceed_en }} {{ $currency_symbol }}{{ $lifetime_membership_price }}</button>

                                        <button type="button" class="btn-pay-now blue-button btn-pay-now-modal" data-value="Annual" data-type="{{ $contents->{'section_3_annual_proceed_' . $middleware_language} ?? $contents->section_3_annual_proceed_en }}" data-amount="{{ $currency_symbol }}{{ $annual_membership_price }}" data-bs-toggle="modal" data-bs-target="#purchaseModal">{{ $contents->{'section_3_annual_proceed_' . $middleware_language} ?? $contents->section_3_annual_proceed_en }} {{ $currency_symbol }}{{ $annual_membership_price }}</button>
                                    </div>
                                    
                                    <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content order-details">
                                                <div class="modal-body">
                                                    <form action="{{ route('frontend.memberships.checkout') }}" method="POST">
                                                        @csrf
                                                        <h6 class="title">{{ $contents->{'section_3_order_details_' . $middleware_language} ?? $contents->section_3_order_details_en }}</h6>

                                                        <div class="d-flex justify-content-between section-subtitle">
                                                            <div>{{ $contents->{'section_3_type_' . $middleware_language} ?? $contents->section_3_type_en }}</div>
                                                            <div>{{ $contents->{'section_3_amount_' . $middleware_language} ?? $contents->section_3_amount_en }}</div>
                                                        </div>

                                                        <div class="d-flex justify-content-between section-order">
                                                            <div class="modal-type"></div> 
                                                            <div class="modal-amount"></div>
                                                        </div>

                                                        <div class="line"></div>

                                                        <div class="d-flex justify-content-between section-total">
                                                            <div>{{ $contents->{'section_3_total_' . $middleware_language} ?? $contents->section_3_total_en }}</div>
                                                            <div class="modal-amount"></div>
                                                        </div>

                                                        <div class="coupon-div">
                                                            <input type="text" class="form-control coupon-code" placeholder="{{ $contents->{'section_3_coupon_code_' . $middleware_language} ?? $contents->section_3_coupon_code_en }}" name="coupon_code" value="{{ old('coupon_code') }}">
                                                            <x-frontend.input-error field="coupon_code"></x-frontend.input-error>
                                                        </div>

                                                        <input type="hidden" name="type" class="modal-hidden-type">

                                                        <button type="submit" class="btn pay-now">{{ $contents->{'section_3_pay_now_' . $middleware_language} ?? $contents->section_3_pay_now_en }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <button class="btn-pay-now fs-sm-16">{{ $contents->{'section_3_change_language_' . $middleware_language} ?? $contents->section_3_change_language_en }}</button>
                            @endif
                        @else
                            <div class="w-100 d-flex flex-column flex-md-row align-items-center justify-content-center">
                                <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn-pay-now blue-button">{{ $contents->{'section_3_lifetime_proceed_' . $middleware_language} ?? $contents->section_3_lifetime_proceed_en }} {{ $currency_symbol }}{{ $lifetime_membership_price }}</a>

                                <button type="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn-pay-now blue-button">{{ $contents->{'section_3_annual_proceed_' . $middleware_language} ?? $contents->section_3_annual_proceed_en }} {{ $currency_symbol }}{{ $annual_membership_price }}</button>
                            </div>
                        @endif
                    </div>

                    @if($contents->section_3_labels_contents_en)
                        <div class="accordion px-md-4 px-2" id="benefitsAccordion">
                            @foreach(json_decode($contents->{'section_3_labels_contents_' . $middleware_language} ?? $contents->section_3_labels_contents_en) as $key => $label_content)
                                <div class="accordion-item">
                                    <div class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button collapsed text-heading" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}"> {{ $label_content->title }}</button>
                                    </div>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#benefitsAccordion">
                                        <div class="accordion-body text-content">
                                            <div>{!! $label_content->content !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>

        @if($contents->section_4_title_en)
            <div class="container-fluid journey-section mx-0 py-5">

                <div class="heading text-white">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</div>

                <div class="sub-heading text-white">{!! $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en !!}</div>

                <div class="pt-md-3 pt-2 d-flex justify-content-center align-items-center flex-wrap flex-column flex-md-row">
                    @guest
                        <a href="{{ route('frontend.register') }}" class="btn btn-secondary register-button white-button mb-3 mb-md-0 me-md-3 py-md-3 py-2 px-md-5 px-3">{{ $contents->{'section_4_label_' . $middleware_language} ?? $contents->section_4_label_link_en }}</a>
                    @endguest

                    <a href="{{ json_decode($contents->{'section_4_label_link_' . $middleware_language})->link ?? json_decode($contents->section_4_label_link_en)->link }}" class="btn explore-lesson other-white-button  py-md-3 py-2 px-md-4 px-3">
                        {{ json_decode($contents->{'section_4_label_link_' . $middleware_language})->label ?? json_decode($contents->section_4_label_link_en)->label }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ms-1">
                            <path d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z" />
                        </svg>
                    </a>
                </div>
            </div>
        @endif
    </div>

@endsection

@push('after-scripts')
    <script>
        $('.btn-pay-now-modal').on('click', function() {
            let value = $(this).attr('data-value');
            let type = $(this).attr('data-type');
            let amount = $(this).attr('data-amount');

            $('#purchaseModal').find('.modal-type').html(type);
            $('#purchaseModal').find('.modal-amount').html(amount);
            $('#purchaseModal').find('.modal-hidden-type').val(value);
        });
    </script>
@endpush