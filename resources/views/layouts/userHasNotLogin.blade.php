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
                        <i class="fa-solid fa-triangle-exclamation fa-2xl" style="color:orange; margin-top:15px;">  </i><span style="font-weight : 800; font-size : 20px;">Bạn Chưa Đăng Nhập!</span>
                    </div>

                    <div class="card-body">
                        <div class="row d-flex justify-content-center body-text">
                            Vui lòng đăng nhập vào tài khoản của bạn.
                        </div>
                        <div class="row d-flex justify-content-center">
                            <span class="body-text" > Hoặc nếu chưa có tài khoản. Liên hệ đăng ký tài khoản tại : </span> <span class="body-text" style="font-weight : 800;">+84983775500 (Zalo)</span>
                        </div>

                        <div class="row d-flex justify-content-around">
                            <a class="redirect-btn vertical-container m-2" href="{{route('home')}}">
                                <i class="fa-solid fa-right-to-bracket ">   </i><span >    Đi đến đăng nhập</span>
                            </a>
                            <a class="redirect-btn m-2" href="https://zalo.me/84983775500">
                                <i class="fa-solid fa-mobile ">    </i><span >     Đi đến liên hệ nhà cung cấp dịch vụ</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



