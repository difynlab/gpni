@extends('backend.layouts.app')

@section('title', 'Create Policy')

@section('content')

    <x-backend.breadcrumb page_name="Create Policy"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.policies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Policy Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title" required>
                            <x-backend.input-error field="title"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="policy_category_id" class="form-label">Policy Category<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="policy_category_id" name="policy_category_id" required>
                                <option value="">Select policy category</option>
                                @foreach($policy_categories as $policy_category)
                                    <option value="{{ $policy_category->id }}" {{ old('policy_category_id') == $policy_category->id ? 'selected' : '' }}>{{ $policy_category->name }}</option>
                                @endforeach
                            </select>
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
                        
                        <div>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="editor" id="content" name="content" value="{{ old('content') }}">{{ old('content') }}</textarea>
                            <x-backend.input-error field="content"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection