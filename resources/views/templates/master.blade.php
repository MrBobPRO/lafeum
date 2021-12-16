<!DOCTYPE html>
<html lang="tj">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @hasSection ('title')
                @yield('title') – Дурдонаҳо
            @else
                Дурдонаҳо
            @endif
        </title>

        {{-----------Meta tags start--------- --}}
        {{-- Same metas for all routes --}}
        <meta name="keywords" content="Дурдонаҳо, Иқтибосҳо ва афоризмҳо, Муаллифони машҳур, Иқтибосҳои маъмул, цитаты и афоризмы"/>
        <meta property="og:site_name" content="Дурдонаҳо">
        <meta property="og:type" content="object" />
        <meta name="twitter:card" content="summary_large_image">

        @hasSection ('meta-tags')
            @yield('meta-tags')
        @else
            <meta name="description" content="Беҳтарин иқтибосҳо ва афоризмҳои инсонҳо ва мутафаккирони бузург.">
            <meta property="og:description" content="Беҳтарин иқтибосҳо ва афоризмҳои инсонҳо ва мутафаккирони бузург.">
            <meta property="og:title" content="Дурдонаҳо" />
            <meta property="og:image" content="{{ asset('img/main/logo-share.png') }}">
            <meta property="og:image:alt" content="Дурдонаҳо – Лого">
            <meta name="twitter:title" content="Дурдонаҳо">
            <meta name="twitter:image" content="{{ asset('img/main/logo-share.png') }}">
        @endif
        {{----------- Meta tags end-----------}}

        <meta name="robots" content="none"/>
        <meta name="googlebot" content="noindex, nofollow"/>
        <meta name="yandex" content="none"/>

        {{-- Favicons for all devices --}}
        <link rel="icon" href="{{ asset('img/main/cropped-favi-32x32.png') }}" sizes="32x32">
        <link rel="icon" href="{{ asset('img/main/cropped-favi-192x192.png') }}" sizes="192x192">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('img/main/cropped-favi-180x180.png') }}">
        <meta name="msapplication-TileImage" content="{{ asset('img/main/cropped-favi-270x270.png') }}">

        {{-- Raleway Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300&display=swap" rel="stylesheet">
        {{-- Material Icons --}}
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
        {{-- Owl Carousel --}}
        <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.theme.default.min.css') }}">

        {{-- <link rel="stylesheet" href="{{ asset('css/uncompressed/authors.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/categories.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/uncompressed/quotes.css') }}"> --}}

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
        {{-- Yandex share buttons --}}
        <script src="https://yastatic.net/share2/share.js"></script>

        {{-- <script src="{{ asset('js/uncompressed.js') }}"></script> --}}
        <script src="{{ mix('js/app.js') }}"></script>
    </body>

</html>