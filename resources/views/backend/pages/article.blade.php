@extends('backend.layouts.app')

@section('title', 'Article')

@section('content')

    <x-backend.breadcrumb page_name="Article"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.article.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="single_article_page_name_{{ $short_code }}" class="form-label">Single Page Name</label>
                            <input type="text" class="form-control" id="single_article_page_name_{{ $short_code }}" name="single_article_page_name_{{ $short_code }}" value="{{ $contents->{'single_article_page_name_' . $short_code} ?? '' }}" placeholder="Single Page Name">
                        </div>

                        <div>
                            <label for="single_article_author_{{ $short_code }}" class="form-label">Single Page Author</label>
                            <input type="text" class="form-control" id="single_article_author_{{ $short_code }}" name="single_article_author_{{ $short_code }}" value="{{ $contents->{'single_article_author_' . $short_code} ?? '' }}" placeholder="Single Page Author">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_first_tab_{{ $short_code }}" class="form-label">First tab</label>
                        <input type="text" class="form-control" id="section_1_first_tab_{{ $short_code }}" name="section_1_first_tab_{{ $short_code }}" value="{{ $contents->{'section_1_first_tab_' . $short_code} ?? '' }}" placeholder="First tab">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_second_tab_{{ $short_code }}" class="form-label">Second tab</label>
                        <input type="text" class="form-control" id="section_1_second_tab_{{ $short_code }}" name="section_1_second_tab_{{ $short_code }}" value="{{ $contents->{'section_1_second_tab_' . $short_code} ?? '' }}" placeholder="Second tab">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_read_{{ $short_code }}" class="form-label">Read</label>
                        <input type="text" class="form-control" id="section_1_read_{{ $short_code }}" name="section_1_read_{{ $short_code }}" value="{{ $contents->{'section_1_read_' . $short_code} ?? '' }}" placeholder="Read">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_trend_{{ $short_code }}" class="form-label">Trend</label>
                        <input type="text" class="form-control" id="section_1_trend_{{ $short_code }}" name="section_1_trend_{{ $short_code }}" value="{{ $contents->{'section_1_trend_' . $short_code} ?? '' }}" placeholder="Trend">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_social_title_{{ $short_code }}" class="form-label">Social Title</label>
                        <input type="text" class="form-control" id="section_1_social_title_{{ $short_code }}" name="section_1_social_title_{{ $short_code }}" value="{{ $contents->{'section_1_social_title_' . $short_code} ?? '' }}" placeholder="Social Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_newsletter_title_{{ $short_code }}" class="form-label">Newsletter Title</label>
                        <input type="text" class="form-control" id="section_1_newsletter_title_{{ $short_code }}" name="section_1_newsletter_title_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_title_' . $short_code} ?? '' }}" placeholder="Newsletter Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_newsletter_description_{{ $short_code }}" class="form-label">Newsletter Description</label>
                        <input type="text" class="form-control" id="section_1_newsletter_description_{{ $short_code }}" name="section_1_newsletter_description_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_description_' . $short_code} ?? '' }}" placeholder="Newsletter Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_newsletter_placeholder_{{ $short_code }}" class="form-label">Newsletter Placeholder</label>
                        <input type="text" class="form-control" id="section_1_newsletter_placeholder_{{ $short_code }}" name="section_1_newsletter_placeholder_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_placeholder_' . $short_code} ?? '' }}" placeholder="Newsletter Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_newsletter_button_{{ $short_code }}" class="form-label">Newsletter Button</label>
                        <input type="text" class="form-control" id="section_1_newsletter_button_{{ $short_code }}" name="section_1_newsletter_button_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_button_' . $short_code} ?? '' }}" placeholder="Newsletter Button">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="section_1_share_article_{{ $short_code }}" class="form-label">Share Article</label>
                        <input type="text" class="form-control" id="section_1_share_article_{{ $short_code }}" name="section_1_share_article_{{ $short_code }}" value="{{ $contents->{'section_1_share_article_' . $short_code} ?? '' }}" placeholder="Share Article">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="section_1_previous_{{ $short_code }}" class="form-label">Previous Button</label>
                        <input type="text" class="form-control" id="section_1_previous_{{ $short_code }}" name="section_1_previous_{{ $short_code }}" value="{{ $contents->{'section_1_previous_' . $short_code} ?? '' }}" placeholder="Previous Button">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="section_1_next_{{ $short_code }}" class="form-label">Next Button</label>
                        <input type="text" class="form-control" id="section_1_next_{{ $short_code }}" name="section_1_next_{{ $short_code }}" value="{{ $contents->{'section_1_next_' . $short_code} ?? '' }}" placeholder="Next Button">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-video old_name="old_section_1_video" old_value="{{ $contents->{'section_1_video_' . $short_code} ?? '' }}" new_name="new_section_1_video" path="pages"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_1_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Instagram)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="section_2_description_{{ $short_code }}" name="section_2_description_{{ $short_code }}" value="{{ $contents->{'section_2_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_2_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3 <span>(You might also like)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save Updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
@endpush