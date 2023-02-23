@extends('adminlte::page')

@section('title', $noticia->titulo . " | Noticias" )

@section('content_header')
    <h1 class="fw-bold fs-1">Noticia</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
           
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary">
                        <h2 class="card-title text-light fw-bold mt-2 fs-3">{{ $noticia->titulo }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3 class="fw-bold fs-4">Resumen:</h3>
                                <p class="fw-normal fs-5">{{ $noticia->resumen }}</p>
                                <h3 class="fw-bold fs-4 ">Descripción:</h3>
                                <p class="fw-normal fs-5" style="text-align: justify; white-space: pre-line;">{{ $noticia->texto }}</p>
                                <h3 class="fw-bold fs-4 mt-5">Creado Por:</h3>
                                <p class="fw-normal fs-5">{{ $noticia->user->nombre }} {{ $noticia->user->apellidos }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="cont-img mx-auto">
                                    <div class="row">
                                        <img class="img-fluid" style="height: 20rem; object-fit:cover;" src="{{ asset($noticia->url_img) }}" alt="{{ $noticia->url_img }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="mt-2"><small><strong>Creado hace: </strong>{{ $noticia->updated_at->diffForHumans() }}</small></p>
                                </div>
                                <div class="row mt-5">
                                    <h3 class="fw-bold fs-4">Región:</h3>
                                    <p class="fw-normal fs-1">{{ $noticia->region }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary d-flex justify-content-between mx-2" href="{{ route('noticias.edit', $noticia) }}">Editar</a>
                            <form id="borrar" method="POST" action="{{ route('noticias.destroy' , $noticia) }}">
                                @csrf @method('DELETE')
                            </form>
                            <button onclick="borrar_noticia()" class="btn btn-danger d-flex justify-content-between mx-2">Eliminar</button>
                            <a class="btn btn-warning d-flex justify-content-between mx-2" href="{{ route('noticias.admin') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')

<script>
    function borrar_noticia() {

        Swal.fire({
            title: "Advertencia",
            text: "¿Esta seguro que desea borrar esta noticia?.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#12b886',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrar!',
            cancelButtonText: 'Cancelar',
            showClass: {
            popup: 'animate__animated animate__backInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutUp'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.getElementById('borrar');
                form.submit();
            }
        });

    }

    function actualizado() {
        Swal.fire({
            title: "¡AVISO!",
            text: "Actualizado satisfactoriamente..!!",
            icon: "success",
            confirmButtonColor: "#12b886",
            confirmButtonText: "Terminar!",
            allowOutsideClick: false,
            showClass: {
            popup: 'animate__animated animate__backInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutUp'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                
            }
        });
    }

    @if (session('status'))
        actualizado();
    @endif


</script>

<script src="{{ asset('js/sweetalert2.all.min.js') }}" defer></script>
@stop