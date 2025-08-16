@extends('backend.layouts.app')

@section('title', 'Membership')

@section('content')

    <x-backend.breadcrumb page_name="Membership"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.membership.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_1_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_2_image" old_value="{{ $contents->{'section_2_image_' . $short_code} ?? '' }}" new_name="new_section_2_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_2_image"></x-backend.input-error>
                    </div>

                    <div class="col-6 right-column">
                        <div class="mb-4">
                            <label for="section_2_top_description{{ $short_code }}" class="form-label">Top Description</label>
                            <textarea class="editor" id="section_2_top_description_{{ $short_code }}" name="section_2_top_description_{{ $short_code }}" value="{{ $contents->{'section_2_top_description_' . $short_code} ?? '' }}">{{ $contents->{'section_2_top_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_2_bottom_description{{ $short_code }}" class="form-label">Bottom Description</label>
                            <textarea class="editor" id="section_2_bottom_description_{{ $short_code }}" name="section_2_bottom_description_{{ $short_code }}" value="{{ $contents->{'section_2_bottom_description_' . $short_code} ?? '' }}">{{ $contents->{'section_2_bottom_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Lifetime Proceed Button</label>
                            <input class="form-control" type="text" id="section_3_lifetime_proceed_{{ $short_code }}" name="section_3_lifetime_proceed_{{ $short_code }}" value="{{ $contents->{'section_3_lifetime_proceed_' . $short_code} ?? '' }}" placeholder="Lifetime Proceed Button">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Already Purchased Button</label>
                            <input class="form-control" type="text" id="section_3_already_purchased_{{ $short_code }}" name="section_3_already_purchased_{{ $short_code }}" value="{{ $contents->{'section_3_already_purchased_' . $short_code} ?? '' }}" placeholder="Already Purchased Button">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Order Details</label>
                            <input class="form-control" type="text" id="section_3_order_details_{{ $short_code }}" name="section_3_order_details_{{ $short_code }}" value="{{ $contents->{'section_3_order_details_' . $short_code} ?? '' }}" placeholder="Order Details">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Type</label>
                            <input class="form-control" type="text" id="section_3_type_{{ $short_code }}" name="section_3_type_{{ $short_code }}" value="{{ $contents->{'section_3_type_' . $short_code} ?? '' }}" placeholder="Type">
                        </div>

                        <div>
                            <label class="form-label">Amount</label>
                            <input class="form-control" type="text" id="section_3_amount_{{ $short_code }}" name="section_3_amount_{{ $short_code }}" value="{{ $contents->{'section_3_amount_' . $short_code} ?? '' }}" placeholder="Amount">
                        </div>

                        <!-- <div>
                            <label class="form-label">Login for Purchase Button</label>
                            <input class="form-control" type="text" id="section_3_login_for_purchase_{{ $short_code }}" name="section_3_login_for_purchase_{{ $short_code }}" value="{{ $contents->{'section_3_login_for_purchase_' . $short_code} ?? '' }}" placeholder="Login for Purchase Button">
                        </div> -->
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Annual Proceed Button</label>
                            <input class="form-control" type="text" id="section_3_annual_proceed_{{ $short_code }}" name="section_3_annual_proceed_{{ $short_code }}" value="{{ $contents->{'section_3_annual_proceed_' . $short_code} ?? '' }}" placeholder="Annual Proceed Button">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Change Language Button</label>
                            <input class="form-control" type="text" id="section_3_change_language_{{ $short_code }}" name="section_3_change_language_{{ $short_code }}" value="{{ $contents->{'section_3_change_language_' . $short_code} ?? '' }}" placeholder="Change Language Button">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Total</label>
                            <input class="form-control" type="text" id="section_3_total_{{ $short_code }}" name="section_3_total_{{ $short_code }}" value="{{ $contents->{'section_3_total_' . $short_code} ?? '' }}" placeholder="Total">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Coupon Code</label>
                            <input class="form-control" type="text" id="section_3_coupon_code_{{ $short_code }}" name="section_3_coupon_code_{{ $short_code }}" value="{{ $contents->{'section_3_coupon_code_' . $short_code} ?? '' }}" placeholder="Coupon Code">
                        </div>

                        <div>
                            <label class="form-label">Pay Now</label>
                            <input class="form-control" type="text" id="section_3_pay_now_{{ $short_code }}" name="section_3_pay_now_{{ $short_code }}" value="{{ $contents->{'section_3_pay_now_' . $short_code} ?? '' }}" placeholder="Pay Now">
                        </div>

                        <!-- <div>
                            <label class="form-label">Membership Disabled Button</label>
                            <input class="form-control" type="text" id="section_3_membership_disabled_{{ $short_code }}" name="section_3_membership_disabled_{{ $short_code }}" value="{{ $contents->{'section_3_membership_disabled_' . $short_code} ?? '' }}" placeholder="Membership Disabled Button">
                        </div> -->
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label class="form-label mb-0">Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        @if($contents->{'section_3_labels_contents_' . $short_code})
                            @foreach(json_decode($contents->{'section_3_labels_contents_' . $short_code}) as $label_content)
                                <div class="row single-item mt-4">
                                    <div class="col">
                                        <input type="text" class="form-control" name="section_3_labels[]" placeholder="Title" value="{{ $label_content->title }}">
                                    </div>
                                    <div class="col">
                                        <textarea class="editor ckeditor-initialized" id="section_3_contents" name="section_3_contents[]" value="{{ $label_content->content }}" placeholder="Content">{{ $label_content->content }}</textarea>
                                    </div>

                                    <div class="col-1 d-flex align-items-center">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row single-item mt-4">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="section_3_labels[]" placeholder="Title">
                                </div>
                                <div class="col-6">
                                    <textarea class="editor ckeditor-initialized" id="section_3_contents" name="section_3_contents[]" placeholder="Content"></textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4</p>

                <div class="row form-input">
                    <div class="col-12 left-column">
                        <div class="mb-4">
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_4_description_{{ $short_code }}" name="section_4_description_{{ $short_code }}" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_4_label_{{ $short_code }}" class="form-label">Label</label>
                        <input type="text" class="form-control" id="section_4_label_{{ $short_code }}" name="section_4_label_{{ $short_code }}" value="{{ $contents->{'section_4_label_' . $short_code} ?? '' }}" placeholder="Label">
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control" type="text" name="section_4_button_label" value="{{ json_decode($contents->{'section_4_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control" type="text" name="section_4_button_link" value="{{ json_decode($contents->{'section_4_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <!-- <div class="section">
                <p class="inner-page-title">Section 5 <span>(FAQ)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_5_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_5_title_{{ $short_code }}" name="section_5_title_{{ $short_code }}" value="{{ $contents->{'section_5_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_5_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_5_description_{{ $short_code }}" value="{{ $contents->{'section_5_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_5_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div> -->

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

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button').on('click', function() {
            let html = `<div class="row single-item mt-4">
                            <div class="col">
                                <input type="text" class="form-control" name="section_3_labels[]" placeholder="Title">
                            </div>
                            <div class="col">
                                <textarea class="editor" id="section_3_contents" name="section_3_contents[]"></textarea>
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            const $newRow = $(this).closest('.row').parent().append(html);

            $newRow.find('.editor').each((index, element) => {
                if(!element.classList.contains('ckeditor-initialized')) {
                    ClassicEditor
                        .create(element)
                        .then(newEditor => {
                            element.classList.add('ckeditor-initialized');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });
    </script>
@endpush