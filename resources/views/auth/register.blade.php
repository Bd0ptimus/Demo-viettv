<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
    use App\Models\User;

@endphp

<body>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if ($accountType == ROLE_ADMIN)
                            Tạo tài khoản Admin
                        @elseif ($accountType == ROLE_USER)
                            Tạo tài khoản người dùng Viet-tv
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.createAccount', ['accountType' => $accountType]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Tên <span
                                        class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="expiredDate" class="col-md-4 col-form-label text-md-end">Thời gian hết hạn
                                    <span class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <input id="expiredDate" type="date"
                                        class="form-control @error('expiredDate') is-invalid @enderror"
                                        name="expiredDate" value="{{ old('expiredDate') }}" required
                                        autocomplete="expiredDate">

                                    @error('expiredDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Địa chỉ Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($accountType == ROLE_USER)
                                <div class="row mb-3">
                                    <label for="numDevices" class="col-md-4 col-form-label text-md-end">Số lượng thiết bị
                                        được phép đăng nhập cùng lúc <span class="text-danger">(*)</span></label>

                                    <div class="col-md-6">
                                        <input id="numDevices" type="number"
                                            class="form-control @error('numDevices') is-invalid @enderror" name="numDevices"
                                            value="{{ old('numDevices') }}" required autocomplete="numDevices">

                                        @error('numDevices')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="country" class="col-md-4 col-form-label text-md-end">Quốc gia<span
                                        class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <select name="country" class="form-control @error('country') is-invalid @enderror"
                                    id="country" required>
                                        <option value="0" label="Chọn quốc gia..." selected="selected">Chọn quốc
                                        gia...</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
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
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire, Sint Eustatius and Saba">Caribbean Netherlands</option>
                                        <option value="Bosnia and Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo - Brazzaville</option>
                                        <option value="Congo, Democratic Republic of the Congo">Congo - Kinshasa
                                        </option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'Ivoire">Côte d’Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curacao">Curaçao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czechia</option>
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
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Islas Malvinas)
                                        </option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories
                                        </option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard & McDonald Islands
                                        </option>
                                        <option value="Holy See (Vatican City State)">Vatican City</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">North Korea</option>
                                        <option value="Korea, Republic of">South Korea</option>
                                        <option value="Kosovo">Kosovo</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, the Former Yugoslav Republic of">North Macedonia
                                        </option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia</option>
                                        <option value="Moldova, Republic of">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar (Burma)</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Curaçao</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn Islands</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Réunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barthelemy">St. Barthélemy</option>
                                        <option value="Saint Helena">St. Helena</option>
                                        <option value="Saint Kitts and Nevis">St. Kitts & Nevis</option>
                                        <option value="Saint Lucia">St. Lucia</option>
                                        <option value="Saint Martin">St. Martin</option>
                                        <option value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option>
                                        <option value="Saint Vincent and the Grenadines">St. Vincent & Grenadines
                                        </option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">São Tomé & Príncipe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Serbia and Montenegro">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Sint Maarten">Sint Maarten</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and the South Sandwich Islands">South Georgia &
                                            South Sandwich Islands</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option>
                                        <option value="Swaziland">Eswatini</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syria</option>
                                        <option value="Taiwan, Province of China">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks & Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">U.S. Outlying Islands
                                        </option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Vietnam</option>
                                        <option value="Virgin Islands, British">British Virgin Islands</option>
                                        <option value="Virgin Islands, U.s.">U.S. Virgin Islands</option>
                                        <option value="Wallis and Futuna">Wallis & Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">Số điện thoại<span
                                    class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <input type="phone" id="phone"
                                        class="data-field form-control @error('phone') red-alert is-invalid @enderror is-invalid " name="phone"
                                        value="" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="paidAmount" class="col-md-4 col-form-label text-md-end">Đã TT</label>

                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center">
                                        <input id="paidAmount" type="number" style="width:50%; margin:0px 5px 0px 0px;"
                                        class="form-control @error('numDevices') is-invalid @enderror" name="paidAmount"
                                        value="{{ old('paidAmount') }}"  autocomplete="paidAmount">

                                    <select name="currency" style="width:50%; margin: 0px 5px 0px 0px;" class="form-control @error('active') is-invalid @enderror"
                                            id="currency">
                                                <option value="0" label="Chọn đơn vị..."  selected="selected" disabled hidden>Chọn đơn vị...</option>
                                                <option value="{{VND}}">k VND</option>
                                                <option value="{{USD}}">USD</option>
                                                <option value="{{EURO}}">EURO</option>
                                    </select>
                                    </div>

                                    @error('paidAmount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="manager" class="col-md-4 col-form-label text-md-end">Người quản lý<span class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <select name="manager" style="width:50%; margin: 0px 5px 0px 0px;" class="form-control @error('manager') is-invalid @enderror"
                                            id="manager">
                                                <option value="0" label="Chọn người quản lý..."  selected="selected" disabled hidden>Chọn người quản lý...</option>
                                                @foreach ( User::whereIn('role_user', [ROLE_ADMIN,ROLE_SUPER_ADMIN ])->get() as $manager)
                                                    <option value="{{$manager->id}}" >{{$manager->name}}</option>
                                                @endforeach
                                    </select>
                                    @error('manager')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="boxAssign" class="col-md-4 col-form-label text-md-end">Đăng ký box</label>

                                <div class="col-md-6">
                                    <input id="boxAssign" type="checkbox"
                                    class=" @error('note') is-invalid @enderror" style="margin-top: 13px;" name="boxAssign"
                                    autocomplete="note">

                                    @error('boxAssign')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="boxInfo" class="col-md-4 col-form-label text-md-end">Thông tin box</label>

                                <div class="col-md-6">
                                    <input id="boxInfo" type="text"
                                        class="form-control @error('boxInfo') is-invalid @enderror" name="boxInfo"
                                        value="{{ old('boxInfo') }}" autocomplete="note">

                                    @error('boxInfo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($accountType == ROLE_USER)
                                @include('layouts.addMultiImage')
                            @endif

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="createSubmit" name="phoneNumber" type="submit" class="btn"
                                        style="background-color:#840123; color:white;">
                                        Tạo tài khoản
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.showFullImage')

</body>
<style>
    .red-alert{
        border:solid 1px red;
    }
</style>
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
            $('#createSubmit').val(phoneInput.getNumber());
        });

        // var phoneExisted  = "{{old('phone')}}";
        // console.log('phone existed : ', phoneExisted);
        // $('#createSubmit').val(phoneExisted);
    })
</script>

</html>
