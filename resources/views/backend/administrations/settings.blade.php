@extends('backend.layouts.app')

@section('title', 'Settings')

@section('content')

    <x-backend.notification></x-backend.notification>
    
    <div class="table-container">

        <x-backend.breadcrumb page_name="Settings"></x-backend.breadcrumb>

        <form action="{{ route('backend.settings.update', 1) }}" method="POST" class="static-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-4 mb-3">
                    <label class="form-label">Name<span class="asterisk">*</span></label>
                    <input class="form-control name" type="text" name="name" value="{{ old('name', $settings->name) }}" required>
                </div>

                <div class="col-4 mb-3">
                    <label class="form-label">Address<span class="asterisk">*</span></label>
                    <input class="form-control address" type="text" name="address" value="{{ old('address', $settings->address) }}" required>
                </div>

                <div class="col-4 mb-3">
                    <label class="form-label">Email<span class="asterisk">*</span></label>
                    <input class="form-control email" type="email" name="email" value="{{ old('email', $settings->email) }}" required>
                </div>

                <div class="col-4 mb-3">
                    <label class="form-label">Phone<span class="asterisk">*</span></label>
                    <input class="form-control phone" type="text" name="phone" value="{{ old('phone', $settings->phone) }}" required>
                </div>

                <div class="col-4 mb-3">
                    <label class="form-label">Mobile<span class="asterisk">*</span></label>
                    <input class="form-control mobile" type="text" name="mobile" value="{{ old('mobile', $settings->mobile) }}" required>
                </div>

                <div class="col-4 mb-3">
                    <label class="form-label">Postal Code<span class="asterisk">*</span></label>
                    <input class="form-control postal_code" type="text" name="postal_code" value="{{ old('postal_code', $settings->postal_code) }}" required>
                </div>

                <div class="col-6 mb-3">
                    <img src="{{ asset('storage/backend/'. $settings->logo) }}" alt="Logo" class="static-image old_logo">
                    <input type="hidden" class="form-control old_logo" name="old_logo" value="{{ $settings->logo }}">

                    <div class="mt-2">
                        <label class="form-label">Logo</label>
                        <input type="file" class="form-control new_logo" name="new_logo">
                        <x-backend.input-error field="new_logo"></x-backend.input-error>
                    </div>
                </div>

                <div class="col-6 mb-3">
                    <img src="{{ asset('storage/backend/'. $settings->favicon) }}" alt="Favicon" class="static-image old_favicon">
                    <input type="hidden" class="form-control old_favicon" name="old_favicon" value="{{ $settings->favicon }}">

                    <div class="mt-2">
                        <label class="form-label">Favicon</label>
                        <input type="file" class="form-control new_favicon" name="new_favicon">
                        <x-backend.input-error field="new_favicon"></x-backend.input-error>
                    </div>
                </div>

                <div class="col-12 mt-4 text-center">
                    <button type="submit" class="btn form-btn" onclick="updateForm()">Update</button>
                </div>
            </div>
        </form>
    </div>

@endsection