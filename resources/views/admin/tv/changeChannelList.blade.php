@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="changeChannelList-modal" tabindex="-1" role="dialog"
    aria-labelledby="changeChannelListModalContainer" aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 1000px; width: 100%; margin : auto;">
        <div class="modal-content">
            {{-- <div class="modal-header">
                Kiểm tra phạt xe
                <span id="carTiket-modal-close" class="fs-4"><i class="fa-regular fa-circle-xmark"
                        style="float:right; width: 20px; height:20px; margin-right:5px;"></i></span>

            </div> --}}

            <div class="modal-header d-flex justify-content-center" style="position:relative;">
                <h4 style="font-size:20px; font-weight:bold; text-align:center;  padding:0px 50px;"
                    id="changeChannelListHeader"></h4>
                <span id="changeChannelList-modal-close" style=" position:absolute; right:10px; top:5px;"
                    class="modal-close-btn d-flex justify-content-center">
                    <i class="fa-solid fa-xmark fa-xl icon-align"></i></span>

            </div>

            <input id="changeChannelCateId" value="" style="display:none;">
            <div class="modal-body">
                <div style="width:100%;margin-top:5%; flex-wrap: wrap; " class="d-flex justify-content-start"
                    id="changeChannelList-showingSec">
                </div>
            </div>
        </div>
    </div>
    <style>
        .draggableChannel {
            will-change: transform;
            list-style-type: none;
            line-height: 2;
            transition: all 200ms;
        }

        .draggableChannel:after {
            /* content: "drag me"; */
            right: 7px;
            font-size: 10px;
            /* position: absolute; */
            cursor: pointer;
            line-height: 5;
            transition: all 200ms;
            transition-timing-function: cubic-bezier(0.48, 0.72, 0.62, 1.5);
            transform: translateX(120%);
            opacity: 1;
        }

        .draggableChannel:hover:after {
            opacity: 1;
            transform: translate(0);
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
    $(document).ready(function() {
        $('#changeChannelList-modal-close').on('click', function() {
            $('#changeChannelList-modal').modal('hide');
        })


    });


    //channel list
    var removeChannel = document.querySelector('.draggableChannel');

    function dragStartChannel(e) {
        console.log('drag start');

        this.style.opacity = '0.4';
        dragSrcEl = this;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
        this.style.opacity = '1';

    };

    function dragEnterChannel(e) {
        console.log('drag enter');

        this.classList.add('over');

    }

    function dragLeaveChannel(e) {
        console.log('drag leave');

        e.stopPropagation();
        this.classList.remove('over');

    }

    function dragOverChannel(e) {
        console.log('drag over');

        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';

        return false;
    }

    function dragDropChannel(e) {
        console.log('drag drop');

        if (dragSrcEl != this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }
        this.style.opacity = '1';
        window.dispatchEvent(new Event("dragend"));
        sendChannelList(checkChannelListArrange());

        return false;
    }

    function dragEndChannel(e) {
        console.log('drag end');

        var listItemsEnd = document.querySelectorAll('.draggableChannel');
        [].forEach.call(listItemsEnd, function(item) {
            item.classList.remove('over');
        });
        this.style.opacity = '1';
        // checkChannelListArrange();
    }

    function addEventsDragAndDropChannel(el) {
        el.addEventListener('dragstart', dragStartChannel, false);
        el.addEventListener('dragenter', dragEnterChannel, false);
        el.addEventListener('dragover', dragOverChannel, false);
        el.addEventListener('dragleave', dragLeaveChannel, false);
        el.addEventListener('drop', dragDropChannel, false);
        el.addEventListener('dragend', dragEndChannel, false);
    }

    var listItemsChannel = document.querySelectorAll('.draggableChannel');
        [].forEach.call(listItemsChannel, function(item) {
            addEventsDragAndDropChannel(item);
        });
    function reloadChannelDrag(){
        removeChannel = document.querySelector('.draggableChannel');
        listItemsChannel = document.querySelectorAll('.draggableChannel');
        [].forEach.call(listItemsChannel, function(item) {
            addEventsDragAndDropChannel(item);
        });
    }

    function checkChannelListArrange(){
        console.log('checkChannelListArrange');
        let channelList = [];
        $('.channelCell').each(function(){
            let id = $(this).attr('id').split('-')[1];
            console.log('channel id : ', id);
            channelList.push(id);
        });
        return channelList;
    }


    function sendChannelList(channelList){
        $.ajax({
                    method: 'post',
                    url: "{{ route('tv.admin.setChannelList') }}",
                    data: {
                        channelList:channelList,
                        categoryId: $('#changeChannelCateId').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error == 0){
                            $(`#channelListSec-${data.data.categoryId}`).empty();
                            $(`#channelListSec-${data.data.categoryId}`).append(data.data.channels);
                        }
                    }

                });
    }

</script>
