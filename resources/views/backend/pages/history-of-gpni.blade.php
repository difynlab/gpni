@extends('backend.layouts.app')

@section('title', 'History Of GPNi')

@section('content')

    <x-backend.breadcrumb page_name="History Of GPNi"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.pages.history-of-gpni.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Background Banner)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title" name="section_1_title" value="{{ $contents->section_1_title ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->section_1_image ?? '' }}" new_name="new_section_1_image" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Who we are)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title" name="section_2_title" value="{{ $contents->section_2_title ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_2_sub_title" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_2_sub_title" name="section_2_sub_title" value="{{ $contents->section_2_sub_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_description" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_2_description" value="{{ $contents->section_2_description ?? '' }}" placeholder="Description">{{ $contents->section_2_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3 <span>(Our story)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_3_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title" name="section_3_title" value="{{ $contents->section_3_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description" name="section_3_description" value="{{ $contents->section_3_description ?? '' }}">{{ $contents->section_3_description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_3_image" old_value="{{ $contents->section_3_image ?? '' }}" new_name="new_section_3_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_3_image"></x-backend.input-error>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4 <span>(Official Partners)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_4_image" old_value="{{ $contents->section_4_image ?? '' }}" new_name="new_section_4_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_4_image"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <div class="mb-4">
                            <label for="section_4_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title" name="section_4_title" value="{{ $contents->section_4_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_description" class="form-label">Description</label>
                            <textarea class="editor" id="section_4_description" name="section_4_description" value="{{ $contents->section_4_description ?? '' }}">{{ $contents->section_4_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <button type="submit" class="submit-button">Save the changes</button>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5 <span>(Gold Standard)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_5_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_5_title" name="section_5_title" value="{{ $contents->section_5_title ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_5_description" class="form-label">Description</label>
                            <textarea class="editor" id="section_5_description" name="section_5_description" value="{{ $contents->section_5_description ?? '' }}">{{ $contents->section_5_description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_5_image" old_value="{{ $contents->section_5_image ?? '' }}" new_name="new_section_5_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_5_image"></x-backend.input-error>
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
@endpush