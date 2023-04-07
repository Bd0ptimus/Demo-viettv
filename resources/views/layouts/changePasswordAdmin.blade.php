@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="adminChangePassModal" tabindex="-1" role="dialog"
    aria-labelledby="serviceCheckingModalContainer" aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 1000px; width: 100%; margin : auto;">
        <div class="modal-content">
            <div class="modal-header">
                Đổi mật khẩu
            </div>


            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div style="width : 40%;">
                        <h6 style="font-weight : 700;">Tên : </h6>
                    </div>
                    <div style="width : 60%;">
                        <p id="adminChangePassModal-name"></p>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div style="width : 40%;">
                        <h6 style="font-weight : 700; margin-bottom: 16px;">Email : </h6>
                    </div>
                    <div style="width : 60%;">
                        <p id="adminChangePassModal-email"></p>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div style="width : 40%;">
                        <h6 style="font-weight : 700;">Mật khẩu hiện tại : </h6>
                    </div>
                    <div style="width : 60%;">
                        <p id="adminChangePassModal-pass"></p>
                    </div>
                </div>
                <form method="POST" id="adminChangePassForm" action="{{route('admin.changePassword')}}">
                    @csrf
                    <input id="adminChangePassModal-userId" name="userId" type="text" style="display:none;">

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu mới</label>

                        <div class="col-md-6">
                            <input id="password" type="text"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Xác nhận mật
                            khẩu</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>



                </form>
                <div class="row mb-0"  style="width:100%;">
                    <div class=" d-flex justify-content-center" style="width:100%;">
                        <button id="adminChangePassModal-submitBtn" type="submit" class="btn" style="background-color:#840123; color:white;">
                            Xác nhận
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        var allowSubmit = false;
        $('#adminChangePassModal-submitBtn').on('click', function() {
            if($('#password').val() == ""){
                $('#password').addClass('border border-danger ');
                allowSubmit=false;
            }else{
                $('#password').removeClass('border border-danger ');
                allowSubmit = true;
            }

            if($('#password-confirm').val() == ""){
                $('#password-confirm').addClass('border border-danger ');
                allowSubmit = false;
            }else{
                $('#password-confirm').removeClass('border border-danger ');
                allowSubmit = true;
            }

            if($('#password-confirm').val() !=$('#password').val()  ){
                $('#password-confirm').addClass('border border-danger ');
                allowSubmit = false;
            }

            if(allowSubmit){
                $('#adminChangePassForm').submit();
            }
        });
    });
</script>
