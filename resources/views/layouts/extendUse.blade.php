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
                        <span style="font-weight : 800; font-size : 20px;">Gia Hạn</span>
                    </div>

                    <div class="card-body">
                        {{-- <div class="row d-flex justify-content-center body-text">
                            Vui lòng liên hệ số điện thoại +84983775500 (Zalo) để được hỗ trợ gia hạn. Hoặc tự gia hạn.
                        </div> --}}
                        <div class="row d-flex justify-content-center">
                            <span class="body-text" > Vui lòng liên hệ số điện thoại </span>
                            <span class="body-text" style="font-weight : 800;">+84983775500 (Zalo)</span>
                            <span class="body-text"> để được hỗ trợ gia hạn. Hoặc tự gia hạn.</span>
                        </div>

                        <div class="row d-flex justify-content-around">
                            <a class="redirect-btn vertical-container m-2" href="https://zalo.me/84983775500">
                                <i class="fa-solid fa-mobile ">    </i><span >     Liên hệ gia hạn</span>
                            </a>
                            <a class="redirect-btn m-2" href="#">
                                <i class="fa-solid fa-mobile ">    </i><span >     Tự gia hạn</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



