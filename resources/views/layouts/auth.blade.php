<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BMA Portal') }}</title>
    <meta name="Author" content="Ghulam Rasool [imgrasool@gmail.com]" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <!-- WEB FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="{{ asset('assets/css/essentials.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />

</head>
    <!--
        .boxed = boxed version
    -->
    <body style="background-image:url('assets/images/background.jpg'); background-size:cover;" >

        @yield('content')
        

        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript">var plugin_path = {{ asset('assets/plugins/') }} ;</script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    </body>
    </html>