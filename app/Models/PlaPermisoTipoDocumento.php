<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaPermisoTipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'PLA_PERMISO_TIPO_DOCUMENTOS';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'DES_TIPO',
        'DESCRIPCION',
        'ESTADO'
    ];

    public function motivos()
    {
        return $this->belongsToMany(
            PlaPermisoMotivos::class,
            'PLA_PERMISO_MOTIVO_DOCUMENTOS',
            'ID_DOCUMENTO',
            'ID_MOTIVO'
        );
    }
}
