@extends('layouts.layout')

@section('title','Galeria')

@section('content')
    <div class="fondo espaciado">
        <img src="{{ asset('/img/guatape1.jpg') }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" height="auto" style="z-index: 1;">
        <div class="bienvenida text-center">
            <div class="tamanoEspacio mx-auto">
                <h2 class="sombra-title msg-bienvenida">Imagenes de algunos de los mejores lugares de nuestra Colombia</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="carrusel-foto">
            <div class="container-carrusel" id="foto">
                <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs" data-transition="crossfade" data-loop="true" data-autoplay="1900" data-stopautoplayontouch="false">
                    <img src="../img/slider/1.jpg" data-caption="CABO DE LA VELA Y PUNTA GALLINAS" alt="CABO DE LA VELA Y PUNTA GALLINAS">
                    <img src="../img/slider/2.jpg" data-caption="ISLA GRANDE DESDE CARTAGENA" alt="ISLA GRANDE DESDE CARTAGENA">
                    <img src="../img/slider/3.jpg" data-caption="ASCENSO AL NEVADO DEL COCUY" alt="ASCENSO AL NEVADO DEL COCUY">
                    <img src="../img/slider/4.jpg" data-caption="RÍO LA MIEL" alt="RÍO LA MIEL">
                    <img src="../img/slider/5.jpg" data-caption="DESIERTO DE LA TATACOA" alt="DESIERTO DE LA TATACOA">
                    <img src="../img/slider/6.jpg" data-caption="TERMALES DE LA CABAÑA" alt="TERMALES DE LA CABAÑA">
                    <img src="../img/slider/7.jpg" data-caption="NUQUÍ EN TEMPORADA DE BALLENAS" alt="NUQUÍ EN TEMPORADA DE BALLENAS">
                    <img src="../img/slider/8.jpg" data-caption="SAN JOSÉ DEL GUAVIARE" alt="SAN JOSÉ DEL GUAVIARE">
                    <img src="../img/slider/9.jpg" data-caption="RAFTING EN EL CAÑÓN DEL RÍO GÜEJAR" alt="RAFTING EN EL CAÑÓN DEL RÍO GÜEJAR">
                    <img src="../img/slider/10.jpg" data-caption="CASCADA FIN DEL MUNDO Y CAÑÓN DEL MANDIYACO" alt="CASCADA FIN DEL MUNDO Y CAÑÓN DEL MANDIYACO">
                    <img src="../img/slider/11.jpg" data-caption="CERROS DE MAVICURE Y ESTRELLA FLUVIAL DE INÍRIDA" alt="CERROS DE MAVICURE Y ESTRELLA FLUVIAL DE INÍRIDA">
                    <img src="../img/slider/12.jpg" data-caption="VALLE DEL COCORA, FILANDIA Y TOCHE" alt="VALLE DEL COCORA, FILANDIA Y TOCHE">
                    <img src="../img/slider/13.jpg" data-caption="BARICHARA" alt="BARICHARA">
                    <img src="../img/slider/14.jpg" data-caption="MANGLARES Y CASCADAS" alt="MANGLARES Y CASCADAS">
                    <img src="../img/slider/15.jpg" data-caption="MOCAGUA, VISTA ALEGRE Y PUERTO NARIÑO" alt="MOCAGUA, VISTA ALEGRE Y PUERTO NARIÑO">
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row pb-4">
            <h2 class="fw-bold display-6 text-center">¡Encuentra tu destino con nuestras propuestas de viaje!</h2>
        </div>
        <div class="row mx-auto">
            <div class="contayner">
                <div class="labelContainer">
                    <div class="cajaD cajaDer" onclick="traerFotos('Antioquia')">
                        <input type="radio" name="radio" id="Antioquia" checked>                     
                        <div class="span  spanDer" id="spanDer">
                            <img src="../img/antioquia.png" alt="Antioquia">
                            <p class="fw-bold">Antioquia</p>
                        </div>
                    </div>
                    <div class="cajaD" onclick="traerFotos('San_Andres')">
                        <input type="radio" name="radio" id="San_Andres">
                        <div class="span">
                            <img src="../img/san_andres.png" alt="San Andres">
                            <p class="fw-bold">San Andrés</p>
                        </div>
                    </div>
                    <div class="cajaD" onclick="traerFotos('Bolivar')">
                        <input type="radio" name="radio" id="Bolivar">
                        <div class="span">
                            <img src="../img/bolivar.png" alt="Bolivar">
                            <p class="fw-bold">Bolivar</p>
                        </div>
                    </div>
                    <div class="cajaD" onclick="traerFotos('Quindio')">
                        <input type="radio" name="radio" id="Quindio">
                        <div class="span">
                            <img src="../img/quindio.png" alt="Quindio">
                            <p class="fw-bold">Quindio</p>
                        </div>
                    </div>
                    <div class="cajaD" onclick="traerFotos('Cundinamarca')">
                        <input type="radio" name="radio" id="Cundinamarca">
                        <div class="span">
                            <img src="../img/cundinamarca.png" alt="Cundinamarca">
                            <p class="fw-bold">Cundinamarca</p>
                        </div>
                    </div>
                    <div class="cajaD" onclick="traerFotos('Magdalena')">
                        <input type="radio" name="radio" id="Magdalena">
                        <div class="span">
                            <img src="../img/magdalena.png" alt="Magdalena">
                            <p class="fw-bold">Magdalena</p>
                        </div>
                    </div>
                    <div class="cajaD" onclick="traerFotos('Guajira')">
                        <input type="radio" name="radio" id="Guajira">
                        <div class="span">
                            <img src="../img/guajira.png" alt="Guajira">
                            <p class="fw-bold">Guajira</p>
                        </div>
                    </div>
                    <div class="cajaD cajaIzq" onclick="traerFotos('Choco')"> 
                        <input type="radio" name="radio" id="Choco">
                        <div class="span spanIzq" id="spanIzq">
                            <img src="../img/quibdo.png" alt="Choco">
                            <p class="fw-bold">Chocó</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 mb-5">
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/Antioquia1.jpg')}}" class="card-img-top img-fluid" style="height: 15rem;"  alt="Piedra del Peñol" id="foto1">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold" id="nombre0">Guatape</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/Antioquia2.jpg')}}" class="card-img-top img-fluid" style="height: 15rem;" alt="Bosko Guatape" id="foto2">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold" id="nombre1">Bosko</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/Antioquia3.jpg')}}" class="card-img-top" style="height: 15rem;" alt="Medellin en metroCable" id="foto3">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold" id="nombre2">MetroCable</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/Antioquia4.jpg')}}" class="card-img-top" style="height: 15rem;" alt="Hacienda Napoles" id="foto4">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold" id="nombre3">Hacienda Napoles</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="fondo2 espaciado2">
        <img src="{{ asset('/img/fauna.jpg') }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" style="z-index: 1;">
        <div class="container-fluid px-5">
            <div class="row mx-auto">
                <div class="contenido-fauna p">
                    <h2 class="display-6 fw-bolder pt-2 sombra-title-verde text-center">En TurismCol hay muchas maneras de viajar.</h2>
                    <p>Existen muchas maneras de viajar para nuestros paradisiacos destinos.  Solo dinos la forma en que lo quieres hacer y te garantizaremos una gran experiencia en el transcurso del viaje a tu destino final.  Y a medida que vas recorriendo nuestros espectaculares centros turisticos te encontraras y observaras nuestra gran variedad, grandiosa y maravillosa fauna silvestre.  No lo pienses más. y ven a disfrutar de este grandioso pais, que te espera con los brazos abiertos. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 mb-5">
        <h2 class="fw-bold display-5 text-center pb-5">Otras opciones de viaje</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/termales.jpg') }}" class="card-img-top img-fluid" style="height: 15rem;" alt="Termales Santa Rosa">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold">Termales De Santa Rosa</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/calima.jpg') }}" class="card-img-top img-fluid" style="height: 15rem;" alt="">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold">Lago Calima</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/san_cipriano.jpg') }}" class="card-img-top img-fluid" style="height: 15rem;" alt="">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold">San Cipriano</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="#">
                    <div class="card border-0 tocado w-100">
                        <img src="{{ asset('/img/nevado.jpg') }}" class="card-img-top img-fluid" style="height: 15rem;" alt="">
                        <div class="card-body">
                            <p class="card-text fs-4 text-center text-dark fw-bold">Nevado del Ruiz</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection