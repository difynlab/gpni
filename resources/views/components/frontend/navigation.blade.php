<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('frontend.homepage') }}">
            <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->logo) }}" alt="Logo" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @php
            $selected_language = session('language', 'en');
            $languages = [
                'en' => 'English',
                'zh' => 'Chinese',
                'ja' => 'Japanese'
            ];

            $contents = App\Models\CommonContent::find(1);
        @endphp

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">

                @php
                    $first_tab = App\Models\HomepageContent::find(1);
                @endphp
                <li class="nav-item">
                    <a href="{{ route('frontend.homepage') }}" class="nav-link">{{ $first_tab->{'page_name_' . $middleware_language} !== '' ? $first_tab->{'page_name_' . $middleware_language} : $first_tab->page_name_en }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="educationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $contents->{'header_second_tab_' . $middleware_language} ?? $contents->header_second_tab_en }}
                    </a>

                    <ul class="dropdown-menu">
                        <li class="nav-item secondary dropdown">
                            @php
                                $second_first_tab = App\Models\CertificationCourseContent::find(1);
                            @endphp
                            <a class="dropdown-item dropdown-toggle" href="#" id="internationalCoursesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $second_first_tab->{'page_name_' . $middleware_language} !== '' ? $second_first_tab->{'page_name_' . $middleware_language} : $second_first_tab->page_name_en }}
                            </a>

                            <ul class="dropdown-menu">
                                @php
                                    $languages = [
                                        'en' => 'English',
                                        'zh' => 'Chinese',
                                        'ja' => 'Japanese'
                                    ];

                                    $certificate_courses = App\Models\Course::where('language', $languages[$middleware_language])->where('type', 'Certification')->where('status', '1')->get();
                                @endphp

                                @if($certificate_courses->isNotEmpty())
                                    @foreach($certificate_courses as $certificate_course)
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ route('frontend.certification-courses.show', [$certificate_course, \Overtrue\Pinyin\Pinyin::permalink($certificate_course->title)]) }}">{{ $certificate_course->title }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item">
                            @php
                                $second_second_tab = App\Models\MasterClassContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.master-classes.index') }}">{{ $second_second_tab->{'page_name_' . $middleware_language} !== '' ? $second_second_tab->{'page_name_' . $middleware_language} : $second_second_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('frontend.our-policies') }}">{{ $contents->{'header_second_tab_third_' . $middleware_language} ?? $contents->header_second_tab_third_en }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $contents->{'header_third_tab_' . $middleware_language} ?? $contents->header_third_tab_en }}
                    </a>

                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            @php
                                $third_first_tab = App\Models\HistoryOfGpniContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.history-of-gpni') }}">{{ $third_first_tab->{'page_name_' . $middleware_language} !== '' ? $third_first_tab->{'page_name_' . $middleware_language} : $third_first_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $third_second_tab = App\Models\WhyWeAreDifferentContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.why-we-are-different') }}">{{ $third_second_tab->{'page_name_' . $middleware_language} !== '' ? $third_second_tab->{'page_name_' . $middleware_language} : $third_second_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $third_third_tab = App\Models\AdvisoryBoardExpertLectureContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.advisory-board-and-expert-lectures') }}">{{ $third_third_tab->{'page_name_' . $middleware_language} !== '' ? $third_third_tab->{'page_name_' . $middleware_language} : $third_third_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $third_fourth_tab = App\Models\FAQContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.faqs') }}">{{ $third_fourth_tab->{'page_name_' . $middleware_language} !== '' ? $third_fourth_tab->{'page_name_' . $middleware_language} : $third_fourth_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $third_fifth_tab = App\Models\MembershipContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.membership') }}">{{ $third_fifth_tab->{'page_name_' . $middleware_language} !== '' ? $third_fifth_tab->{'page_name_' . $middleware_language} : $third_fifth_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $third_sixth_tab = App\Models\OurPolicyContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.our-policies') }}">{{ $third_sixth_tab->{'page_name_' . $middleware_language} !== '' ? $third_sixth_tab->{'page_name_' . $middleware_language} : $third_sixth_tab->page_name_en }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="partnersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $contents->{'header_fourth_tab_' . $middleware_language} ?? $contents->header_fourth_tab_en }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="partnersDropdown">
                        <li class="nav-item">
                            @php
                                $fourth_first_tab = App\Models\InsuranceProfessionalMembershipContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.insurance-and-professional-membership') }}">{{ $fourth_first_tab->{'page_name_' . $middleware_language} !== '' ? $fourth_first_tab->{'page_name_' . $middleware_language} : $fourth_first_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $fourth_second_tab = App\Models\GlobalEducationPartnerContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.global-education-partners') }}">{{ $fourth_second_tab->{'page_name_' . $middleware_language} !== '' ? $fourth_second_tab->{'page_name_' . $middleware_language} : $fourth_second_tab->page_name_en }}</a>
                        </li>

                        <li class="nav-item">
                            @php
                                $fourth_third_tab = App\Models\ISSNOfficialPartnerAffiliateContent::find(1);
                            @endphp
                            <a class="dropdown-item" href="{{ route('frontend.issn-official-partners-and-affiliates') }}">{{ $fourth_third_tab->{'page_name_' . $middleware_language} !== '' ? $fourth_third_tab->{'page_name_' . $middleware_language} : $fourth_third_tab->page_name_en }}</a>
                        </li>
                    </ul>
                </li>

                @php
                    $fifth_tab = App\Models\NutritionistContent::find(1);
                @endphp
                <li class="nav-item">
                    <a href="{{ route('frontend.nutritionists.index') }}" class="nav-link">{{ $fifth_tab->{'page_name_' . $middleware_language} !== '' ? $fifth_tab->{'page_name_' . $middleware_language} : $fifth_tab->page_name_en }}</a>
                </li>

                @if(auth()->check())
                    @if(App\Models\Cart::where('user_id', auth()->user()->id)->where('status', 'Active')->count() > 0)
                        <li class="nav-item position-relative">
                            <a href="{{ route('frontend.carts.index') }}" class="nav-link">
                                <i class="bi bi-cart"></i>
                                <span class="cart-number">{{ App\Models\Cart::where('user_id', auth()->user()->id)->where('status', 'Active')->count() }}</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item position-relative">
                            <a href="#" class="nav-link">
                                <i class="bi bi-cart"></i>
                                <span class="cart-number">0</span>
                            </a>
                        </li>
                    @endif
                @endif

                @if(auth()->check())
                    @if(auth()->user()->role == 'student')
                        <li class="nav-item dropdown">
                            @if(auth()->user()->image)
                                <img src="{{ asset('storage/backend/persons/users/' . auth()->user()->image) }}" alt="Image" class="profile-image" data-bs-toggle="dropdown" aria-expanded="false">
                            @else
                                <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_profile_image) }}" alt="Image" class="profile-image" data-bs-toggle="dropdown" aria-expanded="false">
                            @endif

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('frontend.dashboard.index') }}">{{ $contents->{'header_user_dashboard_' . $middleware_language} ?? $contents->header_user_dashboard_en }}</a>
                                </li>

                                <li class="nav-item">
                                    @if(auth()->user()->member == 'Yes')
                                        <a class="dropdown-item" href="{{ route('frontend.member-corner') }}">{{ $contents->{'header_user_member_' . $middleware_language} ?? $contents->header_user_member_en }}</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('frontend.membership') }}">{{ $contents->{'header_user_member_' . $middleware_language} ?? $contents->header_user_member_en }}</a>
                                    @endif
                                </li>

                                <li class="nav-item">
                                    <form method="POST" action="{{ route('frontend.logout') }}">
                                        @csrf
                                        <a href="{{ route('frontend.logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault(); this.closest('form').submit();">{{ $contents->{'header_user_logout_' . $middleware_language} ?? $contents->header_user_logout_en }}</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('backend.dashboard.index') }}" class="nav-link">
                                <div class="btn navbar-button">{{ $contents->{'header_user_dashboard_' . $middleware_language} ?? $contents->header_user_dashboard_en }}</div>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{ route('frontend.login') }}" class="nav-link">
                            <button class="btn navbar-button">{{ $contents->{'header_login_' . $middleware_language} ?? $contents->header_login_en }}</button>
                        </a>
                    </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="flag-dropdown">
                            <img src="{{ asset('storage/frontend/flags/' . $selected_language . '.svg') }}" alt="{{ $languages[$selected_language] }} Flag" class="flag">
                        </span>
                    </a>

                    <ul class="dropdown-menu language-dropdown" aria-labelledby="languageDropdown">
                        @foreach($languages as $code => $language)
                            <li class="nav-item">
                                <a class="dropdown-item d-flex align-items-center language-option" href="#" data-lang="{{ $code }}">
                                    <img src="{{ asset('storage/frontend/flags/' . $code . '.svg') }}" alt="{{ $language }} Flag" class="flag">
                                    <span class="language-text">{{ $language }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


@push('after-scripts')
    <script>
        document.querySelectorAll('.language-option').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                var lang = this.getAttribute('data-lang');
                var route = '{{ route("frontend.set-language") }}';
                csrfToken = '{{ csrf_token() }}';

                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        language: lang,
                        _token: csrfToken
                    },
                    success: function(data) {
                        if(data.success) {
                            window.location.href = data.redirect_url;
                        }
                    },
                    error: function() {
                        alert('Error setting language!');
                    }
                });
            });
        });
    </script>
@endpush