<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FellowProcedimiento extends Model
{
    protected $table = 'FELLOW_PROCEDIMIENTOS';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'NOMBRE',
        'ACTIVO',
    ];

    protected $casts = [
        'ACTIVO' => 'boolean', // '1'/'0' => true/false
    ];

    // Relaciones
    public function preguntas(): HasMany
    {
        return $this->hasMany(FellowPregunta::class, 'PROCEDIMIENTO_ID', 'ID');
    }

    public function evaluaciones(): HasMany
    {
        return $this->hasMany(FellowEvaluacion::class, 'PROCEDIMIENTO_ID', 'ID');
    }

    // Scopes útiles
    public function scopeActivos($query)
    {
        return $query->where('ACTIVO', '1');
    }
}
