@extends('frontend.layouts.app')

@section('title', $contents->{'single_tv_page_name_' . $middleware_language} ?? $contents->single_tv_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/small-course.css') }}">
@endpush

@section('content')

    <x-frontend.notification-popup></x-frontend.notification-popup>

    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-12">
                <h1 class="course-title">{{ $course->title }}</h1>
            </div>
        </div>

        <div class="row mb-4 mb-lg-5">
            <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                @if($course->image)
                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" class="course-image" alt="Card Image">
                @else
                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" class="course-image" alt="No Image">
                @endif
            </div>

            <div class="col-12 col-lg-7">
                <div class="text-content">
                    {!! $course->course_introduction !!}
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(auth()->check())
                    @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                        <button type="submit" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'already_purchased_' . $middleware_language} ?? $contents->already_purchased_en }}</button>
                    @else
                        <button type="button" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;" data-bs-toggle="modal" data-bs-target="#purchaseModal">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</button>

                        <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content order-details">
                                    <div class="modal-body">
                                        <form action="{{ route('frontend.gpni-tv.checkout') }}" method="POST">
                                            @csrf
                                            <h6 class="title">{{ $contents->{'order_details_' . $middleware_language} ?? $contents->order_details_en }}</h6>

                                            <div class="d-flex justify-content-between section-subtitle">
                                                <div>{{ $contents->{'course_' . $middleware_language} ?? $contents->course_en }}</div>
                                                <div>{{ $contents->{'amount_' . $middleware_language} ?? $contents->amount_en }}</div>
                                            </div>

                                            <div class="d-flex justify-content-between section-order">
                                                <div class="modal-course">{{ $course->title }}</div> 
                                                <div class="modal-amount">{{ $course->price }}</div>
                                            </div>

                                            <div class="line"></div>

                                            <div class="d-flex justify-content-between section-total">
                                                <div>{{ $contents->{'total_' . $middleware_language} ?? $contents->total_en }}</div>
                                                <div class="modal-amount">{{ $course->price }}</div>
                                            </div>

                                            <div class="coupon-div">
                                                <input type="text" class="form-control coupon-code" placeholder="{{ $contents->{'coupon_code_' . $middleware_language} ?? $contents->coupon_code_en }}" name="coupon_code" value="{{ old('coupon_code') }}">
                                                <x-frontend.input-error field="coupon_code"></x-frontend.input-error>
                                            </div>

                                            <input type="hidden" name="course_name" value="{{ $course->title }}">
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <input type="hidden" name="payment_mode" value="payment">
                                            <input type="hidden" name="price" value="{{ $course->price }}">

                                            <button type="submit" class="btn pay-now">{{ $contents->{'pay_now_' . $middleware_language} ?? $contents->pay_now_en }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <a href="{{ route('frontend.gpni-tv.enroll', $course->id) }}" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</a>
                @endif
            </div>
        </div>
    </div>

@endsection