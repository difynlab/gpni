@extends('frontend.layouts.app')

@section('title', 'Qualifications')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/qualifications.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="container-main">
                    <x-frontend.notification></x-frontend.notification>

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-qualifications-tab" data-bs-toggle="pill" data-bs-target="#pills-qualifications" type="button" role="tab" aria-controls="pills-qualifications" aria-selected="true">{{ $student_dashboard_contents->qualifications_title }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-cec-tab" data-bs-toggle="pill" data-bs-target="#pills-cec" type="button" role="tab" aria-controls="pills-cec" aria-selected="false">{{ $student_dashboard_contents->qualifications_cec_title }}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-qualifications" role="tabpanel" aria-labelledby="pills-qualifications-tab" tabindex="0">
                            <form action="{{ route('frontend.qualifications') }}" method="GET">
                                <div class="search-bar">
                                    <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" alt="Search Icon" width="18" height="18">
                                    <input type="text" name="qualification" placeholder="{{ $student_dashboard_contents->qualifications_search }}" value="{{ $qualification ?? '' }}">
                                </div>
                            </form>

                            <div class="certificate-list">
                                @if(count($obtained_certificates) > 0)
                                    @foreach($obtained_certificates as $obtained_certificate)
                                        @foreach($obtained_certificate['certificates'] as $single_certificate)
                                            <div class="certificate-card">
                                                <div class="certificate-header">
                                                    <div class="title">{{ $obtained_certificate['course_title'] }}</div>

                                                    <a href="{{ asset('storage/backend/courses/course-certificates/' . $single_certificate->file) }}" class="download-button" download>{{ $student_dashboard_contents->qualifications_download }}<i class="bi bi-download"></i></a>
                                                </div>

                                                <p class="certificate-issued">{{ $student_dashboard_contents->qualifications_issued }}: <span>{{ $single_certificate->date }} | {{ $single_certificate->time }}</span></p>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @else
                                    <p class="no-data">{{ $student_dashboard_contents->qualifications_no_certificates }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-cec" role="tabpanel" aria-labelledby="pills-cec-tab" tabindex="0">
                            <div class="row align-items-center mb-4">
                                <div class="col-6">
                                    <button class="cec-points">{{ $student_dashboard_contents->qualifications_cec_points }}: {{ $student->cec_balance }}</button>
                                </div>

                                <div class="col-6 text-end">
                                    <button type="button" class="cec-point-request" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ $student_dashboard_contents->qualifications_cec_point_request }}</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-container">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ $student_dashboard_contents->qualifications_cec_first_column }}</th>
                                                    <th>{{ $student_dashboard_contents->qualifications_cec_second_column }}</th>
                                                    <th>{{ $student_dashboard_contents->qualifications_cec_third_column }}</th>
                                                    <th>{{ $student_dashboard_contents->qualifications_cec_fourth_column }}</th>
                                                    <th>{{ $student_dashboard_contents->qualifications_cec_fifth_column }}</th>
                                                    <th>{{ $student_dashboard_contents->qualifications_cec_sixth_column }}</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if($cec_point_activities->isNotEmpty())
                                                    @foreach($cec_point_activities as $cec_point_activity)
                                                        <tr>
                                                            <td>{{ $cec_point_activity->id }}</td>
                                                            <td>{{ App\Models\Course::find($cec_point_activity->course_id)->title }}</td> 
                                                            <td>{{ $cec_point_activity->type }}</td>
                                                            <td>{{ $cec_point_activity->admin_comment ?? '-' }}</td>
                                                            <td>{{ $cec_point_activity->user_comment ?? '-' }}</td>
                                                            <td>{{ $cec_point_activity->points }}</td>
                                                            <td>
                                                                @if($cec_point_activity->status == '1')
                                                                    <span class="text-success">{{ $student_dashboard_contents->qualifications_cec_sixth_approved }}</span>
                                                                @else
                                                                    <span class="text-warning">{{ $student_dashboard_contents->qualifications_cec_sixth_pending }}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" style="text-align: center;">{{ $student_dashboard_contents->qualifications_no_cec }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('frontend.cec.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $student_dashboard_contents->qualifications_cec_point_request }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row form-input">
                                                    <div class="col-12">
                                                        <div class="mb-4">
                                                            <label for="points" class="form-label">{{ $student_dashboard_contents->	qualifications_cec_no_of_points }}<span class="asterisk">*</span></label>
                                                            <input type="text" class="form-control" id="points" name="points" value="{{ old('points') }}" placeholder="{{ $student_dashboard_contents->	qualifications_cec_no_of_points }}" required>
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="course_id" class="form-label">{{ $student_dashboard_contents->	qualifications_cec_course }}<span class="asterisk">*</span></label>
                                                            <select class="form-control form-select" id="course_id" name="course_id" required>
                                                                <option value="">{{ $student_dashboard_contents->qualifications_cec_select_course }}</option>
                                                                @foreach($cec_courses as $cec_course)
                                                                    <option value="{{ $cec_course->id }}" {{ old('cec_course') == $cec_course->id ? 'selected' : '' }}>{{ $cec_course->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <label for="user_comment" class="form-label">{{ $student_dashboard_contents->qualifications_cec_comment }}</label>
                                                            <textarea name="user_comment" class="form-control textarea" id="user_comment" value="{{ old('user_comment') }}" placeholder="{{ $student_dashboard_contents->qualifications_cec_comment }}" rows="5">{{ old('user_comment') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">{{ $student_dashboard_contents->qualifications_cec_close }}</button>
                                                <button type="submit" class="btn btn-primary rounded-0">{{ $student_dashboard_contents->qualifications_cec_submit }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection