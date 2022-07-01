@extends('adminlte::page')

@section('title','Cambio Contraseña')

@section('content_header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Cambio Contraseña</h1>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto mb-5">
                    <form method="POST" action="{{ route('perfil.updatePassword', $usuario) }}">
                        @csrf 
                        @method('PATCH')
                        <div class="card card-success shadow-lg">
                            <div class="card-header">
                                <h2 class="card-title fw-bold fs-3 mt-1">Actualización Contraseña</h2>
                            </div>
                            <div class="card-body box-profile">
                                <div class="row mt-2">
                                    <div class="col-md-6 mx-auto">
                                        <div class="form-group">
                                            <label class="form-label" for="contraseña">Contraseña Actual</label>
                                            <input class="form-control form-control-lg @error('contraseña') is-invalid @enderror"" type="text" name="contraseña" id="contraseña" placeholder="Contraseña Actual">
                                        </div>
                                        @error('contraseña')
                                            <div class="alert alert-danger">{!! $errors->first('contraseña', '<small>:message</small>') !!}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 mx-auto">
                                        <div class="form-group">
                                            <label class="form-label" for="contraseña_Nueva">Contraseña Nueva</label>
                                            <input class="form-control form-control-lg @error('contraseña_Nueva') is-invalid @enderror" type="text" name="contraseña_Nueva" id="contraseña_Nueva" placeholder="Contraseña Nueva">
                                        </div>
                                        @error('contraseña_Nueva')
                                            <div class="alert alert-danger">{!! $errors->first('contraseña_Nueva', '<small>:message</small>') !!}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 mx-auto">
                                        <div class="form-group">
                                            <label class="form-label" for="contraseña_Nueva_confirmation">Confirmar Contraseña</label>
                                            <input class="form-control form-control-lg @error('contraseña_Nueva') is-invalid @enderror" type="text" name="contraseña_Nueva_confirmation" id="contraseña_Nueva_confirmation" placeholder="Confirmar Contraseña">
                                        </div>
                                        @error('contraseña_Nueva_confirmation')
                                            <div class="alert alert-danger">{!! $errors->first('contraseña_Nueva_confirmation', '<small>:message</small>') !!}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{$paso}}
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
        </div>
    </section>
@stop

@php
    echo $ejemplo;
@endphp

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    window.location = '/home' 
                });       
            }
        })
    }
</script>
@stop
