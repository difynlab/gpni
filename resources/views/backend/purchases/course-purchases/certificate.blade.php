@extends('backend.layouts.app')

@section('title', 'Course Certificate')

@section('content')

    <x-backend.breadcrumb page_name="Course Certificate"></x-backend.breadcrumb>

    <div class="static-pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.purchases.course-purchases.index') }}" class="back-button">
                    Back
                </a>
            </div>
        </div>

        <form action="{{ route('backend.purchases.course-purchases.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Certificate Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <!-- <div class="mb-4">
                            @if($certificate->certificate)
                                <label for="pdf" class="form-label">Certificate<span class="asterisk">*</span></label>

                                <div class="row align-items-center">
                                    <div class="col-11">
                                        <input type="file" class="form-control" id="new_certificate" name="new_certificate" placeholder="PDF" accept=".pdf">
                                        <x-backend.input-error field="new_certificate"></x-backend.input-error>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ asset('storage/backend/courses/course-certificates/' . $certificate->certificate) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                        <input type="hidden" class="form-control" name="old_certificate" value="{{ $certificate->certificate }}">
                                    </div>
                                </div>
                            @else
                                <label for="new_certificate" class="form-label">Certificate<span class="asterisk">*</span></label>
                                <input type="file" class="form-control" id="new_certificate" name="new_certificate" placeholder="PDF" accept=".pdf" required>
                                <x-backend.input-error field="new_certificate"></x-backend.input-error>
                            @endif
                        </div> -->

                        <!-- <div> -->
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label mb-0">Certificate/s<span class="asterisk">*</span></label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button certificates">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($certificate->certificates)
                                @foreach(json_decode($certificate->certificates) as $cert)
                                    <div class="row single-item mt-2">
                                        <div class="col">
                                            <input type="text" class="form-control" name="old_certificate_dates[]" value="{{ $cert->date }}" placeholder="Date">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="old_certificate_times[]" value="{{ $cert->time }}" placeholder="Time">
                                        </div>
                                        <div class="col-1 d-flex align-items-center">
                                            <input type="hidden" name="old_certificate_files[]" value="{{ $cert->file }}">

                                            <a href="{{ asset('storage/backend/courses/course-certificates/' . $cert->file) }}" class="download-button" download><i class="bi bi-download"></i></a>

                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-2">
                                <div class="col-12">
                                    <x-backend.input-error field="certificate_files.*"></x-backend.input-error>
                                </div>
                            </div>
                        <!-- </div> -->

                        <!-- <div class="mb-4">
                            <label for="certificate_issued_date" class="form-label">Certificate Issued Date</label>
                            <input type="date" class="form-control" id="certificate_issued_date" name="certificate_issued_date" value="" placeholder="Certificate Issued Date">
                        </div>

                        <div>
                            <label for="certificate_issued_time" class="form-label">Certificate Issued Time (HH:MM)</label>
                            <input type="text" class="form-control" id="certificate_issued_time" name="certificate_issued_time" value="" step="60" placeholder="Certificate Issued Time">
                            <x-backend.input-error field="certificate_issued_time"></x-backend.input-error>
                        </div> -->
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$certificate"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button.certificates').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-5">
                                <input type="file" class="form-control" name="certificate_files[]" accept=".pdf" required>
                            </div>

                            <div class="col-3">
                                <input type="date" class="form-control" name="certificate_dates[]" placeholder="Date" required>
                            </div>

                            <div class="col-3">
                                <input type="text" class="form-control" name="certificate_times[]" placeholder="Time">
                            </div>
                            
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush