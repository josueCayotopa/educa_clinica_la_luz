<?php

namespace App\Http\Controllers;

use App\Models\FellowEvaluacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintEvaluacionController extends Controller
{
public function show(int $id)
    {
        // Eval + procedimiento + residente + respuestas con pregunta/opción
        $eval = FellowEvaluacion::query()
            ->with([
                'procedimiento:ID,NOMBRE',
                'residenteUser:id,name,usuario',
                'respuestas' => fn ($q) => $q
                    ->select('ID','EVALUACION_ID','PREGUNTA_ID','OPCION_ID','VALOR','OBSERVACION')
                    ->with([
                        'pregunta:ID,PREGUNTA,ORDEN',
                        'opcion:ID,ETIQUETA,VALOR,DESCRIPCION',
                    ]),
            ])
            ->findOrFail($id);

     
        // Ordena las respuestas por ORDEN del paso
        $respuestasOrdenadas = $eval->respuestas->sortBy(fn ($r) => $r->pregunta?->ORDEN ?? 999)->values();

        // Historial (mismo residente y procedimiento) ORDENADO
$history = \App\Models\FellowEvaluacion::query()
    ->where('RESIDENTE_ID', $eval->RESIDENTE_ID)
    ->where('PROCEDIMIENTO_ID', $eval->PROCEDIMIENTO_ID)
    ->orderBy('FECHA_EVALUACION')
    ->orderBy('ID')
    ->get(['ID','FECHA_EVALUACION','PUNTAJE_TOTAL','PORCENTAJE']);

// Eje X: número de caso 1..N
$cases  = range(1, $history->count());
$dates  = [];
$scores = [];  // 0–100

foreach ($history as $h) {
    $dates[] = is_object($h->FECHA_EVALUACION) && method_exists($h->FECHA_EVALUACION,'format')
        ? $h->FECHA_EVALUACION->format('Y-m-d') : (string) $h->FECHA_EVALUACION;

    if ($h->PORCENTAJE !== null) {
        $scores[] = round((float) $h->PORCENTAJE, 2);
    } else {
        $sum = DB::table('FELLOW_EVAL_RESPUESTAS')
            ->where('EVALUACION_ID', $h->ID)->where('VALOR','>',0)->sum('VALOR');
        $cnt = DB::table('FELLOW_EVAL_RESPUESTAS')
            ->where('EVALUACION_ID', $h->ID)->where('VALOR','>',0)->count();
        $scores[] = $cnt > 0 ? round(($sum / ($cnt*5)) * 100, 2) : null;
    }
}

// Puntaje (0–100) de ESTA evaluación (cabecera)
if ($eval->PORCENTAJE !== null) {
    $score100 = round((float) $eval->PORCENTAJE, 2);
} else {
    $sum = DB::table('FELLOW_EVAL_RESPUESTAS')
        ->where('EVALUACION_ID',$eval->ID)->where('VALOR','>',0)->sum('VALOR');
    $cnt = DB::table('FELLOW_EVAL_RESPUESTAS')
        ->where('EVALUACION_ID',$eval->ID)->where('VALOR','>',0)->count();
    $score100 = $cnt > 0 ? round(($sum / ($cnt*5)) * 100, 2) : null;
}

return view('fellows.print_evaluacion', [
    'eval'       => $eval,
    'resps'      => $respuestasOrdenadas, // como ya lo tienes
    'cases'      => $cases,               // Nº de caso
    'dates'      => $dates,               // para tooltip
    'scores'     => $scores,              // 0–100
    'refLow'     => 70,
    'refHigh'    => 90,
    'score100'   => $score100,
    'autoPrint'  => request()->boolean('print', true),
]);

    }
}
