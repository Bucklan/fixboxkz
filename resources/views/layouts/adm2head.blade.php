<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link href="{{asset('dist/FiX_Box.png')}}" type="png" rel="shortcut icon">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Fixbox</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
    <!-- END: CSS Assets-->
</head>
<body>

@yield('app2')


<script
    src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api
"]&libraries=places"></script>
<script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>
