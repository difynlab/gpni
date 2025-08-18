@extends('backend.layouts.app')

@section('title', 'Create Course')

@section('content')

    <x-backend.breadcrumb page_name="Create Course"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Course details section)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title" required>
                        </div>

                        <div class="mb-4">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Duration">
                        </div>

                        <div class="mb-4">
                            <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="language" name="language" required>
                                <option value="">Select language</option>
                                <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select type" id="type" name="type" required>
                                <option value="">Select type</option>
                                <option value="Certification" {{ old('type') == 'Certification' ? 'selected' : '' }}>Certification</option>
                                <option value="Master" {{ old('type') == 'Master' ? 'selected' : '' }}>Master</option>
                                <option value="Small Course" {{ old('type') == 'Small Course' ? 'selected' : '' }}>Small Course</option>
                            </select>
                        </div>

                        <div class="mb-4 {{ old('type') != 'Certification' ? 'd-none' : '' }}">
                            <label for="certification_type" class="form-label">Certification Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="certification_type" name="certification_type">
                                <option value="">Select certification type</option>
                                <option value="SNS" {{ old('certification_type') == 'SNS' ? 'selected' : '' }}>SNS</option>
                                <option value="CISSN" {{ old('certification_type') == 'CISSN' ? 'selected' : '' }}>CISSN</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="no_of_modules" class="form-label">No of Modules</label>
                            <input type="text" class="form-control" id="no_of_modules" name="no_of_modules" value="{{ old('no_of_modules') }}" placeholder="No of Modules">
                        </div>

                        <div class="mb-4">
                            <label for="no_of_students_enrolled" class="form-label">No of Students Enrolled</label>
                            <input type="text" class="form-control" id="no_of_students_enrolled" name="no_of_students_enrolled" value="{{ old('no_of_students_enrolled') }}" placeholder="No of Students Enrolled">
                        </div>

                        <div>
                            <label for="price" class="form-label">Price<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Price" required>
                            <x-backend.input-error field="price"></x-backend.input-error>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <div class="mb-4">
                            <label for="media_type" class="form-label">Media Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="media_type" name="media_type" required>
                                <option value="">Select</option>
                                <option value="Image" {{ old('media_type') == 'Image' ? 'selected' : '' }}>Image</option>
                                <option value="Video" {{ old('media_type') == 'Video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>

                        <x-backend.upload-image old_name="old_image" old_value="{{ old('image') }}" new_name="new_image" path="courses/course-images" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="instructor_name" class="form-label">Instructor Name</label>
                            <input type="text" class="form-control" id="instructor_name" name="instructor_name" value="{{ old('instructor_name') }}" placeholder="Instructor Name">
                        </div>

                        <div class="mb-4">
                            <label for="instructor_designation" class="form-label">Instructor Designation</label>
                            <input type="text" class="form-control" id="instructor_designation" name="instructor_designation" value="{{ old('instructor_designation') }}" placeholder="Instructor Designation">
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-image old_name="old_instructor_profile_image" old_value="{{ old('instructor_profile_image') }}" new_name="new_instructor_profile_image" label="Instructor Profile" path="courses/course-instructors"></x-backend.upload-image>
                            <x-backend.input-error field="new_instructor_profile_image"></x-backend.input-error>
                        </div>

                        <div>
                            <label for="referral_point_percentage" class="form-label">Referral Point Percentage (%)</label>
                            <input type="text" class="form-control" id="referral_point_percentage" name="referral_point_percentage" value="{{ old('referral_point_percentage') }}" placeholder="Referral Point Percentage (%)">
                            <x-backend.input-error field="referral_point_percentage"></x-backend.input-error>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <div class="mb-4">
                            <x-backend.upload-video old_name="old_video" old_value="{{ old('video') }}" new_name="new_video" path="courses/course-videos"></x-backend.upload-video>
                            <x-backend.input-error field="new_video"></x-backend.input-error>
                        </div>

                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control" name="short_description" value="{{ old('short_description') }}" placeholder="Short Description">{{ old('short_description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Instalment Details</p>

                <div class="row form-input">
                    <div class="col-4">
                        <label for="instalment_months" class="form-label">Instalment Months</label>
                        <input type="number" class="form-control" id="instalment_months" name="instalment_months" value="{{ old('instalment_months') }}" placeholder="Instalment Months">
                    </div>
                    
                    <div class="col-4">
                        <label for="instalment_price" class="form-label">Instalment Price</label>
                        <input type="text" class="form-control" id="instalment_price" name="instalment_price" value="{{ old('instalment_price') }}" placeholder="Instalment Price">
                        <x-backend.input-error field="instalment_price"></x-backend.input-error>
                    </div>

                    <div class="col-4">
                        <label for="instalment_price_id" class="form-label">Instalment Price ID</label>
                        <input type="text" class="form-control" id="instalment_price_id" name="instalment_price_id" value="{{ old('instalment_price_id') }}" placeholder="Instalment Price ID">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Course Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="course_introduction" class="form-label">Course Introduction</label>
                            <textarea class="editor" id="course_introduction" name="course_introduction" value="{{ old('course_introduction') }}">{{ old('course_introduction') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="course_content" class="form-label">Course Content</label>
                            <textarea class="editor" id="course_content" name="course_content" value="{{ old('course_content') }}">{{ old('course_content') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="course_chapter" class="form-label">Course Chapter</label>
                            <textarea class="editor" id="course_chapter" name="course_chapter" value="{{ old('course_chapter') }}">{{ old('course_chapter') }}</textarea>
                        </div>

                        <div>
                            <x-backend.upload-multi-images image_count="2" old_name="old_certificate_images" old_value="{{ old('certificate_images') }}" label="Certification" new_name="new_certificate_images[]" path="courses/certificate-images"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_certificate_images.*"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Material & Logistics</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="material_logistic" class="form-label">PDF</label>
                            <input type="file" class="form-control" id="material_logistic" name="material_logistic" placeholder="PDF" accept=".pdf">
                            <x-backend.input-error field="material_logistic"></x-backend.input-error>
                        </div>

                        <div>
                            <label for="material_logistic_price" class="form-label">Material & Logistic Price</label>
                            <input type="text" class="form-control" id="material_logistic_price" name="material_logistic_price" value="{{ old('material_logistic_price') }}" placeholder="Material & Logistic Price">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Final Exam</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div>
                            <label for="final_exam" class="form-label">Final Exam<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="final_exam" name="final_exam" required>
                                <option value="">Select final exam</option>
                                <option value="Yes" {{ old('final_exam') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('final_exam') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="time_required" class="form-label">Time Required<span class="asterisk">*</span></label>
                            <select class="form-control form-select time-required" id="time_required" name="time_required" required>
                                <option value="">Select time required</option>
                                <option value="Yes" {{ old('time_required') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('time_required') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mt-4 {{ old('exam_time') == null ? 'd-none' : '' }} exam-time-div">
                            <label for="exam_time" class="form-label">Exam Time (HH:MM)<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="exam_time" name="exam_time" value="{{ old('exam_time') }}">
                            <x-backend.input-error field="exam_time"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Member Course</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="member_course" class="form-label">Member Course?<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="member_course" name="member_course" required>
                            <option value="">Select</option>
                            <option value="Yes" {{ old('member_course') == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ old('member_course') == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>

    <script>
        $('.time-required').on('change', function() {
            let value = $(this).val();

            if(value == 'Yes') {
                $(this).closest('div').next().removeClass('d-none');
                $(this).closest('div').next().find('input').attr('required', true);
            }
            else {
                $(this).closest('div').next().addClass('d-none');
                $(this).closest('div').next().find('select').attr('required', false);
                $(this).closest('div').next().find('select').val('');
            }
        });

        $('.type').on('change', function() {
            let value = $(this).val();

            if(value == 'Certification') {
                $(this).closest('div').next().removeClass('d-none');
                $(this).closest('div').next().find('select').attr('required', true);
            }
            else {
                $(this).closest('div').next().addClass('d-none');
                $(this).closest('div').next().find('input').attr('required', false);
                $(this).closest('div').next().find('input').val('');
            }
        });
    </script>
@endpush