/*
 * Copyright 2016 Google Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
'use strict';

(function() {
    var Marzipano = window.Marzipano;
    var bowser = window.bowser;
    var screenfull = window.screenfull;
    var data = window.APP_DATA;

    // Grab elements from DOM.
    var panoElement = document.querySelector('#pano');
    var sceneNameElement = document.querySelector('#titleBar .sceneName');
    var sceneListElement = document.querySelector('#sceneList');
    var sceneElements = document.querySelectorAll('#sceneList .scene');
    var sceneListToggleElement = document.querySelector('#sceneListToggle');
    var autorotateToggleElement = document.querySelector('#autorotateToggle');
    var fullscreenToggleElement = document.querySelector('#fullscreenToggle');

    // Detect desktop or mobile mode.
    if (window.matchMedia) {
        var setMode = function() {
            if (mql.matches) {
                document.body.classList.remove('desktop');
                document.body.classList.add('mobile');
            } else {
                document.body.classList.remove('mobile');
                document.body.classList.add('desktop');
            }
        };
        var mql = matchMedia("(max-width: 500px), (max-height: 500px)");
        setMode();
        mql.addListener(setMode);
    } else {
        document.body.classList.add('desktop');
    }

    // Detect whether we are on a touch device.
    document.body.classList.add('no-touch');
    window.addEventListener('touchstart', function() {
        document.body.classList.remove('no-touch');
        document.body.classList.add('touch');
    });

    // Use tooltip fallback mode on IE < 11.
    if (bowser.msie && parseFloat(bowser.version) < 11) {
        document.body.classList.add('tooltip-fallback');
    }

    // Viewer options.
    var viewerOpts = {
        controls: {
            mouseViewMode: data.settings.mouseViewMode
        }
    };

    // Initialize viewer.
    var viewer = new Marzipano.Viewer(panoElement, viewerOpts);

    // Create scenes.
    var scenes = data.scenes.map(function(data) {
        var urlPrefix = "/public/front/tiles";
        var source = Marzipano.ImageUrlSource.fromString(
            urlPrefix + "/" + data.id + "/{z}/{f}/{y}/{x}.jpg",
            { cubeMapPreviewUrl: urlPrefix + "/" + data.id + "/preview.jpg" });
        var geometry = new Marzipano.CubeGeometry(data.levels);

        var limiter = Marzipano.RectilinearView.limit.traditional(data.faceSize, 70*Math.PI/180, 120*Math.PI/180);
        var view = new Marzipano.RectilinearView(data.initialViewParameters, limiter);

        var scene = viewer.createScene({
            source: source,
            geometry: geometry,
            view: view,
            pinFirstLevel: true
        });

        // Create link hotspots.
        data.linkHotspots.forEach(function(hotspot) {
            var element = createLinkHotspotElement(hotspot);
            scene.hotspotContainer().createHotspot(element, { yaw: hotspot.yaw, pitch: hotspot.pitch });
        });

        // Create info hotspots.
        data.infoHotspots.forEach(function(hotspot) {
            var element = createInfoHotspotElement(hotspot);
            scene.hotspotContainer().createHotspot(element, { yaw: hotspot.yaw, pitch: hotspot.pitch });
        });


        // Get the hotspot container for scene.
        var container = scene.hotspotContainer();


        // Pano Screens & Hotspots.
        if(data.id === '0-welcomedesk'){

            container.createHotspot(document.getElementById('welcome-screen'), { yaw: 0, pitch: 0 },
                { perspective: { radius: 610, extraTransforms: "rotateX(0deg) rotateY(0deg) rotateZ(0deg)" }});

            container.createHotspot(document.getElementById('magna-careers'), { yaw: 0.71, pitch: 0 },
                { perspective: { radius: 1510, extraTransforms: "rotateX(0deg) rotateY(40deg) rotateZ(0deg)" }});

            container.createHotspot(document.getElementById('complete-vehicles-screen-sm'), { yaw: -1.137, pitch: -0.003 },
                { perspective: { radius: 3220, extraTransforms: "rotateX(0deg) rotateY(20deg) rotateZ(0deg)" }});

            container.createHotspot(document.getElementById('seat-of-the-future-screen-sm'), { yaw: -1.83, pitch: -0.05 },
                { perspective: { radius: 2280, extraTransforms: "rotateX(3deg) rotateY(75deg) rotateZ(0deg)" }});

        }

        if(data.id === '1-magnaleft360'){

            // Body Exteriors
            container.createHotspot(document.getElementById('body-exteriors-screen'), { yaw: 0, pitch: 0 },
                { perspective: { radius: 1500, extraTransforms: "rotateX(0deg) rotateY(0deg) rotateZ(0deg)" }});

            container.createHotspot(document.getElementById('body-exteriors-overlay'), { yaw: 0, pitch: -0.002 },
                { perspective: { radius: 1185, extraTransforms: "rotateX(0deg) rotateY(0deg) rotateZ(0deg)" }});


            // Complete Vehicles
            container.createHotspot(document.getElementById('complete-vehicles-screen'), { yaw: 9.417, pitch: -0.0065 },
                { perspective: { radius: 1180, extraTransforms: "rotateX(0deg) rotateY(0deg) rotateZ(0deg)" }});


            // Seat of the Future
            container.createHotspot(document.getElementById('seat-of-the-future-screen'), { yaw: -10.722, pitch: -0.075 },
                { perspective: { radius: 1690, extraTransforms: "rotateX(0deg) rotateY(17deg) rotateZ(1deg)" }});


            // Intelligent Lighting
            container.createHotspot(document.getElementById('intelligent-lighting-screen'), { yaw: 10.9, pitch: -0.12 },
                { perspective: { radius: 1530, extraTransforms: "rotateX(6deg) rotateY(-6deg) rotateZ(0deg)" }});

            container.createHotspot(document.getElementById('intelligent-lighting-overlay'), { yaw: 10.78, pitch: 0.165 },
                { perspective: { radius: 1340, extraTransforms: "rotateX(-7deg) rotateY(-9deg) rotateZ(1deg)" }});

        }

        if(data.id === '2-magnaright360'){

            // Advanced Driver
            container.createHotspot(document.getElementById('advanced-driver-screen'), { yaw: 0.1, pitch: 0 },
                { perspective: { radius: 770, extraTransforms: "rotateX(0deg) rotateY(6deg) rotateZ(0deg)" }});

            container.createHotspot(document.getElementById('advanced-driver-overlay'), { yaw: 0.5, pitch: 0.11 },
                { perspective: { radius: 1330, extraTransforms: "rotateX(0deg) rotateY(25deg) rotateZ(-3.5deg)" }});


            // Active Aerodynamics
            container.createHotspot(document.getElementById('active-aerodynamics-screen'), { yaw: 1.525, pitch: -0.09 },
                { perspective: { radius: 1660, extraTransforms: "rotateX(10deg) rotateY(0deg) rotateZ(-0.5deg)" }});

            // Scalable Electrification
            container.createHotspot(document.getElementById('scalable-electrification-screen'), { yaw: 9.087, pitch: -0.13 },
                { perspective: { radius: 1450, extraTransforms: "rotateX(9deg) rotateY(-20deg) rotateZ(0.4deg)" }});

            // Smartaccess
            container.createHotspot(document.getElementById('smartaccess-screen'), { yaw: 10.89, pitch: -0.1 },
                { perspective: { radius: 2220, extraTransforms: "rotateX(8deg) rotateY(-5deg) rotateZ(-0.1deg)" }});

        }




        return {
            data: data,
            scene: scene,
            view: view
        };
    });

    // Set up autorotate, if enabled.
    var autorotate = Marzipano.autorotate({
        yawSpeed: 0.03,
        targetPitch: 0,
        targetFov: Math.PI/2
    });
    if (data.settings.autorotateEnabled) {
        autorotateToggleElement.classList.add('enabled');
    }

    // Set handler for autorotate toggle.
    autorotateToggleElement.addEventListener('click', toggleAutorotate);

    // Set up fullscreen mode, if supported.
    if (screenfull.enabled && data.settings.fullscreenButton) {
        document.body.classList.add('fullscreen-enabled');
        fullscreenToggleElement.addEventListener('click', function() {
            screenfull.toggle();
        });
        screenfull.on('change', function() {
            if (screenfull.isFullscreen) {
                fullscreenToggleElement.classList.add('enabled');
            } else {
                fullscreenToggleElement.classList.remove('enabled');
            }
        });
    } else {
        document.body.classList.add('fullscreen-disabled');
    }

    // Set handler for scene list toggle.
    sceneListToggleElement.addEventListener('click', toggleSceneList);

    // Start with the scene list open on desktop.
    if (!document.body.classList.contains('mobile')) {
        showSceneList();
    }

    // Set handler for scene switch.
    scenes.forEach(function(scene) {
        var el = document.querySelector('#sceneList .scene[data-id="' + scene.data.id + '"]');
        el.addEventListener('click', function() {
            switchScene(scene);
            // On mobile, hide scene list after selecting a scene.
            if (document.body.classList.contains('mobile')) {
                hideSceneList();
            }
        });
    });

    // DOM elements for view controls.
    var viewUpElement = document.querySelector('#viewUp');
    var viewDownElement = document.querySelector('#viewDown');
    var viewLeftElement = document.querySelector('#viewLeft');
    var viewRightElement = document.querySelector('#viewRight');
    var viewInElement = document.querySelector('#viewIn');
    var viewOutElement = document.querySelector('#viewOut');

    // Dynamic parameters for controls.
    var velocity = 0.7;
    var friction = 3;

    // Associate view controls with elements.
    var controls = viewer.controls();
    controls.registerMethod('upElement',    new Marzipano.ElementPressControlMethod(viewUpElement,     'y', -velocity, friction), true);
    controls.registerMethod('downElement',  new Marzipano.ElementPressControlMethod(viewDownElement,   'y',  velocity, friction), true);
    controls.registerMethod('leftElement',  new Marzipano.ElementPressControlMethod(viewLeftElement,   'x', -velocity, friction), true);
    controls.registerMethod('rightElement', new Marzipano.ElementPressControlMethod(viewRightElement,  'x',  velocity, friction), true);
    controls.registerMethod('inElement',    new Marzipano.ElementPressControlMethod(viewInElement,  'zoom', -velocity, friction), true);
    controls.registerMethod('outElement',   new Marzipano.ElementPressControlMethod(viewOutElement, 'zoom',  velocity, friction), true);

    function sanitize(s) {
        return s.replace('&', '&amp;').replace('<', '&lt;').replace('>', '&gt;');
    }

    function switchScene(scene) {
        stopAutorotate();
        scene.view.setParameters(scene.data.initialViewParameters);
        scene.scene.switchTo();
        startAutorotate();
        updateSceneName(scene);
        updateSceneList(scene);
    }

    function updateSceneName(scene) {
        sceneNameElement.innerHTML = sanitize(scene.data.name);
    }

    function updateSceneList(scene) {
        for (var i = 0; i < sceneElements.length; i++) {
            var el = sceneElements[i];
            if (el.getAttribute('data-id') === scene.data.id) {
                el.classList.add('current');
            } else {
                el.classList.remove('current');
            }
        }
    }

    function showSceneList() {
        sceneListElement.classList.add('disabled');
        sceneListToggleElement.classList.add('enabled');
    }

    function hideSceneList() {
        sceneListElement.classList.remove('enabled');
        sceneListToggleElement.classList.remove('enabled');
    }

    function toggleSceneList() {
        sceneListElement.classList.toggle('enabled');
        sceneListToggleElement.classList.toggle('enabled');
    }

    function startAutorotate() {
        if (!autorotateToggleElement.classList.contains('enabled')) {
            return;
        }
        viewer.startMovement(autorotate);
        viewer.setIdleMovement(3000, autorotate);
    }

    function stopAutorotate() {
        viewer.stopMovement();
        viewer.setIdleMovement(Infinity);
    }

    function toggleAutorotate() {
        if (autorotateToggleElement.classList.contains('enabled')) {
            autorotateToggleElement.classList.remove('enabled');
            stopAutorotate();
        } else {
            autorotateToggleElement.classList.add('enabled');
            startAutorotate();
        }
    }

    function createLinkHotspotElement(hotspot) {

        // Create wrapper element to hold icon and tooltip.
        var wrapper = document.createElement('div');
        wrapper.classList.add('hotspot');
        wrapper.classList.add('link-hotspot');

        // Create image element.
        var icon = document.createElement('img');
        icon.src = '/public/front/img/link.png';
        icon.classList.add('link-hotspot-icon');

        // Set rotation transform.
        var transformProperties = [ '-ms-transform', '-webkit-transform', 'transform' ];
        for (var i = 0; i < transformProperties.length; i++) {
            var property = transformProperties[i];
            icon.style[property] = 'rotate(' + hotspot.rotation + 'rad)';
        }

        // Add click event handler.
        wrapper.addEventListener('click', function() {
            switchScene(findSceneById(hotspot.target));
        });

        // Prevent touch and scroll events from reaching the parent element.
        // This prevents the view control logic from interfering with the hotspot.
        stopTouchAndScrollEventPropagation(wrapper);

        // Create tooltip element.
        var tooltip = document.createElement('div');
        tooltip.classList.add('hotspot-tooltip');
        tooltip.classList.add('link-hotspot-tooltip');
        tooltip.innerHTML = findSceneDataById(hotspot.target).name;

        wrapper.appendChild(icon);
        wrapper.appendChild(tooltip);

        return wrapper;
    }

    function createInfoHotspotElement(hotspot) {

        // Create wrapper element to hold icon and tooltip.
        var wrapper = document.createElement('div');
        wrapper.classList.add('hotspot');
        wrapper.classList.add('info-hotspot');

        // Create hotspot/tooltip header.
        var header = document.createElement('div');
        header.classList.add('info-hotspot-header');

        // Create image element.
        var iconWrapper = document.createElement('div');
        iconWrapper.classList.add('info-hotspot-icon-wrapper');
        var icon = document.createElement('img');
        icon.src = '/public/front/img/info.png';
        icon.classList.add('info-hotspot-icon');
        iconWrapper.appendChild(icon);

        // Create title element.
        var titleWrapper = document.createElement('div');
        titleWrapper.classList.add('info-hotspot-title-wrapper');
        var title = document.createElement('div');
        title.classList.add('info-hotspot-title');
        title.innerHTML = hotspot.title;
        titleWrapper.appendChild(title);

        // Create close element.
        var closeWrapper = document.createElement('div');
        closeWrapper.classList.add('info-hotspot-close-wrapper');
        var closeIcon = document.createElement('img');
        closeIcon.src = '/public/front/img/close.png';
        closeIcon.classList.add('info-hotspot-close-icon');
        closeWrapper.appendChild(closeIcon);

        // Construct header element.
        header.appendChild(iconWrapper);
        header.appendChild(titleWrapper);
        header.appendChild(closeWrapper);

        // Create text element.
        var text = document.createElement('div');
        text.classList.add('info-hotspot-text');
        text.innerHTML = hotspot.text;

        // Place header and text into wrapper element.
        wrapper.appendChild(header);
        wrapper.appendChild(text);

        // Create a modal for the hotspot content to appear on mobile mode.
        var modal = document.createElement('div');
        modal.innerHTML = wrapper.innerHTML;
        // modal.classList.add('info-hotspot-modal');
        // document.body.appendChild(modal);

        let dataA = {
            title: 'Welcome to the Magna Virtual Showroom',
            items: [
                ['/public/front/img/pano-info/info.png', 'Select the info icon to reveal and receive further information'],
                ['/public/front/img/pano-info/move.png', 'Click and drag your mouse to change your point of view'],
                ['/public/front/img/pano-info/hotspot.png', 'Select red hotspots to reveal more content'],
                ['/public/front/img/pano-info/link.png', 'Select green hotspots to move to a different 360˚ location'],
                ['/public/front/img/pano-info/2d-link.png', 'Select blue hotspots to enter product areas'],
                ['/public/front/img/pano-info/red-play-icon.png', 'Select the red play button to reveal more content'],
                ['/public/front/img/pano-info/360.png', 'Select the 360˚ icon to return to the panoramic view'],
                ['/public/front/img/pano-info/uni-nav.png', 'Select the arrow to your left to open the main navigational page']
            ]
        }
        // Show content when hotspot is clicked.
        wrapper.querySelector('.info-hotspot-header').addEventListener('click', () => { showInfoPopup(dataA) });

        // Hide content when close icon is clicked.
        modal.querySelector('.info-hotspot-close-wrapper').addEventListener('click', () => { showInfoPopup(dataA) });

        // Prevent touch and scroll events from reaching the parent element.
        // This prevents the view control logic from interfering with the hotspot.
        stopTouchAndScrollEventPropagation(wrapper);

        return wrapper;
    }

    // Prevent touch and scroll events from reaching the parent element.
    function stopTouchAndScrollEventPropagation(element, eventList) {
        var eventList = [ 'touchstart', 'touchmove', 'touchend', 'touchcancel',
            'wheel', 'mousewheel' ];
        for (var i = 0; i < eventList.length; i++) {
            element.addEventListener(eventList[i], function(event) {
                event.stopPropagation();
            });
        }
    }

    function findSceneById(id) {
        for (var i = 0; i < scenes.length; i++) {
            if (scenes[i].data.id === id) {
                return scenes[i];
            }
        }
        return null;
    }

    function findSceneDataById(id) {
        for (var i = 0; i < data.scenes.length; i++) {
            if (data.scenes[i].id === id) {
                return data.scenes[i];
            }
        }
        return null;
    }

    //check if we have scene in URL
    let scene = 0;
    if(window.location.href.indexOf('scene-id') != -1){
        //get from url
        let urlParts = window.location.search.split('?'),
            parts = urlParts[1].split('&');

        //check for scenes
        for(let p in parts){
            if(parts[p].indexOf('scene-id') != -1){
                let s = parts[p].split('=');
                scene = s[1];
            }
        }

    }
    switchScene(scenes[scene]);

})();