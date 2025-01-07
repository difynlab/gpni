@extends('backend.layouts.app')

@section('title', 'Our Policies')

@section('content')

    <x-backend.breadcrumb page_name="Our Policies"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.our-policies.update', $language) }}" method="POST" enctype="multipart/form-data">
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
                <p class="inner-page-title">Section <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" id="description_{{ $short_code }}" name="description_{{ $short_code }}" value="{{ $contents->{'description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">CEC Policy</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <div class="mb-4">
                            <x-backend.upload-multi-images image_count="3" old_name="old_cec_images" old_value="{{ $contents->{'cec_images_' . $short_code} ?? '' }}" new_name="new_cec_images[]" path="pages"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_cec_images.*"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="cec_images_description_{{ $short_code }}" class="form-label">CEC Images Description</label>
                            <input type="text" class="form-control" id="cec_images_description_{{ $short_code }}" name="cec_images_description_{{ $short_code }}" value="{{ $contents->{'cec_images_description_' . $short_code} ?? '' }}" placeholder="CEC Images Description">
                        </div>

                        <div>
                            <label for="cec_title_{{ $short_code }}" class="form-label">CEC Title</label>
                            <input type="text" class="form-control" id="cec_title_{{ $short_code }}" name="cec_title_{{ $short_code }}" value="{{ $contents->{'cec_title_' . $short_code} ?? '' }}" placeholder="CEC Title">
                        </div>
                    </div>

                    <div class="col-4">
                        <label for="cec_first_column_title_{{ $short_code }}" class="form-label">First Column Title</label>
                        <input type="text" class="form-control" id="cec_first_column_title_{{ $short_code }}" name="cec_first_column_title_{{ $short_code }}" value="{{ $contents->{'cec_first_column_title_' . $short_code} ?? '' }}" placeholder="First Column Title">
                    </div>

                    <div class="col-4">
                        <label for="cec_second_column_title_{{ $short_code }}" class="form-label">Second Column Title</label>
                        <input type="text" class="form-control" id="cec_second_column_title_{{ $short_code }}" name="cec_second_column_title_{{ $short_code }}" value="{{ $contents->{'cec_second_column_title_' . $short_code} ?? '' }}" placeholder="Second Column Title">
                    </div>

                    <div class="col-4">
                        <label for="cec_third_column_title_{{ $short_code }}" class="form-label">Third Column Title</label>
                        <input type="text" class="form-control" id="cec_third_column_title_{{ $short_code }}" name="cec_third_column_title_{{ $short_code }}" value="{{ $contents->{'cec_third_column_title_' . $short_code} ?? '' }}" placeholder="Third Column Title">
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label class="form-label mb-0">Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-point-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        @if($contents->{'cec_points_' . $short_code})
                            @foreach(json_decode($contents->{'cec_points_' . $short_code}) as $cec_point)
                                <div class="row single-item mt-4">
                                    <div class="col">
                                        <input type="text" class="form-control" id="cec_points_type" name="cec_points_type[]" value="{{ $cec_point->type }}" placeholder="Type">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="form-control" id="cec_points_description" name="cec_points_description[]" value="{{ $cec_point->description }}" placeholder="Description">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="form-control" id="cec_points_points" name="cec_points_points[]" value="{{ $cec_point->points }}" placeholder="Points">
                                    </div>

                                    <div class="col-1 d-flex align-items-center">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="cec_points_description_{{ $short_code }}" class="form-label">CEC Points Description</label>
                        <input type="text" class="form-control" id="cec_points_description_{{ $short_code }}" name="cec_points_description_{{ $short_code }}" value="{{ $contents->{'cec_points_description_' . $short_code} ?? '' }}" placeholder="CEC Points Description">
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
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-point-button').on('click', function() {
            let html = `<div class="row single-item mt-4">
                                <div class="col">
                                    <input type="text" class="form-control" id="cec_points_type" name="cec_points_type[]" placeholder="Type">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="cec_points_description" name="cec_points_description[]" placeholder="Description">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="cec_points_points" name="cec_points_points[]" placeholder="Points">
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            const $newRow = $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush