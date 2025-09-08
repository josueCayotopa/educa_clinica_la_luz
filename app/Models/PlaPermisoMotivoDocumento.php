<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaPermisoMotivoDocumento extends Model
{
    use HasFactory;
    protected $table = 'PLA_PERMISO_MOTIVO_DOCUMENTOS';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID_MOTIVO',
        'ID_DOCUMENTO',
        'ESTADO'
    ];

    public function tipoDocumento()
{
    return $this->belongsTo(PlaPermisoTipoDocumento::class, 'ID_DOCUMENTO');
}
}
