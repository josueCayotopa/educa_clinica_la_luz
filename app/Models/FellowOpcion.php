<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FellowOpcion extends Model
{
 
    protected $table = 'FELLOW_OPCIONES';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'PREGUNTA_ID', 'ETIQUETA', 'VALOR', 'DESCRIPCION', 'ORDEN', 'ACTIVO',
    ];

    protected $casts = [
        'VALOR'  => 'integer',
        'ORDEN'  => 'integer',
        'ACTIVO' => 'boolean',
    ];

    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(FellowPregunta::class, 'PREGUNTA_ID', 'ID');
    }
}
