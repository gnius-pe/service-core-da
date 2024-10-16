<?php

use App\Http\Controllers\QuotaController;
use App\Http\Controllers\SpecialtyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('specialties', [SpecialtyController::class, 'store']);

Route::get('/specialties', [SpecialtyController::class, 'index']);
Route::get('/specialties/{id}', [SpecialtyController::class, 'show']);
Route::post('/specialties', [SpecialtyController::class, 'store']);
Route::put('/specialties/{id}', [SpecialtyController::class, 'update']);
Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy']);


// Rutas para CRUD de Quotas (Cupos)
Route::get('quotas', [QuotaController::class, 'index']); // Listar todos los cupos
Route::get('quotas/{id}', [QuotaController::class, 'show']); // Mostrar un cupo por ID
Route::post('quotas', [QuotaController::class, 'store']); // Crear un nuevo cupo
Route::put('quotas/{id}', [QuotaController::class, 'update']); // Actualizar un cupo por ID
Route::delete('quotas/{id}', [QuotaController::class, 'destroy']); // Eliminar un cupo por ID



use App\Http\Controllers\MissionController;

Route::get('missions', [MissionController::class, 'index']);           // Listar todas las misiones
Route::get('missions/{id}', [MissionController::class, 'show']);       // Mostrar una misión por ID
Route::post('missions', [MissionController::class, 'store']);          // Crear una nueva misión
Route::put('missions/{id}', [MissionController::class, 'update']);     // Actualizar una misión existente
Route::delete('missions/{id}', [MissionController::class, 'destroy']); // Eliminar una misión

use App\Http\Controllers\MissionSpecialtyController;

Route::post('/missions_specialities', [MissionSpecialtyController::class, 'store']);
