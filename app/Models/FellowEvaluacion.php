<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FellowEvaluacion extends Model
{
    protected $table = 'FELLOW_EVALUACIONES';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // tu tabla no tiene created_at/updated_at

protected $fillable = [
    'PROCEDIMIENTO_ID',
    'RESIDENTE_ID',
    'FECHA_EVALUACION',
    'OBSERVACIONES',
    'PUNTAJE_TOTAL',
    'PROMEDIO',
];

protected $casts = [
    'FECHA_EVALUACION' => 'date',
    'PUNTAJE_TOTAL'    => 'float',
    'PROMEDIO'       => 'float',
];
public function residenteUser()
{
    return $this->belongsTo(\App\Models\User::class, 'RESIDENTE_ID', 'id');
}

    public function procedimiento(): BelongsTo
    {
        return $this->belongsTo(FellowProcedimiento::class, 'PROCEDIMIENTO_ID', 'ID');
    }

    public function evaluadorUser()
{
    return $this->belongsTo(\App\Models\User::class, 'EVALUADOR_ID', 'id');
}
    // (Opcional) Relación al paciente si tienes un modelo AdmPaciente:
    // Ajusta el namespace/clase según tu proyecto.
    public function paciente(): BelongsTo
    {
        return $this->belongsTo(\App\Models\AdmPaciente::class, 'COD_PACIENTE', 'COD_PACIENTE');
    }
    public function respuestas(): HasMany
    {
        return $this->hasMany(FellowEvalRespuesta::class, 'EVALUACION_ID', 'ID');
    }

    public function recalcularPuntaje(): void
    {
        $suma = $this->respuestas()->sum('VALOR');
        $this->PUNTAJE_TOTAL = $suma;
        // Si tu porcentaje es “sobre el máximo posible”, cámbialo según tu regla:
        // Ejemplo: porcentaje sobre 5 * número de preguntas evaluadas
        $max = max(1, $this->respuestas()->count() * 5);
        $this->PORCENTAJE = round(($suma / $max) * 100, 2);
        $this->save();
    }
}
