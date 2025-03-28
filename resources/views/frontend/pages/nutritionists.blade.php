@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/nutritionists.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <div class="container py-5">
            <section class="learn-best-section">

                <x-frontend.notification></x-frontend.notification>

                <div class="container">
                    <h2>{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h2>
                    <p>{{ $contents->{'sub_title_' . $middleware_language} ?? $contents->sub_title_en }}</p>

                    <div class="row align-items-center gy-3">
                        <div class="col-12 col-lg-11">
                            <form action="{{ route('frontend.nutritionists.index') }}" method="GET">
                                <div class="row gy-3">
                                    <div class="col-12 col-md-5">
                                        <div class="search-field w-100">
                                            <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" alt="Search Icon">
                                            <input type="text" class="w-100" name="nutritionist" value="{{ $filter_nutritionist ?? '' }}" 
                                                placeholder="{{ $contents->{'search_placeholder_' . $middleware_language} ?? $contents->search_placeholder_en }}">
                                        </div>
                                    </div>
                    
                                    <div class="col-12 col-md-5">
                                        <select class="form-control form-select search-field w-100" id="country" name="country">
                                            <option value="">{{ $contents->{'choose_country_' . $middleware_language} ?? $contents->choose_country_en }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ isset($filter_country) && $filter_country == $country ? 'selected' : '' }}>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                    
                                    <div class="col-12 col-md-2 d-flex align-items-center">
                                        <button class="btn btn-primary btn-lg search-button me-2 flex-grow-1 fs-20" type="submit">
                                            {{ $contents->{'search_button_' . $middleware_language} ?? $contents->search_button_en }}
                                        </button>
                                        <a href="{{ route('frontend.nutritionists.index') }}" class="reset-button">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                    @if($contents->search_labels_links_en)
                        <div class="d-flex justify-content-center flex-wrap mt-3">
                            <a href="{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->search_labels_links_en)[0]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive fs-20 mx-2 my-1">{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->search_labels_links_en)[0]->label }}</a>

                            <a href="{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->search_labels_links_en)[1]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive fs-20 mx-2 my-1">{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->search_labels_links_en)[1]->label }}</a>

                            <a href="{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[2]->link ?? json_decode($contents->search_labels_links_en)[2]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive fs-20 mx-2 my-1">{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[2]->label ?? json_decode($contents->search_labels_links_en)[2]->label }}</a>

                            <a href="{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[3]->link ?? json_decode($contents->search_labels_links_en)[3]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button btn-responsive fs-20 mx-2 my-1">{{ json_decode($contents->{'search_labels_links_' . $middleware_language})[3]->label ?? json_decode($contents->search_labels_links_en)[3]->label }}</a>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    @endif

    <div class="coaches-section">
        <div class="container">
            <div class="row">
                @if($nutritionists->isNotEmpty())
                    @foreach($nutritionists as $nutritionist)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="coach-card">
                                <div class="flex-grow">

                                    @if($nutritionist->is_qualified == '1')
                                        <div class="qualified-coach">{{ $contents->{'qualified_coach_' . $middleware_language} ?? $contents->qualified_coach_en }}</div>
                                    @endif

                                    @if($nutritionist->image)
                                        <img src="{{ asset('storage/backend/persons/users/' . $nutritionist->image) }}" class="image" alt="User Image">
                                    @else
                                        <img src="{{ asset('storage/backend/main/'. App\Models\Setting::find(1)->no_profile_image) }}" class="image">
                                    @endif

                                    <div class="coach-name fs-20">{{ $nutritionist->first_name }} {{ $nutritionist->last_name }}</div>

                                    <div class="coach-location-row">
                                        <div class="coach-location-item">
                                            <img src="{{ asset('storage/frontend/globe-icon.svg') }}" alt="Location Icon" width="20px" height="20px">
                                            <span>{{ $nutritionist->country }}</span>
                                        </div>
                                        <div class="coach-location-item" id="{{ $nutritionist->id }}" data-bs-toggle="modal" data-bs-target="#contact-modal">
                                            <img src="{{ asset('storage/frontend/connect-icon.svg') }}" alt="Contact Icon" width="20px" height="20px">
                                            <span>{{ $contents->{'contact_coach_' . $middleware_language} ?? $contents->contact_coach_en }}</span>
                                        </div>
                                    </div>

                                    <div class="coach-info-row">
                                        <div class="coach-info fs-16">{{ $contents->{'age_' . $middleware_language} ?? $contents->age_en }}: {{ $nutritionist->age }}</div>

                                        <div class="coach-info">{{ $contents->{'credentials_' . $middleware_language} ?? $contents->credentials_en }}: 
                                            {{ userCredentials($nutritionist->id) }}
                                        </div>

                                        <div class="coach-info">{{ $contents->{'cec_status_' . $middleware_language} ?? $contents->cec_status_en }}: <span class="cec-status">{{ $nutritionist->cec_status == '1' ? $contents->{'active_' . $middleware_language} ?? $contents->active_en : $contents->{'inactive_' . $middleware_language} ?? $contents->inactive_en }}</span></div>
                                    </div>
                                </div>

                                <span class="view-profile-btn btn-responsive" id="{{ $nutritionist->id }}" data-bs-toggle="modal" data-bs-target="#view-modal">{{ $contents->{'view_profile_' . $middleware_language} ?? $contents->view_profile_en }}</span>
                            </div>
                        </div>
                    @endforeach

                    {{ $nutritionists->links("pagination::bootstrap-5") }}
                @else
                    <div class="col-12">
                        <p class="no-data">{{ $contents->{'no_nutritionists_' . $middleware_language} ?? $contents->no_nutritionists_en }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <form action="{{ route('frontend.nutritionists.contact') }}" method="POST">
        @csrf
        <div class="modal fade" id="contact-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $contents->{'contact_coach_' . $middleware_language} ?? $contents->contact_coach_en }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label for="country">{{ $contents->{'country_' . $middleware_language} ?? $contents->country_en }}</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">{{ $contents->{'choose_country_' . $middleware_language} ?? $contents->choose_country_en }}</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cabo Verde">Cabo Verde</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                <option value="Congo, Republic of the">Congo, Republic of the</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Eswatini">Eswatini</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Greece">Greece</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, North">Korea, North</option>
                                <option value="Korea, South">Korea, South</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="North Macedonia">North Macedonia</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Sudan">South Sudan</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City">Vatican City</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="city">{{ $contents->{'city_' . $middleware_language} ?? $contents->city_en }}</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="phone-number">{{ $contents->{'phone_' . $middleware_language} ?? $contents->phone_en }}</label>
                            <input type="tel" class="form-control" id="phone-number" name="phone_number" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="email">{{ $contents->{'email_' . $middleware_language} ?? $contents->email_en }}</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="appChat">{{ $contents->{'app_chat_' . $middleware_language} ?? $contents->app_chat_en }}</label>
                            <select class="form-select" id="appChat" name="app" required>
                                <option value="">{{ $contents->{'choose_app_chat_' . $middleware_language} ?? $contents->choose_app_chat_en }}</option>
                                <option value="WhatsApp">{{ $contents->{'app_chat_first_' . $middleware_language} ?? $contents->app_chat_first_en }}</option>
                                <option value="Skype">{{ $contents->{'app_chat_second_' . $middleware_language} ?? $contents->app_chat_second_en }}</option>
                                <option value="WeChat">{{ $contents->{'app_chat_third_' . $middleware_language} ?? $contents->app_chat_third_en }}</option>
                                <option value="Other">{{ $contents->{'app_chat_fourth_' . $middleware_language} ?? $contents->app_chat_fourth_en }}</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="app-id">{{ $contents->{'app_chat_id_' . $middleware_language} ?? $contents->app_chat_id_en }}</label>
                            <input type="text" class="form-control" id="app-id" name="app_id" required>
                        </div>

                        <input type="hidden" id="coach-id" name="nutritionist" value="">

                        <button type="submit" class="btn submit-btn">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="qualified-coach">{{ $contents->{'qualified_coach_' . $middleware_language} ?? $contents->qualified_coach_en }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="profile-content">
                        <div class="side-section">
                            <img src="" alt="Coach Image" class="coach-image">
                        </div>
                        <div class="details-content">
                            <img src="" class="qr-code" alt="QR Code">

                            <h5 class="mb-2 name">{{ $contents->{'coach_name_' . $middleware_language} ?? $contents->coach_name_en }}</h5>
                            
                            <p class="fs-16"><strong>{{ $contents->{'age_' . $middleware_language} ?? $contents->age_en }}:</strong> <span class="age"></span></p>

                            <p class="fs-16"><strong>{{ $contents->{'country_' . $middleware_language} ?? $contents->country_en }}:</strong> <span class="country"></span></p>

                            <p class="fs-16"><strong>{{ $contents->{'cec_status_' . $middleware_language} ?? $contents->cec_status_en }}:</strong> <span class="highlight cec-status"></span></p>

                            <p class="fs-16"><strong>{{ $contents->{'credentials_' . $middleware_language} ?? $contents->credentials_en }}:</strong> <span class="credentials"></span></p>

                            <p class="fs-16"><strong>{{ $contents->{'certificate_number_' . $middleware_language} ?? $contents->certificate_number_en }}:</strong> <span class="certificate-number"></span></p>

                            <p class="fs-16"><strong>{{ $contents->{'membership_credential_status_' . $middleware_language} ?? $contents->membership_credential_status_en }}:</strong> <span class="membership-credential-status"></span></p>

                            <p class="fs-16">
                                <strong>{{ $contents->{'area_of_interest_' . $middleware_language} ?? $contents->area_of_interest_en }}:</strong>
                                <span class="area-of-interest"></span>
                            </p>

                            <p class="fs-16">
                                <strong>{{ $contents->{'self_introduction_' . $middleware_language} ?? $contents->self_introduction_en }}:</strong>
                                
                            </p>
                            <p class="intro-paragraph fs-16"></p>

                            <div class="bottom-section">
                                <div class="coach-location-model-item coach-contact-link">
                                    <a class="contact-now" data-bs-toggle="modal" data-bs-target="#contact-modal">{{ $contents->{'contact_coach_' . $middleware_language} ?? $contents->contact_coach_en }}</a>
                                </div>
                            </div>
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
            const urlParams = new URLSearchParams(window.location.search);
            const nutritionistId = urlParams.get('nutritionist-id');

            if(nutritionistId) {
                let url = "{{ route('frontend.nutritionists.fetch', [':id']) }}";
                url = url.replace(':id', nutritionistId);

                let noImageUrl = "{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_profile_image) }}";

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        if(response.nutritionist['image']) {
                            $('#view-modal .coach-image').attr('src', 'storage/backend/persons/users/' + response.nutritionist['image']);
                        }
                        else {
                            $('#view-modal .coach-image').attr('src', noImageUrl);
                        }

                        $('#view-modal .qr-code').attr('src', response.html);
                        $('#view-modal .name').text(response.nutritionist['first_name'] + ' ' + response.nutritionist['last_name']);
                        $('#view-modal .age').text(response.nutritionist['age']);
                        $('#view-modal .country').text(response.nutritionist['country']);
                        $('#view-modal .cec-status').text(response.nutritionist['cec_status'] == '1' ? 'Active' : 'Inactive');
                        $('#view-modal .certificate-number').text(response.nutritionist['certificate_number']);
                        $('#view-modal .membership-credential-status').text(response.nutritionist['membership_credential_status'] == '1' ? 'Active' : 'Inactive');
                        $('#view-modal .intro-paragraph').text(response.nutritionist['self_introduction']);
                        $('#view-modal .credentials').text(response.credentials);

                        $('#view-modal .area-of-interest').text(response.nutritionist['area_of_interest']);

                        if(response.nutritionist['is_qualified'] == '1') {
                            $(this).siblings('.flex-grow').children('.qualified-coach').addClass('d-none')
                        }
                        else {
                            $(this).siblings('.flex-grow').children('.qualified-coach').addClass('d-none')
                        }

                        $('#view-modal .coach-contact-link').attr('id', response.nutritionist['id']);
                        $('#coach-id').val(nutritionistId);
                        $('#view-modal').modal('show');
                    },
                    error: function(xhr) {
                        console.log("An error occurred: " + xhr.status + " " + xhr.statusText);
                    }
                });
            }
        });

        $('.coach-location-item').on('click', function() {
            let id = $(this).attr('id');
            $('#coach-id').val(id);
        });

        $('.view-profile-btn').on('click', function() {
            let id = $(this).attr('id');
            let url = "{{ route('frontend.nutritionists.fetch', [':id']) }}";
            url = url.replace(':id', id);

            let noImageUrl = "{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_profile_image) }}";

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if(response.nutritionist['image']) {
                        $('#view-modal .coach-image').attr('src', 'storage/backend/persons/users/' + response.nutritionist['image']);
                    }
                    else {
                        $('#view-modal .coach-image').attr('src', noImageUrl);
                    }

                    $('#view-modal .qr-code').attr('src', response.html);
                    
                    $('#view-modal .name').text(response.nutritionist['first_name'] + ' ' + response.nutritionist['last_name']);
                    $('#view-modal .age').text(response.nutritionist['age']);
                    $('#view-modal .country').text(response.nutritionist['country']);
                    $('#view-modal .cec-status').text(response.nutritionist['cec_status'] == '1' ? 'Active' : 'Inactive');
                    $('#view-modal .certificate-number').text(response.nutritionist['certificate_number']);
                    $('#view-modal .membership-credential-status').text(response.nutritionist['membership_credential_status'] == '1' ? 'Active' : 'Inactive');
                    $('#view-modal .intro-paragraph').text(response.nutritionist['self_introduction']);
                    $('#view-modal .credentials').text(response.credentials);

                    $('#view-modal .area-of-interest').text(response.nutritionist['area_of_interest']);

                    if(response.nutritionist['is_qualified'] == '1') {
                        $(this).siblings('.flex-grow').children('.qualified-coach').addClass('d-none')
                    }
                    else {
                        $(this).siblings('.flex-grow').children('.qualified-coach').addClass('d-none')
                    }

                    $('#view-modal .coach-contact-link').attr('id', response.nutritionist['id']);
                    $('#coach-id').val(id);
                    $('.view-modal').modal('show');
                },
                error: function(xhr) {
                    if(response.nutritionist['is_qualified'] == '1') {
                        $(this).siblings('.flex-grow').children('.qualified-coach').addClass('d-none')
                    }
                    else {
                        $(this).siblings('.flex-grow').children('.qualified-coach').addClass('d-none')
                    }

                    $('#view-modal .coach-contact-link').attr('id', response.nutritionist['id']);
                    $('#coach-id').val(id);
                    $('.view-modal').modal('show');
                },
                error: function(xhr) {
                    console.log("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });
        });
    </script>
@endpush