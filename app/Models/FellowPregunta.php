<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FellowPregunta extends Model
{

    protected $table = 'FELLOW_PREGUNTAS';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'PROCEDIMIENTO_ID',
        'PREGUNTA',
        'DESCRIPCION',
        'ORDEN',
        'ACTIVO',
    ];

    protected $casts = [
        'ORDEN'  => 'integer',
        'ACTIVO' => 'boolean',
    ];

    public function procedimiento()
    {
        return $this->belongsTo(\App\Models\FellowProcedimiento::class, 'PROCEDIMIENTO_ID', 'ID');
    }
    public function scopeActivos($query)
    {
        return $query->where('ACTIVO', '1');
    }

    public function scopeOrdenado($query)
    {
        return $query->orderBy('ORDEN');
    }
    public function opciones(): HasMany
{
    return $this->hasMany(FellowOpcion::class, 'PREGUNTA_ID', 'ID')->orderBy('ORDEN');
}
}
