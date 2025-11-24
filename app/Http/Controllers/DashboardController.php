<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | MÉTRICAS PRINCIPALES
        |--------------------------------------------------------------------------
        */

        // Total de incidentes del mes actual
        $incidentesMesActual = DB::table('reportes_incidentes')
            ->whereMonth('fecha_reporte', now()->month)
            ->whereYear('fecha_reporte', now()->year)
            ->count();

        // Total de incidentes del año actual
        $incidentesAnio = DB::table('reportes_incidentes')
            ->whereYear('fecha_reporte', now()->year)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | CAPACITACIONES CUMPLIDAS
        |--------------------------------------------------------------------------
        */
        $capacitacionesCumplidas = DB::table('capacitaciones as c')
            ->join('reportes_incidentes as r', 'c.reporte_id', '=', 'r.id')
            ->join('obras as o', 'o.id', '=', 'r.obra_id')
            ->join('acciones_correctivas as ac', function($join) {
                $join->on('ac.reporte_id', '=', 'r.id')
                    ->where('ac.tipo_accion', 'Capacitación');
            })
            ->join('retroalimentacion as retro', function($join) {
                $join->on('retro.accion_id', '=', 'ac.id')
                    ->where('retro.cumplida', 1);
            })
            ->select(
                'c.id',
                'c.tema',
                'c.descripcion',
                'c.fecha',
                'r.fecha_reporte',
                'o.nombre as obra',
                'retro.fecha_verificacion'
            )
            ->get();

        /*
        |--------------------------------------------------------------------------
        | ACCIONES CORRECTIVAS CUMPLIDAS
        |--------------------------------------------------------------------------
        */
        $accionesCumplidas = DB::table('retroalimentacion')
            ->where('cumplida', 1)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | LISTADO DE REPORTES
        |--------------------------------------------------------------------------
        */
        $reportes = DB::table('reportes_incidentes as r')
            ->leftJoin('sensores as s', 's.id', '=', 'r.sensor_id')
            ->leftJoin('obras as o', 'o.id', '=', 'r.obra_id')
            ->leftJoin('trabajadores as t', 't.id', '=', 'r.trabajador_id')
            ->leftJoin('riesgos as ri', 'ri.id', '=', 'r.riesgo_id')
            ->leftJoin('acciones_correctivas as ac', 'ac.reporte_id', '=', 'r.id')
            ->select([
                'r.id',
                'o.nombre as obra',
                't.nombre as trabajador',
                DB::raw("COALESCE(s.descripcion, s.tipo) as equipo"),
                'ri.nombre as riesgo',
                'ri.descripcion as categoria_riesgo',
                'ac.responsable as encargado',
                'ac.tipo_accion as tipo_incidente',
                'ri.nivel as gravedad',
                'r.fecha_reporte'
            ])
            ->orderBy('r.fecha_reporte', 'desc')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | INCIDENTES AGRUPADOS POR MES PARA LA GRÁFICA
        |--------------------------------------------------------------------------
        */
        $incidentesMesBD = DB::table('reportes_incidentes')
            ->select(
                DB::raw('MONTH(fecha_reporte) as mes'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Array de 12 meses, iniciando en 0 cada uno
        $incidentesMes = array_fill(1, 12, 0);

        foreach ($incidentesMesBD as $row) {
            $incidentesMes[$row->mes] = $row->total;
        }

        /*
        |--------------------------------------------------------------------------
        | RETORNO A LA VISTA
        |--------------------------------------------------------------------------
        */
       return view('dashboard', compact(
    'incidentesMes',
    'incidentesMesActual',
    'incidentesAnio',
    'capacitacionesCumplidas',
    'accionesCumplidas',
    'reportes'
));

    }
}
