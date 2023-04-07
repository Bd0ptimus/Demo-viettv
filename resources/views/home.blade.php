<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
@endphp
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ asset('css/login1.css?v=') . time() }}">

<body class="login-background-img" style=" height:auto;" id="mainSec">
    <section class="ftco-section" style="padding:0px; height : 100vh;">
        @if (Admin::user() == null)
            <div class="container vertical-element-middle-align" style="height:auto; padding:0px !important; width:100% !important;">


                <div class="row justify-content-center" style="width:100% !important; margin:30px 0px 0px; ">
                    <div class="col-md-6 text-center mb-1">
                        <h2 class="heading-section main-text-color">Đăng Nhập</h2>
                    </div>
                </div>
                <div class="row justify-content-center" style="width:100% !important; margin:0px;">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            {{-- <h3 class="mb-4 text-center main-text-color" style="font-weight: 600;">Bạn đã có tài khoản?</h3> --}}
                            <form action="{{ route('auth.login') }}" method="POST" class="signin-form"> @csrf
                                <div class="form-group">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" placeholder="Tên đăng nhập" required
                                        autocomplete="username" autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group" style="position:relative;">
                                    <input id="password-field" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Mật khẩu" autocomplete="current-password" required>

                                    <span toggle="#password-field" style="position: absolute; top:25px; right:10px;"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Đăng
                                        Nhập</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    {{-- <div style="width:50%;margin:0px;">
                                        <label class="checkbox-wrap checkbox-primary">Ghi nhớ đăng nhập
                                            <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> --}}
                                    <div class="text-md-right d-flex justify-content-center"
                                        style="width:100%;margin:0px;">
                                        <a href="{{ route('auth.password.forget.index') }}" style="color: #fbceb5">Quên
                                            mật khẩu</a>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <a href="{{ route('auth.register') }}" style="color: #fbceb5">Bạn chưa có tài khoản
                                        ?</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="social row text-center d-flex justify-content-center" style="width:100%; margin:0px;">
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;" href='{{ route('tv.index') }}'>
                        <img class="login-action-img" src="{{ asset('storage/web-info/logo/tv-logo.png') }}">
                        <div class="login-action-text-sec vertical-container">
                            <p class="login-action-text vertical-element-middle-align">
                                TRUYỀN HÌNH
                            </p>

                        </div>
                    </a>
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;">
                        <img class="login-action-img" src="{{ asset('storage/web-info/logo/netflix-logo.png') }}">
                        <div class="login-action-text-sec vertical-container">
                            <p class="login-action-text vertical-element-middle-align">
                                NETFLIX
                            </p>

                        </div>
                    </a>
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;">
                        <img class="login-action-img"
                            src="{{ asset('storage/web-info/logo/youtubepremium-logo.png') }}">
                        <div class="login-action-text-sec vertical-container">
                            <p class="login-action-text vertical-element-middle-align">
                                YOUTUBE PREMIUM
                            </p>
                        </div>
                    </a>
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;">
                        <img class="login-action-img" src="{{ asset('storage/web-info/logo/vpn-logo.png') }}">
                        <div class="login-action-text-sec vertical-container">
                            <p class="login-action-text vertical-element-middle-align">
                                VPN
                            </p>
                        </div>
                    </a>
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;" href="https://www.facebook.com/viettv1922/">
                        <img class="login-action-img" src="{{ asset('storage/web-info/logo/fanpage-logo.jpg') }}">
                        <div class="login-action-text-sec vertical-container">

                            <p class="login-action-text vertical-element-middle-align">
                                FANPAGE
                            </p>
                        </div>
                    </a>
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;" href="https://m.me/viettv1922">
                        <img class="login-action-img" src="{{ asset('storage/web-info/logo/support-logo.jpg') }}">
                        <div class="login-action-text-sec vertical-container">
                            <p class="login-action-text vertical-element-middle-align">
                                HỖ TRỢ KỸ THUẬT
                            </p>
                        </div>
                    </a>
                    <a class="login-action-nav d-block justify-content-center rounded m-2"
                        style="border:0px !important;" href="{{ route('auth.registerExtendUse') }}">
                        <img class="login-action-img" src="{{ asset('storage/web-info/logo/register-logo.png') }}">
                        <div class="login-action-text-sec vertical-container">
                            <p class="login-action-text vertical-element-middle-align">
                                ĐĂNG KÝ/GIA HẠN
                            </p>

                        </div>
                    </a>

                </div>
            </div>
        @else
            <div class="container" style="height:auto; margin:0px;">
                <div class="row vertical-container" style="width: 100vw; height:100vh;">
                    <div class="social row text-center d-flex justify-content-center vertical-element-middle-align"
                        style="width:100%; margin:auto;">
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;" href='{{ route('tv.index') }}'>
                            <img class="login-action-img" src="{{ asset('storage/web-info/logo/tv-logo.png') }}">
                            <div class="login-action-text-sec vertical-container">
                                <p class="login-action-text vertical-element-middle-align">
                                    TRUYỀN HÌNH
                                </p>

                            </div>
                        </a>
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;">
                            <img class="login-action-img"
                                src="{{ asset('storage/web-info/logo/netflix-logo.png') }}">
                            <div class="login-action-text-sec vertical-container">
                                <p class="login-action-text vertical-element-middle-align">
                                    NETFLIX
                                </p>

                            </div>
                        </a>
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;">
                            <img class="login-action-img"
                                src="{{ asset('storage/web-info/logo/youtubepremium-logo.png') }}">
                            <div class="login-action-text-sec vertical-container">
                                <p class="login-action-text vertical-element-middle-align">
                                    YOUTUBE PREMIUM
                                </p>
                            </div>
                        </a>
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;">
                            <img class="login-action-img" src="{{ asset('storage/web-info/logo/vpn-logo.png') }}">
                            <div class="login-action-text-sec vertical-container">
                                <p class="login-action-text vertical-element-middle-align">
                                    VPN
                                </p>
                            </div>
                        </a>
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;" href="https://www.facebook.com/viettv1922/">
                            <img class="login-action-img"
                                src="{{ asset('storage/web-info/logo/fanpage-logo.jpg') }}">
                            <div class="login-action-text-sec vertical-container">

                                <p class="login-action-text vertical-element-middle-align">
                                    FANPAGE
                                </p>
                            </div>
                        </a>
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;" href="https://m.me/viettv1922">
                            <img class="login-action-img"
                                src="{{ asset('storage/web-info/logo/support-logo.jpg') }}">
                            <div class="login-action-text-sec vertical-container">
                                <p class="login-action-text vertical-element-middle-align">
                                    HỖ TRỢ KỸ THUẬT
                                </p>
                            </div>
                        </a>
                        <a class="login-action-nav d-block justify-content-center rounded m-2"
                            style="border:0px !important;" href="{{ route('auth.registerExtendUse') }}">
                            <img class="login-action-img"
                                src="{{ asset('storage/web-info/logo/register-logo.png') }}">
                            <div class="login-action-text-sec vertical-container">
                                <p class="login-action-text vertical-element-middle-align">
                                    ĐĂNG KÝ/GIA HẠN
                                </p>

                            </div>
                        </a>

                    </div>
                </div>
            </div>
        @endif





    </section>

    <script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>

</html>
