<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
    $user_suspended = USER_SUSPENDED;
    $user_actived = USER_ACTIVATED;

    $role_admin = ROLE_ADMIN;
    $role_user = ROLE_USER;
@endphp

<style>

</style>
<link href="{{ asset('css/admin/ui.css?v=') . time() }}" rel="stylesheet">
{{-- <link href="{{ asset('css/tv/index.css?v=') . time() }}" rel="stylesheet"> --}}

<body style="margin-top:0px;">
    <div class="row d-block justify-content-center" style=" width:auto; margin:auto; padding:auto; z-index:0;">
        <div class="row d-block justify-content-center" style="width:auto; margin:auto; padding:auto;">
            <div class="row d-flex justify-content-center" style="margin : 0px auto; padding:30px;">
                <h3 class="d-flex justify-content-center" style="padding:0px;">
                    Quản lý giao diện
                </h3>
            </div>

            <div class="d-flex justify-content-center">
                <div class="row" style="width:100%; margin: 30px auto;">
                    <h4 style="text-align:center;">Hình nền web</h4>
                    <div class="d-block justify-content-center">
                        <div class="d-flex justify-content-center">
                            <img class="adminUi-background-img" src = "{{$backgroundUrl}}">
                        </div>
                        <div class="d-block justify-content-center" style="width : 100%; margin: 20px 0px;">
                            <div class="row">
                                <div style="font-size: 20px; font-weight: 600;">
                                    Thay đổi hình nền Web
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <form class="d-block justify-content-center" style="width:100%;" method="POST" enctype="multipart/form-data" action="{{ route('admin.display.changeBackground') }}"> @csrf

                                    <div class="row mb-3">
                                        <label for="url" class="col-md-4 col-form-label text-md-end">URL<span
                                            class="text-danger"></span></label>

                                        <div class="col-md-6">
                                            <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror"
                                            style="@error('url') border:solid 1px red @enderror" placeholder="Url Background"
                                            style="width:50%;" value="{{$backgroundUrl}}" autocomplete="url"/>
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="imgPicker" class="col-md-4 col-form-label text-md-end">Hoặc chọn từ thiết bị<span
                                            class="text-danger"></span></label>

                                        <div class="col-md-6">
                                            <input name="imgPicker" type="file"
                                            style="@error('imgPicker') border:solid 1px red @enderror"
                                            class="form-control @error('imgPicker') is-invalid @enderror" placeholder="Url Background" style="width:50%;" autocomplete="imgPicker"/>
                                            @error('imgPicker')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class= "d-flex justify-content-center" style ="margin : 5px 0px;">
                                        <button type="submit" class="d-flex justify-content-center" style="border:0px;">
                                            Thay đổi
                                        </button>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



</body>
<script src="{{ asset('js/player.js') }}" type="text/javascript"></script>

<script>
$(document).ready(function() {
    $('#imgBackground').remove();

});

</script>

</html>
