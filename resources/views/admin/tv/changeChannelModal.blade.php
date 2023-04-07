@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="changeChannel-modal" tabindex="-1" role="dialog"
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
                <h4 style="font-size:20px; font-weight:bold; text-align:center;  padding:0px 50px;">Sửa kênh</h4>
                <span id="changeChannel-modal-close" style=" position:absolute; right:10px; top:5px;" class="modal-close-btn d-flex justify-content-center">
                    <i class="fa-solid fa-xmark fa-xl icon-align" ></i></span>

            </div>


            <div class="modal-body">
                <form id="modalBodyCarTicket" class="serviceCheckingModalBody" method="POST" action=""> @csrf
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h6 class="mt-2">Tên kênh</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="100" style="border-colorsetupBorderColor" id="changeTvChannelName"
                                name='changeTvChannelName' type="text" class="form-control h-100" value="" />
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0">
                            <h6 class="mt-2">URL ảnh banner</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="10000" id="changeTvChannelImage" name='changeTvChannelImage'
                                type="text" class="form-control h-100" value="" />
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0">
                            <h6 class="mt-2">URL kênh</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="10000" id="changeTvChannelUrl" name='changeTvChannelUrl'
                                type="text" class="form-control h-100" value="" />
                        </div>
                    </div>
                </form>

                <div class="row col-ms-6" style="margin-top: 20px;" id="addChannelCategorySelectSec">
                    <div class="col-xs-4 h-100 m-0">
                        <h6 class="mt-2">Nhóm kênh</h6>
                    </div>
                    <select class="select-btn" id="changeTvChannelCategory" name="changeTvChannelCategory" style="width:auto;" disabled>
                        @foreach($categories as $category)
                            <option value="{{ $category->TvCategory->id }}">{{  $category->TvCategory->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <input maxlength="10000" id="changeTvChannelId" name='changeTvChannelId'
                                type="text" class="form-control h-100" style="display:none;" value="" />
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="changeTvChannelConfirm" type="button" class="btn modal-btn">Xác nhận</button>
            </div>
        </div>
    </div>
    <style>
        #changeTvChannelConfirm {
            width:10%;
            background-color:#adb5bd;
            border-radius: 5px;
            cursor: pointer;
            color:white;
            font-size: 15px;
            font-weight: 600;
        }

        #changeTvChannelConfirm:hover {
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

    function changeChannelResetFormStyle() {
        var setupBorderColor = "rgba(0, 0, 0, 0.175)";
        $('#changeTvChannelName').css('border-color', setupBorderColor);
        $('#changeTvChannelImage').css('border-color', setupBorderColor);
        $('#changeTvChannelUrl').css('border-color', setupBorderColor);

    }

    function changeChannelResetForms() {
        $('#changeTvChannelName').val("");
        $('#changeTvChannelImage').val("");
        $('#changeTvChannelUrl').val("");
    }
    $(document).ready(function() {
        $('#changeChannel-modal-close').on('click', function() {
            $('#changeChannel-modal').modal('hide');
        })

        $('#changeTvChannelConfirm').on('click', function(){
            addChannelResetFormStyle();
            var haveError = false;
            var data = {};
            if ($('#changeTvChannelName').val() == "") {
                $('#changeTvChannelName').css('border-color', 'red');
                haveError = true;

            }
            if ($('#changeTvChannelImage').val() == "") {
                $('#changeTvChannelImage').css('border-color', 'red');
                haveError = true;
            }
            if ($('#changeTvChannelUrl').val() == "") {
                $('#changeTvChannelUrl').css('border-color', 'red');
                haveError = true;
            }

            if (!haveError) {
                data = {
                    categoryId: $('#changeTvChannelCategory').val(),
                    channelName: $('#changeTvChannelName').val(),
                    channelImg: $('#changeTvChannelImage').val(),
                    channelUrl: $('#changeTvChannelUrl').val(),
                    channelId: $('#changeTvChannelId').val(),

                };
            }
            console.log('data : ', data);

            if (!haveError) {
                $.ajax({
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('tv.admin.updateChannel') }}",
                    data: data,
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error == 0){
                            $(`#channel-${data.data.id}`).empty();
                            $(`#channel-${data.data.id}`).append(`${data.data.newChannel}`);
                        }
                    }

                });
            }
        });
    });
</script>
