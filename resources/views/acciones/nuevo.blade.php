@extends('layouts.app')

@section('title', 'Incidentes')

@section('content')
    <h1 class="mt-4">Acciones</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('acciones') }}">Acciones</a></li>
        <li class="breadcrumb-item active">Nuevo</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="/acciones" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="reporte_id" class="form-label">Reporte Incidentes</label>
                    <input class="form-control" list="incidentes" id="reporte_id" name="reporte_id" placeholder="Escribe para buscar">
                    <datalist id="incidentes">
                        @foreach ($incidentes as $incidente)
                            <option value="{{ $incidente->id }}" label="{{ $incidente->descripcion }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="tipo_accion" class="form-label">Tipo de Acción</label>
                    <input class="form-control" type="text" id="tipo_accion" name="tipo_accion" placeholder="Escribe un tipo de accion">
                </div>
                <div class="mb-3">
                    <label for="detalle" class="form-label">Detalle</label>
                    <input class="form-control" type="text" id="detalle" name="detalle" placeholder="Escribe un detalle">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable</label>
                    <input class="form-control" type="text" id="responsable" name="responsable" placeholder="Escribe un responsable">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha Programada</label>
                    <input class="form-control" type="date" id="fecha" name="fecha_programada">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection