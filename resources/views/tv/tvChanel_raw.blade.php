<!doctype html>
<html lang="vi">

@include('layouts.app')

@php
    use App\Admin;
@endphp
<link href="{{ asset('css/linh.css?v=') . time() }}" rel="stylesheet">

<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #840123;
    }
</style>

<body>
    <marquee direction="left" style="background:#840123">
        <h4 style="color: white;margin-top: 15px;margin-bottom: 5px">
            Xem truyền hình Online by Viet-TV | Truyền hình dành riêng cho người Việt tại nước ngoài | Chi tiết liên hệ
            Zalo: +84983775500
        </h4>
    </marquee>
<script src="{{ asset('js/player.js') }}" type="text/javascript"></script>
    <main >
        <div id="channels" style="z-index:100;">

            <h2 class="category">AFF CUP 2023</h2>
            <div class="channel_collapse">

                <div class="channel" onclick="play('https://1036164025.vnns.net/hda1/vtv2_vhls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/2.png'>
                </div>
                <div class="channel" onclick="play('https://1036164025.vnns.net/hda1/vtv3hd_vhls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/3.png'>
                </div>
                <div class="channel" onclick="play('https://1036164025.vnns.net/hda2/vtv5hd_vhls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/5.png'>
                </div>
                <div class="channel" onclick="play('https://1036164025.vnns.net/hda1/vtv6hd_vhls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/8.png'>
                </div>

            </div>
<h2 class="category">LIVE NGOẠI HẠNG ANH (Chỉ phát khi có trận)</h2>
<div class="channel_collapse">

<div class="channel" onclick="play('https://bb5iqwas4fliv.vcdn.cloud/m201nd/m201nd@456.m3u8')"> <img src='https://i.ibb.co/tcP4yqm/live1.png'></div>
<div class="channel" onclick="play('https://bb5iqwas4fliv.vcdn.cloud/m301nd/m301nd@456.m3u8')"> <img src='https://i.ibb.co/nByPWcv/live2.png'></div>
<div class="channel" onclick="play('https://bb5iqwas4fliv.vcdn.cloud/m401nd/m401nd@456.m3u8')"> <img src='https://i.ibb.co/Vvtk0Tt/live3.png'></div>
<div class="channel" onclick="play('https://bb5iqwas4fliv.vcdn.cloud/m501nd/m501nd@456.m3u8')"> <img src='https://i.ibb.co/8PgzVFM/live4.png'></div>
<div class="channel" onclick="play('https://179720687.global.cdnfastest.com/live/1-3855188-0/chunklist.m3u8')"><img src='https://i.ibb.co/Y0bJwx7/live5.png'></div>
</div>
            <h2 class="category">SPORTS - THỂ THAO ĐỈNH CAO</h2>
            <div class="channel_collapse">


                <div class="channel"
                    onclick="play('https://bcovlive-a.akamaihd.net/r2d2c4ca5bf57456fb1d16255c1a535c8/eu-west-1/eu-west-1/6058004203001/profile_0/chunklist.m3u8')">
                    <img src='https://i.ibb.co/0Db9xRZ/mutv.png'>
                </div>
                <div class="channel"
                    onclick="play('https://rmtv.akamaized.net/hls/live/2043154/rmtv-en-web/bitrate_3.m3u8')"> <img
                        src='https://hubdeportivo.com/wp-content/uploads/2022/09/Real-Madrid-TV-English.jpg'> </div>
                <div class="channel"
                    onclick="play('https://d17lgdx4t7a4od.cloudfront.net/out/v1/9143d1b1e45440b99f1fdc3a6a50c210/index.m3u8')">
                    <img src='https://lichphatsongtivi.com/storage/images/thumbnails/lich-phat-song-foxsport2.png'>
                </div>

                <div class="channel" onclick="play('http://live.sportstv.com.tr/hls/low/sportstv_fhd/index.m3u8')"> <img
                        src='https://i.pinimg.com/originals/e6/47/e0/e647e0b9b66c9a7a5b3a6b6c5197ab86.jpg'> </div>
                <div class="channel" onclick="play('https://d35j504z0x2vu2.cloudfront.net/v1/manifest/0bc8e8376bd8417a1b6761138aa41c26c7309312/federator/047f241e-6a2f-4d8a-baac-3d0eb93758aa/2.m3u8')"> <img
                        src='https://cdn.dribbble.com/users/2024206/screenshots/4094721/38673981865_bd1fa048b8_o.jpg'> </div>

                <div class="channel"
                    onclick="play('http://partne.cdn.mangomolo.com/omsport/smil:omsport.stream.smil/chunklist_b4500000_t64MTA4MHA=.m3u8')">
                    <img src='https://assets.the-afc.com/Broadcasters/Oman-Sports-TV.png'>
                </div>

                <div class="channel"
                    onclick="play('https://dmitnthvll.cdn.mangomolo.com/dubaisports/smil:dubaisports.smil/master.m3u8')">
                    <img src='https://i.ibb.co/X3qR7jZ/dubaisports-1.png'>
                </div>
                <div class="channel"
                    onclick="play('https://dmitwlvvll.cdn.mangomolo.com/dubaisportshd/smil:dubaisportshd.smil/master.m3u8')">
                    <img src='https://i.ibb.co/k5YKPHc/dubaisports-2.png'>
                </div>
                <div class="channel"
                    onclick="play('https://dmitwlvvll.cdn.mangomolo.com/dubaisportshd5/smil:dubaisportshd5.smil/master.m3u8')">
                    <img src='https://i.ibb.co/6Zv6mwn/dubaisports-3.png'>
                </div>

                <div class="channel"
                    onclick="play('https://admdn1.cdn.mangomolo.com/adsports1/smil:adsports1.stream.smil/master.m3u8')">
                    <img src='https://i.ibb.co/xzxfKcX/adsports-1.png'>
                </div>
                <div class="channel"
                    onclick="play('https://admdn5.cdn.mangomolo.com/adsports2/smil:adsports2.stream.smil/master.m3u8')">
                    <img src='https://i.ibb.co/HKYzk3F/adsports-2.png'>
                </div>
                <div class="channel"
                    onclick="play('https://admdn3.cdn.mangomolo.com/adsports3/smil:adsports3.stream.smil/master.m3u8')">
                    <img src='https://i.ibb.co/mGszhYz/adsports-3.png'>
                </div>
                <div class="channel"
                    onclick="play('https://admdn4.cdn.mangomolo.com/adsports4/smil:adsports4.stream.smil/master.m3u8')">
                    <img src='https://i.ibb.co/CQXQdzZ/adsports-4.png'>
                </div>
                <div class="channel"
                    onclick="play('https://liveb.alkassdigital.net/hls/live/2094545/Alkass1ns/master1080.m3u8')"> <img
                        src='https://cne-eg.com/uploads/logos/20183142627377.png'> </div>
                <div class="channel"
                    onclick="play('https://streamalkasscustom02.azureedge.net/livehttporigin/smil:YWxrYXNz2.smil/playlist.m3u8')">
                    <img src='https://cne-eg.com/uploads/logos/20183142948397.png'>
                </div>
                <div class="channel"
                    onclick="play('https://streamalkasscustom.azureedge.net/livehttporigin/smil:YWxrYXNz5.smil/playlist.m3u8')">
                    <img src='https://cne-eg.com/uploads/logos/20183143127531.png'>
                </div>
                <div class="channel"
                    onclick="play('https://streamalkasscustom.azureedge.net/livehttporigin/smil:YWxrYXNz4.smil/playlist.m3u8')">
                    <img src='https://cne-eg.com/uploads/logos/20183142520385.png'>
                </div>

                <div class="channel" onclick="play('https://glxlmn026c.singularcdn.net.br/playout_01/playlist.m3u8')">
                    <img src='https://i.imgur.com/tKAAihn.jpg'>
                </div>
                <div class="channel" onclick="play('https://glxlmn026c.singularcdn.net.br/playout_02/playlist.m3u8')">
                    <img src='https://i.imgur.com/5qjThCC.jpg'>
                </div>
                <div class="channel" onclick="play('https://glxlmn026c.singularcdn.net.br/playout_03/playlist.m3u8')">
                    <img src='https://i.imgur.com/Szghe15.jpg'>
                </div>
                <div class="channel" onclick="play('https://glxlmn026c.singularcdn.net.br/playout_04/playlist.m3u8')">
                    <img src='https://i.imgur.com/L8VoVI0.jpg'>
                </div>
                <div class="channel" onclick="play('https://glxlmn026c.singularcdn.net.br/playout_05/playlist.m3u8')">
                    <img src='https://i.imgur.com/XY9XeFc.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://d2hrvno5bw6tg2.cloudfront.net/smrtv-ch02/_definst_/ch-02/chunklist.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/it/6/60/San_Marino_RTV_logo_2021.svg'>
                </div>
                <div class="channel" onclick="play('https://mavtv-mavtvglobal-1-gb.samsung.wurl.tv/3000.m3u8')"> <img
                        src='https://assets.lucasoil.com/logos/mavtv_light_np.svg'> </div>
                <div class="channel" onclick="play('https://mavtv-mavtvglobal-1-au.samsung.wurl.tv/3000.m3u8')"> <img
                        src='https://assets.lucasoil.com/logos/mavtv_plus_light_np.svg'> </div>
                <div class="channel" onclick="play('https://mavtv-1-us.samsung.wurl.tv/3000.m3u8')"> <img
                        src='https://assets.lucasoil.com/logos/mavtv_select_light_np.svg'> </div>
                <div class="channel" onclick="play('https://eyeonesports.com/1080/ESR-001SCTE35.m3u8')"> <img
                        src='https://www.eutelsat.com/files/Logos/ESR.png'> </div>
                <div class="channel" onclick="play('https://ov-estv-es.ottera.tv/estv/es/es_720p_high.m3u8')"> <img
                        src='https://i.ibb.co/ZLtz7kX/estv.png'> </div>
                <div class="channel" onclick="play('https://1621590671.rsc.cdn77.org/HLS/BILLIARDTV_SCTE.m3u8')"> <img
                        src='https://a.jsrdn.com/hls/22964/billiard-tv/poster_20210622_195953.png'> </div>
                <div class="channel"
                    onclick="play('https://sp1564435593.mytvchain.info/live/sp1564435593/index.m3u8')">
                    <img src='https://cnosf.franceolympique.com/cnosf/fichiers/album/9/carr_9848.jpg'>
                </div>
                <div class="channel" onclick="play('https://unbeaten-roku.amagi.tv/playlist.m3u8')"> <img
                        src='https://i0.wp.com/www.broadbandtvnews.com/wp-content/uploads/2020/04/Unbeaten.png'> </div>
                <div class="channel" onclick="play('https://insighttv-samsung-uk.amagi.tv/playlist.m3u8')"> <img
                        src='https://image.roku.com/developer_channels/prod/06ee27a8bc89f299648ffbf10c3804cde9a50db299b4c9159112fa4da3850984.png'>
                </div>

                <div class="channel" onclick="play('https://ov-mvg-mv-es.ottera.tv/mvg/mv_es/mv_es_720p_high.m3u8')">
                    <img src='https://www.ottera.tv/files/2021/02/Motorvision_clients-image.png'>
                </div>
                <div class="channel" onclick="play('https://wpt-theworldpokertour-2-es.samsung.wurl.tv/3000.m3u8')">
                    <img src='https://wptmedia.s3.amazonaws.com/wp-content/uploads/2017/01/Main-WPT-Logo.jpg'>
                </div>
                <div class="channel" onclick="play('https://5cf4a2c2512a2.streamlock.net/dgrau/dgrau/playlist.m3u8')">
                    <img src='https://i.imgur.com/wULpnYR.png'>
                </div>
                <div class="channel"
                    onclick="play('https://skylivetab-i.akamaihd.net/hls/live/569779/tablive/stcsd_extreme@569779.m3u8')">
                    <img src='https://www.brc.com.au/Images/UserUploadedImages/355/Tabcorp_Sky_SKY%20RACING.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://racingvic-i.akamaized.net/hls/live/598695/racingvic/index1500.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/en/thumb/3/3e/RACING.COM_logo_2016.svg/1200px-RACING.COM_logo_2016.svg.png'>
                </div>
                <div class="channel" onclick="play('https://alchimie-mmatv-samsung.amagi.tv/playlist1080_p.m3u8')">
                    <img src='https://mmatv.fr/wp-content/uploads/2019/07/MMAtv_Logo2.png'> </div>
                <div class="channel"
                    onclick="play('https://live-k2301-kbp.1plus1.video/sport/smil:sport.smil/playlist.m3u8')"> <img
                        src='https://photos.live-tv-channels.org/tv-logo/lt-kok-fights-tv-9251.jpg'> </div>
                <div class="channel"
                    onclick="play('https://cdn-cf.fite.tv/linear/fite247/4038629_fite-247/live_722/chunks.m3u8')"> <img
                        src='https://img.dtcn.com/image/themanual/fite-tv-streaming-service-800x800.jpg'> </div>
                <div class="channel"
                    onclick="play('https://884030f97a.vws.vegacdn.vn/live/_definst_/stream_1_a0acb/chunklist.m3u8')">
                    <img src='https://www.golfnews.vn/frontend-new/images/GN.svg'>
                </div>
                <div class="channel"
                    onclick="play('https://gizmeon.s.llnwi.net/channellivev3/live/master2800000.m3u8;session=275')">
                    <img src='https://dash.tvzinos.com/assets/images/channel/94172.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://austchannel-live.akamaized.net/hls/live/2002736/austchannel-sport/master.m3u8')">
                    <img src='https://i.imgur.com/xSBUzRB.png'>
                </div>
                <div class="channel"
                    onclick="play('http://103.199.161.254/Content/ddsports/Live/Channel(DDSPORTS)/index.m3u8')"> <img
                        src='https://i.imgur.com/FW8KOQr.png'> </div>
                <div class="channel"
                    onclick="play('https://bcovlive-a.akamaihd.net/f1fe983d710642b08c2232d4f5e1bb49/us-east-1/6141518204001/playlist.m3u8')">
                    <img src='https://i.imgur.com/XwnDHUi.png'>
                </div>
                <div class="channel" onclick="play('https://tennischannel-intl-samsung-uk.amagi.tv/playlist.m3u8')">
                    <img src='https://i.imgur.com/Jl3Cak5.png'>
                </div>
                <div class="channel"
                    onclick="play('https://dmisvthvll.cdn.mangomolo.com/events/smil:events.smil/playlist.m3u8')"> <img
                        src='https://i.imgur.com/KykBzDz.png'> </div>
                <div class="channel"
                    onclick="play('https://rbmn-live.akamaized.net/hls/live/590964/BoRB-AT/master.m3u8')"> <img
                        src='https://i.imgur.com/WEsYR0a.png'> </div>
                <div class="channel" onclick="play('https://edgesports-plex.amagi.tv/playlistR1080p.m3u8')"> <img
                        src='https://i.imgur.com/dXLuuPF.png'> </div>
                <div class="channel"
                    onclick="play('https://elevensports-uk.samsung.wurl.com/manifest/playlist.m3u8')">
                    <img src='https://i.imgur.com/twA7iRj.png'>
                </div>
                <div class="channel"
                    onclick="play('https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/arriadia/hls_snrt/index.m3u8')">
                    <img src='https://i.imgur.com/GFZrR1p.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://svs.itworkscdn.net/smc4sportslive/smc4.smil/playlist.m3u8')"> <img
                        src='https://i.imgur.com/b2t4TYc.jpg'> </div>
                <div class="channel" onclick="play('https://a.jsrdn.com/broadcast/ab14783a09/+0000/c.m3u8')"> <img
                        src='https://i.imgur.com/7qETrZK.png'> </div>

            </div>

            <h2 class="category">PHIM - CA NHẠC - GIẢI TRÍ</h2>
            <div class="channel_collapse">

                <div class="channel" onclick="play('https://sc.id-tv.kz/7_kanal.m3u8')"> <img
                        src='https://pbs.twimg.com/profile_images/1237020778450817025/A5oEtr15_400x400.png'> </div>
                <div class="channel"
                    onclick="play('http://live.stranafm.cdnvideo.ru/stranafm/stranafm_hd.sdp/chunklist.m3u8')"> <img
                        src='https://strana.fm/wp-content/uploads/2017/11/logo_171130.png'> </div>
                <div class="channel"
                    onclick="play('http://hls-tvsoyuz.cdnvideo.ru/tvsoyuz2/muzsoyuz.6fw0-58xp-acts-esy0/playlist.m3u8')">
                    <img src='https://i.imgur.com/v6KNZms.png'>
                </div>

                <div class="channel" onclick="play('http://51.210.199.5/hls/stream.m3u8')"> <img
                        src='http://www.parsatv.club/index_files/channels/avatv.jpg'> </div>
                <div class="channel" onclick="play('http://51.210.199.4/hls/stream.m3u8')"> <img
                        src='http://tv.iranfilmplus.net/wp-content/uploads/2021/11/Ava-Series.jpg'> </div>
                <div class="channel" onclick="play('http://51.210.199.29/hls/stream.m3u8')"> <img
                        src='https://pano.vn/wp-content/uploads/2015/08/billboard-logo.jpg'> </div>
                <div class="channel"
                    onclick="play('https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/musicindia/musicindia.isml/musicindia-audio_208482_und=208000-video=877600.m3u8')">
                    <img
                        src='https://www.tvchannelpricelist.com/wp-content/uploads/channels-logo-100/music-india-logo.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://eco.streams.ovh/BarazaTV/BarazarazaTV/BarazaTV/playlist.m3u8')"> <img
                        src='https://app.barazaradio.com/wp-content/uploads/2020/01/newnew-300x199.png'> </div>

                <div class="channel"
                    onclick="play('https://5dcabf026b188.streamlock.net/SET22/livestream/playlist.m3u8')"> <img
                        src='https://res.cloudinary.com/tinmedia/image/upload/v1/tivis/set-tv2.jpeg'> </div>
                <div class="channel" onclick="play('https://media.streambrothers.com:1936/8228/8228/playlist.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/commons/5/58/Little_Saigon_TV_logo.svg'>
                </div>

                <div class="channel" onclick="play('https://hlive.ktv.go.kr/live/klive_h.stream/playlist.m3u8')"> <img
                        src='https://i.ibb.co/sHBYBn7/ktv-kr.jpg'> </div>
                <div class="channel" onclick="play('http://app.m4stream.live/mfourmalayalamhls/live.m3u8')"> <img
                        src='https://i.ibb.co/8s2wXQp/m4-aus.jpg'> </div>
                <div class="channel"
                    onclick="play('https://59cba4d34b678.streamlock.net/live/vuslattv/playlist.m3u8')">
                    <img src='https://i.ibb.co/mD2n0pD/vuslat.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://bk7l2w4nlx53-hls-live.5centscdn.com/HISTORY/961ac1c875f5884f31bdd177365ef1e3.sdp/chunks.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/209.png'>
                </div>
                <div class="channel" onclick="play('https://dogus-live.daioncdn.net/dmax/dmax.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/commons/2/25/DMAX_Logo_16_05_2011.jpg'> </div>
                <div class="channel"
                    onclick="play('https://hiyah-live.localnowlive.com/v1/master/385c85a93929f94966d0fb186fc33b431e6f1eb9/DSP_6170408a74cbf57d532ff8e3_hiyah-live/playlist.m3u8')">
                    <img src='https://www.soda.com/wp-content/uploads/2017/03/Hi-Yah_live_stream.jpg'>
                </div>
                <div class="channel" onclick="play('https://www.bloomberg.com/media-manifest/streams/asia.m3u8')">
                    <img src='https://i.ibb.co/HP6kcXs/bloomberg-tv.jpg'> </div>
                <div class="channel" onclick="play('https://amc-rushbyamc-1-us.plex.wurl.tv/4300.m3u8')"> <img
                        src='https://pbs.twimg.com/profile_images/1543606285660192769/yrAR550i_400x400.jpg'> </div>
                <div class="channel"
                    onclick="play('https://hvtrafico.ddns.net/cinema720/cinema720.stream/playlist.m3u8')"> <img
                        src='https://i.ibb.co/kMqZ0sq/cinema-plus.png'> </div>

                <div class="channel" onclick="play('https://mhz-samsung-linear-us.samsung.wurl.tv/3000.m3u8')"> <img
                        src='https://mhznetworks.com/wp-content/uploads/2017/07/MHz_NOW_Logo-uai-258x258.png'> </div>
                <div class="channel" onclick="play('https://ion-plus.samsung.wurl.com/manifest/playlist.m3u8')"> <img
                        src='https://i.ibb.co/tCMwsY3/ion-plus.png'> </div>
                <div class="channel" onclick="play('https://a.jsrdn.com/broadcast/e9b4093a41/+0000/high/c.m3u8')">
                    <img src='https://dash.tvzinos.com/assets/images/channel/Kingdom.jpg'> </div>
                <div class="channel" onclick="play('https://st.biztv.uz/hls/c_mid/index.m3u8')"> <img
                        src='https://photos.live-tv-channels.org/tv-logo/biz-cenima-3057.jpg'> </div>
                <div class="channel" onclick="play('http://170.178.189.66:1935/live/Stream1/playlist.m3u8')"> <img
                        src='https://www.haunt.photos/images/articles/8242p.jpg'> </div>
                <div class="channel" onclick="play('https://dmtv-plex.amagi.tv/playlist.m3u8')"> <img
                        src='https://i.ibb.co/PTHY3m6/dartmatter-en.png'> </div>
                <div class="channel"
                    onclick="play('https://bloodydisgusting-ingest-roku-us.cinedigm.com/playlist1080p.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/en/7/7f/Bloody_Disgusting.PNG'> </div>
                <div class="channel" onclick="play('https://filmdetective-stirr.amagi.tv/indexfd_1280x720.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/en/e/ef/The_Film_Detective_logo.png'> </div>
                <div class="channel" onclick="play('https://haunttv-roku.amagi.tv/playlist1080-p.m3u8')"> <img
                        src='https://pbs.twimg.com/profile_images/1325839687215362048/B53Ca9Am_400x400.jpg'> </div>
                <div class="channel" onclick="play('https://gsn-cinevault-classics-2-us.samsung.wurl.tv/2000.m3u8')">
                    <img src='https://cinevaulttv.com/images/cinevault_master_logo.png'>
                </div>
                <div class="channel"
                    onclick="play('https://d31faiqgbicbr8.cloudfront.net/dist/samsungtv/195/hls/master/playlist.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/commons/7/7b/Play_TV_SVG.svg'>
                </div>
                <div class="channel" onclick="play('https://dje6yassknq8t.cloudfront.net/playlist.m3u8')"> <img
                        src='https://pbs.twimg.com/profile_images/472330486862188544/40SDo6CI_400x400.png'> </div>
                <div class="channel" onclick="play('https://samuelgoldwyn-films-1-us.roku.wurl.tv/4300.m3u8')"> <img
                        src='https://i.ibb.co/ygM3ZHC/samuel-goldwyn.jpg'> </div>
                <div class="channel"
                    onclick="play('https://teleplay.mediaflix.istream.mx/livestream/teleplay/livehd/playlist.m3u8')">
                    <img
                        src='https://img.freepik.com/premium-vector/tv-channel-button-logo-design-vector-template_567288-1201.jpg'>
                </div>
                <div class="channel" onclick="play('https://linear-46.frequency.stream/46/hls/master/playlist.m3u8')">
                    <img src='https://i.ibb.co/3hF6kq5/afv.jpg'>
                </div>
                <div class="channel" onclick="play('https://gsn-gameshowchannnel-1-us.samsung.wurl.tv/3000.m3u8')">
                    <img src='https://www.tvinsider.com/wp-content/uploads/2020/09/game-show-network.png'> </div>
                <div class="channel" onclick="play('https://endemol-dealornodeal-1-us.samsung.wurl.tv/3000.m3u8')">
                    <img src='https://i.ibb.co/dQ3CxcT/deal-or-no-deal.webp'> </div>
                <div class="channel"
                    onclick="play('http://103.14.38.107:1935/live/mnb.stream/chunklist_w458135353.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/commons/9/91/Logo_of_the_Mongolian_National_Broadcaster.svg'>
                </div>
                <div class="channel"
                    onclick="play('http://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/9XM-audio_208482_und=208000-video=877600.m3u8')">
                    <img src='https://pbs.twimg.com/media/DV6nsZJXUAIjRRt.jpg'>
                </div>
                <div class="channel" onclick="play('http://144.217.70.181:9587/hin2/MTVBEATSHD/playlist.m3u8')"> <img
                        src='https://www.passionateinmarketing.com/wp-content/uploads/2021/12/logo.jpg'> </div>
                <div class="channel"
                    onclick="play('https://zmlive.zappingtv.com/zm-free/zm.smil/chunklist_live1_b4131600_sles.m3u8')">
                    <img src='http://tv-online.cl/zapping-music-en-vivo.jpg'>
                </div>
                <div class="channel" onclick="play('https://dpp-qmusicnl-live.akamaized.net/streamx/QmusicNL.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/en/7/7d/Q-music_logo.png'>
                </div>
                <div class="channel"
                    onclick="play('http://k3.usastreams.com:1935/CableLatino/88stereo/playlist.m3u8')">
                    <img src='https://imgur.com/QISHhp6.png'>
                </div>
                <div class="channel"
                    onclick="play('https://5929b138b139d.streamlock.net/RadioIbizaTV/livestream/playlist.m3u8')"> <img
                        src='https://radioibiza.it/wp-content/uploads/2021/09/cropped-logo_header.png'> </div>
                <div class="channel" onclick="play('https://linear-10.frequency.stream/10/hls/master/playlist.m3u8')">
                    <img src='https://cdn.dribbble.com/users/437479/screenshots/4243500/01_popstar_capa.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://5ce9406b73c33.streamlock.net/KissKissTV/KissKissTV.stream/playlist.m3u8')">
                    <img src='https://kisskiss.it//fluidstream.tv/kk_logo.jpg'>
                </div>
                <div class="channel" onclick="play('https://itv.streams.ovh/magictv/magictv/playlist.m3u8')"> <img
                        src='https://i.imgur.com/kjhj78D.png'> </div>
                <div class="channel"
                    onclick="play('https://keshethlslive-lh.akamaihd.net/i/24live_1@195271/index_1400_av-b.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/en/d/d9/Arutz_24_logo.png'> </div>
                <div class="channel" onclick="play('http://live.streams.ovh:1935/NGradio/NGradio/playlist.m3u8')">
                    <img src='https://i.ibb.co/RpXWcBz/ng-radio.png'> </div>
                <div class="channel"
                    onclick="play('https://ocko-live-dash.ssl.cdn.cra.cz/cra_live2/ocko_expres.stream.1.smil/chunk_ukeaj5au5_ctvideo_cfm4s_ridp0va0br2500000_cs2488779090_mpd.m3u8')">
                    <img src='https://photos.live-tv-channels.org/tv-logo/cz-ocko-expres-6319.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://ocko-live-dash.ssl.cdn.cra.cz/cra_live2/ocko_gold.stream.1.smil/chunk_u5s4j6x2b_ctvideo_cfm4s_ridp0va0br2500000_cs2377075860_mpd.m3u8')">
                    <img src='https://i.iinfo.cz/images/161/ocko-gold-1.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://web.onair-radio.eu:1935/Alpha-Host/Alpha-Host/playlist.m3u8')"> <img
                        src='https://i.ibb.co/N2M1zrH/play-tv.png'> </div>
                <div class="channel"
                    onclick="play('http://149.56.17.92:1935/portalfoxmix/_definst_/portalfoxmix/playlist.m3u8')"> <img
                        src='https://i.ibb.co/Kh4x0JW/Portal-Fox-Mix.png'> </div>
                <div class="channel" onclick="play('http://ventdelnord.tv:8080/mola/directe.m3u8')"> <img
                        src='https://i.ibb.co/jbzW2L5/molahits.jpg'> </div>

                <div class="channel" onclick="play('https://srv1.zcast.com.br/kpoptv/kpoptv/playlist.m3u8')"> <img
                        src='https://m.media-amazon.com/images/I/417nmnZ4z+L.png'> </div>
                <div class="channel"
                    onclick="play('http://hdserver.7starcloud.com:1935/sharvesh/live/playlist.m3u8')">
                    <img alt="Sharvesh 7star TV"
                        src='http://7starcloud.in/tamilcloud/uploads/images/channel_IMG58756.png'>
                </div>
                <div class="channel" onclick="play('http://hdserver.7starcloud.com:1935/srmusix/live/playlist.m3u8')">
                    <img alt="SR Music" src='http://7starcloud.in/tamilcloud/uploads/images/channel_IMG53656.png'>
                </div>
                <div class="channel"
                    onclick="play('https://jeyamtv.livebox.co.in/JeyamTelevisionhls/JeyamTelevision.m3u8')"> <img
                        src='https://i.imgur.com/5yi1uuA.png'> </div>
                <div class="channel"
                    onclick="play('https://l1-xl1.myanmarnet.com/relay/music/ch1/stream_hi/index.m3u8')"> <img
                        src='https://i.pinimg.com/280x280_RS/7c/bc/e4/7cbce4deea5f475e3d5cca4a306b6ef0.jpg'> </div>
                <div class="channel" onclick="play('http://live.m2.tv/hls3/720/stream.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/commons/d/d3/M2_logo.jpg'> </div>
                <div class="channel" onclick="play('https://m2otv-lh.akamaihd.net/i/m2oTv_1@186074/master.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/commons/a/ae/Logo-m2o-plain-nero.jpg'> </div>
                <div class="channel" onclick="play('https://epiconvh.s.llnwi.net/showbox/master.m3u8')"> <img
                        src='https://imgur.com/jLD3N3b.png'> </div>
                <div class="channel"
                    onclick="play('http://1hdru-hls-otcnet.cdnvideo.ru/onehdmusic/tracks-v1a1/index.m3u8')"> <img
                        src='https://logos-download.com/wp-content/uploads/2020/06/1HD_Music_Television_Logo.png'>
                </div>
                <div class="channel" onclick="play('https://streamtv.mediasector.es/hls/activatv/.m3u8')"> <img
                        src='https://i.imgur.com/guHWZwP.jpg'> </div>
                <div class="channel" onclick="play('https://stream.ecable.tv/afrobeats/index.m3u8')"> <img
                        src='https://lookhu.tv/uploads/tv_image/afrobeats-247.jpg'> </div>
                <div class="channel"
                    onclick="play('https://cmctv.ios.internapcdn.net/cmctv_vitalstream_com/live_1/CMCU-92/chunklist.m3u8')">
                    <img src='https://dash.tvzinos.com/assets/images/channel/71583.jpg'>
                </div>

                <div class="channel" onclick="play('https://linear-43.frequency.stream/43/hls/master/playlist.m3u8')">
                    <img src='https://mms.businesswire.com/media/20200514005187/en/791626/5/1280.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://vcngfc1.teleosmedia.com/stream/globalfashionchannel/globalfashionchannel/seglist_720p.m3u8')">
                    <img src='https://clubdisplay.nl/wp-content/uploads/2019/05/gfc-logo.jpg'>
                </div>

            </div>

            <h2 class="category">VTVCab</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('https://856175157.r.vtvcdn.com/ondrm/GIAITRI_TV_HD/m20_index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/12.png'> </div>
                <div class="channel" onclick="play('https://856175157.r.vtvcdn.com/ondrm/PHIM_VIET/m20_index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/13.png'>
                </div>
                <div class="channel"
                    onclick="play('https://livevlive.vtvcab.vn/hls/OS_HAY_TV/sc-gaFEAA/m30_index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/17.png'> </div>
                <div class="channel"
                    onclick="play('https://856175157.r.vtvcdn.com/ondrm/THETHAO_HD/sc-gaFEAQ/m30_index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/14.png'> </div>
                <div class="channel"
                    onclick="play('https://856175157.r.vtvcdn.com/ondrm/BONGDA_HD/sc-gaFEAQ/m30_index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/24.png'> </div>
                <div class="channel"
                    onclick="play('https://856175157.r.vtvcdn.com/ondrm/THETHAO_TINTUC_HD/sc-gaFEAQ/m30_index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/26.png'>
                </div>
                <div class="channel" onclick="play('https://856175157.r.vtvcdn.com/ondrm/E_CHANNEL/m30_index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/16.png'>
                </div>
                <div class="channel" onclick="play('https://856175157.r.vtvcdn.com/ondrm/BIBI/m20_index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/19.png'> </div>
                <div class="channel" onclick="play('https://856175157.r.vtvcdn.com/ondrm/O2_TV/m20_index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/21.png'> </div>

            </div>


            <h2 class="category">KIDS - THIẾU NHI</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('https://sjva.soa1.duckdns.org/klive/api/url.m3u8?m=url&s=seezn&i=217&q=default')">
                    <img src='https://upload.wikimedia.org/wikipedia/commons/b/bf/Aniplus_logo.svg'>
                </div>

                <div class="channel" onclick="play('https://stmv1.srvif.com/animetv/animetv/playlist.m3u8')"> <img
                        src='https://i.imgur.com/rmAm6UE.png'> </div>
                <div class="channel" onclick="play('http://azxtv.com/hls/stream.m3u8')"> <img
                        src='https://www.m3u.cl/logo/488_Anime_Zone_TV.png'> </div>
                <div class="channel"
                    onclick="play('https://contvanime-littlstar.cinedigm.com/ingest/masterR1080p.m3u8')"> <img
                        src="https://photos.live-tv-channels.org/tv-logo/contv-anime-4223.jpg"> </div>
                <div class="channel" onclick="play('https://kedoo-supertoonstv-1-gb.samsung.wurl.tv/3000.m3u8')"> <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/SuperToons.jpg/640px-SuperToons.jpg">
                </div>
                <div class="channel" onclick="play('https://kidoodletv-kdtv-1-us.samsung.wurl.tv/3000.m3u8')"> <img
                        src="https://cdn.newswire.com/files/x/d6/14/6fda274f51e7c400846262c4eff9.png"> </div>
                <div class="channel" onclick="play('https://deaplaneta-planetakidz-1-es.samsung.wurl.tv/3000.m3u8')">
                    <img
                        src="https://www.pngkey.com/png/detail/221-2212143_planet-kids-is-the-kids-ministry-here-at.png">
                </div>


                <div class="channel"
                    onclick="play('https://moiptvhls-i.akamaihd.net/hls/live/652318/secure/master.m3u8')"> <img
                        alt="3ABN Kids" src="https://i.imgur.com/oVq4Jg6.png"> </div>
                <div class="channel"
                    onclick="play('https://2-fss-2.streamhoster.com/pl_140/amlst:200914-1298290/playlist.m3u8?DVR')">
                    <img alt="PBS Kids" src="https://i.imgur.com/EvrI7lk.png">
                </div>
                <div class="channel" onclick="play('http://akaram.zecast.net/akaram-live/akaramkidz/index.m3u8')">
                    <img alt="Akaram Kidz" src="https://i.imgur.com/IkIj1zw.jpg"> </div>
                <div class="channel"
                    onclick="play('https://bcsecurelivehls-i.akamaihd.net/hls/live/623607/15364602001/tvokids/master.m3u8')">
                    <img alt="TVO Kids" src="https://i.imgur.com/jQ6xvvA.png">
                </div>
                <div class="channel"
                    onclick="play('https://d1wal6k3d7ssin.cloudfront.net/out/v1/ea91db0906c847a4931b46a9ec36e77b/index.m3u8')">
                    <img alt="Knowledge Kids" src="https://i.imgur.com/ohj9jiv.jpg">
                </div>
                <div class="channel" onclick="play('https://kidzbop-rokuus.amagi.tv/kidzbop-roku/playlist.m3u8')">
                    <img alt="Kidz BOP" src="https://i.imgur.com/RTjgDbY.jpg"> </div>
                <div class="channel"
                    onclick="play('https://mmm-ducktv-2-it.samsung.wurl.com/manifest/playlist.m3u8')">
                    <img alt="Duck TV" src="https://i.imgur.com/HlliW3r.png">
                </div>
                <div class="channel" onclick="play('https://legochannel-roku.amagi.tv/playlist.m3u8')"> <img
                        alt="Lego TV" src="https://i.imgur.com/RC1ZjhP.png"> </div>
                <div class="channel" onclick="play('https://happykids-roku.amagi.tv/playlist.m3u8')"> <img
                        alt="Happy Kids TV" src="https://i.imgur.com/eM5gxCa.jpg"> </div>
                <div class="channel" onclick="play('https://moonbug-rokuus.amagi.tv/playlist.m3u8')"> <img
                        alt="Moonbug Kids" src="https://i.imgur.com/7Q0WCwZ.png"> </div>
                <div class="channel"
                    onclick="play('https://kanlivep2event-i.akamaihd.net/hls/live/747600/747600/playlist.m3u8')"> <img
                        alt="As a Child" src="https://i.imgur.com/OY6lWfQ.jpg"> </div>
                <div class="channel"
                    onclick="play('https://content.uplynk.com/channel/e11a05356cc44198977436418ad71832.m3u8')"> <img
                        alt="Ketnet Jr" src="https://i.imgur.com/uBUHcE6.png"> </div>

                <div class="channel" onclick="play('https://autopilot.catcast.tv/content/38144/index.m3u8')"> <img
                        alt="Kinder TV" src="https://i.imgur.com/1Iw6Jj6.jpg"> </div>
                <div class="channel" onclick="play('http://stream.atr.ua/lale/live/index.m3u8')"> <img alt="Lale"
                        src="https://i.imgur.com/mDff3aC.jpg"> </div>
                <div class="channel" onclick="play('https://tv-trtcocuk.live.trt.com.tr/master.m3u8')"> <img
                        alt="TRT Cocuk" src="https://i.imgur.com/jjfubB7.jpg"> </div>
                <div class="channel" onclick="play('http://infantil-crtvg.flumotion.com/playlist.m3u8')"> <img
                        alt="TVG Infantil" src="https://i.imgur.com/LNKhtAt.jpg"> </div>
                <div class="channel"
                    onclick="play('https://dai2.xumo.com/xumocdn/p=redbox&deviceid=&is_lat=&subp=RedboxdesktopWebWindows/amagi_hls_data_xumo1212A-redboxkabillion/CDN/playlist.m3u8')">
                    <img alt="Kabillion" src="https://i.imgur.com/lhdFPDd.jpg">
                </div>

                <div class="channel"
                    onclick="play('https://dai2.xumo.com/xumocdn/p=redbox&deviceid=&is_lat=&subp=RedboxdesktopWebWindows/amagi_hls_data_xumo1212A-roku-rainbow-ruby/CDN/playlist.m3u8')">
                    <img alt="Rainbow Ruby" src="https://i.imgur.com/Po9G5Q5.jpg">
                </div>
                <div class="channel"
                    onclick="play('https://stream-us-east-1.getpublica.com/playlist.m3u8?network_id=50')"> <img
                        alt="Kidsflix" src="https://i.imgur.com/Dd2RlCp.jpg"> </div>

            </div>

            <h2 class="category">ASIA - QUỐC TẾ</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('https://livefta.malimarcdn.com/tvkedge/btv.stream/chunklist.m3u8')">
                    <img src='http://cdn.worldlivetv.stream/logo/btv.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://livefta.malimarcdn.com/tvkedge/tvkhd.stream/chunklist.m3u8')"> <img
                        src='https://i.malimarcdn.com/kh/tvkHDF.jpg'> </div>
                <div class="channel"
                    onclick="play('https://livefta.malimarcdn.com/tvkedge/tvk2.stream/chunklist.m3u8')"> <img
                        src='https://i.malimarcdn.com/kh/TVK2HDF.jpg'> </div>
                <div class="channel"
                    onclick="play('http://203.176.130.123:8989/live/ctv9_480k.stream/playlist.m3u8')">
                    <img src='https://www.ckh7.com/uploads/thumbs/db125986f-1.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://d3c7duantorcb1.cloudfront.net/amgwildplanetuk/playlist1080p.m3u8')"> <img
                        src='https://cdn.shopify.com/s/files/1/0603/5439/6408/files/logo.png'> </div>
                <div class="channel"
                    onclick="play('https://d1vp12yk4i8ou5.cloudfront.net/v1/master/3722c60a815c199d9c0ef36c5b73da68a62b09d1/WildLife2-prod/playlist.m3u8')">
                    <img src='https://i.imgur.com/NGvowyy.png'>
                </div>
                <div class="channel" onclick="play('https://linear-80.frequency.stream/80/hls/master/playlist.m3u8')">
                    <img
                        src='https://i1.wp.com/fishingtackleretailer.com/wp-content/uploads/2022/07/wired2fish-logo.jpg'>
                </div>
                <div class="channel" onclick="play('https://inwonder-samsung-uk.amagi.tv/playlist.m3u8')"> <img
                        src='https://i.imgur.com/lB1QOS5.png'> </div>
                <div class="channel" onclick="play('https://d2eb12ehm31yjp.cloudfront.net/playlist.m3u8')"> <img
                        src='https://i.ibb.co/SVjg5jN/lucky-dog.png'> </div>
                <div class="channel" onclick="play('https://outdoorchannel-samsungau.amagi.tv/playlist.m3u8')"> <img
                        src='https://i.imgur.com/CFla6tq.png'> </div>
                <div class="channel" onclick="play('https://obsession-media.sinclair.wurl.com/manifest/3000.m3u8')">
                    <img src='https://media.outdooramerica.com/uploads/2021/05/outdoor-america.png'>
                </div>
                <div class="channel" onclick="play('https://studio71-craftistry-roku.amagi.tv/playlist.m3u8')"> <img
                        src='https://i.imgur.com/6kVfWuP.jpg'> </div>
                <div class="channel"
                    onclick="play('https://dai2.xumo.com/xumocdn/p=redbox&deviceid=&is_lat=&subp=RedboxdesktopWebLinux/amagi_hls_data_xumo1212A-redboxjustforlaughsgags/CDN/playlist.m3u8')">
                    <img src='https://i.imgur.com/lLvf7aV.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://cdn-ue1-prod.tsv2.amagi.tv/linear/amg01478-parademediagrou-bite-samsunguk/playlist.m3u8')">
                    <img src='https://i.imgur.com/DEMFJqW.jpg'>
                </div>
                <div class="channel" onclick="play('https://bamus-eng-roku.amagi.tv/playlist.m3u8')"> <img
                        src='https://i.imgur.com/BQDdzat.jpg'> </div>
                <div class="channel" onclick="play('https://d18dyiwu97wm6q.cloudfront.net/playlist.m3u8')"> <img
                        src='http://www.widemedia.tv/wp-content/uploads/2020/07/ln-logo_peacock_4k-1024x602.png'>
                </div>
                <div class="channel"
                    onclick="play('https://linear-11.frequency.stream/dist/plex/11/hls/master/playlist.m3u8')"> <img
                        src='https://i.imgur.com/Y0jnHh2.png'> </div>
                <div class="channel"
                    onclick="play('http://tvchannelstream1.tvzvezda.ru/cdn/tvzvezda/playlist_hdhigh.m3u8')"> <img
                        src='https://online-red.com/images/radio-logo/zvezda.png'> </div>
                <div class="channel"
                    onclick="play('https://d2e1asnsl7br7b.cloudfront.net/7782e205e72f43aeb4a48ec97f66ebbe/index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/219.png'>
                </div>
                <div class="channel"
                    onclick="play('https://abc-iview-mediapackagestreams-2.akamaized.net/out/v1/6e1cc6d25ec0480ea099a5399d73bc4b/index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/215.png'>
                </div>
                <div class="channel"
                    onclick="play('https://streaming.cnnphilippines.com/live/myStream/playlist.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/commons/4/48/CNN_Philippines_Logo.svg'>
                </div>
                <div class="channel"
                    onclick="play('https://cnn-cnninternational-1-gb.samsung.wurl.com/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/218.png'>
                </div>
                <div class="channel"
                    onclick="play('https://dai.google.com/linear/hls/event/Sid4xiTQTkCT1SLu6rjUSQ/master.m3u8')"> <img
                        src='https://deadline.com/wp-content/uploads/2018/06/cbs-news-logo.jpg'> </div>
                <div class="channel" onclick="play('http://trn03.tulix.tv/AsEAeOtIxz/playlist.m3u8')"> <img
                        src='https://globalpeaceandconflict.files.wordpress.com/2012/03/fox-news-logo.jpg'> </div>
                <div class="channel" onclick="play('https://static.france24.com/live/F24_EN_HI_HLS/live_web.m3u8')">
                    <img
                        src='https://i0.wp.com/bioplasticsnews.com/wp-content/uploads/2020/01/France-SUP-plastic-ban.jpg'>
                </div>
                <div class="channel" onclick="play('https://rt-glb.rttv.com/live/rtnews/playlist.m3u8')"> <img
                        src='https://arm-tv.com/wp-content/uploads/2016/06/rt-russia-today-hd.png'> </div>
                <div class="channel" onclick="play('https://rt-rtd.rttv.com/live/rtdoc/playlist.m3u8')"> <img
                        src='http://img.b612.tightvideo.com/channels/rtdochd.png'> </div>
                <div class="channel"
                    onclick="play('https://cdn-ue1-prod.tsv2.amagi.tv/linear/amg00731-gannettcoinc-usatodaysports-plex/d58352fd-0cb0-4bb3-a753-d90f8e1b7d37/2.m3u8')">
                    <img src='https://i.ibb.co/p2249DK/usatoday-sports.png'>
                </div>
                <div class="channel"
                    onclick="play('https://cdn-ue1-prod.tsv2.amagi.tv/linear/amg00731-gannettcoinc-usatodaynews-plex/3f428bf9-e4ca-420f-98fd-61df1b5b42ed/2.m3u8')">
                    <img src='https://i.ibb.co/6rWngRq/usatoday.png'>
                </div>
                <div class="channel" onclick="play('https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8')">
                    <img
                        src='https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/Sky-news-logo.svg/2560px-Sky-news-logo.svg.png'>
                </div>
                <div class="channel"
                    onclick="play('https://nbcnews2.akamaized.net/hls/live/723426/NBCNewsPlaymaker24x7Linear99a3a827-ua/VIDEO_0_6596000.m3u8')">
                    <img src='https://deadline.com/wp-content/uploads/2021/02/NBC-News-Logo.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://dwamdstream102.akamaized.net/hls/live/2015525/dwstream102/index.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/commons/8/8e/DW_%28TV%29_Logo_2012.png'> </div>
                <div class="channel"
                    onclick="play('https://euronews-euronews-world-1-au.samsung.wurl.com/manifest/playlist.m3u8')">
                    <img src='https://www.driver-project.eu/wp-content/uploads/2018/06/euronews-logo.jpg'> </div>
                <div class="channel"
                    onclick="play('https://rakuten-africanews-1-dk.samsung.wurl.com/manifest/playlist.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/commons/d/d3/Africanews._alternative_logo_2016.png'>
                </div>


            </div>

            <h2 class="category">CHINA - JAPAN - KOREA - TAIWAN</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('http://liveko24-manminglobal3.ktcdn.co.kr/liveko24/gcnko_high/chunklist.m3u8')">
                    <img src='http://www.gcntv.org/EN/common/img/en/main_logo.png'> </div>
                <div class="channel" onclick="play('http://redlabmcdn.s.llnwi.net/nv02/ryowa4hd/index.m3u8')"> <img
                        src='https://i.ibb.co/QNpg3xc/TV-Asahi.png'> </div>
                <div class="channel"
                    onclick="play('http://ebsonairios.ebs.co.kr/groundwavetablet500k/tablet500k/chunklist.m3u8')"> <img
                        src='https://photos.live-tv-channels.org/tv-logo/ebs-1-2983.jpg'> </div>
                <div class="channel"
                    onclick="play('http://ebsonair.ebs.co.kr:1935/ebs2familypc/familypc1m/chunklist.m3u8')"> <img
                        src='https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-original-577x577/s3/022021/ebs_logo_2.png'>
                </div>
                <div class="channel" onclick="play('http://119.200.131.11:1935/KBCTV/tv/playlist.m3u8')"> <img
                        src='https://i.ibb.co/SJZgM5H/kbc-kr.jpg'> </div>
                <div class="channel"
                    onclick="play('http://ebsonairios.ebs.co.kr/plus1tablet500k/tablet500k/plus1tablet500k.index.m3u8')">
                    <img src='https://photos.live-tv-channels.org/tv-logo/kr-ebs-plus-1-9807.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://ebsonairios.ebs.co.kr/plus2tablet500k/tablet500k/plus2tablet500k.index.m3u8')">
                    <img src='https://photos.live-tv-channels.org/tv-logo/kr-ebs-plus-2.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://ebsonairios.ebs.co.kr/plus3tablet500k/tablet500k/plus3tablet500k.index.m3u8')">
                    <img src='https://global.ebs.co.kr/global/img/sub/Channels_IPTV_03.png'>
                </div>
                <div class="channel"
                    onclick="play('http://ebsonairios.ebs.co.kr/ebsutablet500k/_definst_/tablet500k/chunklist.m3u8')">
                    <img src='https://i.ibb.co/jDG4WQp/ebs-kids.jpg'>
                </div>
                <div class="channel" onclick="play('http://1.245.74.5:1935/live/tv/.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/ko/8/8b/TJB_Logo.jpg'> </div>
                <div class="channel" onclick="play('https://media.joycorp.co.kr:4443/live/live_720p/playlist.m3u8')">
                    <img src='https://i.imgur.com/loWf3B5.jpg'>
                </div>

                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV1HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv1.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV2HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv2.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV3HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv3.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV4HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv4.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV5HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv5.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV5PHD_1080//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv5+.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV6HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv6.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV7HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv7.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV8HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv8.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV9HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv9.jpg'> </div>
                <div class="channel" onclick="play('https://live.olelive.com:6443/live/CCTV10HD/hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv10.jpg'> </div>
                <div class="channel" onclick="play('https://live.olelive.com:6443/live/CCTV11HD/hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv11.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV12HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv12.jpg'> </div>
                <div class="channel" onclick="play('https://api.olelive.com//dis//live//CCTV13HD//hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv13.jpg'> </div>
                <div class="channel" onclick="play('https://live.olelive.com:6443/live/CCTV14HD/hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv14.jpg'> </div>
                <div class="channel" onclick="play('https://live.olelive.com:6443/live/CCTV15HD/hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv15.jpg'> </div>

                <div class="channel" onclick="play('https://live.olelive.com:6443/live/cctv17hd_1080/hls.m3u8')"> <img
                        src='https://www.tvchinese.net/uploads/tv/cctv17.jpg'> </div>

                <div class="channel" onclick="play('http://hw-m-l.cztv.com/channels/lantian/channel01/1080p.m3u8')">
                    <img src='http://i02.cztv.com/2013/12/1387789357_85343700.png'>
                </div>
                <div class="channel" onclick="play('http://hw-m-l.cztv.com/channels/lantian/channel04/1080p.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/zh/e/e0/Zrtgztv4jykj.jpg'>
                </div>
                <div class="channel" onclick="play('http://hw-m-l.cztv.com/channels/lantian/channel03/1080p.m3u8')">
                    <img src='http://tv.haoqu99.com/d/file/2016/0619/20160619032916811.jpg'>
                </div>
                <div class="channel" onclick="play('http://hw-m-l.cztv.com/channels/lantian/channel08/1080p.m3u8')">
                    <img src='http://tv.haoqu99.com/d/file/2016/0619/20160619033946335.jpg'>
                </div>

                <div class="channel" onclick="play('http://liveflash.sxrtv.com/live/huanghe.m3u8')"> <img
                        src='https://i.ibb.co/42PgBSx/gamecn.png'> </div>

                <div class="channel" onclick="play('https://live-cdn.gxxw.com/tv/gxtvlive/index.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/1008/8609a72d8c05bfb1d52283eb86554a5c.jpg'> </div>
                <div class="channel" onclick="play('http://stream1.jlntv.cn/jlws/playlist.m3u8?_upt=')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0918/73213233b2a32b0d5839d7e32ad63a86.jpg'> </div>
                <div class="channel" onclick="play('http://stream.hrbtv.net/yspd/sd/live.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/1011/95f38e639def77b673a8f409db85d7c2.jpg'> </div>
                <div class="channel" onclick="play('http://cm.wshls.homecdn.com/live/7cc9.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0616/20160616053949523.jpg'> </div>
                <div class="channel" onclick="play('http://cm.wshls.homecdn.com/live/7cc7.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0616/20160616053856615.jpg'> </div>
                <div class="channel" onclick="play('http://cm.wshls.homecdn.com/live/7cc5.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2017/0911/bca09b75371a77ce204514e5e77a5771.jpg'> </div>
                <div class="channel" onclick="play('http://hwzbout.yunshicloud.com/r5fc3f/3l9g1m.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2017/1219/32c84219f0581bfc658cbb3b1e0a63ff.jpg'> </div>
                <div class="channel"
                    onclick="play('http://m3u8.channel.wsrtv.com.cn/cms/videos/nmip-media/channellive/channel16/playlist.m3u8')">
                    <img src='http://tv.haoqu99.com/d/file/2018/0118/90601303a2aca7e7584430e3835befe9.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://m3u8.channel.wsrtv.com.cn/cms/videos/nmip-media/channellive/channel14/playlist.m3u8')">
                    <img src='http://tv.haoqu99.com/d/file/2018/0119/8d32f908800cb0f2b7d9956d833b6ebf.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://m3u8.channel.wsrtv.com.cn/cms/videos/nmip-media/channellive/channel19/playlist.m3u8')">
                    <img src='http://tv.haoqu99.com/d/file/2018/0119/1274a79d858f4de9d2f27f13c7bbec3f.jpg'>
                </div>
                <div class="channel" onclick="play('https://hls.gstv.com.cn/49048r/6e1sy2.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/1008/86cbea4ba5011f81ec76c9a2d89acb93.jpg'> </div>

                <div class="channel" onclick="play('http://pull.hnedutv.com/live/hnedutv1206.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0928/d49129622b865ee5ab132fdf2199ff1b.jpg'> </div>
                <div class="channel" onclick="play('http://stream1.jiaxingren.com/whys/sd/live.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0617/20160617062136168.jpg'> </div>
                <div class="channel" onclick="play('http://live9.m2oplus.nmtv.cn/nmgws/hd/live.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0918/4508a64148d483ba76423102a0e94c7f.jpg'> </div>
                <div class="channel" onclick="play('http://cms.weihai.tv/api/channel/v-tv1/index.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/0624/20160624105408278.jpg'> </div>
                <div class="channel"
                    onclick="play('https://streamipcf.akamaized.net/live/_definst_/smil:live.smil/chunklist_b3000.m3u8')">
                    <img src='http://epg.51zmt.top:8000/tb1/gt/yuanzhumin.png'>
                </div>
                <div class="channel" onclick="play('https://pulltv1.wanfudaluye.com/live/tv1.m3u8')"> <img
                        src='https://daai.tv/images/logo.png'> </div>
                <div class="channel" onclick="play('http://live1.wuhubtv.com/channel1/sd/live.m3u8')"> <img
                        src='https://s11.mogucdn.com/mlcdn/fe720b/190726_1e3c5ae2h932b3c74373gh66jcb9b_240x150.jpg'>
                </div>
                <div class="channel" onclick="play('https://tv.lanjingfm.com/cctbn/hainan.m3u8')"> <img
                        src='https://i.ibb.co/54Cx3W8/cctbn.jpg'> </div>
                <div class="channel" onclick="play('http://chaoan.chaoantv.com:8278/zongyi_1028/playlist.m3u8')">
                    <img src='https://s11.mogucdn.com/mlcdn/fe720b/190420_276c3bi55idik80lb9ej2bllkla95_240x150.jpg'>
                </div>
                <div class="channel" onclick="play('http://stream2.xiancity.cn/xatv1/sd/live.m3u8')"> <img
                        src='https://s11.mogucdn.com/mlcdn/fe720b/190823_0lie4ihl0ka97ejch82dg9elf3ha6_312x193.jpg'>
                </div>
                <div class="channel" onclick="play('http://stream2.xiancity.cn/xatv2/sd/live.m3u8')"> <img
                        src='http://www.tvniu.com/tvimg/img/xatv2.jpg'> </div>
                <div class="channel" onclick="play('http://stream2.xiancity.cn/xatv3/sd/live.m3u8')"> <img
                        src='https://img.meituan.net/csc/7d172b57da894c8182aa15195930ac5f8615.jpg'> </div>
                <div class="channel" onclick="play('http://stream2.xiancity.cn/xatv4/sd/live.m3u8')"> <img
                        src='https://img.meituan.net/csc/1744fcc54d10995aad0fd9be7f1e22598434.jpg'> </div>
                <div class="channel" onclick="play('http://stream2.xiancity.cn/xatv5/sd/live.m3u8')"> <img
                        src='https://img.meituan.net/csc/7e5d42baaf4ed1d945bab3035a9edbee14673.jpg'> </div>

                <div class="channel" onclick="play('http://mms.ldntv.cn:1935/live/zonghe/playlist.m3u8')"> <img
                        src='https://i.ibb.co/LtMXnYz/zonghe.jpg'> </div>
                <div class="channel"
                    onclick="play('https://jsylivealone302.iqilu.com/jitie/jitie_tv01/index.m3u8')">
                    <img src='http://www.cnr.cn/sd/gd/20200606/W020200606476810489844.png'>
                </div>
                <div class="channel"
                    onclick="play('http://live1.ahwanyun.cn/wylive/07db2e13-9129-4a79-a059-92d7b400ddf3.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2014/0116/20140116014331377.jpg'> </div>
                <div class="channel" onclick="play('https://live1.scmstv.cn/gqpd/sd/live.m3u8?_upt=')"> <img
                        src='https://img.meituan.net/csc/5a0af7e8744d960917699d01aad5e0448341.jpg'> </div>
                <div class="channel" onclick="play('http://stream.0515yc.cn/yctv3/playlist.m3u8?_upt=')"> <img
                        src='https://img.meituan.net/csc/4926d7d889eeeec5fa0f28de7bc035299519.jpg'> </div>
                <div class="channel" onclick="play('https://hwapi.yunshicloud.com/62hdvf/rjwt14.m3u8')"> <img
                        src='http://epg.51zmt.top:8000/tb1/ws/yunnan.png'> </div>
                <div class="channel" onclick="play('http://media.fantv.hk/m3u8/archive/channel2.m3u8')"> <img
                        src='http://epg.51zmt.top:8000/tb1/gt/hongkongkai.png'> </div>
                <div class="channel" onclick="play('https://cdn.deepcore.online/hlsme/ctv_hk.m3u8')"> <img
                        src='https://upload.wikimedia.org/wikipedia/zh/9/91/Creation-tv_logo.png'> </div>
                <div class="channel" onclick="play('http://playtv-live.ifeng.com:80/live/06OLEEWQKN4.m3u8')"> <img
                        src='http://epg.51zmt.top:8000/tb1/gt/fenghuangzixun.png'> </div>

                <div class="channel" onclick="play('http://stream.jmtv.com.cn/ggsh/sd/live.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2016/1019/ef25af68af87269fe0a1200b4501213c.jpg'> </div>
                <div class="channel" onclick="play('http://live.lytv.net.cn/zhpwd/hd/live.m3u8')"> <img
                        src='https://i.ibb.co/NSHxgn1/zhpwd-cn.png'> </div>
                <div class="channel" onclick="play('https://wsvideo.aniu.tv/live/aniu/playlist.m3u8')"> <img
                        src='https://i.ibb.co/fn4XhM3/aniu-cn.png'> </div>

                <div class="channel" onclick="play('http://stream.haixitv.cn/1/sd/live.m3u8')"> <img
                        src='https://img.meituan.net/csc/83ade8712786b948caaab759dd6be47014727.jpg'> </div>
                <div class="channel" onclick="play('http://tmpstream.hyrtv.cn/xwzh/sd/live.m3u8')"> <img
                        src='https://i.ibb.co/my07G5k/hyrtv-1.png'> </div>
                <div class="channel" onclick="play('http://tmpstream.hyrtv.cn/hygg/sd/live.m3u8')"> <img
                        src='https://i.ibb.co/DkZ66fX/hyrtv-2.png'> </div>
                <div class="channel" onclick="play('http://live1.wuhubtv.com/channel4/sd/live.m3u8')"> <img
                        src='https://s5.mogucdn.com/mlcdn/fe720b/190726_6gd9lag8cdfh3fl56a2c62l0da43b_240x150.jpg'>
                </div>
                <div class="channel" onclick="play('http://stream.smntv.cn/smtv1/sd/live.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2018/0123/58feb455be207c2800179927dae0a27a.jpg'> </div>
                <div class="channel" onclick="play('http://stream.smntv.cn/smtv2/sd/live.m3u8')"> <img
                        src='http://tv.haoqu99.com/d/file/2018/0123/954b52895793e4971dc23231b5d83dc1.jpg'> </div>
                <div class="channel"
                    onclick="play('https://nhkwlive-ojp.akamaized.net/hls/live/2003459/nhkwlive-ojp-en/index_4M.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/224.png'>
                </div>



            </div>

            <h2 class="category">TRUYỀN HÌNH CÁC TỈNH - THÀNH PHỐ</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sda/angiang_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/107.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sdb/backan_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/111.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sdc/baclieu_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/112.png'>
                </div>
                <div class="channel"
                    onclick="play('http://113.163.216.23:1935/live/tv2.stream_480p/chunklist_w189583188.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/108.png'> </div>
                <div class="channel" onclick="play('https://live.baobinhphuoc.com.vn/bptvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/122.png'> </div>
                <div class="channel" onclick="play('https://live.baobinhphuoc.com.vn/bptvlive/tv2live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/123.png'> </div>
                <div class="channel" onclick="play('https://live.bacgiangtv.vn/bgtvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/109.png'> </div>
                <div class="channel" onclick="play('https://stream.thingnet.vn/live/smil:BTV.smil/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/110.png'> </div>
                <div class="channel" onclick="play('http://truyenhinhbinhdinhonline.dynns.com:8086/live.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/114.png'> </div>
                <div class="channel" onclick="play('http://202.43.109.144:1935/thbttv/bttv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/124.png'> </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/hda3/btv1_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/115.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/hda3/btv2_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/116.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sdb/binhduong3_hls.smil/chunklist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/117.png'> </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/hda2/btv4hd_vhls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/118.png'>
                </div>
                <div class="channel" onclick="play('https://1036164025.vnns.net/sda/btv6_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/120.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sdc/camau_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/125.png'>
                </div>
                <div class="channel" onclick="play('https://tv.tchgroup.vn/live/tv_web/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/126.png'> </div>
                <div class="channel" onclick="play('https://hbtvlive.3ssoft.vn/hoabinhtv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/148.png'> </div>
                <div class="channel"
                    onclick="play('http://drtdnglive.e49a7c38.cdnviet.com/livedrt1/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/128.png'>
                </div>
                <div class="channel"
                    onclick="play('http://drtdnglive.e49a7c38.cdnviet.com/livestream/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/129.png'>
                </div>
                <div class="channel" onclick="play('http://103.90.220.236/drtlive/tv1live-transmux.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/130.png'> </div>
                <div class="channel"
                    onclick="play('https://16371213858134.vnns.net/daknong_abr/vtc130121/daknong-1080p/chunks.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/131.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sdc/dienbien_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/132.png'>
                </div>
                <div class="channel" onclick="play('http://118.107.85.4:1935/live/smil:DNTV1.smil/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/133.png'> </div>
                <div class="channel" onclick="play('http://118.107.85.4:1935/live/smil:DNTV2.smil/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/134.png'> </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sda/gialai_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/138.png'>
                </div>
                <div class="channel" onclick="play('https://1028513096.vnns.net/tv1-abr/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/141.png'> </div>
                <div class="channel" onclick="play('https://1028513096.vnns.net/tv2-abr/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/142.png'> </div>
                <div class="channel" onclick="play('https://live.trt.com.vn/TRT-Online/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/179.png'> </div>
                <div class="channel" onclick="play('http://118.69.169.41:1935/THDT/thdttv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/136.png'> </div>
                <div class="channel" onclick="play('http://202.43.109.145:1935/thdt2/thdt2/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/137.png'> </div>
                <div class="channel" onclick="play('http://118.107.85.5:1935/live/smil:LTV.smil/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/155.png'> </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sda/haugiang_2000.stream/chunklist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/147.png'> </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sda/phuyen_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/164.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sda/khanhhoa_2000.stream/chunklist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/150.png'> </div>
                <div class="channel" onclick="play('http://118.107.85.5:1935/live/smil:PTQ.smil/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/167.png'> </div>
                <div class="channel" onclick="play('https://qtv.vncdn.vn/qtvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/168.png'> </div>
                <div class="channel" onclick="play('https://qtv.vncdn.vn/qtvlive/tv3live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/169.png'> </div>
                <div class="channel"
                    onclick="play('http://113.163.189.104:8135/hls-live/livepkgr/_definst_/liveevent/livestream.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/171.png'>
                </div>
                <div class="channel"
                    onclick="play('http://113.163.189.104:8135/hls-live/livepkgr/_definst_/liveevent/livestreamstv2.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/172.png'>
                </div>
                <div class="channel" onclick="play('http://202.43.109.142:1935/ttv11/tntv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/174.png'> </div>
                <div class="channel" onclick="play('http://123.25.238.45:1935/live/thtg/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/180.png'> </div>
                <div class="channel" onclick="play('http://118.69.169.42:1935/THTV/travinhtv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/181.png'> </div>
                <div class="channel" onclick="play('https://tacnghiep.thainguyentv.vn/hls/livestream.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/176.png'> </div>
                <div class="channel"
                    onclick="play('http://vinhphuctv.vn:8090/vinhphuclive/web.stream/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/183.png'>
                </div>

                <div class="channel" onclick="play('https://live.truyenhinhnghean.vn/hls/na1/index.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/160.png'> </div>
                <div class="channel" onclick="play('https://live.hungyentv.vn/hytvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/149.png'> </div>
                <div class="channel" onclick="play('http://cdn.tbtv.mediatech.vn/tbtvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/175.png'> </div>

                <div class="channel" onclick="play('https://mediatech.vncdn.vn/thhnlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/140.png'> </div>
                <div class="channel" onclick="play('https://nbtv.vncdn.vn/nbtvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/161.png'> </div>

                <div class="channel" onclick="play('https://wse.hatinhtv.net/live/httv1/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/143.png'> </div>
                <div class="channel"
                    onclick="play('https://1012163901.vnns.net/bentre.adm.480p.tms/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/113.png'>
                </div>

                <div class="channel" onclick="play('http://202.43.109.142:1935/ttv11/tntv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/174.png'> </div>
                <div class="channel" onclick="play('http://live.langsontv.vn/lstvlive/tv1live.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/156.png'> </div>
                <div class="channel" onclick="play('http://118.107.85.4:1935/live/smil:CRTV.smil/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/127.png'> </div>

                <div class="channel" onclick="play('http://202.43.109.142:1935/NTV/ntvtv/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/162.png'> </div>

                <div class="channel" onclick="play('https://nvzoftzsvflivcf.vcdn.com.vn/haiduongtv/index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/144.png'> </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sda/hagiang_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/139.png'>
                </div>
                <div class="channel"
                    onclick="play('http://123.31.36.68/live.m3u8?c=vstv525&q=sd&type=tv&token=1111&time=1586395820&gcId=1532&userId=&deviceId=&deviceType=&location=NA&requestTime=1586309420781&pkg=pkg12.hni')">
                    <img src='https://cdn.hqth.me/logo/thumbs/178.png'>
                </div>
                <div class="channel"
                    onclick="play('https://1036164025.vnns.net/sdc/yenbai_hls.smil/chunklist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/184.png'>
                </div>

            </div>

            <h2 class="category">VOD FILM THUYẾT MINH + VIETSUB</h2>
            <div class="channel_collapse">
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2022/06/15/09/964fb5a7/964fb5a7-52c3-4ed1-84e9-463f428cd95f_5_.m3u8')">
                    <img src='http://123.31.36.137/image/fileDoc_1574221012460.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/09/14/23/8c7c779c/8c7c779c-1ee2-4b15-a89f-6e0b10daeccf_2_.m3u8')">
                    <img src='https://i.ytimg.com/vi/KOq7Yn4H9Sk/maxresdefault.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/10/01/10/9383adae/9383adae-ff9e-424b-8b4c-934e9ae5eed6_2_.m3u8')">
                    <img src='https://www.gscmovies.com.my/wp-content/uploads/2018/10/Ice-Man-2-2.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2020/12/05/23/60be1693/60be1693-aec1-4f28-8ada-e80d0fc05bff_3_.m3u8')">
                    <img src='http://ramestar.vn/media/uploaded/2018/07/09/9%20manh%20ghep.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/09/15/00/4ed31685/4ed31685-1bff-4c6f-af16-3d8f006982e3_2_.m3u8')">
                    <img src='https://news.dailymails.org/media/blog/Ip-Man-3-min.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2020/10/13/14/7efe7cfb/7efe7cfb-8019-4a15-92f2-ee4c37afdcc3_4_.m3u8')">
                    <img src='http://mcvideomd1fr.keeng.net/playnow/images/20190712/2371826.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2017/09/21/14/af3b5b71/af3b5b71-4410-4406-a769-c710228a3150_2_.m3u8')">
                    <img src='https://i.ytimg.com/vi/DqwSwc1ziQk/maxresdefault.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2018/07/30/15/7582a1ba/7582a1ba-3c8a-45b4-86c0-c37a1610ed1a_1_.m3u8')">
                    <img src='https://i1.wp.com/teaser-trailer.com/wp-content/uploads/Enter-the-Fire-movie.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/12/24/16/c838682c/c838682c-a45a-4b85-9ab7-de758c7ed9b2_2_.m3u8')">
                    <img src='http://flicksbank.console360.net/images/2830/poster_horizon/default.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2022/01/19/22/783840b0/783840b0-16de-4425-b751-848474fe5098_3_.m3u8')">
                    <img src='https://upload.wikimedia.org/wikipedia/en/9/90/3-Headed_Shark_Attack_poster.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2019/11/20/13/7127e5e2/7127e5e2-658b-493a-9704-8d8da2288906_2_.m3u8')">
                    <img src='https://isach.info/images/story/cover/cam_y_ve__mieu_khieu.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/08/17/11/91d914d1/91d914d1-090e-4b93-8652-58969d34d573_2_.m3u8')">
                    <img src='https://i.ytimg.com/vi/0pWBQdkdJ80/hqdefault.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/12/24/00/cb08b624/cb08b624-5be3-404a-8cfc-df231d169135_2_.m3u8')">
                    <img src='https://movieteam360kpop.files.wordpress.com/2016/03/the-hobbit-2.png'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2018/12/12/14/d2e8587b/d2e8587b-9810-4178-8af9-0afd5d34e4bc_3_.m3u8')">
                    <img src='https://waninmagicland.files.wordpress.com/2019/01/dnhxkq2vsaagtff.jpg'>
                </div>
                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2021/07/26/17/520b8686/520b8686-7daa-4f6f-b2d5-9d7ca60bec56_2_.m3u8')">
                    <img src='https://image.tmdb.org/t/p/w1280//riNgWD9D2faY8K9sZfDJ6v5Wip3.jpg'>
                </div>

                <div class="channel"
                    onclick="play('http://vod-zlr2.tv360.vn/video1/2020/09/23/10/d4f76633/d4f76633-8be2-4146-b3f3-8ecf8e07d76b_1_.m3u8')">
                    <img src='https://pic-bstarstatic.akamaized.net/ugc/2f6968f71e62f6cc22b4f2fc6b8b7e9f2417c9e9.png'>
                </div>
                <div class="channel" onclick="play('https://kd.hd-bophim.com/20220318/1640_5d8326f4/index.m3u8')">
                    <img src='https://iptvvn.xyz/@phim/logo/di-tim-nemo-thumb.JPG'> </div>



            </div>

            <h2 class="category">RADIO VOV - VOH - HẢI NGOẠI</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('https://vnso-pt-3-tf-mplaylist-zmp3.zadn.vn/99YFw722aFg/zhls/live/855a669d5ad8b386eac9/index.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/251.png'>
                </div>
                  <div class="channel"
                    onclick="play('https://vnno-pt-6-tf-playlist-live-zmp3.zadn.vn/C0ti9DKXaS4/zhls/live/standard-audio/5c0872cf4e8aa7d4fe9b/standard-audio.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/252.png'>
                </div>
                  <div class="channel"
                    onclick="play('http://onsportlive.vtvcab.vn/hls/ONRADIO_CL/04.m3u8')">
                    <img src='https://media-cdn-v2.laodong.vn/storage/newsportal/2022/4/1/1029812/Anh-Chup-Man-Hinh-20.jpg'>
                </div>

                <div class="channel" onclick="play('https://stream.zeno.fm/umt5gqmg3reuv.mp3')"> <img
                        src='https://mytuner.global.ssl.fastly.net/media/tvos_radios/rgpzkdmf3kyd.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/wppep1n7qpeuv.mp3')"> <img
                        src='https://mytuner.global.ssl.fastly.net/media/tvos_radios/rgpzkdmf3kyd.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/tk8atfbgtg8uv')"> <img
                        src='https://downloadr2.apkmirror.com/wp-content/uploads/2020/02/5e4b24a428bbe.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/4q7y9hvkp2zuv')"> <img
                        src='https://upload.wikimedia.org/wikipedia/commons/1/15/Logo_Mradio.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/0trm6wrnga0uv')"> <img
                        src='https://vongco.vn/themes/default/images/no_image.gif'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/a2dbs2tq1p8uv')"> <img
                        src='https://nhacdanca.net/wp-content/uploads/2018/03/nhac-dan-ca.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/ehbutdfccm0uv')"> <img
                        src='https://www.nicepng.com/png/detail/17-178035_home-png-radio-dj-logo.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/8456uy0bcm0uv')"> <img
                        src='https://i1.sndcdn.com/avatars-000626309448-ktjcjv-t500x500.jpg'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/x2z45v7d84zuv')"> <img
                        src='https://dongnhacvang.com/wp-content/uploads/2019/08/cropped-logo-nhac-vang-1-512x430.png'> </div>
                <div class="channel" onclick="play('https://stream.zeno.fm/hvtxgd85rm0uv')"> <img
                        src='https://cdn.popsww.com/blog/sites/2/2021/12/nhac-tet-hay-nhat.jpg'> </div>
                <div class="channel"
                    onclick="play('https://str.vov.gov.vn/vovlive/vovGTHCM.sdp_aac/chunklist_w1213978008.m3u8')"> <img
                        src='http://vovmedia.vn/upload/1609732603.png'> </div>
                <div class="channel"
                    onclick="play('https://str.vov.gov.vn/vovlive/vovGTHN.sdp_aac/chunklist_w601606653.m3u8')"> <img
                        src='http://vovmedia.vn/upload/1609732598.png'> </div>
                <div class="channel" onclick="play('http://media.kythuatvov.vn:7059/;stream/')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/245.png'> </div>
                <div class="channel" onclick="play('https://strm.voh.com.vn/radio/channel3/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/247.png'> </div>
                <div class="channel" onclick="play('https://strm.voh.com.vn/radio/channel1/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/248.png'> </div>
                <div class="channel" onclick="play('https://strm.voh.com.vn/radio/channel5/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/249.png'> </div>
                <div class="channel" onclick="play('https://strm.voh.com.vn/radio/channel2/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/250.png'> </div>
                <div class="channel"
                    onclick="play('https://str.vov.gov.vn/vovlive/vov1vov5Vietnamese.sdp_aac/playlist.m3u8')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/239.png'> </div>
                <div class="channel" onclick="play('http://media.kythuatvov.vn:7003/;stream/')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/240.png'> </div>
                <div class="channel" onclick="play('http://media.kythuatvov.vn:7005/;stream/')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/241.png'> </div>
                <div class="channel" onclick="play('http://media.kythuatvov.vn:7035/;stream/')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/242.png'> </div>
                <div class="channel" onclick="play('http://media.kythuatvov.vn:7007/;stream/')"> <img
                        src='https://cdn.hqth.me/logo/thumbs/243.png'> </div>
                <div class="channel"
                    onclick="play('https://streaming1.vov.vn:8443/audio/vovvn1_vov2.stream_aac/playlist.m3u8')"> <img
                        src='https://media.vov.vn/sites/default/files/2020-12/vov6_2.png'> </div>
                <div class="channel" onclick="play('http://media.kythuatvov.vn:1936/live/VOV89.sdp/playlist.m3u8')">
                    <img src='https://cdn.hqth.me/logo/thumbs/246.png'>
                </div>
                <div class="channel"
                    onclick="play('https://livept.hanoitv.vn/hntvRadio/joyfm.stream_aac/playlist.m3u8')"> <img
                        src='https://mytuner.global.ssl.fastly.net/media/tvos_radios/S78kvHU2rY.png'> </div>
                <div class="channel"
                    onclick="play('https://rfahls-i.akamaihd.net/hls/live/226233/RFALive_2/index.m3u8')"> <img
                        src='https://www.radio.net/images/broadcasts/53/51/105588/1/c300.png'> </div>
                <div class="channel"
                    onclick="play('https://rfivietnamien96k.ice.infomaniak.ch/rfivietnamien-96k.mp3')"> <img
                        src='https://upload.wikimedia.org/wikipedia/commons/d/dd/RFI_logo_2013.svg'> </div>
                <div class="channel" onclick="play('http://162.244.80.118:3092/;stream.mp3')"> <img
                        src='https://img1.radioforest.net/radio/617/617323/41616/slider-home.jpg'> </div>
                <div class="channel" onclick="play('http://stream.zeno.fm/tmpea66b8e9uv')"> <img
                        src='https://nhackaraoke.info/video_data/images/karaoke-nhac-tre587c614967540.jpg'> </div>


            </div>

            <h2 class="category">RADIO BY ZINGMP3</h2>
            <div class="channel_collapse">

                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/9tPzLPYORS8/zhls/playback-realtime/a07d79b945fcaca2f5ed/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/8/5/4/0/854010f76bddeefd5f13305a1d6cc8be.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/62YE6lXdY4w/zhls/playback-realtime/db68d4afe8ea01b458fb/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/7/7/8/d/778d152062edfbe0e4c4abf151858bf0.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/wTSwRIGOON0/zhls/playback-realtime/6eeb692c5569bc37e578/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/1/4/6/b/146b49d11cc9b3bc591823bfedb8bce2.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/ktkT8IgzcQQ/zhls/playback-realtime/08aae96dd5283c766539/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/0/9/9/3/0993b3110c60ba6518fceeba9913d20d.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/BtRvAOtW5jk/zhls/playback-realtime/e3b9f87ec43b2d65742a/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/1/3/0/5/1305cd954d22d89fef4354301613fd68.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/Itsn5VCb5Uo/zhls/playback-realtime/4f2980eebcab55f50cba/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/b/f/3/b/bf3bf87a788a5d0b8719c6feee774a2e.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/94rxZ-Dfzro/zhls/playback-realtime/ff294ded71a898f6c1b9/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/c/f/2/4/cf2428f7e56a8c2a52d84cb106891de2.jpg'>
                </div>
                <div class="channel"
                    onclick="play('https://multi-playlist-zmp3.zadn.vn/RckDo1XPsU4/zhls/playback-realtime/111c87d8bb9d52c30b8c/index.m3u8')">
                    <img src='https://photo-zmp3.zadn.vn/avatars/b/0/d/a/b0da7c8ecd6521337682f3a86fa0170f.jpg'>
                </div>
            </div>



        </div>
        <div id="player"></div>
    </main>


    <script>
        var player = new Playerjs({
            id: "player",
            file: "",
            poster: "https://znews-photo.zingcdn.me/w660/Uploaded/aopuoax/2022_11_18/lich_aff_2022.jpg"
        });
    </script>
    <script>
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
            var user = '<?=Admin::user()?>';
            console.log('admin user : ', user );
            if (user  == '') {
                window.location.href="{{route('auth.cannotWatch')}}";
            } else {
                $.ajax({
                    method: 'post',
                    url: "{{ route('auth.checkDeviceAllow') }}",
                    data: {
                        userId:'<?=Admin::user()?Admin::user()->id:''?>',
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('data response : ', JSON.stringify(data));

                        if (data.data.allow_this_device == true) {
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
                        }else{
                            window.location.href="{{route('home')}}";
                        }
                    }

                });

            }

        }


    </script>
    <script type='text/javascript'>
        //<![CDATA[
        // JavaScript Document
        var message = "Đừng Phá Em - OK";

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
        //]]>
    </script>
    {{-- <div class="footer">
        <h3 style="text-align:center;color:white;background-color:#840123;margin-top:5px; font-size : 15px;">
            Hỗ trợ kỹ thuật: +84983775500 (Zalo)
        </h3>
    </div> --}}

</body>


</html>
