@extends('backend.layouts.app')

@section('title', 'Tv')

@section('content')

    <x-backend.breadcrumb page_name="Tv"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.tv.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                        </div>

                        <div>
                            <label for="single_tv_page_name_{{ $short_code }}" class="form-label">Single Page Name</label>
                            <input type="text" class="form-control" id="single_tv_page_name_{{ $short_code }}" name="single_tv_page_name_{{ $short_code }}" value="{{ $contents->{'single_tv_page_name_' . $short_code} ?? '' }}" placeholder="Single Page Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero section)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_rating_title_{{ $short_code }}" class="form-label">Rating Title</label>
                            <input type="text" class="form-control" id="section_1_rating_title_{{ $short_code }}" name="section_1_rating_title_{{ $short_code }}" value="{{ $contents->{'section_1_rating_title_' . $short_code} ?? '' }}" placeholder="Rating Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_rating_{{ $short_code }}" class="form-label">Rating</label>
                            <select class="form-control form-select" name="section_1_rating_{{ $short_code }}">
                                <option value="">Select Rating</option>
                                <option value="1" {{ $contents->{'section_1_rating_' . $short_code} == '1' ? "selected" : "" }}>1</option>
                                <option value="2" {{ $contents->{'section_1_rating_' . $short_code} == '2' ? "selected" : "" }}>2</option>
                                <option value="3" {{ $contents->{'section_1_rating_' . $short_code} == '3' ? "selected" : "" }}>3</option>
                                <option value="4" {{ $contents->{'section_1_rating_' . $short_code} == '4' ? "selected" : "" }}>4</option>
                                <option value="5" {{ $contents->{'section_1_rating_' . $short_code} == '5' ? "selected" : "" }}>5</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="section_1_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_1_content_{{ $short_code }}" name="section_1_content_{{ $short_code }}" value="{{ $contents->{'section_1_content_' . $short_code} ?? '' }}">{{ $contents->{'section_1_content_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div >
                            <label for="section_1_price_{{ $short_code }}" class="form-label">Price</label>
                            <input type="text" class="form-control" id="section_1_price_{{ $short_code }}" name="section_1_price_{{ $short_code }}" value="{{ $contents->{'section_1_price_' . $short_code} ?? '' }}" placeholder="Price">
                        </div>

                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->{'section_1_image_' . $short_code} ?? '' }}" new_name="new_section_1_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_2_sub_title_{{ $short_code }}" name="section_2_sub_title_{{ $short_code }}" value="{{ $contents->{'section_2_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_3_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_3_content_{{ $short_code }}" name="section_3_content_{{ $short_code }}" value="{{ $contents->{'section_3_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_3_image" old_value="{{ $contents->{'section_3_image_' . $short_code} ?? '' }}" new_name="new_section_3_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_3_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_4_content_{{ $short_code }}" name="section_4_content_{{ $short_code }}" value="{{ $contents->{'section_4_content_' . $short_code} ?? '' }}">{{ $contents->{'section_4_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div>
                            <label for="section_5_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_5_content_{{ $short_code }}" name="section_5_content_{{ $short_code }}" value="{{ $contents->{'section_5_content_' . $short_code} ?? '' }}">{{ $contents->{'section_5_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_5_image" old_value="{{ $contents->{'section_5_image_' . $short_code} ?? '' }}" new_name="new_section_5_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_5_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 6</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_6_image" old_value="{{ $contents->{'section_6_image_' . $short_code} ?? '' }}" new_name="new_section_6_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_6_image"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <div>
                            <label for="section_6_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_6_content_{{ $short_code }}" name="section_6_content_{{ $short_code }}" value="{{ $contents->{'section_6_content_' . $short_code} ?? '' }}">{{ $contents->{'section_6_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 7</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div>
                            <label for="section_7_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_7_content_{{ $short_code }}" name="section_7_content_{{ $short_code }}" value="{{ $contents->{'section_7_content_' . $short_code} ?? '' }}">{{ $contents->{'section_7_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-video old_name="old_section_7_video" old_value="{{ $contents->{'section_7_video_' . $short_code} ?? '' }}" new_name="new_section_7_video" path="pages" class="side-box-uploader"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_7_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 8</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_8_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_8_title_{{ $short_code }}" name="section_8_title_{{ $short_code }}" value="{{ $contents->{'section_8_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_8_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_8_content_{{ $short_code }}" name="section_8_content_{{ $short_code }}" value="{{ $contents->{'section_8_content_' . $short_code} ?? '' }}">{{ $contents->{'section_8_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_8_label_{{ $short_code }}" class="form-label">Label</label>
                        <input type="text" class="form-control" id="section_8_label_{{ $short_code }}" name="section_8_label_{{ $short_code }}" value="{{ $contents->{'section_8_label_' . $short_code} ?? '' }}" placeholder="Label">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 9</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_9_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_9_title_{{ $short_code }}" name="section_9_title_{{ $short_code }}" value="{{ $contents->{'section_9_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_9_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_9_content_{{ $short_code }}" name="section_9_content_{{ $short_code }}" value="{{ $contents->{'section_9_content_' . $short_code} ?? '' }}">{{ $contents->{'section_9_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 10</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_10_image" old_value="{{ $contents->{'section_10_image_' . $short_code} ?? '' }}" new_name="new_section_10_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_10_image"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <div>
                            <label for="section_10_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_10_content_{{ $short_code }}" name="section_10_content_{{ $short_code }}" value="{{ $contents->{'section_10_content_' . $short_code} ?? '' }}">{{ $contents->{'section_10_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 11</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="section_11_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_11_title_{{ $short_code }}" name="section_11_title_{{ $short_code }}" value="{{ $contents->{'section_11_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="section_11_sub_title_{{ $short_code }}" name="section_11_sub_title_{{ $short_code }}" value="{{ $contents->{'section_11_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_instagram_{{ $short_code }}" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="section_11_instagram_{{ $short_code }}" name="section_11_instagram_{{ $short_code }}" value="{{ $contents->{'section_11_instagram_' . $short_code} ?? '' }}" placeholder="Instagram">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_twitter_{{ $short_code }}" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="section_11_twitter_{{ $short_code }}" name="section_11_twitter_{{ $short_code }}" value="{{ $contents->{'section_11_twitter_' . $short_code} ?? '' }}" placeholder="Twitter">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_linkedin_{{ $short_code }}" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="section_11_linkedin_{{ $short_code }}" name="section_11_linkedin_{{ $short_code }}" value="{{ $contents->{'section_11_linkedin_' . $short_code} ?? '' }}" placeholder="Linkedin">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_youtube_{{ $short_code }}" class="form-label">Youtube</label>
                        <input type="text" class="form-control" id="section_11_youtube_{{ $short_code }}" name="section_11_youtube_{{ $short_code }}" value="{{ $contents->{'section_11_youtube_' . $short_code} ?? '' }}" placeholder="Youtube">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_facebook_{{ $short_code }}" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="section_11_facebook_{{ $short_code }}" name="section_11_facebook_{{ $short_code }}" value="{{ $contents->{'section_11_facebook_' . $short_code} ?? '' }}" placeholder="Facebook">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_11_message_{{ $short_code }}" class="form-label">Message</label>
                        <input type="text" class="form-control" id="section_11_message_{{ $short_code }}" name="section_11_message_{{ $short_code }}" value="{{ $contents->{'section_11_message_' . $short_code} ?? '' }}" placeholder="Message">
                    </div>

                    <div class="col-6">
                        <label for="section_11_placeholder_{{ $short_code }}" class="form-label">Placeholder</label>
                        <input type="text" class="form-control" id="section_11_placeholder_{{ $short_code }}" name="section_11_placeholder_{{ $short_code }}" value="{{ $contents->{'section_11_placeholder_' . $short_code} ?? '' }}" placeholder="Placeholder">
                    </div>

                    <div class="col-6">
                        <label for="section_11_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="section_11_button_{{ $short_code }}" name="section_11_button_{{ $short_code }}" value="{{ $contents->{'section_11_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Common Words</p>

                <div class="row form-input">
                    <div class="col-4 mb-4">
                        <label for="already_purchased_{{ $short_code }}" class="form-label">Already Purchased</label>
                        <input type="text" class="form-control" id="already_purchased_{{ $short_code }}" name="already_purchased_{{ $short_code }}" value="{{ $contents->{'already_purchased_' . $short_code} ?? '' }}" placeholder="Already Purchased">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="enroll_now_{{ $short_code }}" class="form-label">Enroll Now</label>
                        <input type="text" class="form-control" id="enroll_now_{{ $short_code }}" name="enroll_now_{{ $short_code }}" value="{{ $contents->{'enroll_now_' . $short_code} ?? '' }}" placeholder="Enroll Now">
                    </div>

                    <!-- <div class="col-4">
                        <label for="login_for_enroll_{{ $short_code }}" class="form-label">Login for Enroll</label>
                        <input type="text" class="form-control" id="login_for_enroll_{{ $short_code }}" name="login_for_enroll_{{ $short_code }}" value="{{ $contents->{'login_for_enroll_' . $short_code} ?? '' }}" placeholder="Login for Enroll">
                    </div> -->

                    <div class="col-4 mb-4">
                        <label class="form-label">Order Details</label>
                        <input class="form-control" type="text" id="order_details_{{ $short_code }}" name="order_details_{{ $short_code }}" value="{{ $contents->{'order_details_' . $short_code} ?? '' }}" placeholder="Order Details">
                    </div>

                    <div class="col-4 mb-4">
                        <label class="form-label">Course</label>
                        <input class="form-control" type="text" id="course_{{ $short_code }}" name="course_{{ $short_code }}" value="{{ $contents->{'course_' . $short_code} ?? '' }}" placeholder="Course">
                    </div>

                    <div class="col-4 mb-4">
                        <label class="form-label">Amount</label>
                        <input class="form-control" type="text" id="amount_{{ $short_code }}" name="amount_{{ $short_code }}" value="{{ $contents->{'amount_' . $short_code} ?? '' }}" placeholder="Amount">
                    </div>

                    <div class="col-4 mb-4">
                        <label class="form-label">Total</label>
                        <input class="form-control" type="text" id="total_{{ $short_code }}" name="total_{{ $short_code }}" value="{{ $contents->{'total_' . $short_code} ?? '' }}" placeholder="Total">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Coupon Code</label>
                        <input class="form-control" type="text" id="coupon_code_{{ $short_code }}" name="coupon_code_{{ $short_code }}" value="{{ $contents->{'coupon_code_' . $short_code} ?? '' }}" placeholder="Coupon Code">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Pay Now</label>
                        <input class="form-control" type="text" id="pay_now_{{ $short_code }}" name="pay_now_{{ $short_code }}" value="{{ $contents->{'pay_now_' . $short_code} ?? '' }}" placeholder="Pay Now">
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
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
@endpush