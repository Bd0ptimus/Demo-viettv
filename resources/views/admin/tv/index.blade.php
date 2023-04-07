<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
    $user_suspended = USER_SUSPENDED;
    $user_actived = USER_ACTIVATED;

    $role_admin = ROLE_ADMIN;
    $role_user = ROLE_USER;
@endphp

<style>
    .draggable {
        will-change: transform;
        list-style-type: none;
        line-height: 2;
        transition: all 200ms;
    }

    .draggable:after {
        /* content: "drag me"; */
        right: 7px;
        font-size: 10px;
        /* position: absolute; */
        cursor: pointer;
        line-height: 5;
        transition: all 200ms;
        transition-timing-function: cubic-bezier(0.48, 0.72, 0.62, 1.5);
        transform: translateX(120%);
        opacity: 0;
    }

    .draggable:hover:after {
        opacity: 1;
        transform: translate(0);
    }

    .over {
        transform: scale(1.1, 1.1);
    }

</style>
<link href="{{ asset('css/admin/tv.css?v=') . time() }}" rel="stylesheet">
<link href="{{ asset('css/tv/index.css?v=') . time() }}" rel="stylesheet">

<body style="margin-top:0px;">
    <div class="row d-block justify-content-center" style=" width:auto; margin:auto; padding:auto; z-index:0;">
        <div class="row d-block justify-content-center" style="width:auto; margin:auto; padding:auto;">
            <div class="row d-flex justify-content-center" style="margin : 0px auto; padding:30px;">
                <h3 class="d-flex justify-content-center" style="padding:0px;">
                    Quản lý kênh
                </h3>
            </div>



        </div>

        <div class="row d-flex justify-content-start">
            <div class="d-block justify-content-center" style="width: 60%;">
                <div class="d-block justify-content-center" style="width: 100%;" id="categoryList">
                    {{-- <div style="width:100%; margin: 20px 0px;">
                        <div class ="row d-flex justify-content-center" style="width:100%;">
                            <div class="adminTv-category-title" style="width:90%;">
                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                <span>BCA</span>
                            </div>
                            <div  style="width:10%;">
                                <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-trash fa-xl"></i>
                            </div>
                        </div>
                        <div class="d-block justify-content-center" style="width: 90%;">
                            <div style="width:100%;margin-top:5%; flex-wrap: wrap;" class="d-flex justify-content-start">
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel" >
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name"  style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div  style="width:10%;">
                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-regular fa-square-plus fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div style="width:100%; margin: 20px 0px;">
                        <div class ="row d-flex justify-content-center" style="width:100%;">
                            <div class="adminTv-category-title" style="width:90%;">
                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                <span>awdawdawda</span>
                            </div>
                            <div  style="width:10%;">
                                <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-trash fa-xl"></i>
                            </div>
                        </div>
                        <div class="d-block justify-content-center" style="width: 90%;">
                            <div style="width:100%;margin-top:5%; flex-wrap: wrap;" class="d-flex justify-content-start">
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name" style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel" >
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name" style="color:black !important;">
                                        VTV3
                                    </div>
                                </div>
                                <div class="tv-channel">
                                    <img class="tv-channel-img" style="height:6vw !important;" src="https://cdn.hqth.me/logo/thumbs/2.png">
                                    <div class="tv-channel-name d-flex justify-content-between" style="color:black !important;">
                                        <span>
                                            VTV3
                                        </span>
                                        <span>
                                            <div style="width:10%;" >
                                                <i class=" d-flex justify-content-center fa-solid fa-trash"></i>
                                            </div>
                                        </span>

                                    </div>
                                </div>



                            </div>
                            <div class="row d-flex justify-content-end">
                                <div  style="width:10%;">
                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-regular fa-square-plus fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>  --}}

                    {{-- {{dd($categories[4]->TvCategory)}} --}}
                    @foreach($categories as $category)
                        <div style="width:100%; margin: 20px 0px;" id="category-{{$category->TvCategory->id}}" class="draggable" draggable="true">
                            <div class ="row d-flex justify-content-center" style="width:100%;">
                                <div class="adminTv-category-title" style="width:85%;" onclick="appendCategoryView({{$category->TvCategory->id}})">
                                    <span id="expandIcon-{{$category->TvCategory->id}}"><i class="fa-solid fa-chevron-down"></i></span>
                                    <span id="categoryName-{{$category->TvCategory->id}}">{{$category->TvCategory->category_name}}</span>
                                </div>
                                <div  style="width:5%;" onclick="removeCategory({{$category->TvCategory->id}})">
                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-trash fa-xl"></i>
                                </div>
                                <div  style="width:5%;" onclick="changeName({{$category->TvCategory->id}}, '{{$category->TvCategory->category_name}}')">
                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-pencil fa-xl"></i>
                                </div>

                                <div  style="width:5%;" onclick="openChangeChannelList({{$category->TvCategory->id}})">
                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-list fa-xl"></i>
                                </div>
                            </div>
                            <div class="justify-content-center channelList" id="channelList-{{$category->TvCategory->id}}" style="width: 90%;display:none; ">
                                <div style="width:100%;margin-top:5%; flex-wrap: wrap; " class="d-flex justify-content-start" id="channelListSec-{{$category->TvCategory->id}}">

                                    @foreach($channels as $channel)
                                        @if($channel->tvChannel->category_id == $category->TvCategory->id)
                                            <div class="tv-channel-admin" id="channel-{{$channel->tvChannel->id}}">
                                                <img class="tv-channel-img" style="height:6vw !important;" src="{{$channel->tvChannel->channel_img}}" onclick="play('{{$channel->tvChannel->channel_url}}')" >
                                                <div class="tv-channel-name d-flex justify-content-between" style="color:black !important;">

                                                    <span style="width:80%;">
                                                        {{$channel->tvChannel->channel_name}}
                                                    </span>
                                                    <span style="width:20%;" class = "d-flex justify-content-center">
                                                        <div  onclick="removeChannel({{$channel->tvChannel->id}})">
                                                            <i style="margin:5px 5px 0px;" class=" d-flex justify-content-center fa-solid fa-trash"></i>
                                                        </div>
                                                        <div onclick="changeChannel({{$channel->tvChannel->id}}, '{{$channel->tvChannel->channel_name}}', '{{$channel->tvChannel->channel_img}}','{{$channel->tvChannel->channel_url}}', '{{$channel->tvChannel->tvCategory->id}}')">
                                                            <i style="margin:5px 5px 0px;" class=" d-flex justify-content-center fa-solid fa-pencil"></i>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach


                                </div>
                                <div class="row d-flex justify-content-end">
                                    <div  style="width:10%;" onclick="addChannel({{$category->TvCategory->id}})">
                                        <i class="adminTv-category-delete-sec d-flex justify-content-center fa-regular fa-square-plus fa-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-block justify-content-center" style="width : 100%; margin: 20px 0px;">
                    <div class="row">
                        <div style="font-size: 20px; font-weight: 600;">
                            Thêm nhóm kênh mới
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input id="newCategoryName" type="text" class="form-control" placeholder="Tên nhóm kênh mới" style="width:50%;"/>
                        <div class="d-flex justify-content-center adminTv-category-add" onclick="addCategory()">
                            Thêm nhóm kênh
                        </div>
                    </div>
                </div>

                <div class="d-block justify-content-center" style="width : 100%; margin: 20px 0px;">
                    <div class="row">
                        <div style="font-size: 20px; font-weight: 600;">
                            Thay đổi banner player
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form class="d-flex justify-content-center" style="width:100%;" method="POST" action="{{ route('tv.updateBanner') }}"> @csrf
                            <input id="newBanner" name="newBanner" type="text" class="form-control" placeholder="Url baner" style="width:50%;" value="{{$banner->url}}"/>
                            <button type="submit" class="d-flex justify-content-center adminTv-category-add" style="border:0px;">
                                Thay đổi
                            </button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="" style="width: 40%; height : 100%; position:fixed; right:0px;">
                <div id="player" style="width:100%;"></div>

            </div>
        </div>

    </div>
    @include('layouts.changePasswordAdmin')
    @include('layouts.toast')
    @include('admin.tv.addChannelModal')
    @include('admin.tv.changeCategoryModal')
    @include('admin.tv.changeChannelModal')
    @include('admin.tv.changeChannelList')



</body>
<script src="{{ asset('js/playerjs.js') }}" type="text/javascript"></script>

<script src="https://unpkg.com/videojs-contrib-hls@5.15.0/dist/videojs-contrib-hls.js"></script>
    <script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    var player = new Playerjs({
        id: "player",
        file: "",
        poster: "{{$banner->url}}"
    });
    $(document).ready(function() {

        $('#imgBackground').remove();

        $('#scrollUpBar').remove();
        $('#scrollDownBar').remove();
    });

    function addChannel(categoryId){
        $("#tvChannelCategory").val(`${categoryId}`).change();
        addChannelResetForms();
        addChannelResetFormStyle();
        $('#addChannel-modal').modal('show');
    }

    function removeCategory(categoryId){
        $.ajax({
                    method: 'post',
                    url: "{{ route('tv.admin.removeCategory') }}",
                    data: {
                        categoryId:categoryId,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error==0){
                            $(`#category-${categoryId}`).remove();
                            $('#addChannelCategorySelectSec select').remove();
                            $('#addChannelCategorySelectSec').append(data.data.categorySelection);
                            reloadDragDropCategory();
                            sendCategoryList(checkCategoryListArrange());

                        }
                        $('#newCategoryName').val('');
                    }

                });
    }

    function addCategory(){
        $.ajax({
                    method: 'post',
                    url: "{{ route('tv.admin.addCategory') }}",
                    data: {
                        categoryName:$('#newCategoryName').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error==0){
                            $('#categoryList').append(`<div style="width:100%; margin: 20px 0px;" id="category-${data.data.id}" class="draggable" draggable="true">
                                                            <div class ="row d-flex justify-content-center" style="width:100%;">
                                                                <div class="adminTv-category-title" style="width:85%;"  onclick="appendCategoryView(${data.data.id})">
                                                                    <span id="expandIcon-${data.data.id}"><i class="fa-solid fa-chevron-down"></i></span>
                                                                    <span id="categoryName-${data.data.id}">${data.data.name}</span>
                                                                </div>
                                                                <div  style="width:5%;" onclick="removeCategory(${data.data.id})">
                                                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-trash fa-xl"></i>
                                                                </div>
                                                                <div  style="width:5%;" onclick="changeName(${data.data.id}, '${data.data.name}')">
                                                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-pencil fa-xl"></i>
                                                                </div>

                                                                <div  style="width:5%;" onclick="openChangeChannelList(${data.data.id})">
                                                                    <i class="adminTv-category-delete-sec d-flex justify-content-center fa-solid fa-list fa-xl"></i>
                                                                </div>
                                                            </div>
                                                            <div class="justify-content-center channelList" style="width: 90%;display:none;" id="channelList-${data.data.id}">
                                                                <div style="width:100%;margin-top:5%; flex-wrap: wrap;" class="d-flex justify-content-start" id="channelListSec-${data.data.id}">
                                                                </div>
                                                                <div class="row d-flex justify-content-end">
                                                                    <div  style="width:10%;" onclick="addChannel(${data.data.id})">
                                                                        <i class="adminTv-category-delete-sec d-flex justify-content-center fa-regular fa-square-plus fa-xl"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`);
                            $('#addChannelCategorySelectSec select').remove();
                            $('#addChannelCategorySelectSec').append(data.data.categorySelection);
                            reloadDragDropCategory();
                            sendCategoryList(checkCategoryListArrange());

                        }
                        $('#newCategoryName').val('');
                    }

                });
    }

    function removeChannel(channelId){
        $.ajax({
                    method: 'post',
                    url: "{{ route('tv.admin.removeChannel') }}",
                    data: {
                        channelId:channelId,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error==0){
                            $(`#channel-${channelId}`).remove();

                        }
                    }

                });
    }

    function changeChannel(channelId, channelName, channelImg, channelUrl, categoryId){
        changeChannelResetFormStyle();
        changeChannelResetForms();
        $('#changeTvChannelName').val(`${channelName}`);
        $('#changeTvChannelImage').val(`${channelImg}`);
        $('#changeTvChannelUrl').val(`${channelUrl}`);
        $('#changeTvChannelId').val(channelId);
        $("#changeTvChannelCategory").val(`${categoryId}`).change();

        $('#changeChannel-modal').modal('show');
    }

    function appendCategoryView(categoryId){
        if($(`#channelList-${categoryId}`).css('display') =='none'){
            $(`#channelList-${categoryId}`).css('display','block');
            $(`#expandIcon-${categoryId}`).html('<i class="fa-solid fa-chevron-up"></i>');

        }else{
            $(`#channelList-${categoryId}`).css('display','none');
            $(`#expandIcon-${categoryId}`).html('<i class="fa-solid fa-chevron-down"></i>');

        }
    }

    function changeName(categoryId, categoryName){
        $('#categoryName').val(categoryName);
        $('#categoryId').val(categoryId);
        $('#changeCategory-modal').modal('show');
    }

    function play(file) {
        try {
            player.api('file', file);
            player.api('play');
            if (screen.width < 641) {
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            }
        } catch (err) {
            alert(err);
        }

    }



    //drag and drop functionality

    //category drag
    var remove = document.querySelector('.draggable');

    function dragStart(e) {
        console.log('drag start');
        this.style.opacity = '0.4';
        dragSrcEl = this;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    };

    function dragEnter(e) {
        console.log('drag enter');

        this.classList.add('over');
    }

    function dragLeave(e) {
        console.log('drag leave');

        e.stopPropagation();
        this.classList.remove('over');
    }

    function dragOver(e) {
        console.log('drag over');

        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
        return false;
    }

    function dragDrop(e) {
        console.log('drag drop');

        if (dragSrcEl != this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }
        return false;
    }

    function dragEnd(e) {
        console.log('drag end');

        var listItens = document.querySelectorAll('.draggable');
        [].forEach.call(listItens, function(item) {
            item.classList.remove('over');
        });
        this.style.opacity = '1';
        sendCategoryList(checkCategoryListArrange());
    }

    function addEventsDragAndDrop(el) {
        el.addEventListener('dragstart', dragStart, false);
        el.addEventListener('dragenter', dragEnter, false);
        el.addEventListener('dragover', dragOver, false);
        el.addEventListener('dragleave', dragLeave, false);
        el.addEventListener('drop', dragDrop, false);
        el.addEventListener('dragend', dragEnd, false);
    }

    var listItens = document.querySelectorAll('.draggable');
    [].forEach.call(listItens, function(item) {
        addEventsDragAndDrop(item);
    });

    function reloadDragDropCategory(){
        remove = document.querySelector('.draggable');
        listItens = document.querySelectorAll('.draggable');
        [].forEach.call(listItens, function(item) {
            addEventsDragAndDrop(item);
        });
    }

    function checkCategoryListArrange(){
        let categoryList = [];
        $('.channelList').each(function(){
            let id = $(this).attr('id').split('-')[1];
            console.log('id check : ', id);
            categoryList.push(id);
        });
        return categoryList;
    }

    function sendCategoryList(categoryList){
        $.ajax({
                    method: 'post',
                    url: "{{ route('tv.admin.updateCategoryList') }}",
                    data: {
                        categoryList:categoryList,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));

                    }

                });
    }

    function openChangeChannelList(categoryId){
        $.ajax({
                    method: 'post',
                    url: "{{ route('tv.admin.takeChannelList') }}",
                    data: {
                        categoryId:categoryId,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if(data.error == 0){
                            $('#changeChannelList-showingSec').empty();
                            $('#changeChannelList-showingSec').append(data.data.channelsList);
                            $('#changeChannelListHeader').text(data.data.categoryName);
                            $('#changeChannelCateId').val(data.data.categoryId);
                            reloadChannelDrag();
                            $('#changeChannelList-modal').modal('show');
                        }
                    }

                });
    }

</script>

</html>
