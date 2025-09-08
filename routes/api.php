<?php

use App\Http\Controllers\Api\FellowController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\FellowCurveApiController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProcedimientoController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\UserController;
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

Route::middleware(['web','auth'])->get(
    '/fellows/curva-data',
    [FellowCurveApiController::class, 'data']  // mismo método 'data' que ya tienes
)->name('fellows.curva.data');
