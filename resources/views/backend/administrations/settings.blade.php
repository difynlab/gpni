@extends('backend.layouts.app')

@section('title', 'Settings')

@section('content')

    <x-backend.breadcrumb page_name="Settings"></x-backend.breadcrumb>
    
    <div class="static-pages">
        <form action="{{ route('backend.settings.update', 1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="section">
                <p class="inner-page-title">Site Details <span>(Important)</span></p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $settings->name) }}" placeholder="Name" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="lifetime_membership_price_en" class="form-label">Lifetime Membership Price (English)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="lifetime_membership_price_en" name="lifetime_membership_price_en" value="{{ old('lifetime_membership_price_en', $settings->lifetime_membership_price_en) }}" placeholder="Lifetime Membership Price (English)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="lifetime_membership_price_zh" class="form-label">Lifetime Membership Price (Chinese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="lifetime_membership_price_zh" name="lifetime_membership_price_zh" value="{{ old('lifetime_membership_price_zh', $settings->lifetime_membership_price_zh) }}" placeholder="Lifetime Membership Price (Chinese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="lifetime_membership_price_ja" class="form-label">Lifetime Membership Price (Japanese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="lifetime_membership_price_ja" name="lifetime_membership_price_ja" value="{{ old('lifetime_membership_price_ja', $settings->lifetime_membership_price_ja) }}" placeholder="Lifetime Membership Price (Japanese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="annual_membership_price_en" class="form-label">Annual Membership Price (English)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="annual_membership_price_en" name="annual_membership_price_en" value="{{ old('annual_membership_price_en', $settings->annual_membership_price_en) }}" placeholder="Annual Membership Price (English)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="annual_membership_price_zh" class="form-label">Annual Membership Price (Chinese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="annual_membership_price_zh" name="annual_membership_price_zh" value="{{ old('annual_membership_price_zh', $settings->annual_membership_price_zh) }}" placeholder="Annual Membership Price (Chinese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="annual_membership_price_ja" class="form-label">Annual Membership Price (Japanese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="annual_membership_price_ja" name="annual_membership_price_ja" value="{{ old('annual_membership_price_ja', $settings->annual_membership_price_ja) }}" placeholder="Annual Membership Price (Japanese)" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email_en" class="form-label">Email (English)<span class="asterisk">*</span></label>
                        <input type="email" class="form-control" id="email_en" name="email_en" value="{{ old('email_en', $settings->email_en) }}" placeholder="Email" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="whatsapp_en" class="form-label">Whatsapp (English)</label>
                        <input type="text" class="form-control" id="whatsapp_en" name="whatsapp_en" value="{{ old('whatsapp_en', $settings->whatsapp_en) }}" placeholder="Whatsapp">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email_zh" class="form-label">Email (Chinese)</label>
                        <input type="email" class="form-control" id="email_zh" name="email_zh" value="{{ old('email_zh', $settings->email_zh) }}" placeholder="Email">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="whatsapp_zh" class="form-label">Whatsapp (Chinese)</label>
                        <input type="text" class="form-control" id="whatsapp_zh" name="whatsapp_zh" value="{{ old('whatsapp_zh', $settings->whatsapp_zh) }}" placeholder="Whatsapp">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email_ja" class="form-label">Email (Japanese)</label>
                        <input type="email" class="form-control" id="email_ja" name="email_ja" value="{{ old('email_ja', $settings->email_ja) }}" placeholder="Email">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="whatsapp_ja" class="form-label">Whatsapp (Japanese)</label>
                        <input type="text" class="form-control" id="whatsapp_ja" name="whatsapp_ja" value="{{ old('whatsapp_ja', $settings->whatsapp_ja) }}" placeholder="Whatsapp">
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_logo" old_value="{{ $settings->{'logo'} ?? '' }}" new_name="new_logo" label="Logo" path="main"></x-backend.upload-image>
                        <x-backend.input-error field="new_logo"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_favicon" old_value="{{ $settings->{'favicon'} ?? '' }}" new_name="new_favicon" label="Favicon" path="main"></x-backend.upload-image>
                        <x-backend.input-error field="new_favicon"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Site Details <span>(Social medias)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="fb_en" class="form-label">FB (English)</label>
                        <input type="url" class="form-control" id="fb_en" name="fb_en" value="{{ old('fb_en', $settings->fb_en) }}" placeholder="FB">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="instagram_en" class="form-label">Instagram (English)</label>
                        <input type="url" class="form-control" id="instagram_en" name="instagram_en" value="{{ old('instagram_en', $settings->instagram_en) }}" placeholder="Instagram">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weibo_en" class="form-label">Weibo (English)</label>
                        <input type="url" class="form-control" id="weibo_en" name="weibo_en" value="{{ old('weibo_en', $settings->weibo_en) }}" placeholder="Weibo">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weixin_en" class="form-label">Weixin (English)</label>
                        <input type="url" class="form-control" id="weixin_en" name="weixin_en" value="{{ old('weixin_en', $settings->weixin_en) }}" placeholder="Weixin">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="youtube_en" class="form-label">Youtube (English)</label>
                        <input type="url" class="form-control" id="youtube_en" name="youtube_en" value="{{ old('youtube_en', $settings->youtube_en) }}" placeholder="Youtube">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="linkedin_en" class="form-label">Linkedin (English)</label>
                        <input type="url" class="form-control" id="linkedin_en" name="linkedin_en" value="{{ old('linkedin_en', $settings->linkedin_en) }}" placeholder="Linkedin">
                    </div>

                    <div class="col-6">
                        <label for="twitter_en" class="form-label">Twitter (English)</label>
                        <input type="url" class="form-control" id="twitter_en" name="twitter_en" value="{{ old('twitter_en', $settings->twitter_en) }}" placeholder="Twitter">
                    </div>
                </div>

                <hr style="border: 1px solid rgb(195 195 195); margin-top: 0; margin-bottom: 1.5%;">

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="fb_zh" class="form-label">FB (Chinese)</label>
                        <input type="url" class="form-control" id="fb_zh" name="fb_zh" value="{{ old('fb_zh', $settings->fb_zh) }}" placeholder="FB">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="instagram_zh" class="form-label">Instagram (Chinese)</label>
                        <input type="url" class="form-control" id="instagram_zh" name="instagram_zh" value="{{ old('instagram_zh', $settings->instagram_zh) }}" placeholder="Instagram">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weibo_zh" class="form-label">Weibo (Chinese)</label>
                        <input type="url" class="form-control" id="weibo_zh" name="weibo_zh" value="{{ old('weibo_zh', $settings->weibo_zh) }}" placeholder="Weibo">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weixin_zh" class="form-label">Weixin (Chinese)</label>
                        <input type="url" class="form-control" id="weixin_zh" name="weixin_zh" value="{{ old('weixin_zh', $settings->weixin_zh) }}" placeholder="Weixin">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="youtube_zh" class="form-label">Youtube (Chinese)</label>
                        <input type="url" class="form-control" id="youtube_zh" name="youtube_zh" value="{{ old('youtube_zh', $settings->youtube_zh) }}" placeholder="Youtube">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="linkedin_zh" class="form-label">Linkedin (Chinese)</label>
                        <input type="url" class="form-control" id="linkedin_zh" name="linkedin_zh" value="{{ old('linkedin_zh', $settings->linkedin_zh) }}" placeholder="Linkedin">
                    </div>

                    <div class="col-6">
                        <label for="twitter_zh" class="form-label">Twitter (Chinese)</label>
                        <input type="url" class="form-control" id="twitter_zh" name="twitter_zh" value="{{ old('twitter_zh', $settings->twitter_zh) }}" placeholder="Twitter">
                    </div>
                </div>

                <hr style="border: 1px solid rgb(195 195 195); margin-top: 0; margin-bottom: 1.5%;">

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="fb_ja" class="form-label">FB (Japanese)</label>
                        <input type="url" class="form-control" id="fb_ja" name="fb_ja" value="{{ old('fb_ja', $settings->fb_ja) }}" placeholder="FB">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="instagram_ja" class="form-label">Instagram (Japanese)</label>
                        <input type="url" class="form-control" id="instagram_ja" name="instagram_ja" value="{{ old('instagram_ja', $settings->instagram_ja) }}" placeholder="Instagram">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weibo_ja" class="form-label">Weibo (Japanese)</label>
                        <input type="url" class="form-control" id="weibo_ja" name="weibo_ja" value="{{ old('weibo_ja', $settings->weibo_ja) }}" placeholder="Weibo">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weixin_ja" class="form-label">Weixin (Japanese)</label>
                        <input type="url" class="form-control" id="weixin_ja" name="weixin_ja" value="{{ old('weixin_ja', $settings->weixin_ja) }}" placeholder="Weixin">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="youtube_ja" class="form-label">Youtube (Japanese)</label>
                        <input type="url" class="form-control" id="youtube_ja" name="youtube_ja" value="{{ old('youtube_ja', $settings->youtube_ja) }}" placeholder="Youtube">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="linkedin_ja" class="form-label">Linkedin (Japanese)</label>
                        <input type="url" class="form-control" id="linkedin_ja" name="linkedin_ja" value="{{ old('linkedin_ja', $settings->linkedin_ja) }}" placeholder="Linkedin">
                    </div>

                    <div class="col-6">
                        <label for="twitter_ja" class="form-label">Twitter (Japanese)</label>
                        <input type="url" class="form-control" id="twitter_ja" name="twitter_ja" value="{{ old('twitter_ja', $settings->twitter_ja) }}" placeholder="Twitter">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Site Images <span>(Other images)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <x-backend.upload-image old_name="old_guest_image" old_value="{{ $settings->{'guest_image'} ?? '' }}" new_name="new_guest_image" label="Guest" path="main"></x-backend.upload-image>
                        <x-backend.input-error field="new_guest_image"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <x-backend.upload-image old_name="old_footer_logo" old_value="{{ $settings->{'footer_logo'} ?? '' }}" new_name="new_footer_logo" label="Footer Logo" path="main"></x-backend.upload-image>
                        <x-backend.input-error field="new_footer_logo"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_no_image" old_value="{{ $settings->{'no_image'} ?? '' }}" new_name="new_no_image" label="No" path="main"></x-backend.upload-image>
                        <x-backend.input-error field="new_no_image"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_no_profile_image" old_value="{{ $settings->{'no_profile_image'} ?? '' }}" new_name="new_no_profile_image" label="No Profile" path="main"></x-backend.upload-image>
                        <x-backend.input-error field="new_no_profile_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save Updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush