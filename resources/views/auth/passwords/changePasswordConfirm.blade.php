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
                        <i class="fa-solid fa-thumbs-up fa-2xl" style="color:green; margin-top:15px;">  </i><span style="font-weight : 800; font-size : 20px;">Bạn đã đổi mật khẩu thành công!</span>
                    </div>

                    <div class="card-body">
                        <div class="row d-flex justify-content-center body-text">
                            Bạn sẽ được chuyển hướng tới trang chủ trong giây lát.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        setTimeout(function() {
           window.location.href = '{{route("home")}}'
       }, 3000);
    })
</script>


</html>



