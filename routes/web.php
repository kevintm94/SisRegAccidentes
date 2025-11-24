<?php

use App\Http\Controllers\AccionCorrectivaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncidenteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/incidentes', [IncidenteController::class, 'index'])->middleware('auth')->name('incidentes');
Route::get('/incidentes/nuevo', [IncidenteController::class, 'create'])->middleware('auth')->name('nuevo-incidente');
Route::get('/incidentes/edit/{id}', [IncidenteController::class, 'edit'])->middleware('auth')->name('editar-incidente');
Route::post('/incidentes', [IncidenteController::class, 'store'])->middleware('auth');
Route::put('/incidentes/{id}', [IncidenteController::class, 'update'])->middleware('auth')->name('update-incidente');
Route::delete('/incidentes/{id}', [IncidenteController::class, 'destroy'])->middleware('auth')->name('delete-incidente');

Route::get('/acciones', [AccionCorrectivaController::class, 'index'])->middleware('auth')->name('acciones');
Route::get('/acciones/nuevo', [AccionCorrectivaController::class, 'create'])->middleware('auth')->name('nueva-accion');
Route::get('/acciones/edit/{id}', [AccionCorrectivaController::class, 'edit'])->middleware('auth')->name('editar-accion');
Route::post('/acciones', [AccionCorrectivaController::class, 'store'])->middleware('auth');
Route::put('/acciones/{id}', [AccionCorrectivaController::class, 'update'])->middleware('auth')->name('update-accion');
Route::delete('/acciones/{id}', [AccionCorrectivaController::class, 'destroy'])->middleware('auth')->name('delete-accion');

Route::get('/capacitaciones', [CapacitacionController::class, 'index'])->middleware('auth')->name('capacitaciones');
