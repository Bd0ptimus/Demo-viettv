<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
@endphp
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ asset('css/login1.css?v=').time() }}">

<body class="login-background-img"
    style="background-image: url({{ asset('storage/web-info/logo/logo2.jpg') }}); background-size: cover; height:auto;">
    <section class="ftco-section" style="padding:50px 0px; height : auto; ">
        <div class="container" style="height:auto;">

            @if(Admin::user() == null)
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Đăng Ký</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <form action="{{ route('auth.register') }}" method="POST" class="signin-form"> @csrf
                                <div class="form-group d-flex justify-content-between">
                                    <div style="width:50%;margin:0px;">
                                        <label class="checkbox-wrap my-0" style="color:white;">Dịch vụ truyền hình
                                            <input type="checkbox"  name="tv" id="tv" {{ old('tv') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-between">
                                    <div style="width:50%;margin:0px;">
                                        <label class="checkbox-wrap  my-0" style="color:white;">NETFLIX
                                            <input type="checkbox"  name="netfix" id="netfix" {{ old('netfix') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-between">
                                    <div style="width:50%;margin:0px;">
                                        <label class="checkbox-wrap  my-0" style="color:white;">Youtube Premium
                                            <input type="checkbox"  name="ytpremium" id="ytpremium" {{ old('ytpremium') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div style="width:50%;margin:0px;">
                                        <label class="checkbox-wrap my-0" style="color:white;">VPN
                                            <input type="checkbox"  name="vpn" id="vpn" {{ old('vpn') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Tên" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  autocomplete="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select name="country" class="form-control @error('country') is-invalid @enderror"
                                    id="country" required>
                                        <option value="0" style="color:black;" label="Chọn quốc gia..." selected="selected">Chọn quốc
                                        gia...</option>
                                        <option value="Afghanistan" style="color:black;">Afghanistan</option>
                                        <option value="Aland Islands" style="color:black;">Åland Islands</option>
                                        <option value="Albania" style="color:black;">Albania</option>
                                        <option value="Algeria" style="color:black;">Algeria</option>
                                        <option value="American Samoa" style="color:black;">American Samoa</option>
                                        <option value="Andorra" style="color:black;">Andorra</option>
                                        <option value="Angola" style="color:black;">Angola</option>
                                        <option value="Anguilla" style="color:black;">Anguilla</option>
                                        <option value="Antarctica" style="color:black;">Antarctica</option>
                                        <option value="Antigua and Barbuda" style="color:black;">Antigua & Barbuda</option>
                                        <option value="Argentina" style="color:black;">Argentina</option>
                                        <option value="Armenia" style="color:black;">Armenia</option>
                                        <option value="Aruba" style="color:black;">Aruba</option>
                                        <option value="Australia" style="color:black;">Australia</option>
                                        <option value="Austria" style="color:black;">Austria</option>
                                        <option value="Azerbaijan" style="color:black;">Azerbaijan</option>
                                        <option value="Bahamas" style="color:black;">Bahamas</option>
                                        <option value="Bahrain" style="color:black;">Bahrain</option>
                                        <option value="Bangladesh" style="color:black;">Bangladesh</option>
                                        <option value="Barbados" style="color:black;">Barbados</option>
                                        <option value="Belarus" style="color:black;">Belarus</option>
                                        <option value="Belgium" style="color:black;">Belgium</option>
                                        <option value="Belize" style="color:black;">Belize</option>
                                        <option value="Benin" style="color:black;">Benin</option>
                                        <option value="Bermuda" style="color:black;">Bermuda</option>
                                        <option value="Bhutan" style="color:black;">Bhutan</option>
                                        <option value="Bolivia" style="color:black;">Bolivia</option>
                                        <option value="Bonaire, Sint Eustatius and Saba" style="color:black;">Caribbean Netherlands</option>
                                        <option value="Bosnia and Herzegovina" style="color:black;">Bosnia & Herzegovina</option>
                                        <option value="Botswana" style="color:black;">Botswana</option>
                                        <option value="Bouvet Island" style="color:black;">Bouvet Island</option>
                                        <option value="Brazil" style="color:black;">Brazil</option>
                                        <option value="British Indian Ocean Territory" style="color:black;">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam" style="color:black;">Brunei</option>
                                        <option value="Bulgaria" style="color:black;">Bulgaria</option>
                                        <option value="Burkina Faso" style="color:black;">Burkina Faso</option>
                                        <option value="Burundi" style="color:black;">Burundi</option>
                                        <option value="Cambodia" style="color:black;">Cambodia</option>
                                        <option value="Cameroon" style="color:black;">Cameroon</option>
                                        <option value="Canada" style="color:black;">Canada</option>
                                        <option value="Cape Verde" style="color:black;">Cape Verde</option>
                                        <option value="Cayman Islands" style="color:black;">Cayman Islands</option>
                                        <option value="Central African Republic" style="color:black;">Central African Republic</option>
                                        <option value="Chad" style="color:black;">Chad</option>
                                        <option value="Chile" style="color:black;">Chile</option>
                                        <option value="China" style="color:black;">China</option>
                                        <option value="Christmas Island" style="color:black;">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands" style="color:black;">Cocos (Keeling) Islands</option>
                                        <option value="Colombia" style="color:black;">Colombia</option>
                                        <option value="Comoros" style="color:black;">Comoros</option>
                                        <option value="Congo" style="color:black;">Congo - Brazzaville</option>
                                        <option value="Congo, Democratic Republic of the Congo" style="color:black;">Congo - Kinshasa
                                        </option>
                                        <option value="Cook Islands" style="color:black;">Cook Islands</option>
                                        <option value="Costa Rica" style="color:black;">Costa Rica</option>
                                        <option value="Cote D'Ivoire" style="color:black;">Côte d’Ivoire</option>
                                        <option value="Croatia" style="color:black;">Croatia</option>
                                        <option value="Cuba" style="color:black;">Cuba</option>
                                        <option value="Curacao" style="color:black;">Curaçao</option>
                                        <option value="Cyprus" style="color:black;">Cyprus</option>
                                        <option value="Czech Republic" style="color:black;">Czechia</option>
                                        <option value="Denmark" style="color:black;">Denmark</option>
                                        <option value="Djibouti" style="color:black;">Djibouti</option>
                                        <option value="Dominica" style="color:black;">Dominica</option>
                                        <option value="Dominican Republic" style="color:black;">Dominican Republic</option>
                                        <option value="Ecuador" style="color:black;">Ecuador</option>
                                        <option value="Egypt" style="color:black;">Egypt</option>
                                        <option value="El Salvador" style="color:black;">El Salvador</option>
                                        <option value="Equatorial Guinea" style="color:black;">Equatorial Guinea</option>
                                        <option value="Eritrea" style="color:black;">Eritrea</option>
                                        <option value="Estonia" style="color:black;">Estonia</option>
                                        <option value="Ethiopia" style="color:black;">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)" style="color:black;">Falkland Islands (Islas Malvinas)
                                        </option>
                                        <option value="Faroe Islands" style="color:black;">Faroe Islands</option>
                                        <option value="Fiji" style="color:black;">Fiji</option>
                                        <option value="Finland" style="color:black;">Finland</option>
                                        <option value="France" style="color:black;">France</option>
                                        <option value="French Guiana" style="color:black;">French Guiana</option>
                                        <option value="French Polynesia" style="color:black;">French Polynesia</option>
                                        <option value="French Southern Territories" style="color:black;">French Southern Territories
                                        </option>
                                        <option value="Gabon" style="color:black;">Gabon</option>
                                        <option value="Gambia" style="color:black;">Gambia</option>
                                        <option value="Georgia" style="color:black;">Georgia</option>
                                        <option value="Germany" style="color:black;">Germany</option>
                                        <option value="Ghana" style="color:black;">Ghana</option>
                                        <option value="Gibraltar" style="color:black;">Gibraltar</option>
                                        <option value="Greece" style="color:black;">Greece</option>
                                        <option value="Greenland" style="color:black;">Greenland</option>
                                        <option value="Grenada" style="color:black;">Grenada</option>
                                        <option value="Guadeloupe" style="color:black;">Guadeloupe</option>
                                        <option value="Guam" style="color:black;">Guam</option>
                                        <option value="Guatemala" style="color:black;">Guatemala</option>
                                        <option value="Guernsey" style="color:black;">Guernsey</option>
                                        <option value="Guinea" style="color:black;">Guinea</option>
                                        <option value="Guinea-Bissau" style="color:black;">Guinea-Bissau</option>
                                        <option value="Guyana" style="color:black;">Guyana</option>
                                        <option value="Haiti" style="color:black;">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands" style="color:black;">Heard & McDonald Islands
                                        </option>
                                        <option value="Holy See (Vatican City State)" style="color:black;">Vatican City</option>
                                        <option value="Honduras" style="color:black;">Honduras</option>
                                        <option value="Hong Kong" style="color:black;">Hong Kong</option>
                                        <option value="Hungary" style="color:black;">Hungary</option>
                                        <option value="Iceland" style="color:black;">Iceland</option>
                                        <option value="India" style="color:black;">India</option>
                                        <option value="Indonesia" style="color:black;">Indonesia</option>
                                        <option value="Iran, Islamic Republic of" style="color:black;">Iran</option>
                                        <option value="Iraq" style="color:black;">Iraq</option>
                                        <option value="Ireland" style="color:black;">Ireland</option>
                                        <option value="Isle of Man" style="color:black;">Isle of Man</option>
                                        <option value="Israel" style="color:black;">Israel</option>
                                        <option value="Italy" style="color:black;">Italy</option>
                                        <option value="Jamaica" style="color:black;">Jamaica</option>
                                        <option value="Japan" style="color:black;">Japan</option>
                                        <option value="Jersey" style="color:black;">Jersey</option>
                                        <option value="Jordan" style="color:black;">Jordan</option>
                                        <option value="Kazakhstan" style="color:black;">Kazakhstan</option>
                                        <option value="Kenya" style="color:black;">Kenya</option>
                                        <option value="Kiribati" style="color:black;">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of" style="color:black;">North Korea</option>
                                        <option value="Korea, Republic of" style="color:black;">South Korea</option>
                                        <option value="Kosovo" style="color:black;">Kosovo</option>
                                        <option value="Kuwait" style="color:black;">Kuwait</option>
                                        <option value="Kyrgyzstan" style="color:black;">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" style="color:black;">Laos</option>
                                        <option value="Latvia" style="color:black;">Latvia</option>
                                        <option value="Lebanon" style="color:black;">Lebanon</option>
                                        <option value="Lesotho" style="color:black;">Lesotho</option>
                                        <option value="Liberia" style="color:black;">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" style="color:black;">Libya</option>
                                        <option value="Liechtenstein" style="color:black;">Liechtenstein</option>
                                        <option value="Lithuania" style="color:black;">Lithuania</option>
                                        <option value="Luxembourg" style="color:black;">Luxembourg</option>
                                        <option value="Macao" style="color:black;">Macao</option>
                                        <option value="Macedonia, the Former Yugoslav Republic of" style="color:black;">North Macedonia
                                        </option>
                                        <option value="Madagascar" style="color:black;">Madagascar</option>
                                        <option value="Malawi" style="color:black;">Malawi</option>
                                        <option value="Malaysia" style="color:black;">Malaysia</option>
                                        <option value="Maldives" style="color:black;">Maldives</option>
                                        <option value="Mali" style="color:black;">Mali</option>
                                        <option value="Malta" style="color:black;">Malta</option>
                                        <option value="Marshall Islands" style="color:black;">Marshall Islands</option>
                                        <option value="Martinique" style="color:black;">Martinique</option>
                                        <option value="Mauritania" style="color:black;">Mauritania</option>
                                        <option value="Mauritius" style="color:black;">Mauritius</option>
                                        <option value="Mayotte" style="color:black;">Mayotte</option>
                                        <option value="Mexico" style="color:black;">Mexico</option>
                                        <option value="Micronesia, Federated States of" style="color:black;">Micronesia</option>
                                        <option value="Moldova, Republic of" style="color:black;">Moldova</option>
                                        <option value="Monaco" style="color:black;">Monaco</option>
                                        <option value="Mongolia" style="color:black;">Mongolia</option>
                                        <option value="Montenegro" style="color:black;">Montenegro</option>
                                        <option value="Montserrat" style="color:black;">Montserrat</option>
                                        <option value="Morocco" style="color:black;">Morocco</option>
                                        <option value="Mozambique" style="color:black;">Mozambique</option>
                                        <option value="Myanmar" style="color:black;">Myanmar (Burma)</option>
                                        <option value="Namibia" style="color:black;">Namibia</option>
                                        <option value="Nauru" style="color:black;">Nauru</option>
                                        <option value="Nepal" style="color:black;">Nepal</option>
                                        <option value="Netherlands"style="color:black;">Netherlands</option>
                                        <option value="Netherlands Antilles" style="color:black;">Curaçao</option>
                                        <option value="New Caledonia" style="color:black;">New Caledonia</option>
                                        <option value="New Zealand" style="color:black;">New Zealand</option>
                                        <option value="Nicaragua" style="color:black;">Nicaragua</option>
                                        <option value="Niger" style="color:black;">Niger</option>
                                        <option value="Nigeria" style="color:black;">Nigeria</option>
                                        <option value="Niue" style="color:black;">Niue</option>
                                        <option value="Norfolk Island" style="color:black;">Norfolk Island</option>
                                        <option value="Northern Mariana Islands" style="color:black;">Northern Mariana Islands</option>
                                        <option value="Norway" style="color:black;">Norway</option>
                                        <option value="Oman"style="color:black;">Oman</option>
                                        <option value="Pakistan" style="color:black;">Pakistan</option>
                                        <option value="Palau" style="color:black;">Palau</option>
                                        <option value="Palestinian Territory, Occupied" style="color:black;">Palestine</option>
                                        <option value="Panama" style="color:black;">Panama</option>
                                        <option value="Papua New Guinea" style="color:black;">Papua New Guinea</option>
                                        <option value="Paraguay" style="color:black;">Paraguay</option>
                                        <option value="Peru"style="color:black;"> Peru</option>
                                        <option value="Philippines"style="color:black;">Philippines</option>
                                        <option value="Pitcairn"style="color:black;">Pitcairn Islands</option>
                                        <option style="color:black;" value="Poland">Poland</option>
                                        <option style="color:black;" value="Portugal">Portugal</option>
                                        <option style="color:black;" value="Puerto Rico">Puerto Rico</option>
                                        <option style="color:black;" value="Qatar">Qatar</option>
                                        <option style="color:black;" value="Reunion">Réunion</option>
                                        <option style="color:black;" value="Romania">Romania</option>
                                        <option style="color:black;" value="Russian Federation">Russia</option>
                                        <option  style="color:black;"value="Rwanda">Rwanda</option>
                                        <option style="color:black;" value="Saint Barthelemy">St. Barthélemy</option>
                                        <option style="color:black;" value="Saint Helena">St. Helena</option>
                                        <option style="color:black;" value="Saint Kitts and Nevis">St. Kitts & Nevis</option>
                                        <option  style="color:black;" value="Saint Lucia">St. Lucia</option>
                                        <option style="color:black;" value="Saint Martin">St. Martin</option>
                                        <option  style="color:black;" value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option>
                                        <option style="color:black;" value="Saint Vincent and the Grenadines">St. Vincent & Grenadines
                                        </option>
                                        <option  style="color:black;"value="Samoa">Samoa</option>
                                        <option  style="color:black;"value="San Marino">San Marino</option>
                                        <option style="color:black;"value="Sao Tome and Principe">São Tomé & Príncipe</option>
                                        <option style="color:black;"value="Saudi Arabia">Saudi Arabia</option>
                                        <option style="color:black;"value="Senegal">Senegal</option>
                                        <option style="color:black;"value="Serbia">Serbia</option>
                                        <option style="color:black;"value="Serbia and Montenegro">Serbia</option>
                                        <option style="color:black;"value="Seychelles">Seychelles</option>
                                        <option style="color:black;"value="Sierra Leone">Sierra Leone</option>
                                        <option style="color:black;"value="Singapore">Singapore</option>
                                        <option style="color:black;"value="Sint Maarten">Sint Maarten</option>
                                        <option style="color:black;"value="Slovakia">Slovakia</option>
                                        <option style="color:black;"value="Slovenia">Slovenia</option>
                                        <option style="color:black;"value="Solomon Islands">Solomon Islands</option>
                                        <option style="color:black;"value="Somalia">Somalia</option>
                                        <option style="color:black;"value="South Africa">South Africa</option>
                                        <option style="color:black;"value="South Georgia and the South Sandwich Islands">South Georgia &
                                            South Sandwich Islands</option>
                                        <option style="color:black;"value="South Sudan">South Sudan</option>
                                        <option style="color:black;"value="Spain">Spain</option>
                                        <option style="color:black;"value="Sri Lanka">Sri Lanka</option>
                                        <option style="color:black;"value="Sudan">Sudan</option>
                                        <option style="color:black;"value="Suriname">Suriname</option>
                                        <option style="color:black;"value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option>
                                        <option style="color:black;"value="Swaziland">Eswatini</option>
                                        <option style="color:black;"value="Sweden">Sweden</option>
                                        <option style="color:black;"value="Switzerland">Switzerland</option>
                                        <option style="color:black;"value="Syrian Arab Republic">Syria</option>
                                        <option style="color:black;"value="Taiwan, Province of China">Taiwan</option>
                                        <option style="color:black;"value="Tajikistan">Tajikistan</option>
                                        <option style="color:black;"value="Tanzania, United Republic of">Tanzania</option>
                                        <option style="color:black;"value="Thailand">Thailand</option>
                                        <option style="color:black;"value="Timor-Leste">Timor-Leste</option>
                                        <option style="color:black;"value="Togo">Togo</option>
                                        <option style="color:black;"value="Tokelau">Tokelau</option>
                                        <option style="color:black;"value="Tonga">Tonga</option>
                                        <option style="color:black;"value="Trinidad and Tobago">Trinidad & Tobago</option>
                                        <option style="color:black;"value="Tunisia">Tunisia</option>
                                        <option style="color:black;"value="Turkey">Turkey</option>
                                        <option style="color:black;"value="Turkmenistan">Turkmenistan</option>
                                        <option style="color:black;"value="Turks and Caicos Islands">Turks & Caicos Islands</option>
                                        <option style="color:black;"value="Tuvalu">Tuvalu</option>
                                        <option style="color:black;"value="Uganda">Uganda</option>
                                        <option style="color:black;"value="Ukraine">Ukraine</option>
                                        <option style="color:black;"value="United Arab Emirates">United Arab Emirates</option>
                                        <option style="color:black;"value="United Kingdom">United Kingdom</option>
                                        <option style="color:black;"value="United States">United States</option>
                                        <option style="color:black;"value="United States Minor Outlying Islands">U.S. Outlying Islands
                                        </option>
                                        <option style="color:black;"value="Uruguay">Uruguay</option>
                                        <option style="color:black;"value="Uzbekistan">Uzbekistan</option>
                                        <option style="color:black;"value="Vanuatu">Vanuatu</option>
                                        <option style="color:black;"value="Venezuela">Venezuela</option>
                                        <option style="color:black;"value="Viet Nam">Vietnam</option>
                                        <option style="color:black;"value="Virgin Islands, British">British Virgin Islands</option>
                                        <option style="color:black;"value="Virgin Islands, U.s.">U.S. Virgin Islands</option>
                                        <option style="color:black;"value="Wallis and Futuna">Wallis & Futuna</option>
                                        <option style="color:black;"value="Western Sahara">Western Sahara</option>
                                        <option style="color:black;"value="Yemen">Yemen</option>
                                        <option style="color:black;"value="Zambia">Zambia</option>
                                        <option style="color:black;"value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Địa chỉ"  autocomplete="address" required value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input id="phone" name="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Số điện thoại"  autocomplete="phone" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button id="userRegisterSubmit" name="phoneNumber" type="submit" class="form-control btn btn-primary submit px-3">Đăng Ký</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["vn"],
            initialCountry: "vn",
            // geoIpLookup: getIp,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        $(document).ready(function() {
            $('#phone').on('change', function() {
                console.log('phone change');
                $('#userRegisterSubmit').val(phoneInput.getNumber());
            });
        })
    </script>
</body>

</html>
