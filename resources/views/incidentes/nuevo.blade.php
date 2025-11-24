@extends('layouts.app')

@section('title', 'Incidentes')

@section('content')
    <h1 class="mt-4">Incidentes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('incidentes') }}">Incidentes</a></li>
        <li class="breadcrumb-item active">Nuevo</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="/incidentes" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="sensor_id" class="form-label">Sensor</label>
                    <input class="form-control" list="sensores" id="sensor_id" name="sensor_id" placeholder="Escribe para buscar">
                    <datalist id="sensores">
                        @foreach ($sensores as $sensor)
                            <option value="{{ $sensor->id }}" label="{{ $sensor->descripcion }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="trabajador_id" class="form-label">Trabajador</label>
                    <input class="form-control" list="trabajadores" id="trabajador_id" name="trabajador_id" placeholder="Escribe para buscar">
                    <datalist id="trabajadores">
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}" label="{{ $trabajador->nombre }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="riesgo_id" class="form-label">Riesgo</label>
                    <input class="form-control" list="riesgos" id="riesgo_id" name="riesgo_id" placeholder="Escribe para buscar">
                    <datalist id="riesgos">
                        @foreach ($riesgos as $riesgo)
                            <option value="{{ $riesgo->id }}" label="{{ $riesgo->nombre }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="obra_id" class="form-label">Obra</label>
                    <input class="form-control" list="obras" id="obra_id" name="obra_id" placeholder="Escribe para buscar">
                    <datalist id="obras">
                        @foreach ($obras as $obra)
                            <option value="{{ $obra->id }}" label="{{ $obra->nombre }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Escribe una descripción">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input class="form-control" type="date" id="fecha" name="fecha_reporte">
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input class="form-control" list="estados" id="estado" name="estado" placeholder="Escribe para buscar">
                    <datalist id="estados">
                        <option value="analizado">
                        <option value="corregido">
                        <option value="pendiente">
                    </datalist>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection