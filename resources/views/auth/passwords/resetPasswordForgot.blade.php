<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
@endphp
<body>
    <div class="container" style="padding-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Xin chào {{$user->name}}. Hãy đặt lại mật khẩu của bạn</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.password.forget.mail',['token'=>$token]) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu mới</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Xác nhận mật khẩu mới</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn" style="background-color:#840123; color:white;">
                                        Đặt lại mật khẩu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>





