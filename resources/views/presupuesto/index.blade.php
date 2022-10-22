@extends('layouts.layout')

@section('title','Presupuesto')

@section('content')
    <div class="fondo">
        <img src="{{ asset('/img/fondoPresupuesto.jpg') }}" alt="Fondo Pueblo Guatape" class="d-block" width="100%" height="auto" style="z-index: 1;">
        <div class="bienvenida">
            <h2 class="sombra-title msg-bienvenida-noticias text-center">Presupuesto</h2>
        </div>
    </div>
    <div class="container presupuesto">
        <div class="row py-3">
            <div class="col-6 mx-auto">
                <div class="card card-primary shadow-lg">
                    <div class="card-header bg-primary">
                        <h3 class="card-title title2">Datos Contacto</h3>
                    </div>
                    <form method="POST" action="{{ route('presupuesto.sendMail') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group pb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Ingresé su nombre" value="{{ old('nombre') }}">
                            </div>
                            @error('nombre')
                                <div class="alert alert-danger">{!! $errors->first('nombre', '<small>:message</small>') !!}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label for="apellido">Apellidos</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" placeholder="Ingresé su apellido" value="{{ old('apellido') }}">
                            </div>
                            @error('apellido')
                                <div class="alert alert-danger">{!! $errors->first('apellido', '<small>:message</small>') !!}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingresé su correo electrónico" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{!! $errors->first('email', '<small>:message</small>') !!}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label for="telefono">Teléfono</label>
                                <input type="number" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="Ingresé su teléfono" value="{{ old('telefono') }}">
                            </div>
                            @error('telefono')
                                <div class="alert alert-danger">{!! $errors->first('telefono', '<small>:message</small>') !!}</div>
                            @enderror
                            <div class="form-group pb-3">
                                <label for="concepto">¿Qué quieres saber?</label>
                                <textarea class="form-control @error('concepto') is-invalid @enderror" name="concepto" id="concepto" cols="30" rows="5" placeholder="Escriba concretamente lo que desea saber."></textarea>
                            </div>
                            @error('concepto')
                                <div class="alert alert-danger">{!! $errors->first('concepto', '<small>:message</small>') !!}</div>
                            @enderror
                            <div class="form-check pb-3">
                                <input type="checkbox" class="form-check-input" id="checkPresupuesto">
                                <label class="form-check-label" for="checkPresupuesto">Autorización de datos personales.</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="enviarPresupuesto" disabled>Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection