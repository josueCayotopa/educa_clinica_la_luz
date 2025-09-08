<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlaEvaluacion extends Model
{
    protected $table = 'PLA_EVALUACION';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'PERSONAL_EVALUADO_ID',
        'PERIODO',          // <= NECESARIO
        'TIPO',
        'USUARIO_EVALUA',
        'ESTADO',
        'RECOMENDACIONES',
        'SUBTOTAL',
    ];
    protected $casts = [
        'CREATED_AT' => 'datetime',
        'UPDATED_AT' => 'datetime',
        'SUBTOTAL' => 'integer',
    ];
    public function personalEvaluado(): BelongsTo
    {
        return $this->belongsTo(PlaPersonalEvaluado::class, 'PERSONAL_EVALUADO_ID', 'ID');
    }
    public function detalles(): HasMany
    {
        return $this->hasMany(PlaEvaluacionDetalle::class, 'EVALUACION_ID', 'ID');
    }
}
