<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaCriteriosEvaluacion extends Model
{
    protected $table = 'PLA_CRITERIOS_EVALUACION';
    protected $fillable = [
        'DESCRIPCION',
        'CATEGORIA',
        'ESCALA_MAX',
        'PESO',
        'ESTADO'
    ];

    protected $casts = [
        'PESO' => 'decimal:2',
        'ESCALA_MAX' => 'integer',
    ];
}
