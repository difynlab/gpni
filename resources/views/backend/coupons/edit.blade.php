@extends('backend.layouts.app')

@section('title', 'Edit Coupon')

@section('content')
    <x-backend.breadcrumb page_name="Edit Coupon"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.coupons.update', $coupon) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Coupon Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $coupon->title) }}" placeholder="Title">
                        <x-backend.input-error field="title"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="code" class="form-label">Code<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $coupon->code) }}" placeholder="Code">
                        <x-backend.input-error field="code"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="English" {{ old('language', $coupon->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $coupon->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $coupon->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="coupon_for" class="form-label">Coupon For<span class="asterisk">*</span></label>
                        <select class="form-control form-select" name="coupon_for" id="coupon_for" required>
                            <option value="">Select coupon for</option>
                            <option value="Course Purchase" {{ old('type', $coupon->coupon_for) == 'Course Purchase' ? 'selected' : '' }}>Course Purchase</option>
                            <option value="Membership Purchase" {{ old('type', $coupon->coupon_for) == 'Membership Purchase' ? 'selected' : '' }}>Membership Purchase</option>
                            <option value="Product Purchase" {{ old('type', $coupon->coupon_for) == 'Product Purchase' ? 'selected' : '' }}>Product Purchase</option>
                            <option value="Already Purchased Course" {{ old('type', $coupon->coupon_for) == 'Already Purchased Course' ? 'selected' : '' }}>Already Purchased Course</option>
                        </select>
                        <x-backend.input-error field="coupon_for"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="coupon_type" class="form-label">Coupon Type<span class="asterisk">*</span></label>
                        <select class="form-control form-select" name="coupon_type" id="coupon_type" required>
                            <option value="">Select coupon type</option>
                            <option value="Amount" {{ old('type', $coupon->coupon_type) == 'Amount' ? 'selected' : '' }}>Amount</option>
                            <option value="Percentage" {{ old('type', $coupon->coupon_type) == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                        </select>
                        <x-backend.input-error field="coupon_type"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="coupon_validity" class="form-label">Coupon Validity<span class="asterisk">*</span></label>
                        <select class="form-control form-select" name="coupon_validity" id="coupon_validity" required>
                            <option value="">Select coupon validity</option>
                            <option value="Fix Time" {{ old('coupon_validity', $coupon->coupon_validity) == 'Fix Time' ? 'selected' : '' }}>Fix Time</option>
                            <option value="Life Time" {{ old('coupon_validity', $coupon->coupon_validity) == 'Life Time' ? 'selected' : '' }}>Life Time</option>
                        </select>
                        <x-backend.input-error field="coupon_validity"></x-backend.input-error>
                    </div>

                    @if(old('coupon_for', $coupon->coupon_for) == 'Already Purchased Course')
                        <div class="col-6 mb-4 already-purchased-course-fields">
                            <label for="old_course_id" class="form-label">Old Course<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="old_course_id">
                                <option value="">Select old course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == old('old_course_id', $coupon->old_course_id) ? 'selected' : '' }}>{{ $course->title }}</option>
                                @endforeach
                            </select>
                            <x-backend.input-error field="old_course_id"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4 already-purchased-course-fields">
                            <label for="new_course_id" class="form-label">New Course<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="new_course_id">
                                <option value="">Select new course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == old('new_course_id', $coupon->new_course_id) ? 'selected' : '' }}>{{ $course->title }}</option>
                                @endforeach
                            </select>
                            <x-backend.input-error field="new_course_id"></x-backend.input-error>
                        </div>
                    @else
                        <div class="col-6 mb-4 already-purchased-course-fields d-none">
                            <label for="old_course_id" class="form-label">Old Course<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="old_course_id">
                                <option value="">Select old course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == old('old_course_id', $coupon->old_course_id) ? 'selected' : '' }}>{{ $course->title }}</option>
                                @endforeach
                            </select>
                            <x-backend.input-error field="old_course_id"></x-backend.input-error>
                        </div>

                        <div class="col-6 mb-4 already-purchased-course-fields d-none">
                            <label for="new_course_id" class="form-label">New Course<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="new_course_id">
                                <option value="">Select new course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == old('new_course_id', $coupon->new_course_id) ? 'selected' : '' }}>{{ $course->title }}</option>
                                @endforeach
                            </select>
                            <x-backend.input-error field="new_course_id"></x-backend.input-error>
                        </div>
                    @endif

                    @if(old('coupon_validity', $coupon->coupon_validity) == 'Fix Time')
                        <div class="col-6 mb-4 fix-time-fields">
                            <label for="expiry_date" class="form-label">Expiry Date<span class="asterisk">*</span></label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $coupon->expiry_date) }}" placeholder="Expiry Date">
                            <x-backend.input-error field="expiry_date"></x-backend.input-error>
                        </div>
                        
                        <div class="col-6 mb-4 fix-time-fields">
                            <label for="expiry_time" class="form-label">Expiry Time<span class="asterisk">*</span></label>
                            <input type="time" class="form-control" id="expiry_time" name="expiry_time" value="{{ old('expiry_time', $coupon->expiry_time) }}" placeholder="Expiry Time">
                            <x-backend.input-error field="expiry_time"></x-backend.input-error>
                        </div>
                    @else
                        <div class="col-6 mb-4 fix-time-fields d-none">
                            <label for="expiry_date" class="form-label">Expiry Date<span class="asterisk">*</span></label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $coupon->expiry_date) }}" placeholder="Expiry Date">
                            <x-backend.input-error field="expiry_date"></x-backend.input-error>
                        </div>
                        
                        <div class="col-6 mb-4 fix-time-fields d-none">
                            <label for="expiry_time" class="form-label">Expiry Time<span class="asterisk">*</span></label>
                            <input type="time" class="form-control" id="expiry_time" name="expiry_time" value="{{ old('expiry_time', $coupon->expiry_time) }}" placeholder="Expiry Time">
                            <x-backend.input-error field="expiry_time"></x-backend.input-error>
                        </div>
                    @endif

                    <div class="col-12">
                        <label for="value" class="form-label">Amount/ Percentage<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="value" name="value" value="{{ old('value', $coupon->value) }}" placeholder="Amount/ Percentage" required>
                        <x-backend.input-error field="value"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$coupon"></x-backend.edit-status>
        </form>
    </div>
@endsection

@push('after-scripts')
    <script>
        $('#coupon_for').on('change', function() {
            let value = $(this).val();

            if(value == 'Already Purchased Course') {
                $('.already-purchased-course-fields').removeClass('d-none');
                $('.already-purchased-course-fields').find('select').attr('required', true);
            }
            else {
                $('.already-purchased-course-fields').addClass('d-none');
                $('.already-purchased-course-fields').find('select').attr('required', false);
                $('.already-purchased-course-fields').find('select').val('');
            }
        });

        $('#coupon_validity').on('change', function() {
            let value = $(this).val();

            if(value == 'Fix Time') {
                $('.fix-time-fields').removeClass('d-none');
                $('.fix-time-fields').find('input').attr('required', true);
            }
            else {
                $('.fix-time-fields').addClass('d-none');
                $('.fix-time-fields').find('input').attr('required', false);
                $('.fix-time-fields').find('input').val('');
            }
        });
    </script>
@endpush