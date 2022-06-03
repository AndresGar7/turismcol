@extends('layouts.layout')

@section('title','Noticias')

@section('content')
    <h1>NOTICIAS</h1>

    <ul>
    @forelse ($noticias as $noticia)    

        <li><a href="{{ route('noticias.show', $noticia) }}">{{ $noticia->title }}</a></li>
        <small>{{ $noticia->description }}</small><br>
        {{ $noticia->created_at->format('d-m-Y') }}<br>
        {{ $noticia->updated_at->diffForHumans() }}<br><br>

    @empty

        <li>No hay paginas para mostrar</li>

    @endforelse
        {{ $noticias->links() }}
</ul>

@endsection