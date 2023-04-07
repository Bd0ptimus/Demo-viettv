<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
@endphp
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ asset('css/login1.css?v=') . time() }}">

<body class="img js-fullheight login-background-img">
    <section class="ftco-section" style="padding:50px 0px;">
        <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Đăng Nhập</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center" style="font-weight: 600;">Bạn đã có tài khoản?</h3>
                            <form action="{{ route('auth.login') }}" method="POST" class="signin-form"> @csrf
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Tên đăng nhập" required autocomplete="username" autofocus>
                                    @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input id="password-field"  name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu"  autocomplete="current-password"
                                        required>
                                    <span toggle="#password-field"
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
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Ghi nhớ đăng nhập
                                            <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('auth.password.forget.index') }}" style="color: #fff">Quên Mật Khẩu</a>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            {{-- <div class="social row text-center d-flex justify-content-center" style="width:auto;">
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/tv-logo.png')}}">
                    <div class="login-action-text">TRUYỀN HÌNH</div>
                </a>
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/netflix-logo.png')}}">
                    <div class="login-action-text">NETFLIX</div>
                </a>
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/youtubepremium-logo.png')}}">
                    <div class="login-action-text">YOUTUBE PREMIUM</div>
                </a>
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/vpn-logo.png')}}">
                    <div class="login-action-text">VPN</div>
                </a>
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/fanpage-logo.jpg')}}">
                    <div class="login-action-text">FANPAGE</div>
                </a>
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/support-logo.jpg')}}">
                    <div class="login-action-text">HỖ TRỢ KỸ THUẬT</div>
                </a>
                <a class="login-action-nav d-block justify-content-center rounded m-2"
                    style="border:0px !important;">
                    <img class="login-action-img" src="{{asset('storage/web-info/logo/register-logo.png')}}">
                    <div class="login-action-text">ĐĂNG KÝ/GIA HẠN</div>
                </a>

            </div> --}}
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>

</html>
