@extends('adminlte::page')

@section('title','404 No Found')

@section('content')
    <div class="container bg-dark">
        <div class="row p-5">
            <h1 class="display-1 text-danger text-center">Página no encontrada</h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <a href="/home" class="btn btn-primary">Volver a inicio</a>
        </div>
    </div>

@endsection