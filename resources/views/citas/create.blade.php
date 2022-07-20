@extends('adminlte::page')

@section('title', 'Crear Cita')


{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
<div class="row mb-2">
    <div class="col-10">
        <h1 class="fs-1 fw-bold">Creación de Citas</h1>
    </div>
</div>
@stop

@section('content')
<section class="content">
    <div id="calendar"></div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="container">
                </div>
            </div>
        </div>
    </div> --}}
</section>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css"> --}}
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/main.min.js') }}" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script> --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
        });
        calendar.render();
    });

    </script>
@stop