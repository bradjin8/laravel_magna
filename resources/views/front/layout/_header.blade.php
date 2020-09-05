<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($title) ? $title : ""}} - Magna</title>
    <meta name="viewport"
          content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui"/>

    <link href="{{url('/public/front')}}/img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/hotspot.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/popup.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/info-popup.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/drawer.css">
    <link rel="stylesheet" href="{{url('/public/front')}}/css/style.css">
</head>
<body>

<a href="{{url('/')}}/showroom"><img class="main-logo" src="{{url('/public/front')}}/img/magna-logo.png"></a>
<a href="{{url('/')}}/showroom?scene-id=2"><img class="icon-360"></a>
