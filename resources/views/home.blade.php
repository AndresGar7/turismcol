@extends('adminlte::page')


@section('title', 'Administrador')

@section('content_header')
    @if ($usuario->rol == 'user')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Mi Panel</h1>
        </div>
    </div>
    @else
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="fs-1 fw-bold">Administrador TurismCol</h1>
        </div>
    </div>
    @endif
@stop

@section('content')
    @if ($masDatos[0]->contador)
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
        @if ($usuario->rol == 'user') 
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-success shadow-lg">
                        <div class="card-header">
                            <h2 class="card-title fw-bold fs-3 mt-1">Panel Informativo</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card card-success card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($masDatos[0]->url_img) }}" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">{{ $masDatos[0]->nombre }} {{ $masDatos[0]->apellidos }}</h3>
                                            <p class="text-muted text-center">{{ strtoupper($usuario->rol) }}</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Usuario</b> <a class="float-right">{{ $masDatos[0]->email }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Fec. Nacimiento</b> <a class="float-right">{{ $masDatos[0]->fec_nac }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Telefono</b> <a class="float-right">{{ $masDatos[0]->telefono }}</a>
                                                </li>
                                            </ul>
                                            <a href="{{ route('perfil.admin') }}" class="btn btn-primary btn-block"><b>Ver Perfil</b></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{ !empty($citasRealizar) ? $citasRealizar : '0' }}</h3>
                                                    <p>Citas Futuras</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>{{ $masDatos[0]->created_at->diffForHumans() }}</h3>
                                                    <p>Me Registre</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>{{ !empty($citasHoy) ? $citasHoy : '0' }}</h3>
                                                    <p>Citas Hoy</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>{{!empty($citasVencidas) ? $citasVencidas : '0'}}</h3>
                                                    <p>Citas Vencidas</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-pie-graph"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="callout callout-success">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5>Bienvenido a TurismCol!</h5>
                                                    <p>El perfil se encuentra actualizado.</p>
                                                </div>
                                                <div class="col-6 mx-auto">
                                                    <a href="{{ route('index') }}" class="float-center" style="color:forestgreen; font-weight:bold;"><h1>Página Web.</h1></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-success shadow-lg">
                        <div class="card-header">
                            <h2 class="card-title fw-bold fs-3 mt-1">Panel Informativo</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ !empty($noticias) ? $noticias : '0' }}</h3>
                                            <p>Noticias Creadas</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-solid fa-newspaper"></i>
                                        </div>
                                        <a href="{{ route('noticias.admin') }}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ !empty($citas) ? $citas : '0' }}</h3>
                                            <p>Citas Creadas</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-light fa-calendar"></i>
                                        </div>
                                        <a href="{{ route('citas.admin') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{ !empty($clientes) ? $clientes : '0' }}</h3>
                                            <p>Clientes Registrados</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <a href="{{ route('usuarios.admin') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>{{ !empty($clienUsuario) ? $clienUsuario : '0' }}</h3>
                                            <p>Usuarios Creados</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-solid fa-helmet-safety"></i>
                                        </div>
                                        <a href="{{ route('usuarios.admin') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card card-success card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($masDatos[0]->url_img) }}" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">{{ $masDatos[0]->nombre }} {{ $masDatos[0]->apellidos }}</h3>
                                            <p class="text-muted text-center">{{ strtoupper($usuario->rol) }}</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Usuario</b> <a class="float-right">{{ $masDatos[0]->email }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Fec. Nacimiento</b> <a class="float-right">{{ $masDatos[0]->fec_nac }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Telefono</b> <a class="float-right">{{ $masDatos[0]->telefono }}</a>
                                                </li>
                                            </ul>
                                            <a href="{{ route('perfil.admin') }}" class="btn btn-primary btn-block"><b>Ver Perfil</b></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mx-auto">
                                    <div class="container-carrusel2" id="foto">
                                        <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs" data-transition="crossfade" data-loop="true" data-autoplay="1900" data-stopautoplayontouch="false">
                                            <img src="../img/slider/1.jpg" data-caption="CABO DE LA VELA Y PUNTA GALLINAS" alt="CABO DE LA VELA Y PUNTA GALLINAS">
                                            <img src="../img/slider/2.jpg" data-caption="ISLA GRANDE DESDE CARTAGENA" alt="ISLA GRANDE DESDE CARTAGENA">
                                            <img src="../img/slider/3.jpg" data-caption="ASCENSO AL NEVADO DEL COCUY" alt="ASCENSO AL NEVADO DEL COCUY">
                                            <img src="../img/slider/4.jpg" data-caption="RÍO LA MIEL" alt="RÍO LA MIEL">
                                            <img src="../img/slider/5.jpg" data-caption="DESIERTO DE LA TATACOA" alt="DESIERTO DE LA TATACOA">
                                            <img src="../img/slider/6.jpg" data-caption="TERMALES DE LA CABAÑA" alt="TERMALES DE LA CABAÑA">
                                            <img src="../img/slider/7.jpg" data-caption="NUQUÍ EN TEMPORADA DE BALLENAS" alt="NUQUÍ EN TEMPORADA DE BALLENAS">
                                            <img src="../img/slider/8.jpg" data-caption="SAN JOSÉ DEL GUAVIARE" alt="SAN JOSÉ DEL GUAVIARE">
                                            <img src="../img/slider/9.jpg" data-caption="RAFTING EN EL CAÑÓN DEL RÍO GÜEJAR" alt="RAFTING EN EL CAÑÓN DEL RÍO GÜEJAR">
                                            <img src="../img/slider/10.jpg" data-caption="CASCADA FIN DEL MUNDO Y CAÑÓN DEL MANDIYACO" alt="CASCADA FIN DEL MUNDO Y CAÑÓN DEL MANDIYACO">
                                            <img src="../img/slider/11.jpg" data-caption="CERROS DE MAVICURE Y ESTRELLA FLUVIAL DE INÍRIDA" alt="CERROS DE MAVICURE Y ESTRELLA FLUVIAL DE INÍRIDA">
                                            <img src="../img/slider/12.jpg" data-caption="VALLE DEL COCORA, FILANDIA Y TOCHE" alt="VALLE DEL COCORA, FILANDIA Y TOCHE">
                                            <img src="../img/slider/13.jpg" data-caption="BARICHARA" alt="BARICHARA">
                                            <img src="../img/slider/14.jpg" data-caption="MANGLARES Y CASCADAS" alt="MANGLARES Y CASCADAS">
                                            <img src="../img/slider/15.jpg" data-caption="MOCAGUA, VISTA ALEGRE Y PUERTO NARIÑO" alt="MOCAGUA, VISTA ALEGRE Y PUERTO NARIÑO">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fotorama.css') }}" rel="stylesheet">
@stop


@section('js')
<script src="{{ asset('js/fotorama.js') }}" defer></script>
{{-- <script src="{{ asset('js/myScripts.js') }}" defer></script> --}}
@stop