@extends('layouts.layout')

@section('title', $noticia->titulo . " | Noticias" )

@section('content_header')
    <h1>Noticia</h1>
@stop

@section('content')
    <div class="container">
        <div class="row" style="background-color:">
            <div class="tituloDetalleNoticia mx-auto">
                <h1 class=" title text-center sombra-title" style="color: #08ba85;">{{ $noticia->titulo }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
        
                <p style="letter-spacing: 0.1vw; line-height: 1.5vw; font-size: 1.5vw; text-align: justify;">{{ $noticia->texto }}</p>
        
                <p><small>{{ $noticia->updated_at->diffForHumans() }}</small></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

            </div>
        </div>
        <div class="row">
            <div class="container" style="margin-bottom: 20vw;"></div>
        </div>
    </div>
@endsection
