@extends('layouts.layout')

@section('title','Presupuesto')

@section('content')
    <h1>PRESUPUESTO</h1>
    <form method="POST" action="{{ route('presupuesto.index') }}">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}"><br>
        {!! $errors->first('nombre', '<small>:message</small>') !!} <br>
        <input type="text" name="apellido" placeholder="Apellidos" value="{{ old('apellido') }}"><br>
        {!! $errors->first('apellido', '<small>:message</small>') !!} <br>
        <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}"><br>
        {!! $errors->first('email', '<small>:message</small>') !!} <br>
        <input type="numb(er" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}"><br>
        {!! $errors->first('telefono', '<small>:message</small>') !!} <br>
        <button>Enviar</button>
    </form>
@endsection