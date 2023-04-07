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
                        <span style="font-weight : 800; font-size : 20px;">Đăng Ký/Gia Hạn</span>
                    </div>

                    <div class="card-body">
                        <div class="row d-flex justify-content-around">
                            <a class="redirect-btn vertical-container m-2" href="{{route('auth.register')}}">
                                <span >Đăng ký mới</span>
                            </a>
                            <a class="redirect-btn m-2" href="{{route('auth.extendUse')}}">
                                <span >Gia hạn dịch vụ</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



