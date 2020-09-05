@extends('front.layout.master')
@section('Content')

    <div class="container" style="background-image:url({{url('/public/front')}}/img/backgrounds/intelligent-lighting-2560b-min.jpg)"></div>
    <div class="attract-loop-container-overlay"
         style="background-image:url({{url('/public/front')}}/img/backgrounds/intelligent-lighting-overlay-2560.png);"></div>

    <div class="attract-loop-container">
        <div class="attract-loop">
            <video id="intelligent-lighting" class="shadow" poster="" width="350" autoplay muted plays-inline loop>
                <source src="{{url('/public/front/media')}}/intelligent-lighting.mp4" type="video/mp4"/>
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
                            poster="{{url('/public/front')}}/media/active-aerodynamics/media-splash.jpg">
                    </video>
                    <img src="{{url('/public/front')}}/media/active-aerodynamics/media-splash.jpg">
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
    <script type="text/javascript" src="{{url('/public/front')}}/js/hotspots/intelligent-lighting.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/mplayer-popup.js"></script>

    <script type="text/javascript">
        /* 1. set position of info buttons and video container */

        const video = document.querySelector('#intelligent-lighting'),
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
            video.style.left = 'calc(50vw - ' + (video_width / 2.2 * unit_val) + unit + ')'
            video.style.top = 'calc(50vh - ' + ((video_height + 0.88) * unit_val) + unit + ')'

            info.style.position = 'absolute'
            info.style.width = '50px'
            info.style.height = '50px'
            info.style.left = 'calc(50vw - ' + (-24.2 * unit_val) + unit + ')'
            info.style.top = 'calc(50vh - ' + (14.24 * unit_val) + unit + ')'
        }

        window.onresize = video_resize
        video_resize()


        /* 2. set mplayer popup */

        const popupMenus = {
            'Forward Lighting': [
                {
                    menutitle: 'Forward Lighting',
                    title: 'Forward Spotlight',
                    image: "{{url('/content')}}/intelligent-lighting/Forward_Spotlight.jpg",
                    subtitle: 'Forward Spotlight',
                    description: 'An auxiliary LED light module integrated into the front of a mirror housing that provides light forward and sideways from the vehicle​.'
                },
                {
                    title: 'Invision™ Adaptive Driving Beam',
                    image: "{{url('/content')}}/intelligent-lighting/Invision.jpg",
                    video: "{{url('/videos')}}/intelligent-lighting/Invision.mp4",
                    subtitle: 'Invision™ Adaptive Driving Beam',
                    description: ' INVISION™ adaptive driving beam removes glare from oncoming drivers while supplying additional illumination.'
                }
            ],
            'Decorative Lighting': [
                {
                    menutitle: 'Decorative Lighting',
                    title: 'Comprehensive Decorative Portfolio',
                    image: "{{url('/content')}}/intelligent-lighting/Lit_Trim.jpg",
                    subtitle: 'Comprehensive Decorative Portfolio',
                    description: 'Comprehensive portfolio of illuminated exterior trim and lighting technologies enabling OEM brand differentiation.'
                },
                {
                    title: 'LumiGrille',
                    video: "{{url('/videos')}}/intelligent-lighting/LumiGrille.mp4",
                    subtitle: 'LumiGrille',
                    description: 'Reimagined grille with innovative FLECSFORM™ lighting technology enabling a thin, hidden-until-lit panel.'
                },
                {
                    title: 'Decorative Lit Surface',
                    video: "{{url('/videos')}}/intelligent-lighting/Decorative_Lit_Surface_Animation.mp4",
                    subtitle: 'Decorative Lit Surface',
                    description: 'Surface illumination of multiple decorative finished parts. Lit decoration using new Magna processes and strategic materials to create lit graphics for logos or custom patterns.'
                },
                {
                    title: 'Projection Logo / Ground Illumination',
                    image: "{{url('/content')}}/intelligent-lighting/Projection_Logo_Ground_Illumination.jpg",
                    video: "{{url('/videos')}}/intelligent-lighting/Projection_Logo_Ground_Illumination.mp4",
                    subtitle: 'Projection Logo / Ground Illumination',
                    description: 'LED projection lighting and ground illumination solutions allowing for improved design, increased safety and OEM brand differentiation.'
                }
            ],
            'Communication Lighting': [
                {
                    menutitle: 'Communication Lighting',
                    title: 'In-Glass Interactive Touch',
                    video: "{{url('/videos')}}/intelligent-lighting/In-Glass_Interactive_Touch.mp4",
                    subtitle: 'In-Glass Interactive Touch',
                    description: 'Combination of transparent displays and touch controls on exterior glass surfaces.'
                },
                {
                    title: 'Lit Pillar Applique',
                    image: "{{url('/content')}}/intelligent-lighting/Lit_Pillar_Applique.jpg",
                    subtitle: 'Lit Pillar Applique',
                    description: 'Integration of light into B-pillar applique to provide functionality and HMI user interface such as: charge indicator, vehicle access and additional vehicle status communication'
                },
                {
                    title: 'Mirror Turn Signal',
                    image: "{{url('/content')}}/intelligent-lighting/Turn_Signal_Clearance.jpg",
                    subtitle: 'Mirror Turn Signal',
                    description: 'Outside mirrors featuring integrated turn signals provide increased safety.'
                }
            ],
            'Interior Lighting': [
                {
                    menutitle: 'Interior Lighting',
                    title: 'FLECSFORM™',
                    video: "{{url('/videos')}}/intelligent-lighting/Flecsform.mp4",
                    subtitle: 'FLECSFORM™',
                    description: 'FLECSFORM™ utilizes micro LEDs on flexible ciruits to enable thinner, more efficient lighting solutions that enhance styling.'
                },
                {
                    title: 'ISELED',
                    image: "{{url('/content')}}/intelligent-lighting/ISELED.jpg",
                    subtitle: 'ISELED',
                    description: 'Using RGB LEDs ISELED offers dynamic cabin ambience lighting.'
                }
            ],
            'Rear Lighting': [
                {
                    menutitle: 'Rear Lighting',
                    title: 'Evenly Lit Function',
                    image: "{{url('/content')}}/intelligent-lighting/Evenly_Lit_Function.jpg",
                    subtitle: 'Evenly Lit Function',
                    description: 'Homogenous styling appearance that meets OEM requirements.'
                },
                {
                    title: 'FLECSFORM™',
                    image: "{{url('/content')}}/intelligent-lighting/flecsform.jpg",
                    subtitle: 'FLECSFORM™',
                    description: 'FLECSFORM™ utilizes micro LEDs on a flexible circuit to enable thinner, more efficient lighting solutions that enhance styling.'
                },
                {
                    title: 'Integrated CHMSL Lighting',
                    image: "{{url('/content')}}/intelligent-lighting/Integrated_CHMSL_Lighting.jpg",
                    subtitle: 'Integrated CHMSL Lighting',
                    description: 'Addition of exterior and/or interior lighting to rear truck windows.'
                },
                {
                    title: 'OLED',
                    image: "{{url('/content')}}/intelligent-lighting/OLED.jpg",
                    subtitle: 'OLED',
                    description: 'OLED panels provide flexible homogenous lighting allowing for new styling opportunities.'
                },
                {
                    title: 'Mirror Reverse Light',
                    image: "{{url('/content')}}/intelligent-lighting/Reverse_Light.jpg",
                    subtitle: 'Reverse Light',
                    description: 'Outside Mirror with supplemental reverse lighting. Meets consumer demand for better exterior lighting.​'
                },
                {
                    title: 'Surface Element Lighting',
                    image: "{{url('/content')}}/intelligent-lighting/Surface_Element_Lighting.jpg",
                    subtitle: 'Surface Element',
                    description: 'Lighting panels based on LED technology provide high intensity homogenous light at lower cost and higher reliability than OLED.'
                }
            ],
            'Magna Rohinni': [
                {
                    menutitle: 'Intelligent Lighting',
                    title: 'Magna Rohinni',
                    video: "{{url('/videos')}}/intelligent-lighting/Magna_Rohinni.mp4",
                    subtitle: 'Magna Rohinni'
                }
            ]
        }
        const openMplayerMethods = initMplayer(popupMenus)
        video.onclick = () => {
            openMplayerMethods[5]()[0]()
        }


        /* 3. set pdf popup */

        let dataA = {
            title_a: 'Intelligent Lighting',
            subtitle_a: "Setting Light in Motion",
            desc_a: 'We have a number of advanced lighting solutions to meet the needs of today while illuminating the path for tomorrow.',
            title_b: 'Registration Form',
            functions_b: ["Engineering", "Purchasing", "Product Development", "Marketing", "Other"],
            techs_b: ["Comprehensive Decorative Portfolio", "Decorative Lit Surface", "FLECSFORM™", "In-Glass Interactive Touch", "Integrated CHMSL Lighting", "Lighting Technologies", "Lit Pillar Applique", "LumiGrille", "Mirror Technologies", "All"],
            techs_b_pdf: ["{{url('/pdfs')}}/intelligent-lighting/Comprehensive_Decorative_Portfolio.pdf", "{{url('/pdfs')}}/intelligent-lighting/Decorative_Lit_Surface.pdf", "{{url('/pdfs')}}/intelligent-lighting/Flecsform.pdf", "{{url('/pdfs')}}/intelligent-lighting/In-Glass_Interactive_Touch.pdf", "{{url('/pdfs')}}/intelligent-lighting/Integrated_CHMSL_Lighting.pdf", "{{url('/pdfs')}}/intelligent-lighting/Lighting_Technologies.pdf", "{{url('/pdfs')}}/intelligent-lighting/Lit_Pillar_Applique.pdf", "{{url('/pdfs')}}/intelligent-lighting/LumiGrille.pdf", "{{url('/pdfs')}}/intelligent-lighting/Mirror_Technologies.pdf", "{{url('/pdfs')}}/intelligent-lighting/Magna_Intelligent_Lighting.pdf"],
            bg_img_b: "{{url('/public/front')}}/img/backgrounds/Intelligent-Lighting-pdf-bg-min.jpg"
        }
        $(".infoButton").click(() => {
            showPdfPopup(dataA)
        })
    </script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/fade-nav.js"></script>
    <script type="text/javascript" src="{{url('/public/front')}}/js/bg-dragger.js"></script>
    <script type="text/javascript">
        initFadedNavigation("{{url('/public/front')}}/img/backgrounds/intelligent-lighting-blur.jpg")
    </script>

@endsection