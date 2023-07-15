<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
        <!-- Styles -->

        <!-- Scripts -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">


            <!-- #app that render all vue component -->
            <div id="app">
                <div class="container">
                    @guest('admin-api')
                    <router-link to="/admin/login">Log In</router-link>
                    @endguest
                    @auth('admin-api')
                    <router-link to="/dashboard">Dashboard</router-link>
                    @endauth

                </div>
                <div class="content"><router-view></router-view></div>
            </div>

    </body>
</html>



