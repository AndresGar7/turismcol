@extends('adminlte::page')

@section('title', 'Crear Noticia')


{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
<div class="row mb-2">
    <div class="col-10">
        <h1 class="fs-1 fw-bold">Creación de Noticias</h1>
    </div>
</div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="container">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="fw-bold">Noticia Nueva</h3>
                        </div>
                        <form method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 pt-4 px-4">
                                            <div class="form-group">
                                                    <label class="form-label" for="titulo">Titulo de la Noticia </label>                                       
                                                    <input type="text" class="form-control form-control-lg @error('titulo') is-invalid @enderror"" name="titulo" id="titulo" value="{{ old('titulo') }}">
                                                </div>
                                                @error('titulo')
                                                    <div class="alert alert-danger">{!! $errors->first('titulo', '<small>:message</small>') !!}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label class="form-label" for="descripcion">Descripcion de la Noticia </label>
                                                    <textarea class="form-control form-control-lg @error('descripcion') is-invalid @enderror" style="line-height: 1.08vw"  rows="13" cols="50" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
                                                </div> 
                                                @error('descripcion')
                                                    <div class="alert alert-danger">{!! $errors->first('descripcion', '<small>:message</small>') !!}</div>
                                                @enderror
                                            </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="cont-img mx-auto">
                                                <div class="row d-flex">
                                                    <img src="{{ asset('img/sinImagen.png') }}" style="height: 15rem; width: 20rem; margin:auto;" class="pt-4 px-4" alt="calima">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="label" for="imagen">Imagen Noticia</label>
                                                    <input class="form-control btn-primary form-control-lg @error('imagen') is-invalid @enderror" type="file" name="imagen" id="imagen" accept="image/*" value="{{ old('imagen') }}">
                                                </div>
                                                @error('imagen')
                                                        <div class="alert alert-danger">{!! $errors->first('imagen', '<small>:message</small>') !!}</div>
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary btn-lg mx-3">Guardar</button>
                                    <button type="button" onclick="cancelar()" class="btn btn-secondary btn-lg mx-3">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}
@stop

@section('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script> --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    function cancelar(){
        Swal.fire({
                title: 'Esta seguro?',
                text: "Los cambios realizados se perderan!",
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                cancelButtonAriaLabel: 'Cancelar',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, deseo salir!',
                allowOutsideClick: false
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Realizado!',
                    text: 'No se guardo esta noticia.',
                    icon: 'success'
                }).then(function(){
                    window.location = 'admin' 
                });       
            }
        })
    }
</script>
@stop