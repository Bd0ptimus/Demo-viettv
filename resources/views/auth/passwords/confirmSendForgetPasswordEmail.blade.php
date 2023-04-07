<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
@endphp
<style>
    .body-text{
        font-size:18px;
        width:auto;
        padding:0px;
    }


</style>
<body>
    <div class="container" style="padding-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <i class="fa-solid fa-thumbs-up fa-2xl" style="color:green; margin-top:15px;">  </i>
                        @if($hasEmail)
                            <span style="font-weight : 800; font-size : 20px;">Đã yêu cầu đặt lại mật khẩu thành công!</span>
                        @else
                            <span style="font-weight : 800; font-size : 20px;">Xác nhận quên mật khẩu!</span>
                        @endif
                    </div>

                    <div class="card-body">
                        @if($hasEmail)
                        <div class="row d-flex justify-content-center body-text">
                            Chúng tôi đã gửi cho bạn một email xác nhận. Vui lòng kiểm tra email của bạn để đặt lại mật khẩu.
                        </div>
                        @else
                        <div class="row d-flex justify-content-center body-text">
                            Vui lòng liên hệ với chúng tôi để đặt lại mật khẩu của bạn. Số điện thoại +84983775500 (Zalo)
                        </div>
                        <div class="row d-flex justify-content-center">
                            <a class="redirect-btn" href="https://zalo.me/84983775500">
                                <i class="fa-solid fa-mobile ">    </i><span >     Đi đến liên hệ nhà cung cấp dịch vụ</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



