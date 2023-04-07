@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="addChannel-modal" tabindex="-1" role="dialog"
    aria-labelledby="addChannelModalContainer" aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 1000px; width: 100%; margin : auto;">
        <div class="modal-content">
            {{-- <div class="modal-header">
                Kiểm tra phạt xe
                <span id="carTiket-modal-close" class="fs-4"><i class="fa-regular fa-circle-xmark"
                        style="float:right; width: 20px; height:20px; margin-right:5px;"></i></span>

            </div> --}}

            <div class="modal-header d-flex justify-content-center" style="position:relative;">
                <h4 style="font-size:20px; font-weight:bold; text-align:center;  padding:0px 50px;">Thêm kênh</h4>
                <span id="addChannel-modal-close" style=" position:absolute; right:10px; top:5px;" class="modal-close-btn d-flex justify-content-center">
                    <i class="fa-solid fa-xmark fa-xl icon-align" ></i></span>

            </div>


            <div class="modal-body">
                <form id="modalBodyCarTicket" class="serviceCheckingModalBody" method="POST" action=""> @csrf
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h6 class="mt-2">Tên kênh</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="100" style="border-colorsetupBorderColor" id="tvChannelName"
                                name='tvChannelName' type="text" class="form-control h-100" value="" />
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0">
                            <h6 class="mt-2">URL ảnh banner</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="10000" id="tvChannelImage" name='tvChannelImage'
                                type="text" class="form-control h-100" value="" />
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0">
                            <h6 class="mt-2">URL kênh</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="10000" id="tvChannelUrl" name='tvChannelUrl'
                                type="text" class="form-control h-100" value="" />
                        </div>
                    </div>
                </form>

                <div class="row col-ms-6" style="margin-top: 20px;" id="addChannelCategorySelectSec">
                    <div class="col-xs-4 h-100 m-0">
                        <h6 class="mt-2">Nhóm kênh</h6>
                    </div>
                    <select class="select-btn" id="tvChannelCategory" name="tvChannelCategory" style="width:auto;">
                        @foreach($categories as $category)
                            <option value="{{ $category->TvCategory->id }}">{{  $category->TvCategory->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="tvChannelConfirm" type="button" class="btn modal-btn">Xác nhận</button>
            </div>
        </div>
    </div>
    <style>
        #tvChannelConfirm {
            width:10%;
            background-color:#adb5bd;
            border-radius: 5px;
            cursor: pointer;
            color:white;
            font-size: 15px;
            font-weight: 600;
        }

        #tvChannelConfirm:hover {
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

    function addChannelResetFormStyle() {
        var setupBorderColor = "rgba(0, 0, 0, 0.175)";
        $('#tvChannelName').css('border-color', setupBorderColor);
        $('#tvChannelImage').css('border-color', setupBorderColor);
        $('#tvChannelUrl').css('border-color', setupBorderColor);

    }

    function addChannelResetForms() {
        $('#tvChannelName').val("");
        $('#tvChannelImage').val("");
        $('#tvChannelUrl').val("");
    }
    $(document).ready(function() {
        $('#addChannel-modal-close').on('click', function() {
            $('#addChannel-modal').modal('hide');
        })

        $('#tvChannelConfirm').on('click', function(){
            addChannelResetFormStyle();
            var haveError = false;
            var data = {};
            if ($('#tvChannelName').val() == "") {
                $('#tvChannelName').css('border-color', 'red');
                haveError = true;

            }
            if ($('#tvChannelImage').val() == "") {
                $('#tvChannelImage').css('border-color', 'red');
                haveError = true;
            }
            if ($('#tvChannelUrl').val() == "") {
                $('#tvChannelUrl').css('border-color', 'red');
                haveError = true;
            }

            if (!haveError) {
                data = {
                    categoryId: $('#tvChannelCategory').val(),
                    channelName: $('#tvChannelName').val(),
                    channelImg: $('#tvChannelImage').val(),
                    channelUrl: $('#tvChannelUrl').val(),
                };
            }
            console.log('data : ', data);

            if (!haveError) {
                $.ajax({
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('tv.admin.addChannel') }}",
                    data: data,
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error == 0){
                            $(`#channelListSec-${data.data.categoryId}`).append(`${data.data.newChannel}`);
                        }
                    }

                });
            }
        });
    });
</script>
