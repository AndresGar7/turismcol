@extends('adminlte::page')

@section('title','Noticias')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Noticias</h1>
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
                            <h3 class="card-title text-dark fw-bold mt-2 fs-5">Administración de Noticias</h3>
                        </div>
                        <div class="card-body">
                            <div class="row p-2 mb-3">
                                <div class="col-lg21 col-sm-12">
                                    <a href="{{ route('noticias.create') }}" class="btn btn-primary fw-bold fs-6">Nueva Noticia</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table id="noticias" class="table table-bordered table-hover shadow display nowrap" style="width:100%">
                                            <thead class="bg-success text-center">
                                                <tr>
                                                    <th class="text-dark">#Noticia</th>
                                                    <th>Titulo Noticia</th>
                                                    <th>Resumen</th>
                                                    <th>Fecha Creación</th>
                                                    <th>Fecha Actualización</th>
                                                    <th>Prioridad</th>
                                                    <th>Operación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($noticias as $noticia)
                                                @php
                                                    $title_modificado = $noticia->titulo;
                                                    $title_modificado = substr($title_modificado, 0, 30);
                                                    $title_modificado = $title_modificado . '...';
                                                @endphp
                                                    <tr class="{{ ($noticia->importancia == 'pri') ? 'table-warning' : ''}}">
                                                        <td class="text-center">{{ $noticia->idNoticia }}</td>
                                                        <td><div class="p">{{ $title_modificado }}</div></td>
                                                        <td><textarea class="form-control" name="res" id="res" cols="50" rows="2" disabled>{{ $noticia->resumen }}</textarea></td>
                                                        <td class="text-center">{{ $noticia->created_at->format('d-m-Y') }}</td>
                                                        <td class="text-center">{{ $noticia->updated_at->format('d-m-Y') }}</td>
                                                        <td class="text-center">{{ ($noticia->importancia == 'pri' ? 'Principal' : 'Secundaria') }}</td>
                                                        <td class="text-center">
                                                            <a class="btn btn-outline-dark btn-lg align-center" href="{{ route('noticias.showAdmin', $noticia) }}">Ver</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No hay noticias para mostrar</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot class="bg-success text-center">
                                                <tr>
                                                    <th class="text-dark">#Noticia</th>
                                                    <th>Titulo Noticia</th>
                                                    <th>Resumen</th>
                                                    <th>Fecha Creación</th>
                                                    <th>Fecha Actualización</th>
                                                    <th>Prioridad</th>
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
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#noticias').DataTable({
                "dom": '<""f>rt<""pl>',
                "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]],
                "responsive": true,
                "language": {
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