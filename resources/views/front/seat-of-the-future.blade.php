@extends('front.layout.master')
@section('Content')

    <div class="container" style="background-image:url({{url('/public/front')}}/img/backgrounds/seat-of-the-future-2560b-alt-2-min.jpg)"></div>

    <div class="attract-loop-container" id="seat-of-the-future-container">
        <div class="attract-loop">
            <video id="seat-of-the-future" class="shadow" poster="" width="350" autoplay muted plays-inline loop>
                <source src="{{url('/public/front/media')}}/seat-of-the-future.mp4" type="video/mp4"/>
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

    <img class="info-icon infoButton" src="{{url('/public/front')}}/img/info.png">
    <div id="popup-container"></div>

    <div id="orientation-alert"><p>Please rotate your device.</p></div>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/hotspots/seat-of-the-future.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/mplayer-popup.js"></script>

    <script type="text/javascript">
        const video = document.querySelector('#seat-of-the-future'),
            img_width = 2560,
            img_height = 1080,
            video_scale = 0.308,
            video_width = 88.8 * video_scale,
            video_height = 50.0 * video_scale,
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
            video.style.left = 'calc(50vw - ' + ((video_width - 6) * unit_val) + unit + ')'
            video.style.top = 'calc(50vh - ' + ((video_height + 5) * unit_val) + unit + ')'

            info.style.position = 'absolute'
            info.style.width = '50px'
            info.style.height = '50px'
            info.style.left = 'calc(50vw - ' + (-9.1 * unit_val) + unit + ')'
            info.style.top = 'calc(50vh - ' + (12.44 * unit_val) + unit + ')'
            document.querySelector('#seat-of-the-future-container').style.perspective = '' + 32 * unit_val + unit
        }

        window.onresize = video_resize
        video_resize()


        /* 2. set mplayer popup */

        const popupMenus = {
            'FREEFORM™ Seat Trim Technique': [
                {
                    title: 'Technology Overview',
                    video: "{{url('/videos')}}/seat-of-the-future/FreeForm_Technology_Overview.mp4",
                    description: 'Magna FREEFORM™ is an innovative new seat trim cover technique that provides OEMs with a single, smooth, seamless styling surface with hidden tiedowns. It enables the freedom to achieve endless design possibilities, high seat concavity, improved seat back comfort and enhanced cleanability, making FREEFORM™ technology the ideal foam and trim solution for the seats of the future.'
                },
                {title: 'Free Your Biceps', video: "{{url('/videos')}}/seat-of-the-future/Free_your_biceps.mp4"},
                {
                    title: 'Free Yourself From Crumbs',
                    video: "{{url('/videos')}}/seat-of-the-future/Free_yourself_from_crumbs.mp4"
                },
                {
                    title: 'Free Yourself From Traditional Designs',
                    video: "{{url('/videos')}}/seat-of-the-future/Traditional_Designs.mp4"
                },
                {
                    title: 'Free Yourself From Discomfort',
                    video: "{{url('/videos')}}/seat-of-the-future/Free_yourself_from_discomfort.mp4"
                },
                {
                    title: 'Free Yourself From Cramped Legs',
                    video: "{{url('/videos')}}/seat-of-the-future/Free_yourself_from_cramped_legs.mp4"
                },
                {title: 'FREEFORM Tech Sheet', techsheet: "{{url('/public/front/content')}}/seat-of-the-future/FREEFORM_Tech_Sheet.jpg"}
            ],
            'Reconfigurable Seating': [
                {grouptitle: 'Reconfigurable Seating'},
                {
                    title: 'Cargo Mode',
                    video: "{{url('/videos')}}/seat-of-the-future/CARGO_1.mp4",
                    subtitle: 'Flexibility to haul all your stuff'
                },
                {
                    title: 'in Action',
                    video: "{{url('/videos')}}/seat-of-the-future/CARGO_2.mp4",
                    subtitle: 'Flexibility to haul all your stuff'
                },
                {
                    title: 'Campfire Mode',
                    video: "{{url('/videos')}}/seat-of-the-future/CAMPFIRE_1.mp4",
                    subtitle: 'Spending more time with friends and family'
                },
                {
                    title: 'in Action',
                    video: "{{url('/videos')}}/seat-of-the-future/CAMPFIRE_2.mp4",
                    subtitle: 'Spending more time with friends and family'
                },
                {
                    title: 'Conference Mode',
                    video: "{{url('/videos')}}/seat-of-the-future/CONFERENCE_1.mp4",
                    subtitle: 'Productivity in the car just got a lot easier'
                },
                {
                    title: 'in Action',
                    video: "{{url('/videos')}}/seat-of-the-future/CONFERENCE_2.mp4",
                    subtitle: 'Productivity in the car just got a lot easier'
                },

                {grouptitle: 'See in Action'},
                {title: 'Tech Sheet: IP Nesting', techsheet: "{{url('/content')}}/seat-of-the-future/IP_Nesting.jpg"},
                {title: 'Tech Sheet: Long Rails', techsheet: "{{url('/content')}}/seat-of-the-future/Long_Rails.jpg"},
                {title: 'Tech Sheet: Stadium Swivel', techsheet: "{{url('/content')}}/seat-of-the-future/Stadium_Swivel_Seat.jpg"}
            ],
            'Seat of the Future': [
                {
                    title: 'Next Generation Reconfigurable Seating',
                    video: "{{url('/videos')}}/seat-of-the-future/1_Next_Generation_Reconfigurable_Seating.mp4"
                },
                {title: 'Control Your Time', video: "{{url('/videos')}}/seat-of-the-future/2_Control_Your_Time.mp4"},
                {title: "It's About Time", video: "{{url('/videos')}}/seat-of-the-future/3_Its_About_Time.mp4"},
                {title: 'Time for Possibilities ', video: "{{url('/videos')}}/seat-of-the-future/4_Time_for_Possibilities.mp4"},
                {title: 'Time to Reconnect', video: "{{url('/videos')}}/seat-of-the-future/5_Time_to_Reconnect.mp4"}
            ]
        }
        const openMplayerMethods = initMplayer(popupMenus)
        video.onclick = () => {
            openMplayerMethods[2]()[0]()
        }


        /* 3. set pdf popup */

        let dataA = {
            title_a: 'Seat of the Future',
            subtitle_a: "Pushing Boundaries in Automotive Seating",
            desc_a: 'Our seating experts are making dreams become reality with the latest developments in reconfigurable seating and seat trim techniques while enhancing comfort, cleanability and styling. Take a seat…and experience our revolutionary innovations.',
            title_b: 'Registration Form',
            functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
            techs_b: ["FREEFORM™", "IP Nesting", "Long Rails", "Stadium Swivel Seat"],
            bg_img_b: "{{url('/public/front')}}/img/backgrounds/Seat-of-the-Future-pdf-bg-min.jpg"
        }
        $(".infoButton").click(() => {
            showPdfPopup(dataA)
        })
    </script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/fade-nav.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/bg-dragger.js"></script>
    <script type="text/javascript">
        initFadedNavigation("{{url('/public/front')}}/img/backgrounds/seat-of-the-future-blur.jpg")
    </script>

@endsection
