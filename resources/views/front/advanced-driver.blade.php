@extends('front.layout.master')
@section('Content')

    <div class="container" style="background-image:url({{url('/public/front')}}/img/backgrounds/advanced-driver-2560b-min.jpg)"></div>
<div class="attract-loop-container-overlay"
     style="background-image:url({{url('/public/front')}}/img/backgrounds/advanced-driver-overlay-2560.png); left: 140px; top: 10px; filter: drop-shadow(2px 4px 36px black);"></div>

<div class="attract-loop-container">
    <div class="attract-loop">
        <video id="advanced-driver" class="shadow" poster="" width="350" autoplay muted plays-inline loop>
            <source src="{{url('/public/front/media')}}/advanced-driver.mp4" type="video/mp4"/>
        </video>
    </div>
</div>

<!-- BEGIN SIDE_GAR -->
@include('front.layout._sidebar')
<!-- END SIDE_BAR -->

<div id="iframe-popup" class="popup">
    <div class="titlebar">
        <img class="popup-close" src="{{url('/public/front')}}/img/close-red.png">
    </div>
    <iframe src="https://magna-adas-web.com/"></iframe>
</div>

<img class="info-icon infoButton" src="{{url('/public/front')}}/img/info.png">
<div id="popup-container"></div>

<div id="orientation-alert"><p>Please rotate your device.</p></div>

<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript" src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>

<script type="text/javascript">
    /* 1. set position of info buttons and video container */

    const video = document.querySelector('#advanced-driver'),
        img_width = 2560,
        img_height = 1080,
        video_scale = 0.55,
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
        video.style.left = 'calc(50vw - ' + (video_width / 2.01 * unit_val) + unit + ')'
        video.style.top = 'calc(50vh - ' + ((video_height - 10.8) * unit_val) + unit + ')'
        video.style.margin = '0'

        info.style.position = 'absolute'
        info.style.width = '50px'
        info.style.height = '50px'
        info.style.left = 'calc(50vw - ' + ((video_width / 2.01 - video_width + 0.88) * unit_val) + unit + ')'
        info.style.top = 'calc(50vh - ' + ((video_height - 10.8 + 3.82) * unit_val) + unit + ')'
    }

    window.onresize = video_resize
    video_resize()


    /* 3. set pdf popup */

    let dataA = {
        title_a: 'Advanced Driver Assistance Systems',
        subtitle_a: "Enhancing Safety, Reducing Driving Stress",
        desc_a: 'Our Advanced Driver Assistance Systems are on over 250 vehicle models on the road, changing how we move, work and play – take a look at our products that enable the features for the semi-automated driving future.',
        title_b: 'Registration Form',
        functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
        techs_b: ["Domain Controller", "Icon Radar", "LiDAR", "R-AEB", "Trailer 360 Views", "Trailer Hitch Assist", "Trailer See Through Technology", "All"],
        techs_b_pdf: ["{{url('/pdfs')}}/advanced-driver/Domain_Controller.pdf", "{{url('/pdfs')}}/advanced-driver/Icon_Radar.pdf", "{{url('/pdfs')}}/advanced-driver/LiDAR.pdf", "{{url('/pdfs')}}/advanced-driver/R-AEB.pdf", "{{url('/pdfs')}}/advanced-driver/Trailer_360_Views.pdf", "{{url('/pdfs')}}/advanced-driver/Trailer_Hitch_Assist.pdf", "{{url('/pdfs')}}/advanced-driver/Trailer_See_Through_Technology.pdf", "{{url('/pdfs')}}/advanced-driver/Magna_ADAS.pdf"],
        bg_img_b: "{{url('/public/front')}}/img/backgrounds/Advanced-Driver-Assistance-Systems-pdf-bg-min.jpg"
    }
    $(".infoButton").click(() => {
        showPdfPopup(dataA)
    })
</script>
<script type="text/javascript" src="{{url('/public/front')}}/js/iframe-popup.js"></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/fade-nav.js"></script>
<script type="text/javascript" src="{{url('/public/front')}}/js/bg-dragger.js"></script>
<script type="text/javascript">
    initFadedNavigation("{{url('/public/front')}}/img/backgrounds/advanced-driver-blur.jpg")
</script>

@endsection
