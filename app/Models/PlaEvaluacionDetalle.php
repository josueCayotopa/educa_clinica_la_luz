<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaEvaluacionDetalle extends Model
{
  
     protected $table = 'PLA_EVALUACION_DETALLE';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'EVALUACION_ID',
        'CRITERIO_ID',
        'PUNTAJE',
        'OBSERVACION'
    ];

    protected $casts = [
        'PUNTAJE' => 'integer',
    ];

    public function evaluacion(): BelongsTo
    {
        return $this->belongsTo(PlaEvaluacion::class, 'EVALUACION_ID', 'ID');
    }

    public function criterio(): BelongsTo
    {
        return $this->belongsTo(PlaCriteriosEvaluacion::class, 'CRITERIO_ID', 'ID');
    }
}
