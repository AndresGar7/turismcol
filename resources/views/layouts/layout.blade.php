<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Librerias de JavaScript (jQuery) -->
        <!-- Se encarga de cargar los iconos que contiene la pagina -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- Estilos de la pagina en general -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fotorama.css') }}" rel="stylesheet">
        <link  href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
        <!-- Icono de la cabecera de la pagina -->
        <link rel="shortcut icon" href="{{ asset('img/palma.png') }}">
        <!-- Archivo de JS para dar mas funcionalidad a la pagina -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/myScripts.js') }}" defer></script>
        <script src="{{ asset('js/fotorama.js') }}" defer></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <script>
        @if (session('sendMail'))
            Swal.fire({
                title: "Excelente",
                text: "Los datos se enviaron correctamente.",
                icon: "success",
                confirmButtonColor: "#12b886",
                confirmButtonText: "Aceptar!",
                allowOutsideClick: false,
                showClass: {
                    popup: 'animate__animated animate__backInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutUp'
                }
            }).then(function(){

                Swal.fire({
                    title: "Advertencia",
                    text: "Este formulario no enviara ningún correo electrónico. Solo es un ejemplo.",
                    icon: "error",
                    confirmButtonColor: "#12b886",
                    confirmButtonText: "Terminar!",
                    allowOutsideClick: false,
                    showClass: {
                    popup: 'animate__animated animate__backInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__backOutUp'
                    }
                }).then(function(){
                    window.location = 'presupuesto' 
                });
            });
        @endif

        function enviarBoletin(){
            Swal.fire({
                title: "¡AVISO!",
                text: "No se enviara ningún correo electrónico. Esta función no esta en uso.",
                icon: "info",
                confirmButtonColor: "#12b886",
                confirmButtonText: "Terminar!",
                allowOutsideClick: false,
                showClass: {
                popup: 'animate__animated animate__backInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutUp'
                }
            });
        }

        function buscarInicio(){
            Swal.fire({
                title: "¡AVISO!",
                text: "Esta función no esta en uso.",
                icon: "info",
                confirmButtonColor: "#12b886",
                confirmButtonText: "Terminar!",
                allowOutsideClick: false,
                showClass: {
                popup: 'animate__animated animate__backInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutUp'
                }
            });
        }
        function descubrirInicio(){
            Swal.fire({
                title: "¡AVISO!",
                text: "Esta función no esta en uso.",
                icon: "info",
                confirmButtonColor: "#12b886",
                confirmButtonText: "Terminar!",
                allowOutsideClick: false,
                showClass: {
                popup: 'animate__animated animate__backInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutUp'
                }
            });
        }
    </script>
</html>
