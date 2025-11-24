<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use App\Models\Sensor;
use App\Models\Trabajador;
use App\Models\Riesgo;
use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidentes = Incidente::all();
        return view('incidentes.lista', ['incidentes'=> $incidentes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sensores = Sensor::all();
        $trabajadores = Trabajador::all();
        $riesgos = Riesgo::all();
        $obras = Obra::all();
        return view('incidentes.nuevo', ['sensores' => $sensores, 'trabajadores' => $trabajadores, 'riesgos' => $riesgos, 'obras' => $obras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidente = Incidente::create($request->all());
        return redirect('/incidentes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $sensores = Sensor::all();
        $trabajadores = Trabajador::all();
        $riesgos = Riesgo::all();
        $obras = Obra::all();
        $incidente = Incidente::find($id);
        return view('incidentes.editar', ['sensores' => $sensores, 'trabajadores' => $trabajadores, 'riesgos' => $riesgos, 'obras' => $obras, 'incidente' => $incidente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $incidente = Incidente::find($id);
        $data = $request->all();
        $data['fecha_reporte'] = Carbon::createFromFormat('d/m/Y', $data['fecha_reporte'])->toDateString();
        $incidente->update($data);
        return redirect('/incidentes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incidente = Incidente::find($id);
        $incidente->delete();
        return redirect('/incidentes');
    }
}
