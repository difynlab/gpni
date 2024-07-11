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
                            <label for="duration" class="form-label">Duration<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Duration" required>
                        </div>

                        <div class="mb-4">
                            <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="language" name="language" value="{{ old('language') }}" required>
                                <option value="">Select language</option>
                                <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="type" name="type" value="{{ old('type') }}" required>
                                <option value="">Select type</option>
                                <option value="certification" {{ old('type') == 'certification' ? 'selected' : '' }}>Certification</option>
                                <option value="masters" {{ old('type') == 'masters' ? 'selected' : '' }}>Masters</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="no_of_modules" class="form-label">No of Modules<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="no_of_modules" name="no_of_modules" value="{{ old('no_of_modules') }}" placeholder="No of Modules" required>
                        </div>

                        <div class="mb-4">
                            <label for="no_of_students_enrolled" class="form-label">No of Students Enrolled<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="no_of_students_enrolled" name="no_of_students_enrolled" value="{{ old('no_of_students_enrolled') }}" placeholder="No of Students Enrolled" required>
                        </div>

                        <div>
                            <label for="price" class="form-label">Price<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Price" required>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image-video old_name="old_image_video" old_value="{{ old('image_video') }}" new_name="new_image_video" path="courses" class="side-box-uploader"></x-backend.upload-image-video>
                        <x-backend.input-error field="new_image_video"></x-backend.input-error>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="instructor_name" class="form-label">Instructor Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="instructor_name" name="instructor_name" value="{{ old('instructor_name') }}" placeholder="Instructor Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="instructor_designation" class="form-label">Instructor Designation<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="instructor_designation" name="instructor_designation" value="{{ old('instructor_designation') }}" placeholder="Instructor Designation" required>
                        </div>

                        <div>
                            <x-backend.upload-image old_name="old_instructor_profile_image" old_value="{{ old('instructor_profile_image') }}" new_name="new_instructor_profile_image" path="courses"></x-backend.upload-image>
                            <x-backend.input-error field="new_instructor_profile_image"></x-backend.input-error>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <label for="image_video_description" class="form-label">Image/ Video Description</label>
                        <textarea class="form-control" name="image_video_description" value="{{ old('image_video_description') }}" placeholder="Image/ Video Description" required>{{ old('image_video_description') }}</textarea>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Objectives)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title" name="section_2_title" value="{{ old('section_2_title') }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_2_description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="section_2_description" name="section_2_description" value="{{ old('section_2_description') }}" placeholder="Description">
                        </div>

                        <div>
                            <label for="section_2_content" class="form-label">Content</label>
                            <textarea class="editor" id="section_2_content" name="section_2_content" value="{{ old('section_2_content') }}">{{ old('section_2_content') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
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

                        <div>
                            <label for="course_requirement" class="form-label">Course Requirement</label>
                            <textarea class="editor" id="course_requirement" name="course_requirement" value="{{ old('course_requirement') }}">{{ old('course_requirement') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-image-video.js') }}"></script>
@endpush