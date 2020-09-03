@extends('front.layout.master')
@section('Content')

<div class="container" style="background-image:url({{url('/public/front')}}/img/backgrounds/mechatronics-2560b-min.jpg)"></div>


@include('front.layout._sidebar')

<img class="info-icon-first infoButton infoButtonA" src="{{url('/public/front')}}/img/info.png">
<img class="info-icon-second infoButton infoButtonB" src="{{url('/public/front')}}/img/info.png">
<img class="info-icon-third infoButton infoButtonC" src="{{url('/public/front')}}/img/info.png">

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
                        poster="{{url('/public/front')}}/media/active-aerodynamics/media-splash.jpg">
                </video>
                <img src="{{url('/public/front')}}/media/active-aerodynamics/media-splash.jpg">
            </div>
            <h3 class="dark">Video Subtitle</h3>
            <p class="light">Video description</p>
        </div>
    </div>
</div>

<div id="popup-container"></div>

<div id="orientation-alert"><p>Please rotate your device.</p></div>

<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript" src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/hotspots/mechatronics.js"></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/mplayer-popup.js"></script>
<script type="text/javascript">
    /* 1. set position of info buttons and video container */

    const infoA = document.querySelector('.info-icon-first'),
        infoB = document.querySelector('.info-icon-second'),
        infoC = document.querySelector('.info-icon-third'),
        img_width = 2560,
        img_height = 1080

    const video_resize = () => {
        let unit, unit_val
        if (window.innerHeight / window.innerWidth > img_height / img_width) {
            unit = 'vh'
            unit_val = img_width / img_height
        } else {
            unit = 'vw'
            unit_val = 1.0
        }
        infoA.style.position = 'absolute'
        infoA.style.width = '50px'
        infoA.style.height = '50px'
        infoA.style.left = 'calc(50vw - ' + (21.0 * unit_val) + unit + ')'
        infoA.style.top = 'calc(50vh - ' + (10.58 * unit_val) + unit + ')'
        infoB.style.position = 'absolute'
        infoB.style.width = '50px'
        infoB.style.height = '50px'
        infoB.style.left = 'calc(50vw - ' + (0.63 * unit_val) + unit + ')'
        infoB.style.top = 'calc(50vh - ' + (12.2 * unit_val) + unit + ')'
        infoC.style.position = 'absolute'
        infoC.style.width = '50px'
        infoC.style.height = '50px'
        infoC.style.left = 'calc(50vw - ' + (-24.71 * unit_val) + unit + ')'
        infoC.style.top = 'calc(50vh - ' + (19.0 * unit_val) + unit + ')'
    }

    window.onresize = video_resize
    video_resize()


    /* 2. set mplayer popup */

    const popupMenus = {
        'ClearView': [
            {
                menutitle: 'Mechatronics',
                title: 'ClearView Vision',
                video: "{{url('/videos')}}/mechatronics/clearview/Magna_ADAS_IAA19_DigitalRearVision_v016.mp4"
            }
        ],
        'Driver Monitoring System': [
            {
                menutitle: 'Driver Monitoring System',
                title: 'Overview',
                video: "{{url('/videos')}}/mechatronics/driver-monitoring/Driver_Monitoring_System_Overview.mp4"
            },
            {
                title: 'Scenario One',
                video: "{{url('/videos')}}/mechatronics/driver-monitoring/See_in_Action_1.mp4",
                issubitem: true
            },
            {
                title: 'Scenario Two',
                video: "{{url('/videos')}}/mechatronics/driver-monitoring/See_in_Action_2.mp4",
                issubitem: true
            },
            {
                title: 'Scenario Three',
                video: "{{url('/videos')}}/mechatronics/driver-monitoring/See_in_Action_3.mp4",
                issubitem: true
            },
            {
                title: 'Scenario Four',
                video: "{{url('/videos')}}/mechatronics/driver-monitoring/See_in_Action_4.mp4",
                issubitem: true
            }
        ],
        'Smart Access': [
            {
                menutitle: 'Smart Access',
                title: 'Overview',
                image: "{{url('/public/front')}}/content/mechatronics/smart-access/smart-access-overview-min.jpg"
            },
            {title: 'Power Strut', techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Power_Strut.jpg"},
            {title: 'Power Liftgate ECU', techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Power_Liftgate_ECU.jpg"},
            {title: 'Anti Pinch Sensor', techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Anti_Pinch_Strip.jpg"},
            {title: 'Hinge', techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Liftgate_Hinge.jpg"},
            {
                title: 'Short Range Radar',
                techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Short_Range_Radar.jpg",
                video: "{{url('/videos')}}/mechatronics/smart-access/Short_Range_Radar.mp4"
            },
            {title: 'Handle', techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Liftgate_Handle.jpg"},
            {title: 'Integrated Cinch Latch', techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/G3_Liftgate_Latch.jpg"},
            {
                title: 'Radar Access Sensor',
                techsheet: "{{url('/public/front')}}/content/mechatronics/smart-access/Radar_Access_Sensor.jpg",
                video: "{{url('/videos')}}/mechatronics/smart-access/Radar_Access_Sensor.mp4"
            }
        ]
    }
    const openMplayerMethods = initMplayer(popupMenus)


    /* 3. set pdf popup */

    let dataA = {
        title_a: 'ClearView Vision',
        subtitle_a: "Seeing the Way Forward",
        desc_a: 'Our innovative vision systems combine our expertise in electronic and mirrors, offering increased safety features, more styling possibilities – and reflecting our unique way of looking at the automotive future.',
        title_b: 'Overlay 1 - 2',
        functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
        techs_b: ["Clearview - Complete System"],
        bg_img_b: "{{url('/public/front')}}/img/backgrounds/Clearview-Vision-pdf-bg-min.jpg"
    }
    $(".infoButtonA").click(() => {
        showPdfPopup(dataA)
    })

    let dataB = {
        title_a: 'Driver Monitoring',
        subtitle_a: "Putting the Brakes on Distracted Driving",
        desc_a: 'We’ve developed high-tech features, and complete product-intent solutions that alert a driver to danger without adding to distractions',
        title_b: 'Overlay 2 - 2',
        functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
        techs_b: ["Driver Monitoring System"],
        bg_img_b: "{{url('/public/front')}}/img/backgrounds/Driver-Monitoring-pdf-bg-min.jpg"
    }
    $(".infoButtonB").click(() => {
        showPdfPopup(dataB)
    })
    $(".infoButtonA").click(() => {
        showPdfPopup(dataA)
    })

    let dataC = {
        title_a: 'Smart Access™',
        subtitle_a: "Unlocking Consumer Comfort and Convenience",
        desc_a: 'The best minds at Magna are creating Mechatronics systems that make accessing a vehicle easier and more intuitive.',
        title_b: 'Registration Form',
        functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
        techs_b: ["Anti Pinch Strip", "Liftgate Handle", "Liftgate Hinge", "Power Liftgate ECU", "Power Strut", "Radar Access Sensor", "Short Range Radar"],
        bg_img_b: "{{url('/public/front')}}/img/backgrounds/Smart-Access-pdf-bg-min.jpg"
    }
    $(".infoButtonC").click(() => {
        showPdfPopup(dataC)
    })
</script>
<script type="text/javascript" src="{{url('/public/front')}}/js/fade-nav.js"></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/bg-dragger.js"></script>
<script type="text/javascript">
    initFadedNavigation("{{url('/public/front')}}/img/backgrounds/mechatronics-blur.jpg")
</script>

@endsection
