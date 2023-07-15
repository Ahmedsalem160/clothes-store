<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <!-- Scripts -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">


            <!-- #app that render all vue component -->
            <div id="app">
                <div class="container">
                        <!-- header of the app -->

                    <nav-component></nav-component>

                    <!-- any route clicked >> component matched be the router will render -->
                    <div class="content"><router-view></router-view></div>
                    <!-- Fooooooooooooooter of the App -->
                    <footer-component></footer-component>
                </div>
            </div>

    </body>
</html>
