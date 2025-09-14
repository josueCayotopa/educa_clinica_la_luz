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
                'respuestas' => fn($q) => $q
                    ->select('ID', 'EVALUACION_ID', 'PREGUNTA_ID', 'OPCION_ID', 'VALOR', 'OBSERVACION')
                    ->with([
                        'pregunta:ID,PREGUNTA,ORDEN',
                        'opcion:ID,ETIQUETA,VALOR,DESCRIPCION',
                    ]),
            ])
            ->findOrFail($id);


        // Ordena las respuestas por ORDEN del paso
        $respuestasOrdenadas = $eval->respuestas->sortBy(fn($r) => $r->pregunta?->ORDEN ?? 999)->values();

        // Historial (mismo residente y procedimiento) ORDENADO
        $history = \App\Models\FellowEvaluacion::query()
            ->where('RESIDENTE_ID', $eval->RESIDENTE_ID)
            ->where('PROCEDIMIENTO_ID', $eval->PROCEDIMIENTO_ID)
            ->orderBy('FECHA_EVALUACION')
            ->orderBy('ID')
            ->get(['ID', 'FECHA_EVALUACION', 'PUNTAJE_TOTAL', 'PROMEDIO']);

        // Eje X: número de caso 1..N
        $cases  = range(1, $history->count());
        $dates  = [];
        $scores = [];  // Now using 0-5 scale instead of 0-100

        foreach ($history as $h) {
            $dates[] = is_object($h->FECHA_EVALUACION) && method_exists($h->FECHA_EVALUACION, 'format')
                ? $h->FECHA_EVALUACION->format('Y-m-d') : (string) $h->FECHA_EVALUACION;

            if ($h->PROMEDIO !== null) {
                $scores[] = round((float) $h->PROMEDIO, 2); // Using direct average instead of percentage
            } else {
                $sum = DB::table('FELLOW_EVAL_RESPUESTAS')
                    ->where('EVALUACION_ID', $h->ID)->where('VALOR', '>', 0)->sum('VALOR');
                $cnt = DB::table('FELLOW_EVAL_RESPUESTAS')
                    ->where('EVALUACION_ID', $h->ID)->where('VALOR', '>', 0)->count();
                $scores[] = $cnt > 0 ? round(($sum / $cnt), 2) : null; // Direct average calculation (0-5)
            }
        }

        if ($eval->PROMEDIO !== null) {
            $currentAverage = round((float) $eval->PROMEDIO, 2);
        } else {
            $sum = DB::table('FELLOW_EVAL_RESPUESTAS')
                ->where('EVALUACION_ID', $eval->ID)->where('VALOR', '>', 0)->sum('VALOR');
            $cnt = DB::table('FELLOW_EVAL_RESPUESTAS')
                ->where('EVALUACION_ID', $eval->ID)->where('VALOR', '>', 0)->count();
            $currentAverage = $cnt > 0 ? round(($sum / $cnt), 2) : null; // Direct average (0-5)
        }

        return view('fellows.print_evaluacion', [
            'eval'       => $eval,
            'resps'      => $respuestasOrdenadas,
            'cases'      => $cases,
            'dates'      => $dates,
            'scores'     => $scores,              // Now 0-5 scale
            'refLow'     => 3.5,                 // Adjusted reference for 0-5 scale
            'refHigh'    => 4.5,                 // Adjusted reference for 0-5 scale
            'currentAverage' => $currentAverage, // Renamed from score100
            'autoPrint'  => request()->boolean('print', true),
        ]);
    }
}
