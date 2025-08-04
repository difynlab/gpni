@extends('frontend.layouts.app')

@section('title', $contents->{'single_tv_page_name_' . $middleware_language} ?? $contents->single_tv_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/small-course.css') }}">
@endpush

@section('content')

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
                        <form action="{{ route('frontend.gpni-tv.checkout') }}" id="autoEnrollForm" method="POST">
                            @csrf
                            <input type="hidden" name="course_name" value="{{ $course->title }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="payment_mode" value="payment">
                            <input type="hidden" name="price" value="{{ $course->price }}">

                            <button type="submit" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('frontend.gpni-tv.enroll', $course->id) }}" class="btn btn-primary btn-block w-100" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</a>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    @if(session('auto_enroll_course_id') == $course->id)
        <script>
            $(document).ready(function () {
                $('#autoEnrollForm').submit();
            });
        </script>
    @endif
@endpush