@extends('frontend.layouts.app')

@section('title', 'Member Corner')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-storage-corner.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard-members">
        <div class="row p-lg-5 p-3 m-0">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="header mb-4">{{ $student_dashboard_contents->member_corner_title }}</div>

                <div class="container-main mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="header">{{ $student_dashboard_contents->member_corner_top_title }}</div>
                    </div>
                    <div class="table-container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ $student_dashboard_contents->member_corner_top_first_column }}</th>
                                    <th>{{ $student_dashboard_contents->member_corner_top_second_column }}</th>
                                    <th>{{ $student_dashboard_contents->member_corner_top_third_column }}</th>
                                    <th>{{ $student_dashboard_contents->member_corner_top_fourth_column }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        @if($student->member_type == 'Annual')
                                            {{ $student_dashboard_contents->member_corner_top_first_annual }}
                                        @else
                                            {{ $student_dashboard_contents->member_corner_top_first_lifetime }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($student->member_type == 'Annual')
                                            {{ $student->member_annual_expiry_date }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($student->member_type == 'Annual')
                                            @if($student->member_annual_expiry_date >= Carbon\Carbon::now()->toDateString())
                                                {{ $student_dashboard_contents->member_corner_top_third_active }}
                                            @else
                                                {{ $student_dashboard_contents->member_corner_top_third_inactive }}
                                            @endif
                                        @else
                                            {{ $student_dashboard_contents->member_corner_top_third_active }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('frontend.memberships.index') }}" class="btn member-button">{{ $student_dashboard_contents->member_corner_top_fourth_action }}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if(
                    ($student->member_type == "Lifetime")
                    ||
                    ($student->member_type == "Annual" && $student->member_annual_expiry_date >= Carbon\Carbon::now()->toDateString())
                )
                    <div class="container-main mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="header">{{ $student_dashboard_contents->member_corner_middle_title }}</div>
                        </div>
                        <div class="table-container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ $student_dashboard_contents->member_corner_middle_first_column }}</th>
                                        <th>{{ $student_dashboard_contents->member_corner_middle_second_column }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($member_courses as $member_course)
                                        <tr>
                                            <td>{{ $member_course->title }}</td>
                                            <td>
                                                <a href="{{ route('frontend.courses.show', $member_course) }}" class="btn member-button">{{ $student_dashboard_contents->member_corner_middle_second_action }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $member_courses->links("pagination::bootstrap-5") }}
                    </div>

                    <div class="container-main">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="header">{{ $student_dashboard_contents->member_corner_third_title }}</div>
                        </div>
                        
                        <ul class="nav nav-pills justify-content-evenly mb-4" id="pills-tab" role="tablist">
                            @php
                                $media_types = [
                                    $student_dashboard_contents->my_storage_corner_first_tab,
                                    $student_dashboard_contents->my_storage_corner_second_tab,
                                    $student_dashboard_contents->my_storage_corner_third_tab,
                                    $student_dashboard_contents->my_storage_corner_fourth_tab,
                                    $student_dashboard_contents->my_storage_corner_fifth_tab,
                                    $student_dashboard_contents->my_storage_corner_sixth_tab,
                                    $student_dashboard_contents->my_storage_corner_seventh_tab,
                                    $student_dashboard_contents->my_storage_corner_eighth_tab,
                                    $student_dashboard_contents->my_storage_corner_ninth_tab,
                                ];
                            @endphp

                            @foreach($media_types as $media_type)
                                <li class="nav-item">
                                    <a class="nav-link {{ $type == $media_type ? 'active' : '' }}" href="{{ route('frontend.member-corner', ['type' => $media_type]) }}" role="tab">
                                        {{ $media_type }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" role="tabpanel" tabindex="0">
                                <div class="table-container">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ $student_dashboard_contents->my_storage_corner_first_column }}</th>
                                                <th>{{ $student_dashboard_contents->my_storage_corner_second_column }}</th>
                                                <th>{{ $student_dashboard_contents->my_storage_corner_third_column }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($medias->isNotEmpty())
                                                @foreach($medias as $media)
                                                    <tr>
                                                        <td>{{ $media->id }}</td>
                                                        <td>
                                                            {{ $media->name }}
                                                        </td>
                                                        <td>
                                                            @if($media->type == $student_dashboard_contents->my_storage_corner_second_tab)
                                                                <img src="{{ asset('storage/backend/medias/' . $media->image) }}" alt="{{ $media->name }}" style="width: 100%; max-width: 300px; height: auto; min-height: 170px; object-fit: cover;">
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_third_tab)
                                                                <video class="video-player" src="{{ asset('storage/backend/medias/' . $media->video) }}" controls style="width: 100%; max-width: 300px; height: auto; min-height: 170px; object-fit: cover;"></video>
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_fourth_tab)
                                                                <a class="text-decoration-none" href="{{ $media->vimeo_video_link }}" target="_blank">{{ $student_dashboard_contents->my_storage_corner_play_now }}</a>
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_fifth_tab)
                                                                <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->pdf) }}" target="_blank">{{ $student_dashboard_contents->my_storage_corner_download }}</a>
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_sixth_tab)
                                                                <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->word) }}" target="_blank">{{ $student_dashboard_contents->my_storage_corner_download }}</a>
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_seventh_tab)
                                                                <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->excel) }}" target="_blank">{{ $student_dashboard_contents->my_storage_corner_download }}</a>
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_eighth_tab)
                                                                <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->ppt) }}" target="_blank">{{ $student_dashboard_contents->my_storage_corner_download }}</a>
                                                            @elseif($media->type == $student_dashboard_contents->my_storage_corner_ninth_tab)
                                                                <audio src="{{ asset('storage/backend/medias/' . $media->audio) }}" type="audio/mpeg" controls style="width: 100%; max-width: 300px;"></audio>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                {{ $medias->appends(['type' => $type])->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="container-main mt-4">
                    <div class="header social-groups-header mb-3">{{ $student_dashboard_contents->member_corner_fourth_title }}</div>
                    <div class="social-groups">
                        <div class="social-items d-flex justify-content-between align-items-center">
                            <div class="social-item text-left">
                                <a href="{{ $student_dashboard_contents->member_corner_fb_link }}">
                                    <i class="bi bi-facebook icon"></i>
                                    <p>{{ $student_dashboard_contents->member_corner_fb }}</p>
                                </a>
                            </div>
                            <div class="social-item text-center">
                                <a href="{{ $student_dashboard_contents->member_corner_skype_link }}">
                                    <i class="bi bi-skype icon"></i>
                                    <p>{{ $student_dashboard_contents->member_corner_skype }}</p>
                                </a>
                            </div>
                            <div class="social-item text-right">
                                @if($student_dashboard_contents->member_corner_we_chat_qr)
                                    <img src="{{ asset('storage/backend/pages/' . $student_dashboard_contents->member_corner_we_chat_qr) }}" alt="QR Image">
                                @else
                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_image) }}" alt="Header Image">
                                @endif

                                <p>{{ $student_dashboard_contents->member_corner_we_chat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection