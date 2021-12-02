<!DOCTYPE html>
<html lang="tj">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Дурдонаҳо</title>

        <meta name="robots" content="none"/>
        <meta name="googlebot" content="noindex, nofollow"/>
        <meta name="yandex" content="none"/>

        {{-- Raleway Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300&display=swap" rel="stylesheet">
        {{-- Material Icons --}}
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
        {{-- Owl Carousel --}}
        <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.theme.default.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/uncompressed/authors.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/categories.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/quotes.css') }}">

        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    </head>

    <body>
        @include('templates.header')
        <main class="main" id="main" role="main">
            @yield('main')
        </main>
        @include('templates.footer')
        
        {{-- JQuery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        {{-- Owl Carousel --}}
        <script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('js/uncompressed.js') }}"></script>
        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    </body>

</html>