<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui"/>
    <title>Magna Virtual Showroom</title>

    <link href="{{url('/public/front')}}/img/favicon.ico" rel="shortcut icon">
    <style> @-ms-viewport {
            width: device-width;
        } </style>
    <link rel="stylesheet" href="{{url('/public/front')}}/vendor/reset.min.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/pano-style.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/info-popup.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/drawer.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/style.css">

</head>

<body class="multiple-scenes">

<a href="{{url('/')}}/pano"><img class="main-logo" src="{{url('/public/front')}}/img/magna-logo.png"></a>

<div id="pano"></div>

<!-- Reception -->
<video id="welcome-screen" width="749" height="421.57" class="screen shadow" style="background-color: white;"
       plays-inline muted autoplay loop>
    <source src="{{url('/public/front/media')}}/welcome-attract.mp4" type="video/mp4">
</video>

<img data-link-to="https://www.magna.com/company/careers" id="magna-careers" class="external-link-blank"
     src="{{url('/public/front')}}/content/welcome-desk/magna-careers.jpg">

<video data-link-to="{{url('/category')}}/complete-vehicles" id="complete-vehicles-screen-sm" width="" class="screen"
       muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/complete-vehicles-link.mp4" type="video/mp4">
</video>

<video data-link-to="{{url('/category')}}/seat-of-the-future" id="seat-of-the-future-screen-sm" width=""
       class="screen shadow" muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/seat-of-the-future-link.mp4" type="video/mp4">
</video>

<!-- Left -->
<!-- Body Exteriors -->
<video data-link-to="{{url('/category')}}/body-exteriors" id="body-exteriors-screen" class="screen" width="" muted
       autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/body-exteriors-link.mp4" type="video/mp4">
</video>

<img data-link-to="{{url('/category')}}/body-exteriors" id="body-exteriors-overlay" class="external-link"
     src="{{url('/public/front')}}/img/body-exteriors.png">

<!-- Complete Vehicles -->
<video data-link-to="{{url('/category')}}/complete-vehicles" id="complete-vehicles-screen" class="screen" width="" muted
       autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/complete-vehicles-link.mp4" type="video/mp4">
</video>

<!-- Seat of the Future -->
<video data-link-to="{{url('/category')}}/seat-of-the-future" id="seat-of-the-future-screen" class="screen shadow"
       width="" muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/seat-of-the-future-link.mp4" type="video/mp4">
</video>

<!-- Intelligent Lighting -->
<video data-link-to="{{url('/category')}}/intelligent-lighting" id="intelligent-lighting-screen" class="screen shadow"
       width="" muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/intelligent-lighting-link.mp4" type="video/mp4">
</video>

<img data-link-to="{{url('/category')}}/intelligent-lighting" id="intelligent-lighting-overlay"
     class="screen external-link" src="{{url('/public/front')}}/img/intelligent-lighting-overlay.png">

<!-- Right -->
<!-- Advanced Driver -->
<video data-link-to="{{url('/category')}}/advanced-driver" id="advanced-driver-screen" class="screen shadow" width=""
       muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/advanced-driver-link.mp4" type="video/mp4">
</video>

<img data-link-to="{{url('/category')}}/advanced-driver" id="advanced-driver-overlay" class="external-link"
     src="{{url('/public/front')}}/img/advanced-driver-overlay.png">

<!-- Active Aerodynamics -->
<video data-link-to="{{url('/category')}}/active-aerodynamics" id="active-aerodynamics-screen" class="screen shadow"
       width="" muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/active-aerodynamics-link.mp4" type="video/mp4">
</video>

<!-- Scalable Electrification -->
<video data-link-to="{{url('/category')}}/scalable-electrification" id="scalable-electrification-screen"
       class="screen shadow" width="" muted autoplay plays-inline loop>
    <source src="{{url('/public/front/media')}}/scalable-electrification-link.mp4" type="video/mp4">
</video>

<!-- SmartAccess -->
<video data-link-to="{{url('/category')}}/smartacesss" id="smartaccess-screen" class="screen" width="" muted autoplay
       plays-inline loop>
    <source src="{{url('/public/front/media')}}/smartaccess-link.mp4" type="video/mp4">
</video>

<div id="sceneList">
    <ul class="scenes">

        <a href="javascript:void(0)" class="scene" data-id="0-welcomedesk">
            <li class="text">Welcome Desk</li>
        </a>

        <a href="javascript:void(0)" class="scene" data-id="1-magnaleft360">
            <li class="text">West Wing</li>
        </a>

        <a href="javascript:void(0)" class="scene" data-id="2-magnaright360">
            <li class="text">East Wing</li>
        </a>

    </ul>
</div>

<div id="titleBar">
    <h1 class="sceneName"></h1>
</div>

<a href="javascript:void(0)" id="autorotateToggle">
    <img class="icon off" src="{{url('/public/front')}}/img/play.png">
    <img class="icon on" src="{{url('/public/front')}}/img/pause.png">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
    <img class="icon off" src="{{url('/public/front')}}/img/fullscreen.png">
    <img class="icon on" src="{{url('/public/front')}}/img/windowed.png">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
    <img class="icon off" src="{{url('/public/front')}}/img/expand.png">
    <img class="icon on" src="{{url('/public/front')}}/img/collapse.png">
</a>

<a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
    <img class="icon" src="{{url('/public/front')}}/img/up.png">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
    <img class="icon" src="{{url('/public/front')}}/img/down.png">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
    <img class="icon" src="{{url('/public/front')}}/img/left.png">
</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
    <img class="icon" src="{{url('/public/front')}}/img/right.png">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
    <img class="icon" src="{{url('/public/front')}}/img/plus.png">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
    <img class="icon" src="{{url('/public/front')}}/img/minus.png">
</a>

<label for="menu-opener" role="button" class="open-menu-drawer"></label>
<input type="checkbox" data-menu id="menu-opener" hidden>
<aside class="menu-drawer">
    <div></div>
    <nav class="menu">
        <div>
            <a href="{{url('/')}}" class="active">Welcome Area<br>& Explore Magna Careers</a>
            <a href="{{url('/')}}/active-aerodynamics">Active Aerodynamics</a>
            <a href="{{url('/')}}/advanced-driver">Advanced Driver Assistance Systems</a>
            <a href="{{url('/')}}/body-exteriors">Body Exteriors & Structures</a>
            <a href="{{url('/')}}/complete-vehicles">Complete Vehicles</a>
            <a href="{{url('/')}}/intelligent-lighting">Intelligent Lighting</a>
            <a href="{{url('/')}}/mechatronics">Mechatronics</a>
            <a href="{{url('/')}}/scalable-electrification">Scalable Electrification</a>
            <a href="{{url('/')}}/seat-of-the-future">Seat of the Future</a>
        </div>
    </nav>
    <label for="menu-opener" class="menu-overlay">
        <img src="{{url('/public/front')}}/img/close-blk.png">
    </label>
</aside>

<div id="orientation-alert"><p>Please rotate your device.</p></div>

<div id="popup-container"></div>

<script src="{{url('/public/front')}}/vendor/es5-shim.js"></script>
<script src="{{url('/public/front')}}/vendor/eventShim.js"></script>
<script src="{{url('/public/front')}}/vendor/classList.js"></script>
<script src="{{url('/public/front')}}/vendor/requestAnimationFrame.js"></script>
<script src="{{url('/public/front')}}/vendor/screenfull.min.js"></script>
<script src="{{url('/public/front')}}/vendor/bowser.min.js"></script>
<script src="{{url('/public/front')}}/vendor/marzipano.js"></script>

<script type="text/javascript" src="{{url('/public/front')}}/js/info-popup.js"></script>
<script src="{{url('/public/front')}}/js/pano-data.js"></script>
<script src="{{url('/public/front')}}/js/pano-index.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ricostacruz.com/jquery.transit/jquery.transit.min.js'></script>
<script src="{{url('/public/front')}}/js/fade-nav.js"></script>

<script type="text/javascript">
    (() => {
        $('video').click((e) => {
            let href = e.target.getAttribute("data-link-to")
            if (href)
                $("body").fadeTo(360, 0, function () {
                    location = href
                    return false
                })
        })
        $('.external-link').click((e) => {
            let href = e.target.getAttribute("data-link-to")
            if (href)
                $("body").fadeTo(360, 0, function () {
                    location = href
                    return false
                })
        })

    })()
</script>

<script>
    var tableRows = document.getElementsByClassName('external-link-blank');

    for (var i = 0, ln = tableRows.length; i < ln; i++) {
        tableRows[i].addEventListener('click', function () {
            window.open(this.getAttribute('data-link-to'), this.getAttribute('data-target'));
        });
    }
</script>

<script type="text/javascript">
    const welcomeVideo = document.querySelector('#welcome-screen')
    welcomeVideo.onclick = () => {
        welcomeVideo.src = "{{url('/public/front/media')}}/welcome.mp4"
        welcomeVideo.controls = true
        welcomeVideo.muted = undefined
        welcomeVideo.loop = undefined
        welcomeVideo.onended = () => {
            welcomeVideo.onended = () => {
            }
            welcomeVideo.src = "{{url('/public/front/media')}}/welcome-attract.mp4"
            welcomeVideo.controls = undefined
            welcomeVideo.muted = true
            welcomeVideo.loop = true
        }
    }
</script>

<script type="text/javascript">
    initFadedNavigation()

    const welcomeRightImage = document.querySelector('#magna-careers')
    $('#magna-careers').fadeTo(3000, 0, () => {
        $('#magna-careers').fadeTo(720, 1)
    })
</script>

</body>
</html>
