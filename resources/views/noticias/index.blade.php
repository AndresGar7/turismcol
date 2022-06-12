@extends('layouts.layout')

@section('title','Noticias')

@section('content')
<div class="fondo">
    <img src="{{ asset('/img/tayronaFondo.jpg') }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" height="auto" style="z-index: 1;">
    <div class="container">
        <div class="bienvenida">
            <div class="row">
                <div class="col-12">
                    <h2 class="sombra-title msg-bienvenida-noticias text-center">TurismCol News</h2>
                    <h2 class="fs-2 mt-3 text-center sombra-title msg-bienvenida-noticias">Descubre las Noticias y novedades de TurismCol</h2>
                </div>
            </div>
        </div>
        @php
            $contador = 0   
        @endphp
        <div class="noticias_principales ">
            <div class="grid">
                @forelse ($noticiasPri as $itemNoticia)   
                    
                    @if ($contador == 0)
                        <div class="col-lg-6 col-md-6 col-sm-12 g-col-6">
                            <a href="#" class="" id="fondoNoticia1">
                                <div class="card card-principal card-principal-up">
                                    <img src="{{ asset($itemNoticia->url_img) }}" class="card-img-top" style="width: auto; heigth: 300px;" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $itemNoticia->title }}</h5>
                                        <p>{{ $itemNoticia->resumen }} </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else 
                        <div class="col-lg-6 col-md-6 col-sm-12 g-col-6">
                            <a href="#" class="" id="fondoNoticia2">
                                <div class="card card-principal card-principal-down">
                                    <img src="{{ asset($itemNoticia->url_img) }}" style="width: auto; heigth: 300px;"  class="card-img-top" alt="">
                                    <div class="card-body">
                                        <p>Lorem ipsum, dolor, ut sunt molestias perspiciatis exercitation</p>
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
            </div>
        </div>
    </div>
</div>

<div class="noticias_secundarias">

    <h1>NOTICIAS</h1>

    <ul>
    @forelse ($noticias as $noticia)    
        @if ($noticia->importancia == 'sec')
            
        <li><a href="{{ route('noticias.show', $noticia) }}">{{ $noticia->title }}</a></li>
        {{$noticia->importancia}}<br>
        <small>{{ $noticia->description }}</small><br>
        {{ $noticia->created_at->format('d-m-Y') }}<br>
        {{ $noticia->updated_at->diffForHumans() }}<br><br>
            
        @endif

    @empty

        <li>No hay paginas para mostrar</li>

    @endforelse
        {{ $noticias->links() }}
</ul>
</div>

@endsection