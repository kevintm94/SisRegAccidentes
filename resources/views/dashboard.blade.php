
@push('scripts')
<script>
    const datosIncidentes = JSON.parse(`{!! json_encode($incidentesMes) !!}`);
    console.log(datosIncidentes);
</script>
@endpush

@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Incidente del Mes</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $incidentesMesActual }}
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Incidentes del Año</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $incidentesAnio }}
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Capacitaciones cumplidas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $capacitacionesCumplidas->count() }}
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Acciones cumplidas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{ $accionesCumplidas }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Reportes de Incidentes por Mes
                </div>

                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-exclamation-triangle me-1"></i>
            Reportes de Incidentes
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Obra</th>
                        <th>Trabajador</th>
                        <th>Equipo/Depto</th>
                        <th>Riesgo</th>
                        <th>Categoría</th>
                        <th>Encargado</th>
                        <th>Tipo Incidente</th>
                        <th>Gravedad</th>
                        <th>Fecha Reporte</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reportes as $reporte)
                        <tr>
                            <td>{{ $reporte->id }}</td>
                            <td>{{ $reporte->obra }}</td>
                            <td>{{ $reporte->trabajador }}</td>
                            <td>{{ $reporte->equipo }}</td>
                            <td>{{ $reporte->riesgo }}</td>
                            <td>{{ $reporte->categoria_riesgo }}</td>
                            <td>{{ $reporte->encargado ?? 'N/A' }}</td>
                            <td>{{ $reporte->tipo_incidente ?? 'N/A' }}</td>

                            <td>
                                @if ($reporte->gravedad === 'Alta')
                                    <span class="badge bg-danger">Alta</span>
                                @elseif ($reporte->gravedad === 'Media')
                                    <span class="badge bg-warning text-dark">Media</span>
                                @else
                                    <span class="badge bg-success">Baja</span>
                                @endif
                            </td>

                            <td>{{ \Carbon\Carbon::parse($reporte->fecha_reporte)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

