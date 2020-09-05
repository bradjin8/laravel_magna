@extends('front.layout.master')
@section('Content')

    <div class="container" style="background-image:url({{url('/public/front')}}/img/backgrounds/complete-vehicles-2560b-min.jpg)"></div>

    <div class="attract-loop-container">
        <div class="attract-loop">
            <video id="complete-vehicles" class="" poster="" width="350" autoplay muted plays-inline loop>
                <source src="{{url('/public/front/media')}}/complete-vehicles.mp4" type="video/mp4"/>
            </video>
        </div>
    </div>


    @include('front.layout._sidebar')

    <div id="media-player" class="popup">
        <div class="titlebar">
            <img class="logo" src="{{url('/public/front')}}/img/magna-logo.png">
            <h2 class="light">Media Player Popup</h2>
            <img class="popup-close" src="{{url('/public/front')}}/img/close-blk.png">
        </div>
        <div class="left-bg"></div>
        <div class="content">
            <div class="left">
                <h2></h2>
                <div id="media-player-menu">
                </div>
            </div>
            <div class="right">
                <div id="video-container-in-popup">
                    <video
                            width="350"
                            plays-inline controls
                            poster="{{url('/content')}}/active-aerodynamics/media-splash.jpg">
                    </video>
                    <img src="{{url('/content')}}/active-aerodynamics/media-splash.jpg">
                </div>
                <h3 class="dark">Video Subtitle</h3>
                <p class="light">Video description</p>
            </div>
        </div>
    </div>

    <div id="iframe-popup" class="popup">
        <div class="titlebar">
            <img class="popup-close" src="{{url('/public/front')}}/img/close-red.png">
        </div>
        <iframe src="https://magna-completevehicles-web.com/"></iframe>
    </div>

    <img class="info-icon infoButton" src="{{url('/public/front')}}/img/info.png">
    <div id="popup-container"></div>

    <div id="orientation-alert"><p>Please rotate your device.</p></div>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/hotspots/complete-vehicles.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/mplayer-popup.js"></script>

    <script type="text/javascript">
        /* 1. set position of info buttons and video container */

        const video = document.querySelector('#complete-vehicles'),
            img_width = 2560,
            img_height = 1080,
            video_scale = 0.409,
            video_width = 70.8 * video_scale,
            video_height = 40.0 * video_scale,
            info = document.querySelector('.info-icon')

        const video_resize = () => {
            video.style.position = 'absolute'
            let unit, unit_val
            if (window.innerHeight / window.innerWidth > img_height / img_width) {
                unit = 'vh'
                unit_val = img_width / img_height
            } else {
                unit = 'vw'
                unit_val = 1.0
            }
            video.style.width = '' + (video_width * unit_val) + unit
            video.style.height = '' + (video_height * unit_val) + unit
            video.style.left = 'calc(50vw - ' + (video_width / 2.04 * unit_val) + unit + ')'
            video.style.top = 'calc(50vh - ' + ((video_height - 6.25) * unit_val) + unit + ')'

            info.style.position = 'absolute'
            info.style.width = '50px'
            info.style.height = '50px'
            info.style.left = 'calc(50vw - ' + (-25.09 * unit_val) + unit + ')'
            info.style.top = 'calc(50vh - ' + (19.08 * unit_val) + unit + ')'
        }

        window.onresize = video_resize
        video_resize()


        /* 2. set mplayer popup */

        const popupMenus = {
            'Complete Vehicles': [
                {
                    menutitle: 'Complete Vehicles',
                    title: 'One-Stop Shop',
                    video: "{{url('/videos')}}/complete-vehicles/complete-vehicles.mp4"
                },
                {title: 'Virtual Development', video: "{{url('/videos')}}/complete-vehicles/complete-vehicles.mp4"}
            ]
        }
        const openMplayerMethods = initMplayer(popupMenus)

        /* 3. set pdf popup */


        let dataA = {
            title_a: 'Complete Vehicles',
            subtitle_a: "ONE-STOP-SHOP From Ideas to Reality",
            desc_a: 'From ideas to reality – with our complete vehicle expertise in developing and manufacturing vehicles we are shaping the vision of mobility. This makes us a preferred partner for traditional OEMs and new entrants globally.',
            title_b: 'Registration Form',
            functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
            techs_b: ["Complete Vehicle Engineering", "Complete Vehicle Manufacturing", "Virtual Development", "Smart Factory"],
            bg_img_b: "{{url('/public/front')}}/img/backgrounds/Complete-Vehicles-pdf-bg-min.jpg"
        }
        $(".infoButton").click(() => {
            showPdfPopup(dataA)
        })
    </script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/iframe-popup.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/fade-nav.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/bg-dragger.js"></script>
    <script type="text/javascript">
        initFadedNavigation("{{url('/public/front')}}/img/backgrounds/body-exteriors-blur.jpg")
    </script>

@endsection