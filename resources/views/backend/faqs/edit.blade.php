@extends('backend.layouts.app')

@section('title', 'Edit FAQ')

@section('content')

    <x-backend.breadcrumb page_name="Edit FAQ"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.faqs.update', $faq) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">FAQ Details</span></p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="English" {{ old('language', $faq->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $faq->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $faq->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="question" class="form-label">Question<span class="asterisk">*</span></label>
                        <textarea class="form-control" id="question" rows="4" name="question" value="{{ old('question', $faq->question) }}" required>{{ old('question', $faq->question) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="answer" class="form-label">Answer</label>
                        <textarea class="editor" id="answer" name="answer" value="{{ old('answer', $faq->answer) }}">{{ old('answer', $faq->answer) }}</textarea>
                        <x-backend.input-error field="answer"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$faq"></x-backend.edit-status>
        </form>
    </div>

@endsection