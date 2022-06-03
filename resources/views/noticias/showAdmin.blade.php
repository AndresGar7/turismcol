@extends('adminlte::page')

@section('title', $noticia->title . " | Noticias" )

@section('content_header')
    <h1>Noticia</h1>
@stop

@section('content')
<div class="container bg-info">
    <h1 class="fw-bolder display-3">{{ $noticia->title }}</h1>
    
    <a href="{{ route('noticias.edit', $noticia) }}">Editar</a>
    <form method="POST"  action="{{ route('noticias.destroy' , $noticia) }}">
        @csrf @method('DELETE')
        <button>Eliminar</button>
    </form>

    <p>{{ $noticia->description }}</p>

    <p><small>{{ $noticia->updated_at->diffForHumans() }}</small></p>
</div>
@endsection

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop