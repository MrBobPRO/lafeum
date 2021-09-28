<!DOCTYPE html>
<html lang="tj">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content=" {{ csrf_token() }}">

        <title>ЛАФЕЮМ</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Material Icons --}}
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    </head>

    <body>
        @include('templates.header')
        @yield('content')
        @include('templates.footer')

        <script src="{{ mix('js/app.js') }}"></script>
    </body>

</html>