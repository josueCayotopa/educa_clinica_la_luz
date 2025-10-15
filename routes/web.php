<?php

use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\FellowCurveApiController;
use App\Http\Controllers\LearningCurveController;
use App\Http\Controllers\PrintEvaluacionController;
// routes/web.php
use Filament\Http\Middleware\Authenticate as FilamentAuthenticate;
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
Route::get('/contacto', function () {
    return view('contacto');
})->name('contact.submit');


Route::middleware(['web', FilamentAuthenticate::class])->group(function () {
    Route::get('/fellows/curva', [LearningCurveController::class, 'show'])->name('fellows.curva');
    Route::get('/fellows/curva/data', [FellowCurveApiController::class, 'data'])->name('fellows.curva.data');
    Route::middleware(['web', 'auth'])->get(
        '/fellows/evaluaciones/{id}/imprimir',
        [PrintEvaluacionController::class, 'show']
    )->name('fellows.eval.print');
    Route::get('/calculadora', [CalculadoraController::class, 'index'])->name('calculadora.index');
});
