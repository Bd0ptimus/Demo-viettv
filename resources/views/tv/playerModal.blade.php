@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="player-modal" tabindex="-1" role="dialog"
    aria-labelledby="playerModalContainer" aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 10000px; width: 100%; margin : auto; height:100%;">
        <div class="modal-content">
            <div class="modal-body" style="position:relative; padding:0px;">
                <div class="d-flex justify-content-center vertical-element-middle-align player-sec" >
                    <div id="player" style="width:80%;"></div>

                </div>

                <div class="player-navbar-pc">
                    <div style="width:100%; height:auto; position:absolute; bottom:0px;">
                        <div class="player-navbar-item" onclick="closePlayerModal();">
                            <i class="fa-solid fa-bars fa-xl player-nav-icon"></i>
                        </div>
                        <div class="player-navbar-item" onclick="goToHomePage()">
                            <i class="fa-solid fa-house fa-xl player-nav-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="player-navbar-mb">
                    <div style="width:100%; height:100%;" class = "d-flex justify-content-around">
                        <div class="player-navbar-item-mb"  onclick="closePlayerModal();">
                            <i class="fa-solid fa-bars fa-xl player-nav-icon-mb"></i>
                        </div>
                        <div class="player-navbar-item-mb" onclick="goToHomePage()">
                            <i class="fa-solid fa-house fa-xl player-nav-icon-mb"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <style>

        #player-modal{
            padding:0px !important;
            width:100%;
            height:100%;
            border-radius:0px !important;
        }

        #player-modal::-webkit-scrollbar{
            width: 0px;
        }

        .modal-content{
            max-width: 10000px; width: 100%; margin : auto; height:100%;
            border-radius:0px !important;
            background-color: black;

        }

        .player-navbar-pc{
            position: absolute;
            left:0px;
            width:5vw;
            height:100vh;
            /* background-color: white; */
        }

        .player-navbar-mb{
            position: absolute;
            bottom:0px;
            width:100vw;
            height:7vh;
        }

        .player-navbar-item{
            margin: 2vh 0.5vw;
            display:flex;
            justify-content: center;
            height:6vh;
            cursor: pointer;
        }

        .player-navbar-item-mb{
            margin: 1vh 0.5vw;
            display:flex;
            justify-content: center;
            width:auto;
            height:100%;
            cursor: pointer;
            color:white;
        }

        .player-navbar-item:hover{
            color:white;
        }

        .player-nav-icon{
            padding-top:3vh;
            font-size:2vw;
        }

        .player-nav-icon-mb{
            padding-top:2vh;
            font-size:4vh;
        }
        @media screen and (min-width : 1020px) and (max-width: 5000px) {
            .modal-header {
                padding: 10px 20px 0px;
            }

            .player-sec{
                width:100%;
                height:auto;
                margin:0px;
            }

            .player-navbar-pc{
                display:block;
            }

            .player-navbar-mb{
                display:none;
            }
        }


        @media screen and (min-width : 820px) and (max-width: 1020px) {
            .modal-header {
                padding: 10px 20px 0px;
            }

            .player-sec{
                width:100%;
                height:auto;
                margin:0px;
            }

            .player-navbar-pc{
                display:block;
            }
            .player-navbar-mb{
                display:none;
            }
        }


        @media screen and (min-width : 450px) and (max-width: 820px) {
            .modal-header {
                padding: 10px 0px 10px 5px;
            }

            .player-sec{
                width:100%; height:auto; margin:0px;
            }

            .player-navbar-pc{
                display:none;
            }
            .player-navbar-mb{
                display:block;
            }
        }


        @media screen and (max-width: 450px) {
            .modal-header {
                padding: 10px 0px 10px 5px;
            }

            .player-sec{
                width:100%; height:auto; margin:0px;
            }

            .player-navbar-pc{
                display:none;
            }

            .player-navbar-mb{
                display:block;
            }
        }
    </style>
</div>
<script type="text/javascript">
    // $(document).ready(function() {
    //     player.api('file', 'https://1036164025.vnns.net/hda1/vtv2_vhls.smil/chunklist.m3u8');
    //     player.api('play');
    //     console.log('abc');

    // });


    function closePlayerModal(){
        player.api('stop');
        $('#player-modal').modal('hide');

    }

    function goToHomePage(){
        window.location.href='{{route('home')}}';
    }
</script>
