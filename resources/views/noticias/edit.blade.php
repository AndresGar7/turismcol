@extends('adminlte::page')

@section('title', 'Editar | ' . $noticia->title . " | Noticias" )

@section('content_header')
    <h1>Editar Noticia: {{ $noticia->title }}</h1>
@stop

@section('content')
    
    <form method="POST" action="{{ route('noticias.update', $noticia) }}">
        @csrf   @method('PATCH')
        <label for="titulo">Titulo de la Noticia
            <br>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $noticia->title) }}">
        </label><br>
        {!! $errors->first('titulo', '<small>:message</small>') !!} 
        <br>
        <label for="descripcion">Descripcion de la Noticia
            <br>
            <textarea name="descripcion" id="descripcion">{{ old('descripcion', $noticia->description) }}</textarea>
        </label>
        {!! $errors->first('descripcion', '<small>:message</small>') !!}
        <br>
        <button>Actualizar</button>

    </form>

@endsection