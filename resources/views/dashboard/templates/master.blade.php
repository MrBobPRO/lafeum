<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Дурдонаҳо – Админка</title>

    <meta name="robots" content="none" />
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="yandex" content="none">

    {{-- Roboto Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    {{-- Bootstrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- JQuery Form Styler 2.0.1 --}}
    <link href="{{ asset('js/JQueryFormStyler/jquery.formstyler.css') }}" rel="stylesheet">
    <link href="{{ asset('js/JQueryFormStyler/jquery.formstyler.theme.css') }}" rel="stylesheet">
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- Material Icons --}}
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    {{-- Simditor v2.3.28 --}}
    <link href="{{ asset('js/simditor/styles/simditor.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

    <div class="content" id="content">
        @include('dashboard.templates.header')
        @include('dashboard.templates.aside')

        <main class="main" id="main">
            @include('dashboard.templates.errors')
            @yield('main')
        </main>
    </div>

    {{-- JQery 3.6.0 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Bootstrap 5.1 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- JQuery Form Styler 2.0.1 --}}
    <script src=" {{asset('js/JQueryFormStyler/jquery.formstyler.min.js') }}"></script>
    {{-- Simditor v2.3.28 --}}
    <script src="{{ asset('js/simditor/scripts/module.js') }}"></script>
    <script src="{{ asset('js/simditor/scripts/hotkeys.js') }}"></script>
    <script src="{{ asset('js/simditor/scripts/uploader.js') }}"></script>
    <script src="{{ asset('js/simditor/scripts/simditor.js') }}"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>