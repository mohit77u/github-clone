<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">

        <!-- title -->
        <title>@yield('meta_title')</title>

        <!-- css -->
        @vite('resources/sass/app.scss')

    </head>
    <body class="bg-dark-primary">

        <!-- main content -->
        @yield('content')

        <!-- toast -->
        @include('toast.toast')

        <!-- scripts -->
        @vite('resources/js/app.js')
    </body>
</html>
