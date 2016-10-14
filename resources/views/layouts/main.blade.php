<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link href="{{ URL::to('src/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/color.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/iconmoon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/yamm-menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/site.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/jquery.tag-editor.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('src/css/jquery.multiselect.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    @yield('styles')
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="theme-style-1">
<div id="wrapper">
    @include('layouts.header')
    @yield('content')
</div>
@include('layouts.footer')
<script src="{{ URL::to('src/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('src/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::to('src/js/bg-moving.js') }}"></script>
<script src="{{ URL::to('src/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.0-rc.1/jquery-ui.min.js"></script>
<script src="{{ URL::to('src/js/custom.js') }}"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300">
<link rel="stylesheet" href="https://cdn.rawgit.com/yahoo/pure-release/v0.6.0/pure-min.css">
<script src="{{ URL::to('src/js/jquery.caret.min.js') }}"></script>
<script src="{{ URL::to('src/js/jquery.tag-editor.js') }}"></script>
<script src="{{ URL::to('src/js/jquery.multiselect.js') }}"></script>
<script src="{{ URL::to('src/js/js.js') }}"></script>
<script src="{{ URL::to('js/main.js') }}"></script>
</body>
</html>