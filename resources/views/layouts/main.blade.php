<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }} | {{ $title }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="author" content="Александр Ивлев (Alex Ivlev)">
        <meta name="keywords" content="Блог, Blog, Blog.laravel, {{ $metaKeywords }}">
        <meta name="description" content="Блог на laravel. {{ $metaDescription }}">
        <script defer="defer" src="{{ asset('/js/app.a896650afb760a5b297e.js') }}"></script>
        <link href="{{ asset('/css/app.a5c33a71fc7309eecf49.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="site-overlay"></div>
        <div id="site-overlay2"></div>
        <div class="wrapper">
            @include('layouts.parts.header')
            <div class="container">
                <div class="wrap">
                    @yield('content')
                    @include('layouts.parts.nav')
                </div>
            </div>
            @include('layouts.parts.footer')
        </div>
    </body>
</html>