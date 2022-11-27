<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BookCatalog</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <main class="wrapper">
            <header-component :admin="{{ json_encode(Auth::check() ? Auth::user()->is_admin : false) }}"
                :user="{{ json_encode(Auth::check() ? Auth::user()->name : false) }}">
            </header-component>
            @yield('content')
            <footer-component></footer-component>
        </main>
    </div>
</body>

</html>
