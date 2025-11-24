@extends('layouts.app')

@section('title', 'Acciones correctivas')

@section('content')
    <h1 class="mt-4">Acciones Correctivas</h1>
    <div class="d-flex flex-row justify-content-between">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Acciones Correctivas</li>
        </ol>
        <a class="btn btn-success mb-4" href="{{ route('nueva-accion') }}" >Nuevo</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Reporte</th>
                        <th>Tipo de Acción</th>
                        <th>Detalle</th>
                        <th>Responsable</th>
                        <th>Fecha Programada</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acciones as $accion)
                        <tr>
                            <td>{{ $accion->incidente->descripcion }}</td>
                            <td>{{ $accion->tipo_accion }}</td>
                            <td>{{ $accion->detalle }}</td>
                            <td>{{ $accion->responsable }}</td>
                            <td>{{ $accion->fecha_programada->format('d/m/Y') }}</td>
                            <td><a class="btn btn-warning mb-4" href="{{ route('editar-accion', ['id' => $accion->id]) }}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <!--td>
                                <form action="{{ route('delete-accion', ['id' => $accion->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mb-4" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td-->
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
@endsection