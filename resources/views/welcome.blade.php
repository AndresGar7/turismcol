@extends('layouts.layout')

@section('title','Inicio')

@section('content')
    <div class="fondo">
        <img src="{{ asset('/img/guatape.jpg') }}" alt="Fondo Guatape" class="d-block" width="100%" height="auto">
        <div class="container">
            <div class="bienvenida">
                <h2 class="display-5 sombra-title msg-bienvenida">Un viaje único hacia los paisajes y culturas más hermosas de Colombia</h2>
            </div>
            <div class="buscar">
                <div class="input-group input-group-lg mb-3">
                    <input type="text" class="form-control" placeholder="¿A donde quieres ir?" aria-label="¿A donde quieres ir?" aria-describedby="btn-buscar">
                    <button class="btn btn-primary btn-md  fs-5 btn-buscar" type="button" id="btn-buscar" onclick="buscarInicio()">Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-success bg-opacity-75">
        <div class="container px-5">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-5 col-sm-12 mt-3 mx-auto text-center">
                    <i class="fa-solid fa-hands-holding-circle fa-3x"></i>
                    <h2 class="fs-1" ><strong>Más responsable</strong></h2>
                    <p class="parrafo-largo">Viajamos con seguridad hacia nuestros lugares de destino, generando una gran confianza con nuestros clientes.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3 mx-auto text-center">
                    <i class="fa-solid fa-award fa-3x"></i>
                    <h2 class="fs-1" ><strong>Original y único</strong></h2>
                    <p class="parrafo-largo">Todos nuestros servicios están 100% garantizados gracias al gran conocimiento sobre nuestros sitios turisticos.</p>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-12 mt-3 mx-auto text-center">
                    <i class="fa-solid fa-location-dot fa-3x"></i>
                    <h2 class="fs-1"><strong>Localización</strong></h2>
                    <p class="parrafo-largo">Todo lo que necesites encontrar sera muy facil de localizar.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 pb-3">
        <div class="row">
            <div class="mx-auto">
                <h2 class="fw-bold display-6">Mejores lugares: ¿Dónde, cuándo y cómo?</h2>
                <p class="fs-5">¿Quieres viajar de forma más auténtica y responsable?</p>
                <p class="fs-5 parrafo-largo">Vive experiencias únicas junto a nuestros expertos y expertas locales, y descubre nuestros consejos y recomendaciones para viajar de forma respetuosa con el entorno y la cultural local.</p>        
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <img src="{{ asset('img/playa_blanca.jpg') }}" class="card-img p-0 m-0 tamaño-img" alt="Playa Blanca">
                    <div class="card-img-overlay">
                        <div class="bajar-cont-card">
                            <h5 class="card-title ps-3 text-light fs-1 fw-bold sombra-title">Escaparse ahora</h5>
                            <p class="card-text ps-3 text-light fs-5 sombra-title">Destinos donde viajar</p>
                            <a href="#" class="btn btn-outline-primary btn-large ms-3 fs-5 border-2">Descubrir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <img src="{{ asset('img/valle_cocora.jpg') }}" class="card-img p-0 m-0 tamaño-img" alt="Valle Cocora">
                    <div class="card-img-overlay">
                        <div class="bajar-cont-card px-2">
                            <h5 class="card-title ps-3 text-light fs-1 fw-bold sombra-title">Respiración pura</h5>
                            <p class="card-text ps-3 text-light fs-5 sombra-title">Paisajes verdes con climas estupendos</p>
                            <a href="#" class="btn btn-outline-primary btn-large ms-3 fs-5 border-2">Descubrir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="card border-0 shadow" style="height: auto;">
                    <img src="{{ asset('img/guajira.jpg') }}" class="card-img p-0 m-0 tamaño-img"  alt="La Gaujira">
                    <div class="card-img-overlay">
                        <div class="bajar-cont-card">
                            <h5 class="card-title ps-3 text-light fs-1 fw-bold sombra-title">Buenas culturas</h5>
                            <p class="card-text ps-3 text-light fs-5 sombra-title">Conoce nuestra riqueza cultural</p>
                            <a href="#" class="btn btn-outline-primary btn-large ms-3 fs-5 border-2">Descubrir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 pb-3">
        <h2 class="fw-bold display-6">Prepara junto a un compañero un viaje unico e irrepetible.</h2>
        <p class="fs-5 parrafo-largo">TurismCol te ofrece un programa especial para ayudarte a organizar tu próximo viaje con total tranquilidad. Consigue un reembolso gratuito hasta 30 días antes de la fecha de salida o aplaza tu viaje hasta el último momento, con una selección de agencias locales.</p>
        <ul class="list-unstyled">
            <li class="align-items-center"><i class="text-success fa-solid fa-circle-check fa-lg me-2 "></i><strong class="fs-5  parrafo-largo">Aplazamiento de tus vacaciones hasta el ultimo momento sin costo adicional.</strong></li>
            <li><i class="text-success fa-solid fa-circle-check fa-lg me-2"></i><strong class="fs-5  parrafo-largo">Cancelación gratuita hasta 13 días antes de la salida.</strong></li>
        </ul>
        <a class="text-decoration-underline fs-4" href="#">Más información</a>
    </div>
@stop