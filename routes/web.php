<?php

use App\Http\Controllers\LearningCurveController;
use App\Http\Controllers\PrintEvaluacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/evaluaciones', function () {
    return view('evaluaciones');
});

Route::get('/evaluacion', function () {
    return view('evaluacion');
});

Route::middleware(['web','auth'])->group(function () {
    Route::get('/fellows/curva', [LearningCurveController::class, 'show'])
        ->name('fellows.curva');
});
Route::middleware(['web','auth'])->get(
    '/fellows/evaluaciones/{id}/imprimir',
    [PrintEvaluacionController::class, 'show']
)->name('fellows.eval.print');