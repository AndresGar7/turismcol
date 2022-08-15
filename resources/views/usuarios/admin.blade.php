@extends('adminlte::page')

@section('title','Usuarios')

@section('plugins.Datatables', true)

@section('content_header')
<div class="row mb-2">
    <div class="col-12">
        <h1 class="fs-1 fw-bold">Usuarios</h1>
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
                        <h3 class="card-title text-dark fw-bold mt-2 fs-5">Administración de Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <div class="row p-2 mb-3">
                            <div class="col-lg-12 col-sm-12">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary fw-bold fs-6">Nuevo Usuario</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="table-responsive">
                                    <table id="noticias" class="table table-bordered table-hover shadow display nowrap" style="width:100%">
                                        <thead class="bg-success text-center">
                                            <tr>
                                                <th class="text-dark">Usuario#</th>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Rango</th>
                                                <th>Fecha Creación</th>
                                                <th>Fecha Actualización</th>
                                                <th>Rol</th>
                                                <th>Operación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                            <tr class="{{ ($usuario->rol == 'sop' ? 'table-warning' : ($usuario->rol == 'admin' ? 'table-info' : '')) }}">
                                                <td class="text-center">{{ $usuario->idUser }}</td>
                                                <td><div class="p">{{ $usuario->usuario }}</div></td>
                                                <td class="text-center">{{ $usuario->nombre }} {{$usuario->apellidos}}</td>
                                                <td class="text-center">{{ ($usuario->rol == 'sop' ? 'Administrador' : ($usuario->rol == 'user' ? 'Usuario' : 'Master'))}}</td>
                                                <td class="text-center">{{ $usuario->created_at }}</td>
                                                <td class="text-center">{{ $usuario->updated_at }}</td>
                                                <td class="text-center">{{ $usuario->rol }}</td>
                                                <td class="text-center">
                                                    @if ($usuario->rol !== 'admin')
                                                    <a class="btn btn-outline-dark btn-lg align-center" href="{{ route('usuarios.show', $usuario->idUser) }}">Ver</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="bg-success text-center">
                                            <tr>
                                                <th class="text-dark">Usuario#</th>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Rango</th>
                                                <th>Fecha Creación</th>
                                                <th>Fecha Actualización</th>
                                                <th>Rol</th>
                                                <th>Operación</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('#noticias').DataTable({
                "lengthMenu": [[5,10,50,-1],[5,10,20,"All"]],
                responsive: true,
                language: {
                    "lengthMenu": 'Mostrar _MENU_  registros por página',
                    "zeroRecords": 'Nada Encontrado - perdón',
                    "info": 'Mostrando página _PAGE_ de _PAGES_',
                    "infoEmpty": 'No hay registros disponibles',
                    "infoFiltered": '(Filtrado de _MAX_ registros totales)',
                    "search": 'Buscar',
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                },
            });
        });
    </script>
@stop