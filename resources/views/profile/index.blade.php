<!doctype html>
<html lang="vi">
    @include('layouts.app')
@php
    use App\Admin;
@endphp
<link href="{{ asset('css/profile/index.css?v=') . time() }}" rel="stylesheet">
<body class="bodyside">
    <div class="project-content-section">
        <div class="row d-block justify-content-center" style="width:100%; margin:0px;">
            <div class="row d-flex justify-content-center" style="width:100%; margin:0px; padding:0px; height:auto; background-color:white;">
                <div class = "user-main-sec">
                    <div class="user-image-sec d-flex justify-content-center" >
                        <div class="user-image-showing-sec " style="position:relative;">
                            <img id="accountUserAvatar" class="user-image-showing" src="{{asset('storage/web-info/logo/tv-logo.png')}}">
                            <div class="row d-flex justify-content-center user-updateAvatar-sec" >
                                <div class="user-updateAvatar-showing-sec">
                                    <button class="user-updateAvatar" style="border:0px;">
                                        <i class="fa-solid fa-camera-retro" style="color:black; "></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-name-sec" style="position:relative;">
                        <div class="row user-name-text d-flex" style="width:calc(100%-20px); margin:0px;">
                            <h1 style="width:auto; font-weight: 800; color:black; font-size:25px;">Bui Dung</h1>
                        </div>
                    </div>
                    <div class="user-action-sec" style="position:relative;">

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                        <div class="row d-flex user-action-btn-sec" style="width:100%; margin:0px; padding:0px;">
                            <div style="width:auto;" class="user-edit-profile-btn">
                                <i class="fa-solid fa-pencil fa-xl"></i> <span class="user-edit-profile-btn-text">Chỉnh sửa thông tin cá nhân<span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>



    </div>

</body>
