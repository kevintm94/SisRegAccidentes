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

Route::get('/acciones', [AccionCorrectivaController::class, 'index'])->middleware('auth')->name('acciones');

Route::get('/capacitaciones', [CapacitacionController::class, 'index'])->middleware('auth')->name('capacitaciones');
