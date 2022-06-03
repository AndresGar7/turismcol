@extends('layouts.layout')

@section('title', $noticia->title . " | Noticias" )

@section('content_header')
    <h1>Noticia</h1>
@stop

@section('content')
    <h1>{{ $noticia->title }}</h1>

    <p>{{ $noticia->description }}</p>

    <p><small>{{ $noticia->updated_at->diffForHumans() }}</small></p>
@endsection
