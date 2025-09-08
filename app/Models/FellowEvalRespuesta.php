<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FellowEvalRespuesta extends Model
{
    
    protected $table = 'FELLOW_EVAL_RESPUESTAS';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
    'EVALUACION_ID','PREGUNTA_ID','OPCION_ID','VALOR','OBSERVACION',
];


protected $casts = [
    'VALOR' => 'int',
];

    public function evaluacion(): BelongsTo
    {
        return $this->belongsTo(FellowEvaluacion::class, 'EVALUACION_ID', 'ID');
    }

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(FellowPregunta::class, 'PREGUNTA_ID', 'ID');
    }

    public function opcion(): BelongsTo
    {
        return $this->belongsTo(FellowOpcion::class, 'OPCION_ID', 'ID');
    }
}
