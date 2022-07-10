@extends('adminlte::page')

@section('title', $noticia->title . " | Noticias" )

@section('content_header')
    <h1 class="fw-bold fs-1">Noticia</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary">
                    <h2 class="card-title text-light fw-bold mt-2 fs-3">{{ $noticia->titulo }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h3 class="fw-bold fs-4">Resumen:</h3>
                            <p class="fw-normal fs-5">{{ $noticia->resumen }}</p>
                            <h3 class="fw-bold fs-4 ">Descripción:</h3>
                            <p class="fw-normal fs-5">{{ $noticia->texto }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="cont-img mx-auto">
                                <div class="row">
                                    <img class="img-fluid" style="height: 20rem; object-fit:cover;" src="{{ asset($noticia->url_img) }}" alt="{{ $noticia->url_img }}">
                                </div>
                            </div>
                            <div class="row">
                                <p class="mt-2"><small><strong>Creado hace: </strong>{{ $noticia->updated_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary d-flex justify-content-between mx-2" href="{{ route('noticias.edit', $noticia) }}">Editar</a>
                        <form method="POST" action="{{ route('noticias.destroy' , $noticia) }}">
                            @csrf @method('DELETE')
                            <button  class="btn btn-danger d-flex justify-content-between mx-2">Eliminar</button>
                        </form>
                        <a class="btn btn-warning d-flex justify-content-between mx-2" href="{{ route('noticias.admin') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop