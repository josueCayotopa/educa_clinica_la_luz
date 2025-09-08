<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LearningCurveController extends Controller
{
    //
    public function show(Request $request)
    {
        $residenteId = (int) ($request->query('residente_id') ?? Auth::id());
        $procedimientoId = $request->query('procedimiento_id');

        // Residentes con al menos 1 evaluación
        $residentes = DB::table('FELLOW_EVALUACIONES')
            ->join('users','users.id','=','FELLOW_EVALUACIONES.RESIDENTE_ID')
            ->select('users.id','users.name')
            ->distinct()
            ->orderBy('users.name')
            ->get();

        // Procedimientos activos
        $procedimientos = DB::table('FELLOW_PROCEDIMIENTOS')
            ->where('ACTIVO','1')
            ->orderBy('NOMBRE')
            ->select('ID','NOMBRE')
            ->get();

        return view('fellows.curva', compact('residenteId','procedimientoId','residentes','procedimientos'));
    }
}
