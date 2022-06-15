@extends('layouts.layout')

@section('title','Noticias')

@section('content')
<div class="fondo">
    <img src="{{ asset('/img/tayronaFondo.jpg') }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" height="auto" style="z-index: 1;">
    <div class="container">
        <div class="bienvenida">
            <div class="row">
                <div class="col text-center">
                    <h2 class="sombra-title msg-bienvenida-noticias">TurismCol News</h2>
                    <h2 class="fs-3 mt-3 text-center sombra-title msg-bienvenida-noticias">Descubre las Noticias y novedades de TurismCol</h2>
                </div>
            </div>
        </div>
        @php
            $contador = 0   
        @endphp
        <div class="noticias_principales ">
            <div class="row">
                @forelse ($noticiasPri as $itemNoticia)   
                    @if ($contador == 0)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <a href="{{ route('noticias.show', $itemNoticia) }}" class="" >
                                <div class="card card-principal shadow mx-auto card-principal-up border-0">
                                    <img src="{{ asset($itemNoticia->url_img) }}" style="width: auto;" class="card-img-top" alt="{{ $itemNoticia->name_img }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold fs-2">{{ $itemNoticia->title }}</h5>
                                        <p class="card-text fs-6 text-dark">{{ $itemNoticia->resumen }} </p>
                                        <span>Creado el/ {{ $itemNoticia->updated_at->format('d-m-Y') }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else 
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <a href="{{ route('noticias.show', $itemNoticia) }}">
                                <div class="card card-principal shadow mx-auto card-principal-down border-0">
                                    <img src="{{ asset($itemNoticia->url_img) }}" style="width: auto;" class="card-img-top" alt="{{ $itemNoticia->name_img }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold fs-2">{{ $itemNoticia->title }}</h5>
                                        <p class="card-text text-dark">{{ $itemNoticia->resumen }} </p>
                                        <span>Creado el/ {{ $itemNoticia->updated_at->format('d-m-Y') }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @php
                    $contador++ 
                    @endphp
                @empty
                    <h2>No Hay Noticias principales</h2>
                @endforelse
                <div class="decoracion"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="noticias_secundarias">
        <div class="row my-5">
            <h2 class="fw-5 text-center sombra-title title ">Otras Noticias</h2>
        </div>
        <div class="row">
            @forelse ($noticias as $noticia)    
                @if ($noticia->importancia == 'sec')
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                        <a href="{{ route('noticias.show', $noticia) }}">
                            <div class="card card-principal shadow mx-auto card-secundario border-0">
                                <img src="{{ asset($noticia->url_img) }}" style="width: auto; heigth: 25vw;" class="car-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold">{{ $noticia->title }}</h5>
                                    <p class="card-text text-dark">{{ $noticia->resumen }} </p>
                                    <span>Creado hace: {{ $noticia->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @empty
                <h2>No hay noticias para mostrar</h2>
            @endforelse
            <div class="form-group mb-5">
                <div class="text-center">
                    {{ $noticias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection