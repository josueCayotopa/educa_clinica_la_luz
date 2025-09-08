<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FellowProcedimiento;
use App\Models\FellowPregunta;
use App\Models\FellowOpcion;
use App\Models\User;
use App\Models\FellowEvaluacion;
use App\Models\FellowEvalRespuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EvaluacionController extends Controller
{
    public function index()
    {
        Log::info('[EVALUACION] Starting evaluation index method');
        
        try {
            // Cargar todos los datos necesarios para la evaluación
            Log::info('[EVALUACION] Loading procedimientos...');
            $procedimientos = FellowProcedimiento::where('ACTIVO', true)
                ->orderBy('NOMBRE')
                ->get(['ID', 'NOMBRE']);
            Log::info('[EVALUACION] Procedimientos loaded: ' . $procedimientos->count());

            Log::info('[EVALUACION] Loading preguntas with opciones...');
            $preguntas = FellowPregunta::with(['opciones' => function($query) {
                $query->orderBy('fellow_opciones.ORDEN');
            }])
            ->where('fellow_preguntas.ACTIVO', true)
            ->orderBy('fellow_preguntas.ORDEN')
            ->get();
            Log::info('[EVALUACION] Preguntas loaded: ' . $preguntas->count());

            // Agrupar preguntas por procedimiento
            $preguntasPorProcedimiento = $preguntas->groupBy('PROCEDIMIENTO_ID');
            Log::info('[EVALUACION] Preguntas grouped by procedure: ' . $preguntasPorProcedimiento->count() . ' procedures');

            Log::info('[EVALUACION] Getting current user...');
            $usuario = Auth::user();
            
            if ($usuario) {
                Log::info('[EVALUACION] User found - ID: ' . $usuario->id . ', Name: ' . $usuario->name);
                Log::info('[EVALUACION] User tipo_evaluador_fellow: ' . ($usuario->tipo_evaluador_fellow ?? 'NULL'));
                
                // Check if user is an evaluator
                if (!$usuario->tipo_evaluador_fellow) {
                    Log::warning('[EVALUACION] User is not marked as evaluator fellow');
                }
            } else {
                Log::error('[EVALUACION] No authenticated user found');
            }

            Log::info('[EVALUACION] Loading recent evaluations...');
            $evaluacionesRecientes = FellowEvaluacion::with(['procedimiento'])
                ->orderBy('FECHA_EVALUACION', 'desc')
                ->limit(10)
                ->get();
            Log::info('[EVALUACION] Recent evaluations loaded: ' . $evaluacionesRecientes->count());

            // Calcular estadísticas básicas
            Log::info('[EVALUACION] Calculating statistics...');
            $estadisticas = [
                'total_evaluaciones' => FellowEvaluacion::count(),
                'evaluaciones_mes' => FellowEvaluacion::whereMonth('FECHA_EVALUACION', now()->month)->count(),
                'promedio_general' => FellowEvaluacion::avg('PUNTAJE_TOTAL') ?? 0
            ];
            Log::info('[EVALUACION] Statistics calculated: ' . json_encode($estadisticas));

            Log::info('[EVALUACION] Data summary for view:');
            Log::info('- Procedimientos: ' . $procedimientos->count());
            Log::info('- Preguntas por procedimiento: ' . $preguntasPorProcedimiento->count());
            Log::info('- Usuario: ' . ($usuario ? $usuario->name : 'NULL'));
            Log::info('- Evaluaciones recientes: ' . $evaluacionesRecientes->count());
            
            // Log sample data for debugging
            if ($procedimientos->count() > 0) {
                Log::info('[EVALUACION] Sample procedimiento: ' . json_encode($procedimientos->first()->toArray()));
            }
            
            if ($preguntasPorProcedimiento->count() > 0) {
                $firstProcedureId = $preguntasPorProcedimiento->keys()->first();
                $firstProcedureQuestions = $preguntasPorProcedimiento->get($firstProcedureId);
                Log::info('[EVALUACION] Sample questions for procedure ' . $firstProcedureId . ': ' . $firstProcedureQuestions->count());
                
                if ($firstProcedureQuestions->count() > 0) {
                    $sampleQuestion = $firstProcedureQuestions->first();
                    Log::info('[EVALUACION] Sample question: ' . json_encode([
                        'ID' => $sampleQuestion->ID,
                        'PREGUNTA' => $sampleQuestion->PREGUNTA,
                        'DESCRIPCION' => $sampleQuestion->DESCRIPCION,
                        'opciones_count' => $sampleQuestion->opciones ? $sampleQuestion->opciones->count() : 0
                    ]));
                }
            }

            Log::info('[EVALUACION] Returning view with data');
            return view('evaluacion', compact(
                'procedimientos', 
                'preguntasPorProcedimiento', 
                'usuario', 
                'evaluacionesRecientes',
                'estadisticas'
            ));

        } catch (\Exception $e) {
            Log::error('[EVALUACION] Error in index method: ' . $e->getMessage());
            Log::error('[EVALUACION] Stack trace: ' . $e->getTraceAsString());
            throw $e;
        }
    }

    public function guardar(Request $request)
    {
        Log::info('[EVALUACION] Starting save method');
        Log::info('[EVALUACION] Request data: ' . json_encode($request->all()));
        
        try {
            DB::beginTransaction();

            $evaluacion = FellowEvaluacion::create([
                'PROCEDIMIENTO_ID' => $request->procedimiento_id,
                'EVALUADOR' => $request->evaluador,
                'RESIDENTE' => $request->residente,
                'FECHA_EVALUACION' => $request->fecha_evaluacion,
                'PUNTAJE_TOTAL' => $request->puntaje_total,
                'PORCENTAJE' => $request->porcentaje,
                'COMENTARIOS' => $request->comentarios,
                'CREATED_BY' => Auth::id()
            ]);

            Log::info('[EVALUACION] Evaluation created with ID: ' . $evaluacion->ID);

            // Guardar las respuestas
            $respuestas = json_decode($request->respuestas, true);
            Log::info('[EVALUACION] Saving ' . count($respuestas) . ' responses');
            
            foreach ($respuestas as $respuesta) {
                FellowEvalRespuesta::create([
                    'EVALUACION_ID' => $evaluacion->ID,
                    'PREGUNTA_ID' => $respuesta['pregunta_id'],
                    'OPCION_ID' => $respuesta['opcion_id'],
                    'PUNTAJE' => $respuesta['puntaje']
                ]);
            }

            DB::commit();
            Log::info('[EVALUACION] Evaluation saved successfully');

            return response()->json([
                'success' => true,
                'message' => 'Evaluación guardada exitosamente',
                'evaluacion_id' => $evaluacion->ID
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('[EVALUACION] Error saving evaluation: ' . $e->getMessage());
            Log::error('[EVALUACION] Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar la evaluación: ' . $e->getMessage()
            ], 500);
        }
    }
}
