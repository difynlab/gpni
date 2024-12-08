@extends('backend.layouts.app')

@section('title', 'Nutritionist')

@section('content')

    <x-backend.breadcrumb page_name="Nutritionist"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.nutritionist.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="sub_title_{{ $short_code }}" name="sub_title_{{ $short_code }}" value="{{ $contents->{'sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection