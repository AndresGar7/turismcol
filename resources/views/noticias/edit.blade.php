@extends('adminlte::page')

@section('title', 'Editar | ' . $noticia->title . " | Noticias" )

@section('content_header')
    <h1>Editar Noticia:</h1>
@stop

@section('content')
    <div class="container">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="fw-70 mb-0">{{ $noticia->title }}</h3>
            </div>
            <form method="POST" action="{{ route('noticias.update', $noticia) }}" enctype="multipart/form-data">
                @csrf   @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 pt-4 px-4">
                            <div class="mb-3">
                                <label for="titulo">Titulo de la Noticia</label>
                                <input class="form-control mb-4" type="text" name="titulo" id="titulo" value="{{ old('titulo', $noticia->titulo) }}">
                                {!! $errors->first('titulo', '<small>:message</small>') !!} 
                                <label for="descripcion">Descripcion de la Noticia</label>
                                <textarea class="form-control" name="descripcion" cols="70" rows="10" id="descripcion">{{ old('descripcion', $noticia->texto) }}</textarea>
                                {!! $errors->first('descripcion', '<small>:message</small>') !!}
                            </div>
                            <div class="form-group col-lg-7 col-sm-12">
                                <label class="form-label" for="region">Región de la noticia</label> 
                                <select class="form-select  @error('region') is-invalid @enderror" name="region" id="region">
                                    <option value="{{ $noticia->region }}">{{ $noticia->region }}</option>
                                    @foreach ( $regiones as $region )
                                        <option value="{{ $region->nombre }}">{{ $region->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('region')
                                <div class="alert alert-danger">{!! $errors->first('region', '<small>:message</small>') !!}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 pt-4 px-4">
                            <label for="imagen">Imagen de la noticia</label>
                            <div class="cont-img mx-auto">
                                <div class="row d-flex">
                                    <img src="{{ asset($noticia->url_img) }}" style="height: 18rem; object-fit:cover;" id="imgPrevizual" style="height: 15rem; width: 20rem; margin:auto;" class="pt-4 px-4" alt="{{ asset($noticia->url_img) }}">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control btn-primary pt-2 @error('imagen') is-invalid @enderror" type="file" onchange="vista_preliminar(event)" name="imagen" id="imagen" accept="image/*" value="{{ old('imagen') }}">
                                </div>
                                @error('imagen')
                                        <div class="alert alert-danger">{!! $errors->first('imagen', '<small>:message</small>') !!}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="importancia">Prioridad:</label>
                                            <select class="form-select" name="importancia" id="importancia"  {{ ($cantidad == 2 && $noticia->importancia == 'sec') ? 'Disabled' : '' }}>
                                                <option  selected value="{{ $noticia->importancia }}">{{ $noticia->importancia == 'pri' ? 'Principal' : 'Secundario'}}</option>
                                                <option value="sec">Secundario</option>
                                                <option value="pri">Principal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row mt-4 d-flex justify-content-between text-center">
                        <div class="col-sm-12">
                            <button class=" btn btn-success btn-lg mx-2">Actualizar</button>
                            <a  class="btn btn-warning btn-lg mx-2" href="{{ route('noticias.showAdmin', $noticia) }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
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
</script>
@stop