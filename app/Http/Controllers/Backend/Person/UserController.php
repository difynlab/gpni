<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private function processUsers($users)
    {
        foreach($users as $user) {
            $user->action = '
            <a href="'. route('backend.persons.users.information.index', $user->id) .'" class="information-button" title="Information"><i class="bi bi-info-circle-fill"></i></a>
            <a href="'. route('backend.persons.users.courses.index', $user->id) .'" class="courses-button" title="Courses"><i class="bi bi-mortarboard-fill"></i></a>
            <a href="'. route('backend.persons.users.edit', $user->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$user->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $user->image = $user->image != null ? '<img src="'. asset('storage/backend/persons/users/' . $user->image) .'" class="table-image">' : '<img src="'. asset('storage/backend/main/' . Setting::find(1)->no_image) .'" class="table-image">';

            $currency_symbol = ($user->language === 'English') ? '$' : '¥';
            $wallet_exist = Wallet::where('user_id', $user->id)->first();

            if($wallet_exist) {
                $user->wallet = $currency_symbol . '' . $wallet_exist->balance;
            }
            else {
                $user->wallet =  $currency_symbol . '0.00';
            }

            $user->status = ($user->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $users;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $users = User::where('role', 'student')->where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $users = $this->processUsers($users);

        return view('backend.persons.users.index', [
            'users' => $users,
            'items' => $items
        ]);
    }

    public function create()
    {
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

        return view('backend.persons.users.create', [
            'countries' => $countries
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|unique:users,phone',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'new_image' => 'nullable|max:30720'
        ], [
            'email.unique' => 'The email address is already in use',
            'phone.unique' => 'The phone number is already in use',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least 8 characters long',
            'confirm_password.required' => 'The confirm password field is required',
            'confirm_password.same' => 'The confirm password must match the password',
            'new_image.max' => 'The image must not be greater than 30 MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/users', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $user = new User();
        $data = $request->except('old_image', 'new_image', 'confirm_password');
        
        $is_certified = $request->has('is_certified') ? '1' : null;
        $is_sns = $request->has('is_sns') ? '1' : null;
        $is_snc = $request->has('is_snc') ? '1' : null;
        $is_cissn = $request->has('is_cissn') ? '1' : null;
        $is_asnc = $request->has('is_asnc') ? '1' : null;

        $data['image'] = $image_name;
        $data['is_certified'] = $is_certified;
        $data['is_sns'] = $is_sns;
        $data['is_snc'] = $is_snc;
        $data['is_cissn'] = $is_cissn;
        $data['is_asnc'] = $is_asnc;
        $data['role'] = 'student';
        $user->create($data);

        return redirect()->route('backend.persons.users.index')->with('success', 'Successfully created!');
    }

    public function edit(User $user)
    {
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

        return view('backend.persons.users.edit', [
            'user' => $user,
            'countries' => $countries
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|unique:users,phone,'.$user->id,
            'new_image' => 'nullable|max:30720'
        ], [
            'email.unique' => 'The email address is already in use',
            'phone.unique' => 'The phone number is already in use',
            'new_image.max' => 'The image size must not exceed 30 MB'
        ]);

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

        $data = $request->except(
            'old_image',
            'new_image',
            'password',
            'confirm_password'
        );

        if($request->password != null) {
            $validator = Validator::make($request->all(), [
                'password' => 'nullable|min:8',
                'confirm_password' => 'nullable|same:password',
            ], [
                'password.min' => 'The password must be at least 8 characters long',
                'confirm_password.same' => 'The confirm password must match the password'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
            }

            $data['password'] = $request->password;
        }
        
        $is_certified = $request->has('is_certified') ? '1' : null;
        $is_sns = $request->has('is_sns') ? '1' : null;
        $is_snc = $request->has('is_snc') ? '1' : null;
        $is_cissn = $request->has('is_cissn') ? '1' : null;
        $is_asnc = $request->has('is_asnc') ? '1' : null;

        $data['image'] = $image_name;
        $data['is_certified'] = $is_certified;
        $data['is_sns'] = $is_sns;
        $data['is_snc'] = $is_snc;
        $data['is_cissn'] = $is_cissn;
        $data['is_asnc'] = $is_asnc;
        $user->fill($data)->save();
        
        return redirect()->route('backend.persons.users.index')->with('success', "Successfully updated!");
    }

    public function destroy(User $user)
    {
        $user->status = '0';
        $user->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.persons.users.index');
        }

        $name = $request->name;
        $email = $request->email;
        $language = $request->language;

        $users = User::where('role', 'student')->where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $users->where(function ($query) use ($name) {
                $query->where('first_name', 'like', '%' . $name . '%')
                      ->orWhere('last_name', 'like', '%' . $name . '%');
            });
        }

        if($email != null) {
            $users->where('email', 'like', '%' . $email . '%');
        }

        if($language != 'All') {
            $users->where('language', $language);
        }

        $items = $request->items ?? 10;
        $users = $users->paginate($items);
        $users = $this->processUsers($users);

        return view('backend.persons.users.index', [
            'users' => $users,
            'items' => $items,
            'name' => $name,
            'email' => $email,
            'language' => $language
        ]);
    }

    public function informationIndex(User $user)
    {
        return view('backend.persons.users.information', [
            'user' => $user
        ]);
    }

    public function informationUpdate(Request $request, User $user)
    {
        $data = $request->all();
        $user->fill($data)->save();

        return redirect()->route('backend.persons.users.information.index', $user)->with('success', "Successfully updated!");
    }
}