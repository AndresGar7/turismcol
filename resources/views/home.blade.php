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
                                                    <h3>150</h3>
                                                    <p>New Orders</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                                    <p>Bounce Rate</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>44</h3>
                                                    <p>User Registrations</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>65</h3>
                                                    <p>Unique Visitors</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-pie-graph"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                            <h3>150</h3>
                                            <p>New Orders</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                                            <p>Bounce Rate</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>44</h3>
                                            <p>User Registrations</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>65</h3>
                                            <p>Unique Visitors</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <div class="col-6">

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
@stop


@section('js')
    
@stop