<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FellowCurveApiController extends Controller
{
    //
    public function data(Request $request)
    {
        $residenteId = (int) $request->query('residente_id');
        $procId      = $request->query('procedimiento_id');

        if (!$residenteId) {
            return response()->json(['ok'=>false,'message'=>'residente_id requerido'], 422);
        }

        $q = DB::table('FELLOW_EVALUACIONES')
            ->where('RESIDENTE_ID', $residenteId)
            ->when($procId, fn($x) => $x->where('PROCEDIMIENTO_ID', $procId))
            ->orderBy('FECHA_EVALUACION')
            ->select('ID','FECHA_EVALUACION','PROMEDIO');

        $rows = $q->get();

        // Fallback por si PROMEDIO está null en alguna fila antigua
        $labels = [];
        $proms  = [];
        foreach ($rows as $r) {
            $labels[] = is_object($r->FECHA_EVALUACION) && method_exists($r->FECHA_EVALUACION,'format')
                ? $r->FECHA_EVALUACION->format('Y-m-d')
                : (string) $r->FECHA_EVALUACION;

            if ($r->PROMEDIO === null) {
                $avg = DB::table('FELLOW_EVAL_RESPUESTAS')
                    ->where('EVALUACION_ID', $r->ID)
                    ->where('VALOR','>',0)
                    ->avg('VALOR');
                $proms[] = $avg !== null ? round((float)$avg, 2) : null;
            } else {
                $proms[] = round((float)$r->PROMEDIO, 2);
            }
        }

        // Media móvil (window=3) — opcional
        $ma = [];
        $w = 3;
        for ($i=0; $i<count($proms); $i++) {
            $from = max(0, $i - $w + 1);
            $slice = array_slice($proms, $from, $i-$from+1);
            $vals = array_values(array_filter($slice, fn($v)=>$v !== null));
            $ma[] = count($vals) ? round(array_sum($vals)/count($vals), 2) : null;
        }

        return response()->json([
            'ok'       => true,
            'labels'   => $labels,
            'promedio' => $proms,
            'ma3'      => $ma,
            'ref'      => 4.0,
        ]);
    }
}
