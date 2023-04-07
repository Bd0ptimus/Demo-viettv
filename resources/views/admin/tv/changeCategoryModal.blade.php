@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="changeCategory-modal" tabindex="-1" role="dialog"
    aria-labelledby="addChannelModalContainer" aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 1000px; width: 100%; margin : auto;">
        <div class="modal-content">

            <div class="modal-header d-flex justify-content-center" style="position:relative;">
                <h4 style="font-size:20px; font-weight:bold; text-align:center;  padding:0px 50px;">Thêm kênh</h4>
                <span id="changeCategory-modal-close" style=" position:absolute; right:10px; top:5px;" class="modal-close-btn d-flex justify-content-center">
                    <i class="fa-solid fa-xmark fa-xl icon-align" ></i></span>

            </div>


            <div class="modal-body">
                <form class="serviceCheckingModalBody" method="POST" action=""> @csrf
                    <div class="row my-1" style="display:none;">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h6 class="mt-2">Tên nhóm kênh</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="100" style="border-colorsetupBorderColor" id="categoryId"
                                name='categoryId' type="text" class="form-control h-100" value="" />
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h6 class="mt-2">Tên nhóm kênh</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="100" style="border-colorsetupBorderColor" id="categoryName"
                                name='categoryName' type="text" class="form-control h-100" value="" />
                        </div>
                    </div>

            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="categoryConfirm" type="button" class="btn modal-btn">Xác nhận</button>
            </div>
        </div>
    </div>
    <style>
        #categoryConfirm {
            width:10%;
            background-color:#adb5bd;
            border-radius: 5px;
            cursor: pointer;
            color:white;
            font-size: 15px;
            font-weight: 600;
        }

        #categoryConfirm:hover {
            transition: .5s;
            border : 2px solid #adb5bd;
            background-color:white;
            color:#adb5bd;

        }

        .modal-active {
            /* border-bottom: solid 3px #1d8daf; */
            color: white;
            background-color: #1d8daf;
            border-top-right-radius: 8px 8px;
            border-top-left-radius: 8px 8px;
        }

        .modalTitle {
            float: left;
            margin: 0px;
            padding: 10px 10px 0px;
        }

        .modalTitle:hover {
            transition: 0.4s;
            cursor: pointer;
            color: white;
            /* border-bottom: solid 3px #1d8daf; */
            background-color: #1d8daf;
            border-top-right-radius: 8px 8px;
            border-top-left-radius: 8px 8px;

        }

        .select2-dropdown {
            z-index: 2000;
        }


        @media screen and (min-width : 1020px) and (max-width: 5000px) {
            .modal-header {
                padding: 10px 20px 0px;
            }
        }


        @media screen and (min-width : 820px) and (max-width: 1020px) {
            .modal-header {
                padding: 10px 20px 0px;
            }
        }


        @media screen and (min-width : 450px) and (max-width: 820px) {
            .modal-header {
                padding: 10px 0px 10px 5px;
            }
        }


        @media screen and (max-width: 450px) {
            .modal-header {
                padding: 10px 0px 10px 5px;
            }
        }
    </style>
</div>
<script type="text/javascript">

    function changeCategoryResetFormStyle() {
        var setupBorderColor = "rgba(0, 0, 0, 0.175)";
        $('#categoryName').css('border-color', setupBorderColor);


    }

    function changeCategoryResetForms() {
        $('#categoryName').val("");
    }
    $(document).ready(function() {
        $('#changeCategory-modal-close').on('click', function() {
            $('#changeCategory-modal').modal('hide');
        })

        $('#categoryConfirm').on('click', function(){
            changeCategoryResetFormStyle();
            var haveError = false;
            var data = {};
            if ($('#categoryName').val() == "") {
                $('#categoryName').css('border-color', 'red');
                haveError = true;

            }

            if (!haveError) {
                data = {
                    categoryId: $('#categoryId').val(),
                    categoryName: $('#categoryName').val(),
                };
            }
            console.log('data : ', data);

            if (!haveError) {
                $.ajax({
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('tv.admin.updateCategory') }}",
                    data: data,
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error == 0){
                            window.location.reload();
                        }
                    }

                });
            }
        });
    });
</script>
