@extends('adminlte::page')

@section('title','Perfil')

@section('content_header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Perfil</h1>
        </div>
    </div>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto mb-5">
                <form method="POST"  action="{{  route($funcion, $cliente) }}" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="card card-success shadow-lg">
                        <div class="card-header">
                            <h2 class="card-title fw-bold fs-3 mt-1">Actualización Perfil</h2>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" id="imgPrevizual"  src="{{  asset($cliente->url_img) }}"  alt="Foto Perfil Usuario">
                            </div>
                            <h3 class="profile-username text-center">{{ $cliente->nombre }} {{ $cliente->apellidos }}</h3>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">    
                                        <label class="form-label" for="usuario">Usuario</label>
                                        <input class="form-control" type="text" name="usuario" id="usuario" value="{{ $usuario->usuario }}" disabled>
                                        <input type="hidden" value="{{ $funcion }}" name="modo">
                                    </div>
                                    @error('usuario')
                                        <div class="alert alert-danger">{!! $errors->first('usuario', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="imagen">Cambiar imagen</label>
                                        <input class="form-control @error('imagen') is-invalid @enderror" type="file" onchange="vista_preliminar(event)" name="imagen" id="imagen" accept="image/*" value="{{ old('imagen') }}">
                                    </div>
                                    @error('imagen')
                                        <div class="alert alert-danger">{!! $errors->first('imagen', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="nombre">Nombres</label>
                                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}">
                                    </div>
                                    @error('nombre')
                                        <div class="alert alert-danger">{!! $errors->first('nombre', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="apellidos">Apellidos</label>
                                        <input class="form-control" type="text" name="apellidos" id="apellidos" value="{{ $cliente->apellidos }}">
                                    </div>
                                    @error('apellidos')
                                        <div class="alert alert-danger">{!! $errors->first('apellidos', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="telefono">Teléfono</label>
                                        <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Teléfono" value="{{ old('telefono', $cliente !== 0 ? $cliente->telefono : '') }}">
                                    </div>
                                    @error('telefono')
                                        <div class="alert alert-danger">{!! $errors->first('telefono', '<small>:message</small>') !!}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    @if ($cliente !== 0)
                                        <div class="form-group">
                                            <label class="form-label" for="sexo">Sexo</label>
                                            <select class="form-control" name="sexo" id="sexo">
                                                <option selected value="{{ $cliente->sexo }}">{{ $cliente->sexo  == 'F' ? 'Femenino': 'Masculino' }}</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                        @error('sexo')
                                            <div class="alert alert-danger">{!! $errors->first('sexo', '<small>:message</small>') !!}</div>
                                        @enderror
                                    @else
                                        <div class="form-group">
                                            <label class="form-label" for="sexo">Sexo</label>
                                            <select class="form-control" name="sexo" id="sexo">
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="telefono">Dirección</label>
                                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Dirección" value="{{ old('direccion', $cliente !== 0 ? $cliente->direccion : '') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="sexo">Ciudad</label>
                                        <input class="form-control" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" value="{{ old('ciudad', $cliente !== 0 ? $cliente->ciudad : '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="telefono">Código postal</label>
                                        <input class="form-control" type="number" name="cod_postal" id="cod_postal" placeholder="Cod. Postal" value="{{ old('cod_postal', $cliente !== 0 ? $cliente->cod_postal : '') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label" for="sexo">País</label>
                                        <input class="form-control" type="text" name="pais" id="pais" placeholder="País" value="{{ old('pais', $cliente !== 0 ?  $cliente->pais : '') }}">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script>
    let vista_preliminar = (event) =>{
        let leer_img = new FileReader();
        let id_img  = document.getElementById('imgPrevizual');

        leer_img.onload = () => {
            if(leer_img.readyState == 2){
                id_img.src = leer_img.result,
                id_img.alt = leer_img.result;
            }
        }
        leer_img.readAsDataURL(event.target.files[0]);
    }

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