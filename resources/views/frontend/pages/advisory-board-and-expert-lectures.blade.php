@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/advisory-board-and-expert-lectures.css') }}">
@endpush

@section('content')

    <div class="container py-5">
        @if ($contents->title_en)
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="heading-text mb-3 fs-49">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</div>
                    <div class="description-text fs-25">{!! $contents->{'description_' . $middleware_language} ?? $contents->description_en !!}</div>
                </div>
            </div>
        @endif

        <div class="row">
            @if ($advisory_boards->isNotEmpty())
                @foreach ($advisory_boards as $advisory_board)
                    <div class="col-md-3 mt-2">
                        <div class="card" role="button" data-bs-toggle="modal"
                            data-bs-target="#my-modal-{{ $advisory_board->id }}">
                            <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}"
                                class="card-img-top" alt="{{ $advisory_board->name }}">

                            <div class="card-body">
                                <div class="card-title text-primary">{{ $advisory_board->name }}</div>
                                <div class="card-subtitle mb-1">{{ $advisory_board->designations }}</div>
                                <div class="card-text text-muted fs-20"> {!! $advisory_board->description !!}</div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="my-modal-{{ $advisory_board->id }}" style="padding-left: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button type="button" class="close" data-bs-dismiss="modal">
                                    <img src="{{ asset('storage/frontend/close.svg') }}" alt="Close">
                                </button>

                                <div class="modal-body">
                                    <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}"
                                        class="popup-image" alt="{{ $advisory_board->name }}">

                                    <div class="popup-content">
                                        <div class="popup-info">
                                            <div class="popup-title">{{ $advisory_board->name }}</div>
                                            <div class="popup-designation">{{ $advisory_board->designations }}</div>
                                        </div>

                                        <div class="popup-description">{!! $advisory_board->description !!}</div>

                                        <div class="social-icons">
                                            @if ($advisory_board->fb)
                                                <a href="{{ $advisory_board->fb }}" target="_blank"><img
                                                        src="{{ asset('storage/frontend/advisory-fb.svg') }}"
                                                        alt="Facebook"></a>
                                            @endif

                                            @if ($advisory_board->linkedin)
                                                <a href="{{ $advisory_board->linkedin }}" target="_blank"><img
                                                        src="{{ asset('storage/frontend/advisory-linkedin.svg') }}"
                                                        alt="LinkedIn"></a>
                                            @endif
                                        </div>
                                        
                                        <!-- Added spacing div -->
                                        <div class="spacing-div"></div>

                                    </div>

                                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->logo) }}"
                                        class="gpni-logo-advisory" alt="GPNi">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
