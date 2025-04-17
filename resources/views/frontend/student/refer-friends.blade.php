@extends('frontend.layouts.app')

@section('title', 'Refer Friends')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/refer-friends.css') }}">
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
                            <button class="nav-link active" id="pills-refer-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-refer-friends" type="button" role="tab" aria-controls="pills-refer-friends" aria-selected="true">{{ $student_dashboard_contents->refer_friends_title }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-refer-points-tab" data-bs-toggle="pill" data-bs-target="#pills-refer-points" type="button" role="tab" aria-controls="pills-refer-points" aria-selected="false">{{ $student_dashboard_contents->refer_withdraw_title }}</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-refer-friends" role="tabpanel" aria-labelledby="pills-refer-friends-tab" tabindex="0">
                            <form action="{{ route('frontend.refer-friends.store') }}" method="POST">
                                @csrf
                                <div class="row form-control-container">
                                    <div class="col-12">
                                        <label for="email" class="form-label">{{ $student_dashboard_contents->refer_friends_email }}</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ $student_dashboard_contents->refer_friends_email_placeholder }}" required>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-submit">{{ $student_dashboard_contents->refer_friends_button }}</button>
                                    </div>
                                </div>
                            </form>

                            <a class="view-history" style="cursor: pointer;">
                                <img src="{{ asset('storage/frontend/history-clock-icon.svg') }}" class="icon-history" alt="History Icon" width="22" height="22">
                                {{ $student_dashboard_contents->refer_friends_view_history }}
                            </a>
                    
                            <div class="history d-none">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ $student_dashboard_contents->refer_friends_first_column }}</th>
                                            <th>{{ $student_dashboard_contents->refer_friends_second_column }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($invites) > 0)
                                            @foreach($invites as $invite)
                                                <tr>
                                                    <td>{{ $invite->id }}</td>
                                                    <td>{{ $invite->email }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2" style="text-align: center;">{{ $student_dashboard_contents->refer_friends_no_data }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-refer-points" role="tabpanel" aria-labelledby="pills-refer-points-tab" tabindex="0">
                            <div class="row align-items-center mb-4">
                                <div class="col-6">
                                    <button class="refer-points">{{ $student_dashboard_contents->refer_withdraw_points }}: {{ $refer_point_balance }}</button>
                                </div>

                                @if($refer_point_balance != '0.00')
                                    <div class="col-6 text-end">
                                        <button type="button" class="refer-point-request" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ $student_dashboard_contents->refer_withdraw_point_request }}</button>
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-container">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>{{ $student_dashboard_contents->refer_withdraw_point_first_column }}</th>
                                                    <th>{{ $student_dashboard_contents->refer_withdraw_point_second_column }}</th>
                                                    <th>{{ $student_dashboard_contents->refer_withdraw_point_third_column }}</th>
                                                    <th>{{ $student_dashboard_contents->refer_withdraw_point_fourth_column }}</th>
                                                    <th>{{ $student_dashboard_contents->refer_withdraw_point_fifth_column }}</th>
                                                    <th>{{ $student_dashboard_contents->refer_withdraw_point_sixth_column }}</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if($refer_point_activities->isNotEmpty())
                                                    @foreach($refer_point_activities as $refer_point_activity)
                                                        <tr>
                                                            <td>{{ $refer_point_activity->activity }}</td>
                                                            <td>{{ $refer_point_activity->type }}</td> 
                                                            <td>{{ $refer_point_activity->date }}</td>
                                                            <td>{{ $refer_point_activity->time }}</td>
                                                            <td>{{ $refer_point_activity->points }}</td>
                                                            <td>{{ $refer_point_activity->balance }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6" style="text-align: center;">{{ $student_dashboard_contents->refer_withdraw_point_no_points }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('frontend.refer-friends.withdraw') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $student_dashboard_contents->refer_withdraw_point_request }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row form-input">
                                                    <div class="col-12">
                                                        <label for="points" class="form-label">{{ $student_dashboard_contents->	refer_withdraw_no_of_points }}<span class="asterisk">*</span></label>
                                                        <input type="text" class="form-control" id="points" name="points" value="{{ old('points') }}" placeholder="{{ $student_dashboard_contents->	refer_withdraw_no_of_points }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">{{ $student_dashboard_contents->refer_withdraw_point_close }}</button>
                                                <button type="submit" class="btn btn-primary rounded-0">{{ $student_dashboard_contents->refer_withdraw_point_submit }}</button>
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

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.view-history').on('click', function() {
                $('.history').toggleClass('d-none');
            });
        });
    </script>
@endpush