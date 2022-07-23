@extends('adminlte::page')

@section('title', 'Crear Cita')


{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Administración de Citas</h1>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title text-dark fw-bold mt-2 fs-5">Administración de Citas</h3>
                            <input type="text" class="form-control col-1" name="rol" id="rol" value="{{ Auth::user()->rol }}" hidden>
                            <input type="text" class="form-control col-1" name="num_user" id="num_user" value="{{ Auth::user()->idUser }}" hidden>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 px-md-4">
                                        <div class="mx-auto col-sm-12" id="calendar"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="cita" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formulario">
                            @csrf
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <select class="form-control" name="idUser" id="idUser">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->idUser }}">{{ $usuario->usuario }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <input type="text" class="form-control" name="idUser" id="idUser" value="{{ Auth::user()->idUser }}" hidden>
                            </div> --}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="idCita" id="idCita" hidden>
                            </div>
                            <div class="form-group">
                                <label for="title">Titulo de la cita</label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Titulo">
                                <br>
                                <div class="alert alert-danger" id="alertTitle"></div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Agregar descripción de la cita"></textarea>
                                <br>
                                <div class="alert alert-danger pt-2" id="alertDescripcion"></div>
                            </div>
                            <div class="form-group">
                                <label for="start">Fecha</label>
                                <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" min=@php $hoy=date("Y-m-d"); echo $hoy; @endphp >
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" hidden>
                            </div>
                            <div class="alert alert-danger" id="fechaVencida"><small>La cita seleccionada se encuentra vencida.</small></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                        <button type="button" class="btn btn-info" id="btnActualizar">Actualizar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.js"></script> --}}
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/locales-all.js') }}" defer></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
@stop