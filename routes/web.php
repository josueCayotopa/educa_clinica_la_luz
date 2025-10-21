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
})->name('home');

Route::get('/centros-quirurgicos', function () {
    return view('page.centros-quirurgicos');
})->name('centros.index');



Route::get('/evaluaciones', function () {
    return view('evaluaciones');
});

Route::get('/evaluacion', function () {
    return view('evaluacion');
});
Route::get('/contacto', function () {
    return view('contacto');
})->name('contact.submit');

Route::get('/contactos', function () {
    return view('contactos');
})->name('contacto');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

// Programas
Route::get('/programas/segmento-anterior', function () {
    return view('programas.segmento-anterior');
})->name('programas.segmento-anterior');

Route::get('/programas/glaucoma', function () {
    return view('programas.glaucoma');
})->name('programas.glaucoma');

Route::get('/programas/retina-vitreo', function () {
    return view('programas.retina-vitreo');
})->name('programas.retina-vitreo');


Route::middleware(['web', FilamentAuthenticate::class])->group(function () {
    Route::get('/fellows/curva', [LearningCurveController::class, 'show'])->name('fellows.curva');
    Route::get('/fellows/curva/data', [FellowCurveApiController::class, 'data'])->name('fellows.curva.data');
    Route::middleware(['web', 'auth'])->get(
        '/fellows/evaluaciones/{id}/imprimir',
        [PrintEvaluacionController::class, 'show']
    )->name('fellows.eval.print');
});
