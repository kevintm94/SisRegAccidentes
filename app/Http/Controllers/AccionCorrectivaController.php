<?php

namespace App\Http\Controllers;

use App\Models\AccionCorrectiva;
use App\Models\Incidente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AccionCorrectivaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acciones = AccionCorrectiva::all();
        return view('acciones.lista', ['acciones' => $acciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $incidentes = Incidente::all();
        return view('acciones.nuevo', ['incidentes' => $incidentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $accion = AccionCorrectiva::create($request->all());
        return redirect('/acciones');
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
    public function edit(string $id)
    {
        $accion = AccionCorrectiva::find($id);
        $incidentes = Incidente::all();
        return view('acciones.editar', ['incidentes' => $incidentes, 'accion' => $accion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $accion = AccionCorrectiva::find($id);
        $data = $request->all();
        $data['fecha_programada'] = Carbon::createFromFormat('d/m/Y', $data['fecha_programada'])->toDateString();
        $accion->update($data);
        return redirect('/acciones');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accion = AccionCorrectiva::find($id);
        $accion->delete();
        return redirect('/acciones');
    }
}
