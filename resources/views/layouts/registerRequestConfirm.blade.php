<!doctype html>
@include('layouts.app')
<html lang="vi">

<body>
    <div class="container" style="padding-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <i class="fa-solid fa-thumbs-up fa-2xl"
                        style="color:green; margin-top:15px;"></i>
                        <span style="font-weight : 800; font-size : 20px;">
                        Yêu cầu đăng ký tài khoản của bạn đã được chấp nhận!</span>
                    </div>

                    <div class="card-body">
                        <div class="row d-flex justify-content-center body-text">
                            Chúng tôi sẽ tạo tài khoản và liên lạc lại với bạn trong thời gian sớm nhất
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            window.location.href = '{{ route('home') }}'
        }, 10000);
    })

</script>

</html>
