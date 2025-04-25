@extends('frontend.layouts.app')

@section('title', 'Wallet')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/wallet.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="container-main">
                    <div class="header-section">
                        <h1>{{ $student_dashboard_contents->wallet_title }}</h1>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-12 text-end">
                            <button class="wallet-balance">{{ $student_dashboard_contents->wallet_balance }}: {{ $wallet->balance }}</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-container">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>{{ $student_dashboard_contents->wallet_first_column }}</th>
                                            <th>{{ $student_dashboard_contents->wallet_second_column }}</th>
                                            <th>{{ $student_dashboard_contents->wallet_third_column }}</th>
                                            <th>{{ $student_dashboard_contents->wallet_fourth_column }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($activities->isNotEmpty())
                                            @foreach($activities as $activity)
                                                <tr>
                                                    <td>{{ $activity->activity }}</td>
                                                    <td>{{ $activity->date }}</td>
                                                    <td>{{ $activity->time }}</td>
                                                    <td>{{ $activity->amount }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="text-align: center;">{{ $student_dashboard_contents->wallet_no_records }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection