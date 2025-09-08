<?php

namespace App\Http\Controllers;

use App\Models\FellowProcedimiento;

class ProcedimientoController extends Controller
{
    public function index()
    {
        $procedimientos = FellowProcedimiento::where('ACTIVO', '1')
            ->orderBy('NOMBRE')
            ->get(['ID', 'NOMBRE']);

        return response()->json($procedimientos);
    }

    public function show($id)
    {
        $procedimiento = FellowProcedimiento::with([
            'preguntas' => function ($q) {
                $q->where('ACTIVO', '1')
                    ->orderBy('ORDEN')
                    ->with(['opciones' => fn($x) => $x->where('ACTIVO', '1')->orderBy('ORDEN')]);
            }
        ])->find($id);

        if (!$procedimiento) {
            return response()->json(['error' => 'Procedimiento no encontrado'], 404);
        }

        return response()->json($procedimiento);
    }
}
