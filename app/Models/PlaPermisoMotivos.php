<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaPermisoMotivos extends Model
{
    use HasFactory;
    protected $table = 'PLA_PERMISO_MOTIVOS';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'DES_MOTIVO',
        'ESTADO',

    ];
    // Agregar relaciones
    public function motivoDocumentos()
    {
        return $this->hasMany(PlaPermisoMotivoDocumento::class, 'ID_MOTIVO');
    }

    public function permisos()
    {
        return $this->hasMany(PlaPermisosPersonal::class, 'ID_MOTIVO');
    }
    public function getDocumentosRequeridosAttribute()
{
    return $this->motivoDocumentos->map(function ($doc) {
        return $doc->tipoDocumento->DES_TIPO;
    })->implode(', ');
}
}
