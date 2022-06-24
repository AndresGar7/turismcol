@extends('adminlte::page')


@section('title', 'Administrador')

@section('content_header')
<div class="row mb-2">
    <div class="col-12">
        <h1 class="fs-1 fw-bold">Administrador TurismCol</h1>
    </div>
</div>
@stop

@section('content')
    @if (!$actualizado->usuario)
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-10 mx-auto">
                        <div class="alert alert-warning alert-dismissible">
                            <h2 class="text-center"><i class="icon fas fa-exclamation-triangle "></i> Por favor completar tu perfil!!!.</h2>
                            <p class="text-center">Para poder mostrar el panel informativo :)</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="fs-1 fw-bold btn btn-success btn-lg" href="{{ route('perfil.admin') }}">Ir Ahora </a>
                </div>
            </div>
        </section>
    @else
        <section class="content">
            <div class="container-fluid">
                <div class="d-flex justify-content-center">
                    <h1 class="fs-1">Aca sigue el resto pero no hay tiempo jajaj</h1>
                </div>
            </div>
        </section>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop