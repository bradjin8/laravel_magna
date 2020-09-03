@extends('front.layout.master')
@section('Content')

    <div class="container"
         style="background-image:url({{url('/public/front')}}/img/backgrounds/body-exteriors-2560b-min.jpg)"></div>
    <div class="attract-loop-container-overlay"
         style="background-image:url({{url('/public/front')}}/img/backgrounds/body-exteriors-overlay-2560.png)"></div>


    <div class="attract-loop-container">
        <div class="attract-loop">
            <video id="body-exteriors" class="" poster="" width="350" autoplay muted plays-inline loop>
                <source src="{{url('/public/front/media')}}/body-exteriors.mp4" type="video/mp4"/>
            </video>
        </div>
    </div>


    @include('front.layout._sidebar')

    <div id="iframe-popup" class="popup">
        <div class="titlebar">
            <img class="popup-close" src="{{url('/public/front')}}/img/close-red.png">
        </div>
        <iframe src="https://magna-lightweighting-web.com/"></iframe>
    </div>

    <img class="info-icon infoButton" src="{{url('/public/front')}}/img/info.png">
    <div id="popup-container"></div>

    <div id="orientation-alert"><p>Please rotate your device.</p></div>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>

    <script type="text/javascript">
        /* 1. set position of info buttons and video container */

        const video = document.querySelector('#body-exteriors'),
            img_width = 2560,
            img_height = 1080,
            video_scale = 0.255,
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
            video.style.left = 'calc(50vw - ' + (video_width / 1.62 * unit_val) + unit + ')'
            video.style.top = 'calc(50vh - ' + ((video_height - 4.53) * unit_val) + unit + ')'

            info.style.position = 'absolute'
            info.style.width = '50px'
            info.style.height = '50px'
            info.style.left = 'calc(50vw - ' + (-17.4 * unit_val) + unit + ')'
            info.style.top = 'calc(50vh - ' + (15.41 * unit_val) + unit + ')'
        }

        window.onresize = video_resize
        video_resize()


        /* 3. set pdf popup */

        let dataA = {
            title_a: 'Body Exteriors & Structures',
            subtitle_a: "Lightweighting the Future Together",
            desc_a: 'Offering multiple material solutions that enable the right material for the right place to help our customers make intelligent lightweighting decisions.',
            title_b: 'Registration Form',
            functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
            techs_b: ["Lightweightingr"],
            bg_img_b: "{{url('/public/front')}}/img/backgrounds/Body-Exteriors-Structures-pdf-bg-min.jpg"
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
