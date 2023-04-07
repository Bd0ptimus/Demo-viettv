<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
    use App\Models\User;
    if($user->role_user == ROLE_USER){
        $images = [];
        foreach( $user->invoiceAttachments as $image){
            array_push($images, $image->url);
        }
    }
@endphp
<body>
    <div class="container" style="padding-top:50px; background-color:white;" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Thay đổi thông tin tài khoản
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.changeInfoAccount',['userId'=>$user->id]) }}"  enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">ID người dùng</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" value="{{$user->id}}" disabled autofocus>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Tên</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{$user->name}}" disabled autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Tên đăng nhập <span class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="expiredDate" class="col-md-4 col-form-label text-md-end">Thời gian hết hạn  <span class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <input id="expiredDate" type="date" class="form-control @error('expiredDate') is-invalid @enderror" name="expiredDate" value="{{$user->expired_date}}" required autocomplete="expiredDate">

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="numDevices" class="col-md-4 col-form-label text-md-end">Số lượng thiết bị được phép đăng nhập cùng lúc <span class="text-danger">(*)</span></label>

                                <div class="col-md-6">
                                    <input id="numDevices" type="number" class="form-control @error('numDevices') is-invalid @enderror" name="numDevices" value="{{ $user->number_devices }}" required autocomplete="numDevices">

                                    @error('numDevices')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country" class="col-md-4 col-form-label text-md-end">Quốc gia<span
                                        class="text-danger">(*)</span></label>
                                <div class="col-md-6">
                                    <select name="country" class="form-control @error('country') is-invalid @enderror"
                                    id="country" required>
                                        <option value="0" label="Chọn quốc gia..." >Chọn quốc
                                        gia...</option>
                                        <option @if($user->country == 'Viet Nam') selected="selected" @endif value="Viet Nam">Vietnam</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Afghanistan') selected="selected" @endif value="Afghanistan" >Afghanistan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Aland Islands') selected="selected" @endif value="Aland Islands" >Åland Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Albania') selected="selected" @endif value="Albania">Albania</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Algeria') selected="selected" @endif value="Algeria" >Algeria</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'American Samoa') selected="selected" @endif value="American Samoa" >American Samoa</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Andorra') selected="selected" @endif value="Andorra" >Andorra</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Angola') selected="selected" @endif value="Angola" >Angola</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Anguilla') selected="selected" @endif value="Anguilla">Anguilla</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Antarctica') selected="selected" @endif value="Antarctica">Antarctica</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Antigua and Barbuda') selected="selected" @endif value="Antigua and Barbuda">Antigua & Barbuda</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Argentina') selected="selected" @endif value="Argentina">Argentina</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Armenia') selected="selected" @endif value="Armenia">Armenia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Aruba') selected="selected" @endif value="Aruba">Aruba</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Australia') selected="selected" @endif value="Australia">Australia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Austria') selected="selected" @endif value="Austria">Austria</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Azerbaijan') selected="selected" @endif value="Azerbaijan">Azerbaijan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bahamas') selected="selected" @endif value="Bahamas">Bahamas</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bahrain') selected="selected" @endif value="Bahrain">Bahrain</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bangladesh') selected="selected" @endif value="Bangladesh">Bangladesh</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Barbados') selected="selected" @endif value="Barbados">Barbados</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Belarus') selected="selected" @endif value="Belarus">Belarus</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Belgium') selected="selected" @endif value="Belgium">Belgium</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Belize') selected="selected" @endif value="Belize">Belize</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Benin') selected="selected" @endif value="Benin">Benin</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bermuda') selected="selected" @endif value="Bermuda">Bermuda</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bhutan') selected="selected" @endif value="Bhutan">Bhutan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bolivia') selected="selected" @endif value="Bolivia">Bolivia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bonaire, Sint Eustatius and Saba') selected="selected" @endif value="Bonaire, Sint Eustatius and Saba">Caribbean Netherlands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bosnia and Herzegovina') selected="selected" @endif value="Bosnia and Herzegovina">Bosnia & Herzegovina</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Botswana') selected="selected" @endif value="Botswana">Botswana</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bouvet Island') selected="selected" @endif value="Bouvet Island">Bouvet Island</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Brazil') selected="selected" @endif value="Brazil">Brazil</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'British Indian Ocean Territory') selected="selected" @endif value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option >
                                        <option @if($user->country == 'Brunei Darussalam') selected="selected" @endif value="Brunei Darussalam">Brunei</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Bulgaria') selected="selected" @endif value="Bulgaria">Bulgaria</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Burkina Faso') selected="selected" @endif value="Burkina Faso">Burkina Faso</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Burundi') selected="selected" @endif value="Burundi">Burundi</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cambodia') selected="selected" @endif value="Cambodia">Cambodia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cameroon') selected="selected" @endif value="Cameroon">Cameroon</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Canada') selected="selected" @endif value="Canada">Canada</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cape Verde') selected="selected" @endif value="Cape Verde">Cape Verde</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cayman Islands') selected="selected" @endif value="Cayman Islands">Cayman Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Central African Republic') selected="selected" @endif value="Central African Republic">Central African Republic</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Chad') selected="selected" @endif value="Chad">Chad</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Chile') selected="selected" @endif value="Chile">Chile</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'China') selected="selected" @endif value="China">China</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Christmas Island') selected="selected" @endif value="Christmas Island">Christmas Island</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cocos (Keeling) Islands') selected="selected" @endif value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Colombia') selected="selected" @endif value="Colombia">Colombia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Comoros') selected="selected" @endif value="Comoros">Comoros</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Congo') selected="selected" @endif value="Congo">Congo - Brazzaville</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Congo, Democratic Republic of the Congo') selected="selected" @endif value="Congo, Democratic Republic of the Congo">Congo - Kinshasa
                                        </option >
                                        <option @if($user->country == 'Cook Islands') selected="selected" @endif value="Cook Islands">Cook Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Costa Rica') selected="selected" @endif value="Costa Rica">Costa Rica</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == "Cote D'Ivoire") selected="selected" @endif value="Cote D'Ivoire">Côte d’Ivoire</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Croatia') selected="selected" @endif value="Croatia">Croatia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cuba') selected="selected" @endif value="Cuba">Cuba</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Curacao') selected="selected" @endif value="Curacao">Curaçao</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Cyprus') selected="selected" @endif value="Cyprus">Cyprus</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Czech Republic') selected="selected" @endif value="Czech Republic">Czechia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Denmark') selected="selected" @endif value="Denmark">Denmark</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Djibouti') selected="selected" @endif value="Djibouti">Djibouti</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Dominica') selected="selected" @endif value="Dominica">Dominica</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Dominican Republic') selected="selected" @endif value="Dominican Republic">Dominican Republic</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Ecuador') selected="selected" @endif value="Ecuador">Ecuador</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Egypt') selected="selected" @endif value="Egypt">Egypt</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'El Salvador') selected="selected" @endif value="El Salvador">El Salvador</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Equatorial Guinea') selected="selected" @endif value="Equatorial Guinea">Equatorial Guinea</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Eritrea') selected="selected" @endif value="Eritrea">Eritrea</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Estonia') selected="selected" @endif value="Estonia">Estonia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Ethiopia') selected="selected" @endif value="Ethiopia">Ethiopia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Falkland Islands (Malvinas)') selected="selected" @endif value="Falkland Islands (Malvinas)">Falkland Islands (Islas Malvinas)
                                        </option >
                                        <option @if($user->country == 'Faroe Islands') selected="selected" @endif value="Faroe Islands">Faroe Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Fiji') selected="selected" @endif value="Fiji">Fiji</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Finland') selected="selected" @endif value="Finland">Finland</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'France') selected="selected" @endif value="France">France</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'French Guiana') selected="selected" @endif value="French Guiana">French Guiana</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'French Polynesia') selected="selected" @endif value="French Polynesia">French Polynesia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'French Southern Territories') selected="selected" @endif value="French Southern Territories">French Southern Territories
                                        </option >
                                        <option @if($user->country == 'Gabon') selected="selected" @endif value="Gabon">Gabon</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Gambia') selected="selected" @endif value="Gambia">Gambia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Georgia') selected="selected" @endif value="Georgia">Georgia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Germany') selected="selected" @endif value="Germany">Germany</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Ghana') selected="selected" @endif value="Ghana">Ghana</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Gibraltar') selected="selected" @endif value="Gibraltar">Gibraltar</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Greece') selected="selected" @endif value="Greece">Greece</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Greenland') selected="selected" @endif value="Greenland">Greenland</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Grenada') selected="selected" @endif value="Grenada">Grenada</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guadeloupe') selected="selected" @endif value="Guadeloupe">Guadeloupe</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guam') selected="selected" @endif value="Guam">Guam</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guatemala') selected="selected" @endif value="Guatemala">Guatemala</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guernsey') selected="selected" @endif value="Guernsey">Guernsey</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guinea') selected="selected" @endif value="Guinea">Guinea</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guinea-Bissau') selected="selected" @endif value="Guinea-Bissau">Guinea-Bissau</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Guyana') selected="selected" @endif value="Guyana">Guyana</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Haiti') selected="selected" @endif value="Haiti">Haiti</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Heard Island and Mcdonald Islands') selected="selected" @endif value="Heard Island and Mcdonald Islands">Heard & McDonald Islands
                                        </option>
                                        <option @if($user->country == '"Holy See (Vatican City State)') selected="selected" @endif value="Holy See (Vatican City State)">Vatican City</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Honduras') selected="selected" @endif value="Honduras">Honduras</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Hong Kong') selected="selected" @endif value="Hong Kong">Hong Kong</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Hungary') selected="selected" @endif value="Hungary">Hungary</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Iceland') selected="selected" @endif value="Iceland">Iceland</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'India') selected="selected" @endif value="India">India</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Indonesia') selected="selected" @endif value="Indonesia">Indonesia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Iran, Islamic Republic of') selected="selected" @endif value="Iran, Islamic Republic of">Iran</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Iraq') selected="selected" @endif value="Iraq">Iraq</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Ireland') selected="selected" @endif value="Ireland">Ireland</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Isle of Man') selected="selected" @endif value="Isle of Man">Isle of Man</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Israel') selected="selected" @endif value="Israel">Israel</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Italy') selected="selected" @endif value="Italy">Italy</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Jamaica') selected="selected" @endif value="Jamaica">Jamaica</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Japan') selected="selected" @endif value="Japan">Japan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Jersey') selected="selected" @endif value="Jersey">Jersey</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Jordan') selected="selected" @endif value="Jordan">Jordan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Kazakhstan') selected="selected" @endif value="Kazakhstan">Kazakhstan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Kenya') selected="selected" @endif value="Kenya">Kenya</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Kiribati') selected="selected" @endif value="Kiribati">Kiribati</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == "Korea, Democratic People's Republic of") selected="selected" @endif value="Korea, Democratic People's Republic of">North Korea</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Korea, Republic of') selected="selected" @endif value="Korea, Republic of">South Korea</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Kosovo') selected="selected" @endif value="Kosovo">Kosovo</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Kuwait') selected="selected" @endif value="Kuwait">Kuwait</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Kyrgyzstan') selected="selected" @endif value="Kyrgyzstan">Kyrgyzstan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == "Lao People's Democratic Republic") selected="selected" @endif value="Lao People's Democratic Republic">Laos</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Latvia') selected="selected" @endif value="Latvia">Latvia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Lebanon') selected="selected" @endif value="Lebanon">Lebanon</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Lesotho') selected="selected" @endif value="Lesotho">Lesotho</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Liberia') selected="selected" @endif value="Liberia">Liberia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Libyan Arab Jamahiriya') selected="selected" @endif value="Libyan Arab Jamahiriya">Libya</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Liechtenstein') selected="selected" @endif value="Liechtenstein">Liechtenstein</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Lithuania') selected="selected" @endif value="Lithuania">Lithuania</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Luxembourg') selected="selected" @endif value="Luxembourg">Luxembourg</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Macao') selected="selected" @endif value="Macao">Macao</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Macedonia, the Former Yugoslav Republic of') selected="selected" @endif value="Macedonia, the Former Yugoslav Republic of">North Macedonia
                                        </option>
                                        <option @if($user->country == 'Madagascar') selected="selected" @endif value="Madagascar">Madagascar</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Malawi') selected="selected" @endif value="Malawi">Malawi</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Malaysia') selected="selected" @endif value="Malaysia">Malaysia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Maldives') selected="selected" @endif value="Maldives">Maldives</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mali') selected="selected" @endif value="Mali">Mali</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Malta') selected="selected" @endif value="Malta">Malta</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Marshall Islands') selected="selected" @endif value="Marshall Islands">Marshall Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Martinique') selected="selected" @endif value="Martinique">Martinique</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mauritania') selected="selected" @endif value="Mauritania">Mauritania</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mauritius') selected="selected" @endif value="Mauritius">Mauritius</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mayotte') selected="selected" @endif value="Mayotte">Mayotte</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mexico') selected="selected" @endif value="Mexico">Mexico</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Micronesia, Federated States of') selected="selected" @endif value="Micronesia, Federated States of">Micronesia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Moldova, Republic of') selected="selected" @endif value="Moldova, Republic of">Moldova</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Monaco') selected="selected" @endif value="Monaco">Monaco</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mongolia') selected="selected" @endif value="Mongolia">Mongolia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Montenegro') selected="selected" @endif value="Montenegro">Montenegro</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Montserrat') selected="selected" @endif value="Montserrat">Montserrat</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Morocco') selected="selected" @endif value="Morocco">Morocco</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Mozambique') selected="selected" @endif value="Mozambique">Mozambique</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Myanmar') selected="selected" @endif value="Myanmar">Myanmar (Burma)</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Namibia') selected="selected" @endif value="Namibia">Namibia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Nauru') selected="selected" @endif value="Nauru">Nauru</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Nepal') selected="selected" @endif value="Nepal">Nepal</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Netherlands') selected="selected" @endif value="Netherlands">Netherlands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Netherlands Antilles') selected="selected" @endif value="Netherlands Antilles">Curaçao</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'New Caledonia') selected="selected" @endif value="New Caledonia">New Caledonia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'New Zealand') selected="selected" @endif value="New Zealand">New Zealand</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Nicaragua') selected="selected" @endif value="Nicaragua">Nicaragua</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Niger') selected="selected" @endif value="Niger">Niger</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Nigeria') selected="selected" @endif value="Nigeria">Nigeria</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Niue') selected="selected" @endif value="Niue">Niue</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Norfolk Island') selected="selected" @endif value="Norfolk Island">Norfolk Island</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Northern Mariana Islands') selected="selected" @endif value="Northern Mariana Islands">Northern Mariana Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Norway') selected="selected" @endif value="Norway">Norway</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Oman') selected="selected" @endif value="Oman">Oman</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Pakistan') selected="selected" @endif value="Pakistan">Pakistan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Palau') selected="selected" @endif value="Palau">Palau</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Palestinian Territory, Occupied') selected="selected" @endif value="Palestinian Territory, Occupied">Palestine</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Panama') selected="selected" @endif value="Panama">Panama</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Papua New Guinea') selected="selected" @endif value="Papua New Guinea">Papua New Guinea</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Paraguay') selected="selected" @endif value="Paraguay">Paraguay</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Peru') selected="selected" @endif value="Peru">Peru</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Philippines') selected="selected" @endif value="Philippines">Philippines</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Pitcairn') selected="selected" @endif value="Pitcairn">Pitcairn Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Poland') selected="selected" @endif value="Poland">Poland</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Portugal') selected="selected" @endif value="Portugal">Portugal</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Puerto Rico') selected="selected" @endif value="Puerto Rico">Puerto Rico</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Qatar') selected="selected" @endif value="Qatar">Qatar</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Reunion') selected="selected" @endif value="Reunion">Réunion</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Romania') selected="selected" @endif value="Romania">Romania</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Russian Federation') selected="selected" @endif value="Russian Federation">Russia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Rwanda') selected="selected" @endif value="Rwanda">Rwanda</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Barthelemy') selected="selected" @endif value="Saint Barthelemy">St. Barthélemy</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Helena') selected="selected" @endif value="Saint Helena">St. Helena</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Kitts and Nevis') selected="selected" @endif value="Saint Kitts and Nevis">St. Kitts & Nevis</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Lucia') selected="selected" @endif value="Saint Lucia">St. Lucia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Martin') selected="selected" @endif value="Saint Martin">St. Martin</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Pierre and Miquelon') selected="selected" @endif value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saint Vincent and the Grenadines') selected="selected" @endif value="Saint Vincent and the Grenadines">St. Vincent & Grenadines
                                        </option >
                                        <option @if($user->country == 'Samoa') selected="selected" @endif value="Samoa">Samoa</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'San Marino') selected="selected" @endif value="San Marino">San Marino</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Sao Tome and Principe') selected="selected" @endif value="Sao Tome and Principe">São Tomé & Príncipe</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Saudi Arabia') selected="selected" @endif value="Saudi Arabia">Saudi Arabia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Senegal') selected="selected" @endif value="Senegal">Senegal</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Serbia') selected="selected" @endif value="Serbia">Serbia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Serbia and Montenegro') selected="selected" @endif value="Serbia and Montenegro">Serbia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Seychelles') selected="selected" @endif value="Seychelles">Seychelles</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Sierra Leone') selected="selected" @endif value="Sierra Leone">Sierra Leone</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Singapore') selected="selected" @endif value="Singapore">Singapore</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Sint Maarten') selected="selected" @endif value="Sint Maarten">Sint Maarten</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Slovakia') selected="selected" @endif value="Slovakia">Slovakia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Slovenia') selected="selected" @endif value="Slovenia">Slovenia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Solomon Islands') selected="selected" @endif value="Solomon Islands">Solomon Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Somalia') selected="selected" @endif value="Somalia">Somalia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'South Africa') selected="selected" @endif value="South Africa">South Africa</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'South Georgia and the South Sandwich Islands') selected="selected" @endif value="South Georgia and the South Sandwich Islands">South Georgia &
                                            South Sandwich Islands</option >
                                        <option @if($user->country == 'South Sudan') selected="selected" @endif value="South Sudan">South Sudan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Spain') selected="selected" @endif value="Spain">Spain</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Sri Lanka') selected="selected" @endif value="Sri Lanka">Sri Lanka</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Sudan') selected="selected" @endif value="Sudan">Sudan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Suriname') selected="selected" @endif value="Suriname">Suriname</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Svalbard and Jan Mayen') selected="selected" @endif value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Swaziland') selected="selected" @endif value="Swaziland">Eswatini</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Sweden') selected="selected" @endif value="Sweden">Sweden</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Switzerland') selected="selected" @endif value="Switzerland">Switzerland</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Syrian Arab Republic') selected="selected" @endif value="Syrian Arab Republic">Syria</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Taiwan, Province of China') selected="selected" @endif value="Taiwan, Province of China">Taiwan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Tajikistan') selected="selected" @endif value="Tajikistan">Tajikistan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Tanzania, United Republic of') selected="selected" @endif value="Tanzania, United Republic of">Tanzania</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Thailand') selected="selected" @endif value="Thailand">Thailand</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Timor-Leste') selected="selected" @endif value="Timor-Leste">Timor-Leste</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Togo') selected="selected" @endif value="Togo">Togo</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Tokelau') selected="selected" @endif value="Tokelau">Tokelau</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Tonga') selected="selected" @endif value="Tonga">Tonga</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Trinidad and Tobago') selected="selected" @endif value="Trinidad and Tobago">Trinidad & Tobago</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Tunisia') selected="selected" @endif value="Tunisia">Tunisia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Turkey') selected="selected" @endif value="Turkey">Turkey</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Turkmenistan') selected="selected" @endif value="Turkmenistan">Turkmenistan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Turks and Caicos Islands') selected="selected" @endif value="Turks and Caicos Islands">Turks & Caicos Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Tuvalu') selected="selected" @endif value="Tuvalu">Tuvalu</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Uganda') selected="selected" @endif value="Uganda">Uganda</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Ukraine') selected="selected" @endif value="Ukraine">Ukraine</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'United Arab Emirates') selected="selected" @endif value="United Arab Emirates">United Arab Emirates</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'United Kingdom') selected="selected" @endif value="United Kingdom">United Kingdom</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'United States') selected="selected" @endif value="United States">United States</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'United States Minor Outlying Islands') selected="selected" @endif value="United States Minor Outlying Islands">U.S. Outlying Islands
                                        </option >
                                        <option @if($user->country == 'Uruguay') selected="selected" @endif value="Uruguay">Uruguay</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Uzbekistan') selected="selected" @endif value="Uzbekistan">Uzbekistan</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Vanuatu') selected="selected" @endif value="Vanuatu">Vanuatu</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Venezuela') selected="selected" @endif value="Venezuela">Venezuela</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Virgin Islands, British') selected="selected" @endif value="Virgin Islands, British">British Virgin Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == '"Virgin Islands, U.s.') selected="selected" @endif value="Virgin Islands, U.s.">U.S. Virgin Islands</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Wallis and Futuna') selected="selected" @endif value="Wallis and Futuna">Wallis & Futuna</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Western Sahara') selected="selected" @endif value="Western Sahara">Western Sahara</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Yemen') selected="selected" @endif value="Yemen">Yemen</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Zambia') selected="selected" @endif value="Zambia">Zambia</option @if($user->country == 'Afghanistan') selected="selected" @endif>
                                        <option @if($user->country == 'Zimbabwe') selected="selected" @endif value="Zimbabwe">Zimbabwe</option @if($user->country == 'Afghanistan') selected="selected" @endif>
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
                                        class="data-field form-control @error('phone') is-invalid @enderror" name="phone" style="@error('phone') border:1px solid red; @enderror"
                                        value="{{ $user->phone }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="paidAmount" class="col-md-4 col-form-label text-md-end">Đã TT</label>

                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center">
                                        <input id="paidAmount" type="number" style="width:50%; margin:0px 5px 0px 0px;"
                                        class="form-control @error('numDevices') is-invalid @enderror" name="paidAmount"
                                        value="{{ $user->paid_amount }}"  autocomplete="paidAmount">

                                    <select name="currency" style="width:50%; margin: 0px 5px 0px 0px;" class="form-control @error('active') is-invalid @enderror"
                                            id="currency">
                                                <option value="0" label="Chọn đơn vị..."  selected="selected" disabled hidden>Chọn đơn vị...</option>
                                                <option @if($user->currency == VND) selected @endif value="{{VND}}">k VND</option>
                                                <option @if($user->currency == USD) selected @endif value="{{USD}}">USD</option>
                                                <option @if($user->currency == EURO) selected @endif value="{{EURO}}">EURO</option>
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
                                                @foreach ( User::whereIn('role_user', [ROLE_ADMIN,ROLE_SUPER_ADMIN ])->get() as $manager)
                                                    <option value="{{$manager->id}}" @if($manager->id == $user->manager) selected @endif>{{$manager->name}}</option>
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
                                    class=" @error('note') is-invalid @enderror" style="margin-top: 13px;" name="boxAssign" @if($user->box_assign == BOX_ASSIGNED) checked @endif
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
                                        value="{{ $user->box_info }}" autocomplete="note">

                                    @error('boxInfo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            @if($user->role_user == ROLE_USER)
                                @include('layouts.updateMultiImage')

                            @endif
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="createSubmit" name="phoneNumber" type="submit" class="btn"
                                        style="background-color:#840123; color:white;">
                                        Xác nhận
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
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["vn"],
        initialCountry: "vn",
        // geoIpLookup: getIp,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    $(document).ready(function() {
        $('#createSubmit').val('{{$user->phone}}');
        console.log('phone on change : ', '{{$user->phone}}');
        $('#phone').on('change', function() {
            console.log('phone change');
            $('#createSubmit').val(phoneInput.getNumber());
        });
    })
</script>

</html>


