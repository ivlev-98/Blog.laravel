<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }} | {{ $title }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="author" content="Александр Ивлев (Alex Ivlev)">
        <meta name="keywords" content="Блог, Blog, Blog.laravel, {{ $metaKeywords }}">
        <meta name="description" content="Блог на laravel. {{ $metaDescription }}">
        <script defer="defer" src="{{ asset('/js/app.2ac5f77bd142912a7d39.js') }}"></script>
        <link href="{{ asset('/css/app.9afee54f112770e6b635.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="site-overlay"></div>
        <div id="site-overlay2"></div>
        <div class="wrapper">
            @include('layouts.parts.header')
            <div class="container">
                <div class="wrap">
                    @yield('content')
                </div>
                @include('layouts.parts.nav')
            </div>
            <x-alerts></x-alerts>
            @include('layouts.parts.footer')
        </div>
    </body>
</html>
