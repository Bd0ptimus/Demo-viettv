<!doctype html>
@include('layouts.app')
<html lang="vi">
@php
    $role_user = ROLE_USER;
    $role_admin = ROLE_ADMIN;
@endphp

<body>
    <div class="container" style="padding-top:50px;">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if ($accountType == $role_user)
                        <div class="card-header d-flex justify-content-center" ><i class="fa-solid fa-thumbs-up fa-2xl"
                                style="color:green; margin-top:15px;"></i> <span style="font-weight : 800; font-size : 20px;">
                                Tạo tài khoản người dùng thành công!</span></div>
                    @else
                        <div class="card-header d-flex justify-content-center"><i class="fa-solid fa-thumbs-up fa-2xl"
                                style="color:green; margin-top:15px;" ></i> <span style="font-weight : 800; font-size : 20px;">
                                Tạo tài khoản admin thành công!</span></div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <h4>Thông tin tài khoản</h4>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div style="width : 40%;">
                                <h6 style="font-weight : 700;">Tên : </h6>
                            </div>
                            <div style="width : 60%;">
                                <p>{{ $newUser->name }}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div style="width : 40%;">
                                <h6 style="font-weight : 700;">Tên đăng nhập : </h6>
                            </div>
                            <div style="width : 60%;">
                                <p>{{ $newUser->username }}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div style="width : 40%;">
                                <h6 style="font-weight : 700; margin-bottom: 16px;">Email : </h6>
                            </div>
                            <div style="width : 60%;">
                                <p>{{ $newUser->email }}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div style="width : 40%;">
                                <h6 style="font-weight : 700;">Mật khẩu :</h6>
                            </div>
                            <div style="width : 60%;">
                                <p>{{ $newUser->password_raw }}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div style="width : 40%;">
                                <h6 style="font-weight : 700;">Ngày hết hạn :</h6>
                            </div>
                            <div style="width : 60%;">
                                <p>{{ isset($user->expired_date)?date("d-m-Y", strtotime($user->expired_date)):''}}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div style="width : 40%;">
                                <h6 style="font-weight : 700;">Số thiết bị đăng nhập cùng lúc :</h6>
                            </div>
                            <div style="width : 60%;">
                                <p>{{ $newUser->number_devices }}</p>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-around">
                            <a class="redirect-btn" href="{{ route('admin.accountManager') }}"> {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_admin])}}" --}}
                                <i class="fa-solid fa-users"></i><span> Trở lại trang quản lý tài khoản </span>
                            </a>
                            @if ($newUser->email != '')
                                @if ($accountType == $role_user)
                                    <a class="redirect-btn" href="{{ route('admin.sendAccountDetail',['userId'=>$newUser->id, 'pageId'=>ADMIN_PAGE]) }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_admin])}}" --}}
                                        <i class="fa-solid fa-users"></i><span> Gửi thông tin tài khoản đến cho người dùng </span>
                                    </a>
                                @else
                                    <a class="redirect-btn" href="{{ route('admin.sendAccountDetail',['userId'=>$newUser->id,'pageId'=>CREATE_ACC_CONFIRMATION_PAGE]) }}">
                                        {{-- href="{{route('admin.account.createAccount',['accountType'=>$role_admin])}}" --}}
                                        <i class="fa-solid fa-users"></i><span> Gửi thông tin tài khoản đến cho Admin </span>
                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.toast')

</body>
<script type="text/javascript">
    $(document).ready(function(){
        var sendMailComplete = "{{$sendMailComplete??-1}}";
        console.log('check toast : ', sendMailComplete);
        if(sendMailComplete!='-1'){
            if(sendMailComplete == "0"){
                $('#toast-fail-text').text('Gửi email không thành công, vui lòng thử lại');
                $('#notification-fail').toast('show');
            }else if(sendMailComplete == "1"){
                $('#toast-success-text').text('Gửi email thành công!');
                $('#notification-success').toast('show');
            }
        }
    })

</script>

</html>
