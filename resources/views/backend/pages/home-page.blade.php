@extends('backend.layouts.app')

@section('title', 'Home Page')

@section('content')

    <x-backend.breadcrumb page_name="Home Page"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.pages.homepage.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero Section)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_1_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title" name="section_1_title" value="{{ $contents->section_1_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_1_description" class="form-label">Description</label>
                            <textarea class="editor" id="section_1_description" name="section_1_description" value="{{ $contents->section_1_description ?? '' }}">{{ $contents->section_1_description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->section_1_image ?? '' }}" new_name="new_section_1_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input type="text" class="form-control mb-3" name="section_1_button_labels[]" placeholder="Label" value="{{ json_decode($contents->section_1_labels_links)[0]->label ?? '' }}">

                        <input type="text" class="form-control" name="section_1_button_labels[]" placeholder="Label" value="{{ json_decode($contents->section_1_labels_links)[1]->label ?? '' }}">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input type="url" class="form-control mb-3" name="section_1_button_links[]" placeholder="Link" value="{{ json_decode($contents->section_1_labels_links)[0]->link ?? '' }}">

                        <input type="url" class="form-control" name="section_1_button_links[]" placeholder="Link" value="{{ json_decode($contents->section_1_labels_links)[1]->link ?? '' }}">
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Objectives)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_2_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title" name="section_2_title" value="{{ $contents->section_2_title ?? '' }}" placeholder="Title">
                        </div>

                        <x-backend.upload-video old_name="old_section_2_video" old_value="{{ $contents->section_2_video ?? '' }}" new_name="new_section_2_video" path="pages"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_2_video"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <label for="section_2_points" class="form-label">Points</label>
                        <div class="all-points">
                            <input class="single-point form-control" type="text" name="section_2_points[]" value="{{ json_decode($contents->section_2_points)[0] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points[]" value="{{ json_decode($contents->section_2_points)[1] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points[]" value="{{ json_decode($contents->section_2_points)[2] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points[]" value="{{ json_decode($contents->section_2_points)[3] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points[]" value="{{ json_decode($contents->section_2_points)[4] ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3 <span>(List of courses)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_3_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title" name="section_3_title" value="{{ $contents->section_3_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_3_description" value="{{ $contents->section_3_description ?? '' }}" placeholder="Description">{{ $contents->section_3_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4 <span>(Testimonials)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_4_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title" name="section_4_title" value="{{ $contents->section_4_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_4_description" value="{{ $contents->section_4_description ?? '' }}" placeholder="Description">{{ $contents->section_4_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5 <span>(Partners)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_5_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_5_title" name="section_5_title" value="{{ $contents->section_5_title ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_5_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_5_description" value="{{ $contents->section_5_description ?? '' }}" placeholder="Description">{{ $contents->section_5_description ?? '' }}</textarea>
                        </div>

                        <div>
                            <x-backend.upload-multi-images image_count="8" old_name="old_section_5_images" old_value="{{ $contents->section_5_images ?? '' }}" new_name="new_section_5_images[]" path="pages"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_section_5_images.*"></x-backend.input-error>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 6 <span>(Sign up - CTA)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_6_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_6_title" name="section_6_title" value="{{ $contents->section_6_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_6_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_6_description" value="{{ $contents->section_6_description ?? '' }}" placeholder="Description">{{ $contents->section_6_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control mb-3" type="text" name="section_6_button_label" value="{{ json_decode($contents->section_6_label_link)->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control mb-3" type="text" name="section_6_button_link" value="{{ json_decode($contents->section_6_label_link)->link ?? '' }}" placeholder="Link">
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 7 <span>(Our team)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_7_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_7_title" name="section_7_title" value="{{ $contents->section_7_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_7_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_7_description" value="{{ $contents->section_7_description ?? '' }}" placeholder="Description">{{ $contents->section_7_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 8 <span>(Sport nutrition selection - CTA)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_8_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_8_title" name="section_8_title" value="{{ $contents->section_8_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_8_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_8_description" value="{{ $contents->section_8_description ?? '' }}" placeholder="Description">{{ $contents->section_8_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input type="text" class="form-control mb-3" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->section_8_labels_links)[0]->label ?? '' }}">

                        <input type="text" class="form-control mb-3" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->section_8_labels_links)[1]->label ?? '' }}">

                        <input type="text" class="form-control mb-3" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->section_8_labels_links)[2]->label ?? '' }}">

                        <input type="text" class="form-control" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->section_8_labels_links)[3]->label ?? '' }}">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input type="url" class="form-control mb-3" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->section_8_labels_links)[0]->link ?? '' }}">

                        <input type="url" class="form-control mb-3" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->section_8_labels_links)[1]->link ?? '' }}">

                        <input type="url" class="form-control mb-3" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->section_8_labels_links)[2]->link ?? '' }}">

                        <input type="url" class="form-control" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->section_8_labels_links)[3]->link ?? '' }}">
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 9 <span>(FAQ)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_9_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_9_title" name="section_9_title" value="{{ $contents->section_9_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_9_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_9_description" value="{{ $contents->section_9_description ?? '' }}" placeholder="Description">{{ $contents->section_9_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
@endpush