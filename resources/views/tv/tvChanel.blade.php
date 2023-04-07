<!doctype html>
<html lang="vi">

@include('layouts.app')
@php
    use App\Admin;
@endphp
<link href="{{ asset('css/linh.css?v=') . time() }}" rel="stylesheet">
<link href="{{ asset('css/tv/index.css?v=') . time() }}" rel="stylesheet">
<link rel="stylesheet" href="//cdn.flowplayer.com/releases/native/3/stable/style/flowplayer.css">
<script src="//cdn.flowplayer.com/releases/native/3/stable/flowplayer.min.js"></script>
<!-- Optional plugins -->
<script src="//cdn.flowplayer.com/releases/native/3/stable/plugins/hls.min.js"></script>
<style>
    .modal-content {
        max-width: 10000px;
        width: 100%;
        margin: auto;
        height: 100%;
        border-radius: 0px !important;
        background-color: black;
        position: fixed;
        top: 0px;
    }

    .player-navbar-pc {
        position: fixed;
        left: 0px;
        width: 5vw;
        height: 100vh;
        /* z-index:6000;
            background-color: white; */
    }

    .player-navbar-mb {
        position: absolute;
        bottom: 0px;
        width: 100vw;
        height: 7vh;
    }

    .player-navbar-item {
        margin: 2vh 0.5vw;
        display: flex;
        justify-content: center;
        height: 6vh;
        cursor: pointer;
    }

    .player-navbar-item-mb {
        margin: 1vh 0.5vw;
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
        cursor: pointer;
        color: white;
    }

    .player-navbar-item:hover {
        color: white;
    }

    .player-nav-icon {
        padding-top: 3vh;
        font-size: 2vw;
    }

    .player-nav-icon-mb {
        padding-top: 2vh;
        font-size: 4vh;
    }

    @media screen and (min-width : 1020px) and (max-width: 5000px) {
        .modal-header {
            padding: 10px 20px 0px;
        }

        .player-sec {
            width: 100%;
            height: 100%;
            margin: 0px;
            bottom: 0px;
        }

        .player-navbar-pc {
            display: block;
        }

        .player-navbar-mb {
            display: none;
        }

        #channelListBar {
            width: 15%;
        }

        #channelBar{
            width: 15%;
        }
    }


    @media screen and (min-width : 820px) and (max-width: 1020px) {
        .modal-header {
            padding: 10px 20px 0px;
        }

        .player-sec {
            width: 100%;
            height: 100%;
            margin: 0px;
            bottom: 0px;

        }

        .player-navbar-pc {
            display: block;
        }

        .player-navbar-mb {
            display: none;
        }

        #channelListBar {
            width: 15%;
        }
        #channelBar{
            width: 15%;
        }
    }


    @media screen and (min-width : 450px) and (max-width: 820px) {
        .modal-header {
            padding: 10px 0px 10px 5px;
        }

        .player-sec {
            width: 100%;
            height: 500px;
            margin: 0px;
        }

        .player-navbar-pc {
            display: none;
        }

        .player-navbar-mb {
            display: block;
        }

        #channelListBar {
            width: 70%;
        }
        #channelBar{
            width: 70%;
        }
    }


    @media screen and (max-width: 450px) {
        .modal-header {
            padding: 10px 0px 10px 5px;
        }

        .player-sec {
            width: 100%;
            height: 280px;
            margin: 0px;
        }

        .player-navbar-pc {
            display: none;
        }

        .player-navbar-mb {
            display: block;
        }

        #channelListBar {
            width: 100%;
        }

        #channelBar{
            width: 100%;
        }
    }

    .channelBar-slide-in {
        animation: channelBar-slide-in 0.5s forwards;
        -webkit-animation: channelBar-slide-in 0.5s forwards;
    }

    @keyframes channelBar-slide-in {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @-webkit-keyframes channelBar-slide-in {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .channelBar-slide-out {
        animation: channelBar-slide-out 0.5s forwards;
        -webkit-animation: channelBar-slide-out 0.5s forwards;
    }

    @keyframes channelBar-slide-out {
        0% {
            -webkit-transform: translateX(-100%);
        }

        100% {
            -webkit-transform: translateX(0%);
        }
    }

    @-webkit-keyframes channelBar-slide-out {
        0% {
            -webkit-transform: translateX(-100%);
        }

        100% {
            -webkit-transform: translateX(0%);
        }
    }

    div.selected {
        background: rgba(0,0,0,0.5);
    }
</style>

<body class="login-background-img" onload="test()">
    {{-- <div class="tv-main-sec tv-main-pc-ver" style="width: 100%; position: relative;">
        <div class="tv-sidebar" id="test">
            <div style="width:100%;  margin-top:20%;">
                <input type="text" id="searchBarPc" class="tv-searchBar" placeholder="Tìm kiếm kênh">
            </div>
            <div class="tv-menu-item" onclick="categoryChoose(0)">
                <h5 class="tv-menu-item-text">Tất cả</h5>
            </div>

            @foreach ($categories as $category)
                <div class="tv-menu-item" onclick="categoryChoose({{$category->TvCategory->id}})">
                    <h5 class="tv-menu-item-text" >{{$category->TvCategory->category_name}}</h5>
                </div>
            @endforeach

        </div>
        <div class="tv-main">
            <div style="width:100%;margin-top:5%; flex-wrap: wrap;" class = "d-flex justify-content-start" id="channelListPc">
                @foreach ($channels as $channel)
                <div class="tv-channel" onclick="openModal('{{$channel->channel_url}}')">
                    <img class="tv-channel-img" src="{{$channel->channel_img}}">
                    <div class="tv-channel-name">
                        {{$channel->channel_name}}
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="tv-main-sec tv-main-mb-ver" style="width: 100%; height:auto; position:relative;">
        <div class="tv-selection-sec-mb">
            <div style="width:100%;">
                <input type="text" id="searchBarMb" class="tv-searchBar-mb" placeholder="Tìm kiếm kênh">
            </div>
            <div style="width:100%;margin-top: 20px;" class="d-flex justify-content-center">
                <select id="mbCategorySelection" class="tv-category-select"  style="width:50%; text-align-last:center;" onchange="mbSelectCategoryEvent()">
                    <option value="0" class="category-item form-control">Tất cả</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->TvCategory->id}}" class="category-item">{{$category->TvCategory->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="tv-main-sec-mb d-flex justify-content-start" style="flex-wrap: wrap;" id="channelListMb">
            @foreach ($channels as $channel)
            <div class="tv-channel-mb" onclick="openModal('{{$channel->channel_url}}')" >
                <img class="tv-channel-img-mb" src="{{$channel->channel_img}}">
                <div class="tv-channel-name-mb">
                    {{$channel->channel_name}}
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}

    <div class="modal-content">
        <div class="modal-body" style="position:relative; padding:0px;">
            <div class="d-flex justify-content-center vertical-element-middle-align player-sec">
                <div id="player" style="height:100%; margin:0px;" ></div>
                {{-- <div id="player_container" style="height:100%; margin:0px;"></div> --}}
            </div>

            <div class="player-navbar-pc">
                <div style="width:100%; height:auto; position:absolute; top:30px;">
                    <div class="player-navbar-item" onclick="openChannelBar();">
                        <i class="fa-solid fa-tv fa-xl player-nav-icon"></i>
                    </div>
                    <div class="player-navbar-item" onclick="goToHomePage()">
                        <i class="fa-solid fa-house fa-xl player-nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="player-navbar-mb">
                <div style="width:100%; height:100%;" class="d-flex justify-content-around">
                    <div class="player-navbar-item-mb" onclick="openChannelBar();">
                        <i class="fa-solid fa-tv fa-xl player-nav-icon-mb"></i>
                    </div>
                    <div class="player-navbar-item-mb" onclick="goToHomePage()">
                        <i class="fa-solid fa-house fa-xl player-nav-icon-mb"></i>
                    </div>

                    {{-- <div class="player-navbar-item-mb" onclick="openMenuClicked()">
                        <i class="fa-solid fa-bars fa-xl player-nav-icon-mb"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="app-sidebar justify-content-center" id="channelBar" style="overflow-y: scroll; background-color:rgba(0,0,0,0.5)">
        <div class="app-sidebar-header d-flex justify-content-end">
            <div class="sidebar-close-btn d-flex justify-content-center" id="closeChannelbarBtn">
                <i class="fa-solid fa-xmark fa-xl" style="margin-top:15px; color:black"></i>
            </div>
        </div>
        <div class="app-sidebar-menu  d-block justify-content-center" id="categoryList" tabindex="1">
            <div class="app-sidebar-item" onclick="categoryChoose(0)">
                <span style="font-size:18px;">Tất cả</span>
            </div>
            @foreach ($categories as $category)
                <div class="app-sidebar-item" onclick="categoryChoose({{ $category->TvCategory->id }})">
                    <span style="font-size:18px; overflow-wrap: break-word;">{{ $category->TvCategory->category_name }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="app-sidebar justify-content-center" id="channelListBar" style="overflow-y: scroll;background-color:rgba(0,0,0,0.5);">
        <div class="app-sidebar-header d-flex justify-content-end">
            <div class="sidebar-close-btn d-flex justify-content-center" id="closeChannelListBarBtn">
                <i class="fa-solid fa-xmark fa-xl" style="margin-top:15px; color:black"></i>
            </div>
        </div>
        <div class="app-sidebar-menu  d-block justify-content-center">
            <div style="width:100%;margin-top:5%; flex-wrap: wrap;" class="d-flex justify-content-start"
                id="channelList">
                @foreach ($channels as $channel)
                    <div class="tv-channel" onclick="openModal('{{ $channel->channel_url }}')">
                        <img class="tv-channel-img" src="{{ $channel->channel_img }}">
                        {{-- <span class="tv-channel-name">
                            {{ $channel->channel_name }}
                        </span> --}}
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    {{-- @include('tv.playerModal'); --}}

    <script src="{{ asset('js/playerjs.js') }}" type="text/javascript"></script>

    {{-- <script src="https://unpkg.com/videojs-contrib-hls@5.15.0/dist/videojs-contrib-hls.js"></script>
    <script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script> --}}
    {{-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script type='text/javascript'>
    function test(){
        console.log('abc');
    }
        function goToHomePage(){
            window.location.href = "{{route('home')}}";
        }
        var player = new Playerjs({
            id: "player",
            file: "https://1036164025.vnns.net/hda1/vtv3hd_vhls.smil/chunklist.m3u8",
            poster: "{{ $banner->url }}",
            volume: 0.8,
            unmute:true,
        });
        player.api('play');

        // flowplayer('#player_container', {
        //     src: 'https://1036164025.vnns.net/hda1/vtv3hd_vhls.smil/chunklist.m3u8',
        //     token: 'eyJraWQiOiJEUXpXeWNScFhjRE4iLCJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiJ9.eyJjIjoie1wiYWNsXCI6MjIsXCJpZFwiOlwiRFF6V3ljUnBYY0ROXCJ9IiwiaXNzIjoiRmxvd3BsYXllciJ9.QdiK3PIgFlTTqjxlYU2j00u9jQ68jGXaNE-xB93UKE5W3guT9rQf6R1rPIli5UpNNmMTVzsP2cC4bn_CL1tCkQ',
        //     autoplay:true,
        //     muted:false,
        // });

        var openPlayerTimes = 0;

        function openModal(file) {
            console.log('in open modal');
            closeAllChannelBar();
            play(file);
        }
        var coll = document.getElementsByClassName("category");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }

        function play(file) {
            var user = '<?= Admin::user() ?>';
            console.log('admin user : ', user);
            if (user == '') {
                window.location.href = "{{ route('auth.cannotWatch') }}";
            } else {
                $.ajax({
                    method: 'post',
                    url: "{{ route('auth.checkDeviceAllow') }}",
                    data: {
                        userId: '<?= Admin::user() ? Admin::user()->id : '' ?>',
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if (data.data.allow_this_device == true) {
                            try {
                                console.log('check file : ', file);
                                player.api('file', file);
                                console.log('after check file : ');

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
                        } else {
                            window.location.href = "{{ route('home') }}";
                        }
                    }

                });

            }

        }


        function categoryChoose(cateogryId) {
            $('#searchBarMb').val('');
            $('#searchBarPc').val('');
            $.ajax({
                method: 'post',
                url: "{{ route('tv.chooseCategory') }}",
                data: {
                    categoryId: cateogryId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log('data response : ', JSON.stringify(data));
                    if (data.error == 0) {
                        // $('#channelListPc').empty();
                        // $('#channelListPc').append(data.data.channelListHtmlPc);
                        // $('#channelListMb').empty();
                        // $('#channelListMb').append(data.data.channelListHtmlMb);

                        $('#channelList').empty();
                        $('#channelList').append(data.data.channelListHtmlPc);
                        openChannelListBar();
                        channelBarIndex = 2;
                    }
                }

            });
        }

        function mbSelectCategoryEvent() {
            console.log('mb choose : ', $('#mbCategorySelection').val())
            categoryChoose($('#mbCategorySelection').val());
        }

        function openChannelBar() {
            ul = document.getElementById('categoryList');
            ul.scrollIntoView();
            $('#categoryList').click();
            $('#channelBar').css('display', 'block');
            $('#channelBar').addClass('channelBar-slide-out');
            $('#channelBar').removeClass('channelBar-slide-in');
        }

        function openChannelListBar() {
            ul = document.getElementById('channelList');
            ul.scrollIntoView();
            closeChannelBar();
            $('#channelListBar').css('display', 'block');
            $('#channelListBar').addClass('channelBar-slide-out');
            $('#channelListBar').removeClass('channelBar-slide-in');
        }

        function closeChannelBar() {
            $('#channelBar').css('display', 'none');
            $('#channelBar').addClass('channelBar-slide-in');
            $('#channelBar').removeClass('channelBar-slide-out');
        }

        function closeChannelListBar() {
            $('#channelListBar').css('display', 'none');
            $('#channelListBar').addClass('channelBar-slide-in');
            $('#channelListBar').removeClass('channelBar-slide-out');
            openChannelBar();
        }

        function closeAllChannelBar() {
            $('#channelBar').css('display', 'none');
            $('#channelBar').addClass('channelBar-slide-in');
            $('#channelBar').removeClass('channelBar-slide-out');
            $('#channelListBar').css('display', 'none');
            $('#channelListBar').addClass('channelBar-slide-in');
            $('#channelListBar').removeClass('channelBar-slide-out');
        }

        var channelBarIndex = 0;

        $(document).ready(function() {
            // play('https://1036164025.vnns.net/hda1/vtv3hd_vhls.smil/chunklist.m3u8');
            console.log('init player');
            $('#closeChannelbarBtn').on('click', function() {
                closeChannelBar();
            });
            $('#closeChannelListBarBtn').on('click', function() {
                closeChannelListBar();
            });
            try {
                player.api('file', '');

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

            $('#searchBarPc').on('change', function() {
                $.ajax({
                    method: 'post',
                    url: "{{ route('tv.searchChannel') }}",
                    data: {
                        searchText: $('#searchBarPc').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if (data.error == 0) {
                            $('#channelListPc').empty();
                            $('#channelListPc').append(data.data.channelListHtmlPc);
                        }
                    }

                });
            });

            $('#searchBarMb').on('change', function() {
                $.ajax({
                    method: 'post',
                    url: "{{ route('tv.searchChannel') }}",
                    data: {
                        searchText: $('#searchBarMb').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));
                        if (data.error == 0) {
                            $('#channelListMb').empty();
                            $('#channelListMb').append(data.data.channelListHtmlMb);
                        }
                    }

                });
                console.log('searchbar : ', $('#searchBarMb').val())
            });
        });

        //<![CDATA[
        // JavaScript Document
        var message = "Can not access";

        function defeatIE() {
            if (document.all) {
                (message);
                return false;
            }
        }

        function defeatNS(e) {
            if (document.layers || (document.getElementById && !document.all)) {
                if (e.which == 2 || e.which == 3) {
                    (message);
                    return false;
                }
            }
        }
        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = defeatNS;
        } else {
            document.onmouseup = defeatNS;
            document.oncontextmenu = defeatIE;
        }
        document.oncontextmenu = new Function("return false")


        var ul;
        var liSelected;
        var index = -1;

        document.addEventListener('keydown', function(event) {
            var len = ul.getElementsByTagName('div').length - 1;
            if (event.which === 40) {
                index++;
                //down
                if (liSelected) {
                    removeClass(liSelected, 'selected');
                    next = ul.getElementsByTagName('div')[index];
                    if (typeof next !== undefined && index <= len) {

                        liSelected = next;
                    } else {
                        index = 0;
                        liSelected = ul.getElementsByTagName('div')[0];
                    }
                    addClass(liSelected, 'selected');
                    console.log(index);
                } else {
                    index = 0;

                    liSelected = ul.getElementsByTagName('div')[0];
                    addClass(liSelected, 'selected');
                }
            } else if (event.which === 38) {

                //up
                if (liSelected) {
                    removeClass(liSelected, 'selected');
                    index--;
                    console.log(index);
                    next = ul.getElementsByTagName('div')[index];
                    if (typeof next !== undefined && index >= 0) {
                        liSelected = next;
                    } else {
                        index = len;
                        liSelected = ul.getElementsByTagName('div')[len];
                    }
                    addClass(liSelected, 'selected');
                } else {
                    index = 0;
                    liSelected = ul.getElementsByTagName('div')[len];
                    addClass(liSelected, 'selected');
                }
            }
        }, false);

        function removeClass(el, className) {
            if (el.classList) {
                el.classList.remove(className);
            } else {
                el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)',
                    'gi'), ' ');
            }
        };

        function addClass(el, className) {
            if (el.classList) {
                el.classList.add(className);
            } else {
                el.className += ' ' + className;
            }
        };
    </script>
</body>


</html>
