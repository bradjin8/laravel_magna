@extends('front.layout.master')
@section('Content')

    <div class="container" style="background-image:url({{url('/public/front')}}/img/backgrounds/scalable-electrification-2560b-min.jpg)"></div>

    <div class="attract-loop-container">
        <div class="attract-loop">
            <video id="scalable-electrification" class="shadow" poster="" width="350" autoplay muted plays-inline loop>
                <source src="{{url('/public/front/media')}}/scalable-electrification.mp4" type="video/mp4"/>
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
                            poster="{{url('/public/front/content')}}/active-aerodynamics/media-splash.jpg">
                    </video>
                    <img src="{{url('/public/front/content')}}/active-aerodynamics/media-splash.jpg">
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
        <iframe src="https://magna-powertrain-web.com/"></iframe>
    </div>

    <img class="info-icon infoButton" src="{{url('/public/front')}}/img/info.png">
    <div id="popup-container"></div>

    <div id="orientation-alert"><p>Please rotate your device.</p></div>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/hotspots/scalable-electrification.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/mplayer-popup.js"></script>

    <script type="text/javascript">
        /* 1. set position of info buttons and video container */

        const video = document.querySelector('#scalable-electrification'),
            img_width = 2560,
            img_height = 1080,
            video_scale = 0.308,
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
            video.style.left = 'calc(50vw - ' + (video_width / 2 * unit_val) + unit + ')'
            video.style.top = 'calc(50vh - ' + ((video_height + 0.88) * unit_val) + unit + ')'

            info.style.position = 'absolute'
            info.style.width = '50px'
            info.style.height = '50px'
            info.style.left = 'calc(50vw - ' + ((video_width / 2 - video_width - 8.32) * unit_val) + unit + ')'
            info.style.top = 'calc(50vh - ' + ((video_height + 0.88 + 0.23) * unit_val) + unit + ')'
        }

        window.onresize = video_resize
        video_resize()

        /* 2. set mplayer popup */

        const popupMenus = {
            'Scalable Electrification': [
                {
                    menutitle: 'Scalable Electrification',
                    title: 'DHTeco',
                    video: "{{url('/videos')}}/scalable-electrification/1_Magna_DHTeco_Logo.mp4"
                },
                {
                    menutitle: 'Scalable Electrification',
                    title: 'eDS Low CE',
                    video: "{{url('/videos')}}/scalable-electrification/2_Magna_eDS_HV_low_CE.mp4"
                },
                {
                    menutitle: 'Scalable Electrification',
                    title: '7DCT300',
                    video: "{{url('/videos')}}/scalable-electrification/3_7dct300_noLogo.mp4"
                },
                {
                    menutitle: 'Scalable Electrification',
                    title: 'eDS Mid+ TV',
                    video: "{{url('/videos')}}/scalable-electrification/4_Magna_3D_eDS_HV_mid_2.5_TV.mp4"
                },
                {
                    menutitle: 'Scalable Electrification',
                    title: 'eDS 48V P4',
                    video: "{{url('/videos')}}/scalable-electrification/5_Magna_3D_eDS_48v.mp4"
                },
                {
                    menutitle: 'Scalable Electrification',
                    title: 'eDS Mid+',
                    video: "{{url('/videos')}}/scalable-electrification/6_Magna_eDS_HV_mid+HE.mp4"
                }
            ],
        }
        const openMplayerMethods = initMplayer(popupMenus)

        /* 3. set pdf popup */

        let dataA = {
            title_a: 'Scalable Electrification',
            subtitle_a: "Accelerating the Future",
            desc_a: 'Our powertrain innovators are passionate about bringing power to the wheels in a sustainable, environmentally conscious way. Experiment with our Powertrain Configurator to see how our hybrid and electric drive systems can be scaled to a variety of vehicle performance goals.',
            title_b: 'Registration Form',
            functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
            techs_b: ["Interactive Powertrain Configurator", "DHTeco Dedicated Hybrid Transmission", "eDS 48v P4 Electric Drive System​​", "eDS Low Cost Efficient Electric Drive System​", "eDS Mid+ Electric Drive System", "eDS Mid+ Torque Vectoring Electric Drive System", "7DCT300 Dual Clutch Transmission", "All"],
            techs_b_pdf: ["{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/pdf-sample.pdf", "{{url('/pdfs')}}/scalable-electrification/Magna_Scalable_Powertrain_Electrification.pdf"],
            bg_img_b: "{{url('/public/front')}}/img/backgrounds/Scalable-Electrification-pdf-bg-min.jpg"
        }
        $(".infoButton").click(() => {
            showPdfPopup(dataA)
        })
    </script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/iframe-popup.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/fade-nav.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/bg-dragger.js"></script>
    <script type="text/javascript">
        initFadedNavigation("{{url('/public/front')}}/img/backgrounds/scalable-electrification-blur.jpg")
    </script>

@endsection
