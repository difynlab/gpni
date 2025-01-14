@extends('backend.layouts.app')

@section('title', 'Create Our Founder')

@section('content')

    <x-backend.breadcrumb page_name="Create Our Founder"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.our-founders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Our Founder Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="designations" class="form-label">Designations</label>
                        <input type="text" class="form-control" id="designations" name="designations" placeholder="Designations" value="{{ old('designations') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="editor" id="description" name="description" value="{{ old('description') }}" placeholder="Description">{{ old('description') }}</textarea>
                        <x-backend.input-error field="description"></x-backend.input-error>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ old('image') }}" new_name="new_image" path="persons/our-founders" label="Our Founder"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush