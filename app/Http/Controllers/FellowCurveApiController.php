<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FellowCurveApiController extends Controller
{
    //
    // app/Http/Controllers/Api/FellowCurveApiController.php
    public function data(Request $request)
    {
        $u = $request->user();
        $residenteId = (int) $request->query('residente_id');
        $procId      = $request->query('procedimiento_id'); // null => todos los procedimientos

        if (!$u) return response()->json(['ok' => false, 'message' => 'Unauthenticated'], 401);

        // Si es OWN, solo puede verse a sí mismo:
        if (!$u->canViewAllFellowEvals()) {
            $residenteId = (int) $u->id;  // ignora el que venga
        } else {
            // ALL/admin: si no pasa residente_id, puedes mostrar a todos
            if (!$residenteId) {
                // ejemplo: si no selecciona a nadie, no devuelvas nada o usa el primero con datos
                return response()->json(['ok' => true, 'cases' => [], 'scores' => [], 'dates' => []]);
            }
        }
    
        $rows = DB::table('FELLOW_EVALUACIONES')
            ->where('RESIDENTE_ID', $residenteId)
            ->when($procId, fn($x) => $x->where('PROCEDIMIENTO_ID', $procId))
            ->orderBy('FECHA_EVALUACION')
            ->orderBy('ID')
            ->get(['ID', 'FECHA_EVALUACION', 'PUNTAJE_TOTAL', 'PORCENTAJE']); // PORCENTAJE opcional

        $dates  = [];
        $scores = [];   // 0–100
        $i = 0;

        foreach ($rows as $r) {
            $dates[] = is_object($r->FECHA_EVALUACION) && method_exists($r->FECHA_EVALUACION, 'format')
                ? $r->FECHA_EVALUACION->format('Y-m-d')
                : (string) $r->FECHA_EVALUACION;

            // 1) si ya hay porcentaje en BD, úsalo
            if ($r->PORCENTAJE !== null) {
                $scores[] = round((float) $r->PORCENTAJE, 2);
                continue;
            }

            // 2) calcular 0–100 desde respuestas si no hay porcentaje
            $sum = DB::table('FELLOW_EVAL_RESPUESTAS')
                ->where('EVALUACION_ID', $r->ID)
                ->where('VALOR', '>', 0)
                ->sum('VALOR');

            $cnt = DB::table('FELLOW_EVAL_RESPUESTAS')
                ->where('EVALUACION_ID', $r->ID)
                ->where('VALOR', '>', 0)
                ->count();

            $score = $cnt > 0 ? ($sum / ($cnt * 5)) * 100 : null;
            $scores[] = $score !== null ? round($score, 2) : null;
        }

        // Eje X: número de caso (1..N)
        $cases = range(1, count($scores));

        return response()->json([
            'ok'     => true,
            'cases'  => $cases,
            'dates'  => $dates,
            'scores' => $scores,
            'bands'  => ['low' => 70, 'high' => 90], // umbrales
        ]);
    }
}
