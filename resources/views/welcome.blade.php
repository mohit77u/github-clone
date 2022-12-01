<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">

        <title>Github Clone</title>
        @vite('resources/sass/app.scss')

    </head>
    <body class="bg-dark-primary">

        <div id="app">
            <app-component></app-component>
        </div>

        @vite('resources/js/app.js')
    </body>
</html>
