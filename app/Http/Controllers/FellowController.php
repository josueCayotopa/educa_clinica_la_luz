<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FellowProcedimiento;
use App\Models\FellowPregunta;
use App\Models\FellowEvaluacion;
use App\Models\FellowEvalRespuesta;
use App\Models\AdmPaciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FellowController extends Controller
{
    public function getProcedimientos()
    {
        $procedimientos = FellowProcedimiento::activos()
            ->orderBy('NOMBRE')
            ->get(['ID', 'NOMBRE']);

        return response()->json($procedimientos);
    }

   

    public function getHistorialFellow(Request $request)
    {
        $procedimientoId = $request->get('procedimiento_id');
        $fellowId = Auth::id();

        $query = FellowEvaluacion::with('procedimiento:ID,NOMBRE')
            ->where('RESIDENTE_ID', $fellowId);

        if ($procedimientoId) {
            $query->where('PROCEDIMIENTO_ID', $procedimientoId);
        }

        $evaluaciones = $query->orderBy('FECHA_EVALUACION', 'desc')
            ->limit(20)
            ->get();

        return response()->json($evaluaciones);
    }

    public function getCurvaAprendizaje(Request $request)
    {
        $procedimientoId = $request->get('procedimiento_id');
        $fellowId = Auth::id();

        $evaluaciones = FellowEvaluacion::where('RESIDENTE_ID', $fellowId)
            ->where('PROCEDIMIENTO_ID', $procedimientoId)
            ->orderBy('FECHA_EVALUACION')
            ->get(['FECHA_EVALUACION', 'PUNTAJE_TOTAL', 'PORCENTAJE']);

        // Calcular tendencia y estadísticas
        $datos = $evaluaciones->map(function ($eval, $index) {
            return [
                'evaluacion' => $index + 1,
                'fecha' => $eval->FECHA_EVALUACION,
                'puntaje' => $eval->PUNTAJE_TOTAL,
                'porcentaje' => $eval->PORCENTAJE
            ];
        });

        return response()->json([
            'datos' => $datos,
            'total_evaluaciones' => $evaluaciones->count(),
            'promedio_puntaje' => $evaluaciones->avg('PUNTAJE_TOTAL'),
            'promedio_porcentaje' => $evaluaciones->avg('PORCENTAJE'),
            'ultima_evaluacion' => $evaluaciones->last(),
            'mejor_evaluacion' => $evaluaciones->sortByDesc('PUNTAJE_TOTAL')->first()
        ]);
    }

    public function guardarEvaluacion(Request $request)
    {
        $request->validate([
            'cod_paciente' => 'required',
            'procedimiento_id' => 'required|exists:FELLOW_PROCEDIMIENTOS,ID',
            'evaluador' => 'required|string',
            'fecha_evaluacion' => 'required|date',
            'respuestas' => 'required|array',
            'respuestas.*.pregunta_id' => 'required|exists:FELLOW_PREGUNTAS,ID',
            'respuestas.*.opcion_id' => 'required|exists:FELLOW_OPCIONES,ID',
            'observaciones' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            // Crear la evaluación
            $evaluacion = FellowEvaluacion::create([
                'COD_PACIENTE' => $request->cod_paciente,
                'PROCEDIMIENTO_ID' => $request->procedimiento_id,
                'RESIDENTE_ID' => Auth::id(),
                'RESIDENTE' => Auth::user()->name ?? Auth::user()->usuario,
                'EVALUADOR' => $request->evaluador,
                'FECHA_EVALUACION' => $request->fecha_evaluacion,
                'OBSERVACIONES' => $request->observaciones
            ]);

            // Guardar respuestas
            $puntajeTotal = 0;
            foreach ($request->respuestas as $respuesta) {
                $opcion = \App\Models\FellowOpcion::find($respuesta['opcion_id']);

                FellowEvalRespuesta::create([
                    'EVALUACION_ID' => $evaluacion->ID,
                    'PREGUNTA_ID' => $respuesta['pregunta_id'],
                    'OPCION_ID' => $respuesta['opcion_id'],
                    'VALOR' => $opcion->VALOR,
                    'OBSERVACION' => $respuesta['observacion'] ?? null
                ]);

                $puntajeTotal += $opcion->VALOR;
            }

            // Calcular porcentaje (asumiendo escala de 1-5)
            $maxPuntaje = count($request->respuestas) * 5;
            $porcentaje = ($puntajeTotal / $maxPuntaje) * 100;

            // Actualizar evaluación con puntajes
            $evaluacion->update([
                'PUNTAJE_TOTAL' => $puntajeTotal,
                'PORCENTAJE' => round($porcentaje, 2)
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'evaluacion' => $evaluacion->load('procedimiento'),
                'message' => 'Evaluación guardada exitosamente'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar la evaluación: ' . $e->getMessage()
            ], 500);
        }
    }
    public function getPreguntasPorProcedimiento($procedimientoId)
{
    $preguntas = FellowPregunta::with(['opciones' => function ($q) {
            $q->where('ACTIVO', '1')->orderBy('ORDEN');
        }])
        ->where('PROCEDIMIENTO_ID', $procedimientoId)
        ->activos()
        ->ordenado()
        ->get();

    return response()->json($preguntas);
}
}
