@extends('adminlte::page')

@section('title','Perfil')

@section('content')
<section class="content-header">
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Perfil</h1>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form method="POST" class="col-md-10 mx-auto" action="{{ route('perfil.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card card-success card-outline shadow-lg">
                    <div class="card-header">
                        <h2 class="card-title fw-bold fs-5">Actualización Perfil</h2>
                    </div>
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" style="width: 150px;" src="{{ asset('storage/img/perfiles/sin_imagen.png') }}"  alt="Foto Perfil Usuario">
                        </div>
                        <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                        <div class="row mt-4">
                            <div class="col-md-6 mt-2">
                                <label class="form-label" for="email">Correo Electrónico</label>
                                <input class="form-control" type="text" name="email" id="email" value="{{ $usuario[0]->email }}" disabled>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label" for="usuario">Usuario</label>
                                <input class="form-control" type="text" name="usuario" id="usuario" placeholder="lo estoy organizando apenas">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="form-label" for="nombre">Nombre Completo</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ auth()->user()->name }}">
                            </div>
                            @error('nombre')
                                <div class="alert alert-danger">{!! $errors->first('nombre', '<small>:message</small>') !!}</div>
                            @enderror
                            <div class="col-md-6">
                                <label class="form-label" for="imagen">Cambiar imagen</label>
                                <input class="form-control form-control-lg @error('imagen') is-invalid @enderror" type="file" onchange="vista_preliminar(event)" name="imagen" id="imagen" accept="image/*" value="{{ old('imagen') }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary btn-lg mx-3">Guardar</button>
                            <button type="button" onclick="cancelar()" class="btn btn-secondary btn-lg mx-3">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop