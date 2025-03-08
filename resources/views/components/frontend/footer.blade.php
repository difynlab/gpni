@php
    $contents = App\Models\CommonContent::find(1);
@endphp

<div class="footer">
    <div class="container py-4 py-lg-5 px-3 px-md-0">
        <div class="row gy-4 mb-5">
            <div class="col-12 col-md-4 list-of-items">
                <a href="{{ route('frontend.homepage') }}" class="d-inline-block mb-3">
                    <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->footer_logo) }}" alt="GPNi" style="width: 286px; margin-bottom: 20px;"  class="img-fluid gpni-logo">
                    <p class="mt-3 mb-0">{{ $contents->{'footer_powered_' . $middleware_language} ?? $contents->footer_powered_en }} <img src="{{ asset('storage/frontend/powered-by-white.svg') }}" alt="Power Logo" style="width: 20px;"></p>
                </a>
            </div>

            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="footer-title mb-3">{{ $contents->{'footer_get_in_touch_' . $middleware_language} ?? $contents->footer_get_in_touch_en }}</div>

                <div class="row">
                    <div class="col-lg-4 col-6">
                        <a href="{{ App\Models\Setting::find(1)->{'instagram_' . $middleware_language} ?? App\Models\Setting::find(1)->instagram_en }}" class="social-icon" target="blank">
                            <img src="{{ asset('storage/frontend/instagram.svg') }}" alt="Instagram" width="12" height="13">
                            {{ $contents->{'footer_instagram_' . $middleware_language} ?? $contents->footer_instagram_en }}
                        </a>
                    </div>

                    <div class="col-lg-4 col-6">
                        <a href="{{ App\Models\Setting::find(1)->{'fb_' . $middleware_language} ?? App\Models\Setting::find(1)->fb_en }}" class="social-icon" target="blank">
                            <img src="{{ asset('storage/frontend/facebook.svg') }}" alt="Facebook" width=" 8" height="15" ;>
                            {{ $contents->{'footer_facebook_' . $middleware_language} ?? $contents->footer_facebook_en }}
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="{{ App\Models\Setting::find(1)->{'youtube_' . $middleware_language} ?? App\Models\Setting::find(1)->youtube_en }}" class="social-icon" target="blank">
                            <img src="{{ asset('storage/frontend/youtube.svg') }}" alt="YouTube" width="15" height="10">
                            {{ $contents->{'footer_youtube_' . $middleware_language} ?? $contents->footer_youtube_en }}
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="{{ App\Models\Setting::find(1)->{'twitter_' . $middleware_language} ?? App\Models\Setting::find(1)->twitter_en }}" class="social-icon" target="blank">
                            <img src="{{ asset('storage/frontend/twitter.svg') }}" alt="Twitter" width="12" height="12">
                            {{ $contents->{'footer_twitter_' . $middleware_language} ?? $contents->footer_twitter_en }}
                        </a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <a href="{{ App\Models\Setting::find(1)->{'linkedin_' . $middleware_language} ?? App\Models\Setting::find(1)->linkedin_en }}" class="social-icon" target="blank">
                            <img src="{{ asset('storage/frontend/linkedin.svg') }}" alt="LinkedIn" width="13" height="12">
                            {{ $contents->{'footer_linkedin_' . $middleware_language} ?? $contents->footer_linkedin_en }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 px-lg-5">
                <div class="footer-title mb-3">{{ $contents->{'footer_get_latest_' . $middleware_language} ?? $contents->footer_get_latest_en }}</div>

                <form action="{{ route('frontend.subscription') }}" method="POST"  class="newsletter-form">
                    @csrf
                    <div class="subscribe-form mb-3 position-relative">
                        <input type="email" class="form-control subscribe-input flex-grow-1 mb-3 mb-md-0 mr-md-3" name="email" placeholder="{{ $contents->{'footer_placeholder_' . $middleware_language} ?? $contents->footer_placeholder_en }}" required>
                        <button type="submit" class="btn subscribe-button">{{ $contents->{'footer_button_' . $middleware_language} ?? $contents->footer_button_en }}</button>
                    </div>

                    <x-frontend.input-error field="email"></x-frontend.input-error>
                    <x-frontend.notification></x-frontend.notification>
                </form>

                <div class="app-stores mt-4 d-flex align-items-center gap-2">
                    <a href="#"><img src="{{ asset('storage/frontend/play-store.svg') }}" alt="Google Play" style="width: 100px;"></a>
                    <a href="#"><img src="{{ asset('storage/frontend/app-store.svg') }}" alt="App Store" style="width: 100px; margin-right: 10px;"></a>
                </div>
            </div>
        </div>
        
        <div class="row pt-lg-5">
            <!-- About Section -->
            <div class="col-12 col-sm-6 col-lg-3 list-of-items mb-4 mb-lg-0 d-flex justify-content-lg-center">
                <div class="d-flex flex-column">
                    <h5 class="mb-3">{{ $contents->{'footer_about_' . $middleware_language} ?? $contents->footer_about_en }}</h5>
                    <ul class="list-unstyled">
                        <li>
                            @php
                                $first = App\Models\HistoryOfGpniContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.history-of-gpni') }}">{{ $first->{'page_name_' . $middleware_language} !== '' ? $first->{'page_name_' . $middleware_language} : $first->page_name_en }}</a>
                        </li>

                        <li>
                            @php
                                $second = App\Models\WhyWeAreDifferentContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.why-we-are-different') }}">{{ $second->{'page_name_' . $middleware_language} !== '' ? $second->{'page_name_' . $middleware_language} : $second->page_name_en }}</a>
                        </li>

                        <li>
                            @php
                                $third = App\Models\AdvisoryBoardExpertLectureContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.advisory-board-and-expert-lectures') }}">{{ $third->{'page_name_' . $middleware_language} !== '' ? $third->{'page_name_' . $middleware_language} : $third->page_name_en }}</a>
                        </li>

                        <li>
                            @php
                                $fourth = App\Models\MembershipContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.membership') }}">{{ $fourth->{'page_name_' . $middleware_language} !== '' ? $fourth->{'page_name_' . $middleware_language} : $fourth->page_name_en }}</a>
                        </li>

                        <li>
                            @php
                                $fifth = App\Models\NutritionistContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.nutritionists.index') }}">{{ $fifth->{'page_name_' . $middleware_language} !== '' ? $fifth->{'page_name_' . $middleware_language} : $fifth->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $ninth = App\Models\ContactUsContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.contact-us.index') }}">{{ $ninth->{'page_name_' . $middleware_language} !== '' ? $ninth->{'page_name_' . $middleware_language} : $ninth->page_name_en }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Education Section -->  
            <div class="col-12 col-sm-6 col-lg-3 list-of-items mb-4 mb-lg-0 d-flex justify-content-lg-center">
                <div class="d-flex flex-column">
                    <h5 class="mb-3">{{ $contents->{'footer_education_' . $middleware_language} ?? $contents->footer_education_en }}</h5>
                    <ul class="list-unstyled">

                        @if($middleware_language == 'en')
                            @if(App\Models\Course::find(6))
                                <li>
                                    <a href="{{ route('frontend.certification-courses.show', [6, Str::slug(App\Models\Course::find(6)->title)]) }}">PNE Level-1 + SNS</a>
                                </li>
                            @endif

                            @if(App\Models\Course::find(7))
                                <li>
                                    <a href="{{ route('frontend.certification-courses.show', [7, Str::slug(App\Models\Course::find(7)->title)]) }}">PNE Level-2 Masters + CISSN</a>
                                </li>
                            @endif
                        @elseif($middleware_language == 'zh')
                            @if(App\Models\Course::find(25))
                                <li>
                                    <a href="{{ route('frontend.certification-courses.show', [25, Str::slug(App\Models\Course::find(25)->title)]) }}">PNE L1 + ISSN-SNS 中文版</a>
                                </li>
                            @endif

                            @if(App\Models\Course::find(23))
                                <li>
                                    <a href="{{ route('frontend.certification-courses.show', [23, Str::slug(App\Models\Course::find(23)->title)]) }}">PNE LEVEL-2 MASTERS + CISSN 中文</a>
                                </li>
                            @endif
                        @else
                            @if(App\Models\Course::find(24))
                                <li>
                                    <a href="{{ route('frontend.certification-courses.show', [24, Str::slug(App\Models\Course::find(24)->title)]) }}">スポーツ栄養スペシャリスト（PNE L1 + ISSN-SNS）資格認定講座</a>
                                </li>
                            @endif
                        @endif

                        <li>
                            @php
                                $eighth = App\Models\MasterClassContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.master-classes.index') }}">{{ $eighth->{'page_name_' . $middleware_language} !== '' ? $eighth->{'page_name_' . $middleware_language} : $eighth->page_name_en }}</a>
                        </li>

                        <li>
                            <a href="{{ route('frontend.our-policies') }}">{{ $contents->{'footer_education_policy_' . $middleware_language} ?? $contents->footer_education_policy_en }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Partners Section -->
            <div class="col-12 col-sm-6 col-lg-3 list-of-items mb-4 mb-lg-0 d-flex justify-content-lg-center">
                <div class="d-flex flex-column">
                    <h5 class="mb-3">{{ $contents->{'footer_partners_' . $middleware_language} ?? $contents->footer_partners_en }}</h5>
                    <ul class="list-unstyled">
                        <li>
                            @php
                                $tenth = App\Models\InsuranceProfessionalMembershipContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.insurance-and-professional-membership') }}">{{ $tenth->{'page_name_' . $middleware_language} !== '' ? $tenth->{'page_name_' . $middleware_language} : $tenth->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $eleventh = App\Models\GlobalEducationPartnerContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.global-education-partners') }}">{{ $eleventh->{'page_name_' . $middleware_language} !== '' ? $eleventh->{'page_name_' . $middleware_language} : $eleventh->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $twelfth = App\Models\ISSNOfficialPartnerAffiliateContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.issn-official-partners-and-affiliates') }}">{{ $twelfth->{'page_name_' . $middleware_language} !== '' ? $twelfth->{'page_name_' . $middleware_language} : $twelfth->page_name_en }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Others Section -->
            <div class="col-12 col-sm-6 col-lg-3 list-of-items mb-4 mb-lg-0 d-flex justify-content-lg-center">
                <div class="d-flex flex-column">
                    <h5 class="mb-3">{{ $contents->{'footer_other_' . $middleware_language} ?? $contents->footer_other_en }}</h5>
                    <ul class="list-unstyled">
                        <!-- <li><a href="#">Promotion</a></li> -->
                        <li>
                            @php
                                $thirteenth = App\Models\GiftCardContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.gift-cards.index') }}">{{ $thirteenth->{'page_name_' . $middleware_language} !== '' ? $thirteenth->{'page_name_' . $middleware_language} : $thirteenth->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $fourteenth = App\Models\ArticleContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.articles.index') }}">{{ $fourteenth->{'page_name_' . $middleware_language} !== '' ? $fourteenth->{'page_name_' . $middleware_language} : $fourteenth->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $fifteenth = App\Models\PodcastContent::find(1);
                                $common = App\Models\CommonContent::find(1);
                            @endphp
                            <!-- <a href="{{ route('frontend.podcasts.index') }}">{{ $fifteenth->{'page_name_' . $middleware_language} !== '' ? $fifteenth->{'page_name_' . $middleware_language} : $fifteenth->page_name_en }}</a> -->

                            <a href="{{ $common->footer_podcast_link }}" target="_blank">{{ $fifteenth->{'page_name_' . $middleware_language} !== '' ? $fifteenth->{'page_name_' . $middleware_language} : $fifteenth->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $sixteenth = App\Models\ConferenceContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.conferences.index') }}">{{ $sixteenth->{'page_name_' . $middleware_language} !== '' ? $sixteenth->{'page_name_' . $middleware_language} : $sixteenth->page_name_en }}</a>
                        </li>
                        <li>
                            @php
                                $seventeenth = App\Models\TvContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.gpni-tv.index') }}">{{ $seventeenth->{'page_name_' . $middleware_language} !== '' ? $seventeenth->{'page_name_' . $middleware_language} : $seventeenth->page_name_en }}</a>
                        </li>
                                 <li>
                            @php
                                $sixth = App\Models\ProductContent::find(1);
                            @endphp
                            <a href="{{ route('frontend.products.index') }}">{{ $sixth->{'page_name_' . $middleware_language} !== '' ? $sixth->{'page_name_' . $middleware_language} : $sixth->page_name_en }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-content d-flex flex-wrap justify-content-center align-items-center gap-2 py-2">
            <!-- Location -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('storage/frontend/pin-icon.svg') }}" alt="Map Icon" class="me-2">
                <p class="mb-0">{{ $contents->{'footer_country_' . $middleware_language} ?? $contents->footer_country_en }}</p>
            </div>
            
            <!-- Divider -->
            <i class="bi bi-circle-fill d-none d-md-block"></i>
            
            <!-- Copyright -->
            <p class="mb-0">{!! $contents->{'footer_copyright_' . $middleware_language} ?? $contents->footer_copyright_en !!}</p>
            
            <!-- Divider -->
            <i class="bi bi-circle-fill d-none d-md-block"></i>
    
            <!-- Links -->
            <div class="d-flex align-items-center gap-3">
                @php
                    $eighth = App\Models\OurPolicyContent::find(1);
                @endphp
                <a href="{{ route('frontend.our-policies') }}">
                    {{ $eighth->{'page_name_' . $middleware_language} !== '' ? $eighth->{'page_name_' . $middleware_language} : $eighth->page_name_en }}
                </a>
    
                @php
                    $ninth = App\Models\FAQContent::find(1);
                @endphp
                <a href="{{ route('frontend.faqs') }}">
                    {{ $ninth->{'page_name_' . $middleware_language} !== '' ? $ninth->{'page_name_' . $middleware_language} : $ninth->page_name_en }}
                </a>
            </div>
        </div>
    </div>
</div>