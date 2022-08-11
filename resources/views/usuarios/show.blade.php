@extends('adminlte::page')

@section('title','Usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Creación de usuarios</h1>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8 mx-auto mb-5">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="card card-success shadow-lg">
                        <div class="card-header">
                            <h2 class="card-title fw-bold fs-3 mt-1">Actualización Usuario</h2>
                        </div>
                        <div class="card-body box-profile">
                            <p>Los campos con el simbolo <strong>(*)</strong> son obligatorios.</p>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">    
                                        <label class="form-label" for="email">Correo electrónico (*)</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="Email" value="{{ $usuario->email }}">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{!! $errors->first('email', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">    
                                        <label class="form-label" for="usuario">Usuario</label>
                                        <input class="form-control @error('usuario') is-invalid @enderror" type="text" name="usuario" id="usuario" placeholder="Usuario" value="{{ $usuario->usuario }}" disabled>
                                    </div>
                                    @error('usuario')
                                        <div class="alert alert-danger">{!! $errors->first('usuario', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="nombre">Nombres (*)</label>
                                        <input class="form-control  @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}" placeholder="Nombres">
                                    </div>
                                    @error('nombre')
                                        <div class="alert alert-danger">{!! $errors->first('nombre', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="apellidos">Apellidos (*)</label>
                                        <input class="form-control  @error('apellidos') is-invalid @enderror" type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $usuario->apellidos) }}" placeholder="Apellidos">
                                    </div>
                                    @error('apellidos')
                                        <div class="alert alert-danger">{!! $errors->first('apellidos', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="telefono">Teléfono (*)</label>
                                        <input class="form-control  @error('telefono') is-invalid @enderror" type="number" name="telefono" id="telefono" value="{{ old('telefono', $usuario->telefono) }}" placeholder="Teléfono">
                                    </div>
                                    @error('telefono')
                                        <div class="alert alert-danger">{!! $errors->first('telefono', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="rol">Cargo</label>
                                        <select class="form-control  @error('rol') is-invalid @enderror" name="rol" id="rol">
                                            <option value="{{ $usuario->rol }}">{{ $usuario->rol == 'user' ? 'User' : ($usuario->rol == 'sop' ? 'Admin' : 'Master') }}</option>
                                            <option value="user">User</option>
                                            <option value="sop">Admin</option>
                                        </select>
                                    </div>
                                    @error('rol')
                                        <div class="alert alert-danger">{!! $errors->first('rol', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="password_new">Contraseña (*)</label>
                                        <input class="form-control  @error('password_new') is-invalid @enderror" type="password" name="password_new" id="password_new" placeholder="contraseña">
                                    </div>
                                    @error('password_new')
                                        <div class="alert alert-danger">{!! $errors->first('password_new', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="password_new_confirmation">Confirmar Contraseña (*)</label>
                                        <input class="form-control @error('password_new_confirmation') is-invalid @enderror" type="password" name="password_new_confirmation" id="password_new_confirmation" placeholder="Confirmar Contraseña">
                                    </div>
                                    @error('password_new_confirmation')
                                        <div class="alert alert-danger">{!! $errors->first('password_new_confirmation', '<small>:message</small>') !!}</div>
                                    @enderror
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
@stop

@section('js')
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
                        text: 'No se guardaron los datos.',
                        icon: 'success'
                    }).then(function(){
                        window.location.href = '/usuarios/admin' 
                    });       
                }
            })
        }; 
    </script>
@stop