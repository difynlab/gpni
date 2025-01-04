@extends('backend.layouts.app')

@section('title', 'Create User')

@section('content')

    <x-backend.breadcrumb page_name="Create User"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">User Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="first_name" class="form-label">First Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="last_name" class="form-label">Last Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email" class="form-label">Email<span class="asterisk">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <x-backend.input-error field="email"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        <x-backend.input-error field="phone"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label class="form-label">Country<span class="asterisk">*</span></label>
                        <select class="form-control form-select country" name="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 mb-4 position-relative">
                        <label for="password" class="form-label">Password<span class="asterisk">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="* * * * * * * *" required>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="password"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4 position-relative">
                        <label for="confirm_password" class="form-label">Confirm Password<span class="asterisk">*</span></label>
                        <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password" placeholder="* * * * * * * *" required>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="confirm_password"></x-backend.input-error>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ old('image') }}" new_name="new_image" path="persons/users" label="User"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Nutritionist Details</p>

                <div class="row form-input">
                    <div class="col-2 mb-4">
                        <label for="first_name" class="form-label">Is Certified?</label>
                        <div class="form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_certified" {{ old('is_certified') == '1' ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="last_name" class="form-label">Certificates</label>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_sns" name="is_sns" {{ old('is_sns') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_sns">SNS</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_snc" name="is_snc" {{ old('is_snc') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_snc">SNC</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_cissn" name="is_cissn" {{ old('is_cissn') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_cissn">CISSN</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_pne" name="is_pne" {{ old('is_pne') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_pne">PNE</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="certificate_number" class="form-label">Certificate Number</label>

                        <input type="text" class="form-control" id="certificate_number" name="certificate_number" placeholder="Certificate Number" value="{{ old('certificate_number') }}">
                    </div>
                    
                    <div class="col-4">
                        <label for="cec_status" class="form-label">CEC Status</label>
                        <select class="form-control form-select" id="cec_status" name="cec_status">
                            <option value="">Select</option>
                            <option value="1" {{ old('cec_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('cec_status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="membership_credential_status" class="form-label">Membership Credentials Status</label>
                        <select class="form-control form-select" id="membership_credential_status" name="membership_credential_status">
                            <option value="">Select</option>
                            <option value="1" {{ old('membership_credential_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('membership_credential_status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="is_qualified" class="form-label">Is Qualified?</label>
                        <select class="form-control form-select" id="is_qualified" name="is_qualified">
                            <option value="">Select</option>
                            <option value="1" {{ old('is_qualified') == '1' ? 'selected' : '' }}>Qualified</option>
                            <option value="2" {{ old('is_qualified') == '2' ? 'selected' : '' }}>Unqualified</option>
                        </select>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>

    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
            
            if($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush