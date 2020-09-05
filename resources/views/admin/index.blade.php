<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Magna Virtual Showroom</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{url('/public/admin')}}/images/favicon.ico">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="{{url('/public/admin')}}/images/favicon.ico">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/favicon.ico">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="{{url('/public/admin')}}/images/favicon.ico">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/public/admin')}}/styles.css">
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--white mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <div class="top_nav_header_section">
                <span class="mdl-layout-title">Magna Virtual Showroom</span>
                <ul class="demo-list-icon mdl-list active-visitor-highlight">
                    <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                    <span class="material-icons">language</span>
                    Total Visitors: &nbsp;&nbsp;<span
                                class="active-visitors-numbers">{{$visitors ? count($visitors) : 0}}</span>
                    </span>
                    </li>
                </ul>
            </div>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" style="display:none">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search">
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn"
                    style="display:none">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn"
                style="display:none">
                <li class="mdl-menu__item">About</li>
                <li class="mdl-menu__item">Contact</li>
                <li class="mdl-menu__item">Legal information</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--white mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <svg height="36" role="img" viewBox="0 0 720 145" width="177" xmlns="http://www.w3.org/2000/svg"><title>
                    Magna International</title>
                <path d="M181.1,42.6h38l14,53h0.9c0.7-4.4,1.3-9.1,2.6-13.4l11.5-39.6h37.6l16.7,100.8h-35.7l-5-55.2h-0.7 c-0.7,3.3-1.3,6.8-2.4,10l-14.7,45.2h-21.6l-13.2-42.7c-1.1-4.3-2-8.3-2.3-12.6h-1.2c-0.3,4-0.5,8.2-0.9,12.2l-4.3,43.1h-35.7 L181.1,42.6z"
                      fill="#888B8D"></path>
                <path d="M332.7 143.4h-39.1L329 42.6h40.9l36.3 100.8H367l-3.4-12.6h-27.9L332.7 143.4zM357.1 106.9l-4.3-17.8c-1.1-4.3-1.8-8.7-2.4-13h-1.3l-6.7 30.8H357.1zM506.5 84c-.3 16.5-.3 30.2-12.3 43.1-10.8 11.6-27.4 17.9-43.2 17.9-31 0-56.1-19-56.1-51.4 0-32.9 24.4-52.7 56.4-52.7 17.7 0 41.9 8.7 49.9 25.9l-34.5 12.6c-2.8-5.1-8.1-7.8-14-7.8-13.2 0-20.5 11.2-20.5 23.4 0 11.1 7 21.5 19 21.5 5.8 0 13.2-2.7 15-8.8h-16.7V84H506.5zM509.3 42.6h35.5l33.2 55.9h1.1c-1.5-8.4-3.1-17.1-3.1-25.7V42.6h35.3v100.8h-35.3l-32.5-53h-1.1c1.2 7 2.3 13.5 2.3 20.2v32.8h-35.3V42.6z"
                      fill="#888B8D"></path>
                <path d="M646.7,143.4h-39.1l35.3-100.8h40.9L720,143.4h-39.1l-3.4-12.6h-27.9L646.7,143.4z M671.1,106.9l-4.3-17.8 c-1.1-4.3-1.7-8.7-2.4-13H663l-6.7,30.8H671.1z"
                      fill="#888B8D"></path>
                <path d="M82.3,0C72,0,63.7,8.3,63.7,18.5c0,10.2,8.3,18.5,18.6,18.5c10.3,0,18.6-8.3,18.6-18.5 C100.9,8.3,92.6,0,82.3,0"
                      fill="#DA291C"></path>
                <path d="M108.3 143.5L146.6 143.5 109.7 42.8 81.6 42.8 76.5 56.8M0 143.5L57.1 143.5 28.5 65.7M63.6 143.5L101.9 143.5 65 42.8 37 42.8 31.8 56.8"
                      fill="#0D0105"></path>
            </svg>
        </header>
        <div class="user-avatar-drawer">
            <div class="user-avatar-img">
                <img src="{{url('/public/admin')}}/images/user.jpg" class="demo-avatar user-avatar">
            </div>
            <div class="user-details">
                <span class="name">Erica Angam</span>
                <span class="title">title</span>
            </div>

            <div class="demo-avatar-dropdown" style="display:none">
                <span>hello@example.com</span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item">hello@example.com</li>
                    <li class="mdl-menu__item">info@example.com</li>
                    <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li>
                </ul>
            </div>
        </div>
        <nav class="demo-navigation mdl-navigation mdl-color--white">
            <a class="mdl-navigation__link mdl-color-text--blue-grey-400" href="https://eeidigital.com/magna/ves/"
               target="_blank">
                <span class="mdl-color-text--blue-grey-400 material-icons">dashboard</span>Visit VIS
            </a>
            <a class="mdl-navigation__link mdl-color-text--blue-grey-400 active" href="{{url('/administrator')}}">
                <span class="mdl-color-text--blue-grey-400 material-icons">timeline</span>Metrics
            </a>
            <a class="mdl-navigation__link mdl-color-text--blue-grey-400" href="{{url('/administrator/contacts')}}">
                <span class="mdl-color-text--blue-grey-400 material-icons">contacts</span>Contacts
            </a>
            <a class="mdl-navigation__link mdl-color-text--blue-grey-400" href="">
                <span class="mdl-color-text--blue-grey-400 material-icons">file_upload</span>Uploads
            </a>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href="">
                <span class="mdl-color-text--blue-grey-400 material-icons">nights_stay</span>
            </a>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--white">
        <div class="mdl-grid demo-content">
            <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                <div class="section_header"><span class="section_header_text">Most Visited Stations</span></div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600 below-section-header">
                    <ul class="demo-list-control mdl-list mdl-color--white">
                        @if ($stations_by_duration && count($stations_by_duration) > 0)
                            @foreach($stations_by_duration as $item)
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">{{$item->name}}</span>
                                    <span class="mdl-list__item-secondary-action">{{floor($item->duration_in_sec / 60) . 'm ' . $item->duration_in_sec % 60 . 's'}}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">Nothing to show</span>
                                <span class="mdl-list__item-secondary-action">-</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                <div class="section_header"><span class="section_header_text">Most Viewed Content</span></div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600 below-section-header">
                    <ul class="demo-list-control mdl-list mdl-color--white">
                        @if ($videos_by_duration && count($videos_by_duration) > 0)
                            @foreach($videos_by_duration as $item)
                                <li class="mdl-list__item">
                                    {{--<span class="mdl-list__item-primary-content">{{strlen($item->file_name) > 15 ? substr($item->file_name, 0, 14) . '...': $item->file_name}}</span>--}}
                                    <span class="mdl-list__item-primary-content">{{$item->file_name}}</span>
                                    <span class="mdl-list__item-secondary-action">{{floor($item->duration_in_sec / 60) . 'm ' . $item->duration_in_sec % 60 . 's'}}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">Nothing to show</span>
                                <span class="mdl-list__item-secondary-action">-</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-desktop">
                <div class="section_header"><span class="section_header_text">Most Downloaded</span>
                    <a href="{{url('/administrator/export')}}" target="_blank"
                       class="mdl-button mdl-js-button export-btn">Export</a>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600 below-section-header">
                    <ul class="demo-list-control mdl-list mdl-color--white">
                        @if ($pdfs_by_count && count($pdfs_by_count) > 0)
                            @foreach($pdfs_by_count as $item)
                                <li class="mdl-list__item">
                                    {{--<span class="mdl-list__item-primary-content">{{strlen($item->file_name) > 15 ? substr($item->file_name, 0, 14) . '...': $item->file_name}}</span>--}}
                                    <span class="mdl-list__item-primary-content">{{$item->file_name}}</span>
                                    <span class="mdl-list__item-secondary-action">{{$item->download_count}}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-primary-content">Nothing to show</span>
                                <span class="mdl-list__item-secondary-action">-</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                <div class="section_header"><span class="section_header_text">Stations</span></div>
                <table class="mdl-data-table mdl-js-data-table mdl-cell--12-col below-section-header">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th>Times Visited</th>
                        <th>Time Spent</th>
                        <th>Most Viewed Content</th>
                        <th>Most Downloaded</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stations_statistics as $item)
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">{{$item->category}}</td>
                            <td>{{$item->total_visit_count != null ? $item->total_visit_count : 0}}</td>
                            <td>{{$item->total_duration_in_sec ? floor($item->total_duration_in_sec / 60) . 'm ' . $item->total_duration_in_sec % 60 . 's' : '0m 0s'}}</td>
                            {{--                            <td>{{strlen($item->most_viewed_content) > 15 ? substr($item->most_viewed_content, 0, 14) . '...': $item->most_viewed_content}}</td>--}}
                            <td>{{$item->most_viewed_content}}</td>
                            {{--                            <td>{{strlen($item->most_downloaded_pdf) > 15 ? substr($item->most_downloaded_pdf, 0, 14) . '...': $item->most_downloaded_pdf}}</td>--}}
                            <td>{{$item->most_downloaded_pdf}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid"
                 style="display:none">
                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1"
                     class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                    <use xlink:href="#piechart" mask="url(#piemask)"/>
                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle"
                          dy="0.1">82
                        <tspan font-size="0.2" dy="-0.07">%</tspan>
                    </text>
                </svg>
                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1"
                     class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                    <use xlink:href="#piechart" mask="url(#piemask)"/>
                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle"
                          dy="0.1">82
                        <tspan dy="-0.07" font-size="0.2">%</tspan>
                    </text>
                </svg>
                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1"
                     class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                    <use xlink:href="#piechart" mask="url(#piemask)"/>
                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle"
                          dy="0.1">82
                        <tspan dy="-0.07" font-size="0.2">%</tspan>
                    </text>
                </svg>
                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1"
                     class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">
                    <use xlink:href="#piechart" mask="url(#piemask)"/>
                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle"
                          dy="0.1">82
                        <tspan dy="-0.07" font-size="0.2">%</tspan>
                    </text>
                </svg>
            </div>
            <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col" style="display:none">
                <svg fill="currentColor" viewBox="0 0 500 250" class="demo-graph">
                    <use xlink:href="#chart"/>
                </svg>
                <svg fill="currentColor" viewBox="0 0 500 250" class="demo-graph">
                    <use xlink:href="#chart"/>
                </svg>
            </div>
            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing"
                 style="display:none">
                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                        <h2 class="mdl-card__title-text">Updates</h2>
                    </div>
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                        Non dolore elit adipisicing ea reprehenderit consectetur culpa.
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
                    </div>
                </div>
                <div class="demo-separator mdl-cell--1-col"></div>
                <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                        <h3>View options</h3>
                        <ul>
                            <li>
                                <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox1" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Click per object</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox2" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Views per object</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox3" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Objects selected</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox4" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Objects viewed</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change
                            location</a>
                        <div class="mdl-layout-spacer"></div>
                        <i class="material-icons">location_on</i>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="mdl-mini-footer mdl-color--black">
        <div class="mdl-mini-footer__left-section">
            <div class="mdl-logo">MAGNA</div>
        </div>
        <div class="mdl-mini-footer__right-section copyright_text">
            Copyright 2020 Magna International Inc, All Rights Reserved.
        </div>
    </footer>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function adjustText() {
        $('.mdl-list__item span.mdl-list__item-primary-content').each(function () {
            var text = $(this).text();
            if ($(this).html().includes('material-icons')) {
                return;
            }
            var width = $(this).width();
            // console.log(text.length, width);
            if (width / text.length < 10) {
                // console.log($(this).text(), $(this).width());
                $(this).text(text.substr(0, parseInt(width / 10)) + '...');
            }
        })
    }

    $(document).ready(function () {
        adjustText();
        $(window).resize(function () {
        })
    })
</script>
</body>
</html>
