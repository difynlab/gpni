@extends('backend.layouts.app')

@section('title', 'Edit Webinar')

@section('content')

    <x-backend.breadcrumb page_name="Edit Webinar"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.webinars.update', $webinar) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Webinar Important Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $webinar->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $webinar->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $webinar->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="type" name="type" required>
                            <option value="">Select type</option>
                            <option value="Recent" {{ old('type', $webinar->type) == 'Recent' ? 'selected' : '' }}>Recent</option>
                            <option value="Previous" {{ old('type', $webinar->type) == 'Previous' ? 'selected' : '' }}>Previous</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Webinar Details</p>
                
                <div class="row form-input">
                    <div class="col-6 left-column">
                        <label for="content" class="form-label">Content<span class="asterisk">*</span></label>
                        <textarea class="editor" id="content" name="content" value="{{ old('content', $webinar->content) }}">{{ old('content', $webinar->content) }}</textarea>
                        <x-backend.input-error field="content"></x-backend.input-error>
                    </div>

                    <div class="col-6 right-column">
                        <x-backend.upload-video-must old_name="old_video" old_value="{{ $webinar->video ?? old('video') }}" new_name="new_video" path="webinars" class="side-box-uploader"></x-backend.upload-video-must>
                        <x-backend.input-error field="new_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$webinar"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
@endpush