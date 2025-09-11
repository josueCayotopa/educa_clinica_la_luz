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
        $user = Auth::user();

if ($user->canViewAllFellowEvals()) {
    // Ver todos
    $residentes = DB::table('users')
        ->select('id','name')
        ->orderBy('name')->get();
    $residenteId = (int)($request->query('residente_id') ?? 0); // opcional
} else {
    // Solo sí mismo
    $residentes = collect([
        DB::table('users')->select('id','name')->find($user->id)
    ])->filter();
    $residenteId = $user->id; // forzado
}
        // Procedimientos activos
        $procedimientos = DB::table('FELLOW_PROCEDIMIENTOS')
            ->where('ACTIVO','1')
            ->orderBy('NOMBRE')
            ->select('ID','NOMBRE')
            ->get();

        return view('fellows.curva', compact('residenteId','procedimientoId','residentes','procedimientos'));
    }
}
