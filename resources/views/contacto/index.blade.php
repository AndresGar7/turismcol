@extends('layouts.layout')

@section('title','Contacto')

@section('content')
    <div class="fondo">
        <img src="{{ asset('/img/tatacoa.jpg') }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" height="auto" style="z-index: 1;">
        <div class="bienvenida">
            <h2 class="sombra-title msg-bienvenida-noticias text-center">Sobre Nosotros</h2>
        </div>
    </div>
    <div class="container contacto">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card shadow-lg">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-center title2">Nuestra Ubicación</h3>
                            </div>
                            <div class="card-body">
                                <div class="imgMapa">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d799.5042619949338!2d-4.425046170784596!3d36.722151798747795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f7bdf287111d%3A0xa769fc2b5fa55657!2zQy4gQ2FycmV0ZXLDrWEsIDIyLCAyOTAwOCBNw6FsYWdh!5e0!3m2!1ses!2ses!4v1665159109253!5m2!1ses!2ses" style="border:0; width:25vw; height:25vw;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-center title2">Más Sobre Nosotros</h3>
                            </div>
                            <div class="card-body">
                                <div class="datos" style="margin-top: 5vw;"> 
                                    <div class="menuAbout">
                                        <a href="#titleUbicacion" id="nosotros" class="eleccion" onclick="contenido('nosotros')">Nosotros</a>
                                        <a href="#titleUbicacion" id="mision" onclick="contenido('mision')">Misión</a>
                                        <a href="#titleUbicacion" id="vision" onclick="contenido('vision')">Visión</a>
                                    </div>
                                    <div class="contenidoAbout">
                                        <hr>
                                        <p style="font-size:1vw" id="contenido">Somos una empresa seria y muy responsable con los clientes que quieren utilizar nuestros servicios para poder conocer los grandiosos lugares que ofrecemos dentro de nuestro lindo territorio colombiano. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="containter-fluid">
        <div class="row">
            <div class="masDatos shadow-lg">
                <div class="titleMasDatos">
                    <h2>Cifras clave de TurismCol</h2>
                </div>
                <div class="iconosMasDatos">
                    <div class="cajaPor5">
                        <img src="../img/ubicacion.png" alt="lugares">
                        <h2>130</h2>
                        <p>Destinos</p>
                    </div>
                    <div class="cajaPor5">
                        <img src="../img/insignia.png" alt="primer lugar">
                        <h2>250 Agencias</h2>
                        <p>Locales</p>
                    </div>
                    <div class="cajaPor5">
                        <img src="../img/aeroplano.png" alt="avion">
                        <h2>350 Ideas</h2>
                        <p>De viajes</p>
                    </div>
                    <div class="cajaPor5">
                        <img src="../img/todo_bien.png" alt="todo bien">
                        <h2>7.000 Viajeros </h2>
                        <p>Que han confiado en nosotros</p>
                    </div>
                    <div class="cajaPor5">
                        <img src="../img/comunidad.png" alt="comunidad">
                        <h2>15.000 Miembros</h2>
                        <p>De la comunidad TurismCol</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
