<?php

namespace App\Http\Controllers;

use App\Models\AdmPaciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $pacientes = AdmPaciente::where(function ($q) use ($query) {
            $q->where('NOM_PACIENTE', 'LIKE', "%{$query}%")
                ->orWhere('APE_PATERNO', 'LIKE', "%{$query}%")
                ->orWhere('APE_MATERNO', 'LIKE', "%{$query}%")
                ->orWhere('NUM_HC', 'LIKE', "%{$query}%")
                ->orWhere('COD_PACIENTE', 'LIKE', "%{$query}%")
                ->orWhere('COD_AUXILIAR', 'LIKE', "%{$query}%") // DNI search
                ->orWhere('COD_ATENCION', 'LIKE', "%{$query}%"); // COD_ATENCION search
        })
            ->limit(10)
            ->get()
            ->map(function ($paciente) {
                return [
                    'id' => $paciente->COD_PACIENTE,
                    'nombre_completo' => trim($paciente->NOM_PACIENTE . ' ' . $paciente->APE_PATERNO . ' ' . $paciente->APE_MATERNO),
                    'num_hc' => $paciente->NUM_HC,
                    'dni' => $paciente->COD_AUXILIAR,
                    'cod_atencion' => $paciente->COD_ATENCION ?? null,
                    'fecha_nacimiento' => $paciente->FEC_NACIMIENTO ? date('d/m/Y', strtotime($paciente->FEC_NACIMIENTO)) : null,
                    'genero' => $paciente->DES_GENERO
                ];
            });

        return response()->json($pacientes);
    }

    public function show($id)
    {
        $paciente = AdmPaciente::find($id);

        if (!$paciente) {
            return response()->json(['error' => 'Paciente no encontrado'], 404);
        }

        return response()->json([
            'id' => $paciente->COD_PACIENTE,
            'nombre_completo' => trim($paciente->NOM_PACIENTE . ' ' . $paciente->APE_PATERNO . ' ' . $paciente->APE_MATERNO),
            'num_hc' => $paciente->NUM_HC,
            'dni' => $paciente->COD_AUXILIAR,
            'cod_atencion' => $paciente->COD_ATENCION ?? null,
            'fecha_nacimiento' => $paciente->FEC_NACIMIENTO ? date('d/m/Y', strtotime($paciente->FEC_NACIMIENTO)) : null,
            'genero' => $paciente->DES_GENERO,
            'diabetes' => $paciente->IND_DIABETES ?? null,
            'hipertension' => $paciente->IND_HIPERTEN ?? null,
            'asma' => $paciente->IND_ASMA ?? null,
            'alergias' => $paciente->IND_ALERGIA ?? null,
            'cirugias_previas' => $paciente->IND_CIRUGIAS ?? null,
            'detalles_alergias_cirugias' => $paciente->DES_ALER_CIRU ?? null
        ]);
    }
}
