@extends('frontend.layouts.app')

@section('title', 'Advisory Board')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/advisory-board.css') }}">
@endpush

@section('content')

    <div class="container mt-5">

        <!-- SECTION 01-->
        @if($contents->{'title_en'})
            <div class="row">
                <div class="container">
                    <h2>{{ $contents->{'title_'. $language} ?? $contents->{'title_en'} }}</h2>
                    <p>{!! $contents->{'description_'. $language} ?? $contents->{'description_en'} !!}</p>
                </div>
            </div>
        @endif
        <!-- END OF SECTION 01 -->
        
        <!-- SECTION 02-->
        <div class="row gap-32">
            @foreach($advisory_boards as $advisory_board)
                <div class="col-md-4 mb-4">
                    <div class="card" role="button" data-bs-toggle="modal" data-bs-target="#my-modal-{{ $advisory_board->id }}">
                        @if($advisory_board->image)
                          <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="card-img-top" alt="{{ $advisory_board->name }}">
                        @else
                          <img src="{{ asset('storage/backend/persons/advisory-boards/' . App\Models\Setting::find(1)->no_image) }}" class="card-img-top" alt="{{ $advisory_board->name }}">
                        @endif

                        <div class="card-body bg-light">
                            <h5 class="card-title text-primary">{{ $advisory_board->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-info">{{ $advisory_board->designations }}</h6>
                            <p class="card-text text-muted">{!! $advisory_board->description !!}</p>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="my-modal-{{ $advisory_board->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">
                              <img src="{{ asset('storage/frontend/close.svg') }}" alt="Close">
                            </button>

                            <div class="modal-body">
                              @if($advisory_board->image)
                                  <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="popup-image" alt="{{ $advisory_board->name }}">
                              @else
                                  <img src="{{ asset('storage/backend/persons/advisory-boards/' . App\Models\Setting::find(1)->no_image) }}" class="popup-image" alt="{{ $advisory_board->name }}">
                              @endif

                              <div class="popup-content">
                                <div class="popup-info">
                                  <h3>{{ $advisory_board->name }}</h3>
                                  <h4>{{ $advisory_board->designations }}</h4>
                                </div>
                                <div class="popup-description">{!! $advisory_board->description !!}
                                </div>
                                <div class="social-icons">
                                  <img src="{{ asset('storage/frontend/advisory-fb.svg') }}" alt="Facebook">
                                  <img src="{{ asset('storage/frontend/advisory-linkedin.svg') }}" alt="LinkedIn">
                                </div>
                              </div>
                              <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" class="gpni-logo" alt="GPNi">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- END OF SECTION 02 -->
    </div>

@endsection