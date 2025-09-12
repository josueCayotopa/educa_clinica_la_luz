<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FellowCurveApiController extends Controller
{

    public function data(Request $request)
    {
       
    $u = Auth::user();
    if (!$u) {
        Log::warning('[CURVA:data] 401 Unauthenticated', ['url' => $request->fullUrl()]);
        return response()->json(['ok' => false, 'message' => 'Unauthenticated'], 401);
    }

    $canAll = $u->canViewAllFellowEvals();
    $residenteId = $canAll ? (int) $request->query('residente_id') : (int) $u->id;
    $procId = $request->query('procedimiento_id');

    if ($canAll && !$residenteId) {
        Log::info('[CURVA:data] no residente seleccionado (ALL)');
        return response()->json(['ok' => true, 'cases' => [], 'scores' => [], 'dates' => []]);
    }

    Log::info('[CURVA:data] init', [
        'uid' => $u->id, 'actor' => $u->name, 'canAll' => $canAll,
        'residente' => $residenteId, 'procedimiento' => $procId, 'metric' => 'PROMEDIO(0-5)',
    ]);

    $rows = DB::table('FELLOW_EVALUACIONES as e')
        ->where('e.RESIDENTE_ID', $residenteId)
        ->when($procId, fn($q) => $q->where('e.PROCEDIMIENTO_ID', $procId))
        ->orderBy('e.FECHA_EVALUACION')->orderBy('e.ID')
        ->get(['e.ID','e.FECHA_EVALUACION','e.PROMEDIO']);

    Log::info('[CURVA:data] rows', ['count' => $rows->count()]);

    $dates = []; $scores = []; $dbg = [];

    foreach ($rows as $r) {
        $fecha = Carbon::parse($r->FECHA_EVALUACION)->format('Y-m-d');
        $dates[] = $fecha;

        if ($r->PROMEDIO !== null) {
            $score = round((float)$r->PROMEDIO, 2);        // 0–5
            $scores[] = $score;
            $dbg[] = ['id'=>$r->ID,'src'=>'PROMEDIO','score'=>$score];
            continue;
        }

        // Fallback: promedio desde respuestas (0–5)
        $base = DB::table('FELLOW_EVAL_RESPUESTAS')->where('EVALUACION_ID', $r->ID);
        $cnt  = (int) $base->count();
        $sum  = (float) $base->sum('VALOR');

        $score = $cnt > 0 ? round($sum / $cnt, 2) : null;  // 0–5
        $scores[] = $score;
        $dbg[] = ['id'=>$r->ID,'src'=>'CALCULADO_PROM','items'=>$cnt,'sum'=>$sum,'score'=>$score];
    }

    Log::info('[CURVA:data] computed', [
        'valid_scores' => collect($scores)->filter(fn($v)=>$v!==null)->count(),
        'scores' => $scores, 'detail' => $dbg,
    ]);

    // bandas para 0–5 (equivalentes a 70% y 90%): 3.5 y 4.5
    return response()->json([
        'ok'     => true,
        'cases'  => range(1, count($scores)),
        'dates'  => $dates,
        'scores' => $scores,           // 0–5
        'bands'  => ['low' => 3.5, 'high' => 4.5, 'max' => 5, 'ylabel' => 'Promedio (0–5)'],
    ]);
    }
}
