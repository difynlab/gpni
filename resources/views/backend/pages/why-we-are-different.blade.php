@extends('backend.layouts.app')

@section('title', 'Why We Are Different')

@section('content')

    <x-backend.breadcrumb page_name="Why We Are Different"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.pages.why-we-are-different.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero Section)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title" name="section_1_title" value="{{ $contents->section_1_title ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-video old_name="old_section_1_video" old_value="{{ $contents->section_1_video ?? '' }}" new_name="new_section_1_video" path="pages"></x-backend.upload-video>
                            <x-backend.input-error field="new_section_1_video"></x-backend.input-error>
                        </div>

                        <div>
                            <label for="section_1_description" class="form-label">Description</label>
                            <textarea class="editor" id="section_1_description" name="section_1_description" value="{{ $contents->section_1_description ?? '' }}">{{ $contents->section_1_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Regions & languages)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title" name="section_2_title" value="{{ $contents->section_2_title ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-image old_name="old_section_2_image" old_value="{{ $contents->section_2_image ?? '' }}" new_name="new_section_2_image" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_2_image"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="section_2_top_description" class="form-label">Top Content</label>
                            <textarea class="editor" id="section_2_top_description" name="section_2_top_description" value="{{ $contents->section_2_top_description ?? '' }}">{{ $contents->section_2_top_description ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_2_bottom_description" class="form-label">Bottom Content</label>
                            <textarea class="editor" id="section_2_bottom_description" name="section_2_bottom_description" value="{{ $contents->section_2_bottom_description ?? '' }}">{{ $contents->section_2_bottom_description ?? '' }}</textarea>
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
@endpush