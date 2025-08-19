<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\UpdateProfileMail;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $countries = [
            "Afghanistan",
            "Aland Islands",
            "Albania",
            "Algeria",
            "American Samoa",
            "Andorra",
            "Angola",
            "Anguilla",
            "Antarctica",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Aruba",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bermuda",
            "Bhutan",
            "Bolivia",
            "Bonaire, Sint Eustatius and Saba",
            "Bosnia and Herzegovina",
            "Botswana",
            "Bouvet Island",
            "Brazil",
            "British Indian Ocean Territory",
            "Brunei Darussalam",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cape Verde",
            "Cayman Islands",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Christmas Island",
            "Cocos (Keeling) Islands",
            "Colombia",
            "Comoros",
            "Congo",
            "Congo, Democratic Republic of the Congo",
            "Cook Islands",
            "Costa Rica",
            "Cote D'Ivoire",
            "Croatia",
            "Cuba",
            "Curacao",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Ethiopia",
            "Falkland Islands (Malvinas)",
            "Faroe Islands",
            "Fiji",
            "Finland",
            "France",
            "French Guiana",
            "French Polynesia",
            "French Southern Territories",
            "Gabon",
            "Gambia",
            "Georgia",
            "Germany",
            "Ghana",
            "Gibraltar",
            "Greece",
            "Greenland",
            "Grenada",
            "Guadeloupe",
            "Guam",
            "Guatemala",
            "Guernsey",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Heard Island and Mcdonald Islands",
            "Holy See (Vatican City State)",
            "Honduras",
            "Hong Kong",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran, Islamic Republic of",
            "Iraq",
            "Ireland",
            "Isle of Man",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jersey",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea, Democratic People's Republic of",
            "Korea, Republic of",
            "Kosovo",
            "Kuwait",
            "Kyrgyzstan",
            "Lao People's Democratic Republic",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libyan Arab Jamahiriya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macao",
            "Macedonia, the Former Yugoslav Republic of",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Martinique",
            "Mauritania",
            "Mauritius",
            "Mayotte",
            "Mexico",
            "Micronesia, Federated States of",
            "Moldova, Republic of",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Montserrat",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "Netherlands Antilles",
            "New Caledonia",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "Niue",
            "Norfolk Island",
            "Northern Mariana Islands",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestinian Territory, Occupied",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Pitcairn",
            "Poland",
            "Portugal",
            "Puerto Rico",
            "Qatar",
            "Reunion",
            "Romania",
            "Russian Federation",
            "Rwanda",
            "Saint Barthelemy",
            "Saint Helena",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Martin",
            "Saint Pierre and Miquelon",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Serbia and Montenegro",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Sint Maarten",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Georgia and the South Sandwich Islands",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Svalbard and Jan Mayen",
            "Swaziland",
            "Sweden",
            "Switzerland",
            "Syrian Arab Republic",
            "Taiwan, Province of China",
            "Tajikistan",
            "Tanzania, United Republic of",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tokelau",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Turks and Caicos Islands",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States",
            "United States Minor Outlying Islands",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela",
            "Viet Nam",
            "Virgin Islands, British",
            "Virgin Islands, U.s.",
            "Wallis and Futuna",
            "Western Sahara",
            "Yemen",
            "Zambia",
            "Zimbabwe"
        ];

        $subscription = Subscription::where('email', $student->email)->where('status', '1')->first();
        if($subscription) {
            $newsletter = true;
        }
        else {
            $newsletter = false;
        }
        
        return view('frontend.student.profile', [
            'student' => $student,
            'countries' => $countries,
            'newsletter' => $newsletter,
        ]);
    }

    public function update(Request $request)
    {
        $student = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.$student->id,
            'phone' => 'nullable|unique:users,phone,'.$student->id,
            'new_image' => 'nullable|max:30720'
        ], [
            'email.unique' => 'The email address is already in use',
            'phone.unique' => 'The phone number is already in use',
            'new_image.max' => 'The image size must not exceed 30 MB'
        ]);

        $validator->after(function ($validator) use ($student, $request) {
            if($student->image === null && $request->new_image === null) {
                $validator->errors()->add('new_image', 'Image is required if no image is currently set.');
            }
        });

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/persons/users/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/users', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        if($request->newsletter) {
            $subscription = Subscription::where('email', $student->email)->where('status', '1')->first();
            
            if(!$subscription) {
                $subscription = new Subscription();
                $subscription->email = $request->email;
                $subscription->status = '1';
                $subscription->save();

                try {
                    $portal_id = '40197468';

                    if($request->middleware_language == 'en') {
                        $form_id = '64e9ff1a-77b8-409d-84f7-c6cb06eb4673';
                    }
                    elseif($request->middleware_language == 'zh') {
                        $form_id = '8fc6801d-3dd7-470c-aac8-5206d48c5ced';
                    }
                    else {
                        $form_id = '7b536000-3c0e-4d8f-b654-2c4e7e42647f';
                    }

                    $hs_url = "https://api.hsforms.com/submissions/v3/integration/submit/{$portal_id}/{$form_id}";

                    $payload = [
                        'fields' => [
                            ['name' => 'email', 'value' => $subscription->email],
                        ],
                        'context' => [
                            'pageUri'  => $request->headers->get('referer') ?? url()->current(),
                            'pageName' => 'Subscription',
                        ],
                    ];

                    $hs_res = Http::acceptJson()
                        ->withHeaders(['Content-Type' => 'application/json'])
                        ->timeout(8)
                        ->retry(2, 200)
                        ->post($hs_url, $payload);

                    if(!$hs_res->ok()) {
                        Log::warning('HubSpot submission failed', [
                            'status' => $hs_res->status(),
                            'body'   => $hs_res->body(),
                            'email'  => $subscription->email,
                        ]);
                    }
                }
                catch (\Throwable $e) {
                    Log::error('HubSpot submission exception', [
                        'error' => $e->getMessage(),
                        'email' => $subscription->email,
                    ]);
                }
            }
        }
        else {
            $subscription = Subscription::where('email', $student->email)->where('status', '1')->first();
            
            if($subscription) {
                $subscription->status = '0';
                $subscription->save();
            }
        }

        $data = $request->except('old_image', 'new_image', 'middleware_language', 'middleware_language_name', 'newsletter');
        $data['image'] = $image_name;

        $student->fill($data)->save();

        $mail_data = [
            'name' => $student->first_name . ' ' . $student->last_name
        ];

        send_email(new UpdateProfileMail($mail_data), $student->email);

        return redirect()->back()->with('success', 'Update success');
    }
}