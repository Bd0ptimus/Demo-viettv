<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML Meta Tags -->
    <title>IPTV Online by Viet-TV</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/web-info/logo/logo.jpg') }}" />
    <meta name="description"
        content="Xem truyền hình Online by Viet-TV | Truyền hình dành riêng cho người Việt tại nước ngoài | Chi tiết liên hệ Zalo: +84983775500">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="IPTV Online by Viet-TV">
    <meta itemprop="description"
        content="Xem truyền hình Online by Viet-TV | Truyền hình dành riêng cho người Việt tại nước ngoài | Chi tiết liên hệ Zalo: +84983775500">
    <meta itemprop="image"
        content="http://m.gettywallpapers.com/wp-content/uploads/2022/07/Fifa-World-Cup-Qatar-2022-Pictures-Photos4.jpg">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="http://viet-tv.vn">
    <meta property="og:type" content="website">
    <meta property="og:title" content="IPTV Online by Viet-TV">
    <meta property="og:description"
        content="Xem truyền hình Online by Viet-TV | Truyền hình dành riêng cho người Việt tại nước ngoài | Chi tiết liên hệ Zalo: +84983775500">
    <meta property="og:image"
        content="http://m.gettywallpapers.com/wp-content/uploads/2022/07/Fifa-World-Cup-Qatar-2022-Pictures-Photos4.jpg">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="IPTV Online by Viet-TV">
    <meta name="twitter:description"
        content="Xem truyền hình Online by Viet-TV | Truyền hình dành riêng cho người Việt tại nước ngoài | Chi tiết liên hệ Zalo: +84983775500">
    <meta name="twitter:image"
        content="http://m.gettywallpapers.com/wp-content/uploads/2022/07/Fifa-World-Cup-Qatar-2022-Pictures-Photos4.jpg">
    <!-- Meta Tags Generated via http://heymeta.com -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/04e9a3dbb4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="{{ asset('css/app.css?v=') . time() }}" rel="stylesheet">
    <link href="{{ asset('css/index.css?v=') . time() }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

</head>

<body>
    @php
        use App\Admin;
    @endphp
    <img id="imgBackground"
        style="position: fixed; top:0px; left:0px; width:100vw; object-fit:cover; height:100%; z-index:0;">
    {{-- src="{{ asset('storage/web-info/logo/logo2.jpg') }}" --}}
    <div id="app" style=" height:8%;">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm"
            style="position:fixed; width: 100vw; height:8%; z-index:1002; border:0px; padding:0px; box-shadow:none !important; max-width: none !important;">
            <div class="container d-flex justify-content-end"
                style="height : 100%; width:100vw; padding:0px; margin:0px; margin-right:20px; max-width: none !important;">

                <div class="menu-selection d-flex justify-content-center" id="menuBtn">
                    <i class="fa-solid fa-bars fa-2xl menuList-icon" style="color:#adb5bd;"></i>
                </div>
            </div>
            {{-- <div class="app-scrollupBar justify-content-center app-scrollIndicator" id="scrollUpBar">
                <i class="fa-solid fa-chevron-up fa-2xl scrollindicator-icon"
                    style="color:rgba(0,0,0,0);margin-top:2%;"></i>
            </div>
            <div class="app-scrolldownBar justify-content-center app-scrollIndicator" id="scrollDownBar"  >
                <i class="fa-solid fa-chevron-down fa-2xl scrollindicator-icon"
                    style="color:rgba(0,0,0,0);margin-top:2%;"></i>
            </div> --}}
        </nav>

    </div>

    <div class="app-sidebar justify-content-center" id="sideBar" style="width:300px;">
        <div class="app-sidebar-header d-flex justify-content-start">
            <div class="sidebar-close-btn d-flex justify-content-center" id="closeSidebarBtn">
                <i class="fa-solid fa-xmark fa-xl" style="margin-top:15px; color:black"></i>
            </div>
        </div>
        <div class="app-sidebar-menu  d-block justify-content-center">
            <div class="app-sidebar-item"
                onclick="event.preventDefault();
            document.getElementById('home-form').submit();">
                <i class="fa-solid fa-house"></i><span style="font-size:18px;">&emsp;Trang chủ</span>
            </div>
            @if (Admin::user() == null)
                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
            document.getElementById('home-form').submit();">
                    <i class="fa-solid fa-lock"></i><span style="font-size:18px;">&emsp;Đăng nhập</span>
                </div>
            @endif

            @if (Admin::user() !== null && Admin::user()->isRole(ROLE_USER))
                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
                document.getElementById('user-profile').submit();">
                    <i class="fa-solid fa-user"></i></i><span style="font-size:18px;">&emsp;Tài khoản</span>
                </div>
            @endif
            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_ADMIN, ROLE_SUPER_ADMIN]))
                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
                document.getElementById('display-form').submit();">
                    <i class="fa-solid fa-image"></i></i><span style="font-size:18px;">&emsp;Quản lý giao diện</span>
                </div>
                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
            document.getElementById('accountManager-form').submit();">
                    <i class="fa-solid fa-users"></i><span style="font-size:18px;">&emsp;Quản lý tài khoản</span>
                </div>

                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
            document.getElementById('deviceManager-form').submit();">
                    <i class="fa-solid fa-hard-drive"></i><span style="font-size:18px;">&emsp;Quản lý thiết bị</span>
                </div>

                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
            document.getElementById('channelManager-form').submit();">
                    <i class="fa-solid fa-tv"></i></i><span style="font-size:18px;">&emsp;Quản lý kênh</span>
                </div>
            @endif
            @if (Admin::user() !== null)
                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
            document.getElementById('changePassword-form').submit();">
                    <i class="fa-solid fa-lock"></i><span style="font-size:18px;">&emsp;Đổi mật khẩu</span>
                </div>
                <div class="app-sidebar-item"
                    onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i><span style="font-size:18px;">&emsp;Đăng xuất</span>
                </div>
            @endif


            <form id="logout-form" action="{{ route('auth.logout') }}" method="GET" class="d-none">
                @csrf
            </form>
            <form id="changePassword-form" action="{{ route('auth.password.change') }}" method="GET"
                class="d-none">
                @csrf
            </form>

            <form id="accountManager-form" action="{{ route('admin.accountManager') }}" method="GET"
                class="d-none">
                @csrf
            </form>

            <form id="deviceManager-form" action="{{ route('admin.device.index') }}" method="GET"
                class="d-none">
                @csrf
            </form>

            <form id="channelManager-form" action="{{ route('tv.admin.index') }}" method="GET" class="d-none">
                @csrf
            </form>

            <form id="home-form" action="{{ route('home') }}" method="GET" class="d-none">
                @csrf
            </form>

            <form id="display-form" action="{{ route('admin.display.index') }}" method="GET" class="d-none">
                @csrf
            </form>

            <form id="user-profile" action="{{ route('profile.index') }}" method="GET" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    @include('layouts.loadingSpinner')



</body>
<style>
    .app-sidebar {
        display: none;
        z-index: 5000;
        position: fixed;
        top: 0px;
        height: 100vh;
        width: auto;
        max-width: 100vw;
        left: 0px;
        background-color: white;
    }

    .app-sidebar-header {
        width: 100%;
        padding: 10px;
    }

    .sidebar-close-btn {
        background-color: #F0F2F5;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .sidebar-close-btn:hover {
        background-color: #adb5bd;
    }


    .app-sidebar-item {
        cursor: pointer;
        width: auto;
        padding: 5px;
        margin: 0px 10px;
        border-radius: 10px;
        color: #6c757d;
    }

    .app-sidebar-item:hover {
        background-color: rgba(0,0,0,0.2);
    }

    .menu-selection {
        top: 0px;
        width: 40px;
        height: 40px;
        cursor: pointer;
        z-index: 4000;
    }

    .menuList-icon {
        color: white;
        margin-top: 20px;
    }


    .app-scrolldownBar {
        z-index: 2000;
        cursor: pointer;
        height: 8%;
        width: 100vw;
        position: fixed;
        bottom: 0px;
        background-color: rgba(0, 0, 0, 0);

    }

    .app-scrollupBar {
        z-index: 2000;
        cursor: pointer;
        height: 8%;
        width: 100vw;
        position: fixed;
        top: 0px;
        background-color: rgba(0, 0, 0, 0);
    }

    .app-scrolldownBar:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .app-scrollupBar:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .app-scrolldownBar:hover .scrollindicator-icon {
        color: #adb5bd !important;
    }

    .app-scrollupBar:hover .scrollindicator-icon {
        color: #adb5bd !important;
    }

    .slide-in {
        animation: slide-in 0.5s forwards;
        -webkit-animation: slide-in 0.5s forwards;
    }

    @keyframes slide-in {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @-webkit-keyframes slide-in {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .slide-out {
        animation: slide-out 0.5s forwards;
        -webkit-animation: slide-out 0.5s forwards;
    }

    @keyframes slide-out {
        0% {
            transform: translateX(100vw);
        }

        100% {
            transform: translateX(calc(100vw - 300px));
        }
    }

    @-webkit-keyframes slide-out {
        0% {
            -webkit-transform: translateX(100vw);
        }

        100% {
            -webkit-transform: translateX(calc(100vw - 300px));
        }
    }

    @media screen and (min-width : 1020px) and (max-width: 5000px) {
        .app-scrollIndicator {
            display: flex;
        }
    }


    @media screen and (min-width : 820px) and (max-width: 1020px) {
        .app-scrollIndicator {
            display: flex;
        }
    }


    @media screen and (min-width : 450px) and (max-width: 820px) {
        .app-scrollIndicator {
            display: none;
        }
    }


    @media screen and (max-width: 450px) {
        .app-scrollIndicator {
            display: none;
        }
    }
</style>

<script>
    var diff = 1;
    var clickDiff = 40;
    var currentPos = 0;

    function scrollUpHover() {
        intervalId = window.setInterval(function() {
            console.log('in mouse over');
            scrollUpPage();

        }, 10);
    }

    function scrollUpHoverEnd() {
        window.clearInterval(intervalId);
    }

    function scrollDownHover() {
        intervalId = window.setInterval(function() {
            console.log('in mouse over');
            scrollDownPage();

        }, 10);
    }

    function scrollDownHoverEnd() {
        window.clearInterval(intervalId);
    }

    function takeBackground() {
        var url = "{{ route('admin.display.takeBackground') }}";
        $.ajax({
            method: 'get',
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                console.log('data response : ', JSON.stringify(data));
                if (data.error == 0) {
                    $('#imgBackground').attr('src', data.backgroundUrl);
                }
            }

        });
    }

    // function scrollDownPage() {
    //         console.log('body.scrollHeight down: ', document.body.scrollHeight);
    //         if ((window.innerHeight + window.scrollY) < document.body.scrollHeight - 1) {
    //             currentPos = currentPos + diff;
    //             console.log('currentPos Down : ', currentPos);
    //             // $('#mainSec').css('top',currentPos);
    //             // alert('scroll down page: ');

    //             window.scroll(0, currentPos);
    //         }
    //     }

    //     function scrollUpPage() {
    //         console.log('body.scrollHeight up: ', document.body.scrollHeight);
    //         if (window.pageYOffset != 0) {
    //             currentPos = currentPos - diff;
    //             if (currentPos < 0) currentPos = 0;
    //             console.log('currentPosUp : ', currentPos);
    //             // $('#mainSec').css('top',currentPos);
    //             // alert('scroll up page: ');

    //             window.scroll(0, currentPos);
    //         }
    //     }


    function keyEvent(e) {
        // var len = ul.getElementsByTagName('div').length - 1;
        e = e || window.event;

        if (e.keyCode == '38') {
            // up arrow
            // if (liSelected) {
            //     removeClass(liSelected, 'selected');
            //     index--;
            //     console.log(index);
            //     next = ul.getElementsByTagName('div')[index];
            //     if (typeof next !== undefined && index >= 0) {
            //         liSelected = next;
            //     } else {
            //         index = len;
            //         liSelected = ul.getElementsByTagName('div')[len];
            //     }
            //     addClass(liSelected, 'selected');
            // } else {
            //     index = 0;
            //     liSelected = ul.getElementsByTagName('div')[len];
            //     addClass(liSelected, 'selected');
            // }
        } else if (e.keyCode == '40') {
            // down arrow
            // index++;
            // if (liSelected) {
            //     removeClass(liSelected, 'selected');
            //     next = ul.getElementsByTagName('div')[index];
            //     if (typeof next !== undefined && index <= len) {

            //         liSelected = next;
            //     } else {
            //         index = 0;
            //         liSelected = ul.getElementsByTagName('div')[0];
            //     }
            //     addClass(liSelected, 'selected');
            //     console.log(index);
            // } else {
            //     index = 0;

            //     liSelected = ul.getElementsByTagName('div')[0];
            //     addClass(liSelected, 'selected');
            // }
        } else if (e.keyCode == '37') {
            // left arrow
            if (channelBarIndex == 0) { //not thing open
                openChannelBar();
                channelBarIndex = 1;
            } else if (channelBarIndex == 1) { //category opened
                closeChannelBar();
                channelBarIndex = 0;
            } else if (channelBarIndex == 2) { //Channel list opened
                closeChannelListBar();
                channelBarIndex = 1;

            }
        } else if (e.keyCode == '39') {
            // right arrow
            // if (menuOpen) {
            //     closeMenuClicked();
            //     menuOpen = false;
            // } else {
            //     openMenuClicked();
            //     menuOpen = true;
            // }
        }
    }

    let menuOpen = false;

    function openMenuClicked() {
        $('#sideBar').css('display', 'block');
        $('#sideBar').addClass('slide-out');
        $('#sideBar').removeClass('slide-in');
    }

    function closeMenuClicked() {
        $('#sideBar').css('display', 'none');
        $('#sideBar').addClass('slide-in');
        $('#sideBar').removeClass('slide-out');
    }
    document.onkeydown = keyEvent;
    $(document).ready(function() {
        takeBackground();
        $('#menuBtn').on('click', function() {
            console.log('menu btn click');
            openMenuClicked();
        });

        $('#closeSidebarBtn').on('click', function() {
            closeMenuClicked();
        });



        // var diff = 1;
        // var clickDiff=40;
        // var currentPos = 0;

        // window.onscroll = function(ev) {
        //     console.log('sroll offset: ', window.pageYOffset);
        //     currentPos = window.pageYOffset;
        // }
        // $('#scrollUpBar').on('click', function(){
        //     console.log('body.scrollHeight : ', document.body.scrollHeight);
        //     if (window.pageYOffset != 0) {
        //         currentPos = currentPos - clickDiff;
        //         if (currentPos < 0) currentPos = 0;
        //         console.log('currentPos : ', currentPos);
        //         window.scrollTo(0, currentPos);
        //     }
        // });

        // $('#scrollDownBar').on('click', function(){
        //     console.log('scrollDownPageClick ------ Click : ', currentPos);

        //     if ((window.innerHeight + window.scrollY) < document.body.scrollHeight - 1) {
        //         currentPos = currentPos + clickDiff;
        //         console.log('currentPos ------ Click : ', currentPos);
        //         window.scroll(0, currentPos);
        //     }
        // });







        // $('#scrollDownBar').hover(
        //     function() {
        //         intervalId = window.setInterval(function() {
        //             console.log('scroll down');
        //             scrollDownPage();
        //         }, 10);

        //     },
        //     function() {
        //         // the element is no longer hovered... do stuff
        //         window.clearInterval(intervalId);
        //     }
        // );
        // $('#scrollUpBar').hover(
        //     function() {
        //         intervalId = window.setInterval(function() {
        //             console.log('scroll up');
        //             scrollUpPage();
        //         }, 10);

        //     },
        //     function() {
        //         // the element is no longer hovered... do stuff
        //         window.clearInterval(intervalId);
        //     }
        // );

    });
</script>

</html>
