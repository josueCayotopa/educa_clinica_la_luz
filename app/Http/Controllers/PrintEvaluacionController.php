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

        // Historial para la curva (mismo residente y procedimiento)
        $history = FellowEvaluacion::query()
            ->where('RESIDENTE_ID', $eval->RESIDENTE_ID)
            ->where('PROCEDIMIENTO_ID', $eval->PROCEDIMIENTO_ID)
            ->orderBy('FECHA_EVALUACION')
            ->get(['ID','FECHA_EVALUACION','PROMEDIO']);

        // Labels + data (con fallback por si PROMEDIO es null)
        $labels = [];
        $prom   = [];
        foreach ($history as $h) {
            $labels[] = is_object($h->FECHA_EVALUACION) && method_exists($h->FECHA_EVALUACION,'format')
                ? $h->FECHA_EVALUACION->format('Y-m-d')
                : (string) $h->FECHA_EVALUACION;

            if ($h->PROMEDIO === null) {
                $avg = DB::table('FELLOW_EVAL_RESPUESTAS')
                    ->where('EVALUACION_ID', $h->ID)->where('VALOR','>',0)->avg('VALOR');
                $prom[] = $avg !== null ? round((float)$avg, 2) : null;
            } else {
                $prom[] = round((float)$h->PROMEDIO, 2);
            }
        }

        // Ordena las respuestas por ORDEN del paso
        $respuestasOrdenadas = $eval->respuestas->sortBy(fn ($r) => $r->pregunta?->ORDEN ?? 999)->values();

        return view('fellows.print_evaluacion', [
            'eval'      => $eval,
            'resps'     => $respuestasOrdenadas,
            'labels'    => $labels,
            'prom'      => $prom,
            'ref'       => 4.0,
            'autoPrint' => request()->boolean('print', true), // dispara window.print() por defecto
        ]);
    }
}
