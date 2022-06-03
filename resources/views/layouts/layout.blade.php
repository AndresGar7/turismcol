<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Librerias de JavaScript (jQuery) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Se encarga de cargar los iconos que contiene la pagina -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Estilos de la pagina en general -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fotorama.css') }}" rel="stylesheet">
        <!-- Icono de la cabecera de la pagina -->
        <link rel="shortcut icon" href="{{ asset('img/palma.png') }}">
        <!-- Archivo de JS para dar mas funcionalidad a la pagina -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/myScripts.js') }}" defer></script>
        <script src="{{ asset('js/fotorama.js') }}" defer></script>

        <title>@yield('title')</title>

    </head>
    <body>
        <div id="app" class="d-flex flex-column h-screen justify-content-between">
            <header>
                @include('partials.covid')
                @include('partials.nav')
            </header>

            <main>
                @yield('content')
            </main>

            <footer>
                @include('partials.footer')
            </footer>
        </div>
    </body>
</html>
