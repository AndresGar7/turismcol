@extends('layouts.layout')

@section('title', $noticia->titulo . " | Noticias" )

@section('content_header')
    <h1>Noticia</h1>
@stop

@section('content')
    <div class="fondo">
        <img src="{{ asset($noticia->urlRegion) }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" style="z-index: 1;">
        <div class="bienvenida text-center">
            <div class="col-12">
                <div class="tituloDetalleNoticia mx-auto">
                    <h1 class="title text-center sombra-title" style="font-size: 4.2vw;">{{ $noticia->titulo }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container contenidoNoticia">
        <div class="fondoTexto shadow-lg">
            <div class="container-fluid px-5">
                <div class="row mx-auto<">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="overflow-wrap: break-word;">
                        <p class="textoNoticia">{{ $noticia->texto }}</p>     
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mx-auto mt-5 mb-5">
                    <img class="img-fluid" width="100%" src="{{ asset($noticia->url_img) }}" alt="{{ $noticia->url_img }}">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center mt-1" style="font-size: 1.5vw;"><small>Creado por {{ $noticia->user->nombre }} {{ $noticia->user->apellidos }} {{ $noticia->updated_at->diffForHumans() }} </small></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center" style="font-size: 1.5vw;">Fecha: <small style="color: #08ba85;">{{ date_format($noticia->created_at, 'Y-m-d') }}</small></p>
                        </div>
                    </div>
                    <h3 class="text-center mt-5 font-weight-bold" style="font-size: 3vw;">Región</h3>
                    <p class="text-center" style="color: #08ba85; font-size: 5vw;">{{ $noticia->region }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
