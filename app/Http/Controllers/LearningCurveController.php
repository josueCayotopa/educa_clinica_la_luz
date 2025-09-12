<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LearningCurveController extends Controller
{
    //
   public function show(Request $request)
    {
        $user = Auth::user();
        $canAll = $user->canViewAllFellowEvals();
        $perm   = $user->TIPO_EVALUADOR_FELLOW ?? null; // si lo usas

        Log::info('[CURVA:show] init', [
            'uid'      => $user->id,
            'actor'    => $user->name,
            'perm_canAll' => $canAll,
            'perm_raw' => $perm,
            'qs'       => $request->query(),
            'url'      => $request->fullUrl(),
        ]);

        // Residente
        if ($canAll) {
            $residentes = DB::table('users')->select('id','name')->orderBy('name')->get();
            $residenteId = (int) ($request->query('residente_id') ?? 0);
        } else {
            $residentes = collect([
                DB::table('users')->select('id','name')->find($user->id)
            ])->filter();
            $residenteId = (int) $user->id;
        }

        // Procedimientos activos
        $procedimientos = DB::table('FELLOW_PROCEDIMIENTOS')
            ->where('ACTIVO','1')
            ->orderBy('NOMBRE')
            ->select('ID','NOMBRE')
            ->get();

        // Selección de procedimiento
        $procedimientoId = $request->query('procedimiento_id');

        if (!$procedimientoId) {
            // intenta el más reciente con evaluaciones del residente
            $procedimientoId = DB::table('FELLOW_EVALUACIONES')
                ->where('RESIDENTE_ID', $residenteId)
                ->orderByDesc('FECHA_EVALUACION')
                ->value('PROCEDIMIENTO_ID');

            if (!$procedimientoId && $procedimientos->isNotEmpty()) {
                $procedimientoId = (string) $procedimientos->first()->ID;
            }
        }

        Log::info('[CURVA:show] resolved', [
            'residenteId'     => $residenteId,
            'procedimientoId' => $procedimientoId,
            'residentes_count'=> $residentes->count(),
            'procedimientos_count' => $procedimientos->count(),
        ]);

        return view('fellows.curva', [
            'residenteId'     => $residenteId,
            'procedimientoId' => $procedimientoId,
            'residentes'      => $residentes,
            'procedimientos'  => $procedimientos,
            'canAll'          => $canAll,
        ]);
    }
}
