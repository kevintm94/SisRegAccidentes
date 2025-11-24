@extends('layouts.app')

@section('title', 'Incidentes')

@section('content')
    <h1 class="mt-4">Incidentes</h1>
    <div class="d-flex flex-row justify-content-between">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Incidentes</li>
        </ol>
        <a class="btn btn-success mb-4" href="{{ route('nuevo-incidente') }}" >Nuevo</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <!--p class="mb-0">
                This page is an example of using static navigation. By removing the
                <code>.sb-nav-fixed</code>
                class from the
                <code>body</code>
                , the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.
            </p-->
            <table class="table">
                <thead>
                    <tr>
                        <th>Sensor</th>
                        <th>Trabajador</th>
                        <th>Riesgo</th>
                        <th>Obra</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidentes as $incidente)
                        <tr>
                            <td>{{ $incidente->sensor->descripcion }}</td>
                            <td>{{ $incidente->trabajador->nombre }}</td>
                            <td>{{ $incidente->riesgo->nombre }}</td>
                            <td>{{ $incidente->obra->nombre }}</td>
                            <td>{{ $incidente->descripcion }}</td>
                            <td>{{ $incidente->fecha_reporte->format('d/m/Y') }}</td>
                            <td>{{ $incidente->estado }}</td>
                            <td><a class="btn btn-warning mb-4" href="{{ route('editar-incidente', ['id' => $incidente->id]) }}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <form action="{{ route('delete-incidente', ['id' => $incidente->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mb-4" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--div style="height: 100vh"></div>
    <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div-->
@endsection